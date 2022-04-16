<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Product</title>
    <?php $this->addLayer('app/views/header');?>
    <?php $this->addLayer('app/request/products/edit_product');?>
    <?php $product = $this->theodore('products', ['id'=>$this->post['id']]); ?>
</head>
<body>
    <?php $this->addLayer('app/views/navbar');?>
    <div class="container">
        <form action="edit" method="post">
            <?=$_SESSION['csrf']['input'];?>
            <input type="hidden" name="department" value="product">
            <input type="hidden" name="id" value="<?=$product['id'];?>">
            <div class="row border-bottom py-2">
                <div class="col-lg-12">
                    <h2 class="mt-4">Edit Product 
                        <button class="btn btn-primary btn-sm" name="product_update" type="submit">Save</button>
                        <?php
                        if(isset($this->post['product_update'])){

                            if(empty($this->errors)) {
                                echo '<strong style="font-size:12px;">Saved.</strong>';
                                $this->redirect($this->page_back, 1);
                            }
                        }
                        ?>
                    </h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?=$this->base_url;?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="page/products">Products</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
                        </ol>
                    </nav>
                </div>
         
                <div class="row m-0 p-0 mb-1">
                    <?php
                    $columns = $this->columnList('products');    
                    ?>
                    <div class="col-lg-3">
                        <!-- <h5 class="border-bottom mt-4">INFORMATION</h5> -->
                        <div class="form-group">
                            <label for="product_name">Product Name: *</label>
                            <input class="form-control" type="text" name="product_name" value="<?=$product['product_name'];?>">
                        </div>
                        <div class="form-group">
                            <label for="product_code">Product Code: *</label>
                            <input class="form-control" type="text" name="product_code" value="<?=$product['product_code'];?>">
                        </div>
                        <div class="form-group">
                            <label for="product_description">Product Description: *</label>
                            <textarea class="form-control" name="product_description" id="product_description" cols="30" rows="10"><?=$product['product_description'];?></textarea>
                        </div>
                        
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="seller_id">Seller: *</label>
                                    <select class="form-select" name="seller_id" size="13" id="seller_id" aria-label="select example">
                                        <?php foreach($this->samantha('sellers', null, ['id', 'seller_name']) as $row) { ?>
                                            <option value="<?=$row['id'];?>" <?=($row['id']==$product['seller_id'])?'selected':'';?>><?=$row['seller_name'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="product_type">Product Type: *</label>
                                    <select class="form-select" name="product_type" id="product_type">
                                        <option value="">Select</option>
                                        <option value="count"<?php if($product['product_type']=='count') { echo ' selected';}?>>Count</option>
                                        <option value="nocount"<?php if($product['product_type']=='nocount') { echo ' selected';}?>>No Count</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="product_tax">Product Tax: *</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" aria-describedby="basic-addon2" name="product_tax" value="<?=$product['product_tax'];?>">
                                        <span class="input-group-text" id="basic-addon2">%</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="product_quantity">Product Quantity: *</label>
                                    <input class="form-control" type="number" name="product_quantity" value="<?=$product['product_quantity'];?>">
                                </div>
                                <div class="form-group">
                                    <label for="product_currency">Product Currency: *</label>
                                    <select class="form-select" name="product_currency" id="product_currency">
                                        <option value="">Select</option>
                                        <?php foreach($this->currencies() as $key => $currency) { ?>
                                        <option value="<?=$key;?>"<?php if($product['product_currency']==$key) { echo ' selected';}?>><?=$currency;?></option>
                                        <?php } ?>
                                    </select>
                                </div>                              
                                <div class="form-group">
                                    <label for="product_lang">Product Lang: *</label>
                                    <select class="form-select" name="product_lang" id="product_lang">
                                        <option value="">Select</option>
                                        <?php foreach($this->languages() as $key => $lang) { ?>
                                        <option value="<?=$key;?>"><?=$lang['name'];?> (<?=$lang['nativeName'];?>)</option>
                                        <option value="<?=$key;?>"<?php if($product['product_lang']==$key) { echo ' selected';}?>><?=$lang['name'];?> (<?=$lang['nativeName'];?>)</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="product_discount_price">Product Discount Price: *</label>
                                    <input class="form-control" type="text" name="product_discount_price" value="<?=$product['product_discount_price'];?>">
                                </div>
                                <div class="form-group">
                                    <label for="product_price">Product Price: *</label>
                                    <input class="form-control" type="text" name="product_price" value="<?=$product['product_price'];?>">
                                </div>
                                
                                <div class="form-group">
                                    <label for="product_status">Product Status: *</label>
                                    <select class="form-select" name="product_status" id="product_status">
                                        <option value="">Select</option>
                                        <option value="1"<?php if($product['product_status']==true) { echo ' selected';}?>>Active</option>
                                        <option value="0"<?php if($product['product_status']==false) { echo ' selected';}?>>In Active</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group mt-2">
                            <?php
                            if(isset($this->post['product_update'])){

                                if(!empty($this->errors)) {
                                    foreach ($this->errors as $errors) {
                                        foreach ($errors as $key => $error) {
                                            echo '<strong style="font-size:10px; color:red;">* '.$error.'.</strong><br>';
                                        }
                                    }
                                    $this->redirect($this->page_back, 5);
                                }
                            }
                            ?>
                        </div>
                    </div>
                    
                </div>
            </div>
        </form>

    </div>
</body>
</html>