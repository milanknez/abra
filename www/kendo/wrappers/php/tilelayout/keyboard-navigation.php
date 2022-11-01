<?php
require_once '../lib/Kendo/Autoload.php';
require_once '../include/header.php';
?>
    <script id="europe" type="text/x-kendo-template">
        <div class="k-card">
            <div class="k-card-header">
            <h5 class="k-card-title">The Best of Western Europe</h5><h6 class="k-card-subtitle">Feb 27, 2007</h6>
            </div>
            <div class="k-card-body">
                <div class="k-card-description"><p>Tour the best of Western Europe and take in the sights of Munich, Frankfurt, Meinz, Bruxel, Amsterdam, and Vienna along the way. Discover the amazing world of plants at Frankfurt Palmengarten, the botanical gardens in Frankfurt.</p><img src="../content/web/timeline/images/The_Best_of_Western_Europe.jpg" class="k-card-image">
                </div>
            </div>
        </div>
    </script>
    <script id="bulgaria" type="text/x-kendo-template">
        <div class="k-card">
            <div class="k-card-header">
            <h5 class="k-card-title">UNESCO Sites in Bulgaria</h5><h6 class="k-card-subtitle">Mar 13, 2009</h6>
            </div>
            <div class="k-card-body">
                <div class="k-card-description"><p>Bulgaria is located in the heart of the Balkans, sharing boarders with Serbia, Macedonia, Romania, Greece and Turkey. Visitors will be greeted by a unique blend of enchanting monasteries, friendly people and old-world charm.</p><img src="../content/web/timeline/images/UNESCO_sites_in_Bulgaria.jpg" class="k-card-image">
                </div>
            </div>
        </div>
    </script>
    <script id="cuba" type="text/x-kendo-template">
        <div class="k-card">
            <div class="k-card-header">
            <h5 class="k-card-title">Cuba Paradise Island</h5><h6 class="k-card-subtitle">Jun 16, 2013</h6>
            </div>
            <div class="k-card-body">
                <div class="k-card-description"><p>Cuba provides a unique travel destination that is equal parts relaxation and education. You’ll find beautiful beaches, rum and some incredible and historically significant locations.</p><img src="../content/web/timeline/images/Cuba_Paradise_Island.jpg" class="k-card-image">
                </div>
            </div>
        </div>
    </script>
    <script id="italy" type="text/x-kendo-template">
        <div class="k-card">
            <div class="k-card-header">
            <h5 class="k-card-title">Wonders of Italy</h5><h6 class="k-card-subtitle">Jul 6, 2008</h6>
            </div>
            <div class="k-card-body">
                <div class="k-card-description"><p>he Italian Republic is a history lover’s paradise with thousands of museums, churches and archaeological sites dating back to Roman and Greek times. Visitors will also find a hub for fashion and culture unlike anywhere else in the world.</p><img src="../content/web/timeline/images/Cuba_Paradise_Island.jpg" class="k-card-image">
                </div>
            </div>
        </div>
    </script>
    <script id="kenya" type="text/x-kendo-template">
        <div class="k-card">
            <div class="k-card-header">
            <h5 class="k-card-title">Kenya</h5><h6 class="k-card-subtitle">Apr 23, 2016</h6>
            </div>
            <div class="k-card-body">
                <div class="k-card-description"><p>Adventuring through Kenya is no day at the beach. But those willing to brave this raw and wild area of the world will be rewarded with sights and experiences that will last a lifetime.</p><img src="../content/web/timeline/images/Kenya.jpg" class="k-card-image">
                </div>
            </div>
        </div>
    </script>
    <script id="china" type="text/x-kendo-template">
        <div class="k-card">
            <div class="k-card-header">
            <h5 class="k-card-title">Imperial China</h5><h6 class="k-card-subtitle">Jul 12, 2015</h6>
            </div>
            <div class="k-card-body">
                <div class="k-card-description"><p>The ancient sights of China are otherworldly. From the Terracotta Army to the cave carvings at Dragon Gate, the immensity of these Chinese attractions is matched only by the diligence in their details.</p><img src="../content/web/timeline/images/Imperial_China.jpg" class="k-card-image">
                </div>
            </div>
        </div>
    </script>

<script>
    $(document.body).keydown(function (e) {
        if (e.altKey && e.keyCode == 87) {
            $(".k-tilelayout-item.k-card:first").focus();
        }
    });
</script>

<?php
    $tilelayout = new \Kendo\UI\TileLayout("tilelayout");

    $tilelayout->columns(6);
    $tilelayout->columnsWidth(285);
    $tilelayout->rowsHeight(250);
    $tilelayout->reorderable(true);
    $tilelayout->resizable(true);
    $tilelayout->navigatable(true);

    $container1 = new \Kendo\UI\TileLayoutContainer();
    $container1->bodyTemplateId("europe")
                ->colSpan(2)
                ->rowSpan(2);

    $tilelayout ->addContainer($container1);

    $container2 = new \Kendo\UI\TileLayoutContainer();
    $container2->bodyTemplateId("bulgaria")
                ->colSpan(2)
                ->rowSpan(2);

    $tilelayout->addContainer($container2);

    $container3 = new \Kendo\UI\TileLayoutContainer();
    $container3->bodyTemplateId("italy")
                ->colSpan(2)
                ->rowSpan(2);

    $tilelayout->addContainer($container3);

    $container4 = new \Kendo\UI\TileLayoutContainer();
    $container4->bodyTemplateId("cuba")
                ->colSpan(2)
                ->rowSpan(2);

    $tilelayout->addContainer($container4);

    $container5 = new \Kendo\UI\TileLayoutContainer();
    $container5->bodyTemplateId("kenya")
                ->colSpan(2)
                ->rowSpan(2);

    $tilelayout->addContainer($container5);

    $container6 = new \Kendo\UI\TileLayoutContainer();
    $container6->bodyTemplateId("china")
                ->colSpan(2)
                ->rowSpan(2);

    $tilelayout->addContainer($container6);
?>

<div class="center">
    <div class="demo">
        <?php echo $tilelayout->render(); ?>
    </div>
</div>

<style>
    .k-card-image {
        height: 165px;
    }
</style>

<?php require_once '../include/footer.php'; ?>