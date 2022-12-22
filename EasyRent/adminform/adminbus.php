<DOCTYPE! html>
    <html>
        <head>
            <title>
                Add Bus
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
            <?php include '../navbar/adminnav.html'?>
            <div class="container">
                <div class="content-wrap">
                    <div class="form-wrap">
                        <h1>Add Bus Form</h1>
                        <form action="" method="POST">
                            <div class="input">
                                <label for="busid">Bus ID</label><br>
                                <input type="text" name="busid" id="busid" placeholder="Please input bus ID..."required>
                            </div>
                            <div class="input">
                                <label for="busname">Bus Name</label><br>
                                <input type="text" name="busname" id="busname" placeholder="Please input bus name..."required>
                            </div>
                            <div class="input">
                                <label for="busplat">Vehicle Number</label><br>
                                <input type="text" name="busplat" id="busplat" placeholder="Please input vehicle number..."required>
                            </div>
                            <div class="input">
                                <label for="capacity">Bus Capacity</label><br>
                                <select name="capacity" id="capacity" required>
                                    <option selected hidden value="" style="font-size: 13px">Choose bus capacity</option>
                                    <option value="47-48">47-48</option>
                                    <option value="31-41">31-41</option>
                                    <option value="25-27">25-27</option>
                                </select>
                            </div>
                            <div class="input">
                                <label for="price">Rent Price per Day</label><br>
                                <input type="number" name="price" id="price" placeholder="Please input rent price per day..." required>
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
                    $notdupe = true;
                    $idnotupe = true;
                    if(isset($_POST['submit'])){
                        $busid = $_POST['busid'];
                        $resultid = (mysqli_query($conn, "SELECT BusID FROM tbbus WHERE BusID = '$busid'"));
                        $row = mysqli_fetch_array($resultid);
                        if ($row > 0){
                            $idnotdupe = false;
                            echo '<script>';
                            echo 'alert("ID already registered!")';
                            echo '</script>';
                        }
                        $busname = $_POST['busname'];
                        $busplat = $_POST['busplat'];
                        $result = (mysqli_query($conn, "SELECT BusPlat FROM tbbus WHERE BusPlat = '$busplat'"));
                        $row = mysqli_fetch_array($result);
                        if ($row > 0){
                            $notdupe = false;
                            echo '<script>';
                            echo 'alert("Vehicle number already registered!")';
                            echo '</script>';
                        }
                        $buscapacity = $_POST['capacity'];
                        $price = $_POST['price'];
                        $sql = "INSERT INTO tbbus VALUES('$busid','$busname','$busplat','$buscapacity','$price', 'AVAILABLE')";
                        if(!empty($busid) && !empty($busname) && !empty($busplat)  && !empty($buscapacity)  && !empty($price) && $notdupe && $idnotupe){
                            mysqli_query($conn, $sql);
                            echo '<script>';
                            echo 'alert("Data saved!")';
                            echo '</script>';
                        }
                    }
                ?>
            </div>
        </body>
    </html>