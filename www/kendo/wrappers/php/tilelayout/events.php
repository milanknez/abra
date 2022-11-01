<?php

require_once '../lib/Kendo/Autoload.php';
require_once '../include/header.php';

?>

<!-- container templates -->
<script id="shells" type="text/x-kendo-template">
    <div style="display: flex;height: 100%;">
        <img src="../content/web/cards/shells.jpg" style="margin-right: 1em;">
        <p>The ultimate guide for all of you beach lovers. Planning your 2020 vacation or just longing to tuck your toes in the sand, feel the sea breeze and gather as much vitamin D as possible? Just continue reading to find out our favorite beach spots for 2020.</p>
    </div>
</script>
<script id="tulips" type="text/x-kendo-template">
    <img class="k-card-image" draggable="false" src="../content/web/cards/tulips.jpg" )" />
    <div class="k-vbox k-column">
        <div class="k-card-body">
            <p>In the 17th century tulips were extremely popular in Europe. Holland was gripped in a craze for Tulips that lead many to even sell off their fortunes. It was popularly known as the Tulipomania.</p>
        </div>
    </div>
</script>
<script id="park" type="text/x-kendo-template">
    <img class="k-card-image" draggable="false" src="../content/web/sortable/5.jpg" )" />
    <div class="k-vbox k-column">
        <div class="k-card-body">
            <p>Sakura is the Japanese term for ornamental cherry blossom trees and their blossoms. Sakura is special in Japan and there are even "Sakura forecasts".</p>
        </div>
    </div>
</script>

<script>
    function onResize(e) {
        kendoConsole.log("Resized: " + e.container.find("> .k-card-header").text());
    }

    function onReorder(e) {
        kendoConsole.log("Reordered: " + e.container.find(".k-card-header").text());
    }
</script>

<?php
    $tilelayout = new \Kendo\UI\TileLayout("tilelayout");

    $tilelayout->columns(2);
    $tilelayout->columnsWidth(285);
    $tilelayout->rowsHeight(350);
    $tilelayout->reorderable(true);
    $tilelayout->resizable(true);
    $tilelayout->resize("onResize");
    $tilelayout->reorder("onReorder");

    $header1 = new \Kendo\UI\TileLayoutContainerHeader();
    $header1->text("Shells");

    $container1 = new \Kendo\UI\TileLayoutContainer();
    $container1->bodyTemplateId("shells")
                ->colSpan(1)
                ->rowSpan(2)
                ->header($header1);

    $tilelayout ->addContainer($container1);

    $header2 = new \Kendo\UI\TileLayoutContainerHeader();
    $header2->text("Tulips");

    $container2 = new \Kendo\UI\TileLayoutContainer();
    $container2->bodyTemplateId("tulips")
                ->colSpan(1)
                ->rowSpan(1)
                ->header($header2);

    $tilelayout->addContainer($container2);

    $header3 = new \Kendo\UI\TileLayoutContainerHeader();
    $header3->text("Cherry Blossoms");

    $container3 = new \Kendo\UI\TileLayoutContainer();
    $container3->bodyTemplateId("park")
                ->colSpan(1)
                ->rowSpan(1)
                ->header($header3);

    $tilelayout->addContainer($container3);
?>

<div class="center">
    <div class="demo">
        <?php echo $tilelayout->render(); ?>
        <div class="box">
            <h4>Console log</h4>
            <div class="console"></div>
        </div>
    </div>
</div>

<style>
    .k-card-header {
        flex: 0 0 auto;
    }

    .k-card-body {
        overflow: auto;
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