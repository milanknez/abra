<?php
require_once '../lib/Kendo/Autoload.php';
require_once '../include/chart_data.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header('Content-Type: application/json');

    $result = download_speeds();

    echo json_encode($result);

    exit;
}

require_once '../include/header.php';
?>
<div class="demo-section k-content wide">
<?php
$wifi = new \Kendo\Dataviz\UI\ChartSeriesItem();
$wifi->fromField('wifiFrom')
	 ->toField('wifiTo')
     ->categoryField('day')
     ->name('WiFi');

$optical = new \Kendo\Dataviz\UI\ChartSeriesItem();
$optical->fromField('opticalFrom')
		->toField('opticalTo')
        ->categoryField('day')
        ->name('Optical');

$tooltip = new \Kendo\Dataviz\UI\ChartTooltip();
$tooltip->visible(true)
        ->template("#= value.from # - #= value.to #");

$transport = new \Kendo\Data\DataSourceTransport();
$transport->read(array('url' => 'remote-data-binding.php', 'type' => 'POST', 'dataType' => 'json'));

$dataSource = new \Kendo\Data\DataSource();
$dataSource->transport($transport);

$chart = new \Kendo\Dataviz\UI\Chart('chart');
$chart->title(array('text' => 'Transfer speed Mbit/s'))
	  ->dataSource($dataSource)
      ->legend(array('position' => 'top'))
      ->addSeriesItem($wifi, $optical)
      ->seriesDefaults(array('type' => 'rangeColumn'))
      ->tooltip($tooltip);

echo $chart->render();
?>
</div>
<?php require_once '../include/footer.php'; ?>