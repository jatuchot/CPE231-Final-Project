<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Student's Information</title>
</head>
<style>
h1 {
    border-bottom: 3px solid #cc9900;
    color: #996600;
    font-size: 30px;
}
table, th , td {
    border: 1px solid grey;
    border-collapse: collapse;
    padding: 5px;
}
table tr:nth-child(odd) {
    background-color: #f1f1f1;
}
table tr:nth-child(even) {
    background-color: #ffffff;
}
</style>
<body>
<h1>Student's Information</h1>

</body>

<div id="id01"></div>

<script>
    getinfo();

function getinfo(){
var xmlhttp = new XMLHttpRequest();
var url = location.protocol + '//' + location.host+"/Studentinfo.php";

xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        displayResponse(xmlhttp.responseText);
    }
}

xmlhttp.open("GET", url, true);
xmlhttp.send();
}

function displayResponse(response) {
    var arr = JSON.parse(response);
    var i;
    var out = "<table>";

    for(i = 0; i < arr.length; i++) 
    {
        out += "<tr><td>" + 
        arr[i].id +
        "</td><td>" +
        arr[i].identification_number +
        "</td><td>" +
        arr[i].Firstname+
        "</td><td>" +
        arr[i].Lastname+
        "</td><td>" +
        arr[i].FirstnameTH+
        "</td><td>" +
        arr[i].LastnameTH+
        "</td><td>" +
        arr[i].gender+
        "</td><td>" +
        arr[i].address+
        "</td><td>" +
        arr[i].Personal_Email+
        "</td><td>" +
        arr[i].kmutt_email+
        "</td><td>" +
        arr[i].self_telephone_no+
        "</td><td>" +
        arr[i].DOB+
        "</td><td>" +
        "<button onclick=\"deletestudentinfo('"+arr[i].id+"')\">Delete</button>"+
        "</td></tr>";
    }
    out += "</table>";
   document.getElementById("id01").innerHTML = out;
}
function deletestudentinfo(ID) {
    var xmlhttp = new XMLHttpRequest();
var url = location.protocol + '//' + location.host+"/deletestudentinfo.php?ID="+ID;

xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
     //displayResponse(xmlhttp.responseText);
    getinfo();
    }
}
xmlhttp.open("GET", url, true);
xmlhttp.send();
}


</script>
</html>
