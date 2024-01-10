<?php
# galleryuser.php

// Include the database connection file
include('includes/config.php');

$mysqli = new mysqli("localhost", "root", "", "newsportalv2");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Fetch and display the images from the database
$sql = "SELECT * FROM tblgallery";
$result = $mysqli->query($sql);

if ($result) {
    $images = $result->fetch_all(MYSQLI_ASSOC);
} else {
    echo "Error fetching images.";
}
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CCIS NEWS | Gallery</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/gallery.css">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

  </head>
  <style>
        body {
            background-image: url(''); /* Replace 'path/to/your/image.jpg' with the actual path to your image file */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed; /* This makes the background fixed while scrolling */
        }
    </style>

  <body>

    <!-- Navigation -->
    <?php include('includes/header.php');?>
    <!-- Page Content -->
    <div class="container">
        <div class="feed">
            <div class="custom-gallery">
                <!-- Display the uploaded images -->
                <?php foreach ($images as $image): ?>
                    <div class="gallery-item">
                        <img src="data:image/jpeg;base64,<?php echo $image['ProductImage']; ?>" alt="Image">
                    </div>
                <?php endforeach; ?>
            </div>
            <!-- End gallery HTML -->
        </div>
    </div>
    <!-- /.container -->

    <!-- Footer -->
 <?php include('includes/footer.php');?>

    <!-- Bootstrap core JavaScript -->
    <script src="js/gallery.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
