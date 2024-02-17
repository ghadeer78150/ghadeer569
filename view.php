<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="view1.css">
    <title>view</title>
   
</head>
<body>
<center>
    <h2>All the Cars </h2>
</center>


<?php
$coon=mysqli_connect("localhost","root","","cars");
$result=mysqli_query($coon,"select * from cars");
while($row=mysqli_fetch_array($result)){
  echo"
  <center>
  <main>
  <div class='card' style='width: 15rem;'>
    <img src='$row[iamge]' 'class='card-img-top' >
    <div class='card-body'>
      <h5 class='card-title'>$row[name]</h5>
      <h5 class='card-title'>$row[company]</h5>
      <p class='card-text'>$row[price]</p>
      <p class='card-text'>$row[model]</p>
      <p class='card-text'>$row[color]</p>
      <a href='delete.php? id=$row[id]' class='btn btn-danger'>delete</a>
      <a href='update.php? id=$row[id]' class='btn btn-primary'>update</a>
    </div>
  </main>
  </center>
  ";
}

?>

</div>
</body>
<style>
 body{
    background-image: url(bg4.jpg);
 } 
h2{
    color: rgb(231, 154, 22);
    font-style: italic;
    font-weight: bold;
    margin-top: 40px;
    margin-bottom: 50px;
}

.card{
    float:left;
    margin-left: 30px;
    margin-right: 20px;
    margin-bottom: 30px;
}

.card img{
    width: 100%;
    height: 220px;
}
main{
    width: 100%;
}
.btn{
    color:#333;
}
</style>
</html>