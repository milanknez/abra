<?php
require_once '../lib/Kendo/Autoload.php';
require_once '../include/header.php';
?>

<div class="demo-section k-content">
    <h4>Choose Hike Equipment</h4>
    <div>
        <input type="checkbox" id="selectAllCheckbox" class="k-checkbox">
        <label class="k-checkbox-label" for="selectAllCheckbox">Select all available equipment</label>
    </div>
    <hr />
    <?php
        $checkboxgroup = new \Kendo\UI\CheckBoxGroup("checkboxgroup");

        $checkboxgroup->labelPosition("after")
            ->layout("vertical")
            ->value(array("1", "2"))
            ->inputName("checkboxItem");

        $checkboxOne = new \Kendo\UI\CheckBoxGroupItem();
        $checkboxOne->label("Day pack")
            ->value("1");

        $checkboxgroup->addItem($checkboxOne);

        $checkboxTwo = new \Kendo\UI\CheckBoxGroupItem();
        $checkboxTwo->label("Hiking poles")
            ->value("2");

        $checkboxgroup->addItem($checkboxTwo);
		
		$checkboxThree = new \Kendo\UI\CheckBoxGroupItem();
        $checkboxThree->label("Hiking boots")
            ->value("3");

        $checkboxgroup->addItem($checkboxThree);
		
		$checkboxFour = new \Kendo\UI\CheckBoxGroupItem();
        $checkboxFour->label("UV protection sunglasses")
            ->value("4");

        $checkboxgroup->addItem($checkboxFour);
		
		$checkboxFive = new \Kendo\UI\CheckBoxGroupItem();
        $checkboxFive->label("Trousers")
            ->value("5");

        $checkboxgroup->addItem($checkboxFive);        

        $checkboxgroup->focus("onFocus")
            ->select("onSelect")
            ->change("onChange");

        echo $checkboxgroup->render();
     ?>
</div>
<div class="box">
	<h4>Console log</h4>
	<div class="console"></div>
</div>
<script>
	$("#selectAllCheckbox").change(function () {
        if (this.checked) {
            $("#checkboxgroup").data("kendoCheckBoxGroup").checkAll(true)
        } else {
            $("#checkboxgroup").data("kendoCheckBoxGroup").checkAll(false)
        }
    });
    function onChange(e) {
    	kendoConsole.log("Change event fired: " + $(e.target[0]).val() + " checkbox has been " + ($(e.target[0]).is(":checked") == true ? "checked" : "unchecked" ));
    }

    function onFocus(e) {
    	kendoConsole.log("Focus event fired:: target: " + $(e.target[0]).val());
    }

    function onSelect(e) {
    	kendoConsole.log("Select event fired: " + $(e.target[0]).val() + " checkbox has been " + ($(e.target[0]).is(":checked") == true ? "checked" : "unchecked" ));
    }
</script>
<style>
	hr {
        border: 1px solid darkgrey;
        margin-bottom: 40px;
    }
</style>

<?php require_once '../include/footer.php'; ?>