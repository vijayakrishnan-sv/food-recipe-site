<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <header>
        <h3> CSYM019 BBC GOOD FOOD RECIPES</h3>
    </header>
    <body>
    <main>
            <h3>Login</h3>
         
            <form method="post">
                <span  class="usernameclass">
                    <label>Username</label>
                    <input name="usernameText" type="text" maxlength="100"  placeholder="User Name" >
                </span>

                <br><br>
                <span  class="passclass">
                    <label>Password </label>
                    <input name="passwordText" type="password" maxlength="100"  placeholder="Password" >   
                </span>
                
                <br>
                <br> <br>
                <span class="save">
                    <input type="submit"  value="Log In" name="submit"> 
                </span>
            </form>
        </main>
        <br>
        <br>
        <br>
        <?php  
        if(isset($_POST["submit"])){   // validation on click of submit
        
            if(!empty($_POST['usernameText']) && !empty($_POST['passwordText'])) {  // if username and password details are entered
                $sqlcon = mysqli_connect('localhost', 'admin', 'the_secure_password') or die(mysqli_error()); // database connection
                mysqli_select_db($sqlcon,'reciepe_data') or die("cannot select DB");  // selecting db
                $userValue=$_POST['usernameText'];  
                $pswdValue=$_POST['passwordText'];  

                $query=mysqli_query($sqlcon,"SELECT * FROM admin_details WHERE user_name='".$userValue."' AND password='".$pswdValue."'");  
                 $numrows=mysqli_num_rows($query);  
                if($numrows!=0)  {   // if row present then the user is valid
                    header("Location: recipeSelectionForm.php");   // redirect to selection page
                } else {  
                    echo "Invalid username or password!";  
                } 
               
        
            } else {  
                echo "Please enter the details!";  //else display to enter the required details
            }  
        }
        ?>
    </body>
    <footer>&copy; CSYM019 2022</footer>
</html>