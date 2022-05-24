# gradeCalculatorWebPlatform
A web application that allows users to enter marks and credit values for university modules, and generate an overall grade and award type.
Front end is made using HTML, CSS and JS, back end uses PHP.
1. The application allows for user registration and login using email, name and password. This includes dual entry of both email and password during the registration step to ensure the values are correct.
2. This data is then saved in a database and is retrieved to validate logins. Each step that connects to the database uses prepared statements to account for SQL injection.
3. The main table of the application automatically updates as marks and credit valus are entered, updating both the relevant grade cell, total credits cell and the average mark cell.
4. There is then a button that calculates the final overall grade for all the modules, and tallies up all the grade types earned.
5. The data in the table can be stored in the database using the save button, once saved this data is used to automatically fill the table cells, and can be overwritten with a new save.
