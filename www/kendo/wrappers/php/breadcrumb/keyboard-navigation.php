<?php
require_once '../lib/Kendo/Autoload.php';
require_once '../include/header.php';
?>

<div class="demo-section k-content wide">
    <h4>Breadcrumb - Editable</h4>
    <?php
        $breadcrumbEditable = new \Kendo\UI\Breadcrumb('breadcrumbEdit');

        $rootItemEditable = new \Kendo\UI\BreadcrumbItem();
        $rootItemEditable->type("rootItem")
                         ->text("All Components")
                         ->showText(false)
                         ->icon("home")
                         ->showIcon(true);

        $firstItemEditable = new \Kendo\UI\BreadcrumbItem();
        $firstItemEditable->type("item")
                          ->text("Breadcrumb")
                          ->showText(true);

        $secondItemEditable = new \Kendo\UI\BreadcrumbItem();
        $secondItemEditable->type("item")
                           ->text("Keyboard navigation")
                           ->showText(true);

        $breadcrumbEditable->addItem($rootItemEditable);
        $breadcrumbEditable->addItem($firstItemEditable);
        $breadcrumbEditable->addItem($secondItemEditable);
        $breadcrumbEditable->editable(true);
        $breadcrumbEditable->navigational(false);

        echo $breadcrumbEditable->render();
     ?>
</div>

<div class="demo-section k-content wide">
    <h4>Breadcrumb - Navigational</h4>
    <?php
        $breadcrumbNavigational = new \Kendo\UI\Breadcrumb('breadcrumbNav');

        $rootItemNavigational = new \Kendo\UI\BreadcrumbItem();
        $rootItemNavigational->type("rootItem")
                             ->href("https://demos.telerik.com/php-ui/")
                             ->text("All Components")
                             ->showText(false)
                             ->icon("home")
                             ->showIcon(true);

        $firstItemNavigational = new \Kendo\UI\BreadcrumbItem();
        $firstItemNavigational->type("item")
                              ->href("https://demos.telerik.com/php-ui/breadcrumb")
                              ->text("Breadcrumb")
                              ->showText(true);

        $secondItemNavigational = new \Kendo\UI\BreadcrumbItem();
        $secondItemNavigational->type("item")
                               ->href("https://demos.telerik.com/php-ui/breadcrumb/keyboard-navigation")
                               ->text("Keyboard Navigation")
                               ->showText(true);

        $breadcrumbNavigational->addItem($rootItemNavigational);
        $breadcrumbNavigational->addItem($firstItemNavigational);
        $breadcrumbNavigational->addItem($secondItemNavigational);
        $breadcrumbNavigational->editable(false);
        $breadcrumbNavigational->navigational(true);

        echo $breadcrumbNavigational->render();
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
     <h4>Keyboard legend</h4>
     <ul class="keyboard-legend">
          <li>
          <span class="button-preview">
               <span class="key-button leftAlign wider">Alt</span>
               +
               <span class="key-button">W</span>
          </span>
          <span class="button-descr">
               focuses the editable breadcrumb
          </span>
          </li>
          <li>
          <span class="button-preview">
               <span class="key-button wider leftAlign">Enter</span>
          </span>
          <span class="button-descr">
               When the widget is focused and <u>editable</u> is set to true, triggers edit mode.
               <br />
               When an item is focused and <u>navigational</u> is set to true, navigates to the url.
               <br />
               When in edit mode, saves the changes, exits edit mode and focuses the root item.
          </span>
          </li>
          <li>
          <span class="button-preview">
               <span class="key-button wider leftAlign">Tab</span>
          </span>
          <span class="button-descr">
               When the widget is focused, navigates through the items.
          </span>
          </li>
          <li>
          <span class="button-preview">
               <span class="key-button wider leftAlign">Esc</span>
          </span>
          <span class="button-descr">
               Exits edit mode without saving the changes.
          </span>
          </li>
     </ul>
</div>

<script>
     $(document.body).keydown(function(e) {
          if (e.altKey && e.keyCode === 87 /* w */) {
               $("#breadcrumbEdit").data("kendoBreadcrumb").wrapper.focus();
          }
     });
</script>

<?php require_once '../include/footer.php'; ?>