<?php
require_once '../lib/Kendo/Autoload.php';

require_once '../include/header.php';

$transport = new \Kendo\Data\PivotDataSourceTransport();

$read = new \Kendo\Data\PivotDataSourceTransportRead();

$read->url('https://demos.telerik.com/olap/msmdpump.dll')
     ->contentType('text/xml')
     ->dataType('text')
     ->type('POST');

$connection = new \Kendo\Data\PivotDataSourceTransportConnection();

$connection->catalog('Adventure Works DW 2008R2')
            ->cube('Adventure Works');

$discover = new \Kendo\Data\PivotDataSourceTransportDiscover();

$discover->url('https://demos.telerik.com/olap/msmdpump.dll')
     ->contentType('text/xml')
     ->dataType('text')
     ->type('POST');

$transport ->read($read)
            ->connection($connection)
            ->discover($discover);

$schema = new \Kendo\Data\PivotDataSourceSchema();
$schema->type('xmla');

$dateColumn = new \Kendo\Data\PivotDataSourceColumn();
$dateColumn->name('[Date].[Calendar]')
            ->expand(true);

$productRow = new \Kendo\Data\PivotDataSourceColumn();
$productRow->name('[Product].[Product Line]')
            ->expand(true);

$dataSource = new \Kendo\Data\PivotDataSource();

$dataSource->transport($transport)
            ->type("xmla")
            ->addColumn($dateColumn)
            ->addRow($productRow)
            ->addMeasure('[Measures].[Reseller Freight Cost]')
            ->schema($schema);

$pivotgrid = new \Kendo\UI\PivotGrid('pivotgrid');
$pivotgrid->dataSource($dataSource)
    ->columnWidth(190)
    ->attr('class', 'hidden-on-narrow')
    ->dataCellTemplateId('dataCellTemplate')
    ->columnHeaderTemplateId('headerTemplate')
    ->rowHeaderTemplateId('headerTemplate')
    ->height(320);
?>

<div class="k-pivotgrid-wrapper">
    <?php echo $pivotgrid->render(); ?>
</div>

<div class="responsive-message"></div>

<script id="dataCellTemplate" type="text/x-kendo-tmpl">
    # var columnMember = columnTuple ? columnTuple.members[0] : { children: [] }; #
    # var rowMember = rowTuple ? rowTuple.members[0] : { children: [] }; #
    # var value = kendo.toString(kendo.parseFloat(dataItem.value) || "N/A", "c2"); #

    # if (columnMember.children.length || rowMember.children.length) { #
        <em  style="color: red">#: value # (total)</em>
    # } else { #
        #: value #
    # } #
</script>

<script id="headerTemplate" type="text/x-kendo-tmpl">
    # if (!member.children.length) { #
        <em>#: member.caption #</em>
    # } else { #
        #: member.caption #
    # } #
</script>

<?php require_once '../include/footer.php'; ?>
