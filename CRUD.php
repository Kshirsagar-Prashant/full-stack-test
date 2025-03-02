<?php
require_once('DB.php');

$database = new Database('test'); 
$members = $database->fetchAllData(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Wpoets test</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12 mb-3">
            <a href="Add_Section.php" class="btn btn-info fa fa-plus"> Add New Section</a>
        </div>
        <div class="col-12 overflow-auto">
            <?php
            $count=0;
            if($members){
            foreach ($members as $r) {
                if($count==0){
                ?>
            <table class="table table-bordered text-center ">
                <thead>
                    <th>Action</th>
                    <th>Section Icon</th>
                    <th>Section Name</th>
                    <th>Title</th>
                    <th>Sub Title</th>
                    <th>Description</th>
                    <th>Image</th>
                </thead>
                <tbody>
                    <?php 
                    }
                    ?>
                    <tr>
                    <td>
                        <a href="Add_Section.php?S_id=<?=$r['Sections_ID']?>" class="fa fa-edit btn btn-primary"></a>
                        <a href="Add_Section1.php?id=<?=$r['Sections_ID']?>" class="fa fa-trash btn btn-danger" aria-hidden="true"></a>
                    </td>
                    <td><img src="images/<?=$r['Section_Icon']?>" height="50" width="50"></td>
                    <td><?=$r['Section_Name']?></td>   
                    <td><?=$r['Title']?></td>
                    <td><?=$r['Sub_Title']?></td>
                    <td><?=$r['Description']?></td> 
                    <td><img src="images/<?=$r['img']?>" height="150" width="150"></td>
                    </tr>
                            <?php
                            $count++;
                            } 
                            ?>
                </tbody>
            </table>
                        <?php
                    }else{
                        echo"<h2>No record Found</h2>";
                    }
                    ?>
        </div>
    </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</html>
