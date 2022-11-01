<?php
require_once '../lib/Kendo/Autoload.php';
require_once '../include/header.php';
?>

<div class="demo-section k-content wide">
	<label class="label">How to get in touch?</label>
    <?php
        $radiogroup = new \Kendo\UI\RadioGroup('radiogroup');

        $radiogroup->labelPosition("after")
            ->layout("vertical")
            ->value("one");


        $radioFirst = new \Kendo\UI\RadioGroupItem();
        $radioFirst->label("Phone (SMS)")
            ->value("one");
			
		$radioSecond = new \Kendo\UI\RadioGroupItem();
		$radioSecond->label("E-mail")
            ->value("two");

        $radiogroup->addItem($radioFirst);
        $radiogroup->addItem($radioSecond);
        $radiogroup->addItem("None");

        $radiogroup->focus("onFocus")
            ->select("onSelect")
            ->change("onChange");

        echo $radiogroup->render();
     ?>
	 <div class="k-form-hint">You won`t be receiving advertising materials.</div>
</div>
<div class="box">
    <h4>Console log</h4>
    <div class="console"></div>
</div>
<script>
    function onChange(e) {
         kendoConsole.log("Change: --> Old value: " + e.oldValue + " --> New value: " + e.newValue);
    }

    function onFocus(e) {
         kendoConsole.log("Focused: " + $(e.target[0]).val());
    }

    function onSelect(e) {
        kendoConsole.log("Selected: " + $(e.target[0]).val());
    }
</script>
<style>
    .label {
        font: normal 14px/16px Metric, Arial, Helvetica, sans-serif;
        color: #656565;
        display: inline-block;
        text-transform: uppercase;
        margin-bottom: 10px;
    }

    .k-form-hint {
        margin-top: 10px;
		font-style: italic;
		color: gray;
    }
</style>

<?php require_once '../include/footer.php'; ?>