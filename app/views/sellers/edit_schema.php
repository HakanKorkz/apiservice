<?php
$this->addLayer('app/middleware/seller_id');
$this->addLayer('app/request/sellers/edit_schema');
$seller = $this->theodore('sellers', ['id'=>$this->post['id']]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Schema</title>
    <?php $this->addLayer('app/views/header');?>
</head>
<body>
    <?php $this->addLayer('app/views/navbar');?>
    <div class="container">
        <form action="edit" method="post">
            <?=$_SESSION['csrf']['input'];?>
            <input type="hidden" name="department" value="seller-schema">
            <input type="hidden" name="id" value="<?=$this->post['id'];?>">
            <div class="row border-bottom py-2">
                <div class="col-lg-12">
                    <h2 class="mt-4">Edit Schema 
                        <a href="edit/seller/<?=$seller['id'];?>" class="btn btn-warning btn-sm">Seller Edit</a>
                        <button type="submit" name="schema_update" class="btn btn-primary btn-sm">Save</button>

                            <?php
                                if(isset($this->post['schema_update'])){

                                    if(empty($this->errors)) {
                                        
                                        echo '<strong style="font-size:12px;">Saved.</strong>';
                                        $this->redirect($this->page_back, 3);
                                    }
                                }
                            ?>
                    </h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?=$this->base_url;?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="page/sellers">Sellers</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Schema</li>
                        </ol>
                    </nav>
                </div>        

                <div class="row m-0 p-0 mb-1">
                    <?php
                    $columns = $this->columnList('products');
                    $seller_columns = $this->json_decode($seller['seller_schema']);
                    ?>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <h5 class="border-bottom mt-4">SCHEMA</h5>
                            </div>
                            <div class="col-lg-6">
                                <h6 class="mt-2">Database Columns</h6>
                                <ul class="p-0">
                                    <?php
                                    foreach($columns as $column => $value){
                                        $active = '';
                                        if(in_array($value, array_keys($seller_columns))){ $active = ' style="border-left:3px solid #52bc12;"';}
                                        echo '<li><input tyle="text" class="form-control"'.$active.' value="'.$value.'" disabled></li>';
                                    }
                                    ?>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <h6 class="mt-2">Request Columns</h6>
                                <ul class="p-0">
                                <?php
                                    
                                    foreach($columns as $column => $value){
                                        $active = '';
                                        if(in_array($value, array_keys($seller_columns))){ $active = ' style="border-left:3px solid #52bc12;"';}
                                ?>
                                    <li>
                                        <input class="form-control"<?=$active;?> type="text" name="seller_schema[<?=$value;?>]" placeholder="<?=$value;?>" value="<?php if(isset($seller_columns[$value])) { echo $seller_columns[$value];} ?>">
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