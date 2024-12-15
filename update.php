<?php require_once("header.php"); ?>
<?php require_once("dbconn.php"); ?>
    <?php
    if(isset($_GET["id"])){
      $id = $_GET["id"];
    }
    ?>
    <table class="table table-hover table-bordered table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Age</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $sql = "SELECT * FROM students WHERE id ='$id'";
          $result = mysqli_query($conn, $sql);

          if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
              $id = $row["id"];
              $fname = $row["first_name"];
              $lname = $row["last_name"];
              $age = $row["age"];
              ?>
              <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $fname; ?></td>
                <td><?php echo $lname; ?></td>
                <td><?php echo $age; ?></td>
                <td><a href="delete.php?id=<?php echo $id; ?>" class="btn btn-danger">delete</a></td>
              </tr>
              <?php
            }

          }
        ?>
      </tbody>
    </table>
    <div class="container">
      <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="fname">First Name</label>
        <input type="text" name="fname" id="name" class="form-control" value="<?php echo $fname; ?>">
        <label for="lname">Last Name</label>
        <input type="text" name="lname" id="lastName" class="form-control" value="<?php echo $lname; ?>">
        <label for="age">Age</label>
        <input type="number" name="age" id="age" class="form-control" value="<?php echo $age; ?>">
        <input type="submit" name="update" value="UPDATE" class="btn btn-success" style="margin-top: 10px; float: right;"> 
      </form>
    </div>
    <?php
    if(isset($_POST["update"])){
      $firstName = filter_input(INPUT_POST, "fname", FILTER_SANITIZE_SPECIAL_CHARS);
      $lastName = filter_input(INPUT_POST, "lname", FILTER_SANITIZE_SPECIAL_CHARS);
      $Age = filter_input(INPUT_POST, "age", FILTER_SANITIZE_SPECIAL_CHARS);

      $sql = "UPDATE students SET first_name = '$firstName', last_name = '$lastName', age = '$Age' WHERE id='$id'";
      $result = mysqli_query($conn, $sql);
      if($result){
        header("Location: index.php?update_msg=updated successfully");
      }
    }
    ?>
<?php require_once("footer.php"); ?>