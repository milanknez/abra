<?php
require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';
?>
<div class="demo-section k-content">
    <h4>Set alarm time</h4>
    <div>
<?php
$timePicker = new \Kendo\UI\TimePicker('timepicker');
$timePicker->value('10:00 AM');
$timePicker->attr('style', 'width: 100%');
$timePicker->attr('title', 'timepicker');
$timePicker->componentType('modern');
$timePicker->dateInput(true);

echo $timePicker->render();
?>
    </div>
  <div class="box">
     <div class="box-col">
         <h4>Set component  type</h4>
         <?php
            $ddl = new \Kendo\UI\DropDownList('ddl');

            $ddl->value('modern')
                ->change('onChange')
                ->dataSource(array('modern', 'classic'));

            echo $ddl->render();
        ?>
     </div>
 </div>

<script>
        function onChange(e) {
            var picker = $("#timepicker").data("kendoTimePicker");
            var type = this.value();
            var format = picker.options.format;
            var value = picker.value();
            var parent = $("#timepicker").parent();

            picker.destroy();
            parent.empty();
            parent.append('<input id="timepicker" title="timepicker" style="width: 100%;" />');
            $("#timepicker").kendoTimePicker({
                format: format,
                value: value,
                componentType: type
            });
        }
</script>
</div>

<?php require_once '../include/footer.php'; ?>
