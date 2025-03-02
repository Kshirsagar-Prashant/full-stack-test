<?php
$conn=mysqli_connect('localhost','root','','test');
$Section_Name=$Section_Icon=$img=$Title=$Sub_Title=$Description=$sid='';

if(isset($_GET['S_id'])){
    $que="select * from sections Where Sections_ID='".$_GET['S_id']."' AND Status='0'";
        $in=mysqli_query($conn,$que);
        while($row = mysqli_fetch_assoc($in)){
        $Section_Name=$row['Section_Name'];
        $Section_Icon=$row['Section_Icon'];
        $img=$row['img'];
        $Title=$row['Title'];
        $Sub_Title=$row['Sub_Title'];
        $Description=$row['Description'];
        $sid=$_GET['S_id'];
        echo htmlspecialchars($row['img']);
        }
    }
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
    <form action="Add_Section1.php" method="POST" enctype="multipart/form-data">
    <div class="row">
    <div class="col-lg-3 col-md-4 col-sm-6 col-12" id="New_data1">
        <label>Section Icon </label>
        <input type="file" name="Section_Icon" id="Section_Icon" accept="image/*" class="form-control" required>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-12" id="New_data">
        <label>Section Name <b class="text-danger">*</b></label>
        <input type="text" name="Section_Name" id="Section_Name" class="form-control" value="<?=$Section_Name?>" required>
       
        <input type="hidden" name="update" id="update" class="form-control" value="<?=$Section_Icon?>" required>
        <input type="hidden" name="update1" id="update1" class="form-control" value="<?=$img?>" required>
        <input type="hidden" name="S_id" id="S_id" class="form-control" value="<?=$sid?>" required>
       
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
        <label>Title <b class="text-danger">*</b></label>
        <input type="text" name="Title" id="Title" class="form-control" value="<?=$Title?>" required>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
        <label>Sub Title <b class="text-danger">*</b></label>
        <input type="text" name="Sub_Title" id="Sub_Title" class="form-control" value="<?=$Sub_Title?>" required>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
        <label>Description <b class="text-danger">*</b></label>
        <textarea name="Description" id="Description" class="form-control" required><?=$Description?></textarea>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
        <label>Image </label>
        <input type="file" name="img" id="img" class="form-control" accept="image/*"  required>
        </div>
        <div class="col-12 text-center mt-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>
</html>
