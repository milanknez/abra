<?php
require_once '../lib/Kendo/Autoload.php';
require_once '../include/header.php';
?>

<div class="k-d-flex k-justify-content-center">
    <div class="signature-container">
        <?php
        $toolbar = new \Kendo\UI\ToolBar('toolbar');

        $fileUpload = new \Kendo\UI\ToolBarItem();
        $fileUpload->id('fileUpload');
        $fileUpload->template("<label>Upload signature:</label><input name='files' id='files' type='file' aria-label='files'/>");
        $fileUpload->overflow('never');
        $fileUpload->hidden('true');

        $brush = new \Kendo\UI\ToolBarItem();
        $brush->id('brush');
        $brush->template("<label>Brush:</label><input id='colorpicker'/>");
        $brush->overflow('never');

        $sizes = new \Kendo\UI\ToolBarItem();
        $sizes->type('splitButton');
        $sizes->id('sizes');
        $sizes->text('Size');
        $sizes->overflow('never');
        $sizes->click('changeSize');
        $sizes->addMenuButton(
            array("text" => "Normal"),
            array("text" => "Wide")
        );

        $bccolor = new \Kendo\UI\ToolBarItem();
        $bccolor->id('bccolor');
        $bccolor->template("<label>Background:</label><input id='background'/>");
        $bccolor->overflow('never');

        $separator = new \Kendo\UI\ToolBarItem();
        $separator->type('separator');

        $buttonGroup = new \Kendo\UI\ToolBarItem();
        $buttonGroup->type('buttonGroup');
        $buttonGroup->type("buttonGroup");
        $buttonGroup->overflow('never');

        $draw = new \Kendo\UI\ToolBarItemButton();
        $draw->text('Draw');
        $draw->togglable(true);
        $draw->selected(true);
        $draw->group("group1");
        $draw->toggle('alterVisibility');

        $upload = new \Kendo\UI\ToolBarItemButton();
        $upload->text('Upload');
        $upload->togglable(true);
        $upload->group("group1");
        $upload->toggle('alterVisibility');

        $buttonGroup->addButton($draw, $upload);

        $toolbar->addItem(
            $fileUpload,
            $brush,
            $sizes,
            $bccolor,
            $separator,
            $buttonGroup
        );

        echo $toolbar->render();
        ?>
        <div class="signature-wrapper">
            <!-- signature -->
            <?php
            $signature = new \Kendo\UI\Signature('signature');
            $signature->maximizable(false)
                ->hideLine(false);

            echo $signature->render();
            ?>
        </div>
        <div class="notes">
            By using the Kendo UI for jQuery signature component,
            you can enable your end-users to draw handwritten signatures
            using touch or pointer devices.
        </div>
        <?php
        $bottomtoolbar = new \Kendo\UI\ToolBar('bottomtoolbar');

        $save = new \Kendo\UI\ToolBarItem();
        $save->type('button');
        $save->text('Save');
        $save->primary(true);
        $save->icon('save');
        $save->click('save');

        $clear = new \Kendo\UI\ToolBarItem();
        $clear->type('button');
        $clear->text('Clear');
        $clear->click('clear');

        $bottomtoolbar->addItem(
            $save,
            $clear
        );

        echo $bottomtoolbar->render();
        ?>
    </div>
</div>

<?php require_once '../include/footer.php'; ?>

<script>
    $(document).ready(function() {
        var signature = $("#signature").data("kendoSignature");

        $("#colorpicker").kendoColorPicker({
            view: "gradient",
            views: ["gradient", "palette"],
            value: "#000000",
            change: function(e) {
                signature.setOptions({
                    color: e.value
                });
            },
            buttons: false
        });

        $("#background").kendoColorPicker({
            view: "gradient",
            views: ["gradient", "palette"],
            change: function(e) {
                signature.setOptions({
                    backgroundColor: e.value
                });
            },
            buttons: false
        });

        $("#files").kendoUpload({
            multiple: false,
            showFileList: false,
            select: function(e) {
                var fileInfo = e.files[0];
                var wrapper = this.wrapper;

                setTimeout(function() {
                    addPreview(fileInfo, wrapper);
                });
            }
        });
    });

    function alterVisibility(e) {
        var toolbar = $("#toolbar").getKendoToolBar();
        var signature = $("#signature").data("kendoSignature");

        if (e.target.text() === "Draw") {
            signature.readonly(false);
            toolbar.show($("#sizes"));
            toolbar.show($("#brush"));
            toolbar.show($("#bccolor"));
            toolbar.hide($("#fileUpload"));
        } else {
            signature.readonly();
            toolbar.show($("#fileUpload"));
            toolbar.hide($("#sizes"));
            toolbar.hide($("#bccolor"));
            toolbar.hide($("#brush"));
        }
    }


    function addPreview(file, wrapper) {
        var signature = $("#signature").data("kendoSignature");
        var raw = file.rawFile;
        var reader = new FileReader();

        if (raw) {
            reader.onloadend = function() {
                signature.value(this.result);
            };

            reader.readAsDataURL(raw);
        }
    }

    function changeSize(e) {
        var signature = $("#signature").data("kendoSignature");
        signature.setOptions({
            strokeWidth: e.target.text() === "Wide" ? 3 : 1
        });
    }

    function save(e) {
        var signature = $("#signature").data("kendoSignature");
        kendo.saveAs({
            dataURI: signature.value(),
            fileName: "signature.png"
        });
    }

    function clear(e) {
        var signature = $("#signature").data("kendoSignature");
        signature.reset();
    }
</script>

<style>
    .signature-container {
        width: 600px;
    }

    .signature-wrapper {
        height: 270px;
    }

    .signature-wrapper .k-signature {
        width: 100%;
        height: 100%;
    }

    div.notes {
        font-style: italic;
        border-width: 1px;
        border-bottom-width: 0;
        border-style: solid;
        padding: 1em;
    }

    .k-signature,
    .notes {
        border-color: rgba(0, 0, 0, 0.08);
        border-width: 0 1px;
        border-radius: 0;
    }
</style>