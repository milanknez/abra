<?php
require_once '../lib/Kendo/Autoload.php';

require_once '../include/header.php';
$gauge = new \Kendo\Dataviz\UI\ArcGauge('gauge');
$gauge->value(65)
      ->centerTemplate('<span style="color: #: color #;">#: value #%</span>')
      ->scale(array( 'min' => 0, 'max' => 100, 'startAngle' => 90, 'endAngle' => 360 + 90));

$slider = new \Kendo\UI\Slider('gauge-value');
$slider->min(0)
       ->max(100)
       ->value(65)
       ->showButtons(false)
       ->change('updateValue')
       ->attr('title', 'slider');

?>

<div id="example">
    <div id="gauge-container" class="demo-section">
        <?php 
            echo $gauge->render();
            echo $slider->render();
        ?>
    </div>
    <script>
        function updateValue() {
            $("#gauge").data("kendoArcGauge").value($("#gauge-value").val());
        }
    </script>
    <style>
        #gauge-container {
            width: 300px;
            text-align: center;
            margin: 0 auto 30px auto;
        }

        .k-arcgauge-center-label {
            position: absolute;
            text-align: center;
            padding: 0;
            margin: 0;
        }

        .k-arcgauge-center-label {
            font-size: 30px;
        }
    </style>
</div>


<?php require_once '../include/footer.php'; ?>