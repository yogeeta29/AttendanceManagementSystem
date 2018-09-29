<?php
$filename = "phpzag_data_export_".date('Ymd') . ".xls";
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"$filename\"");
$show_coloumn = false;
$developer_records=$_GET['present'];
if(!empty($developer_records)) {

if(!$show_coloumn) {
// display field/column names in first row
echo implode("\t", array_keys($developer_records)) . "\n";
$show_coloumn = true;
}
echo implode("\t", array_values($developer_records)) . "\n";
}
exit;
?>