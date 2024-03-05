<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>R for Read</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    
    <?php
        // 1. Connect to the database!
        include("connect.php");

        // 2. write the query1
        $query = "SELECT * FROM `users`";

        // 3. Execute the query
        $result = mysqli_query($conn, $query);

        // 4. Display the result!
        if(mysqli_num_rows($result) > 0){  
            $no = 1;  
            ?>
            <table class="table">
            <thead>
                <tr>
                <th scope="col">Sr. No.</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Roll Number</th>
                <th scope="col">Department</th>
                <th scope="col">Operations</th>
                </tr>
            </thead>
            <?php
            while($row = mysqli_fetch_assoc($result)){
                // body... html table
                ?>
                
                <tbody class="table-group-divider">
                    <tr>
                        <th scope="row"><?php echo $no; ?></th>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["email"]; ?></td>
                        <td><?php echo $row["rollno"]; ?></td>
                        <td><?php echo $row["department"]; ?></td>
                        <td>
                            <a href="update.php?update=<?php echo $row["id"] ?>">Edit</a>
                            <a href="delete.php?delete=<?php echo $row["id"] ?>">Delete</a>
                        </td>
                    </tr>
                </tbody>
            <?php
            $no = $no + 1;    
            }
            }else{
                echo "<h3>No data Found!</h3>";
            }
            ?>
    </table>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>