<?php
require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';
?>

<div class="demo-section k-content">
    <div>
        <h4>Basic Button</h4>
        <p>
            <?php
                echo (new \Kendo\UI\Button('primaryTextButton'))
                    ->attr('class', 'k-button-solid-primary')
                    ->content('Primary Button')
                    ->render();
            ?>

            <?php
                echo (new \Kendo\UI\Button('textButton'))
                    ->content('Button')
                    ->render();
            ?>
        </p>
    </div>

     <div>
        <h4>Disabled buttons</h4>
        <p>
            <?php
                echo (new \Kendo\UI\Button('primaryDisabledButton'))
                    ->tag('a')
                    ->enable(false)
                    ->attr('class', 'k-button-solid-primary')
                    ->content('Disabled primary button')
                    ->render();
            ?>

            <?php
                echo (new \Kendo\UI\Button('disabledButton'))
                    ->enable(false)
                    ->content('Disabled Button')
                    ->render();
            ?>
        </p>
    </div>

    <div>
       <h4>Buttons with icons</h4>
        <p>
            <?php
                echo (new \Kendo\UI\Button('iconTextButton'))
                    ->tag('a')
                    ->icon('k-icon k-i-filter')
                    ->content('Filter')
                    ->render();
            ?>

            <?php
                echo (new \Kendo\UI\Button('kendoIconTextButton'))
                    ->tag('a')
                    ->icon('filter-clear')
                    ->content('Clear Filter')
                    ->render();
            ?>

            <?php
                echo (new \Kendo\UI\Button('iconButton'))
                    ->tag('em')
                    ->icon('k-icon k-i-refresh')
                    ->render();
            ?>
        </p>
    </div>


    <style>
        .demo-section p {
            margin: 0 0 30px;
            line-height: 50px;
        }
        .demo-section p .k-button {
            margin: 0 10px 0 0;
        }
        .k-primary {
            min-width: 150px;
        }                
    </style>
</div>

<?php require_once '../include/footer.php'; ?>
