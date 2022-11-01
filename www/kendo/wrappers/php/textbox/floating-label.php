<?php
require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';

$label = new \Kendo\UI\TextBoxLabel();
$label->content("Name");
$label->Floating(true);

$textbox = new \Kendo\UI\TextBox('textbox');
$textbox->label($label);
?>

<div class="demo-section k-content">
    <h4>Set value</h4>
    <?= $textbox->render() ?>
</div>

<style>
    .k-floating-label-container {
        width: 100%;
    }
</style>

<?php require_once '../include/footer.php'; ?>
