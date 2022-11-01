<?php
require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';

$textarea = new \Kendo\UI\TextArea('description');
$textarea->placeholder("Description...")
        ->rows(5)
        ->attr('style', 'width: 100%');
?>

<div class="demo-section k-content k-rtl">
    <h4>Set value</h4>
    <?= $textarea->render() ?>
</div>

<?php require_once '../include/footer.php'; ?>
