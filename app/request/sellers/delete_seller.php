<?php
$this->addLayer('app/middleware/seller_id');

$this->delete('sellers', $this->post['id']);
$this->redirect($this->page_back);