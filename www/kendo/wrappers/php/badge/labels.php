<?php
require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';
?>

<div class="demo-section k-content wide">
<script type="text/x-kendo-template" id="template">
    <div class="issue">
        <h3>
            #:title#
            #if(type === 'feature'){#
            <?php
                $badge = new \Kendo\UI\Badge('feature#=id#');
                $badge-> themeColor('info')
                        -> text('Feature request');

                echo $badge->renderInTemplate();
            ?>
            #}#
            #if(type === 'enhancement'){#
                <?php
                $badge = new \Kendo\UI\Badge('enhancement#=id#');
                $badge-> themeColor('warning')
                        -> text('Enhancement');

                echo $badge->renderInTemplate();
            ?>
            #}#
            #if(type === 'bug'){#
                <?php
                $badge = new \Kendo\UI\Badge('bug#=id#');
                $badge-> themeColor('error')
                        -> text('Bug');

                echo $badge->renderInTemplate();
            ?>
            #}#
            #if(type === 'documentation'){#
                <?php
                $badge = new \Kendo\UI\Badge('documentation#=id#');
                $badge-> themeColor('primary')
                        -> text('Documentation');

                echo $badge->renderInTemplate();
            ?>
            #}#
            #if(approved){#
                <?php
                $badge = new \Kendo\UI\Badge('approved#=id#');
                $badge-> themeColor('success')
                        -> text('Approved');

                echo $badge->renderInTemplate();
            ?>
            #}#
        </>
        <p><small>#:additionalInfo#</small></p>
    </div>
</script>

<script>
    var data = [{
            id:1,
            title: 'Implement lazy loading',
            additionalInfo: 'opened 13 days ago by starku',
            type: 'feature',
            approved: false
        },
        {
            id:2,
            title: 'Scrolling freezes in IE 8',
            additionalInfo: 'opened 2 days ago by gink',
            type: 'bug',
            approved: true
        },
        {
            id:3,
            title: 'Keyboard navigation throws an exception',
            additionalInfo: 'opened 1 days ago by toydivas',
            type: 'bug',
            approved: true
        },
        {
            id:4,
            title: 'Improve searching performance',
            additionalInfo: 'opened 12 days ago by peterC',
            type: 'enhancement',
            approved: false
        },
        {
            id:5,
            title: 'Add documentation for lazy loading',
            additionalInfo: 'opened 11 days ago by starku',
            type: 'documentation',
            approved: true
        }];

    var dataSource = new kendo.data.DataSource({
        data: data
    });
</script>

    <?php
        $listview = new \Kendo\UI\ListView('listView');
        $listview->dataSource(new \Kendo\JavaScriptFunction('dataSource'))
                ->templateId('template');

        $toolbar = new \Kendo\UI\ToolBar('toolbar');
        $toolbar-> addItem(array("template" => '<span class="k-d-flex k-flex-row k-align-items-center"><span class="k-icon k-i-warning"></span> 5 Open</span>'));
        $toolbar-> addItem(array("template" => '<span class="k-d-flex k-flex-row k-align-items-center"><span class="k-icon k-i-check"></span> 90 Closed</span>'));

        echo $toolbar->render();
        echo $listview->render();
    ?>

</div>

<style>
    .issue {
        padding: 10px 20px;
        border-bottom: 1px solid lightgrey;
    }

    #toolbar .status-icon {
        margin-inline-end: 4px;
    }
</style>

<?php require_once '../include/footer.php'; ?>
