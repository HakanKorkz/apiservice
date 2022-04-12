<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Seller</title>
</head>
<body>
    <form action="new_seller" method="post">
        <div>
            <label for="seller_name">Seller Name:</label>
            <input type="text" name="seller_name">
        </div>
        <div>
            <label for="seller_password">Seller Password:</label>
            <input type="password" name="seller_password">
        </div>
        <?=$_SESSION['csrf']['input'];?>
        <button type="submit">Insert</button>
    </form>

    <div>
        <?php $this->addLayer('app/request/sellers/new_seller'); ?>
    </div>
</body>
</html>