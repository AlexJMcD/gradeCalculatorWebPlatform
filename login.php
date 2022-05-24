<?php 
    include_once 'header.php';
?>
    <section class="login-form">
        <div class="login-form-form">
            <form action="includes/login.inc.php" method="post">
                <h2>Login</h2>  
                <input type="text" name="studentID" placeholder="Student Number">
                <input type="password" name="pwd" placeholder="Password">
                <button type="submit" name="submit">Login</button>
            </form>
        </div>
        <?php
        if( isset($_GET["error"])){
            if($_GET["error"] == "emptyinput"){
                echo "<div class='error-occ'><p class='error-message'>Please ensure that all the requested fields have been filled.</p></div>";
            }
            elseif($_GET["error"] == "wronglogin"){
                echo "<div class='error-occ'><p class='error-message'>Your login details were entered incorrectly. Please try again.</p></div>";
            }
            #Change this to include a message that flashes prior to redirect^
            # to demonstrate the error messages, use address similar to the following http://localhost/register.php?error=pwdDiffer
        }
        
    ?>
    </section>
    </section>
<?php
    include_once 'footer.php';
?>     