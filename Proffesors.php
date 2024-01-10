<?php
include('includes/config.php');

?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CCIS NEWS | Proffesors</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

  </head>
  <style>
        body {
            background-image: url('https://scontent.fmnl30-1.fna.fbcdn.net/v/t1.15752-9/368580673_349926327566734_7293906279400463687_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=8cd0a2&_nc_eui2=AeFp9VXXwvqBVs18FEZulHnJHG3AwqER9sAcbcDCoRH2wGkhZsgEv3dhkPWs-OqNaxW43l-MAbYMfVcC5x92Y6YG&_nc_ohc=A0xcq1uyQ1oAX_ftk1s&_nc_oc=AQnHBGhSM0UCqnmvfRMRn7OWczcDITMBM5pb52_w-5TdMjMuHewfu5uHEY9Krd89WlQ&_nc_ht=scontent.fmnl30-1.fna&oh=03_AdRDAnR-dCkHl-HaKM8WfkMAWnYT6Fdq_XxteXIosd2ehQ&oe=65953733'); /* Replace 'path/to/your/image.jpg' with the actual path to your image file */
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

<?php 
$pagetype='aboutus';
$query=mysqli_query($con,"select PageTitle,Description from tblpages where PageName='$pagetype'");
while($row=mysqli_fetch_array($query))
{

?>
      <h1 class="mt-4 mb-3"><?php echo htmlentities($row['PageTitle'])?>
  
  </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">About</li>
      </ol>

      <!-- Intro Content -->
      <div class="row">

        <div class="col-lg-12">

          <p><?php echo $row['Description'];?></p>
        </div>
      </div>
      <!-- /.row -->
<?php } ?>
    
    </div>
    <!-- /.container -->

    <!-- Footer -->
 <?php include('includes/footer.php');?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
