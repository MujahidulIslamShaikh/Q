<?php

// DB config
$mysqli = new mysqli("localhost", "qaswa_user", "Akram890@#1gh", "qaswa_telecom");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Collect URLs
$urls = ["https://qaswatelecom.com"];

$brandResult = $mysqli->query("SELECT title FROM brands");
while ($row = $brandResult->fetch_assoc()) {
    $brand = strtolower(str_replace(' ', '-', $row['title']));
    $urls[] = "https://qaswatelecom.com/$brand/models";
}

$modelResult = $mysqli->query("SELECT m.title as model, b.title as brand FROM models m JOIN brands b ON m.brand_id = b.id");
while ($row = $modelResult->fetch_assoc()) {
    $brand = strtolower(str_replace(' ', '-', $row['brand']));
    $model = strtolower(str_replace(' ', '-', $row['model']));
    $urls[] = "https://qaswatelecom.com/$brand/$model/models";
    $urls[] = "https://qaswatelecom.com/$brand/$model/services";
}

$urls = array_unique($urls);

// XML build
$xml = new DOMDocument('1.0', 'UTF-8');
$xml->formatOutput = true;
$urlset = $xml->createElement("urlset");
$urlset->setAttribute("xmlns", "http://www.sitemaps.org/schemas/sitemap/0.9");

foreach ($urls as $u) {
    $url = $xml->createElement("url");
    $loc = $xml->createElement("loc", htmlspecialchars($u));
    $priority = $xml->createElement("priority", "0.80");
    $url->appendChild($loc);
    $url->appendChild($priority);
    $urlset->appendChild($url);
}

$xml->appendChild($urlset);
file_put_contents('sitemap.xml', $xml->saveXML());

echo "✅ Sitemap generated successfully! URLs added: " . count($urls);
?>
