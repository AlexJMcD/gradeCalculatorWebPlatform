<?php 
    include_once 'header.php';
?>
    <section class="register-form">
        <div class="register-form-form">
            <form action="includes/register.inc.php" method="post">
                <h2 class="form-header">Register</h2>
                <input type="text" name="student-number" placeholder="Student ID">
                <input type="text" name="name" placeholder="Full name">
                <input type="text" name="email" placeholder="Student Email">
                <input type="text" name="email-confirm" placeholder="Confirm email">
                <input type="password" name="password" placeholder="Password">
                <input type="password" name="password-confirm" placeholder="Confirm password">
                <button type="submit" name="submit">Register</button>
            </form>
        </div>
        <?php
        if( isset($_GET["error"])){
            if($_GET["error"] == "emptyinput"){
                echo "<div class='error-occ'><p class='error-message'>Please ensure that all the requested fields have been filled.</p></div>";
            }
            elseif($_GET["error"] == "invalidStudentID"){
                echo "<div class='error-occ'><p class='error-message'>You have entered an invalid student number.</p></div>";
            }
            elseif($_GET["error"] == "invalidEmail"){
                echo "<div class='error-occ'><p class='error-message'>Please enter a valid email address.</p></div>";
            }
            elseif($_GET["error"] == "emailDiffer"){
                echo "<div class='error-occ'><p class='error-message'>Please ensure that the entered emails match.</p></div>";
            }
            elseif($_GET["error"] == "pwdDiffer"){
                echo "<div class='error-occ'><p class='error-message'>Please ensure that the entered passwords match.</p></div>";
            }
            elseif($_GET["error"] == "studentIDTaken"){
                echo "<div class='error-occ'><p class='error-message'>An account with this student number already exists click <a class='acc-exists' href='login.php'>here</a> to login.</p></div>";
            }
            elseif($_GET["error"] == "emailTaken"){
                echo "<div class='error-occ'><p class='error-message'>An account with this email number already exists click <a class='acc-exists' href='login.php'>here</a> to login.</p></div>";
            }
            elseif($_GET["error"] == "pwdShort"){
                echo "<div class='error-occ'><p class='error-message'>Your chosen password is too short. Please choose a password with 7 or more characters.</p></div>";
            }
            elseif($_GET["error"] == "stmtfailed"){
                echo "<div class='error-occ'><p class='error-message'>Something went wrong. Please try again.</p></div>";
            }
            elseif($_GET["error"] == "none"){
                echo "<div class='error-occ'><p class='error-message'>You have registered.</p></div>";
            }
            #Change this to include a message that flashes prior to redirect^
            # to demonstrate the error messages, use address similar to the following http://localhost/register.php?error=pwdDiffer
        }
        
    ?>
    </section>
    
<?php
    include_once 'footer.php';
?>     