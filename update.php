<?php 
    include 'db_connect.php';

    $id = $_GET['id'];

    $sql = "SELECT * FROM users WHERE id = $id";

    $result = $conn->query($sql);

    $row = $result->fetch_assoc();
?>

<?php include './includes/header.php'; ?>
    <form method="POST" action="./data_update.php">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" id="name" name="name" class="form-control" value="<?php echo $row['name']; ?>" placeholder="Enter Your Name">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" class="form-control" value="<?php echo $row['email'];; ?>" placeholder="Enter Your email">
        </div>
        <div class="form-group">
          <label for="phone">Phone</label>
          <input type="text" id="phone" name="phone" class="form-control" value="<?php echo $row['phone'];; ?>" placeholder="Enter Your phone Number">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="text" id="password" name="password" class="form-control" value="<?php echo $row['password']; ?>" placeholder="Enter Your password">
        </div>
        <div class="form-group mt-3">
          <input type="submit" name="submit" class="btn btn-primary">
        </div>
      </form>

      <?php include './includes/footer.php'; ?>