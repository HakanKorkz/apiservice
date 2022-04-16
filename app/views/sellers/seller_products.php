<?php

$this->addLayer('app/middleware/seller_id');
$this->addLayer('app/request/sellers/edit_seller');
$seller = $this->theodore('sellers', ['id'=>$this->post['id']]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Products</title>
    <?php $this->addLayer('app/views/header');?>
    <script src="public/vue/vue.js"></script>

    <script>
        //
        window.addEventListener('load', (event) => {

            var APIs = new Vue({
                el: '#products',
                data: {
                    query: "",
                    result: [],
                    startLimit:0,
                    endLimit:3,
                    lastLimit:0,
                    totalItem:0
                },
                mounted: function() {
                    this.search();
                },
                methods: {
                    search: function (item="") {
                        if(this.lastLimit == 0){
                            this.lastLimit = this.endLimit;
                        }
                        if(item !=""){
                            this.query = item.target.value;
                        }
                        fetch(`api/products/${this.query}/<?=$seller['id'];?>`)
                            .then(result => result.json())
                            .then(result => {
                                this.$set(this, 'result', result.slice(this.startLimit, this.lastLimit));
                                this.totalItem = result.length;
                            })
                            .catch(error => console.log(error))
                    },
                    showMore: function (event){

                        this.lastLimit += this.endLimit;
                        this.search();

                    }
                }
            });

        });
    </script>
</head>
<body>
    <?php $this->addLayer('app/views/navbar');?>
    <div class="container">
        
        <div class="row border-bottom py-2">
            <div class="col-lg-12">
                <h2 class="mt-4">Seller Products 
                    <a href="edit/seller/<?=$seller['id'];?>" class="btn btn-warning btn-sm">Edit Seller</a> 
                </h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=$this->base_url;?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="page/sellers">Sellers</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Seller Products</li>
                    </ol>
                </nav>
            </div>
            <div class="col-lg-12" id="products">
                <div class="row">
                    <div class="row m-0 p-0 mb-1">
                        <div class="col-lg-12 mb-4">
                            <input class="form-control rounded-0 p-2" style="font-size:large;font-weight:100;" v-model="query" v-on:keyup="search" id="searchBox" type="text" name="keyword" placeholder="SEARCH SELLER PRODUCT">
                            <div class="text-center mt-4" v-if="result.length == 0"><h2>Seller product not found.</h2></div>
                        </div>
                        <div class="col-lg-4 mb-4" v-for="product in result">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="display-8 fw-bold text-dark">{{product.product_name}}</h5>                                       
                                    <h5 class="fs-4 fw-bold text-dark">{{product.product_price}} {{product.product_currency}}</h5>                                       
                                    <a v-bind:href="'edit/product/'+product.id" class="btn btn-warning btn-sm rounded-0"><i class="bi bi-gear"></i></a>
                                    <a v-bind:href="'sync/product/'+product.id" class="btn btn-primary btn-sm rounded-0" onclick="return confirm('Are you determined to realize Product Sync?')"><i class="bi bi-arrow-repeat"></i></a>
                                    <a v-bind:href="'delete/product/'+product.seller_id+'/'+product.id" class="btn btn-danger btn-sm rounded-0" onclick="return confirm('Are you determined to remove the product?')" class="card-link"><i class="bi bi-trash"></i></a>
                                    <h5 class="fst-italic border-top mt-3 pt-3 fw-bold text-danger text-center">{{product.seller_name}}</h5>                                       
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-12 mt-2 text-center" v-if="result.length<totalItem">
                            <button class="btn btn-secondary rounded-0" v-on:click="showMore">Show more</button>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>


    </div>
</body>
</html>