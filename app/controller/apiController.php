<?php

$this->post['department'] = $this->post['department'] ?? '';
switch($this->post['department']){
    case 'partners':
        $this->addLayer('app/api/partners');
        break;
    case 'sellers':
        $this->addLayer('app/api/sellers');
        break;
    case 'products':
        $this->addLayer('app/api/products');
        break;
    default:
        $this->abort('404', 'Department not found');
        break;
}