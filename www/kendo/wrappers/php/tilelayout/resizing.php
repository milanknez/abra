<?php
require_once '../lib/DataSourceResult.php';
require_once '../lib/Kendo/Autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header('Content-Type: application/json');

    $request = json_decode(file_get_contents('php://input'));

    $result = new DataSourceResult('sqlite:..//sample.db');

    echo json_encode($result->read('EmployeeDirectory', array('EmployeeID', 'ReportsTo', 'FirstName', 'LastName', 'Position', 'Phone', 'Extension' => array('type' => 'number'), 'Address'), $request));

    exit;
}

require_once '../include/header.php';

$transport = new \Kendo\Data\DataSourceTransport();

$read = new \Kendo\Data\DataSourceTransportRead();

$read->url('resizing.php')
     ->contentType('application/json')
     ->type('POST');

$transport ->read($read)
          ->parameterMap('function(data) {
              return kendo.stringify(data);
          }');

$model = new \Kendo\Data\DataSourceSchemaModel();

$firstNameField = new \Kendo\Data\DataSourceSchemaModelField('FirstName');
$firstNameField->type('string');

$lastNameField = new \Kendo\Data\DataSourceSchemaModelField('LastName');
$lastNameField->type('string');

$positionField = new \Kendo\Data\DataSourceSchemaModelField('Position');
$positionField->type('string');

$phoneField = new \Kendo\Data\DataSourceSchemaModelField('Phone');
$phoneField->type('string');

$extentionField = new \Kendo\Data\DataSourceSchemaModelField('Extension');
$extentionField->type('number');

$addressField = new \Kendo\Data\DataSourceSchemaModelField('Address');
$addressField->type('string');

$employeeIDField = new \Kendo\Data\DataSourceSchemaModelField('EmployeeID');
$employeeIDField->type('number');

$parentIdField = new \Kendo\Data\DataSourceSchemaModelField('parentId');
$parentIdField->from("ReportsTo")
    ->nullable(true)
    ->type('number');

$model->id("EmployeeID")
    ->addField($employeeIDField)
    ->addField($parentIdField)
    ->addField($firstNameField)
    ->addField($lastNameField)
    ->addField($positionField)
    ->addField($phoneField)
    ->addField($extentionField)
    ->addField($addressField);

$schema = new \Kendo\Data\DataSourceSchema();
$schema->data('data')
       ->model($model);

$dataSource = new \Kendo\Data\DataSource();

$dataSource->transport($transport)
           ->schema($schema);
?>

<!-- treelist photo template -->
<script id="photo-template" type="text/x-kendo-template">
    <div class='employee-photo'
        style='background-image: url(../content/web/treelist/people/#:data.EmployeeID#.jpg);'></div>
    <div class='employee-name'>#: FirstName #</div>
</script>

<!-- container templates -->
<script id="treelist-template" type="text/x-kendo-template">
    <?php
        $treeList = new \Kendo\UI\TreeList('treelist');

        $firstName = new \Kendo\UI\TreeListColumn();
        $firstName->field('FirstName')
                    ->title('First Name')
                    ->width(230)
                    ->templateId("photo-template");

        $lastName = new \Kendo\UI\TreeListColumn();
        $lastName->field('LastName')
                    ->title('Last Name')
                    ->width(130);

        $position = new \Kendo\UI\TreeListColumn();
        $position->field('Position')
                  ->width(180);

        $treeList->addColumn($firstName, $lastName, $position)
            ->dataSource($dataSource)
            ->sortable(true)
            ->filterable(true)
            ->attr('style', 'height: 100%');

        echo $treeList->renderInTemplate();
    ?>
</script>
<script id="chart-template" type="text/x-kendo-template">
    <?php
        $companyAverage = new \Kendo\Dataviz\UI\ChartSeriesItem();
        $companyAverage->type('line');
        $companyAverage->name('Company Average');
        $companyAverage->data(array(6, 10, 10, 10, 10, 9, 5, 5, 10, 8, 8, 5, 8, 11, 9, 15, 20, 23, 24, 21, 21, 20, 22, 22, 20, 18, 16, 15, 20, 13.2));

        $planned = new \Kendo\Dataviz\UI\ChartSeriesItem();
        $planned->type('bar');
        $planned->name('Planned');
        $planned->data(array(16.4, 21.7, 35.4, 19, 10.9, 13.6, 10.9, 10.9, 10.9, 16.4, 16.4, 13.6, 13.6, 29.9, 27.1, 16.4, 13.6, 10.9, 16.4, 10.9, 24.5, 10.9, 8.1, 19, 21.7, 27.1, 24.5, 16.4, 27.1, 29.9));

        $completed = new \Kendo\Dataviz\UI\ChartSeriesItem();
        $completed->type('bar');
        $completed->name('Completed');
        $completed->data(array(15.4, 20, 35.4, 13, 12, 16, 13.2, 7.4, 20, 18.2, 20, 17.8, 20.3, 10, 30, 29.3, 20, 13.7, 25.2, 16.5, 10, 17.1, 10, 14.7, 20, 14.8, 10, 12, 20, 13.5));

        $valueAxis = new \Kendo\Dataviz\UI\ChartValueAxisItem();
        $valueAxis->color("transparent");
        $valueAxis->labels(array('color' => '232323'));
        $valueAxis->majorUnit(20);
        $valueAxis->min(0);
        $valueAxis->max(40);

        $categoryAxis = new \Kendo\Dataviz\UI\ChartCategoryAxisItem();
        $categoryAxis->categories(array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30"));
        $categoryAxis->labels(array('rotation' => "auto"));
        $categoryAxis->majorGridLines(array('visible' => false));

        $tooltip = new \Kendo\Dataviz\UI\ChartTooltip();
        $tooltip->visible(true);
        $tooltip->format('{0}');

        $chart = new \Kendo\Dataviz\UI\Chart('views-chart');
        $chart->legend(array('position' => 'bottom'));
        $chart->addValueAxisItem($valueAxis);
        $chart->addCategoryAxisItem($categoryAxis);
        $chart->addSeriesItem($companyAverage, $planned, $completed);
        $chart->tooltip($tooltip);
        $chart->attr('style', 'height: 100%; width: 100%;');

        echo $chart->renderInTemplate();
    ?>
</script>
<script id="gauge-template" type="text/x-kendo-template">
    <?php
        $gauge = new \Kendo\Dataviz\UI\ArcGauge('gauge');
        $gauge->value(90);
        $gauge->centerTemplate('\\#:value\\#%');
        $gauge->scale(array( 'min' => 0, 'max' => 100));
        $gauge->attr('style', 'width:100%; height: 100%;');

        echo $gauge->renderInTemplate();
    ?>
</script>

<script>
    function onResize(e) {
        var colSpan = e.container.css("grid-column-end");
        var rowSpan = e.container.css("grid-row-end");

        var chart = e.container.find(".k-chart").data("kendoChart");
        // hide chart labels when the space is limited
        if (colSpan === "span 1" && chart) {
            var options = {
                axisDefaults: {
                    labels: { visible: false }
                }
            };

            if (rowSpan === "span 1") {
                options.legend = { visible: false };
            }

            chart.setOptions(options);
        }

        if (colSpan !== "span 1" && chart) {
            var options = {};
            if (colSpan === "span 2" && rowSpan === "span 1") {
                options.axisDefaults = { visible: false };
                options.legend = { visible: false };
            }

            if (rowSpan !== "span 1") {
                options.legend = { visible: true };
                options.axisDefaults = { visible: true };
            }
            chart.setOptions(options);
        }

        kendo.resize(e.container, true);
    };

    $(window).on("resize", function () {
        kendo.resize($(".k-card-body"));
    });
</script>

<?php
    $tilelayout = new \Kendo\UI\TileLayout("tilelayout");

    $tilelayout->columns(5);
    $tilelayout->columnsWidth(285);
    $tilelayout->rowsHeight(180);
    $tilelayout->resizable(true);
    $tilelayout->resize("onResize");

    $header1 = new \Kendo\UI\TileLayoutContainerHeader();
    $header1->text("Team Performance");

    $container1 = new \Kendo\UI\TileLayoutContainer();
    $container1->bodyTemplateId("chart-template")
                ->colSpan(5)
                ->rowSpan(2)
                ->header($header1);

    $tilelayout ->addContainer($container1);

    $header2 = new \Kendo\UI\TileLayoutContainerHeader();
    $header2->text("Tulips");

    $container2 = new \Kendo\UI\TileLayoutContainer();
    $container2->bodyTemplateId("treelist-template")
                ->colSpan(3)
                ->rowSpan(2)
                ->header($header2);

    $tilelayout->addContainer($container2);

    $header3 = new \Kendo\UI\TileLayoutContainerHeader();
    $header3->text("Engagement");

    $container3 = new \Kendo\UI\TileLayoutContainer();
    $container3->bodyTemplateId("gauge-template")
                ->colSpan(2)
                ->rowSpan(2)
                ->header($header3);

    $tilelayout->addContainer($container3);

    echo $tilelayout->render();
?>

<style>
    .employee-photo {
        display: inline-block;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background-size: 32px 35px;
        background-position: center center;
        vertical-align: middle;
        line-height: 32px;
        box-shadow: inset 0 0 1px #999, inset 0 0 10px rgba(0,0,0,.2);
        margin-left: 5px;
    }

    .employee-name {
        display: inline-block;
        vertical-align: middle;
        line-height: 32px;
        padding-left: 3px;
    }

    .k-card-header {
        flex: 0 0 auto;
    }

    .k-card-body {
        overflow: hidden;
    }
</style>

<?php require_once '../include/footer.php'; ?>