<?php
require_once '../lib/Kendo/Autoload.php';
require_once '../include/chart_data.php';
require_once '../include/header.php';
?>
<div class="demo-section k-content wide">
<?php
$wins = new \Kendo\Dataviz\UI\ChartSeriesItem();
$wins->field('win')
     ->categoryField('year')
     ->noteTextField('extremum')
     ->notes(array('position' => 'bottom', 'label' => array('position' => 'outside')))
     ->name('Wins');

$losses = new \Kendo\Dataviz\UI\ChartSeriesItem();
$losses->field('loss')
       ->categoryField('year')
       ->name('Losses');

$valueAxis = new \Kendo\Dataviz\UI\ChartValueAxisItem();
$valueAxis->line(array('visible' => false));

$categoryAxis = new \Kendo\Dataviz\UI\ChartCategoryAxisItem();
$categoryAxis->majorGridLines(array('visible' => false));

$tooltip = new \Kendo\Dataviz\UI\ChartTooltip();
$tooltip->visible(true)
        ->template('#= category # - #= value #%');

$dataSource = new \Kendo\Data\DataSource();
$dataSource->data(chart_grand_slam());

$chart = new \Kendo\Dataviz\UI\Chart('chart');
$chart->title(array('text' => 'Roger Federer Grand Slam tournament performance'))
      ->dataSource($dataSource)
      ->legend(array('position' => 'bottom'))
      ->addSeriesItem($wins, $losses)
      ->addValueAxisItem($valueAxis)
      ->addCategoryAxisItem($categoryAxis)
      ->seriesDefaults(array(
          'type' => 'line'
      ))
      ->tooltip($tooltip);

echo $chart->render();
?>
</div>
<?php require_once '../include/footer.php'; ?>
