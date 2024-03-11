<?php
	session_start();
	if (!isset($_SESSION['user_id'])) {
		header("Location: login.php"); 
		exit();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
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
            <div class="row">
				<div class="col-md-3">
					<a class="nav-link active" href="dashboard.php">
						<div style="background: aliceblue;padding: 30px;font-size:16px;"><i class="fa fa-home"></i> Dashboard</div>
					</a>	
				</div>
				<div class="col-md-3">
					<a class="nav-link active" href="all_heading.php">
						<div style="background: aliceblue;padding: 30px;font-size:16px;"><i class="fa fa-file-text-o"></i> All Heading</div>
					</a>	
				</div>	
				<div class="col-md-3">
					<a class="nav-link active" href="all_sub_heading.php">
						<div style="background: aliceblue;padding: 30px;font-size:16px;"><i class="fa fa-file-text-o"></i> All Sub Heading</div>
					</a>	
				</div>	
				<div class="col-md-3">
					<a class="nav-link active" href="mission_vission.php">
						<div style="background: aliceblue;padding: 30px;font-size:16px;"><i class="fa fa-file-text-o"></i>  Mission Vission</div>
					</a>	
				</div>
				<div class="col-md-3">
					<a class="nav-link active" href="organizational_insight.php">
						<div style="background: aliceblue;padding: 30px;font-size:16px;"><i class="fa fa-file-text-o"></i> Organizational Insight</div>
					</a>	
				</div>			
				<div class="col-md-3">
					<a class="nav-link active" href="organizational_details.php">
						<div style="background: aliceblue;padding: 30px;font-size:16px;"><i class="fa fa-file-text-o"></i> Organizational Details</div>
					</a>	
				</div>	
				<div class="col-md-3">
					<a class="nav-link active" href="slide.php">
						<div style="background: aliceblue;padding: 30px;font-size:16px;"><i class="fa fa-file-text-o"></i> Slides</div>
					</a>	
				</div>	
				<div class="col-md-3">
					<a class="nav-link active" href="popularity_reason.php">
						<div style="background: aliceblue;padding: 30px;font-size:16px;"><i class="fa fa-file-text-o"></i> Popularity Reason</div>
					</a>	
				</div>
				<div class="col-md-3">
					<a class="nav-link active" href="what_we_do.php">
						<div style="background: aliceblue;padding: 30px;font-size:16px;"><i class="fa fa-file-text-o"></i> What We Do</div>
					</a>	
				</div>	
				<div class="col-md-3">
					<a class="nav-link active" href="team.php">
						<div style="background: aliceblue;padding: 30px;font-size:16px;"><i class="fa fa-file-text-o"></i> Team</div>
					</a>	
				</div>				
				<div class="col-md-3">
					<a class="nav-link active" href="gallery.php">
						<div style="background: aliceblue;padding: 30px;font-size:16px;"><i class="fa fa-file-text-o"></i> Gallery</div>
					</a>	
				</div>
				<div class="col-md-3">
					<a class="nav-link active" href="project.php">
						<div style="background: aliceblue;padding: 30px;font-size:16px;"><i class="fa fa-file-text-o"></i> Project</div>
					</a>	
				</div>
			</div>
        </main>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
