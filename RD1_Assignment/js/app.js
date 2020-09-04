
con.connect(function(err) {
	if (err) throw err;
	console.log("Connected!");
	var sql = "insert into weather(datasetDescription, locationName, elementName, description, startTime, endTime, value) values('$datasetDescription','$locationName','$elementName','$description','$startTime','$endTime','$value')";
	con.query(sql, function (err, result) {
	  if (err) throw err;
	  console.log("1 record inserted");
	});
  });

function myFunction() {
	var x = document.createElement("IMG");
	x.setAttribute("src", "./images/Taipei_101.jpg");
	x.setAttribute("width", "304");
	x.setAttribute("height", "228");
	x.setAttribute("style", '""');
	document.body.appendChild(x);
  }

function changeFunc($i) {
	alert($i);
	console.log("")
  }
 
