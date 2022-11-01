<?php
require_once '../lib/Kendo/Autoload.php';
require_once '../include/header.php';
?>

<?php
$brazil = new \Kendo\UI\ExpansionPanel('brazil');
$brazil->title('Brazil');
$brazil->subTitle('South America');
$brazil->expanded(true);
$brazil->content("The word 'Brazil' likely comes from the Portuguese word for brazilwood, a tree that once grew plentifully along the Brazilian coast. In Portuguese, brazilwood is called pau-brasil, with the word brasil commonly given the etymology 'red like an ember', formed from brasa ('ember') and the suffix -il (from -iculum or -ilium). As brazilwood produces a deep red dye, it was highly valued by the European textile industry and was the earliest commercially exploited product from Brazil. Throughout the 16th century, massive amounts of brazilwood were harvested by indigenous peoples (mostly Tupi) along the Brazilian coast, who sold the timber to European traders (mostly Portuguese, but also French) in return for assorted European consumer goods.");
$brazil->expand("onExpand");
$brazil->collapse("onCollapse");
$brazil->complete("onComplete");
?>

<div class="demo-section k-content">
    <?= $brazil->render() ?>
</div>

<div class="center">
    <div class="demo">
        <div class="box">
            <h4>Console log</h4>
            <div class="console"></div>
        </div>
    </div>
</div>

<?php require_once '../include/footer.php'; ?>

<script>
    function onExpand() {
        kendoConsole.log("onExpand");
    };

    function onCollapse() {
        kendoConsole.log("onCollapse");
    };

    function onComplete() {
        kendoConsole.log("onComplete");
    };
</script>
<style>
    .k-expander-content {
        max-width: 600px;
    }
</style>