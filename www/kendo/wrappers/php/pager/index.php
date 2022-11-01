<?php
require_once '../lib/Kendo/Autoload.php';

require_once '../include/header.php';

require_once '../include/header.php';

$pager = new \Kendo\UI\Pager('pager');

$pager->dataSourceId("datasource1");
?>
<div class="demo-section auto">
    <div class="contests-wrapper">
    </div>
    
    <?php
    echo $pager->render();
    ?>
</div>

<script type="text/x-kendo-template" id="template">
    <section class="contest-card-wrapper">
        <h3 title="#= Title #">#= Title #</h3>
        <img class="contest-image" src="../content/web/pager/images/#=Id#.jpg" alt="#= Title #" />
        <span class="contest-rating"><span class="k-icon k-i-user"></span> #= Participants #/ 100</span>
        <button class="join-button k-button telerik-blazor k-primary">
            Join
        </button>
    </section>
</script>

<script>
    var datasource1 = new kendo.data.DataSource({
        transport: {
            read: {
                url: "../content/web/pager/photo-contests.json",
                dataType: "json"
            }
        },
        pageSize: 4,
        change: function () {
            var template = kendo.template($("#template").html());
            $(".contests-wrapper").html(kendo.render(template, this.view()));
        }
    });

    $(document).ready(function () {
        datasource1.read();
    });
</script>

<style>
    .auto {
        max-width: 100%;
        box-sizing: border-box;
    }

    .demo-section.auto {
        max-width:100%;
        display:inline-block;
    }

    .join-button, .contest-rating, .contest-image {
        align-self: center;
        text-align: center;
        margin-bottom: 10px;
    }

    .contest-rating {
        font-size: 20px;
    }

    .contest-image {
        width: 95%;
        height: 200px;
        background-size: cover;
    }

    .contests-wrapper {
        display: flex;
        flex-wrap: wrap;
        width: 1000px;
        max-width: 100%;
    }

    .contests-wrapper .contest-card-wrapper:first-child {
        margin-left: 0;
    }

    .contests-wrapper .contest-card-wrapper:last-child {
        margin-right: 0;
    }

    .contest-card-wrapper {
        width: 230px;
        border-color: rgba(0,0,0,0.08);
        border-radius: 4px;
        border-width: 1px;
        border-style: solid;
        display: flex;
        flex-direction: column;
        position: relative;
        margin: 10px
    }

    .contest-card-wrapper h3 {
        margin-top: 5px;
        align-self: center;
        font-size: 18px;
        text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap;
        width: 90%;
        text-align: center;
    }
</style>

<?php require_once '../include/footer.php'; ?>
