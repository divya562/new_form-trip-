<?php
$insert = false;
    if(isset($_POST['name'])){
      

    $server ="localhost";
    $username="root";
    $password="";
    $dbname ="trip";

    $con = mysqli_connect($server, $username, $password, $dbname);

    if(!$con){
        die("connection failes".mysqli_connect_error());
    }
   // echo "connection successful";

   $name=$_POST['name'];
   $age=$_POST['age'];
   $gender=$_POST['gender'];
   $email=$_POST['email'];
   $phone=$_POST['phone'];
   $other=$_POST['other'];
  // $sql="INSERT INTO 'trip'('name','age','gender','email','phone','other','date') VALUES
   // ('$name', '$age','$gender','$email','$phone','$other',current_timestamp());";

  //  $sql= "INSERT INTO `trip`(`sr`, `name`, `age`, `gender`, `email`, `phone`, `other`, `date`) VALUES
  //   ('$name','$age','$gender','$email','$phone','$other','current_timestamp()')";

$sql = "INSERT INTO `trip`( `name`, `age`,`gender`, `email`, `phone`, `other`,`date`) VALUES ('$name','$age','$gender','$email','$phone','$other',curdate());";
   
    if($con->query($sql) == true){
       // echo"inserted";
    
       $insert=true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    $con->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <img class="bg" src="image1.jpg" alt="">
    <div class="container">
       
        <h1>Welcome to Goa Trip Travel form</h1><br>
        <h3>Enter your details to confirm your participation</h3>
        <br>
       
        <form action="index.php" method="post">

            <input type="text" name="name" id="name" placeholder="Enter your Name">
           <input type="number" name="age" id="age" placeholder="Enter your Age">
           <input type="text" name="gender" id="gender" placeholder="Enter your Gender">
           <!--  Enter your Gender<br>
            <input type="radio" name="gender" id="gender" placeholder="Enter your gender">
           Male <br>
            <input type="radio" name="gender" id="gender" placeholder="Enter your gender">
            <label>Female</label><br> -->
            <input type="email" name="email" id="email" placeholder="Enter your Email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your Phone">
            <textarea name="other" id="other" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <br>
            <?php 
        if($insert == true){
            echo"<P class='submitMsg'> Thanks for submitting form. we are happy to see you joining us for trip</p>";
        }
        ?>
        <br>
            <button class="btn">Submit</button>
           
        </form>
    </div>

    <script src="index.js"></script>
</body>

</html>