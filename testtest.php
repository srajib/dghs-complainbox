<?php
$username="hassan";
$a = array(
'\r\n',
'\r',
'\n',
'+USER+',
'vehicle',
'seddan',
'coupe',
'Toyota',
);
$b = array(
' ',
' ',
'<br/>',
''.$username.'',
'car',
'car',
'car',
'Lexus',
);
$str = '

Honda is a truck. 
Toyota is a +USER+. 
Nissan is a sedan. 
Scion is a coupe.

';
echo str_replace($a,$b,$str);
?>