<!DOCTYPE html>
<html>
    <head>
        <title>Recipe Report</title>
        <meta name="recipe add page" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="layout.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js">
        </script>
    </head>
    <body>
        <header>
            <h3>CSYM019 - BBC GOOD FOOD RECIPES</h3>
        </header>
        <nav>
            <ul>
                <li><a href="./recipeSelectionForm.php">Recipe Report</a></li>
                <li><a href="./newRecipe.php">New Recipe</a></li>
            </ul>
        </nav>
        <main>
            <h1>New Recipe Entry Form</h1>
            <form action="/Task2/add_recipes.php" method="POST"> <!-- Calling add_recipes.php for adding the new recipes on click of Submit -->
                   
                <div class="addmore">
                    <!-- Page fr adding recipes..-->
                    <h3>Please add the Recipes</h3>
			<!--Construction of the recipe table with the input details  -->
           <table> 
			<tr>
				<td>Name</td>
				<td><input type="text" name="rpname" placeholder="Recipe Name" /></td>
			</tr>
			
			<tr>
				<td>Author</td>
				<td><input type="text" name="author" placeholder="Author"/></td>
			</tr>
			<tr>
				<td>Rating</td>
				<td><input type="text" name="rating" placeholder="Rating"/></td>
			</tr>
			<tr>
				<td>Prep Time (minutes)</td>
				<td><input type="text" name="ptime" /></td>
			</tr>
			<tr>
				<td>Cook Time (minutes)</td>
				<td><input type="text" name="ctime" /></td>
			</tr>
            <tr>
				<td>Description</td>
				<td><textarea name="description"></textarea></td>
			</tr>
			<tr>
				<td>Serves</td>
				<td><input type="text" name="serves" placeholder="No of Serves" /></td>
			</tr>
			<tr>
				<td>Category</td>
				<td><select name="categry"  type="text"><option value="Easy">Easy</option><option value="More Effort">More Effort</option></select></td>
			</tr>
			<tr>
				<td>NutritionMeter</td>
				<!--Adding value against each nutrients  -->
				<td>
					<input type="text" name="kcal" placeholder="kcal"  /><br />
					<input type="text" name="fat" placeholder="fat (g)"  /><br />
					<input type="text" name="saturates" placeholder="saturates (g)"  /><br />
					<input type="text" name="carbs" placeholder="carbs (g)"  /><br />
					<input type="text" name="sugars" placeholder="sugars (g)"  /><br />
					<input type="text" name="fibre" placeholder="fibre (g)"  /><br />
					<input type="text" name="protein" placeholder="protein (g)"  /><br />
					<input type="text" name="salt" placeholder="salt (g)"  /><br />
				</td>
			</tr>
			<tr>
				<td>Ingredients</td>
				<td>
					<input type="text" name="ingredients[]" /><br />
					<div id="adding"></div>
					<!--Adding extra text box for each ingredient  -->
					<input type="button" value="Add" onclick="document.getElementById('adding').insertAdjacentHTML('beforeend', '<input type=\'text\' name=\'ingredients[]\' /><br />');" />
				</td>
			</tr>
			<tr>
				<td>Method</td>
				<td>
					<input type="text" name="method[]" /><br />
					<div id="addmethod"></div>
					<!--Adding extra text box for each method  -->
					<input type="button" value="Add" onclick="document.getElementById('addmethod').insertAdjacentHTML('beforeend', '<input type=\'text\' name=\'method[]\' /><br />');" />
					
				</td>
			</tr>
			<tr>
				<td>Icon</td>
				<td><select name="icon">
					<option value="breakfast.png">Breakfast</option>
					<option value="cake.png">Cake</option>
					<option value="fish.png">Fish</option>
					<option value="meat.png">Meat</option>
					<option value="pescatarian.png">Pescatarian</option>
					<option value="seafood.png">Seafood</option>
					<option value="vegan.png">Vegan</option>
					<option value="Vegetarian.png">Vegetarian</option>
				</select></td>
			</tr>
                    </table>
		    <br />
                
                    <input type="submit" value="Add Recipe" />
                                
                </div>
            </form>
        </main>
    
        <footer>&copy; CSYM019 2022</footer>
    </body>
</html>
