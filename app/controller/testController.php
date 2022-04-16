<?php

$this->post['type'] = $this->post['type'] ?? '';
switch($this->post['type']){
    case 'api':        
        $this->addLayer('app/tests/api');
        break;
    default:
        $this->abort('404', 'Test not found');
    break;
}