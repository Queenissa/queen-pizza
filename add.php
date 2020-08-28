<?php 

$email = $title = $ingredients = '';
$errors = array('email'=>'', 'title'=>'', 'ingredients'=>'');


if(isset($_POST['submit'])){
    if(empty($_POST['email'])){
       $errors['email'] =  "An email is required* <br>";
    } else {
        $email = $_POST['email'];
       
}

    //check title
    if(empty($_POST['title'])){
        $errors['title'] =  "A pizza name is required* <br>";
    } else {
        $title = $_POST['title'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $title)){
         $errors['title'] = "Name must be letters and spaces only <br>";
        }
    }


    //check ingredients
    if(empty($_POST['ingredients'])){
        $errors['ingredients'] = "At least one ingredient is required* <br>";
    } else {
        $ingredients = $_POST['ingredients'];
        if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
            $errors['ingredients'] = "Ingredients must be separated by comma <br>";
        }
    }


    if(array_filter($errors)){
        // echo "There is error in the form";
    } else{
        // echo "Form is valid";
        header('Location: index.php');
    }

    
} //end of POST check

?>





<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

<br>
    <section class="container black-text">
    <h4 class="center">Add A Pizza</h4><br>
    <form action="add.php" method="POST" class="white">

    
        <label>Your Email:</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($email) ?>">
        <div class="red-text"><?php echo $errors['email']; ?></div>

          <label>Pizza Name:</label>
        <input type="text" name="title" value="<?php echo htmlspecialchars($title) ?>">
        <div class="red-text"><?php echo $errors['title']; ?></div>


          <label>Ingredients (comma separated):</label>
        <input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients) ?>">
        <div class="red-text"><?php echo $errors['ingredients']; ?></div>

        <br><br>
        <div class="center">
        <input type="submit" name="submit" value="submit" class="btn deep-orange darken-3 z-depth">
        </div>

 
</form>
</section>
<br>


<?php include('templates/footer.php'); ?>

    

</html>