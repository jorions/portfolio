<!DOCTYPE html>
<html>
<head>
    <title>Google Maps Demo</title>
</head>
<body>

<form action="maps.php" method="POST">
    Enter a location to center the map on:  <input type="text" name="location" value=""><br>
    Enter zoom level (17 is max, 1 is min): <input type="text" name="zoom" value=""><br>
    Enter how many pixels wide you want it: <input type="text" name="width" value=""><br>
    Enter how many pixels tall you want it: <input type="text" name="height" value=""><br><br>
    <input type="submit" name="submit" value="Submit your map!" style="width: 400px">
</form>

<?php
if(isset($_POST["submit"])) {
    if($_POST["location"] != "" && $_POST["zoom"] != "" && $_POST["width"] != "" && $_POST["height"] != "") {
        echo "<img src=https://maps.googleapis.com/maps/api/staticmap?center=".urlencode($_POST["location"])."&zoom=$_POST[zoom]&size=$_POST[width]x$_POST[height]>";
    } else {
        echo "<br><br><br><h1>Please enter valid map parameters</h1>";
    }
} else {
    echo "<br><br><br><h1>Waiting on that map...</h1>";
}