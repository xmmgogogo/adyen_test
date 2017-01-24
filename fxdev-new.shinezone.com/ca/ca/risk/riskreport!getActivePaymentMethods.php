<?php
header("Content-type: application/json;charset=UTF-8");
require_once __DIR__ . "/../../../functions/Reports.php";

echo json_encode(statRiskChargeBackPaymentMethod());die;

echo "[]";die; // TODO ["cup"] 要不要区分 risk chargebask