<?php

require_once '../lib/Kendo/Autoload.php';
require_once '../include/header.php';
?>
<div class="demo-section k-content">
    <h4>Remind me on</h4>
<?php
$dateTimePicker = new \Kendo\UI\DateTimePicker('datetimepicker');

$dateTimePicker->value(new DateTime('now', new DateTimeZone('UTC')))
           ->attr('style', 'width: 100%')
           ->weekNumber(true);

echo $dateTimePicker->render();
?>
</div>
<?php require_once '../include/footer.php'; ?>