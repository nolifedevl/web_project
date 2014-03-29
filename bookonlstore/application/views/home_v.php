<!DOCTYPE html>
<html lang="">
	<head>
		<title>Book Store</title>
		<meta charset="UTF-8">
		<meta name=description content="">
		<meta name=viewport content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap CSS -->
		<link href="<?php echo base_url()."css/bootstrap.min.css"?>" rel="stylesheet" media="screen">
		<link href="<?php echo base_url()."css/bootstrap-theme.min.css"?>" rel="stylesheet" media="screen">
		<!--Customer CSS -->
		<link href="<?php echo base_url()."css/style.css"?>" rel="stylesheet" media="screen">
	</head>

    <body>
    	<?php

    		//echo $this->table->generate($records);
    		//echo $this->pagination->create_links();
    		//print_r($bookList);
    	?>
        <?php
        include 'header.php';
        include 'banner.php';
        include 'content-w.php';
        include 'footer.php';
        ?>
		<!-- jQuery -->
		<script src="<?php echo base_url()."js/jquery.js"?>"></script>
		<!-- Bootstrap JavaScript -->
		<script src="<?php echo base_url()."js/bootstrap.min.js"?>"></script>
	</body>
</html>