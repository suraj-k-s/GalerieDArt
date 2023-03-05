<?php
ob_start();
include("Head.php");
session_start();
include("../Assets/Connection/Connection.php");
if(isset($_POST["btnsubmit"]))
{
	$name=$_POST["txtname"];
	$price=$_POST["txtprice"];
	$subcategory=$_POST["subcategory"];
	$details=$_POST["txtdetails"];
	
	
	$photo=$_FILES["filephoto"]["name"];
	 $path=$_FILES["filephoto"]["tmp_name"];
	 move_uploaded_file($path,"../Assets/Files/ProductPhotos/".$photo);
	 
	 
	 
	 
	
$insQry=" insert into tbl_product(product_name,product_price,product_photo,subcategory_id,product_details,shop_id)values('".$name."','".$price."','".$photo."','".$subcategory."','".$details."','".$_SESSION["sid"]."')";
			if($Conn->query($insQry))
			{
				?>
            	<script>
						alert('inserted!!');
						location.href='Product.php';
					</script>
				<?php
			}
			else
			{
				?>
            	<script>
						alert('failed!');
						location.href='Product.php';
				</script>
                <?php
            }

}



if(isset($_GET["did"]))
{
	$id = $_GET["did"];
	
	$delQry = "delete from tbl_product where product_id='".$id."'";
	if($Conn->query($delQry))
	{
				?>
					<script>
						alert('Deleted');
						location.href='Product.php';
					</script>
				<?php
	}
	else
	{
				?>
					<script>
						alert('Failed');
						location.href='Product.php';
					</script>
				<?php
	}
}



$pid="";
$pname="";
if(isset($_GET["pid"]))
{
	$selQry1="select * from tbl_product where product_id=('".$_GET["pid"]."')";
	$result=$Conn->query($selQry1);
	if($row1=$result->fetch_assoc())
	{
		$pid=$row1["product_id"];
	}
}

?>









<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GalerieDArt::Product</title>
</head>

<body>
<div id="tab"align="center">
<h1><u>Product</u></h1>
<p>&nbsp;</p>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table>
    <tr>
      <td>Name</td>
      <td><label for="txtname"></label>
      <input type="text" name="txtname" id="txtname"  required="required" autocomplete="off"/></td>
    </tr>
    <tr>
      <td>Price</td>
      <td><label for="txtprice"></label>
      <input type="text" name="txtprice" id="txtprice"  required="required" autocomplete="off" /></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><label for="filephoto"></label>
      <input type="file" name="filephoto" id="filephoto"  required="required" autocomplete="off" />
	</td>
    </tr>
    <tr>
      <td>Category</td>
      <td><label for="category"></label>
     <select name="category" id="category" onChange="getSubcategory(this.value)">
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
      <td>Subcategory</td>
      <td><label for="subcategory"></label>
      <select name="subcategory" id="subcategory">
      <option value="">------Select------</option>
      </select></td>
    </tr>
    <tr>
      <td height="58">Product Details</td>
      <td><label for="txtdetails"></label>
        <textarea name="txtdetails" id="txtdetails" cols="45" rows="5"  required="required" autocomplete="off" style="resize:none"></textarea></td>
    </tr>
    <tr>
      <td height="48" colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
      <input type="submit" name="btncancel" id="btncancel" value="Cancel" /></td>
    </tr>
  </table>
  
  
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <?php
 $i=0;
 $selqry="select * from tbl_product p inner join tbl_subcategory s on p.subcategory_id=s.subcategory_id inner join tbl_category c on s.category_id=c.category_id where shop_id='".$_SESSION["sid"]."'"; 
 $result=$Conn->query($selqry);
 if($result->num_rows>0)
 { 

	  ?>
      	
        <table>
            <tr>
              <td width="46">Sl.No</td>
              <td width="46">Name</td>
              <td width="42">Price</td>
              <td width="100">Photo</td>
              <td width="71">Category</td>
              <td width="97">Subcategory</td>
              <td width="136"> Details</td>
              <td align="center" colspan="2">Action</td>
            </tr>
           <?php
		   while($row = $result->fetch_assoc())
		  {
			  $i++;
			  ?>
              	 <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $row["product_name"]; ?></td>
                  <td><?php echo $row["product_price"]; ?></td>
                  <td><img src="../Assets/Files/ProductPhotos/<?php echo $row["product_photo"];?>" width="100" height="100" /></td>
                  <td><?php echo $row["category_name"]; ?></td>
                  <td><?php echo $row["subcategory_name"]; ?></td>
                  <td><?php echo $row["product_details"]; ?></td>
                  <td width="57"><a href="Product.php?did=<?php echo $row["product_id"]; ?>">Delete</a></td>
                  <td width="45"><a href="Stock.php?pid=<?php echo $row["product_id"]; ?>">stock</a></td>
                </tr>
              <?php
		  }
		   ?>
    </table>
      
      <?php
  }
  else
  {
	  ?>
	  	<h1>No Data Found</h1>	  	
	  <?php
  }
  
  
  ?>
</form>
</div>
</body>
<script src="../Assets/JQ/jQuery.js"></script>

	<script>
	

		function getSubcategory(cid)
		{
			$.ajax({url:"../Assets/AjaxPages/AjaxSubcategory.php?cid="+cid,
			success: function(result) {
				$("#subcategory").html(result);
			}});
		}
		</script>

</html>