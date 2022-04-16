<?php

$this->post['department'] = $this->post['department'] ?? '';
switch($this->post['department']){
    case 'partner':

        ($_SERVER['REQUEST_METHOD'] === 'GET') ? 
        $this->addLayer('app/tests/api/partners/views/partner') : 
        $this->addLayer('app/tests/api/partners/partner');

        break;
    default:
        $this->abort('404', 'Department not found');
    break;
}