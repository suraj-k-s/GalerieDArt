<?php
ob_start();
include("Head.php");
session_start();
include("../Assets/Connection/Connection.php");

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Galerie DArt::Shop Product Details</title>
</head>

<body>

<div id="tab" align="center">
<h1><u>Product Details</u></h1>
<form id="form1" name="form1" method="post" action="">
  <table>
    <tr>
      <td>Category</td>
      <td><label for="category"></label>
         <select name="category" id="category">
		<option value="">-----select-----</option>
        <?php
		$selqry="select * from tbl_category" ;
		$result=$Conn->query($selqry);
		while($row=$result->fetch_assoc())
		{
			?>
            <option value="<?php echo $row["category_id"]?>"><?php echo $row["category_name"]?></option>
            <?php
		}
		?>
        </select></td>
    </tr>
    <tr>
      <td align="center"colspan="2"><input type="submit" name="btnsearch" id="btnsearch" value="Search" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <?php
  if(isset($_POST["btnsearch"]))
  {
	  $category=$_POST["category"];
	  $selqry="select * from tbl_product p inner join tbl_subcategory s on p.subcategory_id=s.subcategory_id where shop_id='".$_GET["id"]."' AND category_id='".$category."'";
	  
	  $re=$Conn->query($selqry);
	  if($re->num_rows>0)
	  {
		  $i=0;
		  
  ?>
  <table>
    <tr>
      <td width="51"><b>SL.No</b></td>
      <td width="97"><b>Subcategory</b></td>
      <td width="46"><b>Name</b></td>
      <td width="100"><b>Photo</b></td>
      <td width="65"><b>Price</b></td>
      <td width="108"><b>Details</b></td>
      <td colspan="2"width="108"><b>Action</b></td>
    </tr>
    <?php
	while($row=$re->fetch_assoc())
	{
		 $i++;
  ?>
  <tr>
  <td><?php echo $i; ?></td>
  <td><?php echo $row["subcategory_name"];?></td>
  <td><?php echo $row["product_name"];?></td>
  <td><img src="../Assets/Files/ProductPhotos/<?php echo $row["product_photo"];?>" width="100" height="100" /></td>
  <td><?php echo $row["product_price"];?></td>
  <td><?php echo $row["product_details"];?></td>
    <td><a href="#" onclick="AddtoCart(<?php echo $row["product_id"]?>)">Add To Cart</a></td>
  </tr>
  <?php
	}
	?>
		
  </table>
  <?php
	  }
	  else
	  {
		  echo "<h1>NO DATA FOUND</h1>";
	  }
  }
  ?>
  <p id="AddtoCart"></p>
</form>
</div>
</body>
</html>
<script src="../Assets/JQ/jQuery.js"></script>
	<script>

		function AddtoCart(id)
		{
			$.ajax({url:"../Assets/AjaxPages/AjaxAddCart.php?id="+id,
			success: function(result) {
				$("#AddtoCart").html(result);
			}});
		}
		</script>