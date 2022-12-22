<?php
    include 'connect.php';
    $sql_get_id = "SELECT * FROM tborder ORDER BY OrderID DESC LIMIT 1";
    $res = mysqli_query($conn, $sql_get_id);
    $row = mysqli_fetch_array($res);
    if ($row > 0){
        $rentid = $row['OrderID'];
        $name = $row['CustomerName'];
        $phone = $row['PhoneNumber'];
        $vehicleid = $row['VehicleID'];
        $vehiclename = $row['VehicleName'];
        $vehicleplat = $row['VehiclePlat'];
        $rentdate = $row['RentDate'];
        $returndate = $row['ReturnDate'];
        $rentprice = $row['RentPrice'];
    }
?>
<DOCTYPE! html>
    <html>
        <head>
            <title>
                Rent Detail
            </title>
            <style>
                @keyframes fade { 
                    0% {
                        opacity: 0;
                    }

                    100% {
                        opacity: 1;
                    }
                }
                * {
                    font-family: 'Candara';
                }
                html, body {
                    animation: fade 2s;
                    width: 100%;
                    height: 100%;
                    margin: 0;
                    scroll-behavior: smooth;
                }
                body{
                    background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),url('images/rent.jpg');
                    background-repeat: no-repeat;
                    background-size: cover;
                    background-attachment: fixed;
                }
                .container {
                    display: flex;
                    justify-content: center;
                    margin: auto;
                    width: 100%;
                    padding: 20px;
                    top: 20%;
                    position: relative;
                }
                .content-wrap {
                    justify-content: center;
                    margin: 20px;
                }
                .table-wrap, .form-wrap {
                    padding: 20px;
                    margin: 20px;
                    border-radius: 15px;
                    background-color: rgba(0,0,0,0.8);
                }
                h1 {
                    font-size: 20px;
                    color: white;
                    font-family: "Candara"
                }
                table {
                    margin: 20px;
                    color: white;
                    border-collapse: collapse;
                }
                th, tr, td{
                    border-bottom: 0.5px solid white;
                    width: 200px;
                    text-align: left;
                    padding: 10px;
                    font-size: 20px;
                }
                td{
                    font-family: 'Calibri';
                    font-size: 20px;
                }
                label {
                    color: white;
                    text-align: left;
                }
                input {
                    margin: 10px;
                }
                textarea {
                    margin: 10px;
                    padding: 10px;
                    border-radius: 5px;
                    resize: none;
                }
                input[type="text"], input[type="number"] {
                    width: 300px;
                    height: 40px;
                    padding: 10px;
                    border-radius: 5px;
                }
                select{
                    width: 300px;
                    height: 40px;
                    padding: 10px;
                    border-radius: 5px;
                    margin: 10px;
                }
                ::placeholder {
                    font-weight: bold;
                }
                input[type="date"] {
                    padding: 5px;
                    border-radius: 5px;
                }
                input[type="radio"] {
                    color: white;
                }
                form {
                    margin: 20px;
                }
                .input-form{
                    text-align: center;
                    margin: 10px;
                }
                input[type="submit"] {
                    background-color: white;
                    margin-top: 20px;
                    width: 150px;
                    height: 40px;
                    border: none;
                    border-radius: 5px;
                    font-weight: bold;
                    font-size: 16px;
                }

                .input-form a{
                    background-color: rgba(255,255,255,0.1);
                    padding: 10px;
                    margin: 10px;
                    border-radius: 5px;
                    color: white;
                    font-weight: bold;
                    text-decoration: none; 
                }
                .input-form a:hover{
                    background-color: rgba(255,255,255,0.6);
                    text-decoration: underline;
                }
                .back a, button{
                background-color: rgba(255,255,255,0.1);
                padding: 10px;
                margin: 10px;
                border-radius: 5px;
                color: white;
                font-weight: bold;
                text-decoration: none; 
                }
                .back a:hover{
                    background-color: rgba(255,255,255,0.6);
                    text-decoration: underline;
                }
            </style>
        </head>
        <body>
            <?php include 'navbar/navbar.html'?>
            <div class="container" id="container">
                <div class="content-wrap">
                    <div class="table-wrap">
                        <h1 style="font-size:25px">Rent Detail</h1>
                        <table>
                            <tr>
                                <td style="font-weight: bold">Rent ID</td>
                                <td><?php if ($row > 0){echo $rentid;} ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold">Name</td>
                                <td><?php if ($row > 0){echo $name;} ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold">Phone Number</td>
                                <td><?php if ($row > 0){echo $phone;} ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold">Vehicle ID</td>
                                <td><?php if ($row > 0){echo $vehicleid;} ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold">Vehicle Name</td>
                                <td><?php if ($row > 0){echo $vehiclename;} ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold">Vehicle Number</td>
                                <td><?php if ($row > 0){echo $vehicleplat;} ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold">Rent Date</td>
                                <td><?php if ($row > 0){echo $rentdate;} ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold">Return Date</td>
                                <td><?php if ($row > 0){echo $returndate;} ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold">Rent Price</td>
                                <td><?php if ($row > 0){echo "Rp. ", number_format($rentprice,2,',','.');} ?></td>
                            </tr>
                        </table>
                        <div class="back">
                            <a href="index.php">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </body>
    </html>