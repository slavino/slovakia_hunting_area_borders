<?php

function getSafeFileName($string) {
    // 1. Convert diacritics to basic Latin (e.g., 'á' to 'a', 'ü' to 'u')
    // Requires the 'intl' extension
    if (class_exists('Transliterator')) {
        $transliterator = Transliterator::create('Any-Latin; Latin-ASCII');
        $string = $transliterator->transliterate($string);
    }

    // 2. Remove control characters and non-printable characters
    $string = preg_replace('/[\x00-\x1F\x7F]/u', '', $string);

    // 3. Replace spaces with hyphens
    $string = str_replace(' ', '-', $string);
    
    // 4. Strip everything except letters, numbers, hyphens, underscores, and dots
    $string = preg_replace('/[^A-Za-z0-9\-\._]/', '', $string);

    // 5. Clean up multiple hyphens and directory traversal
    $string = preg_replace('/-+/', '-', $string);
    $string = preg_replace('/\.+/', '.', $string);

    return trim($string, '-._');
}

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
    $newFile_name = getSafeFileName($feature['properties']['id_oblast'] 
                    . "_" . $feature['properties']['ID_Revir'] 
                    . "_" . $feature['properties']['gml_id'] 
                    . "_" . $feature['properties']['NazovRevir'] 
                    . ".geojson");
    echo "Processing: " . $newFile_name . "\n";
    $newFile_content = $file_start . json_encode($feature) . $file_end;
    file_put_contents("SR_PR_2025/" . $newFile_name, $newFile_content);
}
