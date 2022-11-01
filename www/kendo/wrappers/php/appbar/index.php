<?php

require_once '../lib/Kendo/Autoload.php';
require_once '../include/header.php';

?>
<script src="../content/shared/js/products.js"></script>
<script>
    window.dataSource1 = new kendo.data.DataSource({
        change: function (e) {
            updateChart(e.sender);
        },
        data: products,
        group: [
            {
                field: "Category.CategoryName", aggregates: [
                    { field: "UnitPrice", aggregate: "average" }
                ]
            }
        ],
        aggregates: [
            { field: "UnitPrice", aggregate: "average" }
        ],
        schema: {
            model: {
                id: "ProductID",
                fields: {
                    ProductID: { editable: false, nullable: true },
                    ProductName: { validation: { required: true } },
                    Category: { defaultValue: { CategoryID: 1, CategoryName: "Beverages" } },
                    UnitPrice: { type: "number", validation: { required: true, min: 1 } }
                }
            }
        }
    });
</script>
<script id="search-template" type="text/x-kendo-tmpl">
    <span class="k-textbox k-display-flex">
        <input autocomplete="off" placeholder="Search..." title="Search..." class="k-input">
        <span class="k-input-icon">
            <span class="k-icon k-i-search"></span>
        </span>
    </span>
</script>
<?php

    $appbar = new \Kendo\UI\AppBar('appbar');

    $menu = new \Kendo\UI\AppBarItem();
    $menu->type('contentItem')
        ->template('<a class="k-button" href="\\#"><span class="k-icon k-i-menu"></span></a>');

    $separator = new \Kendo\UI\AppBarItem();
    $separator->type('spacer')
        ->width('16px');

    $title = new \Kendo\UI\AppBarItem();
    $title->type('contentItem')
        ->template('<h3 class="title">AppBar Demo</h3>');

    $searchCancel = new \Kendo\UI\AppBarItem();
    $searchCancel->type('contentItem')
        ->template('<a class="k-button k-clear-search" href="\\#">Clear search</a>');

    $search = new \Kendo\UI\AppBarItem();
    $search->type('contentItem')
        ->templateId('search-template');

    $narrowSeparator =  new \Kendo\UI\AppBarItem();
    $narrowSeparator->type('spacer')
            ->width('8px');

    $saturation =new \Kendo\UI\AppBarItem();
    $saturation->type('contentItem')
        ->template('<a class="k-button k-toggle-button" href="\\#"><span class="k-icon k-i-saturation"></span></a>');

    $appbar->addItem($menu, $separator, $title, $separator, $searchCancel, $separator, $search, $narrowSeparator, $saturation);

    echo $appbar->render();
?>
<?php
    $grid = new \Kendo\UI\Grid('grid');

    $productName = new \Kendo\UI\GridColumn();
    $productName->field('ProductName')
                ->title('Product Name');

    $category = new \Kendo\UI\GridColumn();
    $category->field('Category')
                ->width('180px')
                ->template("#=Category.CategoryName#")
                ->title('Category');

    $unitPrice = new \Kendo\UI\GridColumn();
    $unitPrice->field('UnitPrice')
                ->format('{0:c}')
                ->width('180px')
                ->groupFooterTemplate("Average #=kendo.toString(average, 'n2')#")
                ->aggregates(array('average'))
                ->title('Unit Price');

    $grid->addColumn($productName, $category, $unitPrice);

    $series = new \Kendo\Dataviz\UI\ChartSeriesItem();
    $series->type('pie')
           ->startAngle(150)
            ->labels(array(
                'visible' => true,
                'background' => 'transparent',
                'position' => 'outsideEnd',
                'template' => '#= category #: \n $#= value#'
            ));
    
    $chart = new \Kendo\Dataviz\UI\Chart('chart');
    
    $chart->title(array('position' => 'bottom', 'text' => 'Average unit price by product`s category'))
          ->addSeriesItem($series)
          ->chartArea(array('background' => 'transparent'))
          ->legend(array('visible' => false))
          ->tooltip(array('visible' => true, 'format'=>'${0}'));
    ?>
<div class='controls-container'>
<?php
    echo $chart->render();
    echo $grid->render();
?>

</div>
<script>
    $(document).ready(function () {
        var grid = $("#grid").data("kendoGrid");
        grid.setDataSource(dataSource1);

        $("#appbar").on("input", "input.k-input", function (e) {
            var input = e.currentTarget;
            var grid = $("#grid").getKendoGrid();
            clearTimeout(grid.searchTimeOut);
            grid.searchTimeOut = setTimeout(function () {
                grid.searchTimeOut = null;
                var expression = { filters: [], logic: "or" };
                var value = input.value;

                if (value) {
                    expression.filters.push({ field: "ProductName", operator: "contains", value: value });
                } else {
                    expression = {};
                }

                grid.dataSource.filter(expression);

            }, 300);
            }).on("click", ".k-button", function (e) {
                e.preventDefault();
            }).on("click", ".k-clear-search", function (e) {
                $("#appbar input.k-input").val("").trigger("input");
            }).on("click", ".k-toggle-button", function (e) {
                var chartElement = $("#chart");
                var gridElement = $("#grid");

                if (chartElement.is(":visible")) {
                    chartElement.hide();
                    gridElement.css("width", "100%");
                } else {
                    chartElement.show();
                    gridElement.css("width", "");
                }
            });
        });

    function updateChart(dataSource) {
        var dataItems = dataSource.view();
        var data = [];
        dataItems.forEach(function (group) {
            var aggregateValue = group.aggregates["UnitPrice"].average.toFixed(2);
            data.push({ category: group.value, value: aggregateValue });
        })

        var chart = $("#chart").data("kendoChart");
        var options = chart.options;
        options.series[0].data = data;
        chart.setOptions(options); 
    }

</script>

<style>
    #grid, #chart {
        width: 50%;
        height: 650px;
    }

    #demo-runner {
        padding:0px;
    }

    .title {
        font-size: 18px;
        margin: 0;
    }

    .controls-container {
        display: flex;
    }

    .k-display-flex {
        display: flex;
        width: 250px;
    }

    .k-appbar .k-button {
        border-style: none;
        background-color: inherit;
    }
</style>
<?php require_once '../include/footer.php'; ?>