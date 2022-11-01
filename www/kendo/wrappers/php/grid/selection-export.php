<?php
require_once '../lib/DataSourceResult.php';
require_once '../lib/Kendo/Autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header('Content-Type: application/json');

    $request = json_decode(file_get_contents('php://input'));

    $result = new DataSourceResult('sqlite:..//sample.db');

    echo json_encode($result->read('Orders', array('Freight' => array('type' => 'number') , 'OrderID', 'ShipCity', 'ShipCountry'), $request));

    exit;
}

require_once '../include/header.php';

$contextMenu = new \Kendo\UI\ContextMenu('contextmenu');

$copy = new \Kendo\UI\ContextMenuItem("Copy");
$copyWithHeaders = new \Kendo\UI\ContextMenuItem("Copy with Headers");
$export = new \Kendo\UI\ContextMenuItem("Export");
$exportWithHeaders = new \Kendo\UI\ContextMenuItem("Export with Headers");
$exportChart = new \Kendo\UI\ContextMenuItem("Export to Chart");

$contextMenu->dataSource(array(
	$copy, $copyWithHeaders, $export, $exportWithHeaders, $exportChart
))
->target('.contextMenuIcon')
->showOn('click')
->select("onSelect")
->alignToAnchor(true);

$transport = new \Kendo\Data\DataSourceTransport();

$read = new \Kendo\Data\DataSourceTransportRead();

$read->url('selection-export.php')
     ->contentType('application/json')
     ->type('POST');

$transport->read($read)
          ->parameterMap('function(data) {
              return kendo.stringify(data);
          }');

$model = new \Kendo\Data\DataSourceSchemaModel();

$shipCountryField = new \Kendo\Data\DataSourceSchemaModelField('ShipCountry');
$shipCountryField->type('string');

$shipCityField = new \Kendo\Data\DataSourceSchemaModelField('ShipCity');
$shipCityField->type('string');

$orderIDField = new \Kendo\Data\DataSourceSchemaModelField('OrderID');
$orderIDField->type('number');

$freightField = new \Kendo\Data\DataSourceSchemaModelField('Freight');
$freightField->type('number');

$model->addField($shipCountryField)
      ->addField($freightField)
      ->addField($orderIDField)
      ->addField($shipCityField);

$schema = new \Kendo\Data\DataSourceSchema();
$schema->data('data')
       ->model($model)
       ->total('total');

$dataSource = new \Kendo\Data\DataSource();

$dataSource->transport($transport)
           ->pageSize(15)
           ->schema($schema)
           ->serverFiltering(true)
           ->serverSorting(true)
           ->serverPaging(true);

$grid = new \Kendo\UI\Grid('grid');

$orderID = new \Kendo\UI\GridColumn();
$orderID->field('OrderID')
            ->width(150)
            ->title('Order ID');

$shipCountry = new \Kendo\UI\GridColumn();
$shipCountry->field('ShipCountry')
          ->width(200)
          ->title('Ship Country');

$shipCity = new \Kendo\UI\GridColumn();
$shipCity->field('ShipCity')
          ->width(200)
          ->title('Ship City');

$freight = new \Kendo\UI\GridColumn();
$freight->field('Freight')
          ->width(200)
          ->title('Freight');

$grid->addColumn($orderID, $shipCountry, $shipCity, $freight)
     ->dataSource($dataSource)
	 ->dataBound("dataBound")
	 ->change("onChange")
     ->sortable(true)
     ->navigatable(true)
     ->selectable('cell multiple')
     ->filterable(true)
     ->mobile(true)
     ->pageable(true);
?>

<script src="https://kendo.cdn.telerik.com/2021.1.224/js/jszip.min.js"></script>

<div class="box wide">
        <p style="margin-bottom: 1em"><b>Information:</b></p>

        <p style="margin-bottom: 1em">
            The grid supports selection of cells, range of cells, combination of cells and ranges, combination of ranges.
        </p>
</div>

<div id="chart-container"></div>
<span class='k-primary k-bg-primary k-icon k-i-menu contextMenuIcon hidden'></span>

<?php
	echo $contextMenu->render();
	echo $grid->render();
?>

<script>
	let initialLoad = 0;

        function dataBound() {
            $(".contextMenuIcon").addClass("hidden");

			if (initialLoad == 0) {
				let grid = this;
			
				/* Select some rows on page load for demo's purpose. */
				for (let i = 4; i < 48; i++) {
					if (i > 23 && i < 36) {
						continue;
					}
				
					grid.select("td:eq(" + i + ")");
				}
			
				initialLoad++;
			}
		}

		/* Handle the Change event of the grid in order to hide the button when no rows are selected. */
        function onChange() {
			let selectedRowLength = this.select().length;

			let contextMenuIcon = $(".contextMenuIcon");
			
			if (selectedRowLength > 0) {
				contextMenuIcon.removeClass("hidden");
			} else {
				contextMenuIcon.addClass("hidden");
			}
		}

		/* Handle the select event of the Context Menu to execute one of the functions when an option is selected. */
        function onSelect(e) {
            var item = e.item.innerText;
			
            switch (item) {
                case "Copy":
                    copySelected();
                    break;
                case "Copy with Headers":
                    copySelectedWithHeaders();
                    break;
                case "Export":
                    exportSelected();
                    break;
                case "Export with Headers":
                    exportSelectedWithHeaders();
                    break;
                case "Export to Chart":
                    exportToChart();
                    break;
                default:
                    break;
            };
        }

        function copySelected() {
            var grid = $("#grid").data("kendoGrid");
            let selected = grid.select();

            if (selected.length === 0) {
                kendo.alert("Please select cells before copying.");
                return;
            }

            grid.copySelectionToClipboard(false);
        }

        function copySelectedWithHeaders() {
            var grid = $("#grid").data("kendoGrid");
            let selected = grid.select();

            if (selected.length === 0) {
                kendo.alert("Please select cells before copying.");
                return;
            }

            grid.copySelectionToClipboard(true);
        }

        function exportSelected() {
            var grid = $("#grid").data("kendoGrid");
            let selected = grid.select();

            if (selected.length === 0) {
                kendo.alert("Please select cells before exporting.");
                return;
            }
            grid.exportSelectedToExcel(false);
        }

        function exportSelectedWithHeaders() {
            var grid = $("#grid").data("kendoGrid");
            let selected = grid.select();

            if (selected.length === 0) {
                kendo.alert("Please select cells before exporting.");
                return;
            }

            grid.exportSelectedToExcel(true);
        }

        function exportToChart() {
            var grid = $("#grid").data("kendoGrid");
            var container = $('#chart-container');
            var windowInstance = $('#chart-container').data('kendoWindow');
            var currInstance = container.find('.k-chart').data('kendoChart');
            var data = grid.getSelectedData();

            if (!data.length) {
                kendo.alert('Please select cells before exporting.');
                return;
            }

            let unknownCountries = $.extend(true, [], data);

            unknownCountries.forEach(function (item, index, array) {
                if (!array[index].ShipCountry) {
                    array[index].ShipCountry = "Unknown"
                }
            });

            if (windowInstance) {
                windowInstance.destroy();
            }

            if (currInstance) {
                currInstance.destroy();
            }

            let windowWidth = data.length > 5 ? data.length * 75 : 500;
            windowInstance = container.kendoWindow({ width: windowWidth }).data('kendoWindow');

            container.empty();
            var element = $('<div></div>').appendTo(container);
            windowInstance.open().center();
            element.kendoChart({
                dataSource: {
                    data: unknownCountries
                },
                series: [{
                    type: "column",
                    field: 'Freight'
                }],
                categoryAxis: { field: "ShipCountry" }
            });
        }
</script>

<style>
    .contextMenuIcon {
        position: absolute;
        right: 300px;
        font-size: 16px;
        padding: 8px;
        cursor: pointer;
        border-radius: 5%;
        color: white;
        margin-top: 35px;
        z-index: 10000;
    }

    .k-grid tbody td {
        line-height: 30px;
    }

    #contextmenu .k-menu-item {
        padding: 4px 8px;
    }

    #contextmenu .k-menu-link {
        font: 400 14px Arial, Helvetica, sans-serif;
    }

    .hidden {
        display: none;
    }
</style>

<?php require_once '../include/footer.php'; ?>