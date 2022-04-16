<?php

$this->post['department'] = $this->post['department'] ?? '';
switch($this->post['department']){
    case 'partner':
        $this->addLayer('app/request/partners/sync_partner');
        break;
    case 'seller':
        $this->addLayer('app/request/sellers/sync_seller');
        break;
    case 'product':
        $this->addLayer('app/request/products/sync_product');
        break;
    default:
        $this->abort('404', 'Department not found');
        break;
}