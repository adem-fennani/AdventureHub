<?php
// Include necessary files and classes
include '../Controller/ReclamationC.php';

// Create an instance of the ReclamationC class
$reclamationC = new ReclamationC();

// Call the exportReclamationToCSV method to generate the CSV file
$csvFilePath = $reclamationC->exportReclamationToCSV();

// Set headers for file download
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="reclamations.csv"');

// Read the file and output its contents
readfile($csvFilePath);

// After download, you can optionally delete the generated CSV file
unlink($csvFilePath);
?>
