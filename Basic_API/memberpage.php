<?php require('includes/config.php'); 

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); } 

//define page title
$title = 'Members Page';

//include header template
require('layout/header.php'); 
?>

<div class="container">

	<div class="row">

	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			
				<h2>Welcome Back!<br> <?php echo $_SESSION['username']; ?></h2>
				
				<hr>
				<h2>Upload    </h2><a href="logout.php">Logout</a>
<div class="image_upload_div">
	<form action="upload.php" class="dropzone">
    </form>
</div>
		</div>
	</div>
</div>

<?php 
require('layout/footer.php'); 
?>
