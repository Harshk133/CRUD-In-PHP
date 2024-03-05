<?php
// 1. Connect to the database!
include("connect.php");

// 2. Accepting the data from the user!
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $rollno = $_POST["rollno"];
    $department = $_POST["department"];

    // 3. Write the query
    $query = "INSERT INTO `users` (`id`, `name`, `email`, `rollno`, `department`) VALUES (NULL, '$name', '$email', '$rollno', '$department');";

    // 4. Execute the query
    $result = mysqli_query($conn, $query);

    // 5. Display the message!
    if($result){
        header("Location:display.php");
    }else{
        echo "Some error occurred!<br/>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>C for Create!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<div class="container">
    <h3>C for Create!</h3>
    <form action="" method="post">
        <label for="name">Enter Your Name</label>
        <input type="text" name="name" id="name" autocomplete="off" required />
        
        <label for="email">Enter Your Email</label>
        <input type="email" name="email" id="email" autocomplete="off" required />

        <label for="rollno">Enter Your Roll Number</label>
        <input type="text" name="rollno" id="rollno" autocomplete="off" required />

        <label for="department">Enter Your Department</label>
        <input type="text" name="department" id="department" autocomplete="off" required />

        <input type="submit" name="submit" value="Submit">
        <input type="reset" value="Reset">
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>