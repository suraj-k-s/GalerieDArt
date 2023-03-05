<?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GalerieDArt::Search Shop</title>
</head>

<body>
<div id="tab" align="center">
<h1><u>Search Shop</u>e</h1>
<form id="form1" name="form1" method="post" action="">

<table>
  <tr>
    <td>District</td>
    <td><label for="district"></label>
      <select name="district" id="district" onChange="getPlace(this.value)">
		<option value="">-----select-----</option>
        <?php
		$selqry="select * from tbl_district";
		$result=$Conn->query($selqry);
		while($row=$result->fetch_assoc())
		{
			?>
            <option value="<?php echo $row["district_id"]?>"><?php echo $row["district_name"]?></option>
            <?php
		}
		?>
        </select></td>
 
    <td>Place</td>
    <td><label for="place"></label>
       <select name="place" id="place">
      <option value="">------Select------</option>
      </select></td>
      </tr>
      <tr>
 <td align="center" colspan="6"><input type="submit" name="btnsearch" id="btnsearch" value="Search" />
      <input type="submit" name="btncancel" id="btncancel" value="Cancel" /></td>
    </tr>
</table>
<p>&nbsp;</p>
<h1><u>Shope List</u></h1>
<?php
if(isset($_POST["btnsearch"]))
{
	$place=$_POST["place"];
	$selQry="select * from tbl_shop where place_id='".$place."'";
	$re=$Conn->query($selQry);
	if($re->num_rows>0)
	{
		$i=0;
		?>
<table width="698">
  <tr>
    <td width="44">Sl No</td>
    <td width="92">Name</td>
    <td width="109">Contact</td>
    <td width="106">Address</td>
    <td width="103">Email</td>
    <td width="123">Photo</td>
    <td width="89">Action</td>
  </tr>
  <?php
  while($row=$re->fetch_assoc())
  {
	  $i++;
  ?>
  <tr>
  <td><?php echo $i; ?></td>
  <td><?php echo $row["shop_name"];?></td>
  <td><?php echo $row["shop_contact"];?></td>
  <td><?php echo $row["shop_address"];?></td>
  <td><?php echo $row["shop_email"];?></td>
  <td><img src="../Assets/Files/Photos/<?php echo $row["shop_photo"];?>" width="123" height="100" /></td>
  <td><a href="ShopProductDetails.php?id=<?php echo $row["shop_id"];?>">View product</a></td>
  <?php
  }
  ?>
</table>
<?php
	}
	else
	{
		echo "<h1> NO DATA FOUND</h1>";
	}
}
?>
<p>&nbsp;</p>
</form>
</div>
</body>
<script src="../Assets/JQ/jQuery.js"></script>
	<script>

		function getPlace(did)
		{
			$.ajax({url:"../Assets/AjaxPages/AjaxPlace.php?did="+did,
			success: function(result) {
				$("#place").html(result);
			}});
		}
		</script>
</html>