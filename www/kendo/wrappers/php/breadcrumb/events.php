<?php
require_once '../lib/Kendo/Autoload.php';
require_once '../include/header.php';
?>

<div class="demo-section k-content wide">
    <h4>Breadcrumb Events</h4>
    <?php
        $breadcrumb = new \Kendo\UI\Breadcrumb('breadcrumb');

        $rootItem = new \Kendo\UI\BreadcrumbItem();
        $rootItem->type("rootItem")
             ->href("https://demos.telerik.com/php-ui/")
             ->text("All Components")
             ->showText(true)
             ->icon("home")
             ->showIcon(true);

        $firstItem = new \Kendo\UI\BreadcrumbItem();
        $firstItem->type("item")
                    ->href("/breadcrumb")
                    ->text("Breadcrumb")
                    ->showText(true);

        $secondItem = new \Kendo\UI\BreadcrumbItem();
        $secondItem->type("item")
                    ->href("/events")
                    ->text("Events")
                    ->showText(true);

        $breadcrumb->addItem($rootItem);
        $breadcrumb->addItem($firstItem);
        $breadcrumb->addItem($secondItem);
        $breadcrumb->editable("true");
        $breadcrumb->click("onClick");
        $breadcrumb->change("onChange");

        echo $breadcrumb->render();
     ?>
</div>
<div class="box wide">
        <ul>
            <li>
                <button class="k-button" onClick="window.location.reload()">
                    <span class="k-icon k-i-refresh"></span>Refresh Breadcrumb
                </button>
            </li>
        </ul>
</div>
<div class="box wide">
     <h4>Console log</h4>
     <div class="console"></div>
</div>

<script>
     function onClick(e) {
          kendoConsole.log("Clicked. :: target: " + e.item.text + ". Type :: " + e.item.type);
     }

     function onChange(e) {
          kendoConsole.log("Changed. New Value :: " + e.value);
     }
</script>

<?php require_once '../include/footer.php'; ?>