<?php

require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';

?>

<div class="demo-section hidden-on-narrow k-content wide">
        <div id="bike">
            <div id="bike-tail" class='bike'></div>
            <div id="bike-head" class='bike'></div>
        </div>

        <div class="picker-wrapper">
            <h4>Bike color</h4>
            <?php
                $flatColorPicker = new \Kendo\UI\FlatColorPicker('flatColorPicker');
                $flatColorPicker->attr('class', 'picker')
                    ->preview(true)
                    ->value('#ff0000')
                    ->opacity(true)
                    ->buttons(false)
                    ->change('select');

                echo $flatColorPicker->render();
            ?>
    </div>
        
    </div>

    <div class="responsive-message"></div>

<script>

function select(e) {
	    $(".bike").css("background-color", e.value);
	}

</script>

<style>
     .k-colorgradient-input-label{
         align-self:flex-start;
     }
     .demo-section {
         text-align: center;
         padding: 0 0 16px;
     }

     #bike {
         margin: 0 0 10px;
         background: url(../content/web/colorpicker/background.png);
     }

     #bike-head, #bike-tail {
         background: url(../content/web/colorpicker/motor.png);
         display: inline-block;
         height: 299px;
         width: 241px;
         background-color: #000;
     }

     #bike-tail {
         background-color: #000;
     }

     #bike-head {
         background-color: #e15613;
         background-position: -241px 0;
     }

     .picker-wrapper {
         display: inline-block;
         margin: 0 18px;
     }

     .picker-wrapper h3 {
         padding: 13px 0 5px;
         text-align: left;
     }
 </style>

<?php require_once '../include/footer.php'; ?>

