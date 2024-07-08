<!DOCTYPE html>
<html>
    <head>
        <title>Recipe Report</title>
        <link rel="stylesheet" href="layout.css">
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
            <h3>Recipe Selection Form</h3>
           
            <form action="./recipeReport.php" method="post" > <!-- Calling recipeReport.php for displaying the report on click of Submit -->
            <!--creating the table-->
                <table border="1">
                    <tbody><tr>
                        <!--setting the headers-->
                        <th><input type="checkbox" onclick="var rplist = document.getElementsByClassName('checkbx'); for(var i = 0; i < rplist.length; i++) rplist[i].checked = !rplist[i].checked"  value="Select"/></th>
                        <th>Recipe</th>
                        <th>PreparationTime</th>
                        <th>CookingTime</th>
                        <th>Category</th>
                        <th>Nutrition</th>
                        <th>Ingredients</th>
                        <th>Method</th>
                        <th>Icon</th>
                        <th>Delete</th>
                    </tr>
                   
                    <?php  include('recipeDataTable.php'); ?>  <!-- Logic for displaying the data on the table from the database -->
                    </tbody>
                </table>

                <input type="submit" value="Create Recipe Report" /> <!--On click redirects to recipeReport page -->
                            
            </form>
        </main>
        <footer>&copy; CSYM019 2022</footer>
    </body>
</html>