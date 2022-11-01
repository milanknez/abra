<?php

require_once '../lib/Kendo/Autoload.php';
require_once '../include/header.php';

?>

<script>
    function onDataBound(e) {
        setBadgeText();
    }

    function onColumnDataBound(e) {
        setBadgeText();
    }

    function setBadgeText() {
        var taskBoard = $("#taskBoard").data("kendoTaskBoard");
        var totalToDo = taskBoard.itemsByStatus("todo").length;
        var totalInProgress = taskBoard.itemsByStatus("inProgress").length;
        var totalDone = taskBoard.itemsByStatus("done").length;

        $('#badge-todo').kendoBadge({
            themeColor: 'warning',
            shape: 'circle',
            text: totalToDo
        });

        $('#badge-inProgress').kendoBadge({
            themeColor: 'info',
            shape: 'circle',
            text: totalInProgress
        });

        $('#badge-done').kendoBadge({
            themeColor: 'success',
            shape: 'circle',
            text: totalDone
        });
    }
</script>

<?php
    $columnSettings = new \Kendo\UI\TaskBoardColumnSettings();
    $columnSettings->addButton("editColumn")
                   ->addButton("addCard")
                   ->addButton("deleteColumn")
                   ->width(320)
                   ->template("<span class='column-template-container'>
                        <span class='column-status'>
                            <span class='column-badge' id='badge-#= status #'>0</span>
                            <span class='column-text'>#: text #</span>
                        </span>
                        <span class='column-buttons'>#= buttons #</span>
                    </span>");

    $taskboard = new \Kendo\UI\TaskBoard('taskBoard');
    $taskboard->columnSettings($columnSettings)
              ->columns(array(
                    array("text"=> "To-Do", "id" => 1, "status" => "todo"),
                    array("text"=> "In Progress", "id" => 2, "status" => "inProgress"),
                    array("text"=> "Done", "id" => 3, "status" => "done")
              ))
              ->dataSource(array(
                array( "id"=> 1, "title"=> "Campaigns", "order"=> 1, "description"=> "Create a new landing page for campaign", "status"=> "todo", "color"=> "orange", "image"=> "../content/web/taskboard/taskboard-demo-illustrations-01.png" ),
                array( "id"=> 2, "title"=> "Newsletters", "order"=> 2, "description"=> "Send newsletter", "status"=> "todo", "color"=> "orange", "image"=> "../content/web/taskboard/taskboard-demo-illustrations-02.png" ),
                array( "id"=> 3, "title"=> "Ads Analytics", "order"=> 3, "description"=> "Review ads performance", "status"=> "todo", "color"=> "orange", "image"=> "../content/web/taskboard/taskboard-demo-illustrations-03.png" ),
                array( "id"=> 4, "title"=> "SEO Analytics", "order"=> 4, "description"=> "Review SEO results", "status"=> "todo", "color"=> "orange", "image"=> "../content/web/taskboard/taskboard-demo-illustrations-04.png" ),
                array( "id"=> 5, "title"=> "Customer Research", "order"=> 5, "description"=> "Interview focus groups", "status"=> "todo", "color"=> "orange", "image"=> "../content/web/taskboard/taskboard-demo-illustrations-05.png" ),
                array( "id"=> 6, "title"=> "Testimonials & Case Studies", "order"=> 6, "description"=> "Publish new case study", "status"=> "todo", "color"=> "orange", "image"=> "../content/web/taskboard/taskboard-demo-illustrations-06.png" ),
                array( "id"=> 7, "title"=> "Content", "order"=> 7, "description"=> "Plan content for podcasts", "status"=> "todo", "color"=> "orange", "image"=> "../content/web/taskboard/taskboard-demo-illustrations-07.png" ),
                array( "id"=> 8, "title"=> "Customer Journey", "order"=> 8, "description"=> "Update virtual classrooms' experience", "status"=> "todo", "color"=> "orange", "image"=> "../content/web/taskboard/taskboard-demo-illustrations-08.png" ),
                array( "id"=> 9, "title"=> "Funnel Analytics", "order"=> 9, "description"=> "Funnel analysis", "status"=> "inProgress", "color"=> "blue", "image"=> "../content/web/taskboard/taskboard-demo-illustrations-09.png" ),
                array( "id"=> 10, "title"=> "Customer Research", "order"=> 10, "description"=> "Refine feedback from user interviews", "status"=> "inProgress", "color"=> "blue", "image"=> "../content/web/taskboard/taskboard-demo-illustrations-10.png" ),
                array( "id"=> 11, "title"=> "Campaigns", "order"=> 11, "description"=> "Collaborate with designers on new banners", "status"=> "inProgress", "color"=> "blue", "image"=> "../content/web/taskboard/taskboard-demo-illustrations-11.png" ),
                array( "id"=> 12, "title"=> "Campaigns", "order"=> 12, "description"=> "Schedule social media for release", "status"=> "inProgress", "color"=> "blue", "image"=> "../content/web/taskboard/taskboard-demo-illustrations-12.png" ),
                array( "id"=> 13, "title"=> "Customer Journey", "order"=> 13, "description"=> "Review shopping cart experience", "status"=> "done", "color"=> "green", "image"=> "../content/web/taskboard/taskboard-demo-illustrations-13.png" ),
                array( "id"=> 14, "title"=> "Content", "order"=> 14, "description"=> "Publish new blogpost", "status"=> "done", "color"=> "green", "image"=> "../content/web/taskboard/taskboard-demo-illustrations-14.png" ),
                array( "id"=> 15, "title"=> "Post-Release Party", "order"=> 15, "description"=> "Plan new release celebration", "status"=> "done", "color"=> "green", "image"=> "../content/web/taskboard/taskboard-demo-illustrations-15.png" )
              ))
              ->dataOrderField("order")
              ->height(970)
              ->width(1025)
              ->dataBound("onDataBound")
              ->columnsDataBound("onColumnDataBound")
              ->template("<div class='template-container'>
                    <span class='template-header'>
                        <span class='template-title'>#: description #</span>
                        <span class='template-menu'>#=cardMenuButton#</span>
                    </span>
                    # if (image != '') { #
                        <img src='#= image #' style='height:135px; width: 270px;'>
                    # } #
                </div>");

    echo $taskboard->render();
?>

<style>
    .template-container {
        padding-top: 10px;
        padding-left: 12px;
    }

    .template-container img {
        margin-top: 10px;
        margin-bottom: 10px;
        margin-left: -10px;
    }

    .column-status {
        padding-top: 5px;
    }

    .column-text {
        padding-left: 10px;
    }

    .column-template-container,
    .template-header {
        width: 100%;
        display: flex;
    }

    .column-buttons,
    .template-menu {
        margin-left: auto;
        margin-right: 0;
    }

    .template-title {
        color: red;
        word-wrap: break-word;
    }
</style>

<?php require_once '../include/footer.php'; ?>