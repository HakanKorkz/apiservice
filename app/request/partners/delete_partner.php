<?php
$this->addLayer('app/middleware/partner_id');

$this->delete('partners', $this->post['id']);
$this->redirect($this->page_back);