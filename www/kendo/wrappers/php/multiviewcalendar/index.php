<?php
require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';
?>

<div id="example" style="text-align: center;">
    <div class="demo-section k-content wide" style="display: inline-block;">
        <h4>Pick a date</h4>
    <?php
    $multiViewCalendar = new \Kendo\UI\MultiViewCalendar('multiViewCalenar');

    echo $multiViewCalendar->render();
    ?>
    </div>
</div>

<?php require_once '../include/footer.php'; ?>
