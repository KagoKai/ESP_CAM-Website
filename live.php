<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESP Website</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
        function ReloadImage()
        {
            var image_element = document.getElementById('stream');
            
            image_element.src = './StreamFrame/stream_frame.jpg?rand=' + Math.random();
        }

        setInterval(ReloadImage,100);
    </script>
</head>

<body>
    <div id="container">
        <div id="header">
            <img class="logo" src="Logo.png" width=40px height=60px/>
            <h1 class="webname">ESP Video Database</h1>
        </div>

        <div id="content">
            <div id="nav">
                <h3 class="navname">Navigation</h3>
                <ul class="navlist">
                    <li><a href="index.php">Main page</a></li>
                    <li><a  href="video.php">Video</a></li>
                    <li><a class="active" href="">Live</a></li>
                </ul>
            </div>

            <div id="main">
                <h2 class="greeting">Live Streaming</h2>
                <p>Dữ liệu trực tiếp từ ESP32-CAM sẽ được truyền đến đây:</p>
                <div id="streamBox">
                    <img id="stream" height='600' width='800' src="./StreamFrame/stream_frame.jpg" alt="Image">
                </div>
            </div>
        </div>

        <div id="footer">
            <p class="trademark">Copyright &copy HUST 2023</p>
        </div>

    </div>
</body>
</html>