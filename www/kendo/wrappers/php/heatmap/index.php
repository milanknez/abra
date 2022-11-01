<?php
require_once '../lib/Kendo/Autoload.php';
require_once '../include/header.php';

$series = new \Kendo\Dataviz\UI\ChartSeriesItem();
$series->name('Commits added per day')
           ->tooltip(array('visible' => true, 'template' => "<b>#=dataItem[0]#</b> added <b>#=dataItem[2]#</b> new commits on <b>#=kendo.toString(dataItem[1], 'dd-MM-yyyy')#</b>"))
           ->data(array(
                array("Cully", new DateTime("07/07/2021"), 4),
                array("Cully", new DateTime("07/06/2021"), 20),
                array("Cully", new DateTime("07/05/2021"), 11),
                array("Cully", new DateTime("07/04/2021"), 8),
                array("Cully", new DateTime("07/03/2021"), 15),
                array("Cully", new DateTime("07/02/2021"), 14),
                array("Cully", new DateTime("07/01/2021"), 3),
                array("Maria", new DateTime("07/07/2021"), 8),
                array("Maria", new DateTime("07/06/2021"), 5),
                array("Maria", new DateTime("07/05/2021"), 13),
                array("Maria", new DateTime("07/04/2021"), 14),
                array("Maria", new DateTime("07/03/2021"), 15),
                array("Maria", new DateTime("07/02/2021"), 2),
                array("Maria", new DateTime("07/01/2021"), 4),
                array("Idell", new DateTime("07/07/2021"), 15),
                array("Idell", new DateTime("07/06/2021"), 1),
                array("Idell", new DateTime("07/05/2021"), 4),
                array("Idell", new DateTime("07/04/2021"), 19),
                array("Idell", new DateTime("07/03/2021"), 7),
                array("Idell", new DateTime("07/02/2021"), 17),
                array("Idell", new DateTime("07/01/2021"), 12),
                array("Joe", new DateTime("07/07/2021"), 7),
                array("Joe", new DateTime("07/06/2021"), 17),
                array("Joe", new DateTime("07/05/2021"), 4),
                array("Joe", new DateTime("07/04/2021"), 9),
                array("Joe", new DateTime("07/03/2021"), 24),
                array("Joe", new DateTime("07/02/2021"), 4),
                array("Joe", new DateTime("07/01/2021"), 6),
                array("Boyd", new DateTime("07/07/2021"), 3),
                array("Boyd", new DateTime("07/06/2021"), 20),
                array("Boyd", new DateTime("07/05/2021"), 6),
                array("Boyd", new DateTime("07/04/2021"), 4),
                array("Boyd", new DateTime("07/03/2021"), 11),
                array("Boyd", new DateTime("07/02/2021"), 0),
                array("Boyd", new DateTime("07/01/2021"), 19),
                array("Curtis", new DateTime("07/07/2021"), 20),
                array("Curtis", new DateTime("07/06/2021"), 13),
                array("Curtis", new DateTime("07/05/2021"), 7),
                array("Curtis", new DateTime("07/04/2021"), 12),
                array("Curtis", new DateTime("07/03/2021"), 1),
                array("Curtis", new DateTime("07/02/2021"), 16),
                array("Curtis", new DateTime("07/01/2021"), 16),
                array("Tom", new DateTime("07/07/2021"), 4),
                array("Tom", new DateTime("07/06/2021"), 3),
                array("Tom", new DateTime("07/05/2021"), 19),
                array("Tom", new DateTime("07/04/2021"), 2),
                array("Tom", new DateTime("07/03/2021"), 21),
                array("Tom", new DateTime("07/02/2021"), 10),
                array("Tom", new DateTime("07/01/2021"), 7)
           ));

$xAxis = new \Kendo\Dataviz\UI\ChartXAxisItem();
$xAxis->categories(array('Cully', 'Maria', 'Idell', 'Joe', 'Boyd', 'Curtis', 'Tom'));

$yAxis = new \Kendo\Dataviz\UI\ChartYAxisItem();
$yAxis->categories(array(new DateTime("07/01/2021"), new DateTime("07/02/2021"), new DateTime("07/03/2021"), new DateTime("07/04/2021"), new DateTime("07/05/2021"), new DateTime("07/06/2021"), new DateTime("07/07/2021")));

$chart = new \Kendo\Dataviz\UI\Chart('chart');
$chart->legend(array('position' => 'bottom'))
      ->seriesDefaults(array('type' => 'heatmap'))
      ->addXAxisItem($xAxis)
      ->addYAxisItem($yAxis)
      ->addSeriesItem($series)
      ->zoomable(true)
      ->pannable(true);
?>
<div class="demo-section k-content wide">
<?php
echo $chart->render();
?>
</div>

<?php require_once '../include/footer.php'; ?>
