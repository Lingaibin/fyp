<?php
// Include database connection file
include 'db.php';

// Check if 'supplierID' is provided in the URL
if(isset($_GET["supplierID"])){
    // Prepare a delete statement
    $sql = "DELETE FROM supplier WHERE supplierID = ?";

    if($stmt = mysqli_prepare($conn, $sql)){

        // Set parameters
        $param_matric = $_GET["supplierID"];

        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_matric);

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            // Record deleted successfully. Redirect to landing page
            echo "<script>alert('Supplier Successfully Deleted');
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
} else {
    // If no 'supplierID' parameter in URL, do error handling or redirection
    // Redirect to error page or display an error message
    echo "Error: No Supplier value found.";
}

// Close connection
mysqli_close($conn);
?>
