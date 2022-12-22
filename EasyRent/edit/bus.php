<DOCTYPE! html>
    <html>
        <head>
            <title>
                Edit Bus
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
                    background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),url('../images/bus.jpg');
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
            $busid = $_GET['busid'];
            $query = "SELECT * FROM tbbus WHERE busID = '$busid'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            $busname = $row['BusName'];
            $busplat = $row['BusPlat'];
            $buscapacity = $row['Capacity'];
            $price = $row['Price'];
            ?>
            <div class="container">
                <div class="content-wrap">
                    <div class="form-wrap">
                        <h1>Add Bus Form</h1>
                        <form action="" method="POST">
                            <div class="input">
                                <label for="busname">Bus Name</label><br>
                                <input type="text" name="busname" id="busname" placeholder="Please input bus name..." value="<?php echo $busname; ?>" required>
                            </div>
                            <div class="input">
                                <label for="busplat">Vehicle Number</label><br>
                                <input type="text" name="busplat" id="busplat" placeholder="Please input vehicle number..." value="<?php echo $busplat; ?>" required>
                            </div>
                            <div class="input">
                                <label for="capacity">Bus Capacity</label><br>
                                <select name="capacity" id="capacity" required>
                                <option selected hidden value="<?php echo $buscapacity; ?>" style="font-size: 13px"><?php echo $buscapacity; ?></option>
                                    <option value="47-48">47-48</option>
                                    <option value="31-41">31-41</option>
                                    <option value="25-27">25-27</option>
                                </select>
                            </div>
                            <div class="input">
                                <label for="price">Rent Price per Day</label><br>
                                <input type="number" name="price" id="price" placeholder="Please input rent price per day..." value="<?php echo $price; ?>" required>
                            </div>
                            <div class="input-form">
                                <input type="Submit" name="submit" id="submit" value="Save">
                            </div>
                            <div class="input-form">
                            <a href="../admintables/showbus.php" style="text-align: center;">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
                <?php
                    include '../connect.php';
                    if(isset($_POST['submit'])){
                        $busname = $_POST['busname'];
                        $busplat = $_POST['busplat'];
                        $buscapacity = $_POST['capacity'];
                        $price = $_POST['price'];
                        $sql = "UPDATE tbbus SET BusID = '$busid', BusName = '$busname', BusPlat = '$busplat', Capacity = '$buscapacity', Price = '$price' WHERE BusID = '$busid'";
                        if(!empty($busid) && !empty($busname) && !empty($busplat)  && !empty($buscapacity)  && !empty($price)){
                            mysqli_query($conn, $sql);
                            echo '<script>';
                            echo 'alert("Data updated!")
                            window.location.replace("../admintables/showbus.php")';
                            echo '</script>';
                        }
                    }
                ?>
            </div>
        </body>
    </html>