<?php
require_once '../lib/Kendo/Autoload.php';

require_once '../include/header.php';

?>
<script>
    var today = new Date();
    var specialDates = [
       +new Date(today.getFullYear(), today.getMonth(), 3),
       +new Date(today.getFullYear(), today.getMonth(), 12),
       +new Date(today.getFullYear(), today.getMonth(), 24)
    ];
</script>
<div id="example" style="text-align: center;">
    <h4>Select a colored date from the Calendar</h4>
<?php
$year = date('y');
$currMonth = date('m');
$month = new \Kendo\UI\CalendarMonth();
$month->content(<<<TEMPLATE
# if ($.inArray(+data.date, specialDates) != -1) { #
    <div class="eventful">#= data.value #</div>
    # } else { #
    #= data.value #
    # } #
TEMPLATE
);
$calendar = new \Kendo\UI\Calendar('calendar');
$calendar->componentType('modern');
$calendar->month($month);

echo $calendar->render();

$popover = new \Kendo\UI\Popover('.k-calendar-td:has(.eventful)');
$popover->body(new \Kendo\JavaScriptFunction('function () {
    return `<div id="breakfast"><span>Starbuck Breakfast </span><span class="time">8:00</span></div>
        <div id="updates">Software Updates <span class="time">9:00</span></div>
        <div id="performance">Performance Review <span class="time">14:00</span></div>
        <div id="lecture">HR Lecture <span class="time">19:00</span></div>`;
}'));
$popover->showOn('click');
$popover->position('right');
$popover->width(300);
$popover->height(208);
$popover->header(new \Kendo\JavaScriptFunction('function (e) {
    var dateString = $("a.k-calendar-title").text();
    return dateString.substr(0, dateString.indexOf(" ")) + " " + e.target.text();
}'));

echo $popover->render();
?>
</div>

<style>
        .k-prev-view, .k-next-view {
            display: none;
        }

        .k-nav-today {
            padding-right: 17px;
        }

        .k-calendar-header {
            margin-top: 8px;
        }

        .k-calendar-title {
            margin-left: 8px;
        }

        .eventful {
            color: #FF6358;
            font-weight: bold;
        }

        .k-state-selected .eventful {
            color: white;
        }

        .k-popover-header {
            padding: 16px;
            text-align: center;
            font-size: 18px;
            line-height: 20px;
            color: #424242;
        }

        .time {
            float: right;
            padding-right: 8px;
        }

        #breakfast {
            height: 25px;
            margin-bottom: 8px;
            padding: 4px 4px 4px 7px;
            color: #FFFFFF;
            background-color: #FF6358;
            box-sizing: border-box;
            border-radius: 2px;
            border: 1px solid #FF6358;
        }

        #updates {
            height: 25px;
            margin-bottom: 8px;
            padding: 4px 4px 4px 7px;
            background-color: #FFD246;
            box-sizing: border-box;
            border-radius: 2px;
            border: 1px solid #FF6358;
        }

        #performance {
            height: 25px;
            margin-bottom: 8px;
            padding: 4px 4px 4px 7px;
            color: #FFFFFF;
            background-color: #6610F2;
            box-sizing: border-box;
            border-radius: 2px;
            border: 1px solid #6610F2;
        }

        #lecture {
            height: 25px;
            padding: 4px 4px 4px 7px;
            background-color: #FFD246;
            box-sizing: border-box;
            border-radius: 2px;
            border: 1px solid #FF6358;
        }
    </style>
<?php require_once '../include/footer.php'; ?>
