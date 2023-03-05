<?php
ob_start();
include("Head.php");
session_start();
include("../Assets/Connection/Connection.php");

if(isset($_POST["btnsubmit"]))
{
	$count=$_POST["txtcount"];
	$fdate=$_POST["txtfdate"];
	
	$insQry=" insert into tbl_exhibitionbooking(booking_date,booking_count,booking_fordate,user_id,exhibition_id)values(curdate(),'".$count."','".$fdate."','".$_SESSION["uid"]."','".$_GET["id"]."')";
			if($Conn->query($insQry))
			{
				$selQry = "select max(booking_id) as ebid from tbl_exhibitionbooking";
				$result=$Conn->query($selQry);
				$row=$result->fetch_assoc();
				
				$_SESSION["ebid"] = $row["ebid"];
				
				
				?>
            	<script>
						location.href='EPayment.php';
					</script>
				<?php
			}
			else
			{
				?>
            	<script>
						alert('failed!');
						location.href='ExhibitionBooking.php';
				</script>
                <?php
            }

}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GalerieDArt::Exhibition Booking</title>
</head>

<body>
<div id="tab" align="center">
<h1>Exhibition Booking</h1>
<form id="form1" name="form1" method="post" action="">
  <table>
    <tr>
      
      <td>Count</td>
      <td><label for="txtcount"></label>
      <input type="text" name="txtcount" id="txtcount"  required="required" autocomplete="off"/></td>
    </tr>
    <tr>
      <td>For Date</td>
      <td><label for="txtfdate"></label>
      <input type="date" name="txtfdate" id="txtfdate"  required="required" autocomplete="off" /></td>
    </tr>
    <tr>
      <td align="center" colspan="2"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" /></td>
    </tr>
  </table>
</form>
</div>

</body>
</html>