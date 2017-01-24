<?php
header("Content-type: text/xml;charset=UTF-8");

echo '<?xml version="1.0" encoding="UTF-8" ?>
<chart yAxisName="Transactions" bgColor="F7F7F7, E9E9E9" showValues="0" animation="0" numVDivLines="5" divLineAlpha="30" labelPadding="5" yAxisValuesPadding="5">
    <categories>
        <category label="Wed"/>
        <category label="Thu"/>
        <category label="Fri"/>
        <category label="Sat"/>
        <category label="Sun"/>
        <category label="Mon"/>
        <category label="Tue"/>
    </categories>
    <dataset seriesName="last week" color="64a83f">
        <set value="246"/>
        <set value="248"/>
        <set value="235"/>
        <set value="249"/>
        <set value="248"/>
        <set value="1000"/>
        <set value="1012"/>
    </dataset>
    <dataset seriesName="week before" color="a8e786">
        <set value="816"/>
        <set value="488"/>
        <set value="433"/>
        <set value="542"/>
        <set value="249"/>
        <set value="247"/>
        <set value="243"/>
    </dataset>
</chart>';
die;