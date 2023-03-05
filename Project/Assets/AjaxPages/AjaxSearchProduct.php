<?php
include("../Connection/Connection.php");

    if (isset($_GET["action"])) {

        $sqlQry = "SELECT * from tbl_product p inner join tbl_subcategory sc on sc.subcategory_id=p.subcategory_id inner join tbl_category c on c.category_id=sc.category_id where true ";
        $row = "SELECT count(*) as count from tbl_product p inner join tbl_subcategory sc on sc.subcategory_id=p.subcategory_id inner join tbl_category c on c.category_id=sc.category_id where true ";

        if ($_GET["category"]!=null) {

            $category = $_GET["category"];

            $sqlQry = $sqlQry." AND c.category_id IN(".$category.")";
            $row = $row." AND c.category_id IN(".$category.")";
        }
        if ($_GET["subcategory"]!=null) {

            $subcategory = $_GET["subcategory"];

            $sqlQry = $sqlQry." AND sc.subcategory_id IN(".$subcategory.")";
            $row = $row." AND sc.subcategory_id IN(".$subcategory.")";
        }


        $resultS = $Conn->query($sqlQry);
        $resultR = $Conn->query($row);
        
       
        $rowR = $resultR->fetch_assoc();

        if ($rowR["count"] > 0) {
            while ($row1 = $resultS->fetch_assoc()) {
?>

<div class="col-md-3 mb-2">
                            <div class="card-deck">
                                <div class="card border-secondary">
                                    <img src="../Assets/Files/ProductPhotos/<?php echo $row1["product_photo"]; ?>" class="card-img-top" height="250">
                                    <div class="card-img-secondary">
                                        <h6  class="text-light bg-info text-center rounded p-1"><?php echo $row1["product_name"]; ?></h6>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title text-danger" align="center">
                                            Price : <?php echo $row1["product_price"]; ?>/-
                                        </h4>
                                        <p align="center">
                                            <?php echo $row1["category_name"]; ?><br>
                                            <?php echo $row1["subcategory_name"]; ?><br>
                                        </p>
                                        <?php
										
											
											$average_rating = 0;
											$total_review = 0;
											$five_star_review = 0;
											$four_star_review = 0;
											$three_star_review = 0;
											$two_star_review = 0;
											$one_star_review = 0;
											$total_user_rating = 0;
											$review_content = array();
										
											$query = "SELECT * FROM tbl_review where product_id = '".$row1["product_id"]."' ORDER BY review_id DESC";
										
											$result = $Conn->query($query);
										
											while($row = $result->fetch_assoc())
											{
												
										
												if($row["user_rating"] == '5')
												{
													$five_star_review++;
												}
										
												if($row["user_rating"] == '4')
												{
													$four_star_review++;
												}
										
												if($row["user_rating"] == '3')
												{
													$three_star_review++;
												}
										
												if($row["user_rating"] == '2')
												{
													$two_star_review++;
												}
										
												if($row["user_rating"] == '1')
												{
													$one_star_review++;
												}
										
												$total_review++;
										
												$total_user_rating = $total_user_rating + $row["user_rating"];
										
											}
											
											
											if($total_review==0 || $total_user_rating==0 )
											{
												$average_rating = 0 ; 			
											}
											else
											{
												$average_rating = $total_user_rating / $total_review;
											}
											
											?>
                                            <p align="center" style="color:#F96;font-size:20px">
                                           <?php echo $average_rating."/5"; ?>
                                        </p>
                                            <?php
										
											$output = array(
												'average_rating'	=>	number_format($average_rating, 1),
												'total_review'		=>	$total_review,
												'five_star_review'	=>	$five_star_review,
												'four_star_review'	=>	$four_star_review,
												'three_star_review'	=>	$three_star_review,
												'two_star_review'	=>	$two_star_review,
												'one_star_review'	=>	$one_star_review,
												'review_data'		=>	$review_content
											);
										
		
                                            $stock = "select sum(stock_qty) as stock from tbl_stock where product_id = '" . $row1["product_id"] . "'";
											 $result2 = $Conn->query($stock);
                            				$row2=$result2->fetch_assoc();
                                                if ($row2["stock"] > 0) {
                                        ?>
                                        <a href="javascript:void(0)" onclick="addCart('<?php echo $row1["product_id"]; ?>')" class="btn btn-success btn-block">Add to Cart</a>
                                        <?php
                                        } else if ($row2["stock"] == 0) {
                                        ?>
                                        <a href="javascript:void(0)" class="btn btn-danger btn-block">Out of Stock</a>
                                        <?php
                                            }
                                         else {
                                        ?>
                                        <a href="javascript:void(0)" class="btn btn-warning btn-block">Stock Not Found</a>
                                        <?php
                                            }
                                        ?>
                                        <a href="ViewMore.php?id=<?php echo $row1["product_id"]; ?>" class="btn btn-warning btn-block">View More</a>
                                    </div>
                                </div>
                            </div>
                        </div>

<?php
            }
        } else {
             echo "<h4 align='center'>Products Not Found!!!!</h4>";
        }
    }

?>