<!DOCTYPE html>
<html lang="en">
<head>
    <title>New Partner</title>
    <?php $this->addLayer('app/views/header');?>
    <?php $this->addLayer('app/request/partners/new_partner');?>
</head>
<body>
    <div class="container">
        <form action="new_partner" method="post">
            <?=$_SESSION['csrf']['input'];?>
            <div class="row border-bottom py-2">
                <div class="col-lg-12">
                    <h2 class="mt-4">New Partner 
                        <button class="btn btn-primary btn-sm" name="partner_create" type="submit">Create</button>
                        <?php
                        if(isset($this->post['partner_create'])){

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
                            <li class="breadcrumb-item"><a href="partners">Partners</a></li>
                            <li class="breadcrumb-item active" aria-current="page">New Partner</li>
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
                            <label for="partner_name">Partner Name: *</label>
                            <input class="form-control" type="text" name="partner_name" value="">
                        </div>
                        <div class="form-group">
                            <label for="partner_password">Partner Password: *</label>
                            <input class="form-control" type="password" name="partner_password">
                        </div>
                        <div class="form-group mt-2">
                            <?php
                            if(isset($this->post['partner_create'])){

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
                                        <input class="form-control" type="text" name="partner_schema[<?=$value;?>]" placeholder="<?=$value;?>" value="<?php if(isset($partner_columns[$value])) { echo $partner_columns[$value];} ?>">
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