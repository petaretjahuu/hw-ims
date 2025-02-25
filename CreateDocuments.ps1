# Define directories to create
$dirs = @(
    "public",
    "public\assets\css",
    "public\assets\js",
    "public\assets\images",
    "public\uploads\items",
    "public\uploads\qrcodes",
    "app\core",
    "app\models",
    "app\controllers",
    "config",
    "views\layout",
    "views\boxes",
    "views\items",
    "storage\backups",
    "vendor"
)

# Create directories
foreach ($dir in $dirs) {
    New-Item -ItemType Directory -Path $dir -Force | Out-Null
}

# Define files to create (as empty files)
$files = @(
    "public\index.php",
    "public\box.php",
    "public\item.php",
    "public\.htaccess",
    "public\assets\css\styles.css",
    "public\assets\js\script.js",
    "app\core\Database.php",
    "app\core\Controller.php",
    "app\models\Box.php",
    "app\models\Item.php",
    "app\controllers\BoxController.php",
    "app\controllers\ItemController.php",
    "config\config.php",
    "config\.env",
    "views\layout\header.php",
    "views\layout\footer.php",
    "views\boxes\list.php",
    "views\boxes\details.php",
    "views\items\list.php",
    "views\items\details.php",
    "composer.json",
    "README.md"
)

# Create empty files
foreach ($file in $files) {
    New-Item -ItemType File -Path $file -Force | Out-Null
}
