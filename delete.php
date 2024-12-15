<?php require_once("header.php"); ?>
<?php require_once("dbconn.php"); ?>
    <?php
    if(isset($_GET["id"])){
      $id = $_GET["id"];
      echo $id;
    }
    ?>
    <?php
      $sql = "DELETE FROM students WHERE id ='$id'";
      $result = mysqli_query($conn, $sql);
      if($result){
        header("Location: index.php?delete_msg=Deleted Successfully");
      }
    ?>
<?php require_once("footer.php"); ?>