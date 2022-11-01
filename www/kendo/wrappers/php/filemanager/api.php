<?php

require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';

?>

<div class="box wide">
    <div class="box-col">
        <h4>API methods</h4>
        <ul class="options">
            <li>
                <button id="path" class="k-button">Get path</button>
            </li>
            <li>
                <button id="getView" class="k-button">Get view</button>
            </li>
            <li>
                <button id="refresh" class="k-button">Refresh</button>
            </li>
        </ul>
    </div>
    <div class="box-col">
        <h4>Select view</h4>
        <ul class="options">
            <li>
                <select id="setView">
                    <option value="list">list</option>
                    <option value="grid">grid</option>
                </select>
            </li>
            <li>
                <button id="files" class="k-button">Get selected files/folders</button>
            </li>
            <li>
                <button id="size" class="k-button">Get size</button>
            </li>

        </ul>
    </div>
</div>

<?php
    // The remote service could not be accessed when running the demo site locally because of CORS restrictions.
    // Its implementation could be found on:
    // https://github.com/telerik/kendo-ui-demos-service/blob/master/demos-and-odata-v3/KendoCRUDService/Controllers/FileManagerController.cs
    $read = new \Kendo\Data\DataSourceTransportRead();
    $read->url('https://demos.telerik.com/kendo-ui/service/FileManager/Read')
         ->type('POST');

    $create = new \Kendo\Data\DataSourceTransportCreate();
    $create->url('https://demos.telerik.com/kendo-ui/service/FileManager/Create')
           ->type('POST');

    $update = new \Kendo\Data\DataSourceTransportUpdate();
    $update->url('https://demos.telerik.com/kendo-ui/service/FileManager/Update')
           ->type('POST');

    $destroy = new \Kendo\Data\DataSourceTransportDestroy();
    $destroy->url('https://demos.telerik.com/kendo-ui/service/FileManager/Destroy')
            ->type('POST');

    $transport = new \Kendo\Data\DataSourceTransport();
    $transport->read($read)
              ->create($create)
              ->update($update)
              ->destroy($destroy);

    $dataSource = new \Kendo\Data\DataSource();
    $dataSource->transport($transport);

    $renameContextMenuItem = new \Kendo\UI\FileManagerContextMenuItem();
    $renameContextMenuItem->name('rename');

    $deleteContextMenuItem = new \Kendo\UI\FileManagerContextMenuItem();
    $deleteContextMenuItem->name('delete');

    $contextMenu = new \Kendo\UI\FileManagerContextMenu();
    $contextMenu->addItem($renameContextMenuItem)
                ->addItem($deleteContextMenuItem);

    $createFolderTool = new Kendo\UI\FileManagerToolbarItem();
    $createFolderTool->name('createFolder');

    $uploadTool = new Kendo\UI\FileManagerToolbarItem();
    $uploadTool->name('upload');

    $sortFieldTool = new Kendo\UI\FileManagerToolbarItem();
    $sortFieldTool->name('sortField');

    $changeViewTool = new Kendo\UI\FileManagerToolbarItem();
    $changeViewTool->name('changeView');

    $spacerTool = new Kendo\UI\FileManagerToolbarItem();
    $spacerTool->name('spacer');

    $detailsTool = new Kendo\UI\FileManagerToolbarItem();
    $detailsTool->name('details');

    $searchTool = new Kendo\UI\FileManagerToolbarItem();
    $searchTool->name('search');

    $toolbar = new \Kendo\UI\FileManagerToolbar();
    $toolbar->addItem($createFolderTool)
            ->addItem($uploadTool)
            ->addItem($sortFieldTool)
            ->addItem($changeViewTool)
            ->addItem($spacerTool)
            ->addItem($detailsTool)
            ->addItem($searchTool);

    $fileManager = new \Kendo\UI\FileManager('fileManager');
    $fileManager
        ->draggable(true)
        ->dataSource($dataSource)
        ->contextMenu($contextMenu)
        ->toolbar($toolbar)
        ->uploadUrl("https://demos.telerik.com/kendo-ui/service/FileManager/Upload");

    echo $fileManager->render();
?>

<script>
    $(document).ready(function() {
        var filemanager = $("#fileManager").getKendoFileManager();

        $("#setView").kendoDropDownList({
            optionLabel: "Select view...",
            change: function() {
                filemanager.view($("#setView").val());
            }
        });

        $("#path").click(function () {
            alert(filemanager.path());
        });

        $("#getView").click(function () {
            alert(filemanager.view().widgetComponent.options.name);
        });

        $("#refresh").click(function () {
            filemanager.refresh();
        });

        $("#files").click(function () {
            var selectedString = $.map(filemanager.getSelected(), function (obj) {
                return obj.name
            }).join(',');

            alert(selectedString);
        });

        $("#size").click(function () {
            var size = filemanager.size();
            alert("width: " + size.width + ", height: " + size.height);
        });
    });
</script>

<?php require_once '../include/footer.php'; ?>