<?php
require_once '../lib/Kendo/Autoload.php';
require_once '../include/chart_data.php';
require_once '../include/header.php';

$proteins = new \Kendo\Dataviz\UI\ChartSeriesItem();
$proteins->name('Proteins')
         ->type('radarColumn')
         ->field('score')
         ->categoryField('abbr');

$valueAxis = new \Kendo\Dataviz\UI\ChartValueAxisItem();
$valueAxis->visible(false);

$dataSource = new \Kendo\Data\DataSource();
$dataSource->data(chart_protein_data());

$chart = new \Kendo\Dataviz\UI\Chart('chart');
$chart->title(array('text' => 'Protein quality, Apple raw'))
      ->dataSource($dataSource)
      ->addSeriesItem($proteins)
      ->addValueAxisItem($valueAxis)
      ->tooltip(array('visible' => true))
      ->legend(array('visible' => false));
?>
<div class="demo-section k-content wide">
<?php
echo $chart->render();
?>
</div>
<?php require_once '../include/footer.php'; ?>
