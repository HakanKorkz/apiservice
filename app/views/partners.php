<h2>Partners <a href="new_partner">Add</a></h2>

<?php

// hepsi
$this->print_pre($this->samantha('partners', null, [
    'id', 'partner_name', 'partner_token', 'partner_status', 'created_at', 'updated_at'
]));

// aktifler
// $this->print_pre($this->samantha('partners', ['partner_status'=>true], [
//     'id', 'partner_name', 'partner_token', 'partner_status', 'created_at', 'updated_at'
// ]));

// pasifler
// $this->print_pre($this->samantha('partners', ['partner_status'=>false], [
//     'id', 'partner_name', 'partner_token', 'partner_status', 'created_at', 'updated_at'
// ]));