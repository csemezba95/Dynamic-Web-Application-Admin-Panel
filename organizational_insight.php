<?php
	session_start();
	if (!isset($_SESSION['user_id'])) {
		header("Location: login.php"); 
		exit();
	}
	include('config.php');
	
	
	$get_data_sql = "SELECT * FROM organizational_insights WHERE id = 1";
	$get_data_sql_result = $conn->query($get_data_sql);
	$get_data_col = $get_data_sql_result->fetch_assoc();
	
	

	$sms = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$recordId = 1;
			$left_title_en = $_POST["left_title_en"];
			$left_title_bn = $_POST["left_title_bn"];
			$right_title_en = $_POST["right_title_en"];
			$right_title_bn = $_POST["right_title_bn"];
			$left_text_en = $_POST["left_text_en"];
			$left_text_bn = $_POST["left_text_bn"];
			$right_text_en = $_POST["right_text_en"];
			$right_text_bn = $_POST["right_text_bn"];

			$update_sql = "UPDATE organizational_insights SET 
				left_title_en = '$left_title_en',
				left_title_bn = '$left_title_bn',
				right_title_en = '$right_title_en',
				right_title_bn = '$right_title_bn',
				left_text_en = '$left_text_en',
				left_text_bn = '$left_text_bn',
				right_text_en = '$right_text_en',
				right_text_bn = '$right_text_bn'
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
    <title>Organizational Insight</title>
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
			<form action="organizational_insight.php" method="post" style="border: 1px solid #ddd;padding: 20px;border-radius: 4px;background: aliceblue">
				
				<div class="row">
					<div class="col-md-12">
						<label for="left_title_en">Left Title (English):</label>
						<input type="text" class="form-control" id="left_title_en" name="left_title_en" value="<?php echo $get_data_col["left_title_en"];?>" required><br>

						<label for="left_title_bn">Left Title (Bangla):</label>
						<input type="text" class="form-control" id="left_title_bn" name="left_title_bn" value="<?php echo $get_data_col["left_title_bn"];?>" required><br>
						
						<label for="right_title_en">Right Title (English):</label>
						<input type="text" class="form-control" id="right_title_en" name="right_title_en" value="<?php echo $get_data_col["right_title_en"];?>" required><br>

						<label for="right_title_bn">Right Title (Bangla):</label>
						<input type="text" class="form-control" id="right_title_bn" name="right_title_bn" value="<?php echo $get_data_col["right_title_bn"];?>" required><br>

					
						<label for="left_text_en">Left Text(English):</label>
						<textarea class="form-control" id="left_text_en" name="left_text_en" required><?php echo $get_data_col["left_text_en"];?></textarea><br>

						<label for="left_text_bn">Left Text (Bangla):</label>
						<textarea class="form-control" id="left_text_bn" name="left_text_bn" required><?php echo $get_data_col["left_text_bn"];?></textarea><br>
						
				
						
						<label for="right_text_en">Right Text(English):</label>
						<textarea class="form-control" id="right_text_en" name="right_text_en" required><?php echo $get_data_col["right_text_en"];?></textarea><br>

						<label for="right_text_bn">Right Text (Bangla):</label>
						<textarea class="form-control" id="right_text_bn" name="right_text_bn" required><?php echo $get_data_col["right_text_bn"];?></textarea><br>
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
