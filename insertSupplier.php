<?php
    include("db.php");

    $supplierName = mysqli_escape_string($conn, $_POST["supplierName"]);
    $supplierPhoneNumber = mysqli_escape_string($conn, $_POST["supplierPhoneNumber"]);
    $supplierAddress = mysqli_escape_string($conn, $_POST["supplierAddress"]);

    $query = "INSERT INTO supplier (supplierID, supplierName, supplierPhoneNumber, supplierLocation)
     VALUES (0, '$supplierName', '$supplierPhoneNumber', '$supplierAddress')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Supplier Successfully Added');
        setTimeout(function() {
            window.location.href = 'supplier.php';
        }, 500); // Redirect after 1 second (1000 milliseconds)
      </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
?>
