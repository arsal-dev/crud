<?php include './includes/header.php'; ?>
<?php 
    include './db_connect.php'; 

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];


        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            
            if(password_verify($password, $row['password'])){
                $_SESSION['username'] = $username;
                header('Location: index.php');
            }
            else {
                echo "Username or password is wrong";
            }
        }
        else {
            echo "Username or password is wrong";
        }
    }

?>
<h3 class="text-center">Login</h3>

    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
            <label for="name">Username</label>
            <input type="text" id="name" name="username" class="form-control" placeholder="Enter Your Name">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Enter Your password">
        </div>
        <div class="form-group mt-3">
            <input type="submit" name="submit" class="btn btn-primary">
        </div>
    </form>
<?php include './includes/footer.php'; ?>
    