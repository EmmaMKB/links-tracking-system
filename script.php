<?php

// Load the JSON file
$jsonPath = 'c:/Users/Mk/Documents/DevOps/links-tracking-system/public/assets/dictionary/drc-locations.json';
$jsonData = file_get_contents($jsonPath);
$data = json_decode($jsonData, true);

// Add index field to each item
foreach ($data as $key => $item) {
    // var_dump($data);die;
    $data[$key]['index'] = $key + 1;
}

// Save the updated JSON data back to the file
file_put_contents($jsonPath, json_encode($data, JSON_PRETTY_PRINT));

echo "Index fields added successfully.";
