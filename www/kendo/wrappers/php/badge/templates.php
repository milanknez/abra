<?php
require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';
?>

<div class="demo-section k-content">
    <ul class="k-listgroup">
        <li class="k-listgroup-item">
            <a href="#" class="k-link">
                Inbox
                <?php
                    $badge = new \Kendo\UI\Badge('badge-inbox');
                    $badge-> themeColor('info')
                            -> text(100)
                            -> max(99);

                    echo $badge->render();
                ?>
            </a>
        </li>
        <li class="k-listgroup-item">
            <a href="#" class="k-link">
                Sent Items
                <?php
                    $badge = new \Kendo\UI\Badge('badge-sent');
                    $badge-> themeColor('success')
                            -> text(15)
                            -> template('#= this._text # items');

                    echo $badge->render();
                ?>
            </a>
        </li>
        <li class="k-listgroup-item">
            <a href="#" class="k-link">
                Missed conversations
                <?php
                    $badge = new \Kendo\UI\Badge('badge-missed');
                    $badge-> themeColor('warning')
                            -> text(120)
                            -> template("#= +this._text > 100 ? 'a lot' : this._text #");

                    echo $badge->render();
                ?>
            </a>
        </li>
    </ul>
</div>

<style>
    #example .k-listgroup .k-link {
        justify-content: space-between;
    }
    #example .k-listgroup .k-link:hover {
        background-color: #555;
        color: white;
    }
</style>

<?php require_once '../include/footer.php'; ?>
