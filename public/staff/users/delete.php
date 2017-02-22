<?php
require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to('index.php');
}
$id = $_GET['id'];
$users_result = find_user_by_id($id);
// No loop, only one result
$user = db_fetch_assoc($users_result);

$errors = array();

if(is_post_request()) {

  $result = delete_user($user);
  if($result === true) {
    redirect_to('index.php');
  } else {
	  
    $errors[] = "Deleting user was unsuccessful.";
  }
}
?>

<?php $page_title = 'Staff: Delete User ' . $user['first_name'] . " " . $user['last_name']; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="main-content">
  <a href="index.php">Back to Users List</a><br />

  <h1>Delete User: <?php echo $user['first_name'] . " " . $user['last_name']; ?></h1>

  <form action="delete.php?id=<?php echo raw_u($user['id']); ?>" method="post">
    Are you sure you want to permanently delete the user: <?php echo $user['first_name'] . " " . $user['last_name']; ?> 
    <br /> <br />
    <input type="submit" name="submit" value="Delete"  />
  </form>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
