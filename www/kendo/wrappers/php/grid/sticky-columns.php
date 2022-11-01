<?php
require_once '../lib/DataSourceResult.php';
require_once '../lib/Kendo/Autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header('Content-Type: application/json');

    $request = json_decode(file_get_contents('php://input'));

    $result = new DataSourceResult('sqlite:..//sample.db');

    echo json_encode($result->read('Orders', array('OrderID', 'ShipCountry', 'ShipCity', 'ShipName', 'ShipAddress'), $request));

    exit;
}

require_once '../include/header.php';

$transport = new \Kendo\Data\DataSourceTransport();

$read = new \Kendo\Data\DataSourceTransportRead();

$read->url('frozen-columns.php')
     ->contentType('application/json')
     ->type('POST');

$transport->read($read)
          ->parameterMap('function(data) {
              return kendo.stringify(data);
          }');

$model = new \Kendo\Data\DataSourceSchemaModel();

$orderIDField = new \Kendo\Data\DataSourceSchemaModelField('OrderID');
$orderIDField->type('number');

$shipCountryField = new \Kendo\Data\DataSourceSchemaModelField('ShipCountry');
$shipCountryField->type('string');

$shipCityField = new \Kendo\Data\DataSourceSchemaModelField('ShipCity');
$shipCityField->type('string');

$shipNameField = new \Kendo\Data\DataSourceSchemaModelField('ShipName');
$shipNameField->type('string');

$shipAddressField = new \Kendo\Data\DataSourceSchemaModelField('ShipAddress');
$shipAddressField->type('string');

$model->addField($orderIDField)
      ->addField($shipCountryField)
      ->addField($shipCityField)
      ->addField($shipNameField)
      ->addField($shipAddressField);

$schema = new \Kendo\Data\DataSourceSchema();
$schema->data('data')
       ->model($model)
       ->total('total');

$dataSource = new \Kendo\Data\DataSource();

$dataSource->transport($transport)
           ->pageSize(30)
           ->schema($schema)
           ->serverFiltering(true)
           ->serverSorting(true)
           ->serverGrouping(true)
           ->serverPaging(true);

$grid = new \Kendo\UI\Grid('grid');

$orderID = new \Kendo\UI\GridColumn();
$orderID->field('OrderID')
            ->stickable(true)
            ->width(250)
            ->title('Order ID');

$shipName = new \Kendo\UI\GridColumn();
$shipName->field('ShipName')
          ->sticky(true)
          ->width(400)
          ->title('Ship Name');

$shipCountry = new \Kendo\UI\GridColumn();
$shipCountry->field('ShipCountry')
          ->stickable(true)
          ->width(350)
          ->title('Ship Country');

$shipAddress = new \Kendo\UI\GridColumn();
$shipAddress->field('ShipAddress')
          ->stickable(true)
          ->width(400)
          ->title('Ship Address');

$shipCity= new \Kendo\UI\GridColumn();
$shipCity->field('ShipCity')
          ->stickable(true)
          ->width(350)
          ->title('Ship City');

$grid->addColumn($orderID, $shipName, $shipCountry, $shipAddress, $shipCity)
     ->height(540)
     ->scrollable(true)
     ->dataSource($dataSource)
     ->groupable(true)
     ->reorderable(true)
     ->resizable(true)
     ->columnMenu(true)
     ->sortable(true)
     ->filterable(true)
     ->pageable(true);

echo $grid->render();
?>

<?php require_once '../include/footer.php'; ?>