<?php

require_once '../lib/Kendo/Autoload.php';
require_once '../include/header.php';
?>
<div class="demo-section k-content">
    <h4>Remind me on</h4>
    <div>
<?php
$dateTimePicker = new \Kendo\UI\DateTimePicker('datetimepicker');

$dateTimePicker->value(new DateTime('now', new DateTimeZone('UTC')))
           ->attr('style', 'width: 100%')
           ->attr('title', 'datetimepicker')
           ->componentType('modern')
           ->dateInput(true);

echo $dateTimePicker->render();
?>
    </div>
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
            var picker = $("#datetimepicker").data("kendoDateTimePicker");
            var type = this.value();
            var value = picker.value();
            var parent = $("#datetimepicker").parent();

            picker.destroy();
            parent.empty();
            parent.append('<input id="datetimepicker" title="datetimepicker" style="width: 100%;" />')

            $("#datetimepicker").kendoDateTimePicker({
                componentType: type,
                value:value
            });
        }
</script>

<?php require_once '../include/footer.php'; ?>
