<?php
require_once '../lib/Kendo/Autoload.php';
require_once '../include/header.php';
?>

<div class="demo-section k-content wide">
    <h4>Breadcrumb API</h4>
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
                    ->href("/api")
                    ->text("API")
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
<div class="box wide">
          <div class="box-col">
               <h4>Get / Set Items</h4>
               <ul class="options">
               <li>
                    <button id="getItems" class="k-button">Get item</button>
                    <button id="resetItems" class="k-button">Reset items</button>
                    <button id="setItems" class="k-button">Set Items</button>
               </li>
               </ul>
          </div>
</div>

<script>
    $(document).ready(function() {

     var breadcrumb = $("#breadcrumb").data("kendoBreadcrumb");
     var setItems = function () {
          breadcrumb.items([
               { type: "rootitem", href: "https://demos.telerik.com/php-ui/", text: "All Components", icon: "globe" },
               { type: "item", href: "/breadcrumb", text: "Breadcrumb", showText: true },
               { type: "item", href: "/api", text: "API", showText: true },
          ])
          };

          $("#setItems").click(setItems);

          $("#getItems").click(function () {
               if (breadcrumb.items()[0]) {
                    alert(breadcrumb.items()[0].text);
               }
          });

          $("#resetItems").click(function () {
               breadcrumb.items([]);
          });
    });
</script>

<?php require_once '../include/footer.php'; ?>