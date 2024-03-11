<?php
	session_start();
	if (!isset($_SESSION['user_id'])) {
		header("Location: login.php"); 
		exit();
	}
	include('config.php');
	


	$sms = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		$uploadDirectory = 'public/uploads/';

		$team_member_name_en = $_POST["team_member_name_en"];
		$team_member_name_bn = $_POST["team_member_name_bn"];
		$team_member_designation_en = $_POST["team_member_designation_en"];
		$team_member_designation_bn = $_POST["team_member_designation_bn"];
		$team_member_details_en = $_POST["team_member_details_en"];
		$team_member_details_bn = $_POST["team_member_details_bn"];
		
		
		if (!empty($_FILES['img']['tmp_name'])) {
		
			$uploadedFile = $_FILES['img']['tmp_name'];
			$originalFileName = $_FILES['img']['name'];
			$fileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION);

			$newFileName = time() + 1 . '.' . $fileExtension;

			$destination = $uploadDirectory . $newFileName;
			move_uploaded_file($uploadedFile, $destination);
		}
		
		$insert_sql = "INSERT INTO teams (team_member_name_en, team_member_name_bn, team_member_designation_en, team_member_designation_bn, team_member_details_en, team_member_details_bn, img) 
			VALUES ('$team_member_name_en', '$team_member_name_bn', '$team_member_designation_en', '$team_member_designation_bn',  '$team_member_details_en',  '$team_member_details_bn', '$newFileName')";


		if ($conn->query($insert_sql) === TRUE) {
			$sms = "Record inserted successfully";
		} else {
			$sms = "Record inserted successfully";
		}

		header("refresh:1;url=team.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Team Add</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            padding-top: 56px;
        }
        .container-fluid {
            margin-top: 20px;
        }
		textarea{ 
			height: 200px !important; 
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
			<form action="team_add.php" method="post" enctype="multipart/form-data" style="border: 1px solid #ddd;padding: 20px;border-radius: 4px;background: aliceblue">
				
				<div class="row">
					<div class="col-md-12">
						<label for="team_member_name_en">Team Member Name (English):</label>
						<input type="text" class="form-control" id="team_member_name_en" name="team_member_name_en" required><br>	

						<label for="team_member_name_bn">Team Member Name (Bangla):</label>
						<input type="text" class="form-control" id="team_member_name_bn" name="team_member_name_bn" required><br>							
						
						<label for="team_member_designation_en">Team Member Designation (English):</label>
						<input type="text" class="form-control" id="team_member_designation_en" name="team_member_designation_en" required><br>	
						
						<label for="team_member_designation_bn">Team Member Designation (Bangla):</label>
						<input type="text" class="form-control" id="team_member_designation_bn" name="team_member_designation_bn" required><br>	
						
						<label for="team_member_details_en">Team Team Details (English):</label>
						<textarea class="form-control" id="team_member_details_en" name="team_member_details_en" required></textarea><br>						
						
						<label for="team_member_details_bn">Team Team Details (Bangla):</label>
						<textarea class="form-control" id="team_member_details_bn" name="team_member_details_bn" required></textarea><br>
						
					</div>
					
					<div class="col-md-12">
						<label for="img">Image:</label>
						<div class="image-container">	
							<img id="myImage" src="<?php echo $backUploadDemo.'slide.png';?>" alt="Image" onclick="browseImage()" width="100%">
							<input type="file" name="img" id="imageInput" accept="image/*" onchange="displaySelectedImage(this)">
						</div>
					</div>						
					
					<div class="col-md-6">
						<br>
						<input type="submit" class="btn btn-primary btn-block" value="Submit">
					</div>	
					<div class="col-md-6">
						<br>
						<a class="btn btn-danger btn-block" href="team.php">Back</a>
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

<script>
	
	function browseImage() {
        document.getElementById('imageInput').click();
    }

    function displaySelectedImage(input) {
        var reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('myImage').src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
    }
	
	
</script>
<style>
	
	#myImage{
		max-width: 100%; 
	}
	#imageInput {
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		opacity: 0;
		cursor: pointer;
	}
</style>
</body>
</html>
