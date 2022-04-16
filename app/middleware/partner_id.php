<?php

if(!isset($this->post['id'])){
    $this->abort('400', 'Partner ID is required.');
}
if(!$this->do_have('partners', ['id'=>$this->post['id']])){
    $this->abort('400', 'Partner ID is not found.');
}