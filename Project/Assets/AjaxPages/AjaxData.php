
<?php
include("../Connection/Connection.php");

?>
<table align="center" cellpadding="60">
  <tr>
  <?php
  $sela="select * from tbl_artist a inner join tbl_place p on p.place_id=a.place_id inner join tbl_district d on d.district_id=p.district_id where true AND  artist_vstatus='1'";
  if($_GET["did"]!=null)
  {
	  $sela.=" and p.district_id='".$_GET["did"]."'";
  }
  if($_GET["pid"]!=null)
  {
	  $sela.=" and p.place_id='".$_GET["pid"]."'";
  }
  $rowa=$Conn->query($sela);
  $i=0;
  while($dataa=$rowa->fetch_assoc())
  {
	  $i++;
	  ?>
      <td  style="padding:30px">
      <p><img src="../Assets/Files/Photos/<?php echo $dataa["artist_photo"]?>" width="150" height="150" /><br />
      <table>
      <tr>
      <td width="90">Name :</td><td width="27"><b><?php echo $dataa["artist_name"]?></b></td>
      </tr>
      <tr>
      <td>Contact :</td><td><b><?php echo $dataa["artist_contact"]?></b></td>
      </tr>
      <tr>
      <td>Email :</td><td><b><?php echo $dataa["artist_email"]?></b></td>
      </tr>
      <tr>
      <td>Address :</td><td><b><?php echo $dataa["artist_address"]?></b></td>
      </tr>
      <tr>
      <td colspan="2"><a href="ViewWorks.php?id=<?php echo $dataa["artist_id"];?>">View work</a>
      </p>
      </td>
      </tr>
      </table>
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
   
		
	

