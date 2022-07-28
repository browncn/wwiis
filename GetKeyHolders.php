<?php

$database_user = "test";
//dollar sign not escaped. Caused autentication error connecting to database
$database_password = "testP\$ssw0rd";

//mysql was omitted, as such, PDO could not handle command properly
$pdo = new PDO('mysql:host=localhost;dbname=test', $database_user, $database_password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_NUM, PDO::ATTR_AUTOCOMMIT => 1, PDO::ATTR_STRINGIFY_FETCHES => 1));

try {
    //add mysql syntaxes for good measure and to prevent errors from command to string conversion
    //also added ASC to ensure data is arranged properly
$query = $pdo->query("SELECT `name`, `key` FROM `key_holders` WHERE `active` = 1 ORDER BY `order` ASC");
$contacts = $query->fetchAll();

foreach($contacts as $contact) {
//assigned the variable 'name' to ensure there will be no syntax issues in future
    $name = $contact[0];
    $phone = $contact[1];

//added syntaxes again to mysql query
$telephone = $pdo->prepare("SELECT `telephone` FROM `contact_details` WHERE `name` = ?");

//Variable name to the rescue
$telephone->execute([$name]);
$telephone = $telephone->fetchColumn();

//switched to echo because its output is faster than print
echo $name . ' ' . $telephone . ' ' . $phone . '<br>';

}

} catch(Exception $exception) {
echo "An exception occurred!";
}

//thanks for the experience. Hope to here from you soon
