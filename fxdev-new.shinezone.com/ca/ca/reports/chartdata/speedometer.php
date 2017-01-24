<?php
header("Content-type: text/xml;charset=UTF-8");
require_once __DIR__ . "/../../../../functions/Reports.php";

$total = statAuthoristionsLast24Hours();

echo '<?xml version="1.0"?>
<chart bgColor="FFFFFF"  animation="0"  bgAlpha="100" showBorder="0" lowerLimit="0" upperLimit="3000" majorTMNumber="3" majorTMColor="666666"
       majorTMHeight="7" minorTMNumber="3" minorTMColor="666666" pivotRadius="3"
       majorTMThickness="2" showGaugeBorder="0" gaugeInnerRadius="60" tickMarkDecimalPrecision="1" numberSuffix="" placeValuesInside="1">
    <dials>
        <dial value="10" borderAlpha="20" borderColor="333333" bgColor="EEEEEE" baseWidth="5" topWidth="1" />
    </dials>
    <annotations>
        <annotationGroup xPos="90" yPos="78" showBelowChart="0">
            <annotation type="text" label="TPD" fontColor="999999" fontSize="14" isBold="1"/>
        </annotationGroup>
    </annotations>
    <colorRange>
        <color minValue="0" maxValue="750" code="999999" />
    </colorRange>
</chart>';