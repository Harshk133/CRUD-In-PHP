
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>U for Update!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<div class="container">
    <h3>U for Update!</h3>
        <?php
    // 1. conenct to the database!
    include("connect.php");

    

    // 3. get the data
    if(isset($_POST["update"])){
        $data_id = $_POST["data_id"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $rollno = $_POST["rollno"];
        $department = $_POST["department"];

        // 4. write the query !
        $query = "UPDATE `users` SET `name` = '$name', `email` = '$email', `rollno` = '$rollno', `department` = '$department' WHERE `users`.`id` = $data_id;";

        // 4. Execute the query!
        $result = mysqli_query($conn, $query);

        // 5. display the result!
        if($result){
            header("Location:display.php");
        }else{
            echo "Some error occurred!<br/>";
        }
    }    

    if(isset($_GET["update"])){
        $updateId = $_GET["update"];
        
        $query = "SELECT * FROM `users` WHERE `id` = $updateId";

        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <form action="" method="post">
                    <label for="name">Enter Your Name</label>
                    <input type="hidden" name="data_id" value="<?php echo $row["id"]; ?>" />
                    <input type="text" name="name" value="<?php echo $row["name"]; ?>" id="name" autocomplete="off" required />
                    
                    <label for="email">Enter Your Email</label>
                    <input type="email" name="email"  value="<?php echo $row["email"]; ?>" id="email" autocomplete="off" required />

                    <label for="rollno">Enter Your Roll Number</label>
                    <input type="text" name="rollno"  value="<?php echo $row["rollno"]; ?>" id="rollno" autocomplete="off" required />

                    <label for="department">Enter Your Department</label>
                    <input type="text" name="department"  value="<?php echo $row["department"]; ?>" id="department" autocomplete="off" required />

                    <input type="submit" name="update" value="Update">
                    <input type="reset" value="Reset">
                </form>
                <?php
            }
        }
    }
    ?>
    
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>