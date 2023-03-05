<option value="">-----select-----</option>
<?php
include("../Connection/Connection.php");
$selqry="select * from tbl_subcategory where category_id='".$_GET["cid"]."'";
$result=$Conn->query($selqry);
while($row=$result->fetch_assoc())
{
	?>
    <option value="<?php echo $row["subcategory_id"]?>"><?php echo $row["subcategory_name"]?></option>
    <?php 
}
?>
