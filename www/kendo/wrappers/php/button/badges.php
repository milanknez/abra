<?php
require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';
?>

<div id="example">
    <div class="demo-section k-content">
        <h4>Overlay badges</h4>
        <div>
            <?php
                $buttonBadge = new \Kendo\UI\ButtonBadge();
                $buttonBadge -> text('')
                            -> themeColor('success')
                            -> shape('dot');
                echo (new \Kendo\UI\Button('overlayDot'))
                    -> content('Overlay Dot')
                    -> badge($buttonBadge)
                    -> render();
            ?>
            <?php
                $buttonBadge = new \Kendo\UI\ButtonBadge();
                $buttonBadge -> text('error')
                            -> themeColor('error')
                            -> shape('pill');
                echo (new \Kendo\UI\Button('overlayPill'))
                    -> content('Overlay Pill')
                    -> badge($buttonBadge)
                    -> render();
            ?>
            <?php
                $buttonBadge = new \Kendo\UI\ButtonBadge();
                $buttonBadge -> text('success')
                            -> themeColor('success')
                            -> shape('rectangle');
                echo (new \Kendo\UI\Button('overlayRectangle'))
                    -> content('Overlay Rectangle')
                    -> badge($buttonBadge)
                    -> render();
            ?>
        </div>

        <hr class="k-hr" />

        <h4>Inline badges</h4>
        <div>
            <?php
                $buttonBadge = new \Kendo\UI\ButtonBadge();
                $buttonBadge -> text('')
                            -> themeColor('success')
                            -> shape('dot')
                            -> position('inline');
                echo (new \Kendo\UI\Button('inlineDot'))
                    -> content('Inline Dot')
                    -> badge($buttonBadge)
                    -> render();
            ?>
            <?php
                $buttonBadge = new \Kendo\UI\ButtonBadge();
                $buttonBadge -> text('error')
                            -> themeColor('error')
                            -> shape('pill')
                            -> position('inline');
                echo (new \Kendo\UI\Button('inlinePill'))
                    -> content('Inline Pill')
                    -> badge($buttonBadge)
                    -> render();
            ?>
            <?php
                $buttonBadge = new \Kendo\UI\ButtonBadge();
                $buttonBadge -> text('success')
                            -> themeColor('success')
                            -> shape('rectangle')
                            -> position('inline');
                echo (new \Kendo\UI\Button('inlineRectangle'))
                    -> content('Inline Rectangle')
                    -> badge($buttonBadge)
                    -> render();
            ?>
        </div>
    </div>
</div>

<?php require_once '../include/footer.php'; ?>
