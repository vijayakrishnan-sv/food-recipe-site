<!DOCTYPE html>
<html>
    <head>
        <title>Recipe Report</title>
        <link rel="stylesheet" href="layout.css">
    </head>
    <body>
        <header>
            <h3>CSYM019 - BBC GOOD FOOD RECIPES</h3>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script> <!--library for using chart-->
        </header>
        <nav>
            <ul>
                <li><a href="./recipeSelectionForm.php">Recipe Select</a></li>
                <li><a href="./newRecipe.php">New Recipe</a></li>
            </ul>
        </nav>
        <main>
            <h3>Recipe Reoprt</h3>
            <?php 
             if(!isset($_POST['selectedRecipe'])) { // If select recipe tag is not set , redirected to parent page>
                header('Location: recipeSelectionForm.php');
                exit;
            }
            $count = 0; //setting a count value for the selection
            $nutritions = [];
            foreach($_POST['selectedRecipe'] as $id) { //iterating over each selection
                $id = intval($id); // setting the id
		        $count++;
                $sqlcon = mysqli_connect('localhost', 'admin', 'the_secure_password') or die(mysqli_error()); // database connection
                mysqli_select_db($sqlcon,'reciepe_data') or die("cannot select DB");  // selecting db
                $recipedata = mysqli_fetch_array(mysqli_query($sqlcon, "select * from recipes where id='$id'")); // fetching  the recipedata array 
                if(!isset($recipedata['id'])) // to continue if id is null/not set
                    continue;

                $recipedata['nutrition'] = explode(",", $recipedata['nutrition']); // Conversion of the nutrients from string to array format using explode
                $recipedata['ingredient'] = '<li>' . str_replace("\n", '</li><li>', $recipedata['ingredient']) . '</li>'; // Converting ingredients of recipe  to a list 
                $recipedata['method'] = '<li>' . str_replace("\n", '</li><li>', $recipedata['method']) . '</li>'; // Converting method for the recipe to a list 
            
                ?>
                <!--Populating the table for displaying the selected recipees from selection form-->
                <div style="float: left;">
                <h3>Recipe <?php echo $count; ?></h3>
                <table border="1" width="70%" style="float: left;margin-bottom: 20px">
                <tbody>
                    <tr>
                    <th>RecipeName</th>
                    <td><?php echo $recipedata['name']; ?></td>
                    </tr>
                    <tr>
                    <th>Details</th>
                    <td><?php echo $recipedata['description']; ?>
                    Preparation Time: <?php echo $recipedata['prep_time']; ?> mins<br />Cooking time: <?php echo $recipedata['cook_time']; ?> mins<br />
                        Serves: <?php echo $recipedata['serves']; ?><br />Category: <?php echo $recipedata['categry']; ?></td>
                        </tr>
                    <th>Ingredients</th>
                    <td><ul><?php echo $recipedata['ingredient']; ?></ul></td>
                        </tr>
                        <tr>
                    <th>Method</th>
                    <td><ol><?php echo $recipedata['method']; ?></ol></td>
                        </tr>
                        <tr>
                    <th>Icon</th>
                    <td><img src="<?php echo $recipedata['icon']; ?>" width="50" height="50"></td>
                </tr>
                </table>
        <!--Creating the table for displaying the values for nutrients other than kcal as a pieChart-->
                <table border="0" width="29%" style="float:left">
                    <tr>
                        <td><canvas id="pieChart<?php echo $id; ?>" width="100" height="100"></canvas></td>
                    </tr>
                </table>
                </div>
	
		<script>
		var rdata = {
		  labels: ['Fat', 'Saturates', 'Carbs', 'Sugars', 'Fibre', 'Protein', 'Salt'], //setting the labels
          //populating the data from the selcted recipe list , preg_replace is used to extract the  numeric values.
		  datasets: [
		    {
		      label: 'Dataset 1',
		      data: [<?php echo preg_replace('/\D/', '', $recipedata['nutrition'][1]) ?>, <?php echo preg_replace('/\D/', '', $recipedata['nutrition'][2]); ?>, <?php echo preg_replace('/\D/', '', $recipedata['nutrition'][3]); ?>,
				<?php echo preg_replace('/\D/', '', $recipedata['nutrition'][4]); ?>, <?php echo preg_replace('/\D/', '', $recipedata['nutrition'][5]); ?>,<?php echo preg_replace('/\D/', '', $recipedata['nutrition'][6]); ?>,<?php echo preg_replace('/\D/', '', $recipedata['nutrition'][7]); ?>],
		      backgroundColor: [
          	 	        'rgb(179, 99, 71)',
		                'rgb(93, 208, 71)',
		                'rgb(93, 208, 239)',
		                'rgb(255, 0, 0)',
		                'rgb(255, 102, 239)',
		                'rgb(0, 0, 255)',
		                'rgb(255, 165, 0)'
		            ],
		    }
		  ]
		};

         //Configuring the chart data from the selected recipe list .what type of chart , what title etc .
		var config = {
		  type: 'pie',
		  data: rdata,
		  options: {
		    responsive: true,
		    plugins: {
		      legend: {
		        position: 'bottom',
		      },
		      title: {
		        display: true,
		        text: '<?php echo $recipedata['name']; ?> Nutrition'
		      }
		    }
		  },
		};
		var chartData = document.getElementById('pieChart<?php echo $id; ?>'); // mapping with the canvas id
		var pieChart = new Chart(chartData, config); // creating the chart
		</script>
        <?php  
         }
        ?>
        </main>
        <footer>&copy; CSYM019 2022</footer>
    </body>
</html>