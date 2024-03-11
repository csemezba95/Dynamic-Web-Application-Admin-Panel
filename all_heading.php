<?php
	session_start();
	if (!isset($_SESSION['user_id'])) {
		header("Location: login.php"); 
		exit();
	}
	include('config.php');
	
	
	$get_data_sql = "SELECT * FROM all_headings WHERE id = 1";
	$get_data_sql_result = $conn->query($get_data_sql);
	$get_data_col = $get_data_sql_result->fetch_assoc();
	
	

	$sms = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$recordId = 1;
			$reason_for_popularity_en = $_POST["reason_for_popularity_en"];
			$reason_for_popularity_bn = $_POST["reason_for_popularity_bn"];
			$compassionate_care_en = $_POST["compassionate_care_en"];
			$compassionate_care_bn = $_POST["compassionate_care_bn"];
			$who_we_are_en = $_POST["who_we_are_en"];
			$who_we_are_bn = $_POST["who_we_are_bn"];
			$team_en = $_POST["team_en"];
			$team_bn = $_POST["team_bn"];
			$what_we_do_en = $_POST["what_we_do_en"];
			$what_we_do_bn = $_POST["what_we_do_bn"];
			$our_projects_en = $_POST["our_projects_en"];
			$our_projects_bn = $_POST["our_projects_bn"];
			$our_gallery_en = $_POST["our_gallery_en"];
			$our_gallery_bn = $_POST["our_gallery_bn"];
			$contact_us_en = $_POST["contact_us_en"];
			$contact_us_bn = $_POST["contact_us_bn"];

			$update_sql = "UPDATE all_headings SET 
				reason_for_popularity_en = '$reason_for_popularity_en',
				reason_for_popularity_bn = '$reason_for_popularity_bn',
				compassionate_care_en = '$compassionate_care_en',
				compassionate_care_bn = '$compassionate_care_bn',
				who_we_are_en = '$who_we_are_en',
				who_we_are_bn = '$who_we_are_bn',
				team_en = '$team_en',
				team_bn = '$team_bn',
				what_we_do_en = '$what_we_do_en',
				what_we_do_bn = '$what_we_do_bn',
				our_projects_en = '$our_projects_en',
				our_projects_bn = '$our_projects_bn',
				our_gallery_en = '$our_gallery_en',
				our_gallery_bn = '$our_gallery_bn',
				contact_us_en = '$contact_us_en',
				contact_us_bn = '$contact_us_bn'
				WHERE id = $recordId";
			
			if ($conn->query($update_sql) === TRUE) {
				$sms = "Record updated successfully";
			} else {
				$sms = "Record updated successfully";
			}
			header("refresh:1;url=".$_SERVER['PHP_SELF']);
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>All Heading</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            padding-top: 56px; /* Adjust the top padding based on your navbar height */
        }
        .container-fluid {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<?php include('header.php');?>

<!-- Content -->
<div class="container-fluid">
    <div class="row">
        <?php include('nav.php');?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
			
			<?php if($sms !=null){?>
		
			  <div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Success!</strong> <?php echo $sms;?>
			  </div>
			  
			<?php } ?>
			<form action="all_heading.php" method="post" style="border: 1px solid #ddd;padding: 20px;border-radius: 4px;background: aliceblue">
				
				
				<div class="row">
					
					<div class="col-md-4">
						<label for="reason_for_popularity_en">Reason for Popularity (English):</label>
						<input type="text" class="form-control" id="reason_for_popularity_en" name="reason_for_popularity_en" value="<?php echo $get_data_col["reason_for_popularity_en"];?>" required><br>

						<label for="reason_for_popularity_bn">Reason for Popularity (Bangla):</label>
						<input type="text" class="form-control" id="reason_for_popularity_bn" name="reason_for_popularity_bn" value="<?php echo $get_data_col["reason_for_popularity_bn"];?>" required><br>

						<label for="compassionate_care_en">Compassionate Care (English):</label>
						<input type="text" class="form-control" id="compassionate_care_en" name="compassionate_care_en" value="<?php echo $get_data_col["compassionate_care_en"];?>" required><br>

						<label for="compassionate_care_bn">Compassionate Care (Bangla):</label>
						<input type="text" class="form-control" id="compassionate_care_bn" name="compassionate_care_bn" value="<?php echo $get_data_col["compassionate_care_bn"];?>" required><br>

						<label for="who_we_are_en">Who We Are (English):</label>
						<input type="text" class="form-control" id="who_we_are_en" name="who_we_are_en" value="<?php echo $get_data_col["who_we_are_en"];?>" required><br>

						<label for="who_we_are_bn">Who We Are (Bangla):</label>
						<input type="text" class="form-control" id="who_we_are_bn" name="who_we_are_bn" value="<?php echo $get_data_col["who_we_are_bn"];?>" required><br>
					</div>
					<div class="col-md-4">
						<label for="team_en">Team (English):</label>
						<input type="text" class="form-control" id="team_en" name="team_en" value="<?php echo $get_data_col["team_en"];?>" required><br>

						<label for="team_bn">Team (Bangla):</label>
						<input type="text" class="form-control" id="team_bn" name="team_bn" value="<?php echo $get_data_col["team_bn"];?>" required><br>

						<label for="what_we_do_en">What We Do (English):</label>
						<input type="text" class="form-control" id="what_we_do_en" name="what_we_do_en" value="<?php echo $get_data_col["what_we_do_en"];?>" required><br>

						<label for="what_we_do_bn">What We Do (Bangla):</label>
						<input type="text" class="form-control" id="what_we_do_bn" name="what_we_do_bn" value="<?php echo $get_data_col["what_we_do_bn"];?>" required><br>

						<label for="our_projects_en">Our Projects (English):</label>
						<input type="text" class="form-control" id="our_projects_en" name="our_projects_en" value="<?php echo $get_data_col["our_projects_en"];?>" required><br>

						<label for="our_projects_bn">Our Projects (Bangla):</label>
						<input type="text" class="form-control" id="our_projects_bn" name="our_projects_bn" value="<?php echo $get_data_col["our_projects_bn"];?>" required><br>
					</div>
					<div class="col-md-4">	
						<label for="our_gallery_en">Our Gallery (English):</label>
						<input type="text" class="form-control" id="our_gallery_en" name="our_gallery_en" value="<?php echo $get_data_col["our_gallery_en"];?>" required><br>

						<label for="our_gallery_bn">Our Gallery (Bangla):</label>
						<input type="text" class="form-control" id="our_gallery_bn" name="our_gallery_bn" value="<?php echo $get_data_col["our_gallery_bn"];?>" required><br>

						<label for="contact_us_en">Contact Us (English):</label>
						<input type="text" class="form-control" id="contact_us_en" name="contact_us_en" value="<?php echo $get_data_col["contact_us_en"];?>" required><br>

						<label for="contact_us_bn">Contact Us (Bangla):</label>
						<input type="text" class="form-control" id="contact_us_bn" name="contact_us_bn" value="<?php echo $get_data_col["contact_us_bn"];?>" required><br>
						<input type="submit" class="btn btn-primary" value="Submit">
					</div>
					
			
				</div>
			</form>
        </main>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
