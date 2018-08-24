<!DOCTYPE html>
<html>

<body>
 <?php
$xml=simplexml_load_file("studentDetails.xml") or die("Error: Cannot create object");
echo '<table style="width:100%; border:none;">';
echo '<tr><th>Student ID</th><th>Last Name</th><th>First Name</th><th>Address</th></tr>';
for($x=0; $x<count($xml); $x++)
{
	echo '<tr>';
echo '<td>'. $xml->student[$x]->studentid.' (<a href="mailto:'. $xml->student[$x]->studentid["email"].'">'. $xml->student[$x]->studentid["email"].'</a>)</td>';
echo '<td>'. $xml->student[$x]->lastname.'</td>';
echo '<td>'. $xml->student[$x]->firstname.'</td>';
echo '<td><a href="googlemap.php?address='. $xml->student[$x]->address.'">'. $xml->student[$x]->address.'</a></td>';

echo '</tr>';
}
echo '</table>';
?> 

</body>
</html>
