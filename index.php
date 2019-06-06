<?php require_once 'admin/pages/inc-function.php';?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>KOE-Wiki</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/clean-blog.min.css" rel="stylesheet">
<style>
  
  .secili {
      border:1px solid #ddd;
      margin:5px;
      padding:10px;
      background:lightblue;  

  }
  .sayfa{
      border:1px solid #ddd;
      margin:5px;
      padding:10px;
  }
</style>
</head>

<body>
  <?php require 'includes/inc-menu.php'; ?>
  
<div class="container-fluid">
    <div class="row row-offcanvas row-offcanvas-left">
        <div class="col-md-2 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
          
           
            <!--/.well -->
        </div>
        <!--/span-->

        <div class="col-xs-12 col-sm-9">
           
            <div class="container" >
                <?php 
                   //sayfalama
            $sayfa = intval(@$_GET["sayfa"]);
            if (!$sayfa) {

              $sayfa=1;

            }
            $cek=$db->prepare("SELECT id From blog WHERE  aktif= 1");
            $cek->execute(array());
            $toplam = $cek->rowCount();

            $limit = 3;
            $goster = $sayfa*$limit-$limit;
            $sayfa_sayisi = ceil($toplam/$limit);
            $forlimit=2;

            $row2 = null;


            //sayfalama bitiş
          @$kelime =@$_GET["q"];
          if ($kelime != "") {
            echo "<p>Aranan Kelime : $kelime | <a href='index.php?sayfa=1'>Anasayfaya geri dön.</p>";
            $cek = $db->prepare("SELECT * FROM blog WHERE aktif=:aktif && baslik LIKE :aranan ORDER BY id DESC ");
            $cek->bindValue(":aktif",1,PDO::PARAM_INT);
            $cek->bindValue(":aranan","%$kelime%",PDO::PARAM_STR);
            $cek->execute();
            $toplam = $cek->rowCount();
            $sayfa_sayisi = ceil($toplam/$limit);
          }
          else{

          $cek = $db->prepare("SELECT * FROM blog WHERE  aktif= :aktif ORDER BY id DESC Limit $goster,$limit");
          $cek->bindValue(":aktif",1,PDO::PARAM_INT);
          $cek->execute();
        } 
          
         
          while ($row = $cek->fetch(PDO::FETCH_ASSOC) ) { 
            $row2= 1;
        ?>

        <div class="post-preview" >
          <a href="blog-detay.php?id=<?php echo $row['id'];  ?>">
            <b><font size="5">
              <?php echo $row["baslik"]; ?>
            </font></b><br>
            <b class="post-subtitle"><font size="4">
              <?php echo $row["alt_baslik"]; ?>
            </font></b>
          </a>
          <p class="post-meta">
            <?php echo $row["tarih"]; ?></p>
        </div>
       
        <hr>

      <?php } ?>

            </div>

            <div class="clearfix">
<center>
          <?php 

            if($row2)
            for($i=$sayfa-$forlimit; $i<$sayfa + $forlimit+1; $i++) { 
             if ($i>0 && $i<=$sayfa_sayisi) {
               if($i == $sayfa){
                  echo "<span class='secili'>".$i."</span>";

               }else {
                echo "<span class='sayfa'><a href='index.php?sayfa=".$i."'>".$i."</a></span>";

               }
             }
              
            }


          ?></center>
        </div>
            
            <!--/row-->
        </div>
        <!--/span-->


    </div>
    <!--/row-->

    <hr>

<?php require 'includes/inc-footer.php'?>

</div>

</body>

</html>
  <!-- Navigation -->

