<?php

require_once '../lib/Kendo/Autoload.php';
require_once '../include/header.php';

?>
<?php
    $skeleton = new \Kendo\UI\SkeletonContainer('skeleton');

    $skeleton->animation('pulse')
        ->template('<div class="k-card">
        <div class="k-card-header">
            <div>
                <span data-shape-circle class="k-card-image avatar"></span>
            </div>
            <div class="user-info" style="width: 100%;">
                <span data-shape-text class="k-card-title"></span>
                <span data-shape-text class="k-card-subtitle" style="width: 35 %;"></span>
            </div>
        </div>
        <span data-shape-rectangle style="width: 340px; height: 100%;"></span>
        <div class="k-card-body">
            <span data-shape-text></span>
        </div>
    </div>');
?>

<div id="example">
    <div class="cards-container">
         <?php
            echo $skeleton->render();
        ?>
        <div class="k-card">
            <div class="k-card-header">
                <div>
                    <img class="k-card-image avatar" src="../content/web/skeleton/avatar.jpg" />
                </div>
                <div class="user-info">
                    <h5 class="k-card-title">Tom Smith</h5>
                    <h6 class="k-card-subtitle">5 hours ago</h6>
                </div>
            </div>
            <img class="k-card-image" src="../content/web/skeleton/card-thumbnail.jpg" />
            <div class="k-card-body">
                <p>Having so much fun in Prague! #NaZdravi</p>
            </div>
        </div>
    </div>
</div>

    <style>
        .k-card-header {
            display: flex;
            height: 70px;
        }

        .user-info {
            padding-left: 10px;
        }

        .cards-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

            .cards-container > div {
                margin: 5%;
            }

            .cards-container .k-card .k-card-subtitle {
                margin-top: 5px;
            }

        .avatar {
            border-radius: 50%;
            width: 40px;
            height: 40px;
        }

        .k-card {
            width: 340px;
            height: 350px;
        }

        .k-card-footer {
            text-align: center;
        }
    </style>
<?php require_once '../include/footer.php'; ?>