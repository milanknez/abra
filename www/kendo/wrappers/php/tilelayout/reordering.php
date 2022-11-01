<?php

require_once '../lib/Kendo/Autoload.php';
require_once '../include/header.php';

?>

<script id="barcelona" type="text/x-kendo-template">
    <img class="k-card-image" draggable="false" src="../content/web/cards/barcelona.jpg")" />
</script>
<script id="sofia" type="text/x-kendo-template">
    <img class="k-card-image" draggable="false" src="../content/web/cards/sofia.jpg")" />
</script>
<script id="rome" type="text/x-kendo-template">
    <img class="k-card-image" draggable="false" src="../content/web/cards/rome.jpg")" />
</script>
<script id="sa" type="text/x-kendo-template">
    <img class="k-card-image" draggable="false" src="../content/web/cards/south-africa.jpg")" />
</script>
<script id="sanfran" type="text/x-kendo-template">
    <img class="k-card-image" draggable="false" src="../content/web/cards/sanfran.jpg")" />
</script>
<script id="seaview" type="text/x-kendo-template">
    <img class="k-card-image" draggable="false" src="../content/web/cards/seaview-appartments.png")" />
</script>

<?php
    $tilelayout = new \Kendo\UI\TileLayout("tilelayout");

    $tilelayout->columns(2);
    $tilelayout->columnsWidth(285);
    $tilelayout->rowsHeight(285);
    $tilelayout->reorderable(true);

    $header1 = new \Kendo\UI\TileLayoutContainerHeader();
    $header1->text("Barcelona");

    $container1 = new \Kendo\UI\TileLayoutContainer();
    $container1->bodyTemplateId("barcelona")
                ->colSpan(1)
                ->rowSpan(1)
                ->header($header1);

    $tilelayout ->addContainer($container1);

    $header2 = new \Kendo\UI\TileLayoutContainerHeader();
    $header2->text("Sofia");

    $container2 = new \Kendo\UI\TileLayoutContainer();
    $container2->bodyTemplateId("sofia")
                ->colSpan(1)
                ->rowSpan(1)
                ->header($header2);

    $tilelayout->addContainer($container2);

    $header3 = new \Kendo\UI\TileLayoutContainerHeader();
    $header3->text("Rome");

    $container3 = new \Kendo\UI\TileLayoutContainer();
    $container3->bodyTemplateId("rome")
                ->colSpan(1)
                ->rowSpan(1)
                ->header($header3);

    $tilelayout->addContainer($container3);

    $header4 = new \Kendo\UI\TileLayoutContainerHeader();
    $header4->text("South Africa");

    $container4 = new \Kendo\UI\TileLayoutContainer();
    $container4->bodyTemplateId("sa")
                ->colSpan(1)
                ->rowSpan(1)
                ->header($header4);

    $tilelayout->addContainer($container4);

    $header5 = new \Kendo\UI\TileLayoutContainerHeader();
    $header5->text("San Francisco");

    $container5 = new \Kendo\UI\TileLayoutContainer();
    $container5->bodyTemplateId("sanfran")
                ->colSpan(1)
                ->rowSpan(1)
                ->header($header5);

    $tilelayout->addContainer($container5);

    $header6 = new \Kendo\UI\TileLayoutContainerHeader();
    $header6->text("Sea View Apartments");

    $container6 = new \Kendo\UI\TileLayoutContainer();
    $container6->bodyTemplateId("seaview")
                ->colSpan(1)
                ->rowSpan(1)
                ->header($header6);

    $tilelayout->addContainer($container6);
?>

<div class="center">
    <div class="demo">
        <?php echo $tilelayout->render(); ?>
    </div>
</div>

<style>
    .k-card-image {
        width: 285px;
        height: 189px;
    }

    .center {
        text-align: center;
    }

    .demo {
        margin: 0 auto 4.5em;
        padding: 3em;
        border: 1px solid rgba(20,53,80,0.14);
        display: inline-block;
    }
</style>

<?php require_once '../include/footer.php'; ?>