<DOCTYPE! html>
    <html>
        <head>
            <title>
                Edit Motorcycle
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
                    background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),url('../images/motorcycle.jpg');
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
                    margin: 10px;
                    text-align: center;
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
                $motorid = $_GET['motorid'];
                $query = "SELECT * FROM tbmotorcycle WHERE MotorID = '$motorid'";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($result);
                $motorname = $row['MotorName'];
                $motorplat = $row['MotorPlat'];
                $motorcc = $row['MotorCC'];
                $motortm = $row['MotorTM'];
                $motorprice = $row['Price'];
            ?>
            <div class="container">
                <div class="content-wrap">
                    <div class="form-wrap">
                        <h1>Add Motorcycle Form</h1>
                        <form action="" method="POST">
                            <div class="input">
                                <label for="motorname">Motorcycle Name</label><br>
                                <input type="text" name="motorname" id="motorname" placeholder="Please input motorcycle name..." value="<?php echo $motorname ?>" required>
                            </div>
                            <div class="input">
                                <label for="motorplat">Vehicle Number</label><br>
                                <input type="text" name="motorplat" id="motorplat" placeholder="Please input vehicle number..." value="<?php echo $motorplat ?>" required>
                            </div>
                            <div class="input">
                                <label for="motorcc">Motorcycle CC</label><br>
                                <select name="motorcc" id="motorcc" required>
                                <option selected hidden value="<?php echo $motorcc ?>" style="font-size: 13px"><?php echo $motorcc ?></option>
                                    <option value="100">100 CC</option>
                                    <option value="110">110 CC</option>
                                    <option value="125">125 CC</option>
                                    <option value="135">135 CC</option>
                                    <option value="150">150 CC</option>
                                    <option value="155">155 CC</option>
                                    <option value="160">160 CC</option>
                                    <option value="200">200 CC</option>
                                    <option value="250">250 CC</option>
                                    <option value="300">300 CC</option>
                                    <option value="600">600 CC</option>
                                    <option value="1000">1000 CC</option>
                                </select>
                            </div>
                            <div class="input">
                                <label for="motortm">Transmission Mode</label><br>
                                <select name="motortm" id="motortm" required>
                                    <option selected hidden value="<?php echo $motortm ?>" style="font-size: 13px"><?php echo $motortm ?></option>
                                    <option value="Manual">Manual</option>
                                    <option value="Automatic">Automatic</option>
                                </select>
                            </div>
                            <div class="input">
                                <label for="motorprice">Rent Price Per Day</label><br>
                                <input type="number" name="motorprice" id="motorprice" placeholder="Please input rent price..." value="<?php echo $motorprice ?>" required>
                            </div>
                            <div class="input-form">
                                <label for=""></label><br>
                                <input type="Submit" name="submit" id="submit" value="Save">
                                
                            </div>
                            <div class="input-form">
                            <a href="../admintables/showmotor.php" style="text-align: center;">Back</a>
                            </div>
                        </form>
                        <?php
                        include '../connect.php';
                        if(isset($_POST['submit'])){
                            $motorname = $_POST['motorname'];
                            $motorplat = $_POST['motorplat'];
                            $motorcc = $_POST['motorcc'];
                            $motortm = $_POST['motortm'];
                            $motorprice = $_POST['motorprice'];
                            $sql = "UPDATE tbmotorcycle SET MotorID = '$motorid', MotorName = '$motorname', MotorPlat = '$motorplat', MotorCC = '$motorcc', MotorTM = '$motortm', Price = '$motorprice' WHERE MotorID = '$motorid'";
                            if(!empty($motorid) && !empty($motorname) && !empty($motorplat) && !empty($motorcc) && !empty($motortm) && !empty($motorprice)){
                                mysqli_query($conn, $sql);
                                echo '<script>';
                                echo 'alert("Data updated!");
                                window.location.replace("../admintables/showmotor.php")';
                                echo '</script>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </body>
    </html>