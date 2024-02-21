<?php
include 'db.php';

// Check if 'supplierID' is set in URL
if(isset($_GET['supplierID'])) {
    $supplierID = $_GET['supplierID'];

    // Prepare a select statement
    $sql = "SELECT supplierID, supplierName, supplierPhoneNumber, supplierLocation FROM supplier WHERE supplierID = ?";

    if($stmt = mysqli_prepare($conn, $sql)) {
        // Set parameters
        $param_supplierID = $supplierID;

        // Bind variables to the prepared statement
        mysqli_stmt_bind_param($stmt, "i", $param_supplierID);

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($result) == 1) {
                /* Fetch result row as an associative array. */
                if($row = mysqli_fetch_assoc($result)) {
                    // Retrieve individual field value
                    $supplierName = $row["supplierName"];
                    $supplierPhoneNumber = $row["supplierPhoneNumber"];
                    $supplierAddress = $row["supplierLocation"];
                }
            } else {
                // URL doesn't contain valid supplierID. Redirect or error message
                echo("Error occured");
                exit();
            }

        } else {
            echo "Oops! Something went wrong. Please try again later.";
            echo "Error: " . mysqli_stmt_error($stmt);
        }
    }

    // Close statement
    mysqli_stmt_close($stmt);
} else {
    // URL doesn't contain supplierID. Redirect or error message
    echo("Error occured");
    exit();
}
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate and update the data in database
    
    // Prepare an update statement
    $sql = "UPDATE supplier SET supplierName = ?, supplierPhoneNumber = ?, supplierLocation = ? WHERE supplierID = ?";

    if($stmt = mysqli_prepare($conn, $sql)){
        // Set parameters
        $param_supplierName = $_POST["supplierName"];
        $param_supplierPhoneNumber = $_POST["supplierPhoneNumber"];
        $param_supplierAddress = $_POST["supplierAddress"];
        

        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "sssi", $param_supplierName, $param_supplierPhoneNumber, $param_supplierAddress, $supplierID);

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            // Records updated successfully. Redirect to landing page
            echo "<script>alert('Supplier Successfully Edited');
            setTimeout(function() {
                window.location.href = 'supplier.php';
            }, 500); // Redirect after 0.5 second (500 milliseconds)
          </script>";
            exit();
        } else {
            echo "Oops! Something went wrong. Please try again later.";
            echo "Error: " . mysqli_stmt_error($stmt);
        }
    }
    
    // Close statement
    mysqli_stmt_close($stmt);

    // Close connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit supplier</title>
    <link rel="stylesheet" href="sidenav.css">
    <link rel="stylesheet" href="theme.css">
</head>
<body>
    <?php
        include 'sidenav.php';
    ?>

    <div class="main">
        <h1>This is Edit supplier page.</h1>
        <form action="<?php $_SERVER['REQUEST_URI']; ?>" method="post">
            <h1>Edit Supplier</h1>
            <div class="row">
                <label for="supplierName">Supplier Name:</label>
                <input type="text" name="supplierName" value="<?php echo $supplierName?>" required>
            </div>
            <div class="row">
                <label for="supplierPhoneNumber">Supplier Phone Number:</label>
                <input type="text" name="supplierPhoneNumber" value="<?php echo $supplierPhoneNumber?>" required>
            </div>
            <div class="row">
                <label for="supplierAddress">Supplier Address:</label>
                <input type="text" name="supplierAddress" value="<?php echo $supplierAddress?>" required>
            </div>
            <input type="submit" name="submit" value="Confirm and Save">
        </form>
    </div>
   
</body>
</html> 