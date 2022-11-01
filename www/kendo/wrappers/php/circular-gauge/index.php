<?php
require_once '../lib/Kendo/Autoload.php';

require_once '../include/header.php';
$gauge = new \Kendo\Dataviz\UI\CircularGauge('gauge');
$gauge->value(55)
      ->centerTemplate('Temperature')
      ->scale(array( 
          'min' => 0,
          'max' => 140,
          'majorTicks' => array( 
            'visible' => true
          ),
          'minorTicks' => array( 
            'visible' => true
          ),
          'labels' => array( 
            'visible' => true
          )
        ));

$slider = new \Kendo\UI\Slider('gauge-value');
$slider->min(0)
       ->max(140)
       ->value(55)
       ->showButtons(true)
       ->change('updateValue')
       ->attr('title', 'slider');
?>

<div id="gauge-container">
<?php
	echo $gauge->render();
	echo $slider->render();
?>
</div>

<script>
    function updateValue() {
        $("#gauge").data("kendoCircularGauge").value($("#gauge-value").val());
    }

</script>

<style>
        #gauge-container {
            width: 386px;
            height: 386px;
            text-align: center;
            margin: 20px auto 30px auto;
        }

        #gauge {
            width: 350px;
            height: 300px;
            margin: 0 auto;
        }

        #gauge-container .k-slider {
            margin-top: 15px;
            width: 250px;
        }
    </style>

<?php require_once '../include/footer.php'; ?>
