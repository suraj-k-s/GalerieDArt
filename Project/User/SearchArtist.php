
<?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GalerieDArt::Search Artist</title>
</head>

<body>
<div id="tab" align="center">
<h1 align="center"><u>Search Artist</u></h1>

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
      <td> <label for="place"></label>
       <select name="place" id="place" onchange="getData()">
      <option value="">------Select------</option>
      </select></td>
    </tr>
  </table>
  <div id="search">
  </div>
</form>
</body>
<script src="../Assets/JQ/jQuery.js"></script>
	<script>

		function getPlace(did)
		{
			$.ajax({url:"../Assets/AjaxPages/AjaxPlace.php?did="+did,
			success: function(result) {
				$("#place").html(result);
				getData();
			}});
		}
		
		function getData()
		{
			var did=document.getElementById("district").value;
			var pid=document.getElementById("place").value;
			$.ajax({url:"../Assets/AjaxPages/AjaxData.php?did="+did+"&pid="+pid,
			success: function(result) {
				$("#search").html(result);
			}});
		}
		</script>
</html>