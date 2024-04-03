<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>laravel connecten</title>

</head>
<body>
    <div>
    <php
if (DB::connection()->getPdo()){
    echo "Succesvol verbonden met de database en de database naam is:" .DB::connection()->getDatabaseName();
}
?>
    </div>
</body>
</html>