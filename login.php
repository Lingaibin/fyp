<?php
    include 'db.php';

    if (isset($_POST['submit'])) {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $role = $_POST['role'];

    $query = "SELECT * FROM user WHERE username = '$username' AND role = '$role'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'] )) {
            echo "<script>alert('Login successful');
            setTimeout(function() {
                window.location.href = 'dashboard.php';
            }, 500); // Redirect after 1 second (1000 milliseconds)
        </script>";
        } else {
            echo "Invalid password";
        }
    } else {
        echo "Invalid username or role";
    }
    mysqli_close($conn);
}
?>