<?php
$insert = false;
if(isset($_POST['name'])){
    
    //set connection variables
    $server ="localhost";
    $username ="root";
    $password="";

     //connecting to mysql
    $con = mysqli_connect($server, $username, $password);


    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    //echo "Success connecting to the db";
    
    //collect post variable
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `travel` . `travel` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    //echo $sql;
    
    //exicute the query
    if($con->query($sql) == true){
        //echo "Successfully inserted";

        //flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }
    
    //close the data base connection
    $con->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Marck+Script&family=Poppins:wght@300;400&family=Rammetto+One&family=Righteous&family=Ubuntu:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    <img class="bg" src="Bg.jpg" alt="travel-image">
    <div class="container">
        <img class="logo" src="logo.jpg" alt="logo">
        <h1>welcome to Lets Go.com Travel Trip Form</h1>
        <p>Enter your details and submit this form to confirm your participation in the trip</p>

        <?php
        if($insert == true){
        //echo "<p class='submitMsg'> Thanks for submiting your form. We are happy to see you joining us for the us trip </p>";
            
        }
        
        ?> 
    <form action="index.php" method="post">
        <input type="text" name="name" id="name" placeholder="Enter your Name">
        <input type="text" name="age" id="age" placeholder="Enter your Age">
        <input type="text" name="gender" id="gender" placeholder="Enter your Gender">
        <input type="email" name="email" id="email" placeholder="Enter your Email">
        <input type="phone" name="phone" id="phone" placeholder="Enter your Phone Number">
        <textarea name="desc" id="desc" cols="30" rows="10"  placeholder="Enter any other information here">

        </textarea>
        <button class="btn">Submit</button>
        
    </form>
    </div>
    

    <script src="index.js"></script>
</body>
</html>