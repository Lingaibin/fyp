<?php
    include 'db.php';

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $phoneNumber = mysqli_real_escape_string($conn, $_POST['phoneNumber']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
    $confirmPassword = password_hash($_POST['confirmPassword'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    // Check if passwords match
    if ($_POST['password'] !== $_POST['confirmPassword']) {
        echo "<script>
            alert('Password and confirm password does not matched');
            window.location.href = 'register.html'
            </script>";
        exit;
    }

    // Check if the username already exists
    $query_check = "SELECT * FROM user WHERE username = '$username'";
    $result_check = mysqli_query($conn, $query_check);

    if (mysqli_num_rows($result_check) > 0) {
        echo "User exists";
    } else {

        $query = "INSERT INTO user (userID, username, name, phoneNumber, password, role) VALUES (0, '$username', '$name', 'phoneNumber', '$password', '$role')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "<script>alert('Register successful');
            setTimeout(function() {
                window.location.href = 'dashboard.php';
            }, 1000); // Redirect after 1 second (1000 milliseconds)
        </script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
    mysqli_close($conn);
?>
