<?php
require('config/db.php');
?>
<?
//check for submit
if(isset($_POST['submit'])){
//Get from data
$update_id = mysqli_real_escape_string($conn, $_POST['updated_id']);
$title = mysqli_real_escape_string($conn, $_POST['title']);
$body = mysqli_real_escape_string($conn, $_POST['body']);
$author = mysqli_real_escape_string($conn, $_POST['author']);


$query = "UPDATE posts SET 
    title='$title';
    author = '$author';
    body = '$body';
    WHERE id ={$updated_id}
";

if(mysqli_query($conn, $query)){
    header('Location: '.ROOT_URL.'');
    }else{
        echo 'ERROR:'. mysqli_error($conn);
    }
}

//Id
$id = mysqli_real_escape_string($conn,$_GET['id']);

//create Query
$query = 'SELECT * FROM posts WHERE id = '.$id;

//Get Result
$result = mysqli_query($conn,$query);

//Fetch Data
$post = mysqli_fetch_assoc($result);
//var dump($posts);

//free result
mysqli_free_result($result);

//Close Connection
mysqli_close($conn);


?>


<?php include('inc/header.php'); 

?>
<div class="container">
    <h1>Add Post</h1>
 <form method="POST "action="<?php $_SERVER['PHP_SELF']; ?>">
 <div class="form-group">
 <label>Title</label>
 <input type="text" name="title"  class="form-control" value="<?php echo $post['title']; ?>">
 </div>

 <div class="form-group">
 <label>Author</label>
 <input type="text" name="author" class="form-control" value="<?php echo $post['author']; ?>">
 </div>
 
 <div class="form-group">
 <label>Body</label>
 <textarea type="text" name="body" class="form-control" value="<?php echo $post['body']; ?>"></textarea>
 </div>
 <input type="hidden" name="update_id" value="<?php echo $post['id']; ?>">
 <input type="submit" name="submit" value="Submit"   class="btn btn-primary">


 </form>
   
</div>

<?php include('inc/footer.php'); ?>
