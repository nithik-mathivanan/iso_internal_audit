<?php

include_once 'html_to_doc.php';  
extract($_POST);
$htmltodoc = new HTML_TO_DOC();
$htmlContent = '<!Doctype html>
<html>
<head>
</head>
<body>'.$content.'</body>
</html>';
$htmltodoc->createDoc($htmlContent, "generated_doc/document".DATE('YmdHis'),1);
?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="robots" content="noindex, nofollow">
	<title>Paste from Word</title>
	<script src="https://cdn.ckeditor.com/4.15.1/standard-all/ckeditor.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<style type="text/css">
		/* Minimal styling to center the editor in this sample */
		.container {
			padding: 30px;
			display: flex;
			align-items: center;
			text-align: center;
		}

		.inner-container {
			margin: 0 auto;
		}
	</style>
</head>

<body>
<div class="container">
	<div class="card">
  <div class="card-body">
	<?php  
		echo "File Generate : <a href='generated_doc/document".DATE('YmdHis').".doc' download>Click Here to Download</a>";
	?>
	&nbsp;&nbsp;<a href="index.php" class="btn btn-light">Back</a>
</div>
</div>
</div>
</body>
</html>
