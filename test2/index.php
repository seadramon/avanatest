<?php 

require_once 'src/ValidateExcel.php';

$excel = new ValidateExcel("Type_A.xlsx", "xlsx");
$excel->getData();


