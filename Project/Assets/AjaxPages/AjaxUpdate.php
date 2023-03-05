

<?php
include("../Connection/Connection.php");
$up="update tbl_cart set cart_qty='".$_GET["qty"]."' where cart_id='".$_GET["id"]."'";
$Conn->query($up);

?>

