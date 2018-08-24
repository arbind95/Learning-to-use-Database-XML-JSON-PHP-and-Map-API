<script>
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var myObj = JSON.parse(this.responseText);
	   var temperature = [];
	   for(var t=0; t<myObj.sensorreadinglist.length; t++)
	   {
			temperature[t]= parseFloat(myObj.sensorreadinglist[t].temperature);
	   }
	   var minimumtemperature= Math.min(...temperature);
		var maximumtemperature= Math.max(...temperature);

		var humidity = [];
	   for(var t=0; t<myObj.sensorreadinglist.length; t++)
	   {
			humidity[t]= parseFloat(myObj.sensorreadinglist[t].humidity);
	   }
	   var minimumhumidity= Math.min(...humidity);
		var maximumhumidity= Math.max(...humidity);

		var table='<table border="1"><tr><th>xbeeid</th><th>moteid</th><th>motelocation</th><th>hubname</th><th>temperature</th><th>airpressure</th><th>humidity</th><th>light</th><th>altitude</th><th>mic</th><th>gas</th></tr>';
		for(var x=0; x<myObj.sensorreadinglist.length; x++)
	   {
			table+='<tr><td>'+myObj.sensorreadinglist[x].xbeeid+'</td>';
			table+='<td>'+myObj.sensorreadinglist[x].moteid+'</td>';
			table+='<td>'+myObj.sensorreadinglist[x].motelocation+'</td>';
			table+='<td>'+myObj.sensorreadinglist[x].hubname+'</td>';
			if(myObj.sensorreadinglist[x].temperature)
			{
				if(myObj.sensorreadinglist[x].temperature==minimumtemperature)
				{
					table+='<td bgcolor="red">'+myObj.sensorreadinglist[x].temperature+'</td>';
				}
				else if(myObj.sensorreadinglist[x].temperature==maximumtemperature)
				{
					table+='<td bgcolor="green">'+myObj.sensorreadinglist[x].temperature+'</td>';
				}
				else
				{
					table+='<td>'+myObj.sensorreadinglist[x].temperature+'</td>';
				}
			}
			table+='<td>'+myObj.sensorreadinglist[x].airpressure+'</td>';
			if(myObj.sensorreadinglist[x].humidity)
			{
				if(myObj.sensorreadinglist[x].humidity==minimumhumidity)
				{
					table+='<td bgcolor="blue">'+myObj.sensorreadinglist[x].humidity+'</td>';
				}
				else if(myObj.sensorreadinglist[x].humidity==maximumhumidity)
				{
					table+='<td bgcolor="yellow">'+myObj.sensorreadinglist[x].humidity+'</td>';
				}
				else
				{
					table+='<td>'+myObj.sensorreadinglist[x].humidity+'</td>';
				}
			}
			table+='<td>'+myObj.sensorreadinglist[x].light+'</td>';
			table+='<td>'+myObj.sensorreadinglist[x].altitude+'</td>';
			table+='<td>'+myObj.sensorreadinglist[x].mic+'</td>';
			table+='<td>'+myObj.sensorreadinglist[x].gas+'</td></tr>';
	   }
	   table+='</table>';
	   document.getElementById("demo").innerHTML =table;
    }
};
xmlhttp.open("GET", "sensor.json", true);
xmlhttp.send();
</script>
<p id="demo"></p>
<table border="1">
<tr><th>Low Value of Temperature</th><td bgcolor="red"> Red</td></tr>
<tr><th>High Value of Temperature</th><td bgcolor="Green">Green</td></tr>
<tr><th>Low Value of Humidity</th><td bgcolor="Blue"> Blue</td></tr>
<tr><th>High Value of Humidity</th><td bgcolor="Yellow">Yellow</td></tr>

</table>
<?php
?>
