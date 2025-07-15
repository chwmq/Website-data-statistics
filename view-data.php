<!--用于查看访问数据-->
<?php include 'data.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>statistics</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <p>Page views: <?php echo $counter['total']; ?></p>
    <p>Unique visitors: <?php echo $counter['unique']; ?></p>
</body>
</html>
