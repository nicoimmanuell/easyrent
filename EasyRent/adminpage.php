<DOCTYPE! html>
    <html>
        <head>
            <title>Admin Page</title>
            <style>
                @keyframes fade { 
                    0% {
                        opacity: 0;
                    }

                    100% {
                        opacity: 1;
                    }
                }
                html, body {
                    animation: fade 2s;
                    width: 100%;
                    height: 100%;
                    margin: 0;
                    scroll-behavior: smooth;
                }
                body{
                    background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),url('images/adminhome.png');
                    background-repeat: no-repeat;
                    background-size: cover;
                    background-attachment: fixed;
                }
                .menu-wrap{
                    margin: auto;
                    width: 1000px;
                    padding: 20px;
                    top: 20%;
                    position: relative;
                    text-align: center;
                    border-radius: 15px;
                    background-color: rgba(0,0,0,0.7);
                }
                .menu-content{
                    display:flex;
                    justify-content: center;
                }
                .menu-content-2{
                    width: 700px;
                    margin: auto;
                    display:flex;
                    justify-content: center;
                }
                .menu-content-2 img{
                    width: 300px;
                }
                .menu{
                    filter: brightness(85%);
                    width: 400px;
                    height: 200px;
                    margin: 50px 20px 50px 20px;
                }
                .menu, img{
                    border-radius: 10px;
                }
                .desc {
                    width: 100%;
                    color: white;
                    opacity: 0;
                    text-align: center;
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    font-size: 22px;
                    font-family: 'Gotham';
                }

                .menu:hover .desc{
                    transition: all .2s ease-in-out;
                    opacity: 1;
                }
                .menu:hover img{
                    transition: all .2s ease-in-out;
                    filter: brightness(50%);
                    transform: scale(1.05);
                }
                img {
                    width: 100%;
                    height: 100%;
                }
                .menu-page{
                    width: 100%;
                    height: 100%;
                    background-repeat: no-repeat;
                    background-size: 100%;
                    background-position: fixed;
                }
                .content-wrap{
                    display: block;
                }
                h3{
                    color: white;
                    font-size: 30px;
                    letter-spacing: 2px;
                    font-family: 'Gotham';
                    margin-bottom: 0;
                }
            </style>
        </head>
        <body>
            <?php include 'navbar/adminnavhome.html'; ?>
            <div class='content-wrap'>
                <div class='menu-page' id="menu-page">
                    <div class="menu-wrap">
                        <h3>Table List</h3>
                        <div class='menu-content'>
                            <div class="menu">
                                <a href="admintables/showmotor.php">
                                    <img src="images/motorcycle.jpg" alt="">
                                    <div class="desc">Motorcycle</div>
                                </a>
                            </div>
                            <div class="menu">
                                <a href="admintables/showcar.php">
                                    <img src="images/car.jpeg" alt="">
                                    <div class="desc">Car</div>
                                </a>
                            </div>
                            <div class="menu">
                                <a href="admintables/showbus.php">
                                    <img src="images/bus.jpg" alt="">
                                    <div class="desc">Bus</div>
                                </a>
                            </div>
                        </div>
                        <div class='menu-content-2'>
                            <div class="menu">
                                <a href="admintables/showcustomer.php">
                                    <img src="images/customer.jpg" alt="" onmouseover="toggle()">
                                    <div class="desc">Customer</div>
                                </a>
                            </div>
                            <div class="menu">
                                <a href="admintables/showrent.php">
                                    <img src="images/rent.jpg" alt="">
                                    <div class="desc">Rent</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </body>
    </html>