<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/style.css">

    <title>Document</title>
</head>
<body>
    <?php

function component($productname, $productprice, $productimg, $productid){
    $element = "
    <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
                <form action=\"index.php\" method=\"post\">
                    <div class=\"card shadow\">
                        <div>
                            <img src=\"./upload/$productimg\" alt=\"Image1\" class=\"img-fluid card-img-top\">
                        </div>
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">$productname</h5>
                            <h6>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"far fa-star\"></i>
                            </h6>
                            <p class=\"card-text\">
                               
                            </p>
                            <h5>
                                <small><s class=\"text-secondary\">$519</s></small>
                                <span class=\"price\">$$productprice</span>
                            </h5>

                            <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>
                             <input type='hidden' name='product_id' value='$productid'>
                        </div>
                    </div>
                </form>
            </div>
    ";
    echo $element;
}

function cartElement($productimg, $productname, $productprice, $productid){
    $element = "
    <form action=\"cart.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\">
                    <div class=\"border rounded\">
                        <div class=\"row bg-white\">
                            <div class=\"col-md-3 pl-0\">
                                <img src=\"./upload/$productimg\" alt=\"Image1\" class=\"img-fluid\">
                            </div>
                            <div class=\"col-md-6\">
                                <h5 class=\"pt-2\">$productname</h5>
                                <small class=\"text-secondary\">sold by: wise acts</small>
                                <h5 class=\"pt-2\">$$productprice</h5>
                                
                                <button type=\"submit\" class=\"btn btn-one\">Buy Now</button>
                                <button type=\"submit\" class=\"btn btn-one btn-two\"name=\"remove\">Remove</button>
                            </div class=\"btns\">
                            <div class=\"col-md-3 py-5\">
                                <div>
                                    <button type=\"button\" class=\"btn bg-light border rounded-circle\"  onclick=\"decrement()\" ><i class=\"fas fa-minus\"></i></button>
                                    <input type=\"text\" id=\"counting\" value=\"0\" class=\"values\">
                                    <button type=\"button\" class=\"btn bg-light border rounded-circle\" onclick=\"increment()\" ><i class=\"fas fa-plus\"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
    
    ";
    echo  $element;
    
}
?>
    <script>
      //initialising a variable name data
            var data = 0;
  
            //printing default value of data that is 0 in h2 tag
            document.getElementById("counting").innerValue = data;
  
            //creation of increment function
            function increment() {
                data = data + 1;
                document.getElementById("counting").innerValue = data;
            }
            //creation of decrement function
            function decrement() {
                data = data - 1;
                document.getElementById("counting").innerText = data;
            }
        </script>
</body>
</html>

















