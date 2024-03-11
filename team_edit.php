<?php
	session_start();
	if (!isset($_SESSION['user_id'])) {
		header("Location: login.php"); 
		exit();
	}
	include('config.php');
	
	
	// Fetch data for editing based on the ID from the URL
	$edit_id = isset($_GET['id']) ? $_GET['id'] : null;
	$get_data_col = null;

	if ($edit_id) {
		
		$get_edit_data_sql = "SELECT * FROM teams WHERE id = '$edit_id'";
		$get_edit_data_result = $conn->query($get_edit_data_sql);

		if ($get_edit_data_result && $get_edit_data_result->num_rows > 0) {
			$get_data_col = $get_edit_data_result->fetch_assoc();
		} else {
			echo "Record not found!";
			exit();
		}
	}


	// Update data after editing
	$sms = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$uploadDirectory = 'public/uploads/';

		$team_member_name_en = $_POST["team_member_name_en"];
		$team_member_name_bn = $_POST["team_member_name_bn"];
		$team_member_designation_en = $_POST["team_member_designation_en"];
		$team_member_designation_bn = $_POST["team_member_designation_bn"];
		$team_member_details_en = $_POST["team_member_details_en"];
		$team_member_details_bn = $_POST["team_member_details_bn"];

		$edit_id = $_POST['edit_id'];
		$get_data_sql = "SELECT * FROM teams WHERE id = '$edit_id'";
		$get_data_result = $conn->query($get_data_sql);

		if ($get_data_result && $get_data_result->num_rows > 0) {
			$get_data_col = $get_data_result->fetch_assoc();
			$previousFileName = $get_data_col["img"];
		} else {
			echo "Record not found!";
			exit();
		}

		if (!empty($_FILES['img']['tmp_name'])) {
			$previousFilePath = $uploadDirectory . $previousFileName;
			unlink($previousFilePath);

			$uploadedFile = $_FILES['img']['tmp_name'];
			$fileExtension = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);

			$newFileName = time() . '.' . $fileExtension;

			$destination = $uploadDirectory . $newFileName;
			move_uploaded_file($uploadedFile, $destination);
		} else {
			$newFileName = $previousFileName;
		}

		// Edit existing record
		$edit_sql = "UPDATE teams SET 
			team_member_name_en='$team_member_name_en', 
			team_member_name_bn='$team_member_name_bn', 
			team_member_designation_en='$team_member_designation_en', 
			team_member_designation_bn='$team_member_designation_bn', 
			team_member_details_en='$team_member_details_en', 
			team_member_details_bn='$team_member_details_bn', 
			img='$newFileName' 
			WHERE id=$edit_id";

		if ($conn->query($edit_sql) === TRUE) {
			$sms = "Record updated successfully";
		} else {
			$sms = "Record updated successfully";
		}

		header("refresh:1;url=team.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Team Edit</title>
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
			<form action="team_edit.php" method="post" enctype="multipart/form-data" style="border: 1px solid #ddd;padding: 20px;border-radius: 4px;background: aliceblue">
				
				<div class="row">
					<div class="col-md-12">
						<input type="hidden" name="edit_id" value="<?php echo $edit_id; ?>">
						
						<label for="team_member_name_en">Team Member Name (English):</label>
						<input type="text" class="form-control" id="team_member_name_en" name="team_member_name_en" value="<?php echo $get_data_col["team_member_name_en"];?>" required><br>				
						
						<label for="team_member_name_bn">Team Member Name (Bangla):</label>
						<input type="text" class="form-control" id="team_member_name_bn" name="team_member_name_bn" value="<?php echo $get_data_col["team_member_name_bn"];?>" required><br>							
						
						<label for="team_member_designation_en">Team Member Designation (English):</label>
						<input type="text" class="form-control" id="team_member_designation_en" name="team_member_designation_en" value="<?php echo $get_data_col["team_member_designation_en"];?>" required><br>	
						
						<label for="team_member_designation_bn">Team Member Designation (Bangla):</label>
						<input type="text" class="form-control" id="team_member_designation_bn" name="team_member_designation_bn" value="<?php echo $get_data_col["team_member_designation_bn"];?>" required><br>	
						
						<label for="team_member_details_en">Team Team Details (English):</label>
						<textarea class="form-control" id="team_member_details_en" name="team_member_details_en" required><?php echo $get_data_col["team_member_details_en"];?></textarea><br>						
						
						<label for="team_member_details_bn">Team Team Details (Bangla):</label>
						<textarea class="form-control" id="team_member_details_bn" name="team_member_details_bn" required><?php echo $get_data_col["team_member_details_bn"];?></textarea><br>
						
						
					</div>
					
					<div class="col-md-12">
						<label for="img">Image:</label>
						<div class="image-container">	
							
							<?php if($get_data_col['img'] !=null){?>
								<img id="myImage" src="<?php echo $backUpload.$get_data_col["img"];?>" alt="Image" onclick="browseImage()" width="100%">
							<?php } else{ ?>
						
							<img id="myImage" src="<?php echo $backUploadDemo.'slide.png';?>" alt="Image" onclick="browseImage()" width="100%">
								<?php } ?>
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
