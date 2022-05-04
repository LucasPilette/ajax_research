<?php

require_once(dirname(__FILE__).'/../models/City.php');

$zipcode = trim(filter_input(INPUT_GET,'zipcode',FILTER_SANITIZE_SPECIAL_CHARS));


$cities = City::getAll($zipcode);

echo json_encode($cities);