<?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");

$selqry="select * from tbl_product p inner join tbl_subcategory s on p.subcategory_id=s.subcategory_id inner join tbl_category c on s.category_id=s.category_id inner join tbl_shop a on p.shop_id=p.shop_id where product_id='".$_GET["id"]."'";
$result=$Conn->query($selqry);
if($row=$result->fetch_assoc())
{
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div id="tab"align="center">
<h1><u>View More</u></h1>
<p>&nbsp;</p>
<form id="form1" name="form1" method="post" action="">
  <table style="border:solid black 1px">
    <tr>
      <td>
      <p align="center"><img src="../Assets/Files/ProductPhotos/<?php echo $row["product_photo"];?>" width="100" height="100" /></p>
      </td>
    </tr>
    <tr>
       <td>
           <table >
              <tr>
              	<b><td>Name</td><td>:</td></b>
                <td><?php echo $row["product_name"];?></td>
              </tr>
              <tr>
              	<b><td>Category</td><td>:</td></b>
                <td><?php echo $row["category_name"];?></td>
              </tr>
              <tr>
              	<b><td>Subcategory</td><td>:</td></b>
                <td><?php echo $row["subcategory_name"];?></td>
              </tr>
              <tr>
              	<b><td>Shop Name</td><td>:</td></b>
                <td><?php echo $row["shop_name"];?></td>
              </tr>
              <tr>
              	<b><td>Details</td><td>:</td></b>
                <td><?php echo $row["product_details"];?></td>
              </tr>
              <tr>
              	<b><td>Price</td><td>:</td></b>
                <td><?php echo $row["product_price"];?></td>
              </tr>
            </table>
        </td>
     </tr>
  </table>

</form>
</div>
</body>
<?php
}
?>
</html>