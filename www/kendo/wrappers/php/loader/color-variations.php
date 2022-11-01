<?php

require_once '../lib/Kendo/Autoload.php';

require_once '../include/header.php';

?>
<div class="demo-section k-content">
        <h4>Pick the Loader's type:</h4>
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
<div class="k-d-flex k-align-items-center k-text-center">
    <div class="example-item k-flex-1">
        <div>Primary</div>
        <?php
            $loaderPrimary = new \Kendo\UI\Loader('loaderPrimary');

            $loaderPrimary->themeColor('primary');
                
            echo $loaderPrimary->render();
        ?>
    </div>
    <div class="example-item k-flex-1">
        <div>Secondary</div>
        <?php
            $loaderSecondary = new \Kendo\UI\Loader('loaderSecondary');

            $loaderSecondary->themeColor('secondary');
                
            echo $loaderSecondary->render();
        ?>
    </div>
    <div class="example-item k-flex-1">
        <div>Info</div>
        <?php
            $loaderInfo = new \Kendo\UI\Loader('loaderInfo');

            $loaderInfo->themeColor('info');
                
            echo $loaderInfo->render();
        ?>
    </div>
    <div class="example-item k-flex-1">
        <div>Success</div>
        <?php
            $loaderSuccess = new \Kendo\UI\Loader('loaderSuccess');

            $loaderSuccess->themeColor('success');
                
            echo $loaderSuccess->render();
        ?>
    </div>
    <div class="example-item k-flex-1">
        <div>Warning</div>
        <?php
            $loaderWarning = new \Kendo\UI\Loader('loaderWarning');

            $loaderWarning->themeColor('warning');
                
            echo $loaderWarning->render();
        ?>
    </div>
    <div class="example-item k-flex-1">
        <div>Error</div>
        <?php
            $loaderError = new \Kendo\UI\Loader('loaderError');

            $loaderError->themeColor('error');
                
            echo $loaderError->render();
        ?>
    </div>
</div>

<script>
function onChange(e) {
 		var primary = $('#loaderPrimary').data("kendoLoader");
 	    var secondary = $('#loaderSecondary').data("kendoLoader");
 	    var info = $('#loaderInfo').data("kendoLoader");
 	    var success = $('#loaderSuccess').data("kendoLoader");
 	    var warning = $('#loaderWarning').data("kendoLoader");
 	    var error = $('#loaderError').data("kendoLoader");
 	    
        primary.setOptions({ type: e.sender.text() })
        secondary.setOptions({ type: e.sender.text() })
        info.setOptions({ type: e.sender.text() });
        success.setOptions({ type: e.sender.text() });
        warning.setOptions({ type: e.sender.text() });
        error.setOptions({ type: e.sender.text() });
        
 	}
</script>

<style>
    .example-item > div:first-child {
        margin-bottom: 20px;
    }
</style>

<?php require_once '../include/footer.php'; ?>