<h2>Branches <a href="new_branch">Add</a></h2>
<?php

// hepsi
$this->print_pre($this->samantha('branches', null, [
    'id', 'branch_name', 'branch_token', 'branch_status', 'created_at', 'updated_at'
]));

// aktifler
// $this->print_pre($this->samantha('branches', ['branch_status'=>true], [
//     'id', 'branch_name', 'branch_token', 'branch_status', 'created_at', 'updated_at'
// ]));

// pasifler
// $this->print_pre($this->samantha('branches', ['branch_status'=>false], [
//     'id', 'branch_name', 'branch_token', 'branch_status', 'created_at', 'updated_at'
// ]));