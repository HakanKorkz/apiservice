<?php
$this->addLayer('app/middleware/partner_id');
$this->update('partners', ['partner_token'=>$this->generateToken(14)], $this->post['id']);
$this->redirect($this->page_back);