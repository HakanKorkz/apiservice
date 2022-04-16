<?php

$this->post['department'] = $this->post['department'] ?? '';
switch($this->post['department']){
    case 'partner':
        $this->addLayer('app/request/partners/new_token');
        break;
    case 'seller':
        $this->addLayer('app/request/sellers/new_token');
        break;
    default:
        $this->abort('404', 'Department not found');
        break;
}