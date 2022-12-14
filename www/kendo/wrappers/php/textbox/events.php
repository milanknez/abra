<?php
require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';

$textbox = new \Kendo\UI\TextBox('textbox');
$textbox->change('onChange')
        ->attr('style', 'width: 100%');
?>

<div class="demo-section k-content">
    <h4>Set value</h4>
    <?php
        echo $textbox->render();
    ?>
</div>

<div class="box">
    <h4>Console log</h4>
    <div class="console"></div>
</div>

<script>
    function onChange() {
        kendoConsole.log("Change :: " + this.value());
    }
</script>

<?php require_once '../include/footer.php'; ?>
