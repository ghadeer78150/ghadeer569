<?php
$coon=new PDO("mysql:host=localhost;dbname=cars","root","");
if(isset($_POST['sub'])){
$name=$_POST['name'];
$company=$_POST['company'];
$price=$_POST['price'];
$model=$_POST['model'];
$color=$_POST['color'];
$image=$_FILES['iamge'];
$image_path=$_FILES['iamge']['tmp_name'];
$image_name=$_FILES['iamge']['name'];
$image_up ="photo/".$image_name;
$insert="insert into cars (name ,company ,price,model,color,iamge) values ('$name','$company','$price','$model','$color','$image_up')";
$coon->query($insert);
if(move_uploaded_file($image_path , "photo/".$image_name)){
  echo "<script>alert ('photo saved seccessfly') </script>";
}
else{
  echo "<script>alert ('filed') </script>";
}
header("location:add.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add cars</title>
</head>
<body>
<header class="header">
      <div>    
                <a class="link" href="#add">ADD CARS</a>
 
      </div>
      </header>
      <div class="main">
      <form clas="form" method="post" enctype="multipart/form-data">
    
      <input id="file" type="text" name="name" placeholder="enter the name of car" class="box"><br>
        <input type="text" name="company" placeholder="enter the name company  of car" class="box"><br>
        <input id="text" type="text" name="price" placeholder="enter the price of car" class="box"><br>
        <input type="text" name="model" placeholder="enter the model of car" class="box"><br>
        <input type="text" name="color" placeholder="enter the color of car" class="box"><br>
        <input id="x" type="file" name="iamge" placeholder="enter the car imag"  ><br> 
        <input type="submit" name="sub" value="add " class="btn"><br>
        <a href="view.php" class="a">all the cars </a>
</div>
</body>
<style>
body{
    background: url(0115071.jpg);
}
a{
    text-decoration: none;
    color: #333;
}
.header{
    margin: 40px auto;
    box-shadow: 1PX 1PX 10PX silver;
    padding: 10px 20px;
    font-size: 30px;
    font-style: italic;
    width: fit-content;
}
.link:hover{
    border: none;
    color: pink;
    background-color: #FAFAFA;
}
.main{
    width: 400px;
    height: 550px;
    backdrop-filter: blur(55px);
    box-shadow: 1PX 1PX 10PX silver;
    margin: 40px auto;
    margin-top: 70px
}
.box{
    width: 200px;
    height: 40px; 
    margin-top: 20px;
    margin-bottom: 10px;
    margin-left: 75px;
    border : 1px solid ;
    color:#333;
    font-size: 20px;
}
.btn{
    width: 90px;
    height: 50px;
    border : 1px solid ;
    border-radius: 15px;
    background-color: #333;
    color: white;
    margin-bottom: 20px;
    margin-top: 20px;
    margin-left: 140px;
}
.btn:hover{
    background-color: #b65218;
; 
}
#x{
    margin-left: 120px;
    font-size: 20px;
    color: #333;
    margin-top: 20px;
}
.a{
    margin-left: 140px;
    color: white;
;
    font-size: 20px;
    font-style: italic;
}
.a:hover{
    background-color:#b65218;
; 
}
</style>
</html>