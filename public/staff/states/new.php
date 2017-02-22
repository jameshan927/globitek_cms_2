<?php
require_once('../../../private/initialize.php');

$errors = array();
$state = array(
	'name' => '',
	'country_id' => '',
	'code' => '',
);

if(is_post_request()) {
  
  if(isset($_POST['name'])) { $state['name'] = h($_POST['name']); }
  if(isset($_POST['country_id'])) { $state['country_id'] = h($_POST['country_id']); }  
  if(isset($_POST['code'])) { $state['code'] = h($_POST['code']); }
  
  $result = insert_state($state);
  if($result === true) {
	$new_id = db_insert_id($db);
	redirect_to('show.php?id=' . $new_id);
  } else {
    $errors = $result;
  }
}
?>
<?php $page_title = 'Staff: New State'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="main-content">
  <a href="index.php">Back to States List</a><br />

  <h1>New State</h1>

  <!-- TODO add form -->
  
  <?php echo display_errors($errors); ?>
  
  <form action="new.php" method="post">
    Name:<br />
    <input type="text" name="name" value="<?php echo $state['name']; ?>" /><br />
	Country ID:<br />
    <input type="text" name="country_id" value="<?php echo $state['country_id']; ?>" /><br />	
    Code:<br />
    <input type="text" name="code" value="<?php echo $state['code']; ?>" /><br />
    <br />
    <input type="submit" name="submit" value="Create"  />
  </form>  

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
