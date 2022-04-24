<?php

$this->addLayer('app/middleware/partner_id');
$partner_status = $this->amelia('partners', ['id'=>$this->post['id']], 'partner_status');
$this->update('partners', ['partner_status'=>($partner_status) ? 0 : 1], $this->post['id']);
$this->redirect($this->page_back);