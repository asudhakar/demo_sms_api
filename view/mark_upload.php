<html><head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="robots" content="noindex, nofollow">
  <meta name="googlebot" content="noindex, nofollow">

  <script type="text/javascript" src="//code.jquery.com/jquery-compat-git.js"></script>

 <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </script>

  
</head>

<body>
	<div class="container">
		<div class="header clearfix">
			<nav>
			  <ul class="nav nav-pills pull-right">
			    <li role="presentation"><a href="../index.php">Home</a></li>
			    <li role="presentation" class="active"><a href="view/mark_upload.php">Mark Upload</a></li>
			    <li role="presentation"><a href="manage_templates.php">Templates</a></li>
			    <li role="presentation"><a href="http://vefetch.com/">About</a></li>
			    <li role="presentation"><a href="login.php?action=logout">Logout</a></li>
			  </ul>
			</nav>
			<img src="../images/company_logo.png" height="125px" width="220px">
		</div>
	    <hr/>
	    <form action="mark_upload_process.php" method="post" enctype="multipart/form-data">
	    <input type="textbox" class="form-control" name="name_of_exam" placeholder="Name of the Exam" required>
	    <input type="textbox" class="form-control" name="class" placeholder="Class" required>
	    <input type="textbox" class="form-control" name="section" placeholder="Section" required>
	    <input type="file" class="form-control" name="markUpload" required>
	    <p style="text-align:center">
	    <input type="submit" class="btn btn-info" style="font-size: 13px;"value="Upload File" name="submit">
	    </p>
	    </form>

	</div>


	<footer class="footer">

         <p style="text-align: center">All rights are reserved by <a href="http://vefetch.com/">Vefetch</a>, Developed by <a href="https://twitter.com/sudhakar_valar">@sudhakar</a>.</p>
      </footer>
</body>
</html>