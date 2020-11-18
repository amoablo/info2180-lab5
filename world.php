<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$country = filter_input(INPUT_GET, 'country',FILTER_SANITIZE_STRING);
$city = filter_input(INPUT_GET, 'context',FILTER_SANITIZE_STRING);


if(empty($city)){
  $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
  $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

  echo "<table border='1'>

<tr>
<th>Name</th>
<th>Continent</th>
<th>Independence</th>
<th>Head of State</th>
</tr>";

foreach ($results as $row){ 
  echo "<tr>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['continent'] . "</td>";
  echo "<td>" . $row['independence_year'] . "</td>";
  echo "<td>" . $row['head_of_state']. "</td>";
  echo "</tr>";
}
echo "</table>";
}else{

  $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
  $stmt = $conn->query("SELECT cities.district,cities.name,cities.population FROM cities JOIN countries ON countries.code=cities.country_code WHERE countries.name='$country'");
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

  echo "<table border='1'>

<tr>
<th>Name</th>
<th>District</th>
<th>Population</th>
</tr>";

foreach ($results as $row){ 
  echo "<tr>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['district'] . "</td>";
  echo "<td>" . $row['population'] . "</td>";
  echo "</tr>";
}
echo "</table>";
}



?>