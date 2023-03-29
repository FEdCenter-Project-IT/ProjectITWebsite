<?php

// Set the name and picture
$name = "Jose Padilla";
$picture = "img/intern_profile.png";

?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $name ?>View Profile</title>
	<style>
		body {
			margin: 0; /* Remove default margin from body */
            background-color:  aliceblue; /* Set background c */
		}
		.main-container {
			display: flex; /* Use flexbox to arrange items in a row */
			margin: 0 auto;
			width: 90%;
			height: 90h;
			background-color: #d2b48c;
			padding: 20px;
			border: 2px solid black;
		}
		.profile-picture-table {
			display: table;
			width: 30%;
			margin-right: 20px;
			border: 2px solid black;
			border-collapse: collapse;
			text-align: center;
			padding: 10px;
		}
		.profile-picture-cell {
			display: table-cell;
			vertical-align: middle;
			text-align: center;
		}
		.profile-picture {
			max-width: 100%;
			max-height: 100%;
		}
		.info-table {
			display: table;
			width: 70%;
		}
		table {
			margin: 0 auto;
			background-color: #F2F2F2;
			border-collapse: collapse;
			border: 2px solid black;
			width: 100%;
		}
		th, td {
			padding: 10px;
			border: 1px solid black;
		}
		.caption {
			text-align: center;
			margin-top: 10px;
			font-weight: bold;
			font-size: 16px;
		}
        .logo {
			display: block;
			margin: 20px auto;
			max-width: 300px;
		}
	</style>
</head>
<body>
<img class="logo" src="img/FedCenter_Logo-removebg-preview.png" alt="Logo">
	<div class="main-container">
		<!-- Left table for profile picture -->
		<div class="profile-picture-table">
			
				<div style="border: 0px solid black; padding: 10px;">
					<img class="profile-picture" src="<?php echo $picture ?>" alt="<?php echo $name ?>'s Profile Picture">
				</div>
				
			
		</div>
		
		<!-- Right table for information -->
		<div class="info-table">
			<!-- Main table -->
			<table>
				<tr>
					<th>NAME</th>
					<td><?php echo $name ?></td>
				</tr>
				<tr>
					<th>FID</th>
					<td>JOP- 202390</td>
				</tr>
				<tr>
					<th>PROJECTS</th>
					<td>Project IT</td>
				</tr>
				<tr>
					<th>TOTAL HOURS</th>
					<td>125.90 Hrs</td>
				</tr>
				<tr>
					<th>REQUIRED HOURS</th>
					<td>500 Hrs</td>
				</tr>
				<tr>
					<th>REMAINING HOURS</th>
					<td>374.10 Hrs</td>
				</tr>
			</table>

			<!-- Small table for all users -->
			<table>
				<tr>
					<th>Action Items/ Project</th>
					<th>Date</th>
					<th>Timeframe</th>
					<th>Status</th>
				</tr>
				<tr>
					<td>FIS System</td>
					<td>March 20, 2023</td>
					<td>08:00 AM - 09:00 AM</td>
					<td>Pending</td>
				</tr>
				<tr>
					<td>Minutes of Meeting</td>
					<td>March 20, 2023</td>
					<td>08:00 AM - 09:00 AM</td>
					<td>Closed</td>
				</tr>
				<tr>
					<td>Hosting</td>
					<td>March 20, 2023</td>
					<td>08:00 AM - 09:00 AM</td>
					<td>Closed</td>
				</tr>
				<tr>
					<td>Meeting</td>
					<td>March 20, 2023</td>
					<td>08:00 AM - 09:00 AM</td>
					<td>Closed</td>
				</tr>
			</table>
		</div>
	</div>

</body>
</html>