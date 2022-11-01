<?php
require_once '../lib/DataSourceResult.php';
require_once '../lib/Kendo/Autoload.php';
require_once '../include/header.php';

$transport = new \Kendo\Data\DataSourceTransport();

$read = new \Kendo\Data\DataSourceTransportRead();
$read->url('https://demos.telerik.com/kendo-ui/service/detailproducts')
     ->dataType('jsonp');

$update = new \Kendo\Data\DataSourceTransportUpdate();
$update->url('https://demos.telerik.com/kendo-ui/service/detailproducts/Update')
        ->dataType('jsonp');

$destroy = new \Kendo\Data\DataSourceTransportDestroy();
$destroy->url('https://demos.telerik.com/kendo-ui/service/detailproducts/Destroy')
        ->dataType('jsonp');

$model = new \Kendo\Data\DataSourceSchemaModel();

$transport->read($read)
          ->update($update)
          ->destroy($destroy)
          ->parameterMap('parameterMap');

$productIDField = new \Kendo\Data\DataSourceSchemaModelField('ProductID');
$productIDField->type('number')
               ->editable(false)
               ->nullable(true);

$discontinuedField = new \Kendo\Data\DataSourceSchemaModelField('Discontinued');
$discontinuedField->type('boolean')
                  ->editable(false);

$totalSalesField = new \Kendo\Data\DataSourceSchemaModelField('TotalSales');
$totalSalesField->type('number')
                ->editable(false);

$targetSalesField = new \Kendo\Data\DataSourceSchemaModelField('TargetSales');
$targetSalesField->type('number')
                 ->editable(false);

$lastSupplyField = new \Kendo\Data\DataSourceSchemaModelField('LastSupply');
$lastSupplyField->type('date');

$unitPriceField = new \Kendo\Data\DataSourceSchemaModelField('UnitPrice');
$unitPriceField->type('number');

$unitsInStockField = new \Kendo\Data\DataSourceSchemaModelField('UnitsInStock');
$unitsInStockField->type('number');

$categoryField = new \Kendo\Data\DataSourceSchemaModelField('Category');
$categoryField->defaultValue(array('CategoryID' => 9, 'CategoryName' => 'Seafood'));

$countryField = new \Kendo\Data\DataSourceSchemaModelField('Category');
$countryField->defaultValue(array('CountryNameShort' => "bg", 'CountryNameLong' => 'Bulgaria'));

$model->id('ProductID')
    ->addField($productIDField)
    ->addField($totalSalesField)
    ->addField($targetSalesField)
    ->addField($unitPriceField)
    ->addField($lastSupplyField)
    ->addField($unitsInStockField)
    ->addField($discontinuedField)
    ->addField($categoryField)
    ->addField($countryField);

$totalSalesSum = new \Kendo\Data\DataSourceAggregateItem();
$totalSalesSum->field("TotalSales")
                 ->aggregate("sum");

$group = new \Kendo\Data\DataSourceGroupItem();
$group->field('Category.CategoryName')
        ->dir("desc")
          ->addAggregate($totalSalesSum);

$schema = new \Kendo\Data\DataSourceSchema();
$schema->model($model);

$dataSource = new \Kendo\Data\DataSource();

$dataSource->transport($transport)
            ->pageSize(20)
            ->batch(true)
            ->autoSync(true)
            ->addGroupItem($group)
            ->addAggregateItem($totalSalesSum)
            ->schema($schema);

$grid = new \Kendo\UI\Grid('grid');

$selectColumn = new \Kendo\UI\GridColumn();
$selectColumn->selectable(true)
                ->attributes(array('class' => 'checkbox-align'))
                ->headerAttributes(array('class' => 'checkbox-align'))
                ->width(75);

$productName = new \Kendo\UI\GridColumn();
$productName->field('ProductName')
          ->title('Product Name')
          ->template("<div class='product-photo' style='background-image: url(../content/web/foods/#:data.ProductID#.jpg);'></div><div class='product-name'>#: ProductName #</div>")
          ->width(300);

$unitPrice = new \Kendo\UI\GridColumn();
$unitPrice->field('UnitPrice')
          ->title('Price')
          ->format('{0:c}')
          ->width(105);

$discontinued= new \Kendo\UI\GridColumn();
$discontinued->field('Discontinued')
            ->title('In Stock')
            ->template("<span id='badge_#=ProductID#' class='badgeTemplate'></span>")
            ->width(130);

$category = new \Kendo\UI\GridColumn();
$category->field('Category.CategoryName')
         ->title('Category')
         ->groupHeaderTemplate("Category: #=data.value#, Total Sales: #=kendo.format('{0:c}', aggregates.TotalSales.sum)#")
         ->editor('clientCategoryEditor')
         ->width(125);

$customerRating = new \Kendo\UI\GridColumn();
$customerRating->field('CustomerRating')
         ->title('Rating')
         ->template("<input id='rating_#=ProductID#' data-bind='value: CustomerRating' class='rating'/>")
         ->editable('returnFalse')
         ->width(140);

$country = new \Kendo\UI\GridColumn();
$country->field('Country.CountryNameLong')
         ->title('Country')
         ->template("<div class='k-text-center'><img src='../content/web/country-flags/#:data.Country.CountryNameShort#.png' alt='#: data.Country.CountryNameLong#' title='#: data.Country.CountryNameLong#' width='30' /></div>")
         ->editor('clientCountryEditor')
         ->width(120);

$unitsInStock = new \Kendo\UI\GridColumn();
$unitsInStock->field('UnitsInStock')
          ->title('Units')
          -> width(105);

$totalSales = new \Kendo\UI\GridColumn();
$totalSales->field('TotalSales')
          ->title('Total Sales')
          ->format('{0:c}')
          ->aggregates('sum')
          ->width(140);

$targetSales = new \Kendo\UI\GridColumn();
$targetSales->field('TargetSales')
          ->title('Target Sales')
          ->format('{0:c}')
          ->template("<span id='chart_#= ProductID#' class='sparkline-chart'></span>")
          ->width(220);

$command = new \Kendo\UI\GridColumn();
$command->addCommandItem('destroy')
        ->title('&nbsp;')
        ->width(120);

$columnMenu = new \Kendo\UI\GridColumnMenu();
$columnMenu->filterable(false);

$grid->addColumn($selectColumn, $productName, $unitPrice, $discontinued, $category, $customerRating, $country, $unitsInStock, $totalSales, $targetSales, $command)
     ->dataSource($dataSource)
     ->columnMenu($columnMenu)
     ->height(680)
     ->editable('incell')
     ->pageable(true)
     ->sortable(true)
     ->navigatable(true)
     ->resizable(true)
     ->reorderable(true)
     ->groupable(true)
     ->filterable(true)
     ->dataBound('onDataBound')
     ->addToolbarItem(new \Kendo\UI\GridToolbarItem('excel'), new \Kendo\UI\GridToolbarItem('pdf'), new \Kendo\UI\GridToolbarItem('search'));

echo $grid->render();
?>
<script>
    function parameterMap(options, operation) {
        if (operation !== "read" && options.models) {
            return { models: kendo.stringify(options.models) };
        }
    }

    function onDataBound(e) {
            var grid = this;
            grid.table.find("tr").each(function () {
                var dataItem = grid.dataItem(this);
                var themeColor = dataItem.Discontinued ? 'success' : 'error';
                var text = dataItem.Discontinued ? 'available' : 'not available';

                $(this).find(".badgeTemplate").kendoBadge({
                    themeColor: themeColor,
                    text: text,
                });

                $(this).find(".rating").kendoRating({
                    min: 1,
                    max: 5,
                    label: false,
                    selection: "continuous"
                });

                $(this).find(".sparkline-chart").kendoSparkline({
                    legend: {
                        visible: false
                    },
                    data: [dataItem.TargetSales],
                    type: "bar",
                    chartArea: {
                        margin: 0,
                        width: 180,
                        background: "transparent"
                    },
                    seriesDefaults: {
                        labels: {
                            visible: true,
                            format: '{0}%',
                            background: 'none'
                        }
                    },
                    categoryAxis: {
                        majorGridLines: {
                            visible: false
                        },
                        majorTicks: {
                            visible: false
                        }
                    },
                    valueAxis: {
                        type: "numeric",
                        min: 0,
                        max: 130,
                        visible: false,
                        labels: {
                            visible: false
                        },
                        minorTicks: { visible: false },
                        majorGridLines: { visible: false }
                    },
                    tooltip: {
                        visible: false
                    }
                });

                kendo.bind($(this), dataItem);
            });
        }

    function clientCategoryEditor(container, options) {
            $('<input required name="Category">')
                .appendTo(container)
                .kendoDropDownList({
                    autoBind: false,
                    dataTextField: "CategoryName",
                    dataValueField: "CategoryID",
                    dataSource: {
                        data: categories
                    }
                });
    }

    function clientCountryEditor(container, options) {
            $('<input required name="Country">')
                .appendTo(container)
                .kendoDropDownList({
                    dataTextField: "CountryNameLong",
                    dataValueField: "CountryNameShort",
                    template: "<div class='dropdown-country-wrap'><img src='../content/web/country-flags/#:CountryNameShort#.png' alt='#: CountryNameLong#' title='#: CountryNameLong#' width='30' /><span>#:CountryNameLong #</span></div>",
                    dataSource: {
                        transport: {
                            read: {
                                url: " https://demos.telerik.com/kendo-ui/service/countries",
                                dataType: "jsonp"
                            }
                        }
                    },
                    autoWidth: true
                });
    }

    var categories = [{
            "CategoryID": 1,
            "CategoryName": "Beverages"
        }, {
            "CategoryID": 2,
            "CategoryName": "Condiments"
        }, {
            "CategoryID": 3,
            "CategoryName": "Confections"
        }, {
            "CategoryID": 4,
            "CategoryName": "Dairy Products"
        }, {
            "CategoryID": 5,
            "CategoryName": "Grains/Cereals"
        }, {
            "CategoryID": 6,
            "CategoryName": "Meat/Poultry"
        }, {
            "CategoryID": 7,
            "CategoryName": "Produce"
        }, {
            "CategoryID": 8,
            "CategoryName": "Seafood"
        }];

    function returnFalse() {
        return false;
    }
</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.4.0/jszip.min.js"></script>
<style type="text/css">
    .customer-photo {
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

    .customer-name {
        display: inline-block;
        vertical-align: middle;
        line-height: 32px;
        padding-left: 3px;
    }

    .k-grid tr .checkbox-align {
        text-align: center;
        vertical-align: middle;
    }

    .product-photo {
        display: inline-block;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background-size: 32px 35px;
        background-position: center center;
        vertical-align: middle;
        line-height: 32px;
        box-shadow: inset 0 0 1px #999, inset 0 0 10px rgba(0,0,0,.2);
        margin-right: 5px;
    }

    .product-name {
        display: inline-block;
        vertical-align: middle;
        line-height: 32px;
        padding-left: 3px;
    }

    .k-rating-container .k-rating-item {
        padding: 4px 0;
    }

        .k-rating-container .k-rating-item .k-icon {
            font-size: 16px;
        }

    .dropdown-country-wrap {
        display: flex;
        flex-wrap: nowrap;
        align-items: center;
        white-space: nowrap;
    }

    .dropdown-country-wrap img {
        margin-right: 10px;
    }

    #grid .k-grid-edit-row > td > .k-rating {
        margin-left: 0;
        width: 100%;
    }

    .k-grid .k-grid-search {
        margin-left: auto;
        margin-right: 0;
    }
</style>
<?php require_once '../include/footer.php'; ?>
