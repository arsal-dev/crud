<?php require('./db_connect.php'); ?>

<?php

    include('./select.php');

    $errors = [];

    if(isset($_POST['submit'])){
      $name = $_POST['name'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $password = $_POST['password'];


      if(empty($name)){
        $errors['name'] = "Please Enter Your Name";
      }
      elseif(empty($email)){
        $errors['email'] = "Please Enter Your email";
      }
      elseif(empty($phone)){
        $errors['phone'] = "Please Enter Your phone";
      }
      elseif(empty($password)){
        $errors['password'] = "Please Enter Your password";
      }
      else {
        
        $sql = "INSERT INTO users (name, email, phone, password) VALUES ('$name', '$email', '$phone', '$password')";
        if($conn->query($sql)){
          echo 'Data Inserted Successfully';
        }
        else {
          echo 'There was an error inserting the records';
        }
      }

    }
?>

    <?php include('./includes/header.php'); ?>

      <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" id="name" name="name" class="form-control" value="<?php echo $name ?? ""; ?>" placeholder="Enter Your Name">
          <p class="text-danger"><?php echo $errors['name'] ?? ""; ?></p>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" class="form-control" value="<?php echo $email ?? ""; ?>" placeholder="Enter Your email">
          <p class="text-danger"><?php echo $errors['email'] ?? ""; ?></p>
        </div>
        <div class="form-group">
          <label for="phone">Phone</label>
          <input type="text" id="phone" name="phone" class="form-control" value="<?php echo $phone ?? ""; ?>" placeholder="Enter Your phone Number">
          <p class="text-danger"><?php echo $errors['phone'] ?? ""; ?></p>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" class="form-control" value="<?php echo $password ?? ""; ?>" placeholder="Enter Your password">
          <p class="text-danger"><?php echo $errors['password'] ?? ""; ?></p>
        </div>
        <div class="form-group mt-3">
          <input type="submit" name="submit" class="btn btn-primary">
        </div>
      </form>


        <table class="table table-hover mt-5">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Phone</th>
              <th scope="col">Password</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
              <th><?php echo $row['name']; ?></th>
              <th><?php echo $row['email']; ?></th>
              <th><?php echo $row['phone']; ?></th>
              <th><?php echo $row['password']; ?></th>
              <th><a href="delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">DELETE</a></th>
            </tr>
            <?php endwhile; ?>
          </tbody>

          <?php include('./includes/footer.php'); ?>