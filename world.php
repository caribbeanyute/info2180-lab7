<?php
$host = getenv('IP');
$username = 'lab7_app';
$password = 'app_password';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

if($_GET["context"]==="cities"){
    $stmt = $conn->query("SELECT cities.name,district,cities.population FROM cities INNER JOIN countries on cities.country_code=countries.code WHERE countries.name ='{$_GET["country"]}';");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo cities_table($results);
    
}else{
    $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%{$_GET["country"]}%';");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo build_table($results);
}





//Sanitize me plzz.


//SELECT cities.name,district,cities.population FROM cities INNER JOIN countries on cities.country_code=countries.code WHERE countries.name ='Jamaica';
function cities_table($array){
    // start table
    $html = '<table id="countrytable">';
    // header row
    $html .= '<tr>';
    $html.= "    <th>Name</th>\n"; 
    $html.="    <th>District</th>\n"; 
    $html.="    <th>Population</th>\n";
    $html .= '</tr>';

    // data rows
    foreach( $array as $row){
        $html .= '<tr>';
            $html .= '<td>' . htmlspecialchars($row['name']) . '</td>';
            $html .= '<td>' . htmlspecialchars($row['district']) . '</td>';
            $html .= '<td>' . htmlspecialchars($row['population']) . '</td>';
        $html .= '</tr>';
    }

    // finish table and return it

    $html .= '</table>';
    return $html;
}

function build_table($array){
    // start table
    $html = '<table id="countrytable">';
    // header row
    $html .= '<tr>';
    $html.= "    <th>Name</th>\n"; 
    $html.="    <th>Continent</th>\n"; 
    $html.="    <th>Independence</th>\n"; 
    $html.="    <th>Head of State</th>\n"; 
    $html .= '</tr>';

    // data rows
    foreach( $array as $row){
        $html .= '<tr>';
            $html .= '<td>' . htmlspecialchars($row['name']) . '</td>';
            $html .= '<td>' . htmlspecialchars($row['continent']) . '</td>';
            $html .= '<td>' . htmlspecialchars($row['independence_year']) . '</td>';
            $html .= '<td>' . htmlspecialchars($row['head_of_state']) . '</td>';
        $html .= '</tr>';
    }

    // finish table and return it

    $html .= '</table>';
    return $html;
}

