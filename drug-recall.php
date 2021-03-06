<!DOCTYPE html>
<html>
<head>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}
</style>
<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }  
  }
}
</script>
</head>
<body>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Product.." title="Type in a name">

<table id="myTable">
 <tbody>
  <tr>
    <th>Recalling-Firm</th>
    <th>Product-Description</th>
    <th>Recall-Number</th>
    <th>Recall-Initiation Date</th>
    <th>Report-Date</th>
    <th>Distribution</th>
    <th>Classification</th>
    <th>Code-Info</th>
    <th>Initial Firm Notification</th>
    <th>Address</th>
    <th>City</th>
    <th>State</th>
    <th>Postal-Code</th>
    <th>Country</th>
    <th>Status of Recall</th>
  </tr>
   <?php session_start(); ?>
   <?php
    $url = 'https://api.fda.gov/drug/enforcement.json?search=report_date:[20040101+TO+20171231]&limit=100';
    $url_json = file_get_contents($url);
    $url_array = json_decode($url_json, true);
    for ($x=0;$x<=100;$x++)
    {
        foreach ($url_array as $food)
        {
            echo '<tr>';
            echo '<td>' . $food[$x][recalling_firm] . '<br>';
            echo '<td>' . $food[$x][product_description] . '<br>';
            echo '<td>' . $food[$x][recall_number] . '<br>';
            echo '<td>' . $food[$x][recall_initiation_date] . '<br>';
	    echo '<td>' . $food[$x][report_date] . '<br>';
	    echo '<td>' . $food[$x][distribution_pattern] . '<br>';
            echo '<td>' . $food[$x][classification] . '<br>';
            echo '<td>' . $food[$x][code_info] . '<br>';
            echo '<td>' . $food[$x][initial_firm_notification] . '<br>';
            echo '<td>' . $food[$x][address_1] . '<br>';
            echo '<td>' . $food[$x][city] . '<br>';
            echo '<td>' . $food[$x][state] . '<br>';
            echo '<td>' . $food[$x][postal_code] . '<br>';
	    echo '<td>' . $food[$x][country] . '<br>';
            echo '<td>' . $food[$x][status] . '<br>';
            echo '<tr>';
        }
    }
   ?>
 </tbody>
</table>
</body>
</html>
