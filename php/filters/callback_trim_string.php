
<html>
<head>
<title>PHP Example: Filter: Callable Trim String</title>
</head>
<body>

<?php
$data = "";
$function_name = "trim_string";
$result = "";

/** 
	Function: Trim String
	Description: Strip whitespace from the beginning and end of a string.
	Note: An example of a user-defined function.
*/
function trim_string($string)
{
	return trim($string);
}

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$data = $_POST['data'];
	$result = "The entered string \"$data\" ";
	
	/** Call a user-defined (trim string) function to filter data */
	$data = filter_input(INPUT_POST, "data", FILTER_CALLBACK, array("options" => $function_name));
	
	$result .= "was filtered to become \"$data\"!";
}
?>

<!-- Show the form -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" >
	Enter string to trim: <input type="text" name="data">
	<input type="submit">
</form>

<?php
/* Print the validation results */
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	echo "<br><br>Trim Result: $result";
}
?>

</body>
</html
