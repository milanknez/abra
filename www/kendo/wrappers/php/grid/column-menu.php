
<?php
require_once '../lib/DataSourceResult.php';
require_once '../lib/Kendo/Autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header('Content-Type: application/json');

    $request = json_decode(file_get_contents('php://input'));

    $result = new DataSourceResult('sqlite:..//sample.db');

    echo json_encode($result->read('Orders', array('OrderID', 'ShipCountry', 'ShipAddress', 'ShipName', 'EmployeeID'), $request));

    exit;
}

require_once '../include/header.php';

$transport = new \Kendo\Data\DataSourceTransport();

$read = new \Kendo\Data\DataSourceTransportRead();

$read->url('column-menu.php')
     ->contentType('application/json')
     ->type('POST');

$transport->read($read)
          ->parameterMap('function(data) {
              return kendo.stringify(data);
          }');

$model = new \Kendo\Data\DataSourceSchemaModel();

$orderIDField = new \Kendo\Data\DataSourceSchemaModelField('OrderID');
$orderIDField->type('number');

$shipNameField = new \Kendo\Data\DataSourceSchemaModelField('ShipName');
$shipNameField->type('string');

$shipAddressField = new \Kendo\Data\DataSourceSchemaModelField('ShipAddress');
$shipAddressField->type('string');

$shipCountryField = new \Kendo\Data\DataSourceSchemaModelField('ShipCountry');
$shipCountryField->type('string');


$model->addField($orderIDField)
      ->addField($shipNameField)
      ->addField($shipAddressField)
      ->addField($shipCountryField);

$schema = new \Kendo\Data\DataSourceSchema();
$schema->data('data')
       ->model($model)
       ->total('total');

$dataSource = new \Kendo\Data\DataSource();

$dataSource->transport($transport)
           ->pageSize(30)
           ->schema($schema)
           ->serverSorting(true)
           ->serverFiltering(true)
           ->serverPaging(true);

$grid = new \Kendo\UI\Grid('grid');

$orderID = new \Kendo\UI\GridColumn();
$orderID->field('OrderID')
    ->width(120)
    ->title('Order ID');

$shipCountry = new \Kendo\UI\GridColumn();
$shipCountry->field('ShipCountry')
    ->title('Ship Country');

$shipName = new \Kendo\UI\GridColumn();
$shipName->field('ShipName')
    ->title('Ship Name');

$shipAddress = new \Kendo\UI\GridColumn();
$shipAddress->field('ShipAddress')
    ->filterable(false)
    ->title('Ship Address');

$columnMenuGroup1 = new \Kendo\UI\GridColumnMenuColumnsGroup();
$columnMenuGroup1->title('Order ID')
    ->columns(array('OrderID'));

$columnMenuGroup2 = new \Kendo\UI\GridColumnMenuColumnsGroup();
$columnMenuGroup2->title('Address')
    ->columns(array('ShipCountry', 'ShipAddress', 'ShipName'));

$columnMenuColumns = new \Kendo\UI\GridColumnMenuColumns();
$columnMenuColumns->sort(true)
    ->addGroup($columnMenuGroup1)
    ->addGroup($columnMenuGroup2);

$columnMenu = new \Kendo\UI\GridColumnMenu();
$columnMenu->columns($columnMenuColumns);  
$columnMenu->componentType('modern');

$grid->dataSource($dataSource)
    ->addColumn($orderID, $shipCountry, $shipName, $shipAddress)
    ->height(550)
    ->columnMenu($columnMenu)
    ->pageable(true)
    ->sortable(true)
    ->filterable(true);


echo $grid->render();
?>
<div class="configurator">
    <div class="header">
        Configurator
    </div>
    <div class="box-col">
        <h4>Set component  type</h4>
        <?php
            $ddl = new \Kendo\UI\DropDownList('ddl');

            $ddl->value('modern')
                ->change('onChange')
                ->dataSource(array('modern', 'classic'));

            echo $ddl->render();
        ?>
    </div>
    <div class="box-col">
        <h4>Sort the columns in the column menu by</h4>
        <ul class="fieldlist">
            <li>
                <input type="radio" name="sort" id="default" data-value="null" class="k-radio">
                <label class="k-radio-label" for="default">Default</label>
            </li>
            <li>
                <input type="radio" name="sort" id="asc" data-value="asc" class="k-radio" checked="checked">
                <label class="k-radio-label" for="asc">Ascending</label>
            </li>
            <li>
                <input type="radio" name="sort" id="desc" data-value="desc" class="k-radio">
                <label class="k-radio-label" for="desc">Descending</label>
            </li>
        </ul>
    </div>
</div>

<script>
    function onChange() {
        var type = this.value();
        var grid = $("#grid").getKendoGrid();

        grid.setOptions({
            columnMenu: {
                componentType: type
            }
        });
    }

    $(function () {
            $("input[type='radio']").change(function (e) {
                var grid = $("#grid").getKendoGrid();
                var value = $(this).data("value");

                grid.setOptions({
                    columnMenu: {
                        columns: {
                            sort: value
                        }
                    }
                });
            });
    });
</script>
<style>
    .fieldlist {
        margin: 0 0 -1em;
        padding: 0;
    }

    .fieldlist li {
        list-style: none;
        padding-bottom: 1em;
    }
</style>
<?php require_once '../include/footer.php'; ?>
