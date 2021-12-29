<?php
require_once ('./log/functions.php'); 

if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ./log/login.php');
}
require_once ('./log/component.php');

if (isset($_POST['add'])){
    /// print_r($_POST['product_id']);
    if(isset($_SESSION['cart'])){

        $item_array_id = array_column($_SESSION['cart'], "product_id");

        if(in_array($_POST['product_id'], $item_array_id)){
            echo "<script>alert('Product is already added in the cart..!')</script>";
            echo "<script>window.location = 'index.php'</script>";
        }else{

            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id']
            );

            $_SESSION['cart'][$count] = $item_array;
        }

    }else{

        $item_array = array(
                'product_id' => $_POST['product_id']
        );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
    }
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- semanti-ui -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" integrity="sha512-8bHTC73gkZ7rZ7vpqUQThUDhqcNFyYi2xgDgPDHc+GXVGHXq+xPjynxIopALmOPqzo9JZj0k6OqqewdGO3EsrQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="./css/style.css">
</head>
<body >
    <div class="header">

        <?php require_once ("./log/header.php"); ?>
    </div>

<?php if (isset($_SESSION['success_message']) && !empty($_SESSION['success_message'])) { ?>
<div class="card" style="height: 100px; width: 300px;box-shadow: 0 3px 10px rgb(0 0 0 / 0.2); float: center;padding:20px;margin:0 auto; ">

                        <div class="success-message" style="font-size: 15px;color: green;"><?php echo $_SESSION['success_message']; ?></div>
</div>

                        <?php
                        unset($_SESSION['success_message']);
                    }
                    
                    ?>

<div class="form-container" style="width: 250px;
  margin: 0 auto;">

       <form
          action="./log/upload.php"
          method="post"
          enctype="multipart/form-data"
          class="ui form"
          >
          <label for="name" >Name</label>
          <input type="text" name="name" class="field" />
          <label for="price">Price</label>
          <input type="text" name="price" class="field" />
          <label for="price">description</label>
          <input type="text" name="desc" class="field" />
          <?php if (isset($_GET['error'])):?>
        <p style="color:red"><?php echo $_GET['error']?></p>
        <?php endif ?>
          <label for="upload">Upload Item</label>
          <input type="file" name="file" class="field"/>
          <button type="submit" name="submit" class="sendbtn"  >Add Item</button>

        </form>
</div>

<div class="container">
    <h3 style="text-align: center; font-size:30px; padding-top:1rem">Products</h3>
<div class="row text-center py-1">
<?php
		$sql = "SELECT * FROM productdb ORDER BY id DESC";		
            $result = mysqli_query($db, $sql);
                while ($row = mysqli_fetch_assoc($result)){
                    component($row['product_name'], $row['product_price'], $row['product_image'], $row['id']);
                }
      //code here
      ?>
      </div>
</div>





<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<h4  style="text-align: center; font-size:20px; padding-bottom:2rem">Notice Board Development by Ayesiga Nobert 20/U/2063/EVE</h4>

</body>
</html>
