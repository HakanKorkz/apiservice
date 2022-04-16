<!DOCTYPE html>
<html lang="en">
<head>
    <title>New Seller</title>
    <?php $this->addLayer('app/views/header');?>
    <?php $this->addLayer('app/request/sellers/new_seller');?>
</head>
<body>
    <?php $this->addLayer('app/views/navbar');?>
    <div class="container">
        <form action="new" method="post">
            <?=$_SESSION['csrf']['input'];?>
            <input type="hidden" name="department" value="seller">
            <div class="row border-bottom py-2">
                <div class="col-lg-12">
                    <h2 class="mt-4">New Seller 
                        <button class="btn btn-primary btn-sm" name="seller_create" type="submit">Create</button>
                        <?php
                        if(isset($this->post['seller_create'])){

                            if(empty($this->errors)) {
                                echo '<strong style="font-size:12px;">Created.</strong>';
                                $this->redirect($this->page_back, 1);
                            }
                        }
                        ?>
                    </h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?=$this->base_url;?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="page/sellers">Sellers</a></li>
                            <li class="breadcrumb-item active" aria-current="page">New Seller</li>
                        </ol>
                    </nav>
                </div>
         
                <div class="row m-0 p-0 mb-1">
                    <?php
                    $columns = $this->columnList('products');
                    ?>
                    <div class="col-md-3">
                        <h5 class="border-bottom mt-4">INFORMATION</h5>
                        <div class="form-group">
                            <label for="seller_name">Seller Name: *</label>
                            <input class="form-control" type="text" name="seller_name" value="">
                        </div>
                        <div class="form-group">
                            <label for="seller_password">Seller Password: *</label>
                            <input class="form-control" type="password" name="seller_password">
                        </div>
                        <div class="form-group">
                            <label for="seller_status">Seller Status: *</label>
                            <select class="form-select" name="seller_status" id="seller_status">
                                <option value="">Select</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <?php
                            if(isset($this->post['seller_create'])){

                                if(!empty($this->errors)) {
                                    foreach ($this->errors as $errors) {
                                        foreach ($errors as $key => $error) {
                                            echo '<strong style="font-size:10px; color:red;">* '.$error.'.</strong><br>';
                                        }
                                    }
                                    $this->redirect($this->page_back, 3);
                                }
                            }
                            ?>
                        </div>
                        
                    </div>
                    <div class="col-lg-9">
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <h5 class="border-bottom mt-4">SCHEMA</h5>
                            </div>
                            <div class="col-md-6">
                                <h6 class="mt-2">Database Columns</h6>
                                <ul class="p-0">
                                    <?php
                                    foreach($columns as $column => $value){
                                        echo '<li><input tyle="text" class="form-control" value="'.$value.'" disabled></li>';
                                    }
                                    ?>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h6 class="mt-2">Request Columns</h6>
                                <ul class="p-0">
                                <?php
                                    
                                    foreach($columns as $column => $value){
                                ?>
                                    <li>
                                        <input class="form-control" type="text" name="seller_schema[<?=$value;?>]" placeholder="<?=$value;?>" value="<?php if(isset($seller_columns[$value])) { echo $seller_columns[$value];} ?>">
                                    </li>
                                <?php    }
                                
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </form>

    </div>
</body>
</html>