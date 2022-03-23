<?php
	
	// Obtaining connection
	$connection = @mysql_connect("localhost", "root", "") or die(mysql_error());
	
	
	// Sql query
	$sql = "SELECT * FROM leavesystemphp.leave_requests";
	//$sql2 = "SELECT COUNT(*) FROM leavesystemphp.staff WHERE first_name LIKE '%$name%' OR middle_name LIKE '%$name%' OR last_name LIKE '%$name%'" ;
	//$sql2 = "SELECT password FROM login WHERE name = '$staff_id'"; 
	
	
	// Firing query
	$result = mysql_query($sql, $connection);
	//$result2 = mysql_query($sql2, $connection);
	//$result2 = odbc_exec($connection, $sql2);
	
	if(mysql_num_rows($result)==0)
	{
		echo 	"<script>
				alert(\"Search results not found !\");
				window.location=\"#\";</script>";
	}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Leave </title>
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-image: url(../images/bg.gif);
}
</style>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">
  <div id="header">
    <div id="title"></div>
    <div id="quick_links">
      <ul>
        <li><a class="home" href="index.php">Home</a></li>
        <li>|</li>
        <li><a class="logout" href="homepage.php">Back</a></li>
        <li>|</li>
        
      </ul>
    </div>
  </div>
  <div id="content_panel">
    <div id="heading">Leave List
      <hr size="2" color="#FFFFFF" ice:repeating=""/>
    </div>
    <div id="table">
    	 <?PHP
			echo "<span><table border=\"1\" bgcolor=\"#006699\" >
				<tr>
					<th width=\"200px\">Name</th>
					<th width=\"200px\">Leave Type</th>
					<th width=\"70px\">Start Date</th>
					<th width=\"100px\">End Date</th>
                    <th width=\"100px\">No. Of. Days</th>
					<th width=\"100px\">Date Applied</th>
                    <th width=\"100px\">Leave Status</th>
				</tr>
			</table></span>";
			while($row = mysql_fetch_array($result))
			{
				
				$staff_id = $row['staff_id'];
				$ltype = $row['leave_type'];
				$sdate = $row['start_date'];
                $edate=$row['end_date'];
                $dater=$row['days_requested'];
                $datea=$row['date_applied'];
                $lstatus=$row['leave_status'];
                echo "<table border=\"1\">
						<tr>
							<td width=\"200px\">".$staff_id."</td>
							<td width=\"200px\">".$ltype."</td>
						    <td width=\"70px\">".$sdate."</td>
							<td width=\"100px\">".$edate."</td>
                            <td width=\"100px\">".$dater."</td>
							<td width=\"100px\">".$datea."</td>
                            <td width=\"100px\">".$lstatus."</td>
						</tr>
						
					</table>";
			}
			
		mysql_close($connection);
		
	?>
    </div>
  </div>
  <?php $page = 'view_leave'; include 'sidebar.php'?>
  <div id="footer">
  	
  </div>
</div>
</body>
</html>

