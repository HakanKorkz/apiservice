<!DOCTYPE html>
<html lang="en">
<head>
    <title>Partners</title>
    <?php $this->addLayer('app/views/header');?>
    <script src="public/vue/vue.js"></script>

    <script>
        //
        window.addEventListener('load', (event) => {

            var APIs = new Vue({
                el: '#partners',
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
                        fetch(`api/partners/${this.query}`)
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
    <div class="container" id="partners">
        <div class="row border-bottom py-2">
            <div class="col-lg-12">
                <h2 class="mt-4">Partners
                    <a href="new_partner" class="btn btn-primary btn-sm">New Partner</a>
                </h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Partners</li>
                    </ol>
                </nav>
            </div>
            <div class="row m-0 p-0 mb-1">
                <div class="col-lg-12 mb-4">
                    <input class="form-control rounded-0 p-2" style="font-size:large;font-weight:100;" v-model="query" v-on:keyup="search" id="searchBox" type="text" name="keyword">
                    <div class="text-center mt-4" v-if="result.length == 0"><h2>Partner not found.</h2></div>
                </div>
                <div class="col-lg-4 mb-4" v-for="partner in result">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="fs-4 fw-lighter text-dark"><i class="bi bi-diagram-3-fill text-warning fs-2 align-middle"></i> {{partner.partner_name}}</h5>
                            <h5 class="mb-3 fs-4 fw-lighter text-dark"><i class="bi bi-key-fill text-warning fs-2 align-middle"></i> {{partner.partner_token}} 
                                <a v-bind:href="'new_token/'+partner.id" class="btn btn-warning btn-sm rounded-circle" onclick="return confirm('Are you sure you want to change the key?')" ><i class="bi bi-arrow-clockwise"></i></a>
                            </h5>
                            
                            <a v-bind:href="'edit_partner/'+partner.id" class="btn btn-warning btn-sm rounded-0"><i class="bi bi-gear"></i></a>
                            <a v-bind:href="'edit_schema/'+partner.id" class="btn btn-warning btn-sm rounded-0"><i class="bi bi-bezier2"></i></a>
                            <a v-bind:href="'sync_partner/'+partner.id" class="btn btn-primary btn-sm rounded-0" onclick="return confirm('Are you determined to realize Partner Sync?')"><i class="bi bi-arrow-repeat"></i></a>
                            <a v-bind:href="'delete_partner/'+partner.id" class="btn btn-danger btn-sm rounded-0" onclick="return confirm('Are you determined to remove the partner?')" class="card-link"><i class="bi bi-trash"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-12 mt-2 text-center" v-if="result.length<totalItem">
                    <button class="btn btn-secondary rounded-0" v-on:click="showMore">Show more</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>