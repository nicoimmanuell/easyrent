<DOCTYPE! html>
    <html>
        <head>
            <title>
                Add Motorcycle
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
            <?php include '../navbar/adminnav.html'?>
            <div class="container">
                <div class="content-wrap">
                    <div class="form-wrap">
                        <h1>Add Motorcycle Form</h1>
                        <form action="" method="POST">
                            <div class="input">
                                <label for="motorid">Motorcycle ID</label><br>
                                <input type="text" name="motorid" id="motorid" placeholder="Please input motorcycle ID..." required>
                            </div>
                            <div class="input">
                                <label for="motorname">Motorcycle Name</label><br>
                                <input type="text" name="motorname" id="motorname" placeholder="Please input motorcycle name..." required>
                            </div>
                            <div class="input">
                                <label for="motorplat">Vehicle Number</label><br>
                                <input type="text" name="motorplat" id="motorplat" placeholder="Please input vehicle number..." required>
                            </div>
                            <div class="input">
                                <label for="motorcc">Motorcycle CC</label><br>
                                <select name="motorcc" id="motorcc" required>
                                <option selected hidden value="" style="font-size: 13px">Choose motorcycle CC</option>
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
                                    <option selected hidden value="" style="font-size: 13px">Choose transmission mode</option>
                                    <option value="Manual">Manual</option>
                                    <option value="Automatic">Automatic</option>
                                </select>
                            </div>
                            <div class="input">
                                <label for="motorprice">Rent Price Per Day</label><br>
                                <input type="number" name="motorprice" id="motorprice" placeholder="Please input rent price..." required>
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
                        $notdupe = true;
                        $idnotdupe = true;
                        if(isset($_POST['submit'])){
                            $motorid = $_POST['motorid'];
                            $resultid = (mysqli_query($conn, "SELECT MotorID FROM tbmotorcycle WHERE MotorID = '$motorid'"));
                            $row = mysqli_fetch_array($resultid);
                            if ($row > 0){
                                $idnotdupe = false;
                                echo '<script>';
                                echo 'alert("ID already registered!")';
                                echo '</script>';
                            }
                            $motorname = $_POST['motorname'];
                            $motorplat = $_POST['motorplat'];
                            $result = (mysqli_query($conn, "SELECT MotorPlat FROM tbmotorcycle WHERE MotorPlat = '$motorplat'"));
                            $row = mysqli_fetch_array($result);
                            if ($row > 0){
                                $notdupe = false;
                                echo '<script>';
                                echo 'alert("Nomor kendaraan sudah terdaftar!")';
                                echo '</script>';
                            }
                            $motorcc = $_POST['motorcc'];
                            $motortm = $_POST['motortm'];
                            $motorprice = $_POST['motorprice'];
                            $sql = "INSERT INTO tbmotorcycle VALUES ('$motorid','$motorname','$motorplat','$motorcc','$motortm','$motorprice','AVAILABLE')";
                            if(!empty($motorid) && !empty($motorname) && !empty($motorplat) && !empty($motorcc) && !empty($motortm) && !empty($motorprice) && $notdupe && $idnotdupe){
                                mysqli_query($conn, $sql);
                                echo '<script>';
                                echo 'alert("Data saved!")';
                                echo '</script>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </body>
    </html>