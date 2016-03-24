<?php
// Load XML file
$xml = new DOMDocument();
$xml->load('algs.xml');

// Load XSL file
$xsl = new DOMDocument();
$xsl->load('algs.xsl');

// Configure the transformer
$proc = new XSLTProcessor();

// Attach the xsl rules
$proc->importStylesheet($xsl);

echo $proc->transformToXML($xml);
?>
