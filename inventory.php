<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sidenav.css">
    <link rel="stylesheet" href="theme.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Inventory</title>
    <style>
        .row{
            display: flex;
            justify-content: space-between;
            width: 60%;
            align-items: center;
        }
    </style>
</head>
<body>
    <?php
        include'sidenav.php';
    ?>

    <div class="main">
        <div class="row">
            <h1>Inventory</h1>
            <a href="addItem.php"><button style="width:150px;">Add new item</button></a>
            <!-- search bar -->
            <input type="text" id="searchInput" placeholder="Search Bar">
            <select name="filterCategory" id="">
                <option value="">Filter by Category</option>
            </select>
            <!-- <select name="filterBrand" id="">
                <option value="">Filter by Brand</option>
            </select> -->
        </div>

        <!-- show inventory list -->
        
        <table id="items">
        <tr>
            <th>No</th>
            <th>Item Name</th>
            <th>Status</th>
            <th>Item Category</th>
            <th>Item Brand</th>
            <th>Item Size</th>
            <th>Item Price (RM)</th>
            <th>Item Quantity</th>
            <th>Supplier</th>
            <th>Action</th>
        </tr>

        <div id="searchResults"></div>

        <?php
                include 'db.php';
                // The SQL query to fetch all records from the inventory table
                $sql = "SELECT itemID, itemName, itemPrice, itemCategory, itemBrand, itemSize, itemQuantity, itemAlert, 
                supplier.supplierName FROM inventory 
                    LEFT JOIN supplier ON inventory.supplierID = supplier.supplierID";

                // Execute the query using mysqli_query
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    $counter = 1;
                    // Fetch each row from the result set
                    while($row = mysqli_fetch_assoc($result)) {
                        $status = "";
                        if($row["itemQuantity"]>=$row["itemAlert"]){
                            $status = "Available";
                        }else if($row["itemQuantity"]==0){
                            $status = "Out of Stock";
                        }else{
                            $status = "Low Stock";
                        }
                     
                        $itemRow = <<<EndOfText
                        <tr>
                            <td>{$counter}</td>
                            <td>{$row["itemName"]}</td>
                            <td>{$status}</td>
                            <td>{$row["itemCategory"]}</td>
                            <td>{$row["itemBrand"]}</td>
                            <td>{$row["itemSize"]}</td>
                            <td>{$row["itemPrice"]}</td>
                            <td>{$row["itemQuantity"]}</td>
                            <td>{$row["supplierName"]}</td>
                            <td style="display:flex;">
                                <a href="updateItem.php?itemID={$row['itemID']}"><i class="fa fa-edit"></i></a> 
                                <a href="#" onclick="return confirmDelete('{$row['itemID']}')"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                        EndOfText;
                        echo $itemRow;
                        $counter++;
                     }?>

                <script>
                function confirmDelete(itemID) {
                    var confirmDelete = confirm("Are you sure you want to delete this item?");
                    
                    if (confirmDelete) {
                        window.location.href = "deleteItem.php?itemID=" + itemID;
                    }
                }
                </script>

        <?php
                }
                else {
                    echo "<tr><td colspan='10'>No Item</td></tr>";
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
                url: 'fetchItems.php',
                method: 'post',
                data: {query: searchText},
                success: function(response){
                    $('#items').html(response);
                }
            });
        });
    });
    </script>
</body>
</html>