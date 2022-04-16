<?php
$this->addLayer('app/middleware/seller_id');
$this->update('sellers', ['seller_token'=>$this->generateToken(14)], $this->post['id']);
$this->redirect($this->page_back);