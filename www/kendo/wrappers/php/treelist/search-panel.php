<?php
require_once '../lib/DataSourceResult.php';
require_once '../lib/Kendo/Autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header('Content-Type: application/json');

    $request = json_decode(file_get_contents('php://input'));

    $result = new DataSourceResult('sqlite:..//sample.db');

    $columns =  array('EmployeeID', 'ReportsTo', 'FirstName', 'LastName', 'Position', 'Phone', 'Extension', 'HireDate');

    $result = $result->read('EmployeeDirectory', $columns, $request);

    echo json_encode($result, JSON_NUMERIC_CHECK);

    exit;
}

require_once '../include/header.php';

$transport = new \Kendo\Data\DataSourceTransport();

$read = new \Kendo\Data\DataSourceTransportRead();

$read->url('editing-incell.php?type=read')
     ->contentType('application/json')
     ->type('POST');

$transport->read($read)
          ->parameterMap('function(data) {
              return kendo.stringify(data);
          }');

$model = new \Kendo\Data\DataSourceSchemaModel();

$firstNameField = new \Kendo\Data\DataSourceSchemaModelField('FirstName');
$firstNameField->type('string')
            ->validation(array('required' => true));

$lastNameField = new \Kendo\Data\DataSourceSchemaModelField('LastName');
$lastNameField->type('string');

$positionField = new \Kendo\Data\DataSourceSchemaModelField('Position');
$positionField->type('string');

$phoneField = new \Kendo\Data\DataSourceSchemaModelField('Phone');
$phoneField->type('string');

$extensionField = new \Kendo\Data\DataSourceSchemaModelField('Extension');
$extensionField->type('number')
            ->validation(array('min' => 0));

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
            ->width(220);

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

$treeList->addColumn($firstName, $lastName, $position, $hireDate, $phone, $extension)
     ->dataSource($dataSource)
     ->addToolbarItem(new \Kendo\UI\TreeListToolbarItem('search'))
     ->attr('style', 'height:540px');

?>

<?php
echo $treeList->render();
?>
<?php require_once '../include/footer.php'; ?>
