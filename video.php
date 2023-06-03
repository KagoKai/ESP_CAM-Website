<?php 
    include "upload.php";
    include "dbConfig.php"; 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESP Website</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
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
                    <li><a class="active" href="">Video</a></li>
                    <li><a href="about.php">About</a></li>
                </ul>
            </div>

            <div id="main">
                <h2 class="greeting">Kho lưu trữ video</h2>
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    Lựa chọn file muốn tải lên server: 
                    <input type="file" name="file">
                    <input type="submit" name="submit" value="Tải lên">
                </form>
                <div id="display">
                    <?php
                        // Get images from the database
                        $query = $db->query("SELECT * FROM images ORDER BY uploaded_on DESC");

                        if($query->num_rows > 0){
                            while($row = $query->fetch_assoc()){
                                $imageURL = 'images/'.$row["file_name"];
                    ?>
                                <?php echo  "<a class=\"file_link\" href=\"$imageURL\">$imageURL<br/></a>"; ?>
                        <?php 
                            }
                        }else{ ?>
                            <p>No file(s) found...</p>
                    <?php } 
                    ?>
                </div>
            </div>
        </div>

        <div id="footer">
            <p class="trademark">Copyright &copy HUST 2023</p>
        </div>

    </div>
</body>
</html>