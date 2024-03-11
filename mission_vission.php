<?php
	session_start();
	if (!isset($_SESSION['user_id'])) {
		header("Location: login.php"); 
		exit();
	}
	include('config.php');
	
	$get_data_sql = "SELECT * FROM mission_vissions WHERE id = 1";
	$get_data_sql_result = $conn->query($get_data_sql);
	$get_data_col = $get_data_sql_result->fetch_assoc();

	$sms = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		$uploadDirectory = 'public/uploads/';

		$recordId = 1;
		$mission_title_en = $_POST["mission_title_en"];
		$mission_title_bn = $_POST["mission_title_bn"];
		$mission_text_en = $_POST["mission_text_en"];
		$mission_text_bn = $_POST["mission_text_bn"];
		$vission_title_en = $_POST["vission_title_en"];
		$vission_title_bn = $_POST["vission_title_bn"];
		$vission_text_en = $_POST["vission_text_en"];
		$vission_text_bn = $_POST["vission_text_bn"];
		
		
		if (!empty($_FILES['url1']['tmp_name'])) {
			$previousFileName1 = $get_data_col["url1"];
			$previousFilePath1 = $uploadDirectory . $previousFileName1;

			unlink($previousFilePath1);

			$uploadedFile1 = $_FILES['url1']['tmp_name'];
			$originalFileName1 = $_FILES['url1']['name'];
			$fileExtension1 = pathinfo($originalFileName1, PATHINFO_EXTENSION);

			$newFileName1 = time() + 1 . '.' . $fileExtension1;

			$destination1 = $uploadDirectory . $newFileName1;
			move_uploaded_file($uploadedFile1, $destination1);
		} else {
			$newFileName1 = $get_data_col["url1"];
		}
		
		if (!empty($_FILES['url2']['tmp_name'])) {
			$previousFileName2 = $get_data_col["url2"];
			$previousFilePath2 = $uploadDirectory . $previousFileName2;

			unlink($previousFilePath2);

			$uploadedFile2 = $_FILES['url2']['tmp_name'];
			$originalFileName2 = $_FILES['url2']['name'];
			$fileExtension2 = pathinfo($originalFileName2, PATHINFO_EXTENSION);

			$newFileName2 = time() + 2 . '.' . $fileExtension2;

			$destination2 = $uploadDirectory . $newFileName2;
			move_uploaded_file($uploadedFile2, $destination2);
		} else {
			$newFileName2 = $get_data_col["url2"];
		}

		$update_sql = "UPDATE mission_vissions SET 
			mission_title_en = '$mission_title_en',
			mission_title_bn = '$mission_title_bn',
			mission_text_en = '$mission_text_en',
			mission_text_bn = '$mission_text_bn',
			vission_title_en = '$vission_title_en',
			vission_title_bn = '$vission_title_bn',
			vission_text_en = '$vission_text_en',
			vission_text_bn = '$vission_text_bn',
			url1 = " . ($newFileName1 ? "'$newFileName1'" : 'NULL') . ",
			url2 = " . ($newFileName2 ? "'$newFileName2'" : 'NULL') . "
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
    <title>Mission & Vission</title>
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
			<form action="mission_vission.php" method="post" enctype="multipart/form-data" style="border: 1px solid #ddd;padding: 20px;border-radius: 4px;background: aliceblue">
				
				<div class="row">
					<div class="col-md-12">
						<label for="mission_title_en">Mission Title (English):</label>
						<input type="text" class="form-control" id="mission_title_en" name="mission_title_en" value="<?php echo $get_data_col["mission_title_en"];?>" required><br>
						
						<label for="mission_title_bn">Mission Title (Bangla):</label>
						<input type="text" class="form-control" id="mission_title_bn" name="mission_title_bn" value="<?php echo $get_data_col["mission_title_bn"];?>" required><br>
						
						<label for="mission_text_en">Mission Text(English):</label>
						<textarea class="form-control" id="mission_text_en" name="mission_text_en" required><?php echo $get_data_col["mission_text_en"];?></textarea><br>
					
						<label for="mission_text_bn">Mission Text(Bangla):</label>
						<textarea class="form-control" id="mission_text_bn" name="mission_text_bn" required><?php echo $get_data_col["mission_text_bn"];?></textarea><br>
			
						<label for="vission_title_en">Vission Title (English):</label>
						<input type="text" class="form-control" id="vission_title_en" name="vission_title_en" value="<?php echo $get_data_col["vission_title_en"];?>" required><br>
						
						<label for="vission_title_bn">Vission Title (Bangla):</label>
						<input type="text" class="form-control" id="vission_title_bn" name="vission_title_bn" value="<?php echo $get_data_col["vission_title_bn"];?>" required><br>
						
						<label for="vission_text_en">Vission Text(English):</label>
						<textarea class="form-control" id="vission_text_en" name="vission_text_en" required><?php echo $get_data_col["vission_text_en"];?></textarea><br>
					
						<label for="vission_text_bn">Vission Text(Bangla):</label>
						<textarea class="form-control" id="vission_text_bn" name="vission_text_bn" required><?php echo $get_data_col["vission_text_bn"];?></textarea><br>
						
					</div>
					
					<div class="col-md-6">
						<label for="mission_img">Mission Image:</label>
						<div class="image-container">	
							<img id="myImage1" src="<?php echo $backUpload.$get_data_col["url1"];?>" alt="Mission Image" onclick="browseImage1()" width="100%">
							<input type="file" name="url1" id="imageInput1" accept="image/*" onchange="displaySelectedImage1(this)">
						</div>
					</div>						
					
					<div class="col-md-6">
						<label for="vission_img">Vission Image:</label>
						<div class="image-container">	
							<img id="myImage2" src="<?php echo $backUpload.$get_data_col["url2"];?>" alt="Vission Image" onclick="browseImage2()" width="100%">
							<input type="file" name="url2" id="imageInput2" accept="image/*" onchange="displaySelectedImage2(this)">
						</div>
					</div>		
					
			
					
					<div class="col-md-12">
						<br>
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

<script>
	
	function browseImage1() {
        document.getElementById('imageInput1').click();
    }

    function displaySelectedImage1(input) {
        var reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('myImage1').src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
    }
	
	function browseImage2() {
        document.getElementById('imageInput2').click();
    }

    function displaySelectedImage2(input) {
        var reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('myImage2').src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
    }
</script>
<style>
	
	#myImage1, #myImage2{
		max-width: 100%; 
	}
	#imageInput1, #imageInput2 {
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
