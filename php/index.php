    <?php   
    $insret = false;
    
    if(isset($_GET['success']) && $_GET['success'] == "true"){
        $insret = true;
    }

    if(isset($_POST['name'])){
        $server = "localhost";
        $username = "root";
        $password = "";
        $dbname = "trip"; 
        $con = mysqli_connect($server, $username, $password, $dbname);

        if(!$con){
            die("connection failed: " . mysqli_connect_error());
        }

        $name = $_POST['name'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $desc = $_POST['desc'];

        $sql = "INSERT INTO `trip` (`sno`, `name`, `age`, `gender`, `email`, `phone`, `other`, `date`) VALUES (NULL, '$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
        
        if($con->query($sql) == TRUE){
    
            header("Location: index.php?success=true");
            exit();
        } else {
            echo "Error: $sql <br> $con->error";
        }
        
        $con->close();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRATION FORM</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=BBH+Bartle&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <img class="bg" src="bg.jpg" alt="bg photo">
    <div class="box">
        <h1>WELCOME TO THE TRIP FORM</h1>
        <p>Enter the details of your to conform your trip</p>
        <?php
        if($insret == true){
         echo "<p class='submitmsg'> THANK YOU TO SUBMIT THE FORM NOW YOU READY FOR TRIP</p>";
            }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter the name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your Gender">
            <input type="email" name="email" id="email" placeholder="Enter your Email">
            <input type="number" name="phone" id="phone" placeholder="Enter your Number">

            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information"></textarea>
            <button class="btn">SUBMIT</button>
        </form>
    </div>
    <script src="index.js"></script>    
    
</body>

</html>