<?php
include("../Connection/Connection.php");

?>
<table align="center" cellpadding="60">
  <tr>
  <?php
  $sela="select * from tbl_art a inner join tbl_genere g on g.genere_id=a.genere_id where true AND artist_id='".$_GET["hid"]."'";
  if($_GET["gid"]!=null)
  {
	  $sela.=" and g.genere_id='".$_GET["gid"]."'";
  }
  $rowa=$Conn->query($sela);
  $i=0;
  while($dataa=$rowa->fetch_assoc())
  {
	  $i++;
	  ?>
      <td>
     <p><img src="../Assets/Files/ArtPhoto/<?php echo $dataa["art_photo"]?>" width="150" height="150" /><br /><table><tr><td width="69">
      <b>Title:</b></td><td width="103"><?php echo $dataa["art_title"]?><br /></td></tr>
      <tr><td>
      <b>Price :</b></td><td><?php echo $dataa["art_price"]?><br /></td></tr>
      <tr><td>
      <b>Details :</b></td><td><?php echo $dataa["art_details"]?><br /></td></tr>
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

