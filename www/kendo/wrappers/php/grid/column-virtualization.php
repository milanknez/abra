<?php
require_once '../lib/DataSourceResult.php';
require_once '../lib/Kendo/Autoload.php';
require_once '../include/header.php';

$transport = new \Kendo\Data\DataSourceTransport();
$transport ->read(new \Kendo\JavaScriptFunction('read'));

$dataSource = new \Kendo\Data\DataSource();

$dataSource->transport($transport)
           ->pageSize(10);

$grid = new \Kendo\UI\Grid('grid');

for ($i = 1; $i <= 500; $i++) {
    $currentColumn = new \Kendo\UI\GridColumn();
    $currentColumn->field('Field'.$i)
            ->width(200);
    $grid->addColumn($currentColumn);
}

$pageable = new Kendo\UI\GridPageable();
$pageable->refresh(true)
      ->pageSizes(true)
      ->buttonCount(5);

$scrollable = new Kendo\UI\GridScrollable();
$scrollable->virtual("columns");

$grid->dataSource($dataSource)
     ->sortable(true)
     ->filterable(true)
     ->navigatable(true)
     ->columnMenu(true)
     ->scrollable($scrollable)
     ->pageable($pageable)
     ->attr('style', 'width:1000px');

echo $grid->render();
?>

<script>

    function getData() {
        var data = [];
        var numberOfColumns = 500;
        var numberOfRows = 100;
        var field;
        var row;
        var i;
        var j;
        
        for (i = 1; i <= numberOfRows; i++) {
            row = {};
            for (j = 1; j <= numberOfColumns; j++) {
                field = ("Field" + j);
                row[field] = "R" + i + ":C" + j;
            }
            data.push(row);
        }

        return data;
    }
    function read(e) {
        e.success(getData());
    }
</script>

<?php require_once '../include/footer.php'; ?>
