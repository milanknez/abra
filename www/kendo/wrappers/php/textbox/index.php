<?php
require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';

$textbox = new \Kendo\UI\TextBox('textbox');
$textbox->placeholder("Name...")
        ->attr('style', 'width: 100%');
?>

<div class="demo-section k-content">
    <h4>Set value</h4>
    <?= $textbox->render() ?>
</div>

<?php require_once '../include/footer.php'; ?>
