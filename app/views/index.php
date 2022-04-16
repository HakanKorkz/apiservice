<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->addLayer('app/views/header');?>
    
</head>
<body>
    <?php $this->addLayer('app/views/navbar');?>
    <div class="container mt-5">
        <div class="row p-2 pt-5">
            <div class="col-lg-4 bg-light" style="height:20vh; min-width:50vh">
                <h4>Sellers</h4>
                <h2 class="display-3 text-end"><?=count($this->samantha('sellers', null));?></h2>
            </div>
            <div class="col-lg-4 bg-secondary" style="height:20vh; min-width:50vh">
                <h4 class="text-white">Products</h4>
                <h2 class="display-3 text-white text-end"><?=count($this->samantha('products', null));?></h2>
            </div>
            <div class="col-lg-4 bg-dark" style="height:20vh; min-width:50vh">
                <h4 class="text-white">Partners</h4>
                <h2 class="display-3 text-white text-end"><?=count($this->samantha('partners', null));?></h2>
            </div>
        </div>
    </div>
</body>
</html>