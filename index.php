<?php 
    include_once 'header.php';
?>
<?php
    if(isset($_SESSION["studentid"])){
        echo "<p class='welcome'>Welcome " . explode(" ", $_SESSION["studentName"])[0] . ".</p>";
    }
?>
<section>
    <div class="site-intro">
        <h2 class="intro-header">Project Site Introduction:</h2>
        <h4 class="intro-welcome">Welcome to my project site.</h4>
        <ul class="intro-text">
            <li>This project aimed to fulfil all requirements as laid out in the specification, and I believe it does.</li>
            <li>The site attemtps to mimic an Oxford Brookes site in terms of colour scheme and general layout.</li>
            <li>Users are able to register, and login.</li>
            <li>Once users are logged in, they will have access to the results system. This system is not available prior to this.</li>
            <li>Users can enter the credits and marks for each module. From this the results system will automatically calculate the grade, average mark and total credits.</li>
            <li>Users can then click a button, which from their entered results will produce a final award type and grade. In addition to this it will total up each grade type.</li>
            <li>Finally users can click a save button which then saves the marks and credits to the database.</li>
            <li>Once the marks have been saved, the results table will automatically be filled with the saved data.</li>
            <li>The saved data can then be overwritten by clicking the save button again once new data has been entered into the table.</li>
        </ul>
    </div>
</section>
<section>
    <div class="demo-intro">
        <h2 class="demo-header">Demo:</h2>
        <h4 class="demo-explain">Below are the steps that will be carried out during the demonstration:</h4>
        <ul class="demo-text">
            <li>Registering an account:</li>
            <li>Error messages produced when mistakes are amde during the registration process. </li>
            <li>Other error messages can be demonstrated on request.</li>
            <li>Successful registration.</li>
            <li>Logging in:</li>
            <li>Error messages from mistakes made in the login process.</li>
            <li>Logging in using the account created in the earlier steps.</li>
            <li>Results page:</li>
            <li>Inputting marks and credits.</li>
            <li>Automatic calculation of total credits, average mark, and module grade.</li>
            <li>Generate award button functions.</li>
            <li>Saving the entered marks, and their subsequent presence in the database.</li>
            <li>Overwriting of previously saved marks with newly entered marks.</li>
            <li>Logging out:</li>
            <li>Successful log out.</li>
            <li>Log in once again to see that the marks and credits saved by the user are then automatically re-inserted into the table.</li>
            <li>Questions, and further demo requests.</li>
        </ul>
    </div>
</section>
<?php
    include_once 'footer.php';
?>     