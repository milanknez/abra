<?php
require_once '../lib/Kendo/Autoload.php';
require_once '../include/header.php';
?>

<div class="demo-section k-content wide">
    <h4>Breadcrumb Icons</h4>
    <?php
        $breadcrumb = new \Kendo\UI\Breadcrumb('breadcrumb');

        $rootItem = new \Kendo\UI\BreadcrumbItem();
        $rootItem->type("rootItem")
             ->href("https://demos.telerik.com/php-ui/")
             ->text("All Components")
             ->showText(true)
             ->icon("globe")
             ->showIcon(true);

        $firstItem = new \Kendo\UI\BreadcrumbItem();
        $firstItem->type("item")
                    ->href("/breadcrumb")
                    ->text("Breadcrumb")
                    ->showText(true)
                    ->icon("gear")
                    ->showIcon(true);

        $secondItem = new \Kendo\UI\BreadcrumbItem();
        $secondItem->type("item")
                    ->href("/icons")
                    ->text("Icons")
                    ->icon("cloud")
                    ->showIcon(true)
                    ->showText(true);

        $breadcrumb->addItem($rootItem);
        $breadcrumb->addItem($firstItem);
        $breadcrumb->addItem($secondItem);
        $breadcrumb->delimiterIcon("line");

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
<?php require_once '../include/footer.php'; ?>