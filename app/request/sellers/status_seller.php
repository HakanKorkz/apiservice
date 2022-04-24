<?php

$this->addLayer('app/middleware/seller_id');
$seller_status = $this->amelia('sellers', ['id'=>$this->post['id']], 'seller_status');
$this->update('sellers', ['seller_status'=>($seller_status) ? 0 : 1], $this->post['id']);
$this->redirect($this->page_back);