<?php
require_once('DB.php');

$database = new Database('test'); 
$members = $database->fetchAllData(); 
$fetchS = $database->fetchSections();
$cnt=count($fetchS);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Wpoets test</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style> 
 body {
  background-image: linear-gradient(#10324D, #10324D);
}
.vcenter-item{
        display: flex;
        align-items: center;
    }
    @media screen and (min-width: 768px){
        #phone{
            display:none;
        }
    }
    @media screen and (max-width: 767px){
        #websie{
            display:none;
        }
    }
</style>

</head>
<body>
<div class="container-fluid mt-3">
<input type="hidden" name="tot_cnt" id="tot_cnt" value="<?=$cnt?>">

<a href="CRUD.php" class="btn btn-primary">CRUD Operations</a>
    <div class="row pt-3">
        <div class="col-12 text-center text-white ">
          <h2> DelphianLogic In Action</h2>
        </div>
        <div class="col-12 text-center mt-2" style="color:lightgray;">
          <p> Lorem Ipsum dolor sit amet, consectetuer adipiscing elit, Aenean commodo </p>
        </div>
        <div class="col-12">
            <div class="container" id="websie">
                <div class="row">
                    <div class="col-lg-4 col-md-4 p-0 m-0">
                        <div class="row vcenter-item" style="height:500px; background-color:lightgray;">
                            <div class="col-12">
                                <?php
                                $n=0;
                                foreach ($fetchS as $menu){
                                    $fetchimg1 = $database->fetchimg($menu['Section_Name']);

                                ?>
                                <a type="button" data-bs-target="#demo" data-bs-slide-to="0" onclick='change_tab(<?php echo "$n,$cnt";?>)' style="width:95%; text-decoration: none !important; color:black; font-size:28px;"  class="active bg-white border-0 p-2 m-2 float-left">
                                    <img src="images/<?=$fetchimg1[0]['Section_Icon']?>" height="50" width="50" class="float-left"> &nbsp; <?=$menu['Section_Name']?>
                                </a>
                                <?php
                                $n++;
                                }
                                ?>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 p-0 m-0">
                        <?php
                        $S_cnt=0;
                        foreach($fetchS as $itr){
                            $c_Section_Name = $database->fetchAllDataS($itr['Section_Name']); 
                        $no=0;
                                foreach ($c_Section_Name as $menu){
                                    if($no==0){
                                ?>
                                <div id="carouselText<?=$S_cnt?>" class="carousel slide " data-bs-ride="carousel" <?php if($S_cnt != 0){ echo "style='display:none;'";} ?>>
                            <div class="carousel-inner text-white text-center vcenter-item" style="background-color:#63B4C9; height:500px; width:100%;">
                            
                                <div class="carousel-item active ">
                                    <span class="p-1" style="background-color: #5598A9;"><?=$menu['Title']?></span>
                                <h3 ><?=$menu['Sub_Title']?></h3>
                                <?=$menu['Description']?>
                                </div>
                                <?php
                                }
                                if($no>=1){
                                ?>
                                <div class="carousel-item">
                                <span class="p-1" style="background-color: #5598A9;"><?=$menu['Title']?></span>
                                <h3><?=$menu['Sub_Title']?></h3>
                                <?=$menu['Description']?>
                                </div>
                                    <?php
                                    }
                                    $no++;
                                }
                                    if($members){
                                    ?>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselText<?=$S_cnt?>" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselText<?=$S_cnt?>" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <?php
                                    }
                                    $S_cnt++;
                        }                             
                                ?>
                    </div>
                    <div class="col-lg-4 col-md-4 p-0 m-0 " style="height:500px;">
                                <?php
                                $S_cnt1=0;
                                foreach($fetchS as $itr){
                                    $c_Section_Name = $database->fetchAllDataS($itr['Section_Name']); 
                                $co=0;
                                foreach ($c_Section_Name as $imgs){
                                    if($co==0){
                                    ?>
                        <div id="carouselImages<?=$S_cnt1?>" class="carousel slide mt-5" data-bs-ride="carousel" <?php if($S_cnt1 != 0){ echo "style='display:none;'";} ?>>
                            <div class="carousel-inner">
                                
                                <div class="carousel-item active ">
                                <img src="images/<?=$imgs['img']?>" class="d-block w-100" alt="Image $co">
                                </div>
                                <?php
                                }
                                if($co >=1){
                                ?>
                                <div class="carousel-item overflow-hidden">
                                <img src="images/<?=$imgs['img']?>" class="d-block w-100" alt="Image $co">
                                </div>
                                <?php
                                }
                                $co++;
                            }
                                if($members){
                                ?>
                            </div>
                         </div>
                         <?php
                                }
                                $S_cnt1++;
                            }
                        
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12" id="phone">
            <div class="row" >
            <div class="col-12 p-0 m-0">
                        <div class="row " id="accordion">
                            
                                <?php
                                $n=0;
                                foreach ($fetchS as $menu){
                                    $fetchimg1 = $database->fetchimg($menu['Section_Name']);

                                ?><div class="col-12">
                                <a type="button" data-toggle="collapse" href="#collapseOne<?=$n?>" data-bs-slide-to="0" onclick='change_tab(<?php echo "$n,$cnt";?>)' style="width:100%; text-decoration: none !important; text-align:left; color:black; font-size:28px;"  class="btn active bg-white border-0 p-2 m-2 ">
                                    <img src="images/<?=$fetchimg1[0]['Section_Icon']?>" height="50" width="50" class="float-left"> &nbsp; <?=$menu['Section_Name']?>
                                    <i class="fa fa-plus-circle float-right pt-2" style="font-size:30px;color:red; "></i>
                                    <!-- <i class="fa fa-minus-circle float-right pt-2" style="font-size:30px;color:red"></i> -->
                                </a>
                                
                                </div>
                                <div id="collapseOne<?=$n?>" class="collapse  ml-2 row text-white" data-parent="#accordion">
                                     <?php
                        $S_cnt=0;
                        
                            $c_Section_Name = $database->fetchAllDataS($menu['Section_Name']); 
                        $no=0;
                                foreach ($c_Section_Name as $menu){
                                    if($no==0){
                                ?>
                                <div id="carouselText<?=$S_cnt?>" class="carousel slide p-0 m-0" data-bs-ride="carousel" <?php if($S_cnt != 0){ echo "style='display:none;'";} ?> style="background-repeat: no-repeat, repeat;background-size: 100% 400px; background-image: url('images/<?=$menu['img']?>')">
                            <div class="carousel-inner text-white text-center vcenter-item m-0 p-0" style="background-color:#63B4C9; opacity:0.8; height:400px; width:100%;">
                            
                                <div class="carousel-item active ">
                                    <span class="p-1" style="background-color: #5598A9;"><?=$menu['Title']?></span>
                                <h3 ><?=$menu['Sub_Title']?></h3>
                                <?=$menu['Description']?>
                                </div>
                                <?php
                                }
                                if($no>=1){
                                ?>
                                <div class="carousel-item">
                                <span class="p-1" style="background-color: #5598A9;"><?=$menu['Title']?></span>
                                <h3><?=$menu['Sub_Title']?></h3>
                                <?=$menu['Description']?>
                                </div>
                                    <?php
                                    }
                                    $no++;
                                }
                                    if($members){
                                    ?>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselText<?=$S_cnt?>" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselText<?=$S_cnt?>" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <?php
                                    }
                                    $S_cnt++;
                                                     
                                ?>
                                </div>
                                <?php
                                $n++;
                                }
                                ?>
                            
                            
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Synchronize both carousels
$(document).ready(function() {
   $total=$('#tot_cnt').val();
// console.log($total);

   for(i = 0; i < Number($total); i++) { 
    const carouselText = new bootstrap.Carousel(document.getElementById('carouselText'+i));
    const carouselImages = new bootstrap.Carousel(document.getElementById('carouselImages'+i));
// console.log('carouselText'+i);
    // Event listener for text carousel change
    document.getElementById('carouselText'+i).addEventListener('slide.bs.carousel', function (event) {
      const index = event.to; // Get the index of the active slide in the text carousel
      carouselImages.to(index); // Sync the second carousel (images) with the first
    });
}
});
 // hide and show for col 1 btns
    function change_tab($no, $tot){
        for(i = 0; i < Number($tot); i++) { 

            if(i==$no){
                $('#carouselImages'+i).show();
                $('#carouselText'+i).show();
                
            }else{
                $('#carouselImages'+i).hide();
                $('#carouselText'+i).hide();
            }
        // console.log($no +"/"+ $tot);
        }
    }

</script>
</body>
</html>
