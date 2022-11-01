<?php
require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';
?>

<div class="demo-section k-content">


    <?php
        $toolbar = new \Kendo\UI\ToolBar('toolbar');
        $badgeInbox = new \Kendo\UI\Badge('badge-inbox');
        $badgeInbox -> themeColor('info')
                    -> text(2)
                    -> shape('rectangle');

        $badgeSent = new \Kendo\UI\Badge('badge-sent');
        $badgeSent -> themeColor('success')
                    -> text(5)
                    -> shape('rounded');

        $badgeMissed = new \Kendo\UI\Badge('badge-missed');
        $badgeMissed -> themeColor('warning')
                    -> text(15)
                    -> shape('pill');

        $badgeOverlay = new \Kendo\UI\Badge('badge-overlay');
        $badgeOverlay -> themeColor('primary')
                    -> text('99+')
                    -> shape('circle');

        $toolbar-> addItem(
            array("template" => '<a class="k-button" href="#"><span class="k-icon k-i-user"></span> ' . $badgeOverlay->render() . '</a>'),
            array("template" => '<a class="k-button" href="#"><span class="k-icon k-i-email"></span> ' . $badgeInbox->render() . '</a>'),
            array("template" => '<a class="k-button" href="#">See later ' . $badgeSent->render() . '</a>'),
            array("template" => '<a class="k-button" href="#">News ' . $badgeMissed->render() . '</a>')
        );

        echo $toolbar->render();
    ?>
</div>

<?php require_once '../include/footer.php'; ?>
