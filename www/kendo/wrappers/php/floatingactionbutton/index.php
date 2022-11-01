<?php
require_once '../lib/DataSourceResult.php';
require_once '../lib/Kendo/Autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header('Content-Type: application/json');

    $request = json_decode(file_get_contents('php://input'));

    $result = new DataSourceResult('sqlite:..//sample.db');

    $type = $_GET['type'];

    $columns =  array('EmployeeID', 'ReportsTo', 'FirstName', 'LastName', 'Position', 'Phone', 'Extension', 'HireDate');

    switch($type) {
        case 'create':
            $result = $result->create('EmployeeDirectory', $columns, $request->models, 'EmployeeID');
            break;
        case 'read':
            $result = $result->read('EmployeeDirectory', $columns, $request);
            break;
        case 'update':
            $result = $result->update('EmployeeDirectory', $columns, $request->models, 'EmployeeID');
            break;
        case 'destroy':
            $result = $result->destroy('EmployeeDirectory', $request->models, 'EmployeeID');
            break;
    }

    echo json_encode($result, JSON_NUMERIC_CHECK);

    exit;
}

require_once '../include/header.php';

$transport = new \Kendo\Data\DataSourceTransport();

$create = new \Kendo\Data\DataSourceTransportCreate();

$create->url('index.php?type=create')
     ->contentType('application/json')
     ->type('POST');

$read = new \Kendo\Data\DataSourceTransportRead();

$read->url('index.php?type=read')
     ->contentType('application/json')
     ->type('POST');

$update = new \Kendo\Data\DataSourceTransportUpdate();

$update->url('index.php?type=update')
     ->contentType('application/json')
     ->type('POST');

$destroy = new \Kendo\Data\DataSourceTransportDestroy();

$destroy->url('index.php?type=destroy')
     ->contentType('application/json')
     ->type('POST');

$transport->create($create)
          ->read($read)
          ->update($update)
          ->destroy($destroy)
          ->parameterMap('function(data) {
              return kendo.stringify(data);
          }');

$model = new \Kendo\Data\DataSourceSchemaModel();

$firstNameField = new \Kendo\Data\DataSourceSchemaModelField('FirstName');
$firstNameField->type('string')
            ->validation(array('required' => true));

$lastNameField = new \Kendo\Data\DataSourceSchemaModelField('LastName');
$lastNameField->type('string')
            ->validation(array('required' => true));

$positionField = new \Kendo\Data\DataSourceSchemaModelField('Position');
$positionField->type('string');

$phoneField = new \Kendo\Data\DataSourceSchemaModelField('Phone');
$phoneField->type('string');

$extensionField = new \Kendo\Data\DataSourceSchemaModelField('Extension');
$extensionField->type('number')
            ->validation(array('required' => true, 'min' => 0));

$hireDateField = new \Kendo\Data\DataSourceSchemaModelField('HireDate');
$hireDateField->type('date');

$employeeIDField = new \Kendo\Data\DataSourceSchemaModelField('EmployeeID');
$employeeIDField->type('number')
               ->editable(false)
               ->nullable(false);

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
    ->addField($extensionField)
    ->addField($hireDateField);

$schema = new \Kendo\Data\DataSourceSchema();
$schema->data('data')
       ->model($model);

$dataSource = new \Kendo\Data\DataSource();

$dataSource->transport($transport)
        ->batch(true)
       ->schema($schema);

$treeList = new \Kendo\UI\TreeList('treelist');

$firstName = new \Kendo\UI\TreeListColumn();
$firstName->field('FirstName')
            ->title('First Name')
            ->width(220)
            ->templateId("photo-template");

$lastName = new \Kendo\UI\TreeListColumn();
$lastName->field('LastName')
            ->title('Last Name')
            ->width(100);

$position = new \Kendo\UI\TreeListColumn();
$position->field('Position');

$phone = new \Kendo\UI\TreeListColumn();
$phone->field('Phone')
            ->width(200);

$extension = new \Kendo\UI\TreeListColumn();
$extension->field('Extension')
            ->title('Ext')
            ->format('{0:#}')
            ->width(140);

$hireDate = new \Kendo\UI\TreeListColumn();
$hireDate->field('HireDate')
        ->title('Hire Date')
        ->format('{0:MMMM d, yyyy}');

$pageable = new \Kendo\UI\TreeListPageable();
$pageable->pageSize(15)
        ->pageSizes(true);

$treeList->addColumn($firstName, $lastName, $position, $hireDate, $phone)
     ->dataSource($dataSource)
     ->editable("popup")
     ->attr('style', 'height:540px')
     ->pageable($pageable);

$fab = new \Kendo\UI\FloatingActionButton('fab');

$alignOffset = new \Kendo\UI\FloatingActionButtonAlignOffset();
$alignOffset->x(50)
          ->y(80);

$fab->positionMode("absolute")
        ->alignOffset($alignOffset)
        ->icon("plus")
        ->themeColor("primary")
        ->size("medium")
        ->click("addItem");

?>
<script id="photo-template" type="text/x-kendo-template">
    # var src = "../content/web/treelist/people/" + data.EmployeeID + ".jpg"#
    # if(data.isNew() || data.EmployeeId > 100) {#
    # src = "../content/web/Kendoka-32.png"#
    # } #
    <div class="k-avatar k-avatar-md k-avatar-image k-avatar-circle employee-photo">
    <img src="#=src#"></img>
    </div>
    <div class="employee-name">#: FirstName #</div>
</script>

<script>
    function addItem() {
        var treeList = $("#treelist").getKendoTreeList();
        treeList.addRow();
    };
</script>
<div style="position:relative">
    <?php
    echo $treeList->render();
    echo $fab->render();
    ?>
</div>
<script>
    $(document).ready(function(){
        var fab = $("#fab").getKendoFloatingActionButton();

        $("#fab").hover(function () {
                fab.text("Add New Record");
                fab.element.find(".k-fab-text")
                    .stop().toggle(200);
            }, function () {
                    fab.element.find(".k-fab-text")
                        .stop()
                        .toggle(200)
                        .promise().done(function () {
                            fab.text("");
                        });
            });
    });
</script>

<style>
    .k-fab-text {
        display: none;
    }

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
</style>

<?php require_once '../include/footer.php'; ?>
