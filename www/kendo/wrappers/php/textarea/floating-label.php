<?php
require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';

$label = new \Kendo\UI\TextAreaLabel();
$label->content("Description");
$label->Floating(true);

$textarea = new \Kendo\UI\TextArea('textarea');
$textarea->label($label)
        ->rows(5);
?>

<div class="demo-section k-content">
    <h4>Set value</h4>
    <?= $textarea->render() ?>
</div>

<style>
    .k-floating-label-container {
        width: 100%;
    }
</style>

<?php require_once '../include/footer.php'; ?>
