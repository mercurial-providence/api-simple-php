<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// database connection will be here
// include database and object files
include_once '../config/database.php';
include_once '../objects/artdata.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$art = new Artdata($db);
 
// read products will be here
// query products
$stmt = $art->read();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $art_arr=array();
    $art_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        $art_item=array(
            "artid" => $artid,
            "author" => html_entity_decode($author),
            "born_died" => html_entity_decode($born_died),
            "title" => html_entity_decode($title),
            "date" => html_entity_decode($date),
            "technique" => html_entity_decode($technique),
            "location" => html_entity_decode($location),
            "url" => html_entity_decode($url),
            "form" => html_entity_decode($form),
            "type" => html_entity_decode($type),
            "school" => html_entity_decode($school),
            "timeframe" => html_entity_decode($timeframe)
        );


        array_push($art_arr["records"], $art_item);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // show products data in json format
    echo json_encode($art_arr);
}
 
// no products found will be here
else{
 
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user no products found
    echo json_encode(
        array("message" => "No arts found.")
    );
}