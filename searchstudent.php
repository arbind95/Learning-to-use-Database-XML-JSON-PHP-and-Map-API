<!DOCTYPE html>
<html>
<body >
<form id="searchForm" action="" method="POST">
<table>
<tr>
<td>
        <h1>Search Student</h1>
				<input type="text" placeholder="Last Name" class="form-control" name="txtlastname" id="txtlastname"/><br>
				<input type="text" placeholder="First Name" class="form-control" name="txtfirstname" id="txtfirstname"/><br>
          <button type="submit" >Search</button><br/><br/>
</td>
</tr>
</table>

</form>
<?php
if(isset($_POST["txtlastname"]) && isset($_POST["txtfirstname"]))
{
$xml=simplexml_load_file("studentDetails.xml") or die("Error: Cannot create object");
echo '<table style="width:100%; border:none;" id="searchTable">';
echo '<tr><th>Student ID</th><th>First Name</th><th>Last Name</th><th>Address</th></tr>';

for($x=0; $x<count($xml); $x++)
{

	if($_POST["txtlastname"]=="")
	{
		if($_POST["txtfirstname"]=="")
		{
	echo '<tr>';
echo '<td>'. $xml->student[$x]->studentid.' (<a href="mailto:'. $xml->student[$x]->studentid["email"].'">'. $xml->student[$x]->studentid["email"].'</a>)</td>';
echo '<td>'. $xml->student[$x]->firstname.'</td>';
echo '<td>'. $xml->student[$x]->lastname.'</td>';
echo '<td><a href="googlemap.php?address='. $xml->student[$x]->address.'">'. $xml->student[$x]->address.'</a></td>';

echo '</tr>';

		}
		else if($_POST["txtfirstname"]==($xml->student[$x]->firstname))
		{
echo '<tr>';
echo '<td>'. $xml->student[$x]->studentid.' (<a href="mailto:'. $xml->student[$x]->studentid["email"].'">'. $xml->student[$x]->studentid["email"].'</a>)</td>';
echo '<td>'. $xml->student[$x]->firstname.'</td>';
echo '<td>'. $xml->student[$x]->lastname.'</td>';
echo '<td><a href="googlemap.php?address='. $xml->student[$x]->address.'">'. $xml->student[$x]->address.'</a></td>';

echo '</tr>';

		}

	}
	else
	{
		if($_POST["txtfirstname"]=="" && $_POST["txtlastname"]==($xml->student[$x]->lastname))
		{
	echo '<tr>';
echo '<td>'. $xml->student[$x]->studentid.' (<a href="mailto:'. $xml->student[$x]->studentid["email"].'">'. $xml->student[$x]->studentid["email"].'</a>)</td>';
echo '<td>'. $xml->student[$x]->firstname.'</td>';
echo '<td>'. $xml->student[$x]->lastname.'</td>';
echo '<td><a href="googlemap.php?address='. $xml->student[$x]->address.'">'. $xml->student[$x]->address.'</a></td>';

echo '</tr>';

		}
		else if($_POST["txtfirstname"]==($xml->student[$x]->firstname)  && $_POST["txtlastname"]==($xml->student[$x]->lastname))
		{
echo '<tr>';
echo '<td>'. $xml->student[$x]->studentid.' (<a href="mailto:'. $xml->student[$x]->studentid["email"].'">'. $xml->student[$x]->studentid["email"].'</a>)</td>';
echo '<td>'. $xml->student[$x]->firstname.'</td>';
echo '<td>'. $xml->student[$x]->lastname.'</td>';
echo '<td><a href="googlemap.php?address='. $xml->student[$x]->address.'">'. $xml->student[$x]->address.'</a></td>';

echo '</tr>';

		}

	}
}
echo '</table>';
}
?> 

</body>
</html>
