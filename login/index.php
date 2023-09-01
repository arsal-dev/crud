<?php include './includes/header.php'; ?>

<?php 

    if(!isset($_SESSION['username'])){
        header('Location: login.php');
    }

?>

<h3 class="text-center">Welcome To My Project: <?php echo $_SESSION['username']; ?></h3>
<?php include './includes/footer.php'; ?>
    