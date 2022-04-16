<?php

$this->post['department'] = $this->post['department'] ?? '';
switch($this->post['department']){
    case 'partner':
        $this->addLayer('app/views/partners/edit_partner');
        break;
    case 'partner-schema':
        $this->addLayer('app/views/partners/edit_schema');
        break;
    case 'seller':
        $this->addLayer('app/views/sellers/edit_seller');
        break;
    case 'seller-schema':
        $this->addLayer('app/views/sellers/edit_schema');
        break;
    case 'seller-products':
        $this->addLayer('app/views/sellers/seller_products');
        break;
    case 'product':
        $this->addLayer('app/views/products/edit_product');
        break;
    default:
        $this->abort('404', 'Department not found');
        break;
}
