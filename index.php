
<?php 

// accept json content
header('Content-Type: application/json');


// if request is post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    print_r($_POST);
    $arr = json_encode($_POST);

    $file = file_get_contents('data.txt');
    $fileContent = json_decode($file, true);
    array_push($fileContent,json_decode($arr, true));

    // open file data.txt
    $file = fopen('data.txt', 'w');
    // write data to data.txt
    fwrite($file, json_encode($fileContent));
    // close file
    fclose($file);
    // print success message
    print_r(json_encode(array('message' => 'Data saved successfully', 'data' => $arr)));

    exit(0);
}


// read from data.txt and print it 
$file = file_get_contents('data.txt');
$file = json_decode($file, true);

print_r($file);





?>