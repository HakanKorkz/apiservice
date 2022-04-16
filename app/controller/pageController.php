<?php

$this->post['department'] = $this->post['department'] ?? '';
switch($this->post['department']){
    case 'partners':
        $this->addLayer('app/views/partners/partners');
        break;
    case 'sellers':
        $this->addLayer('app/views/sellers/sellers');
        break;
    case 'products':
        $this->addLayer('app/views/products/products');
        break;
    default:
        $this->abort('404', 'Department not found');
        break;
}