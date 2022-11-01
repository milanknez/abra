<?php

require_once '../lib/Kendo/Autoload.php';
require_once '../include/header.php';
?>
<div class="demo-section k-content">
        <h4>Show e-mails from:</h4>
        <div>
<?php
$datePicker = new \Kendo\UI\DatePicker('datepicker');

$datePicker->value(new DateTime('10/10/2011', new DateTimeZone('UTC')))
           ->attr('style', 'width: 100%')
           ->componentType("modern")
           ->attr('title', 'datepicker');

echo $datePicker->render();
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
            var picker = $("#datepicker").data("kendoDatePicker");
            var type = this.value();
            var parent = $("#datepicker").parent()

            picker.destroy();
            parent.empty();
            parent.append('<input id="datepicker" value="10/10/2011" title="datepicker" style="width: 100%" />');
            $("#datepicker").kendoDatePicker({
                componentType: type
            });
        }
</script>
</div>
<?php require_once '../include/footer.php'; ?>
