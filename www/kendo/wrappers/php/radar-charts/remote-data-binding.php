<?php
require_once '../lib/Kendo/Autoload.php';
require_once '../include/chart_data.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header('Content-Type: application/json');

    $result = chart_budget_report();

    echo json_encode($result);

    exit;
}

require_once '../include/header.php';

$budget = new \Kendo\Dataviz\UI\ChartSeriesItem();
$budget->field('budget')
       ->categoryField('unit')
	   ->name('Budget');

$spending = new \Kendo\Dataviz\UI\ChartSeriesItem();
$spending->field('spending')
         ->categoryField('unit')
		 ->name('Spending');

$valueAxis = new \Kendo\Dataviz\UI\ChartValueAxisItem();
$valueAxis->labels(array('template' => '$#= value / 1000 #k'));

$transport = new \Kendo\Data\DataSourceTransport();
$transport->read(array('url' => 'remote-data-binding.php', 'type' => 'POST', 'dataType' => 'json'));

$dataSource = new \Kendo\Data\DataSource();
$dataSource->transport($transport);

$chart = new \Kendo\Dataviz\UI\Chart('chart');
$chart->title(array('text' => 'Budget report'))
      ->dataSource($dataSource)
      ->addSeriesItem($budget, $spending)
      ->addValueAxisItem($valueAxis)
      ->seriesDefaults(array('type' => 'radarLine'));
?>
<div class="demo-section k-content wide">
<?php
echo $chart->render();
?>
</div>
<?php require_once '../include/footer.php'; ?>
