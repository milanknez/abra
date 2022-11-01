<?php
require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';

$label = new \Kendo\UI\MaskedTextBoxLabel();
$label->content("Phone number");
$label->Floating(true);

$maskedtextbox = new \Kendo\UI\MaskedTextBox('maskedtextbox');
$maskedtextbox->mask("(999) 000-0000");
$maskedtextbox->label($label);
?>

<div class="demo-section k-content">
    <h4>Set value</h4>
    <?= $maskedtextbox->render() ?>
</div>

<style>
    .k-floating-label-container {
        width: 100%;
    }
</style>

<?php require_once '../include/footer.php'; ?>
