<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Partner</title>
</head>
<body>
    <form action="new_partner" method="post">
        <div>
            <label for="partner_name">Partner Name:</label>
            <input type="text" name="partner_name">
        </div>
        <div>
            <label for="partner_password">Partner Password:</label>
            <input type="password" name="partner_password">
        </div>
        <?=$_SESSION['csrf']['input'];?>
        <button type="submit">Insert</button>
    </form>

    <div>
        <?php $this->addLayer('app/request/new_partner'); ?>
    </div>
</body>
</html>