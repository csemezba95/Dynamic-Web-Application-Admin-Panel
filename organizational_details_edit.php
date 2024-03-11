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
		
		$get_edit_data_sql = "SELECT * FROM organization_details_infos WHERE id = '$edit_id'";
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
		
		$edit_id = $_POST['edit_id'];
		$title_en = $_POST["title_en"];
		$title_bn = $_POST["title_bn"];
		$text_en = $_POST["text_en"];
		$text_bn = $_POST["text_bn"];
		
		// Edit existing record
		$edit_sql = "UPDATE organization_details_infos SET 
			title_en='$title_en', 
			title_bn='$title_bn', 
			text_en='$text_en', 
			text_bn='$text_bn'
			WHERE id=$edit_id";

		if ($conn->query($edit_sql) === TRUE) {
			$sms = "Record updated successfully";
		} else {
			$sms = "Record updated successfully";
		}

		header("refresh:1;url=organizational_details.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Oganizational Details Edit</title>
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
			<form action="organizational_details_edit.php" method="post" style="border: 1px solid #ddd;padding: 20px;border-radius: 4px;background: aliceblue">
				
				<div class="row">
					<div class="col-md-12">
						<input type="hidden" name="edit_id" value="<?php echo $edit_id; ?>">
						<label for="title_en">Title (English):</label>
						<input type="text" class="form-control" id="title_en" name="title_en" value="<?php echo $get_data_col["title_en"];?>" required><br>				
						
						
						<label for="title_bn">Title (Bangla):</label>
						<input type="text" class="form-control" id="title_bn" name="title_bn" value="<?php echo $get_data_col["title_bn"];?>" required><br>
						
					
						<label for="text_en">Text (English):</label>
						<textarea class="form-control" id="text_en" name="text_en" required><?php echo $get_data_col["text_en"];?></textarea><br>
						
						<label for="text_bn">Text (Bangla):</label>
						<textarea class="form-control" id="text_bn" name="text_bn" required><?php echo $get_data_col["text_bn"];?></textarea><br>
						
					</div>
					
					<div class="col-md-6">
						<br>
						<input type="submit" class="btn btn-primary btn-block" value="Submit">
					</div>	
					<div class="col-md-6">
						<br>
						<a class="btn btn-danger btn-block" href="organizational_details.php">Back</a>
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
