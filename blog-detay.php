<?php 
  require_once 'admin/pages/inc-function.php';
  @$id = intval($_GET["id"]);

$cek = $db->prepare("SELECT * FROM  blog WHERE id= :id LIMIT 1");
$cek->bindValue("id",$id,PDO::PARAM_INT);
$cek->execute();
$row = $cek->fetch(PDO::FETCH_ASSOC);

if($row["aktif"]==0){

  header("Location:index.php");
}

  ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php echo $row["baslik"]?></title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/clean-blog.min.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
 <?php require 'includes/inc-menu.php'; ?>

  <!-- Page Header -->
  <!--<header class="masthead" style="background-color:#36e4ff">--><!-- style="background-image: url('img/post-bg.jpg')"-->

<div class="container-fluid">
    <div class="row row-offcanvas row-offcanvas-left">
        <div class="col-md-2 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
           
            <!--/.well -->
        </div>
        <!--/span-->
<?php 
@$id = intval($_GET["id"]);

$cek = $db->prepare("SELECT * FROM  blog WHERE id= :id LIMIT 1");
$cek->bindValue("id",$id,PDO::PARAM_INT);
$cek->execute();
$row = $cek->fetch(PDO::FETCH_ASSOC);

if($row["aktif"]==0){

  header("Location:index.php");
}?>

        <div class="col-xs-12 col-sm-9">
           
            <div class="container">
    <div class="overlay"></div>
   <center><div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-10 mx-auto">
          <div class="post-heading">
            <h1><?php echo $row["baslik"]?></h1>
            <h2 class="subheading"><?php echo $row["alt_baslik"]?></h2>
            <span class="meta">Posted by
              <a href="#">Admin</a>
              <?php echo $row["tarih"]?></span>
          </div>
        </div>
      </div>
    </div></center>

  <!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-10 mx-auto">

         <?php echo htmlspecialchars_decode($row["aciklama"])?>
        </div>
      </div>
    </div>
  </article>
</div>
</div>
</div>
  <hr>

  <!-- Footer -->
  <?php require 'includes/inc-footer.php';?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/clean-blog.min.js"></script>

</body>

</html>
