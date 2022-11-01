<?php

require_once '../lib/Kendo/Autoload.php';
require_once '../include/header.php';

?>

<script id="new-customers" type="text/x-kendo-template">
    <div class="info-container">
    <a class='k-button k-button-icon k-flat k-close-button'><span class='k-icon k-i-close'></span></a>
        <img src="../content/web/TileLayout/arrow_up_512x512.png" class="arrow-class" />
        <div class="info-holder">
            <span class="item-values">35445</span>
            <span class="text-indicator">New customers</span>
        </div>
    </div>
</script>

<script id="returning-customers" type="text/x-kendo-template">
    <a class='k-button k-button-icon k-flat k-close-button'><span class='k-icon k-i-close'></span></a>
    <?php
            $seriesItem = new \Kendo\Dataviz\UI\ChartSeriesItem();
            $seriesItem->data(array(17, 32, 50));

            $chart = new \Kendo\Dataviz\UI\Chart('returning-chart');
            $chart
                ->legend(array('visible' => false))
                ->seriesDefaults(array('type' => 'pie'))
                ->addSeriesItem($seriesItem)
                ->attr('style', 'height: 100%; width: 100%;');

            echo $chart->renderInTemplate();
        ?>

    <div class="info-container">
        <div class="info-holder">
            <span class="item-values">17% <img src="../content/web/TileLayout/target_512x512.png" class="arrow-class" /></span>
            <span class="text-indicator">Returning customers</span>
        </div>
    </div>
</script>

<script id="new-deals" type="text/x-kendo-template">
    <a class='k-button k-button-icon k-flat k-close-button'><span class='k-icon k-i-close'></span></a>

    <?php
            $seriesItem = new \Kendo\Dataviz\UI\ChartSeriesItem();
            $seriesItem->data(array(22, 34, 44));

            $chart = new \Kendo\Dataviz\UI\Chart('new-deals-chart');
            $chart
                ->legend(array('visible' => false))
                ->seriesDefaults(array('type' => 'pie'))
                ->addSeriesItem($seriesItem)
                ->attr('style', 'height: 100%; width: 100%;');

            echo $chart->renderInTemplate();
        ?>

    <div class="info-container">
        <div class="info-holder">
            <span class="item-values">50% <img src="../content/web/TileLayout/handshake_512x512.png" class="arrow-class" /></span>
            <span class="text-indicator">New deals this year</span>
        </div>
    </div>
</script>

<script id="new-visitors" type="text/x-kendo-template">
    <a class='k-button k-button-icon k-flat k-close-button'><span class='k-icon k-i-close'></span></a>
    <div class="info-container">
        <div class="info-holder">
            <span class="item-values">91694</span>
            <span class="text-indicator">New visitors this year</span>
        </div>
    </div>
</script>

<script id="chart-template" type="text/x-kendo-template">
<?php
        $bargainHunters = new \Kendo\Dataviz\UI\ChartSeriesItem();
        $bargainHunters->name('Bargain hunters (close)')
            ->data(array(5600, 6300, 7400, 9100, 11700, 13800, 11200, 11900, 12400, 11000, 12900, 13900));

        $new = new \Kendo\Dataviz\UI\ChartSeriesItem();
        $new->name('New (close)')
            ->data(array(5200, 3400, 2300, 4800, 6700, 8300, 8000, 7500, 8600, 9000, 8100, 9100));

        $returning = new \Kendo\Dataviz\UI\ChartSeriesItem();
        $returning->name('Returning (close)')
                ->data(array(5200, 3400, 2300, 4800, 6700, 8300, 7900, 8000, 8400, 9000, 9100, 10100));

        $cateogrySeriesAxis = new \Kendo\Dataviz\UI\ChartCategoryAxisItem();
        $cateogrySeriesAxis->name("series-axis");

        $categoryLabelsAxis = new \Kendo\Dataviz\UI\ChartCategoryAxisItem();
        $categoryLabelsAxis->name("series-labels")
                ->categories(array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"));

        $valueAxis = new \Kendo\Dataviz\UI\ChartValueAxisItem();
        $valueAxis->labels(array('format' => '{0}', 'skip => 2', 'step => 3'));

        $chart = new \Kendo\Dataviz\UI\Chart('chart');
        $chart->legend(array('position' => 'bottom'))
            ->addSeriesItem($bargainHunters, $new, $returning)
            ->addValueAxisItem($valueAxis)
            ->addCategoryAxisItem($cateogrySeriesAxis)
            ->addCategoryAxisItem($categoryLabelsAxis)
            ->seriesDefaults(array('type' => 'column'));

            echo $chart->renderInTemplate();
?>
</script>


<script id="expense" type="text/x-kendo-template">
    <a class='k-button k-button-icon k-flat k-close-button'><span class='k-icon k-i-close'></span></a>
    <div class="info-container">
        <img src="../content/web/TileLayout/arrow_down_512x512.png" class="arrow-class" />
        <div class="info-holder">
            <span class="item-values">$973</span>
            <span class="text-indicator">Expense this period</span>
        </div>
    </div>
</script>

<script id="income" type="text/x-kendo-template">
    <a class='k-button k-button-icon k-flat k-close-button'><span class='k-icon k-i-close'></span></a>
    <div class="info-container">
        <img src="../content/web/TileLayout/arrow_up_512x512.png" class="arrow-class" />
        <div class="info-holder">
            <span class="item-values">$5890</span>
            <span class="text-indicator">Income this period</span>
        </div>
    </div>
</script>

<script id="deals" type="text/x-kendo-template">
    <a class='k-button k-button-icon k-flat k-close-button'><span class='k-icon k-i-close'></span></a>
    <div class="info-container">
        <img src="../content/web/TileLayout/arrow_up_512x512.png" class="arrow-class" />
        <div class="info-holder">
            <span class="item-values">2745</span>
            <span class="text-indicator">Total deals</span>
        </div>
    </div>
</script>



<div class="k-content wide" style="display: flex;">

<?php
    $tilelayout = new \Kendo\UI\TileLayout("mainLayout");

    $tilelayout->columns(6);
    $tilelayout->columnsWidth(210);
    $tilelayout->rowsHeight(150);
    $tilelayout->width(1000);

    $container1 = new \Kendo\UI\TileLayoutContainer();
    $container1->bodyTemplateId("income")
                ->colSpan(2)
                ->rowSpan(1);

    $tilelayout ->addContainer($container1);

    $container2 = new \Kendo\UI\TileLayoutContainer();
    $container2->bodyTemplateId("expense")
                ->colSpan(2)
                ->rowSpan(1);

    $tilelayout->addContainer($container2);

    $container3 = new \Kendo\UI\TileLayoutContainer();
    $container3->bodyTemplateId("deals")
                ->colSpan(2)
                ->rowSpan(1);

    $tilelayout->addContainer($container3);

    $header = new \Kendo\UI\TileLayoutContainerHeader();
    $header->text("Customer Growth");

    $container4 = new \Kendo\UI\TileLayoutContainer();
    $container4->bodyTemplateId("chart-template")
                ->colSpan(6)
                ->rowSpan(2)
                ->header($header);

    $tilelayout->addContainer($container4);

    echo $tilelayout->render();
?>

<?php
    $tilelayout = new \Kendo\UI\TileLayout("sideLayout");

    $tilelayout->columns(1);
    $tilelayout->rowsHeight(150);
    $tilelayout->width(350);

    $container1 = new \Kendo\UI\TileLayoutContainer();
    $container1->bodyTemplateId("new-customers")
                ->colSpan(1)
                ->rowSpan(1);

    $tilelayout ->addContainer($container1);

    $container2 = new \Kendo\UI\TileLayoutContainer();
    $container2->bodyTemplateId("returning-customers")
                ->colSpan(1)
                ->rowSpan(1);

    $tilelayout->addContainer($container2);

    $container3 = new \Kendo\UI\TileLayoutContainer();
    $container3->bodyTemplateId("new-deals")
                ->colSpan(2)
                ->rowSpan(1);

    $tilelayout->addContainer($container3);

    $container4 = new \Kendo\UI\TileLayoutContainer();
    $container4->bodyTemplateId("new-visitors")
                ->colSpan(6)
                ->rowSpan(2);

    $tilelayout->addContainer($container4);

    echo $tilelayout->render();
?>

</div>
</div>

<script>
    var originalElement;
    var dropHint;

    var draggable = new kendo.ui.Draggable($("#sideLayout"), {
        filter: ".k-tilelayout-item",
        autoScroll: true,
        group: "kendo-demo",
        hint: function (target) {
            var item = target;
            var width = item.width();
            var height = item.height();
            var clone = item.clone();

            clone.find(".k-button").hide();
            return clone.width(width).height(height);
        },
        dragstart: function (e) {
            originalElement = $(e.currentTarget).closest(".k-tilelayout-item");
            originalElement.addClass("k-state-active");
        },
        drag: function (e) {
            var elementUnderCursor = kendo.elementUnderCursor(e);
            var hint = e.sender.hint;
            var dropContainer;
            var containerBoundaries;
            var pixelsToLeftBorder;
            var pixelsToRightBorder;
            var direction;
            var newOrder;
            var clone;

            if (containsOrEqualTo(hint[0], elementUnderCursor)) {
                hint.hide();

                elementUnderCursor = kendo.elementUnderCursor(e);

                if (!containsOrEqualTo($("#sideLayout")[0], elementUnderCursor)) {

                    dropContainer = $(elementUnderCursor);
                    dropContainer = dropContainer.hasClass("k-tilelayout-item") ? dropContainer : dropContainer.closest(".k-tilelayout-item.k-card");

                    if (dropContainer.hasClass("k-tilelayout-item")) {
                        containerBoundaries = dropContainer[0].getBoundingClientRect();
                        pixelsToLeftBorder = e.clientX - containerBoundaries.left;
                        pixelsToRightBorder = containerBoundaries.right - e.clientX;
                        direction = pixelsToLeftBorder > pixelsToRightBorder ? "right" : "left";
                        newOrder = dropContainer.css("order");

                        if (dropHint && dropHint.attr("direction") !== direction) {
                            clone = dropHint.clone();
                            clone.css("order", newOrder);
                            dropHint.remove();
                            dropHint = clone;

                            insertHint(dropHint, dropContainer, direction);

                            dropHint.attr("direction", direction);
                        }
                    }
                }
                hint.show();
            }
        },
        dragend: function (e) {
            var mainLayout = $("#mainLayout").data("kendoTileLayout");
            var sideLayout = $("#sideLayout").data("kendoTileLayout");

            originalElement.removeClass("k-state-active");

            if (!dropHint) {
                return;
            }
            var newOrder = dropHint.index();
            var container = e.currentTarget.closest(".k-tilelayout-item.k-card");
            var itemId = container.attr("id");
            var mainItems = mainLayout.items;
            var item = sideLayout.itemsMap[itemId];
            var sideItems = sideLayout.items;

            dropHint.remove();
            e.sender.hint.remove();
            dropHint = null;

            item.colSpan = 2;

            mainItems.splice(newOrder, 0, item);

            sideItems.splice(sideItems.indexOf(item), 1);

            recreateSetup(mainItems, sideItems);
        }
    });

    $("#mainLayout").kendoDropTargetArea({
        filter: ".k-tilelayout-item",
        group: "kendo-demo",
        dragenter: function (e) {
            var dropContainer = $(e.dropTarget);
            var dropContainerBoundaries;
            var pixelsToLeftBorder;
            var pixelsToRightBorder;
            var direction;

            if (originalElement[0] != dropContainer[0]) {

                dropContainerBoundaries = dropContainer[0].getBoundingClientRect();
                pixelsToLeftBorder = e.clientX - dropContainerBoundaries.left;
                pixelsToRightBorder = dropContainerBoundaries.right - e.clientX;
                direction = pixelsToLeftBorder > pixelsToRightBorder ? "right" : "left";

                if (dropHint) {
                    dropHint.remove();
                    dropHint = null;
                }

                originalElement.hide();

                dropHint = createDropHint(dropContainer.css("order"));

                originalElement.hide();

                insertHint(dropHint, dropContainer, direction);
            }
        }
    });

    $("#mainLayout").on("click", ".k-button", function (e) {
        var mainLayout = $("#mainLayout").data("kendoTileLayout");
        var sideLayout = $("#sideLayout").data("kendoTileLayout");
        var itemId = $(e.currentTarget).closest(".k-tilelayout-item").attr("id");
        var mainItems = mainLayout.items;
        var sideItems = sideLayout.items;
        var item = mainLayout.itemsMap[itemId];

        mainItems.splice(mainItems.indexOf(item), 1);
        sideItems.push(item);

        item.colSpan = 1;

        recreateSetup(mainItems, sideItems);
    });

    function createDropHint(order) {
        return $("<div class='k-layout-item-hint k-layout-item-hint-reorder'></div>")
            .css({
                "order": order,
                "grid-column-end": "span 2",
                "grid-row-end": "span 1"
            });
    }

    function insertHint(dropHint, dropContainer, direction) {
        if (direction == "right") {
            dropHint.insertAfter(dropContainer);
        } else {
            dropHint.insertBefore(dropContainer);
        }
    }

    function containsOrEqualTo(parent, child) {
        try {
            return $.contains(parent, child) || parent == child;
        } catch (e) {
            return false;
        }
    }

    function recreateSetup(mainItems, sideItems) {
        var mainLayout = $("#mainLayout").data("kendoTileLayout");
        var sideLayout = $("#sideLayout").data("kendoTileLayout");
        for (var i = 0; i < Math.max(mainItems.length, sideItems.length); i++) {
            if (mainItems[i]) {
                mainItems[i].order = i;
            }
            if (sideItems[i]) {
                sideItems[i].order = i;
            }
        }

        mainLayout.setOptions({ containers: mainItems });
        sideLayout.setOptions({ containers: sideItems });

        $("#chart").data("kendoChart").resize()
        $("#new-deals-chart").data("kendoChart").refresh();
        $("#returning-chart").data("kendoChart").refresh();
    }


    $(window).on("resize", function () {
        kendo.resize($(".k-card-body"));
    });
</script>

<style>
    .arrow-class {
        width: 36px;
        vertical-align: bottom;
        align-self: center;
    }

    .close-button {
        float: right;
    }

    .item-values {
        color: #00000099;
        font-size: 25px;
        font-weight: bold;
    }

    .info-container {
        display: flex;
        align-items: start;
    }

    .info-holder {
        margin-left: 10px;
        display: inline-flex;
        flex-direction: column;
    }

    .text-indicator {
        text-align: left;
        letter-spacing: 0.14px;
        color: #A2A2A2;
    }

    .k-close-button {
        position: absolute;
        right: 0;
        top: 0;
        margin: 5px;
    }

    .k-card-body {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .k-chart {
        height: 75px;
        width: 75px;
    }

    #sideLayout {
        background-color: #D3D3D3;
        border-left: 2px solid #BCBCBC;
    }

    #mainLayout {
        background-color: #F6F6F6;
    }

    #sideLayout .k-button {
        display: none;
    }

    .k-tilelayout-item:active,
    .k-tilelayout-item.k-state-active {
        opacity: 0.2;
    }

    #chart {
        height: 100%;
        width: 100%;
    }
</style>

<?php require_once '../include/footer.php'; ?>