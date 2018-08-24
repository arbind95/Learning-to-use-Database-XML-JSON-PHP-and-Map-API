<?php
$enteredstudentID=$_POST["studentID"];
$enteredemail=$_POST["studentEmail"];
$enteredlastName=$_POST["lastName"];
$enteredfirstName=$_POST["firstName"];
$enteredstudentAddress=$_POST["studentAddress"];

$xml = new DOMDocument();

if ($xml->load("studentDetails.xml")) 
{
	$xml = simplexml_load_file('studentDetails.xml');
	$newstudent=$xml->addChild('student');	
	$newstudent->addChild('studentid', $enteredstudentID)->addAttribute('email', $enteredemail);
	$newstudent->addChild('lastname', $enteredlastName);
	$newstudent->addChild('firstname', $enteredfirstName);
	$newstudent->addChild('address', $enteredstudentAddress);
	file_put_contents('studentDetails.xml', $xml->asXML());
}
else
{
	$xml = new DOMDocument('1.0', "UTF-8");
	
	$xml_album = $xml->createElement("students_details");
	
	$xml_track = $xml->createElement("student");
	$xml_album->appendChild( $xml_track );
		$xml_username = $xml->createElement("studentid",$enterstudenid);
		$xml_track->appendChild( $xml_username );
		$domAttribute = $xml->createAttribute('email');	
		$domAttribute->value = $enteredemail;
		$xml_username->appendChild($domAttribute);
	
		$xml_lastname = $xml->createElement("lastname",$enteredlastName);
		$xml_track->appendChild( $xml_lastname);
		$xml_firstname = $xml->createElement("firstname",$enteredfirstName);
		$xml_track->appendChild( $xml_firstname );
		
		$xml_address = $xml->createElement("address",$enteredstudentAddress);
		$xml_track->appendChild( $xml_address );	
	$xml->appendChild( $xml_album );
	$xml->save("studentDetails.xml");
}
echo '<script>alert("Details Inserted Successfully");window.location.href="user_welcome.php";</script>';
?>