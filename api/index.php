<?php
/**
 * @author Diego Scafati <dscafati@gmail.com>
 * @todo Implement security strategy
 */

$query = $_GET['q'];

$file = fopen(__DIR__ . "/free-zipcode-database-Primary.csv","r");

$firstlineFlag = true;

$results = [];

function wrap( $row){
    return [
        'zipcode' => $row[0],
        'city' => $row[2],
        'state' => $row[3],
    ];
}
while(! feof($file))
{
    // Skip the first line
    if($firstlineFlag){
        $firstlineFlag = false;
        fgetcsv($file);
        continue;
    }

    $row = fgetcsv($file);
    $zipCode = $row[0];
    $cityName = $row[2];
    $cityState = $row[3];

    if(is_numeric($query)){
        $startsWith = strpos(strtolower($zipCode), strtolower($query)) === 0;
        if($startsWith){
            $results[] = wrap($row);
        }
    }else{
        $startsWith = strpos(strtolower($cityName), strtolower($query)) === 0;
        if($startsWith){
            $results[] = wrap($row);
        }else{
            $compareTo = $cityName;
            $threshold = 85;
            if(preg_match("/\, /", $query)){
                $compareTo = $cityName . ", " . $cityState;
                $threshold = 90;
            }

            $similarityPercent = 0;
            $similarity = similar_text(strtolower($query), strtolower($compareTo), $similarityPercent);

            if($similarityPercent >= $threshold){
                $results[] = wrap($row);
            }
        }
    }
}

fclose($file);

echo json_encode($results);