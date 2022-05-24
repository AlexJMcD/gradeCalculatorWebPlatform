
<?php
    include_once 'includes/dbh.inc.php';
    include_once 'header.php';
    include_once 'includes/results.filltable.inc.php';
    if(!isset($_SESSION["studentid"])){
        header("location: ../index.php");
        exit();
    }
?>
    <section class="results-table">
        <div class="table-container">
            <form class="save-form" action="includes/results.inc.php" method="post">
            <button class="save-button" type="submit" name="submit">Save Details</button>
            <table class='results-table-table' onchange='updateTable()'>
                <tr class='table-headers'>
                    <th>Module Code</th>
                    <th>Module Name</th>
                    <th>Credit Value</th>
                    <th>Mark Ach.</th>
                    <th>Grade</th>
                </tr>
                <tr class='module-row'>
                    <td class='module-code' type='text'>COMP7001</td>
                    <td class='module-name'>Object-Oriented Programming</td>
                    <td><input class='credit-value' type='number' name='credits[]' value="<?php echo($row[0])?>"</td>
                    <td><input class="input-mark" type="number" name="marks[]" value="<?php echo($row[1])?>"></td>
                    <td class="grade-value"></td>
                </tr>
                <tr class="module-row2">
                    <td class="module-code" type="text">COMP7002</td>
                    <td class="module-name">Modern Computer Systems</td>
                    <td><input class="credit-value" type="number" name="credits[]" value="<?php echo($row[2])?>"></td>
                    <td><input class="input-mark" type="number" name="marks[]" value="<?php echo($row[3])?>"></td>
                    <td class="grade-value"></td>
               </tr>
                <tr class="module-row">
                    <td class="module-code" type="text">TECH7005</td>
                    <td class="module-name">Research, Scholarship and Professional Skills</td>
                    <td><input class="credit-value" type="number" name="credits[]" value="<?php echo($row[4])?>"></td>
                    <td><input class="input-mark" type="number" name="marks[]" value="<?php echo($row[5])?>"></td>
                    <td class="grade-value"></td>
                </tr>
                <tr class="module-row2">
                    <td class="module-code" type="text">DALT7002</td>
                    <td class="module-name">Data Science Foundations</td>
                    <td><input class="credit-value" type="number" name="credits[]" value="<?php echo($row[6])?>"></td>
                    <td><input class="input-mark" type="number" name="marks[]" value="<?php echo($row[7])?>"></td>
                    <td class="grade-value"></td>
                </tr>
                <tr class="module-row">
                    <td class="module-code" type="text">DALT7011</td>
                    <td class="module-name">Introduction to Machine Learning</td>
                    <td><input class="credit-value" type="number" name="credits[]" value="<?php echo($row[8])?>"></td>
                    <td><input class="input-mark" type="number" name="marks[]" value="<?php echo($row[9])?>"></td>
                    <td class="grade-value"></td>
                </tr>
                <tr class="module-row2">
                    <td class="module-code" type="text">SOFT7003</td>
                    <td class="module-name">Advanced Software Development</td>
                    <td><input class="credit-value" type="number" name="credits[]" value="<?php echo($row[10])?>"></td>
                    <td><input class="input-mark" type="number" name="marks[]" value="<?php echo($row[11])?>"></td>
                    <td class="grade-value"></td>
                </tr>
                <tr class="module-row">
                    <td class="module-code" type="text">TECH7004</td>
                    <td class="module-name">Cyber Security and the Web</td>
                    <td><input class="credit-value" type="number" name="credits[]" value="<?php echo($row[12])?>"></td>
                    <td><input class="input-mark" type="number" name="marks[]" value="<?php echo($row[13])?>"></td>
                    <td class="grade-value"></td>
                </tr>
                <tr class="module-row2">
                    <td class="module-code" type="text">TECH7009</td>
                    <td class="module-name">MSc Dissertation in Computing Subjects</td>
                    <td><input class="credit-value" type="number" name="credits[]" value="<?php echo($row[14])?>"></td>
                    <td><input class="input-mark" type="number" name="marks[]" value="<?php echo($row[15])?>"></td>
                    <td class="grade-value"></td>
                </tr>
                <tr class="summary-row">
                    <td>Summary</td>
                    <td></td>
                    <td class="total-credits"></td>
                    <td class="average-mark"></td>
                    <td class="average-grade"></td>
                </tr>
            </table>
        </form>
        </div>
        <div class="results-button">
            <button class="results-button-button" onclick="generateAward()">Display award details</button>
        </div>
        <div class = "results-details">
            <p class="award-text"></p>
        </div>
    </section>
    
    <?php
            if(isset($_GET["error"])){
                if($_GET["error"] == "stmtfailed"){
                    echo "<div class='error-occ'><p class='error-message'>Something went wrong. Please try again.</p></div>";
                }
            }
        ?>
<?php
    include_once 'footer.php';
?>
<script type="text/javascript">document.onload = updateTable()</script>
  