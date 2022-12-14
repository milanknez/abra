<?php

require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';
require_once '../include/dropdowntree_data.php';

?>

<?php
    $data = categories();
    $dataSource = new \Kendo\Data\DataSource();
    $dataSource->data($data);

    $dropdowntree = new \Kendo\UI\DropDownTree('dropdowntree');
    $dropdowntree
        ->placeholder('Select ...')
        ->checkboxes(true)
        ->filter('startswith')
        ->dataSource($dataSource);
?>

<div id="example">
    <div class="demo-section k-content">
        <h4>Select an item</h4>
        <?php echo $dropdowntree->render(); ?>
    </div>
    <div class="box wide">
        <div class="box-col">
            <h4>Focus</h4>
            <ul class="keyboard-legend">
                <li>
                    <span class="button-preview">
                        <span class="key-button leftAlign wider">Alt</span>
                        +
                        <span class="key-button">w</span>
                    </span>
                    <span class="button-descr">
                        focuses the widget
                    </span>
                </li>
            </ul>
        </div>
        <div class="box-col">
            <h4>Closed popup:</h4>
            <ul class="keyboard-legend">
                <li>
                    <span class="button-preview">
                        <span class="key-button wide leftAlign">left arrow</span>
                    </span>
                    <span class="button-descr">
                        highlights previous selected item
                    </span>
                </li>
                <li>
                    <span class="button-preview">
                        <span class="key-button wider leftAlign">right arrow</span>
                    </span>
                    <span class="button-descr">
                        highlights next selected item
                    </span>
                </li>
                <li>
                    <span class="button-preview">
                        <span class="key-button">home</span>
                    </span>
                    <span class="button-descr">
                        highlights first selected item
                    </span>
                </li>
                <li>
                    <span class="button-preview">
                        <span class="key-button">end</span>
                    </span>
                    <span class="button-descr">
                        highlights last selected item
                    </span>
                </li>
                <li>
                    <span class="button-preview">
                        <span class="key-button wider rightAlign">delete</span>
                    </span>
                    <span class="button-descr">
                        deletes highlighted item
                    </span>
                </li>
                <li>
                    <span class="button-preview">
                        <span class="key-button wider rightAlign">backspace</span>
                    </span>
                    <span class="button-descr">
                        deletes the highlighted item or the last item
                    </span>
                </li>
                <li>
                    <span class="button-preview">
                        <span class="key-button wider leftAlign">Alt + down arrow</span>
                    </span>
                    <span class="button-descr">
                        opens the popup
                    </span>
                </li>
                <li>
                    <span class="button-preview">
                        <span class="key-button">esc</span>
                    </span>
                    <span class="button-descr">
                        clears all items
                    </span>
                </li>
            </ul>
        </div>
        <div class="box-col">
            <h4>Opened popup:</h4>
            <ul class="keyboard-legend">
                <li>
                    <span class="button-preview">
                        <span class="key-button wide leftAlign">up arrow</span>
                    </span>
                    <span class="button-descr">
                        highlights previous item
                    </span>
                </li>
                <li>
                    <span class="button-preview">
                        <span class="key-button wider leftAlign">down arrow</span>
                    </span>
                    <span class="button-descr">
                        highlights next item
                    </span>
                </li>
                <li>
                    <span class="button-preview">
                        <span class="key-button">home</span>
                    </span>
                    <span class="button-descr">
                        highlights first item in the popup
                    </span>
                </li>
                <li>
                    <span class="button-preview">
                        <span class="key-button">end</span>
                    </span>
                    <span class="button-descr">
                        highlights last item in the popup
                    </span>
                </li>
                <li>
                    <span class="button-preview">
                        <span class="key-button">esc</span>
                    </span>
                    <span class="button-descr">
                        closes the popup
                    </span>
                </li>
                <li>
                    <span class="button-preview">
                        <span class="key-button wide leftAlign">Alt + up arrow</span>
                    </span>
                    <span class="button-descr">
                        closes the popup
                    </span>
                </li>
            </ul>
        </div>
        <div class="box-col">
            <h4>Navigate inside treeview</h4>
            <ul class="keyboard-legend">
                <li>
                    <span class="button-preview">
                        <span class="key-button wider leftAlign">up arrow</span>
                    </span>
                    <span class="button-descr">
                        highlights previous item
                    </span>
                </li>
                <li>
                    <span class="button-preview">
                        <span class="key-button wider leftAlign">left arrow</span>
                    </span>
                    <span class="button-descr">
                        collapses the item
                    </span>
                </li>
                <li>
                    <span class="button-preview">
                        <span class="key-button wider leftAlign">down arrow</span>
                    </span>
                    <span class="button-descr">
                        highlights next item
                    </span>
                </li>
                <li>
                    <span class="button-preview">
                        <span class="key-button wider leftAlign">right arrow</span>
                    </span>
                    <span class="button-descr">
                        expands the item
                    </span>
                </li>
                <li>
                    <span class="button-preview">
                        <span class="key-button">home</span>
                    </span>
                    <span class="button-descr">
                        highlights first item in the list
                    </span>
                </li>
                <li>
                    <span class="button-preview">
                        <span class="key-button">end</span>
                    </span>
                    <span class="button-descr">
                        highlights last item in the list
                    </span>
                </li>
                <li>
                    <span class="button-preview">
                        <span class="key-button wider rightAlign">enter</span>
                    </span>
                    <span class="button-descr">
                        selects highlighted item when there are no checkboxes
                    </span>
                </li>
                <li>
                    <span class="button-preview">
                        <span class="key-button wider rightAlign">space</span>
                    </span>
                    <span class="button-descr">
                        checks highlighted item when there are checkboxes
                    </span>
                </li>
            </ul>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {

        //focus the widget
        $(document).on("keydown.examples", function (e) {
            if (e.altKey && e.keyCode === 87 /* w */) {
                $("#dropdowntree").data("kendoDropDownTree").wrapper.focus();
            }
        });
    });
</script>

<style>
    .k-dropdowntree  { width: 100%; }
</style>

<?php require_once '../include/footer.php'; ?>
