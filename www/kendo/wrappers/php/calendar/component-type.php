<?php
require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';
?>

<div class="demo-section k-content" style="text-align: center;">
    <h4>Pick a date</h4>
<?php
$calendar = new \Kendo\UI\Calendar('calendar');
$calendar->componentType('modern');

echo $calendar->render();
?>
</div>

<div class="box">
     <div class="box-col">
         <h4>Set component  type</h4>
         <div>
            <?php
                $ddl = new \Kendo\UI\DropDownList('ddl');

                $ddl->value('modern')
                    ->change('onChange')
                    ->dataSource(array('modern', 'classic'));

                echo $ddl->render();
            ?>
        </div>
     </div>
 </div>

<script>
        function onChange(e) {
            var calendar = $("#calendar").data("kendoCalendar");
            var type = this.value();
            var parent = $("#calendar").parent();

            calendar.destroy();
            parent.empty();
            parent.append('<div id="calendar"></div>');
            $("#calendar").kendoCalendar({
                componentType: type
            });
        }
</script>

<?php require_once '../include/footer.php'; ?>
