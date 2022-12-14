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

$create->url('selection.php?type=create')
     ->contentType('application/json')
     ->type('POST');

$read = new \Kendo\Data\DataSourceTransportRead();

$read->url('selection.php?type=read')
     ->contentType('application/json')
     ->type('POST');

$update = new \Kendo\Data\DataSourceTransportUpdate();

$update->url('selection.php?type=update')
     ->contentType('application/json')
     ->type('POST');

$destroy = new \Kendo\Data\DataSourceTransportDestroy();

$destroy->url('selection.php?type=destroy')
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
    ->dataSource(array(
        array('text'=> 'Meeting Room 101', 'value' => 1, 'color' => '#6eb3fa'),
        array('text'=> 'Meeting Room 201', 'value' => 2, 'color' => '#f58a8a')
    ));

$attendeesResource = new \Kendo\UI\SchedulerResource();
$attendeesResource->field('attendees')
    ->title('Attendees')
    ->multiple(true)
    ->dataSource(array(
        array('text'=> 'Alex', 'value' => 1, 'color' => '#f8a398'),
        array('text'=> 'Bob', 'value' => 2, 'color' => '#51a0ed'),
        array('text'=> 'Charlie', 'value' => 3, 'color' => '#56ca85')
    ));

$scheduler = new \Kendo\UI\Scheduler('scheduler');
$scheduler->timezone("Etc/UTC")
        ->date(new DateTime('2013/6/13'))
        ->height(600)
        ->selectable(true)
        ->addResource($roomResource, $attendeesResource)
        ->addView(array('type' => 'day', 'startTime' => new DateTime('2013/6/13 7:00')),
            array('type' => 'week', 'selected' => true, 'startTime' => new DateTime('2013/6/13 7:00')), 'month', 'agenda', 'timeline')
        ->dataSource($dataSource);

echo $scheduler->render();
?>
    <script type="text/javascript">
	    $(document.body).keydown(function (e) {
	        if (e.altKey && e.keyCode == 87) {
	            $("#scheduler").data("kendoScheduler").wrapper.focus();
	        }
	    });
	</script>

<div class="box wide">
    <div class="box-col">
        <h4>Focus</h4>
        <ul class="keyboard-legend" style="margin-bottom: 1em;">
            <li>
                <span class="button-preview">
                    <span class="key-button leftAlign">Alt</span>
                    +
                    <span class="key-button">w</span>
                </span>
                <span class="button-descr">
                    focuses the widget
                </span>
            </li>
        </ul>

        <h3>Actions applied to the entire Scheduler</h3>
        <ul class="keyboard-legend">
            <li>
                <span class="button-preview">
                    <span class="key-button">F10</span>
                </span>
                <span class="button-descr">
                    focuses toolbar
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button">B</span>
                </span>
                <span class="button-descr">
                    toggles view between business hours and full day (available in Day, Week and Timeline views)
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button">C</span>
                </span>
                <span class="button-descr">
                    opens the create new event pop-up editor using the start date of the current view as a start and end
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button">T</span>
                </span>
                <span class="button-descr">
                    navigates the view to today's time period
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button leftAlign">Alt</span>
                    +
                    <span class="key-button">1</span>
                    -
                    <span class="key-button">5</span>
                </span>
                <span class="button-descr">
                    switch between available views
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button leftAlign">Shift</span>
                    +
                    <span class="key-button">Right</span>
                </span>
                <span class="button-descr">
                    navigates to the next time period
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button leftAlign">Shift</span>
                    +
                    <span class="key-button">Left</span>
                </span>
                <span class="button-descr">
                    navigates to the previos time period
                </span>
            </li>
        </ul>

        <h3>Actions applied on Scheduler toolbar</h3>
        <ul class="keyboard-legend">
            <li>
                <span class="button-preview">
                    <span class="key-button">Right</span>
                </span>
                <span class="button-descr">
                    focuses next toolbar item
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button">Left</span>
                </span>
                <span class="button-descr">
                    focuses previous toolbar item
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button">Enter</span>
                </span>or
                <span class="button-preview">
                    <span class="key-button">Space</span>
                </span>
                <span class="button-descr">
                    activates toolbar item
                </span>
            </li>
        </ul>

        <h3>Actions applied on Scheduler events</h3>
        <ul class="keyboard-legend">
            <li>
                <span class="button-preview">
                    <span class="key-button">Right</span>
                </span>or
                <span class="button-preview">
                    <span class="key-button">Down</span>
                </span>
                <span class="button-descr">
                    focuses next available event
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button">Left</span>
                </span>or
                <span class="button-preview">
                    <span class="key-button">Up</span>
                </span>
                <span class="button-descr">
                    focuses previous available event
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button">Enter</span>
                </span>
                <span class="button-descr">
                    opens edit window for the selected event
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button">Esc</span>
                </span>
                <span class="button-descr">
                    closes the edit popup window
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button">Delete</span>
                </span>or
                <span class="button-preview">
                    <span class="key-button">Backspace</span>
                </span>
                <span class="button-descr">
                    opens the Delete confirmation popup to delete the event
                </span>
            </li>
        </ul>
    </div>
</div>
<?php require_once '../include/footer.php'; ?>
