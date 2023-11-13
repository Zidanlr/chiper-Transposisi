<?php
require "config.php";
require "functions/encrypt.php";
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Register Procces</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php
                $user = $username; 
                $pass = encrypt($password, $key, true);
                $sql = "SELECT * FROM users WHERE username = '$user' ";
                $query = $db->query($sql);
                if ($query->num_rows != 0) {
                    echo "<div class='alert alert-warning text-center'>Username is Registered! <a href='index.php'>Back</a></div>";
                } else {
                    if (!$user || !$pass) {
                        echo "<div>There is still empty data! <a href='index.php'>Back</a>";
                    } else {
                        $data = "INSERT INTO users VALUES (NULL, '$user', '$pass')";
                        $simpan = $db->query($data);
                        if ($simpan) {
                            echo "<div class='alert alert-warning text-center'>registration successful <a href='index.php'>Login</a></div>
                    <div class='card'>
                    </div>";
                        } else {
                            echo "<div class='alert alert-danger'>Process Failed!</div>";
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>
