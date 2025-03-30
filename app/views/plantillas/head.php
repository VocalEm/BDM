<?php

use App\Core\Router;

$title = Router::getTitle();
$newtitle = explode("/", $title);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $newtitle[0]; ?></title>
    <link rel="stylesheet" href="/app/views/css/styles.css" />
</head>