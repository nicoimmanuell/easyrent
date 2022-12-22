<DOCTYPE! html>
    <html>
        <head>
            <title>
                Edit Car
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
                    background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),url('../images/car.jpeg');
                    background-repeat: no-repeat;
                    background-size: cover;
                    background-attachment: fixed;
                }
                .container {
                    display: flex;
                    justify-content: center;
                    margin: auto;
                    width: 90%;
                    padding: 20px;
                    top: 20%;
                    position: relative;
                }
                .content-wrap {
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
                    width: 250px;
                    text-align: left;
                    padding: 10px;
                }
                td{
                    font-family: 'Calibri';
                    font-size: 12px;
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

            </style>
        </head>
        <body>
            <?php 
            include '../navbar/adminnav.html';
            include '../connect.php';
            $carid = $_GET['carid'];
            $query = "SELECT * FROM tbcar WHERE CarID = '$carid'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            $carname = $row['CarName'];
            $carplat = $row['CarPlat'];
            $carcc = $row['CarCC'];
            $capacity = $row['Capacity'];
            $cartm = $row['CarTM'];
            $carprice = $row['Price'];
            ?>
            <div class="container">
                <div class="content-wrap">
                    <div class="form-wrap">
                        <h1>Add Car Form</h1>
                        <form action="" method="POST">
                            <div class="input">
                                <label for="carname">Car Name</label><br>
                                <input type="text" name="carname" id="carname" placeholder="Please input car name..." value="<?php echo $carname; ?>" required>
                            </div>
                            <div class="input">
                                <label for="carplat">Vehicle Number</label><br>
                                <input type="text" name="carplat" id="carplat" placeholder="Please input vehicle number..." value="<?php echo $carplat; ?>" required>
                            </div>
                            <div class="input">
                                <label for="carcc">Car CC</label><br>
                                <select name="carcc" id="carcc" required>
                                <option selected hidden value="<?php echo $carcc; ?>" style="font-size: 13px"><?php echo $carcc; ?></option>
                                    <option value="1000">1000 CC</option>
                                    <option value="1200">1200 CC</option>
                                    <option value="1500">1500 CC</option>
                                    <option value="2000">2000 CC</option>
                                    <option value="3000">2000 CC</option>
                                </select>
                            </div>
                            <div class="input">
                                <label for="capacity">Car Capacity</label><br>
                                <select name="capacity" id="capacity" required>
                                <option selected hidden value="<?php echo $capacity; ?>" style="font-size: 13px"><?php echo $capacity; ?></option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                            <div class="input">
                                <label for="cartm">Transmission Mode</label><br>
                                <select name="cartm" id="cartm" required>
                                    <option selected hidden value="<?php echo $cartm; ?>" style="font-size: 13px"><?php echo $cartm; ?></option>
                                    <option value="Manual">Manual</option>
                                    <option value="Automatic">Automatic</option>
                                </select>
                            </div>
                            <div class="input">
                                <label for="price">Rent Price per Day</label><br>
                                <input type="number" name="price" id="price" placeholder="Please input rent price per day..." value="<?php echo $carprice; ?>" required>
                            </div>
                            <div class="input-form">
                                <input type="Submit" name="submit" id="submit" value="Save">
                            </div>
                            <div class="input-form">
                            <a href="../admintables/showcar.php" style="text-align: center;">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
                <?php
                    include '../connect.php';
                    if(isset($_POST['submit'])){
                        $carname = $_POST['carname'];
                        $carplat = $_POST['carplat'];
                        $carcc = $_POST['carcc'];
                        $carcapacity = $_POST['capacity'];
                        $cartm = $_POST['cartm'];
                        $price = $_POST['price'];
                        $sql = "UPDATE tbcar SET CarID = '$carid', CarName = '$carname', CarPlat = '$carplat', CarCC = '$carcc', Capacity = '$carcapacity',CarTM = '$cartm', Price = '$price' WHERE CarID = '$carid'";
                        if(!empty($carid) && !empty($carname) && !empty($carplat) && !empty($carcc) && !empty($carcapacity) && !empty($cartm) && !empty($price)){
                            mysqli_query($conn, $sql);
                            echo '<script>';
                            echo 'alert("Data updated!");
                            window.location.replace("../admintables/showcar.php")';
                            echo '</script>';
                        }
                    }
                ?>
            </div>
        </body>
    </html>