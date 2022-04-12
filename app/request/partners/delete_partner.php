<?php
$this->addLayer('app/middleware/partner_id');

$this->delete('partners', $this->post['partner_id']);
$this->redirect($this->page_back);