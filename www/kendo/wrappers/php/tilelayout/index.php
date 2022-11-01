<?php

require_once '../lib/Kendo/Autoload.php';
require_once '../include/header.php';

?>
<div role="application">
    <script id="conversion-rate" type="text/x-kendo-template">
        <h3>9%</h3>
        <div>Visitor to Customer</div>
    </script>
    <script id="current" type="text/x-kendo-template">
        <h3>2, 399</h3>
        <div>Active users right now</div>
    </script>
    <script id="bounce-rate" type="text/x-kendo-template">
        <h1>55 %</h1>
        <div>The percentage of all sessions on your site in which users viewed only a single page.</div>
    </script>

    <!-- container chart templates -->
    <script id="pages-chart-template" type="text/x-kendo-template">
        <?php
            $seriesItem = new \Kendo\Dataviz\UI\ChartSeriesItem();
            $seriesItem->data(array(90000, 60000, 40000, 30000, 10000));

            $valueAxis = new \Kendo\Dataviz\UI\ChartValueAxisItem();
            $valueAxis->color("transparent")
                        ->labels(array(
                            'color' => '232323',
                            'step' => 5
                        ))
                        ->majorUnit(10000)
                        ->min(0)
                        ->max(100000);

            $categoryAxis = new \Kendo\Dataviz\UI\ChartCategoryAxisItem();
            $categoryAxis->categories(array('Home', 'Price', 'Sign-up', 'Product', 'Blog' ))
                        ->labels(array('rotation' => 'auto'))
                        ->majorGridLines(array('visible' => false))
                        ->majorTicks(array('visible' => false));

            $chart = new \Kendo\Dataviz\UI\Chart('pages-chart');
            $chart
                ->legend(array('visible' => false))
                ->addValueAxisItem($valueAxis)
                ->addCategoryAxisItem($categoryAxis)
                ->seriesDefaults(array('type' => 'column'))
                ->addSeriesItem($seriesItem)
                ->attr('style', 'height: 100%; width: 100%;');

            echo $chart->renderInTemplate();
        ?>
    </script>
    <script id="views-chart-template" type="text/x-kendo-template">
        <?php
            $seriesItem = new \Kendo\Dataviz\UI\ChartSeriesItem();
            $seriesItem->type('line')
                        ->markers(array('visible' => false))
                        ->style('smooth')
                        ->data(array(2000, 80000, 130000, 170000, 190000, 150000, 160000));

            $valueAxis = new \Kendo\Dataviz\UI\ChartValueAxisItem();
            $valueAxis->color("transparent")
                        ->labels(array(
                            'color' => '232323',
                            'step' => 2
                        ))
                        ->type('numeric')
                        ->min(0)
                        ->max(200000);

            $categoryAxis = new \Kendo\Dataviz\UI\ChartCategoryAxisItem();
            $categoryAxis->categories(array(new DateTime('3/30/2020', new DateTimeZone('UTC')),
            new DateTime('4/5/2020', new DateTimeZone('UTC')),
            new DateTime('4/10/2020', new DateTimeZone('UTC')),
            new DateTime('4/15/2020', new DateTimeZone('UTC')),
            new DateTime('4/20/2020', new DateTimeZone('UTC')),
            new DateTime('4/25/2020', new DateTimeZone('UTC')),
            new DateTime('4/30/2020', new DateTimeZone('UTC')) ))
                        ->labels(array(
                            'skip' => 1,
                            'step' => 5,
                            'format' => '{0:d MMMM}'
                        ))
                        ->majorGridLines(array('visible' => false))
                        ->majorTicks(array('visible' => false));

            $chart = new \Kendo\Dataviz\UI\Chart('views-chart');
            $chart
                ->legend(array('visible' => false))
                ->addValueAxisItem($valueAxis)
                ->addCategoryAxisItem($categoryAxis)
                ->addSeriesItem($seriesItem)
                ->attr('style', 'height: 100%; width: 100%;');

            echo $chart->renderInTemplate();
        ?>
    </script>
    <script id="visitors-chart-template" type="text/x-kendo-template">
        <?php
            $seriesItem = new \Kendo\Dataviz\UI\ChartSeriesItem();
            $seriesItem->type('donut')
                        ->categoryField('type')
                        ->startAngle(70)
                        ->holeSize(30)
                        ->data(array(array('type' => 'New', 'value' => 70), array('type' => 'Returning', 'value' => 30)));


            $chart = new \Kendo\Dataviz\UI\Chart('visitors-chart');
            $chart
                ->legend(array('visible' => true, 'position' => 'bottom'))
                ->addSeriesItem($seriesItem)
                ->attr('style', 'height: 100%; width: 100%;');

            echo $chart->renderInTemplate();
        ?>
    </script>
    <script id="conversion-chart-template" type="text/x-kendo-template">
        <?php
            $seriesItem = new \Kendo\Dataviz\UI\ChartSeriesItem();
            $seriesItem->type('line')
                        ->markers(array('visible' => false))
                        ->style('smooth')
                        ->data(array(2000, 80000, 130000, 170000, 190000, 190000));

            $valueAxis = new \Kendo\Dataviz\UI\ChartValueAxisItem();
            $valueAxis->color("transparent")
                        ->labels(array(
                            'step' => 2
                        ))
                        ->color('grey')
                        ->type('numeric')
                        ->min(0)
                        ->max(200000);

            $categoryAxis = new \Kendo\Dataviz\UI\ChartCategoryAxisItem();
            $categoryAxis->categories(array(new DateTime('4/1/2020', new DateTimeZone('UTC')),
            new DateTime('4/5/2020', new DateTimeZone('UTC')),
            new DateTime('4/10/2020', new DateTimeZone('UTC')),
            new DateTime('4/15/2020', new DateTimeZone('UTC')),
            new DateTime('4/20/2020', new DateTimeZone('UTC')),
            new DateTime('4/30/2020', new DateTimeZone('UTC')) ))
                        ->labels(array(
                            'format' => '{0:d MMMM}'
                        ))
                        ->baseUnitStep('auto')
                        ->autoBaseUnitSteps(array('days' => array(9)))
                        ->majorGridLines(array('visible' => false))
                        ->majorTicks(array('visible' => false));

            $chart = new \Kendo\Dataviz\UI\Chart('conversion-chart');
            $chart
                ->legend(array('visible' => false))
                ->addValueAxisItem($valueAxis)
                ->addCategoryAxisItem($categoryAxis)
                ->addSeriesItem($seriesItem)
                ->attr('style', 'height: 100%; width: 100%;');

            echo $chart->renderInTemplate();
        ?>
    </script>

    <!-- container grid templates -->
    <script id="conversions-grid-template" type="text/x-kendo-template">
        <?php
            $data = array(
                array('channel' => 'Organic Search', 'conversion' => 8232, 'users' => 70500),
                array('channel' => 'Direct', 'conversion' => 6574, 'users' => 24900),
                array('channel' => 'Referral', 'conversion' => 4932, 'users' => 20000),
                array('channel' => 'Social Media', 'conversion' => 2928, 'users' => 19500),
                array('channel' => 'Email', 'conversion' => 2456, 'users' => 18100),
                array('channel' => 'Other', 'conversion' => 1172, 'users' => 16540),
            );

            $conversionField = new \Kendo\Data\DataSourceSchemaModelField('conversion');
            $conversionField->type('number');

            $usersField = new \Kendo\Data\DataSourceSchemaModelField('users');
            $usersField->type('number');

            $model = new \Kendo\Data\DataSourceSchemaModel();
            $model->addField($conversionField);
            $model->addField($usersField);

            $schema = new \Kendo\Data\DataSourceSchema();
            $schema->model($model);

            $dataSource = new \Kendo\Data\DataSource('DataSource');
            $dataSource->data($data);
            $dataSource->schema($schema);

            $channel = new \Kendo\UI\GridColumn();
            $channel->field('channel');
            $channel->title('Channel');
            $channel->width(100);

            $conversion = new \Kendo\UI\GridColumn();
            $conversion->field('conversion');
            $conversion->title('Conversion');
            $conversion->format('{0:n0}');
            $conversion->width(80);

            $grid = new \Kendo\UI\Grid('conversions-grid');
            $grid->addColumn($channel, $conversion);
            $grid->dataSource($dataSource);
            $grid->attr('style', 'height: 100%;');

            echo $grid->renderInTemplate();
        ?>
    </script>
    <script id="users-grid-template" type="text/x-kendo-template">
        <?php
            $data = array(
                array('channel' => 'Organic Search', 'conversion' => 8232, 'users' => 70500),
                array('channel' => 'Direct', 'conversion' => 6574, 'users' => 24900),
                array('channel' => 'Referral', 'conversion' => 4932, 'users' => 20000),
                array('channel' => 'Social Media', 'conversion' => 2928, 'users' => 19500),
                array('channel' => 'Email', 'conversion' => 2456, 'users' => 18100),
                array('channel' => 'Other', 'conversion' => 1172, 'users' => 16540),
            );

            $conversionField = new \Kendo\Data\DataSourceSchemaModelField('conversion');
            $conversionField->type('number');

            $usersField = new \Kendo\Data\DataSourceSchemaModelField('users');
            $usersField->type('number');

            $model = new \Kendo\Data\DataSourceSchemaModel();
            $model->addField($conversionField);
            $model->addField($usersField);

            $schema = new \Kendo\Data\DataSourceSchema();
            $schema->model($model);

            $dataSource = new \Kendo\Data\DataSource('DataSource');
            $dataSource->data($data);
            $dataSource->schema($schema);

            $channel = new \Kendo\UI\GridColumn();
            $channel->field('channel');
            $channel->title('Channel');
            $channel->width(100);

            $users = new \Kendo\UI\GridColumn();
            $users->field('users');
            $users->title('Users');
            $users->format('{0:n0}');
            $users->width(80);

            $grid = new \Kendo\UI\Grid('users-grid');
            $grid->addColumn($channel, $users);
            $grid->dataSource($dataSource);
            $grid->attr('style', 'height: 100%;');

            echo $grid->renderInTemplate();
        ?>
    </script>
    <script>
        var themeLabelColor = kendo.dataviz.ui.themes["default"].chart.axisDefaults.labels.color;

        $(window).on("resize", function () {
            var charts = $(".k-chart");

            $.each(charts, function (i, elem) {
                var chart = $(elem).data("kendoChart");
                if ($("#tilelayout").width() < 677) {
                    chart.setOptions({
                        axisDefaults: {
                            labels: {
                                color: "transparent"
                            }
                        }
                    });
                } else {
                    chart.setOptions({
                        axisDefaults: {
                            labels: {
                                color: themeLabelColor
                            }
                        }
                    });
                }
            });
        });

        function onResize(e) {
            // for widgets that do not auto resize
            // https://docs.telerik.com/kendo-ui/styles-and-layout/using-kendo-in-responsive-web-pages
            kendo.resize(e.container, true);
        };
    </script>
<?php
    $tilelayout = new \Kendo\UI\TileLayout("tilelayout");

    $tilelayout->columns(5);
    $tilelayout->columnsWidth(300);
    $tilelayout->rowsHeight(235);
    $tilelayout->reorderable(true);
    $tilelayout->resizable(true);
    $tilelayout->resize("onResize");

    $header1 = new \Kendo\UI\TileLayoutContainerHeader();
    $header1->text("Page Views");

    $container1 = new \Kendo\UI\TileLayoutContainer();
    $container1->bodyTemplateId("views-chart-template")
                ->colSpan(3)
                ->rowSpan(1)
                ->header($header1);

    $tilelayout ->addContainer($container1);

    $header2 = new \Kendo\UI\TileLayoutContainerHeader();
    $header2->text("Conversion Rate");

    $container2 = new \Kendo\UI\TileLayoutContainer();
    $container2->bodyTemplateId("conversion-rate")
                ->colSpan(1)
                ->rowSpan(1)
                ->header($header2);

    $tilelayout->addContainer($container2);

    $header3 = new \Kendo\UI\TileLayoutContainerHeader();
    $header3->text("Currently");

    $container3 = new \Kendo\UI\TileLayoutContainer();
    $container3->bodyTemplateId("current")
                ->colSpan(1)
                ->rowSpan(1)
                ->header($header3);

    $tilelayout->addContainer($container3);

    $header4 = new \Kendo\UI\TileLayoutContainerHeader();
    $header4->text("Most Visited Pages");

    $container4 = new \Kendo\UI\TileLayoutContainer();
    $container4->bodyTemplateId("pages-chart-template")
                ->colSpan(2)
                ->rowSpan(1)
                ->header($header4);

    $tilelayout->addContainer($container4);

    $header5 = new \Kendo\UI\TileLayoutContainerHeader();
    $header5->text("Conversions by Channel");

    $container5 = new \Kendo\UI\TileLayoutContainer();
    $container5->bodyTemplateId("conversions-grid-template")
                ->colSpan(2)
                ->rowSpan(2)
                ->header($header5);

    $tilelayout->addContainer($container5);

    $header6 = new \Kendo\UI\TileLayoutContainerHeader();
    $header6->text("Bounce Rate");

    $container6 = new \Kendo\UI\TileLayoutContainer();
    $container6->bodyTemplateId("bounce-rate")
                ->colSpan(1)
                ->rowSpan(1)
                ->header($header6);

    $tilelayout->addContainer($container6);

    $header7 = new \Kendo\UI\TileLayoutContainerHeader();
    $header7->text("Users by Channel");

    $container7 = new \Kendo\UI\TileLayoutContainer();
    $container7->bodyTemplateId("users-grid-template")
                ->colSpan(2)
                ->rowSpan(2)
                ->header($header7);

    $tilelayout->addContainer($container7);

    $header8 = new \Kendo\UI\TileLayoutContainerHeader();
    $header8 ->text("Visitors");

    $container8 = new \Kendo\UI\TileLayoutContainer();
    $container8->bodyTemplateId("visitors-chart-template")
                ->colSpan(1)
                ->rowSpan(2)
                ->header($header8);

    $tilelayout->addContainer($container8);

    $header9 = new \Kendo\UI\TileLayoutContainerHeader();
    $header9->text("Conversion This Month");

    $container9 = new \Kendo\UI\TileLayoutContainer();
    $container9->bodyTemplateId("conversion-chart-template")
                ->colSpan(2)
                ->rowSpan(1)
                ->header($header9);

    $tilelayout->addContainer($container9);

    echo $tilelayout->render();
?>

<style>
    .k-card-header {
        flex: 0 0 auto;
    }

    .k-card-body {
        overflow: hidden;
    }
</style>

<?php require_once '../include/footer.php'; ?>