<?php
require_once '../lib/Kendo/Autoload.php';
require_once '../include/timeline.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header('Content-Type: application/json');

    $result = timeline_data();

    echo json_encode($result);

    exit;
}

require_once '../include/header.php';

?>

 <div class="demo-section k-content wide">
<?php

    $transport = new \Kendo\Data\DataSourceTransport();
    $transport->read(array('url' => 'index.php', 'type' => 'POST', 'dataType' => 'json'));;

    $model = new \Kendo\Data\DataSourceSchemaModel();

    $datefield = new \Kendo\Data\DataSourceSchemaModelField('date');
    $datefield->type('date');

    $model->addField($datefield);

    $schema = new \Kendo\Data\DataSourceSchema();
    $schema->model($model);

    $dataSource = new \Kendo\Data\DataSource();

    $dataSource->transport($transport)
               ->schema($schema);


    $timeline = new \Kendo\UI\Timeline('timeline');


    $timeline->orientation("vertical")
             ->dataSource($dataSource)
             ->collapsibleEvents(true)
             ->alternatingMode(true)
             ->navigatable(true);

    echo $timeline->render();
?>
</div>

<div class="box wide">
   <div class="box-col">
      <h3>Focus</h3>
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
      <h3>Actions applied in vertical mode</h3>
      <h4>Actions on card</h4>
      <ul class="keyboard-legend">
         <li>
            <span class="button-preview">
            <span class="key-button">Tab</span>
            </span>
            <span class="button-descr">
            Focus next card
            </span>
         </li>
         <li>
            <span class="key-button leftAlign">Shift</span>
            +
            <span class="key-button">Tab</span>
            <span class="button-descr">
            Focus previous card
            </span>
         </li>
         <li>
            <span class="button-preview">
            <span class="key-button">Space</span>
            </span>
            <span class="button-descr">
            Toggle the expand/collapse state of the item
            </span>
         </li>
         <li>
            <span class="button-preview">
            <span class="key-button">Enter</span>
            </span>
            <span class="button-descr">
            Toggle the expand/collapse state of the item
            </span>
         </li>
      </ul>
      <h3>Actions applied in horizontal mode</h3>
      <h4>Actions on the date list</h4>
      <ul class="keyboard-legend">
         <li>
            <span class="button-preview">
            <span class="key-button">Left arrow</span>
            </span>
            <span class="button-descr">
            Focuses the previous date
            </span>
         </li>
         <li>
            <span class="button-preview">
            <span class="key-button">Right arrow</span>
            </span>
            <span class="button-descr">
            Focuses the next date
            </span>
         </li>
         <li>
            <span class="button-preview">
            <span class="key-button">Enter</span>
            </span>
            <span class="button-descr">
            Selects the current event
            </span>
         </li>
         <li>
            <span class="button-preview">
            <span class="key-button">Spacebar</span>
            </span>
            <span class="button-descr">
            Selects the current event
            </span>
         </li>
      </ul>
   </div>
</div>

<script>
    $(document.body).keydown(function (e) {
            if (e.altKey && e.keyCode == 87) {
                $(".k-card:first").focus();
            }
        });
</script>

<?php require_once '../include/footer.php'; ?>