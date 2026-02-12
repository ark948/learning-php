<?php
$showAlert = false;
$showError = false;
$exists = false;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include_once 'dbconnect.php';
    $username = $_POST["username"]; 
    $password = $_POST["password"]; 
    $cpassword = $_POST["cpassword"];

    // check if username already exists
    // $result = mysqli_query($conn, $sql);
    $prepared_statement = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $prepared_statement->bind_param("s", $username); // the first arg is the type (s for string)
    $prepared_statement->execute();
    $result = $prepared_statement->get_result();
    $num = mysqli_num_rows($result);
    if ($num == 0) {
        if (($password == $cpassword) && $exists == false) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`username`, `password_hash`) VALUES (?, ?);";
            // $result = mysqli_query($conn, $sql);
            $prepared_statement = $conn->prepare($sql);
            $prepared_statement->bind_param('ss', $username, $hash);
            $prepared_statement->execute();
            $result = mysqli_stmt_affected_rows($prepared_statement);
            if ($result) {
                $showAlert = true;
                echo "<script>console.log('$result row affected');</script>";
            }
        }
        else {
            $showError = "Passwords do not match";
        }
    }
    if ($num > 0) {
        $exists = "Username is not available";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
    <?php
    if ($showAlert) { // SUCCESS
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Your account is now created and you can login.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
                    <span aria-hidden="true">×</span> 
                </button> 
            </div>';
    }

    if ($showError) { // ERROR
        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert"> 
            <strong>Error!</strong> ' . $showError . '<button type="button" class="close" 
                data-dismiss="alert aria-label="Close">
                <span aria-hidden="true">×</span> 
            </button> 
            </div> ';
    }

    if ($exists) { // Username is already taken
        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> ' . $exists . '<button type="button" class="close" 
                data-dismiss="alert" aria-label="Close"> 
                <span aria-hidden="true">×</span> 
            </button>
        </div> ';
    }
    ?>

    <div class="container my-4 ">

        <h1 class="text-center">Signup Here</h1>
        <form action="index.php" method="post">

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" autocomplete="username">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" autocomplete="password">
            </div>

            <div class="form-group">
                <label for="cpassword">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword" autocomplete="repeat-password">

                <small id="emailHelp" class="form-text text-muted">
                    Make sure to type the same password
                </small>
            </div>

            <button type="submit" class="btn btn-primary">
                SignUp
            </button>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
        </script>
</body>