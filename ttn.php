<html>
    <body>
<?php
/*
 *  Version 1.1
 *  Created 2020-NOV-27
 *  Update 2020-Dez-16
 *  https://wwww.aeq-web.com
 */

require 'config.php';


$ttn_post = file('php://input');
//print_r($ttn_post);
$data = json_decode($ttn_post[0]);

$gtw_id = $data->metadata->gateways[0]->gtw_id;
$gtw_rssi = $data->metadata->gateways[0]->rssi;
$gtw_snr = $data->metadata->gateways[0]->snr;

$ttn_app_id = $data->app_id;
$ttn_dev_id = $data->dev_id;
$ttn_time = $data->metadata->time;

$ttn_value = $data->uplink_message->decoded_payload->myTestValue;

$db_connect = mysqli_connect($DATABASE_HOST, $DATABASE_USERNAME, $DATABASE_PASSWORD, $DATABASE_NAME) or die(mysqli_error($db_connect));

$server_datetime = date("Y-m-d H:i:s");

mysqli_query($db_connect, "INSERT INTO `data` (`Text`) "
        . "VALUES ('$ttn_value')"
    );

mysqli_close($db_connect);

//if (WRITE_LOG == true) {
file_put_contents('ttn_log.txt', print_r($ttn_post, true) . PHP_EOL, FILE_APPEND);
//}
//Test, Test
?>
    </body>
</hmtl>