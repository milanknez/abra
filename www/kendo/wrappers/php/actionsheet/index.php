<?php
require_once '../lib/Kendo/Autoload.php';
require_once '../include/header.php';
?>

<div class="demo-section k-content wide">
        <div class="demo-app" style="position:relative">
            <div id="city" class="demo-view" style="position:absolute">
                <div class="title">
                    <h3>Current City</h3>
                </div>
                <div class="cards-container">
                    <div class="k-card">
                        <div class="k-card-header">
                            <h5 class="k-card-title">Rome</h5>
                            <h6 class="k-card-subtitle">Capital of Italy</h6>
                        </div>
                        <img class="k-card-image" src="../content/web/cards/rome.jpg" />
                        <div class="k-card-body">
                            <p>Rome is a sprawling, cosmopolitan city with nearly 3,000 years of globally influential art, architecture and culture on display.</p>
                            <p>Ancient ruins such as the Forum and the Colosseum evoke the power of the former Roman Empire. </p>
                        </div>

                    </div>
                </div>
                <?php
                echo (new \Kendo\UI\Button('primaryTextButton'))
                ->attr('class', 'k-primary')
                ->content('OPEN ACTION SHEET')
                ->click('openActionSheetBttn')
                ->render();

                $actionSheet = new \Kendo\UI\ActionSheet('actionSheet');
                $actionSheet->title("Select item");

                $editItem = new \Kendo\UI\ActionSheetItem();
                $editItem->text('Edit Item')
                    ->iconClass('k-icon k-i-edit')
                    ->click("onClick");

                $favoritesItem = new \Kendo\UI\ActionSheetItem();
                $favoritesItem->text('Add to Favorites')
                    ->iconClass('k-icon k-i-heart')
                    ->click("onClick");

                $uploadItem = new \Kendo\UI\ActionSheetItem();
                $uploadItem->text('Upload New')
                    ->iconClass('k-icon k-i-upload')
                    ->click("onClick");

                $cancelItem = new \Kendo\UI\ActionSheetItem();
                $cancelItem->text('Upload New')
                    ->iconClass('k-icon k-i-cancel')
                    ->click("onClick");

                $actionSheet->addItem($editItem);
                $actionSheet->addItem($favoritesItem);
                $actionSheet->addItem($uploadItem);
                $actionSheet->addItem($cancelItem);
                echo $actionSheet->render();
                ?>
            </div>
        </div>
    </div>

<script>
        function openActionSheetBttn() {
            var actionSheet = $("#actionSheet").data("kendoActionSheet");
            actionSheet.open()
        }

        function onClick(e) {
            e.preventDefault();
            var actionSheet = $("#actionSheet").data("kendoActionSheet");
            actionSheet.close();
        }
    </script>
<style>
    .demo-view {
        transform: scale(1);
        overflow: hidden;
    }
    .k-actionsheet-container {
        width: 100%;
        height: 100%;
    }
    .k-actionsheet-container > .k-overlay {
        border-bottom-left-radius: 30px;
        border-bottom-right-radius: 30px;
    }
    .cards-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }
    .k-card {
        width: 285px;
        margin: 5%;
    }
    #primaryTextButton {
        margin: 0 auto;
        display: block;
    }
    .demo-app {
        margin: auto;
        width: 380px;
        height: 814px;
        background: #FFFFFF;
        box-shadow: 0px 10px 20px #00000016;
        border-radius: 30px;
        font-family: 'Roboto', sans-serif;
        font-size: 14px;
    }
        .demo-app .title {
            width: 100%;
        }
    #city {
        background: #F9F9F9;
        height: inherit;
        width: inherit;
        border-radius: 30px;
        border: 10px solid white;
        box-sizing: border-box;
    }
    .demo-app h3 {
        padding-top: 24px;
        text-align: center;
        font-size: 28px;
        letter-spacing: 0.28px;
        color: #3D57D8;
        font-weight: 400;
    }
</style>


<?php require_once '../include/footer.php'; ?>