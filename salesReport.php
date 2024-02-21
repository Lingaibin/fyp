<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sidenav.css">
    <link rel="stylesheet" href="theme.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Sales report</title>
    <style>
        .row{
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .button-container{
            margin-right: 1%;
            display: flex;
        }
        .button-container button{
            padding: 10px 20px;
            cursor: pointer;
            float: right;
            border: 1px solid black;
        }
        .button-container button:not(:last-child) {
            border-right: none; /* Prevent double borders */
        }
        /* Green-themed button styling */
        button {
            margin: 0px;
            background-color: #28a745; /* Green background color */
            color: #fff; /* White text color */
            border: none;
            border-radius: 4px; /* Rounded corners */
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        button:hover {
            background-color: #218838; /* Darker green on hover */
        }

        button:active {
            background-color: #1e7e34; /* Even darker green when pressed */
        }
    </style>
</head>
<body>
    <?php
        include'sidenav.php';
    ?>

    <div class="main">
        <div class="row">
            <h1>Sales Report</h1>
            <div class="button-container">
                <button onclick="">Daily</button>
                <button onclick="">Weekly</button>
                <button onclick="">Monthly</button>
            </div>
        </div>
        <table>
            <tr>
                <th>No</th>
                <th>Date</th>
                <th>Total Sales (RM)</th>
                <th>Action</th>
            </tr>
            <tr>
                <td>1</td>
                <td>2023-01-01</td>
                <td>1000.00</td>
                <td><a href="productSold.php"><i class="fa fa-eye"></i></a></td>
            </tr>
            <tr>
                <td>2</td>
                <td>2023-01-02</td>
                <td>2000.00</td>
                <td><a href="productSold.php"><i class="fa fa-eye"></i></a></td>
            </tr>
            <tr>
                <td>3</td>
                <td>2023-01-03</td>
                <td>2000.00</td>
                <td><a href="productSold.php"><i class="fa fa-eye"></i></a></td>
            </tr>
        </table>
    </div>
</body>
</html>