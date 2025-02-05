<?php

exec('composer dump-autoload', $output, $returnCode);
if ($returnCode !== 0) {
    echo "Error during composer dump-autoload\n";
    exit($returnCode);
}
echo "Successfully regenerated autoload\n";

require __DIR__ . '/vendor/autoload.php';
