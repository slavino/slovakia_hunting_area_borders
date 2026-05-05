<?php

$jsonString = file_get_contents("SR_PR_2025.geojson");
$data = json_decode($jsonString, true);

$file_start = '{
    "type": "FeatureCollection",
    "name": "PR_2025",
    "crs": { "type": "name", "properties": { "name": "urn:ogc:def:crs:OGC:1.3:CRS84" } },
    "features": [';

$file_end = ']
}';

foreach ($data['features'] as $feature) {
    $newFile_name = $feature['properties']['id_oblast'] . "_" . $feature['properties']['ID_Revir'] . "_" . $feature['properties']['gml_id'] . ".geojson";
    echo "Processing: " . $newFile_name . "\n";
    $newFile_content = $file_start . json_encode($feature) . $file_end;
    file_put_contents("SR_PR_2025/" . $newFile_name, $newFile_content);
}
