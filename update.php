<?php
$coon=mysqli_connect("localhost","root","","cars");
$id=$_GET['id'];
$up=mysqli_query($coon,"select * from cars where id=$id");
$data=mysqli_fetch_array($up);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="add1.css">
    <title>update</title>
</head>
<body>
<header class="header">
      <div>    
                <a class="link" href="#add">update</a>
 
      </div>
      </header>
      <div class="main">
      <form action="up.php" clas="form" method="post" enctype="multipart/form-data">
       
      <input type="text" name="id" value="<?php echo $data['id']?>" placeholder="the id" class="box"><br>
      <input id="file" type="text" name="name" value="<?php echo $data['name']?>" placeholder="the name of cars" class="box"><br>
        <input type="text" name="company" value="<?php echo $data['company']?>" placeholder="the company of cars" class="box"><br>
        <input id="file" type="text" name="price" value="<?php echo $data['price']?>" placeholder="the price of cars" class="box"><br>
        <input type="text" name="model" value="<?php echo $data['model']?>" placeholder="the model of cars" class="box"><br>
        <input type="text" name="color" value="<?php echo $data['color']?>" placeholder="the color of cars" class="box"><br>
        <input id="x" type="file" name="iamge" placeholder="the imag"  ><br> 
        <input type="submit" name="sub" value="update" class="btn"><br>
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
    height: 650px;
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
    background-color: pink; 
}
#x{
    margin-left: 120px;
    font-size: 20px;
    color: #333;
    margin-top: 20px;
}
.a{
    margin-left: 140px;
    color: rgb(231, 154, 22);
    font-size: 20px;
    font-style: italic;
}
.a:hover{
    background-color: pink; 
}
</style>
</html>