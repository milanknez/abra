<?php
require_once '../lib/Kendo/Autoload.php';

require_once '../include/header.php';

$transport = new \Kendo\Data\PivotDataSourceTransport();

$connection = new \Kendo\Data\PivotDataSourceTransportConnection();

$connection->catalog('Adventure Works DW 2008R2')
            ->cube('Adventure Works');

$transport ->read('https://demos.telerik.com/olap/msmdpump.dll')
            ->connection($connection)
            ->discover($discover);

$dateColumn = new \Kendo\Data\PivotDataSourceColumn();
$dateColumn->name('[Date].[Calendar]')
            ->expand(true);

$productColumn = new \Kendo\Data\PivotDataSourceColumn();
$productColumn->name('[Product].[Category]');

$geograpyRow = new \Kendo\Data\PivotDataSourceRow();
$geograpyRow->name('[Geography].[City]')
            ->expand(true);

$dataSource = new \Kendo\Data\PivotDataSource();

$dataSource->transport($transport)
            ->type("xmla")
            ->addColumn($dateColumn, $productColumn)
            ->addRow($geograpyRow)
            ->addMeasure('[Measures].[Reseller Freight Cost]');

$pivotgrid = new \Kendo\UI\PivotGridV2('pivotgrid');
$pivotgrid->dataSource($dataSource)
    ->height(700)
    ->configurator('#configurator');

$configurator = new \Kendo\UI\PivotConfiguratorV2('configurator');
$configurator->filterable(true)
             ->sortable(true);

?>

<div id="container">
<?php
$pivotcontainer = new \Kendo\UI\PivotContainer('#container');
$configuratorButton = new \Kendo\UI\PivotConfiguratorButton("button");
$configuratorButton ->configurator("configurator");

echo $configuratorButton->render();
echo $configurator->render();
echo $pivotgrid->render();
echo $pivotcontainer->render();
?>
</div>
<?php require_once '../include/footer.php'; ?>
