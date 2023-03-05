<?php
ob_start();
include("Head.php");
session_start();
include("../Assets/Connection/Connection.php");
if(isset($_POST["btnsubmit"]))
{
	 $date=$_POST["txtdate"];
	 $qty=$_POST["txtqty"];
	 $pid = $_POST["txt_pid"];
	 
	 $insqry="insert into tbl_stock(stock_date,stock_qty,product_id)values('".$date."','".$qty."','".$pid."')";
	 if($Conn->query($insqry))
			{
				?>
            	<script>
						alert('inserted!!');
						location.href='Stock.php?pid=<?php echo $pid;?>';
					</script>
				<?php
			}
			else
			{
				?>
            	<script>
						alert('failed!');
						location.href='Stock.php';
				</script>
                <?php
			}
}
	 
	 
	 
   if(isset($_GET["did"]))
   {
      $id = $_GET["did"];
	
	  $delQry = "delete from tbl_stock where stock_id='".$id."'";
	  if($Conn->query($delQry))
	  {
				?>
					<script>
						alert('Deleted');
						location.href='Stock.php?pid=<?php echo $_GET["pid"];?>';
					</script>
				<?php
	  }
	  else
	  {
				?>
					<script>
						alert('Failed');
						location.href='Stock.php';
					</script>
				<?php
	  }



  }



?>






<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GalerieDArt::Stock</title>
</head>

<body>
<div id="tab"align="center">
<h1>Stock</h1>
<form id="form1" name="form1" method="post" action="">
<input type="hidden" name="txt_pid" value="<?php echo $_GET["pid"]; ?>" />
  <table>
    <tr>
      <td>Date</td>
      <td><label for="txtdate"></label>
      <input type="date" name="txtdate" id="txtdate"  required="required" autocomplete="off"/></td>
    </tr>
    <tr>
      <td>Quantity</td>
      <td><label for="txtqty"></label>
      <input type="number" name="txtqty" id="txtqty"  required="required" autocomplete="off" /></td>
    </tr>
    <tr>
      <td align="center" colspan="2"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
      <input type="submit" name="btncancel" id="btncancel" value="Cancel" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  
   <?php
  $i=0;
  $selQrys = "select * from tbl_stock where product_id='".$_GET["pid"]."'";
  $Results = $Conn->query($selQrys);
  if($Results->num_rows > 0)
  {
	  ?>
  <table>
    <tr>
      <td width="77">SL.NO</td>
      <td width="78">Date</td>
      <td width="86">Quantity</td>
      <td width="53">Action</td>
    </tr>
    
     <?php
		   while($row = $Results->fetch_assoc())
		  {
			  $i++;
			  ?>
              	 <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $row["stock_date"]; ?></td>
                  <td><?php echo $row["stock_qty"]; ?></td>
                  <td><a href="Stock.php?did=<?php echo $row["stock_id"];?>&pid=<?php echo $_GET["pid"]; ?>">Delete</a></td>
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
</html>