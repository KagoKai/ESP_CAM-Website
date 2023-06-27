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

    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script>
        $('#uploadForm').on('submit', function(e){
        e.preventDefault();
        var formData = new FormData(this);
        // Using ajax to update the Webpage asynchronously
        $.ajax({
            type:'POST',
            url: 'upload.php',
            data:$(this).serialize(),
            cache:false,
            contentType: false,
            processData: false,
            success:function(result)
            {
                alert("Submit successfully !");
            }
        });
        return false;
        });
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
                    <li><a class="active" href="">Video</a></li>
                    <li><a href="live.php">Live</a></li>
                </ul>
            </div>

            <div id="main">
                <h2 class="greeting">Kho lưu trữ video</h2>
                <form name="uploadForm" method="post" enctype="multipart/form-data">
                    Lựa chọn file muốn tải lên server: 
                    <input type="file" name="imageFile">
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