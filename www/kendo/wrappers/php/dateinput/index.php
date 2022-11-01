<?php

require_once '../lib/Kendo/Autoload.php';
require_once '../include/header.php';
?>
<div class="demo-section k-content">
        <h4>Enter a date</h4>
<?php
$dateInput = new \Kendo\UI\DateInput('dateinput');

$dateInput->attr('title', 'date input')
           ->attr('style', 'width: 100%');

echo $dateInput->render();
?>
</div>
<?php require_once '../include/footer.php'; ?>
