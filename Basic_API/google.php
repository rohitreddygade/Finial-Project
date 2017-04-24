<?php 
require __DIR__ . '/vendor/autoload.php';
use Google\Cloud\Vision\VisionClient;

# Your Google Cloud Platform project ID
$projectId = 'dispix-rohit';

# Instantiates a client
$vision = new VisionClient([
    'projectId' => $projectId
]);

# The name of the image file to annotate
$fileName = 'https://portalstoragewuprod.azureedge.net/vision/Analysis/1-1.jpg';

# Prepare the image to be annotated
$image = $vision->image(fopen($fileName, 'r'), [
    'LABEL_DETECTION'
]);

# Performs label detection on the image file
$labels = $vision->annotate($image)->labels();
echo "Labels:\n";
foreach ($labels as $label) {
    echo $label->description() . "\n";
}