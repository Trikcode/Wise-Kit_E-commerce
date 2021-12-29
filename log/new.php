 <?php
											$sql = "SELECT * FROM requests ORDER BY id DESC";
          $result = mysqli_query($db,  $sql);
            $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
														foreach($products as $row){
															$product_name = $row['product_name'];
															$product_price = $row['product_price'];
															$product_desc = $row['product_desc'];
															$product_image = $row['product_image'];
															$query = "INSERT INTO productdb (product_name,product_price, product_desc, product_image) VALUES ('$product_name',$product_price', '$product_desc', '$product_image');";
															mysqli_query($db, $query);
																	$delete_sql = "DELETE FROM requests";
													if($delete_sql){
													$sql = "SELECT * FROM productdb ORDER BY id DESC";		
            $result = mysqli_query($db, $sql);
                while ($row = mysqli_fetch_assoc($result)){
                    component($row['product_name'], $row['product_price'], $row['product_image'],$row['product_desc'], $row['id']);
																				echo('approved');
                }
													}
															
														}
												
													
													
													

            
            ?>

              <div class="row text-center py-5">
            <?php
            $sql = "SELECT * FROM requests ORDER BY id DESC";
            $result = mysqli_query($db, $sql);
                while ($row = mysqli_fetch_assoc($result)){
                    component($row['product_name'], $row['product_price'],$row['product_desc'], $row['product_image'], $row['id']);
                }
            ?>