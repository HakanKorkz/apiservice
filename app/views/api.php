<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?=$this->base_url;?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test API</title>
</head>
<body>
    <form action="api" method="post">
        <input type="text" name="partner_name" placeholder="partner_name" value="getir">
        <input type="text" name="partner_token" placeholder="partner_token" value="9zQ37rnquAdsw4">
        <?=$_SESSION['csrf']['input'];?>
        <input type="submit" value="Submit">
    </form>
    
</body>
</html>