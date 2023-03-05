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
			
			$upQry1s = "update tbl_art set art_status='1' where art_id='".$_GET["artid"]."'";
			$Conn->query($upQry1s);
			
			
			 	$selC = "select max(artbooking_id) as id from tbl_artbooking where user_id='" .$_SESSION["uid"]. "'";
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
    
    </tr>
  </table>
 
  <div id="search">
  <table>
  <tr>
  <?php
  $genere="genere_id";
  $sela="select * from tbl_art a inner join tbl_genere g on g.genere_id=a.genere_id";
  $rowa=$Conn->query($sela);
  $i=0;
  while($dataa=$rowa->fetch_assoc())
  {
	  $i++;
	  ?>
      <td height="562" style="padding:40px">
      <img src="../Assets/Files/ArtPhoto/<?php echo $dataa["art_photo"]?>" width="180" height="180" /><br />
      <table border="0">
      <tr>
      <td >
      <b>Title  :</b></td><td width="162"><?php echo $dataa["art_title"]?><br /></td></tr>
      <tr><td>
      <b>Price  :</b></td><td><?php echo $dataa["art_price"]?><br /></td></tr>
      <tr><td>
      <b>Details  :</b></td><td><?php echo $dataa["art_details"]?><br /></td></tr>
      <tr><td >
      <b>Genere Type :</b></td><td><?php echo $dataa["genere_name"]?><br /></td></tr></table>
      <?php
	  $query = "SELECT * FROM tbl_review where art_id = '".$dataa["art_id"]."' ORDER BY review_id DESC";
										
											$result = $Conn->query($query);
											
											$total_user_rating=0;
											
											$average_rating=0;
											
											$total_review=0;
										
											while($row = $result->fetch_assoc())
											{
												
										
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
	  if($dataa["art_status"]==1)
	  {
		  ?>
          <span style="padding:10px;color:red;">Sold</span>
         
          <?php
	  }else
	  {
		  ?>
           <p align="left"><a style="text-decoration:none" href="SearchArt.php?artid=<?php echo $dataa["art_id"];?>">Pay Now</a><br />
           <a style="text-decoration:none" href="SearchArt.php?aid=<?php echo $dataa["art_id"];?>">Cash On Delivary</a></p>
          <?php
	  }
	  
	  ?>
     
      
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
			var gid=document.getElementById("genere").value;
			$.ajax({url:"../Assets/AjaxPages/AjaxSearchArt.php?gid="+gid,
			success: function(result) {
				$("#search").html(result);
			}});
		}
		</script>
</html>