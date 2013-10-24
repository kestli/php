#PhP MySQL

### Very simple PhP library to connect to a MySQL database.

You must complete the following data defined in the library `php-mysql.php`:

	 define ("MYSQL_HOST","");
	 define ("MYSQL_USER","");
	 define ("MYSQL_PASS","");
	 define ("MYSQL_DB","");
	 
Example:

	<?php
	include ("php-mysql.php");
	
	$db = new mysql();
	$db->connect();
	$db->query("SELECT name,surname from MY_TABLE");

	while ($r = $db->fetch_array())
	 echo "Name: ".$r["name"]."/ Surname: ".$r["surname"];

	$db->close();
	?>

Other functions

+ `num_rows()`: gives the number of results.
+ `array_pos($pos)`: specify a particular position in the array of results.

==	
 Contact to [Maximiliano Kestli](mailto:maxkaestli@hotmail.com)
 
