<?php 
include 'component.php';
include ('homeserver.php');
include('functions.php');

if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<div class="header">
<?php require_once ("header.php"); ?>

	</div>
	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>



		<!-- logged in user information -->
		<div class="profile_info">
			<img src="../img/admin.jpg"  alt="imagee" style="height: 100px; width:100px; margin-left:1rem; border-radius:8px">

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong style="margin-left:1rem;"><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<a href="home.php?logout='1'" style="color: red;">logout</a>
        &nbsp; 
								  <div class="container" style="display: flex; flex-wrap: wrap; padding: 0 4px;">
            <?php
            
                $query = "select * from `requests`;";
                if(count(fetchAll($query))>0){
                    foreach(fetchAll($query) as $row){
                        ?>
	
                <div >
                    <h1 class="jumbotron-heading"><?php echo $row['product_name'] ?></h1>
                      <img src="../upload/<?php echo $row['product_image'] ?>" alt='imagee' style="height:300px; width:300px;  margin-right: 15px;"/>
                      <p>
                        <a href="create_user.php?id=<?php echo $row['id'] ?>" class="btn btn-primary my-2">Accept</a>
                        <a href="reject.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary my-2">Reject</a>
                      </p>
																						</div>
            <?php
                    }
                }else{
                    echo "No Pending Requests.";
                }
            ?>
          
        </div>

					</small>

				<?php endif ?>
			</div>
		</div>
	</div>
	<h4  style="text-align: center; font-size:20px; padding-bottom:2rem">Notice Board Development by Ayesiga Nobert 20/U/2063/EVE</h4>
</body>
</html>