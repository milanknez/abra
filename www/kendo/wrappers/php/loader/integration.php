<?php

require_once '../lib/Kendo/Autoload.php';

require_once '../include/header.php';

?>

<div class="demo-section k-content k-text-center">
    <button id="toggle" class="k-button">
        <?php
            $loader = new \Kendo\UI\Loader('loader');

            $loader->visible(false)
                   ->size('small');

            echo $loader->render();
        ?>
        Show Loader
    </button>    
</div>

<script>
    
    $("#toggle").click(function () {
    	var loader = $('#loader').data('kendoLoader');
        loader.show();
        setTimeout(function () {
            loader.hide();
        }, 3000)
    })
</script>

<style>
    .k-button > .k-loader {
        margin-right: 8px;
    }
</style>


<?php require_once '../include/footer.php'; ?>