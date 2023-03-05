<?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php"); 
session_start();
if(isset($_GET["artid"]))
{	
		$insqry="insert into tbl_artbooking(artbooking_date,art_id,user_id,artbooking_status)values(curdate(),'".$_GET["artid"]."','".$_SESSION["uid"]."',1)";
		if($Conn->query($insqry))
		{
			
			$upQry1s = "update tbl_art set art_status='1' where art_id='" .$_GET["artid"]."'";
					$Conn->query($upQry1s);
			
			
			 	$selC = "select max(artbooking_id) as id from tbl_artbooking where user_id='" .$_SESSION["uid"]. "' and artbooking_status='1'";
                $rs = $Conn->query($selC);
                $row=$rs->fetch_assoc();
				
				$_SESSION["abid"] = $row["id"];
			
			
			?>
			<script>
				alert("Booked");
				window.location="ArtPayment.php";
			</script>
			<?php
		}
}


if(isset($_GET["aid"]))
		{
			$insQry="insert into tbl_artbooking(artbooking_date,art_id,user_id,artbooking_status)values(curdate(),'".$_GET["aid"]."','".$_SESSION["uid"]."',1)";
			if($Conn->query($insQry))
			{
				
				$upQry1s = "update tbl_art set art_status='1' where art_id='" .$_GET["aid"]. "'";
			$Conn->query($upQry1s);
				
				?>
			<script>
				alert("Booked");
				window.location="ViewArtBooking.php";
			</script>
			<?php
			}
		}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GalerieDArt::View Works</title>
</head>

<body>
<div id="tab"align="center">
<h1 align="center"><u>Galeriea D'Art</u></h1>
<form id="form1" name="form1" method="post" action="">
  <table>
    <tr>
      <td>Genere Type</td>
      <td><label for="genere"></label>
      <select name="genere" id="genere" onChange="getData()">
		<option value="">-----select-----</option>
        <?php
		$selqry="select * from tbl_genere";
		$result=$Conn->query($selqry);
		while($row=$result->fetch_assoc())
		{
			?>
            <option value="<?php echo $row["genere_id"]?>"><?php echo $row["genere_name"]?></option>
            <?php
		}
		?>
        </select></td>
         <input type="hidden" required value="<?php echo $_GET["id"]?>"name="txt_id" id="txt_id" />
    
    </tr>
  </table>
 
  <div id="search">
  <table>
  <tr>
  <?php
  $genere="genere_id";
  $sela="select * from tbl_art a inner join tbl_genere g on g.genere_id=a.genere_id where artist_id='".$_GET["id"]."'";
  $rowa=$Conn->query($sela);
  $i=0;
  while($dataa=$rowa->fetch_assoc())
  {
	  $i++;
	  ?>
      <td style="padding:30px">
      <p><img src="../Assets/Files/ArtPhoto/<?php echo $dataa["art_photo"]?>" width="150" height="150" /><br />
      <table><tr><td width="124">
      <b>Title  :</b></td><td width="162"><?php echo $dataa["art_title"]?><br /></td></tr>
      <tr><td>
      <b>Price  :</b></td><td><?php echo $dataa["art_price"]?><br /></td></tr>
      <tr><td>
    <b>Details  :</b></td><td><?php echo $dataa["art_details"]?><br /></td></tr>
    <tr><td>
      <b>Genere Type :</b></td><td><?php echo $dataa["genere_name"]?><br /></td></tr></table>
      <?php
	  if($dataa["art_status"]==1)
	  {
		  ?>
          <span style="padding:10px;color:red;">Sold</span>
         
          <?php
	  }else
	  {
		  ?>
          <a style="text-decoration:none" href="ViewWorks.php?artid=<?php echo $dataa["art_id"];?>&id=<?php echo $_GET["id"];?>">Pay Now</a><br />
         <a style="text-decoration:none" href="ViewWorks.php?aid=<?php echo $dataa["art_id"];?>&id=<?php echo $_GET["id"];?>">Cash on Delivary</a>
      
          <?php
	  }
	  
	  ?>
     
      </p>
      </td>
      
      <?php
	  if($i==4)
	  {
		  echo "</tr>";
		  $i=0;
		  echo "<tr>";
	  }
  }

  ?>
  </table>
</form>
</div>
</body>
<script src="../Assets/JQ/jQuery.js"></script>
	<script>
		
		function getData()
		{
			var hid=document.getElementById("txt_id").value;
			var gid=document.getElementById("genere").value;
			$.ajax({url:"../Assets/AjaxPages/AjaxViewWork.php?gid="+gid+"&hid="+hid,
			success: function(result) {
				$("#search").html(result);
			}});
		}
		</script>
</html>