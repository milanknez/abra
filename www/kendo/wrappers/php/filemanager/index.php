<?php

require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';

?>

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


    $sortDirectionTool = new Kendo\UI\FileManagerToolbarItem();
    $sortDirectionTool->name('sortDirection');

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
            ->addItem($sortDirectionTool)
            ->addItem($sortFieldTool)
            ->addItem($changeViewTool)
            ->addItem($spacerTool)
            ->addItem($detailsTool)
            ->addItem($searchTool);

    $fileManager = new \Kendo\UI\FileManager('fileManager');
    $fileManager
        ->draggable(true)
        ->resizable(true)
        ->dataSource($dataSource)
        ->contextMenu($contextMenu)
        ->toolbar($toolbar)
        ->uploadUrl("https://demos.telerik.com/kendo-ui/service/FileManager/Upload");

    echo $fileManager->render();
?>

<script>
    $(document).ready(function () {
        var filemanager = $("#fileManager").getKendoFileManager();

        filemanager.executeCommand({ command: "TogglePaneCommand", options: { type: "preview" } });
        filemanager.toolbar.fileManagerDetailsToggle.switchInstance.toggle();
    })
</script>

<?php require_once '../include/footer.php'; ?>