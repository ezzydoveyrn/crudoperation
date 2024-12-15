<?php require_once("header.php"); ?>
<?php require_once("dbconn.php"); ?>
    <div class="box1">
      <h2>All Students</h2>
      <a href="add.php?add_msg=add student" class="btn btn-primary" style="float: right;">ADD STUDENT</a>
    </div>
    <table class="table table-hover table-bordered table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Age</th>
          <th>Update</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $sql = "SELECT * FROM students";
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
                <td><a href="update.php?id=<?php echo $id; ?>" class="btn btn-primary">update</a></td>
                <td><a href="delete.php?id=<?php echo $id; ?>" class="btn btn-danger">delete</a></td>
              </tr>
              <?php
            }

          }
        ?>
      </tbody>
    </table>
    <!-- Modal -->
<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD STUDENTS</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
          <div class="form-group">
            <label for="f_name">First Name</label>
            <input type="text" name="f_name" class="form-control">
            <label for="l-name">Last Name</label>
            <input type="text" name="l_name" class="form-control">
            <label for="age">Age</label>
            <input type="text" name="age" class="form-control">
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</form>
<?php require_once("footer.php"); ?>