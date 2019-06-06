
<?php 
     require_once 'admin/pages/inc-function.php';

?>
       <div class="list-group list-group-flush" >
        <?php
         $cekk = $db->prepare("SELECT * FROM menu ");
                                            $cekk->execute();
                                            while($row = $cekk->fetch(PDO::FETCH_ASSOC)){
                                              ?>
       <a href="#" class="list-group-item list-group-item-action bg-light"><font face="tahoma" size="2"><?php echo $row["menu_adi"];?></font></a>
     <?php } ?>
      </div>


