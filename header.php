

		<!-- Navbar -->
		<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
			<a class="navbar-brand" href="#">Admin Dashboard</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<strong><a class="nav-link" href="logout.php">Logout</a></strong>
					</li>
				</ul>
			</div>
		</nav>


       

        


<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    var textareas = document.querySelectorAll('textarea');
    textareas.forEach(function (textarea) {
      CKEDITOR.replace(textarea);
    });
  });
</script>
<style>
	label{
		font-weight: bold;
	}
	.btn-primary{
		width: 100%;
	}
	.image-container {
		position: relative;
		display: inline-block;
		cursor: pointer;
	}


</style>

</body>
</html>
