<?php
  
    $sqlcon = mysqli_connect('localhost', 'admin', 'the_secure_password') or die(mysqli_error()); // database connection using mysqli
    mysqli_select_db($sqlcon,'reciepe_data') or die("cannot select DB");   // selecting the db for connection
		
	// Details on what should be done when Delete is called for a selected recipe
        if(isset($_GET['delete'])) {
            $id = intval($_GET['delete']); // getting the id of the device to be deleted
            mysqli_query($sqlcon, "delete from recipes where id=$id"); // executing the query for deletion
            header('Location: recipeSelectionForm.php'); // navigating to the parent page  recipeSelectionForm
        }
    
        $recipelist = mysqli_query($sqlcon, 'select * from recipes order by name asc'); // Getting the list of recipes from db using select statement in ascending order of recipe name 
    


	while($recipeData = mysqli_fetch_array($recipelist)) { // iterating over each data in the DB
			
			$recipeData['nutrition'] = explode(",", $recipeData['nutrition']); // Conversion of the nutrients from string to array format using explode
        
?>

<!-- Populating the data for each recipe in the table from the db -->
		<tr>
			<td style="text-align:center;"><input type="checkbox" class="checkbx" name="selectedRecipe[]" value="<?php echo $recipeData['id'] ?>" /></td>
			<td><?php echo $recipeData['name']; ?></td>
			<td><?php echo $recipeData['prep_time']; ?> </td>
            <td><?php echo $recipeData['cook_time']; ?></td>
            <td><?php echo $recipeData['categry']; ?></td>
            <!--Adding all the nutrients details -->
            
			<td><?php echo preg_replace( '/[\W]/', '', $recipeData['nutrition'][0]) ?><br><?php echo preg_replace( '/[\W]/', '', $recipeData['nutrition'][1]) ?><br>
            <?php echo preg_replace( '/[\W]/', '', $recipeData['nutrition'][2]) ?><br> <?php echo preg_replace( '/[\W]/', '', $recipeData['nutrition'][3]) ?><br>
            <?php echo preg_replace( '/[\W]/', '', $recipeData['nutrition'][4]) ?><br><?php echo preg_replace( '/[\W]/', '', $recipeData['nutrition'][5])?><br>
             <?php echo preg_replace( '/[\W]/', '', $recipeData['nutrition'][6])?><br><?php echo preg_replace( '/[\W]/', '', $recipeData['nutrition'][7]) ?><br></td>
			<td><ul><?php echo $recipeData['ingredient']; ?></ul></td>
			<td><ol><?php echo $recipeData['method']; ?></ol></td>
			<td><img src="<?php echo $recipeData['icon']; ?>"  width="50" height="50"></td>
            <!-- Addition of Delete option -->
            <td><a href="?delete=<?php echo $recipeData['id'] ?>" onclick="var d = confirm('Do you want to delete the selected one?'); if(d === false) event.preventDefault();">Delete</a></td>
		</tr>
<?php } ?>