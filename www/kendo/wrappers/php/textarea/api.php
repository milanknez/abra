<?php
require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';

$label = new \Kendo\UI\TextAreaLabel();
$label->content("Description");
$label->Floating(true);

$textarea = new \Kendo\UI\TextArea('description');
$textarea->label($label)
        ->rows(5);
?>

<div class="demo-section k-content">
    <h4>Set value</h4>
    <?php
        echo $textarea->render();
    ?>
</div>

<div class="box wide">
    <div class="box-col">
        <h4>Get / Set Value</h4>
        <ul class="options">
            <li>
               <button id="get" class="k-button">Get value</button> or <button id="focus" class="k-button">Focus</button>
           </li>
           <li>
               <input id="value" value="Lorem ipsum dolor sit amet" />
               <button id="set" class="k-button">Set value</button>
           </li>
        </ul>
    </div>
    <div class="box-col">
        <h4>Enable / Disable</h4>
        <ul class="options">
            <li>
                <button id="enable" class="k-button">Enable</button>
                <button id="disable" class="k-button">Disable</button>
            </li>
            <li>
                <button id="readonly" class="k-button">Readonly</button>
            </li>
        </ul>
    </div>
</div>

<script>
    $(document).ready(function() {
        var textarea = $("#description").data("kendoTextArea");

        var setValue = function () {
            textarea.value($("#value").val());
            textarea.floatingLabel.refresh();
        };

        $("#enable").click(function() {
            textarea.enable();
        });

        $("#disable").click(function() {
            textarea.enable(false);
        });

        $("#readonly").click(function() {
            textarea.readonly();
        });

        $("#focus").click(function() {
            textbox.focus();
        });

        $("#value").kendoTextBox({
            change: setValue
        });

        $("#set").click(setValue);

        $("#get").click(function() {
            alert(textarea.value());
        });
    });
</script>

<style>
    .k-floating-label-container {
        width: 100%;
    }
</style>

<?php require_once '../include/footer.php'; ?>
