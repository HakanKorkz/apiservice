<?php
$this->addLayer('app/middleware/product_id');
echo '// Run the code. e.g:';

$products = $this->samantha('products', ['id'=>$this->post['id']]);

echo 'POST:<br>';
$this->print_pre($this->post);
echo '<hr>';
echo 'DATABASE PRODUCTS:<br>';
$this->print_pre($products);

?>