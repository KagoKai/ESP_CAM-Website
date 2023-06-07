<?php 
    include "dbConfig.php";
?>

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