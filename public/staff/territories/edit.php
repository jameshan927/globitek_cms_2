<?php
require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to('index.php');
}
$territories_result = find_territory_by_id($_GET['id']);
// No loop, only one result
$territory = db_fetch_assoc($territories_result);

$errors = array();

if(is_post_request()) {

  if(isset($_POST['name'])) { $territory['name'] = h($_POST['name']); }
  if(isset($_POST['position'])) { $territory['position'] = h($_POST['position']); }
  
  $result = update_territory($territory);
  if($result === true) {
    redirect_to('show.php?id=' . $territory['id']);
  } else {
    $errors = $result;
  }
}
?>
<?php $page_title = 'Staff: Edit Territory ' . $territory['name']; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="main-content">
  <a href="../states/show.php?id=<?php echo raw_u($territory['state_id']); ?>">Back to State Details</a>

  <h1>Edit Territory: <?php echo $territory['name']; ?></h1>

  <!-- TODO add form -->
  
  <?php echo display_errors($errors); ?>
  
  <form action="edit.php?id=<?php echo raw_u($territory['id']); ?>" method="post">
    Name:<br />
	<input type="text" name="name" value="<?php echo $territory['name']; ?>" /><br />
	Position:<br />
	<input type="text" name="position" value="<?php echo $territory['position']; ?>" /> <br />
	<br />
	<input type="submit" name="submit" value="Update" />
  </form>
  
</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
