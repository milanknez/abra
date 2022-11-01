<?php
require_once '../lib/Kendo/Autoload.php';
require_once '../include/header.php';
?>

<div class="demo-section k-rtl k-content wide">
    <h4>Breadcrumb Rigth-To-Left Support</h4>
    <?php
        $breadcrumb = new \Kendo\UI\Breadcrumb('breadcrumb');

        $rootItem = new \Kendo\UI\BreadcrumbItem();
        $rootItem->type("rootItem")
             ->href("https://demos.telerik.com/php-ui/")
             ->text("All Components")
             ->showText(true)
             ->icon("home")
             ->showIcon(true)
             ->itemClass("root")
             ->iconClass("root")
             ->linkClass("root");

        $firstItem = new \Kendo\UI\BreadcrumbItem();
        $firstItem->type("item")
                    ->href("/breadcrumb")
                    ->text("Breadcrumb")
                    ->showText(true)
                    ->itemClass("item")
                    ->iconClass("item")
                    ->linkClass("item");

        $secondItem = new \Kendo\UI\BreadcrumbItem();
        $secondItem->type("item")
                    ->href("/right-to-left-support")
                    ->text("Right-To-Left")
                    ->showText(true)
                    ->itemClass("item")
                    ->iconClass("item")
                    ->linkClass("item");

        $breadcrumb->addItem($rootItem);
        $breadcrumb->addItem($firstItem);
        $breadcrumb->addItem($secondItem);

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
<style>
    .k-i-home {
        margin-left: 14px;
    }
</style>

<?php require_once '../include/footer.php'; ?>