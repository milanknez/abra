<?php
require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';

$label = new \Kendo\UI\NumericTextBoxLabel();
$label->content("Age");
$label->Floating(true);

$numeric = new \Kendo\UI\NumericTextBox('numerictextbox');
$numeric->label($label);
$numeric->format("n0");
?>

<div class="demo-section k-content">
    <h4>Set value</h4>
    <?= $numeric->render() ?>
</div>

<style>
    .k-floating-label-container {
        width: 100%;
    }
</style>

<?php require_once '../include/footer.php'; ?>
