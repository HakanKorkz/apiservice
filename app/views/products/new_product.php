<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Product</title>
</head>
<body>
    <form action="new_product" method="post">
        <div>
            <label for="seller_id">Select Seller:</label>
            <select name="seller_id" id="seller_id">
                <option value="">--Select--</option>
                <?php
                foreach ($this->samantha('sellers', null, ['id', 'seller_name']) as $seller) {
                    echo '<option value="' . $seller['id'] . '">' . $seller['seller_name'] . '</option>';
                }
                ?>
            </select>
        </div>
        <div>
            <label for="product_type">Product Type:</label>
            <select name="product_type" id="product_type">
                <option value="">--Select--</option>
                <option value="count">Count</option>
                <option value="nocount">No Count</option>
            </select>
        </div>
        <div>
            <label for="product_code">Product Code:</label>
            <input type="text" name="product_code">
        </div>
        <div>
            <label for="product_name">Product Name:</label>
            <input type="text" name="product_name">
        </div>
        <div>
            <label for="product_quantity">Product Quantity:</label>
            <input type="number" name="product_quantity">
        </div>
        <div>
            <label for="product_tax">Tax:</label>
            <select name="product_tax" id="product_tax">
                <option value="">--Select--</option>
                <option value="18">%18</option>
                <option value="8">%8</option>
            </select>
        </div>
        <div>
            <label for="product_status">Product Status:</label>
            <select name="product_status" id="product_status">
                <option value="">--Select--</option>
                <option value="true">Enable</option>
                <option value="false">Disable</option>
            </select>
        </div>
        <div>
            <label for="product_price">Product Price:</label>
            <input type="text" name="product_price">
        </div>
        <div>
            <label for="product_old_price">Product Discounted Price:</label>
            <input type="text" name="product_old_price">
        </div>
        <?=$_SESSION['csrf']['input'];?>
        <button type="submit">Insert</button>
    </form>

    <div>
        <?php $this->addLayer('app/request/products/new_product'); ?>
    </div>
</body>
</html>