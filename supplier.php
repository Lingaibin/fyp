<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sidenav.css">
    <link rel="stylesheet" href="theme.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Supplier</title>
</head>
<body>
    <?php
        include'sidenav.php';
    ?>

    <div class="main">
        <div class="row" style="width: 40%; display: flex; align-items:center; justify-content:space-between;">
            <h1>Supplier</h1>
            <a href="addSupplier.php"><button style="width: 150px;">Add new supplier</button></a>
            <!-- search bar -->
            <input type="text" id="searchInput" placeholder="Search Bar">
        </div>

        <!-- show supplier list -->
        <table id="suppliers">
        <tr>
            <th>No</th>
            <th>Supplier Name</th>
            <th>Supplier Phone Number</th>
            <th>Supplier Address</th>
            <th>Action</th>
        </tr>

        <?php
                include 'db.php';
                // The SQL query to fetch all records from the supplier table
                $sql = "SELECT supplierID, supplierName, supplierPhoneNumber, supplierLocation FROM supplier";

                // Execute the query using mysqli_query
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    $counter = 1;
                    // Fetch each row from the result set
                    while($row = mysqli_fetch_assoc($result)) {
                        $supplierRow = <<<EOT
                        <tr>
                            <td>{$counter}</td>
                            <td>{$row["supplierName"]}</td>
                            <td>{$row["supplierPhoneNumber"]}</td>
                            <td>{$row["supplierLocation"]}</td>
                            <td style="display:flex;">
                                <a href="updateSupplier.php?supplierID={$row['supplierID']}"><i class="fa fa-edit"></i></a> 
                                <a href="#" onclick="return confirmDelete('{$row['supplierID']}')"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    EOT;
                    echo $supplierRow;
                    $counter++;
                 }?>

                <script>
                function confirmDelete(supplierID) {
                    var confirmDelete = confirm("Are you sure you want to delete this supplier?");
                    
                    if (confirmDelete) {
                        window.location.href = "deleteSupplier.php?supplierID=" + supplierID;
                    }
                }
                </script>

        <?php
                }
                else {
                    echo "<tr><td colspan='5'>No Supplier</td></tr>";
                }
                // Close connection
                mysqli_close($conn);
        ?>
    </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function(){
        $('#searchInput').keyup(function(){
            var searchText = $(this).val();
            $.ajax({
                url: 'fetchSuppliers.php',
                method: 'post',
                data: {query: searchText},
                success: function(response){
                    $('#suppliers').html(response);
                }
            });
        });
    });
    </script>
</body>
</html>