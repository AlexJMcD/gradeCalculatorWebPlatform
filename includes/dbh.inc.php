<?php
$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "gradeSystem";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);
if(!$conn){
    die("Connection failed:" . mysqli_connect_error());
}






/*What are the advantages of using MySQLi?
Unlike its predecessor, the mysqli extension uses both a procedural and an object-oriented approach. One advantage of object-oriented programming is that once the code has been written, it can be easily maintained and modified in the future. For example, new classes can be created which inherit properties and behaviors from existing classes. This significantly shortens development time and makes it easier to adapt the program to a changing environment or new requirements.

Another major advantage of MySQLi is its use of prepared statements. A prepared statement is a statement template for a database system. Unlike normal statements, these contain placeholders instead of parameter values. If a statement needs to be executed multiple times (e.g. inside a loop) on a database system with different parameters, using prepared statements can increase the speed since the statement is already pre-translated in the database system and only needs to be executed with the new parameters. In addition, prepared statements can effectively prevent SQL injections since the database system verifies the validity of the parameters before they are processed.


mysqli() vs. mysql(): why was the PHP function changed?
The switch to MySQLi was unavoidable because the old mysql extension was quite simply outdated. Furthermore, backwards compatibility was always a priority for the extension which made it difficult to maintain the code. The code dates back to the early days of PHP and MySQL, and was not optimally developed in some respects.

For example, if the connection identifier was not explicitly defined, all functions would try to use the last one specified. Very unlucky users might even find that mysql_query() accessed a completely different database. The connection identifier was optional in the old function, but it is required in the new extension. In addition, prepared statements have been added to make retrieving data from a database table faster and more secure.

Conclusion: MySQLi is faster and more secure
The switch to MySQLi was necessary to improve the speed at which databases could be accessed. Prepared statements were introduced in the new extension which also improve connection security since they can prevent SQL injections. The database system verifies whether the parameters are valid before processing them. In addition, the new code is easier to maintain due to its object-oriented approach.
*/