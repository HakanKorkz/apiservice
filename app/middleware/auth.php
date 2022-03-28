<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(!isset($this->post['partner_name']) OR !isset($this->post['partner_token'])){
        $this->abort('501','Missing partner_name or partner_token');
    } else {
        if(!$this->do_have('partners', ['partner_name'=>$this->post['partner_name'], 'partner_token'=>$this->post['partner_token']])){
            $this->abort('501','Invalid partner_name or partner_token');
        }
    }
} else {
    $this->abort('501','Access denied');
}
