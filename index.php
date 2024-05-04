<html>
<body>
<?php 


print_r($_POST);
// if request is post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

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
    echo 'Data saved to data.txt';
}


// read from data.txt and print it 
$file = file_get_contents('data.txt');
$file = json_decode($file, true);
print("<pre>");
print_r($file);
print("</pre>");





?>
</body>
</html>