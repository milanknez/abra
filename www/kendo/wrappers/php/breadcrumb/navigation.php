<?php
require_once '../lib/Kendo/Autoload.php';
require_once '../include/header.php';
?>

<div class="demo-section k-content wide">
    <h4>Breadcrumb Navigation</h4>
    <?php
        $breadcrumb = new \Kendo\UI\Breadcrumb('breadcrumb');

        $breadcrumb
        ->bindToLocation(true)
        ->navigational(true);

        echo $breadcrumb->render();

     ?>
</div>
<?php require_once '../include/footer.php'; ?>