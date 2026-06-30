<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Product;

$p = Product::first();
if (!$p) {
    echo "no products\n";
    exit;
}

$imageArray = $p->images;
if (is_string($imageArray)) {
    echo "images is string\n";
} elseif (is_array($imageArray)) {
    echo "images is array\n";
}
echo 'images='; var_export($imageArray); echo PHP_EOL;
if (!empty($imageArray)) {
    $image = $imageArray[0];
    echo 'image raw=' . $image . PHP_EOL;
    echo 'asset=' . asset('uploads/products/' . $image) . PHP_EOL;
    echo 'path=' . public_path('uploads/products/' . $image) . PHP_EOL;
    echo 'exists=' . (file_exists(public_path('uploads/products/' . $image)) ? 'yes' : 'no') . PHP_EOL;
}
