<?php

require_once '../lib/Kendo/Autoload.php';

require_once '../include/header.php';

?>
<div class="demo-section k-content">
        <h4>
            Pick the Loader's type:
        </h4>
        <?php
            $type = new \Kendo\UI\DropDownList('type');

            $type->change('onChange')
                ->dataTextField('text')
                ->dataValueField('value')
                ->dataSource(array(
                    array('text' => 'pulsing', 'value' => 1),
                    array('text' => 'infinite-spinner', 'value' => 2),
                    array('text' => 'converging-spinner', 'value' => 3)
                ));

            echo $type->render();
        ?>
</div>   
<div class="k-d-flex k-align-items-center">
    <div class="k-flex-1 k-text-center">
        <div>Small</div>
        <div class="example-item-wrap k-d-flex k-align-items-center k-justify-content-center">
            <?php
                $loaderSmall = new \Kendo\UI\Loader('loaderSmall');

                $loaderSmall->size('small');
                    
                echo $loaderSmall->render();
            ?>
        </div>
    </div>
    <div class="example-item k-flex-1 k-text-center">
        <div>Medium</div>
        <div class="example-item-wrap k-d-flex k-align-items-center k-justify-content-center">
        <?php
                $loaderMedium = new \Kendo\UI\Loader('loaderMedium');

                $loaderMedium->size('medium');
                    
                echo $loaderMedium->render();
        ?>
        </div>
    </div>
    <div class=" example-item k-flex-1 k-text-center">
        <div>Large</div>
        <div class="example-item-wrap k-d-flex k-align-items-center k-justify-content-center">
        <?php
                $loaderLarge = new \Kendo\UI\Loader('loaderLarge');

                $loaderLarge->size('large');
                    
                echo $loaderLarge->render();
        ?>
        </div>
    </div>
</div>

<script>
    
	function onChange(e) {
		var smallLoader = $('#loaderSmall').data("kendoLoader");
	    var mediumLoader = $('#loaderMedium').data("kendoLoader");
	    var largeLoader = $('#loaderLarge').data("kendoLoader");
	    
        smallLoader.setOptions({ type: e.sender.text() })
        mediumLoader.setOptions({ type: e.sender.text() })
        largeLoader.setOptions({ type: e.sender.text() });
	}

</script>

<style>
    .example-item-wrap {
        min-height: 80px;
    }
</style>


<?php require_once '../include/footer.php'; ?>