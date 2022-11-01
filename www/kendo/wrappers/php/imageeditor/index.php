<?php
require_once '../lib/Kendo/Autoload.php';
require_once '../include/header.php';
?>

<div class="demo-section k-content wide">
<?php
        $imageEditor = new \Kendo\UI\ImageEditor('imageEditor');
        $imageEditor
            ->width("100%")
            ->height(900)
            ->imageUrl("../content/shared/images/photos/2.jpg");

        $saveAs = new \Kendo\UI\ImageEditorSaveAs();
        $saveAs -> fileName("image_edited.png");

        $imageEditor -> saveAs($saveAs);

        echo $imageEditor->render();
     ?>
</div>

<script>
    $(document).ready(function(){
        var imageEditor = $("#imageEditor").getKendoImageEditor();

        imageEditor.one("imageRendered",function(){
            imageEditor.executeCommand({ command: "ZoomImageEditorCommand", options: imageEditor.getZoomLevel() - 0.2 });
        });
    });
</script>

<?php require_once '../include/footer.php'; ?>