<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Gallery Add</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            padding-top: 56px;
        }
        .container-fluid {
            margin-top: 20px;
        }
        textarea { 
            height: 200px !important; 
        }
        .image-container {
            position: relative;
            display: inline-block;
        }
        .preview-image {
            max-width: 200px;
            max-height: 200px;
            margin: 5px;
            display: block;
        }
        .cancel-button {
            position: absolute;
            top: 5px;
            right: 5px;
            background-color: #d9534f;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            display: none;
            z-index: 1;
        }
        .image-container:hover .cancel-button {
            display: block;
        }
    </style>
</head>
<body>
<?php include('header.php');?>
<?php
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php"); 
        exit();
    }
    include('config.php');

    $sms = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title_en = $_POST["title_en"];
        $title_bn = $_POST["title_bn"];
        $gallery_detail_en = $_POST["gallery_detail_en"];
        $gallery_detail_bn = $_POST["gallery_detail_bn"];

        $insert_sql = "INSERT INTO galleries (title_en, title_bn, gallery_detail_en, gallery_detail_bn) 
            VALUES ('$title_en', '$title_bn', '$gallery_detail_en', '$gallery_detail_bn')";

        if ($conn->query($insert_sql) === TRUE) {
            $last_inserted_id = $conn->insert_id;

            if (!empty($_FILES['img']['tmp_name'])) {
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

            $sms = "Record inserted successfully";
        } else {
            $sms = "Record inserted successfully";
        }

        header("refresh:1;url=gallery.php");
    }
?>

<!-- Your existing header.php and nav.php code -->

<!-- Content -->
<div class="container-fluid">
    <div class="row">
	     <?php include('nav.php');?>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <?php if($sms != null) { ?>
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> <?php echo $sms; ?>
                </div>
            <?php } ?>
            <form action="gallery_add.php" method="post" enctype="multipart/form-data" style="border: 1px solid #ddd;padding: 20px;border-radius: 4px;background: aliceblue">
                <div class="row">
                    <div class="col-md-12">
                        <label for="title_en">Title (English):</label>
                        <input type="text" class="form-control" id="title_en" name="title_en" required><br>                            
                        
                        <label for="title_bn">Title (Bangla):</label>
                        <input type="text" class="form-control" id="title_bn" name="title_bn" required><br>    
                        
                        <label for="gallery_detail_en">Text (English):</label>
                        <textarea class="form-control" id="gallery_detail_en" name="gallery_detail_en" required></textarea><br>
                        
                        <label for="gallery_detail_bn">Text (Bangla):</label>
                        <textarea class="form-control" id="gallery_detail_bn" name="gallery_detail_bn" required></textarea><br>
                    </div>
                    <div class="col-md-12">
                        <label for="img">Images:</label>
                        <div id="imageContainer">
							<img id="myImage" src="<?php echo $backUploadDemo.'slide.png';?>" alt="Image" onclick="browseImage()">
						</div>
                        <input type="file" name="img[]" id="imageInput" accept="image/*" onchange="displaySelectedImages(this)" multiple>
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
        var imageContainer = document.getElementById('imageContainer');

        // Clear previous images and cancel buttons
        imageContainer.innerHTML = '';

        // Loop through selected files
        for (var i = 0; i < input.files.length; i++) {
            var newImageContainer = document.createElement('div');
            newImageContainer.className = 'image-container';

            var newImage = document.createElement('img');
            newImage.className = 'preview-image';
            newImage.src = URL.createObjectURL(input.files[i]);

            newImageContainer.appendChild(newImage);
            imageContainer.appendChild(newImageContainer);
        }

        // Display the image container
        imageContainer.style.display = 'block';
    }
</script>

<style>
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
