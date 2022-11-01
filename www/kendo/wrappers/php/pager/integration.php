<?php
require_once '../lib/Kendo/Autoload.php';

require_once '../include/header.php';

require_once '../include/header.php';

$pager = new \Kendo\UI\Pager('pager');

$pager->dataSourceId("datasource1");
$pager->buttonCount(5);

$grid = new \Kendo\UI\Grid('grid');

$orderID = new \Kendo\UI\GridColumn();
$orderID->field('OrderID')
            ->filterable(false)
            ->title('Order ID');

$freight = new \Kendo\UI\GridColumn();
$freight->field('Freight')
          ->title('Freight');

$orderDate = new \Kendo\UI\GridColumn();
$orderDate->field('OrderDate')
          ->format('{0:MM/dd/yyyy}')
          ->title('OrderDate');

$shipName = new \Kendo\UI\GridColumn();
$shipName->field('ShipName')
          ->title('Ship Name');

$shipCity= new \Kendo\UI\GridColumn();
$shipCity->field('ShipCity')
          ->title('Ship City');

$grid->addColumn($orderID, $freight, $orderDate, $shipName, $shipCity)
     ->sortable(true)
     ->height(550)
     ->filterable(true);
?>

<?php
echo $pager->render();
echo $grid->render();
?>

<script>
    var datasource1 = new kendo.data.DataSource({
        type: "odata",
        transport: {
            read: "https://demos.telerik.com/kendo-ui/service/Northwind.svc/Orders"
        },
        schema: {
            model: {
                fields: {
                    OrderID: { type: "number" },
                    Freight: { type: "number" },
                    ShipName: { type: "string" },
                    OrderDate: { type: "date" },
                    ShipCity: { type: "string" }
                }
            }
        },
        pageSize: 20,
        serverPaging: true,
        serverFiltering: true,
        serverSorting: true
    });

    $(document).ready(function () {
        $("#grid").getKendoGrid().setOptions({ dataSource: datasource1 });
    });
</script>

<?php require_once '../include/footer.php'; ?>
