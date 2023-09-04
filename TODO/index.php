<?php 
include './includes/header.php';
include './db_connect.php';

?>

<?php 

    if(!isset($_SESSION['username'])){
        header('Location: login.php');
    }

?>

<h3 class="text-center">Welcome To My Project: <?php echo $_SESSION['username']; ?></h3>

<?php 
 if(isset($_SESSION['username'])){
?>
<div class="container-fluid border border-dark">

<form action="todo.php" class="p-5" method="post">

<div class="mb-3">
  <label for="" class="form-label">TODO Task</label>
  <input type="text"
    class="form-control" name="todo" id="" aria-describedby="helpId" placeholder="">
  <small id="helpId" class="form-text text-muted">Help text</small>
</div>

<!-- <input type="hidden" name="check" value="insert"> -->
<input type="submit" name="submit"   class="btn btn-primary" >

</form>

</div>

<h1> YOuR TODO TASK</h1>
<ul class="list-group list-group-numbered">
<?php 

$sql = "SELECT * FROM todos WHERE user_id = '{$_SESSION['user_id']}'";
$result = $conn->query($sql);

while ($row=$result->fetch_assoc()) {
    
?>    

<li class="list-group-item "><?php echo $row["todo"]; ?></li>
    

<?php

}

?>


</ul>

<?php

}



?> 

<?php 


include './includes/footer.php'; ?>
    