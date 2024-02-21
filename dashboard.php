<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="sidenav.css">
    <link rel="stylesheet" href="theme.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <?php
        include 'sidenav.php';
    ?>

    <?php
        function getProduct(){
            include ("db.php");
            $query = "SELECT COUNT(*) as count FROM inventory";
            $result = mysqli_query($conn, $query);
                if ($result) {
                    $row = $result->fetch_assoc();
                    return $row['count'];
                } else {
                    return 0;
                }
        }

        function getLowStockProduct(){
            include ("db.php");
            $query = "SELECT COUNT(*) as count FROM inventory where itemQuantity<itemAlert && itemQuantity != 0";
            $result = mysqli_query($conn, $query);
                if ($result) {
                    $row = $result->fetch_assoc();
                    return $row['count'];
                } else {
                    return 0;
                }
        }
        function getOutofStockProduct(){
            include ("db.php");
            $query = "SELECT COUNT(*) as count FROM inventory where itemQuantity = 0";
            $result = mysqli_query($conn, $query);
                if ($result) {
                    $row = $result->fetch_assoc();
                    return $row['count'];
                } else {
                    return 0;
                }
        }

        $product = getProduct();
        $lowStockProduct = getLowStockProduct();
        $outofStockProduct = getOutofStockProduct();
    ?>

    <div class="main" style="margin-left: 10%;">
        <h1>Dashboard</h1>
        <div class="col-12">
            <div class="row" style="margin-left: 5%;">
                <div class="col-4">
                    <div class="card" style="width: 20rem;">
                        <div class="card-header text-center">
                            Total Product
                        </div>
                        <div class="card-body">
                            <!-- Total number of product -->
                            <?php echo $product; ?>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card" style="width: 20rem;">
                        <div class="card-header text-center">
                            Low Stock Product
                        </div>
                        <div class="card-body">
                            <!-- Total number of low stock product -->
                            <?php echo $lowStockProduct; ?>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card" style="width: 20rem;">
                        <div class="card-header text-center">
                            Out of Stock Product
                        </div>
                        <div class="card-body">
                            <!-- Total number of out of stock product -->
                            <?php echo $outofStockProduct; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div><br>

        <!-- Graph -->
        <div class="col-12" style="display:flex;">
            <div class="col-8" style="border: 1px solid black; height: 70vh;">
                Graph Total sales last 7 days
            </div>
            <div class="col-4">
                <div style="border: 1px solid black; height: 35vh;">
                    Top 5 product sales
                </div>
                <div style="border: 1px solid black; height: 35vh;">
                    Overview sales last month
                </div>
            </div>

        </div>
    </div>
   
</body>
</html> 