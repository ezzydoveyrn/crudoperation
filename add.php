<?php require_once("header.php"); ?>
<?php require_once("dbconn.php"); ?>
    <div class="container">
      <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="fname">First Name</label>
        <input type="text" name="fname" id="name" class="form-control" placeholder="first name">
        <label for="lname">Last Name</label>
        <input type="text" name="lname" id="lastName" class="form-control" placeholder="last name">
        <label for="age">Age</label>
        <input type="number" name="age" id="age" class="form-control" placeholder="age">
        <input type="submit" name="add" value="ADD" class="btn btn-primary" style="margin-top: 10px; float: right;"> 
      </form>
    </div>
    <?php
    if(isset($_POST["add"])){
      $firstName = filter_input(INPUT_POST, "fname", FILTER_SANITIZE_SPECIAL_CHARS);
      $lastName = filter_input(INPUT_POST, "lname", FILTER_SANITIZE_SPECIAL_CHARS);
      $Age = filter_input(INPUT_POST, "age", FILTER_SANITIZE_SPECIAL_CHARS);
      if(!empty($firstName) && !empty($lastName) && !empty($Age)){
        $sql = "INSERT INTO students (first_name, last_name, age) VALUES ('$firstName', '$lastName', '$Age')";
        $result = mysqli_query($conn, $sql);
      }elseif(empty($firstName)){
        header("Location: add.php?alert=one of your fields is empty");
      }elseif(empty($lastName)){
        header("Location: add.php?alert=one of your fields is empty");
      }elseif(empty($Age)){
        header("Location: add.php?alert=one of your fields is empty");
      }

      
      if($result){
        header("Location: index.php?added_msg=added successfully");
      }
    }
    ?>
<?php require_once("footer.php"); ?>