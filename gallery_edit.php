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
		
		$get_edit_data_sql = "SELECT * FROM galleries WHERE id = '$edit_id'";
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

		$title_en = $_POST["title_en"];
		$title_bn = $_POST["title_bn"];
		$gallery_detail_en = $_POST["gallery_detail_en"];
		$gallery_detail_bn = $_POST["gallery_detail_bn"];

		$edit_id = $_POST['edit_id'];
		
		// Edit existing record
		$edit_sql = "UPDATE galleries SET 
			title_en='$title_en', 
			title_bn='$title_bn', 
			gallery_detail_en='$gallery_detail_en', 
			gallery_detail_bn='$gallery_detail_bn'
			WHERE id=$edit_id";

		if ($conn->query($edit_sql) === TRUE) {
			if (!empty($_FILES['img']['tmp_name'])) {
				$last_inserted_id = $edit_id;
                $uploadDirectory = 'public/uploads/';
                $uploadedFiles = $_FILES['img'];

                foreach ($uploadedFiles['name'] as $key => $value) {
                    $uploadedFile = $uploadedFiles['tmp_name'][$key];
                    $fileExtension = pathinfo($value, PATHINFO_EXTENSION);

                    $newFileName = time() + rand(1, 1000) . '.' . $fileExtension;

                    $destination = $uploadDirectory . $newFileName;
                    move_uploaded_file($uploadedFile, $destination);

                    $insert_file_sql = "INSERT INTO galleries_file (galleries_id, img) 
                        VALUES ('$last_inserted_id', '$newFileName')";
                    $conn->query($insert_file_sql);
                }
            }
			$sms = "Record updated successfully";
		} else {
			$sms = "Record updated successfully";
		}

		header("refresh:1;url=gallery.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Gallery Edit</title>
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
			<form action="gallery_edit.php" method="post" enctype="multipart/form-data" style="border: 1px solid #ddd;padding: 20px;border-radius: 4px;background: aliceblue">
				
				<div class="row">
					<div class="col-md-12">
						<input type="hidden" name="edit_id" value="<?php echo $edit_id; ?>">
						
						<label for="title_en">Title (English):</label>
						<input type="text" class="form-control" id="title_en" name="title_en" value="<?php echo $get_data_col["title_en"];?>" required><br>				
						
						<label for="title_bn">Title (Bangla):</label>
						<input type="text" class="form-control" id="title_bn" name="title_bn" value="<?php echo $get_data_col["title_bn"];?>" required><br>							
						
					
						<label for="gallery_detail_en">Details (English):</label>
						<textarea class="form-control" id="gallery_detail_en" name="gallery_detail_en" required><?php echo $get_data_col["gallery_detail_en"];?></textarea><br>						
						
						<label for="gallery_detail_bn">Details (Bangla):</label>
						<textarea class="form-control" id="gallery_detail_bn" name="gallery_detail_bn" required><?php echo $get_data_col["gallery_detail_bn"];?></textarea><br>
						
					</div>
					
			
					<div class="col-md-12">
						<label for="img">Images:</label>
						
						<div>
							<img id="myImage" src="<?php echo $backUploadDemo.'slide.png';?>" alt="Image" onclick="browseImage()">
							<div id="imageContainerNew" class="imageContainerNew"></div>
						</div>
						
						<div id="imageContainer">
							<!-- Display existing images with delete button -->
							<?php
								$image_data_sql = "SELECT * FROM galleries_file WHERE galleries_id = '$edit_id'";
								$image_data_sql_result = $conn->query($image_data_sql);
								foreach ($image_data_sql_result as $image_data_sql_result_row) {
							?>
								<div class="image-container">
									<img src="<?php echo $backUpload.$image_data_sql_result_row["img"]; ?>" alt="Image" style="width: 200px;padding-bottom: 4px;">
									<button style="position: relative;right: 50%;" type="button" class="btn btn-danger btn-sm" onclick="deleteImage(<?php echo $image_data_sql_result_row["id"]; ?>)"><i class="fa fa-trash"></i></button>
								</div>
							<?php } ?>

							<!-- Display selected images -->
							<div id="selectedImages"></div>

							<input type="file" name="img[]" id="imageInput" accept="image/*" onchange="displaySelectedImages(this)" multiple>
						</div>
					</div>
					
					<div class="col-md-6">
						<br>
						<input type="submit" class="btn btn-primary btn-block" value="Submit">
					</div>	
					<div class="col-md-6">
						<br>
						<a class="btn btn-danger btn-block" href="gallery.php">Back</a>
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

    function displaySelectedImages(input) {
        var imageContainer = document.getElementById('imageContainerNew');

        // Clear previous images and cancel buttons
        imageContainer.innerHTML = '';

        // Loop through selected files
        for (var i = 0; i < input.files.length; i++) {
            var newImageContainer = document.createElement('div');
            newImageContainer.className = 'imageContainerNew';

            var newImage = document.createElement('img');
            newImage.className = 'sideBySideImage';
            newImage.src = URL.createObjectURL(input.files[i]);

            newImageContainer.appendChild(newImage);
            imageContainer.appendChild(newImageContainer);
        }

        // Display the image container
        imageContainer.style.display = 'block';
    }
	
	function deleteImage(imageId) {
    if (confirm("Are you sure you want to delete this image?")) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText.trim() === 'Image deleted successfully') {
                    window.location.href = "www.facebook.com";
                } else {
                    document.getElementById("imageContainer").innerHTML = this.responseText;
                }
            }
        };
        xhttp.open("GET", "gallery_image_delete.php?id=" + imageId, true);
        xhttp.send();
		
		setTimeout(function() {
			window.location.href = "gallery_edit.php?id=<?php echo $edit_id; ?>";
		}, 100);

    }
}

</script>
<style>
	.imageContainerNew {
        white-space: nowrap; 
        overflow-x: auto;
		float: left;
		margin-bottom: 2px;
    }

    .sideBySideImage {
        display: inline-block;
        margin-right: 5px; 
        max-width: 200px; 
        height: auto;
    }
	.preview-image{
		width: 200px;
	}
	#myImage{
		height: 200px;
		border: 1px solid #ddd;
		padding-top: 15px;
		width: 100%;
	}
	#imageInput {
		position: relative;
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
