<?php

require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';

$window = new \Kendo\UI\Window('window');

$window->title('EGG CHAIR')
       ->width('500px')
       ->close('onClose')
       ->actions(array("Custom", "Minimize", "Maximize", "Close"))
       ->startContent();
?>
<div style="text-align: center;">
    <div class="eggchair">
        <img src="../content/web/window/egg-chair.png"/>
    </div>
    <p>ARNE JACOBSEN EGG CHAIR<br /> Image by: <a href="https://www.conranshop.co.uk/" title="https://www.conranshop.co.uk/">https://www.conranshop.co.uk/</a></p>
</div>

<?php
    $window->endContent();

    echo $window->render();
?>

<div class="box hidden-on-narrow" style="float:right">
        <div class="box-col">
            <h4>Animation Settings</h4>
            <ul class="options">
                <li>
                    <input id="default" name="animation" type="radio" checked="checked" /> <label for="default">default/zoom animation</label>
                </li>
                <li>
                    <input id="toggle" name="animation" type="radio" /> <label for="toggle">toggle animation</label>
                </li>
                <li>
                    <input id="expand" name="animation" type="radio" checked="checked" /> <label for="expand">expand animation</label>
                </li>
                <li>
                    <input id="opacity" type="checkbox" checked="checked" /> <label for="opacity">animate opacity</label>
                </li>
            </ul>
        </div>
        <div class="box-col">
            <h4>Window Settings</h4>
            <ul class="options">
                <li>
                    <input id="draggable-window" type="checkbox" checked="checked" /> <label for="draggable">draggable</label>
                </li>
                <li>
                    <input id="resizable" type="checkbox" checked="checked" /> <label for="resizable">resizable</label>
                </li>
            </ul>
        </div>
    </div>

    <span id="undo" style="display:none" class="k-button hidden-on-narrow">Click here to open the window.</span>

    <div class="responsive-message"></div>

    <script>
        function onClose() {
            $("#undo").fadeIn();
        }
        
        $("#undo").bind("click", function () {
                        $("#window").data("kendoWindow").open();
                        $("#undo").fadeOut(300);
        });

        $(document).ready(function () {
            var original =  $("#window");

            $(".box input").change(function () {
                var clone = original.clone(true);

                $("#undo").hide();
                $("#window").data("kendoWindow").destroy();

                setTimeout(function () {
                    $("#example").append(clone);
                    initWindow();
                }, 200);
            });

            var getEffects = function () {
                return (($("#expand")[0].checked ? "expand:vertical " : "") +
                    ($("#opacity")[0].checked ? "fadeIn" : "")) || false;
            };

            function initWindow() {
                var isDraggable = $("#draggable-window")[0].checked;
                var isResizable = $("#resizable")[0].checked;

                var windowOptions = {
                    actions: ["Custom", "Minimize", "Maximize", "Close"],
                    draggable: isDraggable,
                    resizable: isResizable,
                    width: "500px",
                    title: "EGG CHAIR",
                    visible: false,
                    close: onClose
                };

                if (!$("#default")[0].checked)
                    windowOptions.animation = { open: { effects: getEffects() }, close: { effects: getEffects(), reverse: true } };

                $("#window").kendoWindow(windowOptions);

               
                $("#window").data("kendoWindow").open();
            }

            $("#window").data("kendoWindow").wrapper
                .find(".k-i-custom").parent().click(function (e) {
                    alert("Custom action button clicked");
                    e.preventDefault();
                });
        });
    </script>

    <style>
        #example {
            min-height: 400px;
        }

        #undo {
            text-align: center;
            position: absolute;
            white-space: nowrap;
            padding: 1em;
            cursor: pointer;
        }

        @media screen and (max-width: 1023px) {
            div.k-window {
                display: none !important;
            }
        }
    </style>
<?php require_once '../include/footer.php'; ?>
