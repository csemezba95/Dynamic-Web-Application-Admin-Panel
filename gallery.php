<?php
	session_start();
	if (!isset($_SESSION['user_id'])) {
		header("Location: login.php"); 
		exit();
	}
	include('config.php');
	
	$msg = "";
	
	//get data
	$get_data_sql = "SELECT * FROM galleries";
	$get_data_sql_result = $conn->query($get_data_sql);
	
	//delete data
	if (isset($_POST['delete_id'])) {
		
		//existing image delete
		$delete_id = $_POST['delete_id'];
		$uploadDirectory = 'public/uploads/';
		$get_all_data_sql = "SELECT * FROM galleries_file WHERE galleries_id = '$delete_id'";
		$get_all_data_sql_result = $conn->query($get_all_data_sql);
		if ($get_all_data_sql_result->num_rows > 0) {
			while ($row = $get_all_data_sql_result->fetch_assoc()) {
				$previousFileName = $row["img"];
				$previousFilePath = $uploadDirectory . $previousFileName;
				if (file_exists($previousFilePath)) {
					unlink($previousFilePath);
				} 
				else {
					echo 'no';
				}
				
			}
		}
		
		$delete_child_sql = "DELETE FROM galleries_file WHERE galleries_id = '$delete_id'";
	
		if ($conn->query($delete_child_sql) === TRUE) {
			$delete_sql = "DELETE FROM galleries WHERE id = '$delete_id'";
			if ($conn->query($delete_sql) === TRUE) {
				$msg = "Record deleted successfully";
			} else {
				$msg = "Record deleted successfully";
			}
		}	
		$conn->close();
	}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Gallery</title>
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
			
			<div class="table-responsive">     
			  <a href="gallery_add.php" class="btn btn-primary btn-sm" style="width: 250px;margin-bottom: 20px;"><i class="fa fa-plus"></i> Add New Gallery</a>	
			
			  <table class="table table-bordered table-striped table-hover table-condensed">
				<thead>
				  <tr>
					<th>Title (English)</th>
					<th>Title (Bangla)</th>
					<th style="width: 200px;">Action</th>
				  </tr>
				</thead>
				<tbody>
				<?php foreach ($get_data_sql_result as $get_data_sql_result_row) { ?>
				  <tr>
					<td><?php echo $get_data_sql_result_row["title_en"];?></td>
					<td><?php echo $get_data_sql_result_row["title_bn"];?></td>
					<td>
						<a href="gallery_edit.php?id=<?php echo $get_data_sql_result_row['id']; ?>" class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Edit</a>
						<button class="btn btn-sm btn-danger delete-btn" data-id="<?php echo $get_data_sql_result_row['id']; ?>"><i class="fa fa-trash"></i> Delete</button>	
					</td>
				  </tr>
				  	<?php } ?>
				</tbody>
			  </table>
			</div>
		
        </main>
    </div>
	
	

	
	
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
	document.addEventListener('DOMContentLoaded', function () {
    var deleteButtons = document.querySelectorAll('.delete-btn');

    deleteButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var confirmDelete = confirm("Are you sure you want to delete this record?");
            if (confirmDelete) {
                var deleteId = button.getAttribute('data-id');
                // Use AJAX to submit the delete request to the same page
                var xhr = new XMLHttpRequest();
                xhr.open('POST', window.location.href, true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onload = function () {
                    // Handle the response if needed
                    // You can update the page content or take other actions
                    location.reload(); // Reload the page for simplicity
                };
                xhr.send('delete_id=' + encodeURIComponent(deleteId));
            }
        });
    });
});

	
</script>

</body>
</html>
