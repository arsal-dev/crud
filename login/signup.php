<?php include './includes/header.php'; ?>

    <?php 

        include './db_connect.php';

        if(isset($_POST['submit'])){
            $name = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            
            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users (username, email, password) VALUES ('$name', '$email', '$password_hash')";

            if($conn->query($sql)){
                $_SESSION['username'] = $name;
                header('Location: index.php');
            }
            else {
                echo "ERROR: could not save the records";
            }

        }

    ?>


    <form method="POST" action="./signup.php">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control">
        </div>
        <div class="form-group mt-5">
            <input type="submit" name="submit" class="btn btn-secondary">
        </div>
    </form>

<?php include './includes/footer.php'; ?>