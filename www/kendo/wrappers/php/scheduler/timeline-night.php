<?php
require_once '../lib/DataSourceResult.php';
require_once '../lib/SchedulerDataSourceResult.php';
require_once '../lib/Kendo/Autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header('Content-Type: application/json');

    $request = json_decode(file_get_contents('php://input'));

    $result = new SchedulerDataSourceResult('sqlite:..//sample.db');

    $type = $_GET['type'];

    $columns = array('MeetingID', 'Title', 'Start', 'End', 'StartTimezone', 'EndTimezone', 'IsAllDay', 'Description', 'RecurrenceID', 'RecurrenceRule', 'RecurrenceException', 'RoomID');

    switch($type) {
        case 'create':
            $result = $result->createWithAssociation('Meetings', 'MeetingAttendees', $columns, $request->models, 'MeetingID', array('Attendees' => 'AttendeeID'));
            break;
        case 'update':
            $result = $result->updateWithAssociation('Meetings', 'MeetingAttendees', $columns, $request->models, 'MeetingID', array('Attendees' => 'AttendeeID'));
            break;
        case 'destroy':
            $result = $result->destroyWithAssociation('Meetings', 'MeetingAttendees', $request->models, 'MeetingID');
            break;
        default:
            $result = $result->readWithAssociation('Meetings', 'MeetingAttendees', 'MeetingID', array('AttendeeID' => 'Attendees'), array('MeetingID', 'RoomID'), $request);
            break;
    }

    echo json_encode($result, JSON_NUMERIC_CHECK);

    exit;
}

require_once '../include/header.php';

$transport = new \Kendo\Data\DataSourceTransport();

$create = new \Kendo\Data\DataSourceTransportCreate();

$create->url('resources-grouping-vertical.php?type=create')
     ->contentType('application/json')
     ->type('POST');

$read = new \Kendo\Data\DataSourceTransportRead();

$read->url('resources-grouping-vertical.php?type=read')
     ->contentType('application/json')
     ->type('POST');

$update = new \Kendo\Data\DataSourceTransportUpdate();

$update->url('resources-grouping-vertical.php?type=update')
     ->contentType('application/json')
     ->type('POST');

$destroy = new \Kendo\Data\DataSourceTransportDestroy();

$destroy->url('resources-grouping-vertical.php?type=destroy')
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

$meetingIdField = new \Kendo\Data\DataSourceSchemaModelField('meetingID');
$meetingIdField->type('number')
            ->from('MeetingID')
            ->nullable(true);

$titleField = new \Kendo\Data\DataSourceSchemaModelField('title');
$titleField->from('Title')
        ->defaultValue('No title')
        ->type('string')
        ->validation(array('required' => true));

$startField = new \Kendo\Data\DataSourceSchemaModelField('start');
$startField->type('date')
        ->from('Start');

$startTimezoneField = new \Kendo\Data\DataSourceSchemaModelField('startTimezone');
$startTimezoneField->from('StartTimezone');

$endField = new \Kendo\Data\DataSourceSchemaModelField('end');
$endField->type('date')
        ->from('End');

$endTimezoneField = new \Kendo\Data\DataSourceSchemaModelField('endTimezone');
$endTimezoneField->from('EndTimezone');

$isAllDayField = new \Kendo\Data\DataSourceSchemaModelField('isAllDay');
$isAllDayField->type('boolean')
        ->from('IsAllDay');

$descriptionField = new \Kendo\Data\DataSourceSchemaModelField('description');
$descriptionField->type('string')
        ->from('Description');

$recurrenceIdField = new \Kendo\Data\DataSourceSchemaModelField('recurrenceId');
$recurrenceIdField->from('RecurrenceID');

$recurrenceRuleField = new \Kendo\Data\DataSourceSchemaModelField('recurrenceRule');
$recurrenceRuleField->from('RecurrenceRule');

$recurrenceExceptionField = new \Kendo\Data\DataSourceSchemaModelField('recurrenceException');
$recurrenceExceptionField->from('RecurrenceException');

$roomIdField = new \Kendo\Data\DataSourceSchemaModelField('roomId');
$roomIdField->from('RoomID')
        ->nullable(true);

$attendeesField = new \Kendo\Data\DataSourceSchemaModelField('attendees');
$attendeesField->from('Attendees')
        ->nullable(true);

$model->id('meetingID')
    ->addField($meetingIdField)
    ->addField($titleField)
    ->addField($startField)
    ->addField($endField)
    ->addField($startTimezoneField)
    ->addField($endTimezoneField)
    ->addField($descriptionField)
    ->addField($recurrenceIdField)
    ->addField($recurrenceRuleField)
    ->addField($recurrenceExceptionField)
    ->addField($roomIdField)
    ->addField($attendeesField)
    ->addField($isAllDayField);

$schema = new \Kendo\Data\DataSourceSchema();
$schema->data('data')
        ->errors('errors')
        ->model($model);

$dataSource = new \Kendo\Data\DataSource();

$dataSource->transport($transport)
    ->schema($schema)
    ->batch(true);

$roomResource = new \Kendo\UI\SchedulerResource();
$roomResource->field('roomId')
    ->title('Room')
    ->name('Rooms')
    ->dataSource(array(
        array('text'=> 'Meeting Room 101', 'value' => 1, 'color' => '#6eb3fa'),
        array('text'=> 'Meeting Room 201', 'value' => 2, 'color' => '#f58a8a')
    ));

$scheduler = new \Kendo\UI\Scheduler('scheduler');
$scheduler->timezone("Etc/UTC")
        ->date(new DateTime('2013/6/13'))
        ->startTime(new DateTime('2013/6/13 20:00'))
		->endTime(new DateTime('2013/6/13 20:00'))
		->dateHeaderTemplate('<strong>#=kendo.toString(date, "D")# - #=kendo.toString(kendo.date.nextDay(date), "D")#</strong>')
		->majorTick(360)
        ->addResource($roomResource)
        ->group(array('resources' => array('Rooms'), 'orientation' => 'vertical'))
        ->addView(array('type' => 'timeline', 'eventHeight' => 50),
            array('type' => 'timelineWeek', 'eventHeight' => 50))
        ->dataSource($dataSource);

echo $scheduler->render();
?>
<?php require_once '../include/footer.php'; ?>
