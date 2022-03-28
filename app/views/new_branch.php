<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Branch</title>
</head>
<body>
    <form action="new_branch" method="post">
        <div>
            <label for="branch_name">Branch Name:</label>
            <input type="text" name="branch_name">
        </div>
        <div>
            <label for="branch_password">Branch Password:</label>
            <input type="password" name="branch_password">
        </div>
        <?=$_SESSION['csrf']['input'];?>
        <button type="submit">Insert</button>
    </form>

    <div>
        <?php $this->addLayer('app/request/new_branch'); ?>
    </div>
</body>
</html>