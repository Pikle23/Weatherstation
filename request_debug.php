<html>

<bod<>

<pre>


<?php
echo "Input:\n";
$input = file_get_contents('php://input');
var_dump($input);

echo "Globals _REQUEST:\n";
$glob_request = $GLOBALS['_REQUEST'];
var_dump($GLOBALS['_REQUEST']);

echo "__REQUEST:\n";
$request = $_REQUEST;
var_dump($_REQUEST);

$f = fopen("request.log", "a");

fwrite($f, "INPUT:" . $input . "\n");
fwrite($f, "GREQUEST:" . print_r($glob_request, true) . "\n");
fwrite($f, "INPUT:" . print_r($request, true) . "\n");

fclose($f);





?>


</pre>

</body>

</html>
