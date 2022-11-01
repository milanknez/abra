<?php
require_once '../lib/Kendo/Autoload.php';
require_once '../include/header.php';
?>

<div class="box wide">
        <div class="box-col">
            <ul class="options">
                <li>
                    <button id="start-progress">Start Progress</button>
                    <button id="reset-progress">Reset Progress</button>
                </li>
            </ul>
        </div>
    </div>
    <div class="demo-section k-content">
        <?php 
            $pb = new \Kendo\UI\CircularProgressBar('progressbar');

            $color0 = new \Kendo\UI\CircularProgressbarColor();
            $color0->to(25)
                    ->color("#C0392B");

            $color25 = new \Kendo\UI\CircularProgressbarColor();
            $color25->from(25)
                    ->to(50)
                    ->color("#D35400");

            $color50 = new \Kendo\UI\CircularProgressbarColor();
            $color50->from(50)
                    ->to(75)
                    ->color("#D4AC0D");

            $color75 = new \Kendo\UI\CircularProgressbarColor();
            $color75->from(75)
                    ->to(99)
                    ->color("#58D68D");

            $color100 = new \Kendo\UI\CircularProgressbarColor();
            $color100->from(99)
                    ->color("#229954");

            $pb->value(0)
                ->addColor($color0, $color25, $color50, $color75, $color100)
               ->centerTemplate('<span style="color: #: color #;">#= value == 100 ? "<span class=\'k-icon k-i-check\'></span>" : value + "%" #</span>');

            echo $pb->render();
        ?>
    </div>

     <?php require_once '../include/footer.php'; ?>

     <script>
        $(document).ready(function () {
            let pb = $("#progressbar").data("kendoCircularProgressbar");

            $("#start-progress").kendoButton({
            themeColor: "primary",
            click: function () {
                startProgress();
            }
        });

        $("#reset-progress").kendoButton({
            themeColor: "warning",
            click: function () {
                pb.value(0);
            }
        });

        function startProgress() {
            let interval = setInterval(function () {
                let value = pb.value();

                if (value >= 100) {
                    clearInterval(interval);
                    return;
                }

                pb.value(value + 1);
            }, 50);
        }
        });
    </script>

    <style>
        .box .k-textbox {
            margin: 0;
            width: 80px;
        }
        .k-button {
            min-width: 80px;
        }
    </style>
