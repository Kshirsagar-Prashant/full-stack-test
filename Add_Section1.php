<?php
$conn=mysqli_connect('localhost','root','','test');
if(isset($_GET['id'])){
    $que="UPDATE sections SET Status='1' Where Sections_ID='".$_GET['id']."'";
        $in=mysqli_query($conn,$que);
        if($in){
            header('location:CRUD.php');
            echo "<script>window.location.href='CRUD.php';</script>";
            }
            else{
            echo "<script>alert('Failed....');</script>";
            echo "<script>window.location.href='Add_Section.php';</script>";
            }

}else{

    $imgname1=$imgname=$S_id='';
if($_FILES['img'] !='' ){
$img=$_FILES['img']['name'];
$ex=explode('.',$img);
$rand=rand(000000,99999);
$imgname='slider-'.$rand.'.'.$ex[count($ex)-1];
$path='images/'.$imgname;
move_uploaded_file($_FILES['img']['tmp_name'],$path);
}else if(!isset($_FILES['Section_Icon'])){
    $imgname=htmlspecialchars($_POST['update1']);
    // echo"$imgname";
}
if($_FILES['Section_Icon'] != '' ){
    $img1=$_FILES['Section_Icon']['name'];
    $ex1=explode('.',$img1);
    $rand1=rand(000000,99999);
    $imgname1='Icon-'.$rand1.'.'.$ex1[count($ex1)-1];
    $path1='images/'.$imgname1;
    move_uploaded_file($_FILES['Section_Icon']['tmp_name'],$path1);
}else if(!isset($_FILES['img'])){
    $imgname1=htmlspecialchars($_POST['update']);
    // echo"$imgname1";
    $S_id=$_POST['S_id'];
    
}

    extract($_POST);
if(isset($_POST['update']) && isset($_POST['update1']) && $_POST['update1'] !='' && $_POST['update'] !=''){
    $que="Update sections SET Section_Icon='".$imgname1."',Section_Name='".$Section_Name."',Title='".$Title."', Sub_Title='".$Sub_Title."', Description='".$Description."',img='".$imgname."' Where Sections_ID='".$S_id."'";
    $in=mysqli_query($conn,$que);
//     echo "update";
if($in){
header('location:CRUD.php');
echo "<script>window.location.href='CRUD.php';</script>";
}
else{
echo "<script>alert('Failed....');</script>";
echo "<script>window.location.href='Add_Section.php';</script>";
}
}else{
// echo"insert";
    $que="INSERT INTO sections(Section_Icon, Section_Name,Title, Sub_Title, Description,img)VALUES('".$imgname1."','".$Section_Name."','".$Title."','".$Sub_Title."','".$Description."','".$imgname."')";
    $in=mysqli_query($conn,$que);
if($in){
header('location:CRUD.php');
echo "<script>window.location.href='CRUD.php';</script>";
}
else{
echo "<script>alert('Failed....');</script>";
echo "<script>window.location.href='Add_Section.php';</script>";
}
}
}
?>