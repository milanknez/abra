<?php
require_once '../lib/Kendo/Autoload.php';
require_once '../include/header.php';
?>

<div id="example">
    <div class="configurator">
        <div class="header">Configurator</div>
        <div class="box-col">
            <h4>Enable / Disable</h4>
            <ul class="options">
                <li>
                    <button id="enable">Enable</button>
                    <button id="disable">Disable</button>
                </li>
            </ul>
        </div>
        <div class="box-col">
            <h4>Enable / Disable</h4>
            <ul class="options">
                <li>
                    <button id="expand">Expand</button>
                    <button id="collapse">Collapse</button>
                </li>
            </ul>
        </div>
    </div>
    <div class="demo-section k-content">
    <?php
        $brazil = new \Kendo\UI\ExpansionPanel('brazil');
        $brazil->title('Brazil');
        $brazil->subTitle('South America');
        $brazil->expanded(true);
        $brazil->content("The word 'Brazil' likely comes from the Portuguese word for brazilwood, a tree that once grew plentifully along the Brazilian coast. In Portuguese, brazilwood is called pau-brasil, with the word brasil commonly given the etymology 'red like an ember', formed from brasa ('ember') and the suffix -il (from -iculum or -ilium). As brazilwood produces a deep red dye, it was highly valued by the European textile industry and was the earliest commercially exploited product from Brazil. Throughout the 16th century, massive amounts of brazilwood were harvested by indigenous peoples (mostly Tupi) along the Brazilian coast, who sold the timber to European traders (mostly Portuguese, but also French) in return for assorted European consumer goods.");
    ?>

    <?= $brazil->render() ?>
    </div>

<?php require_once '../include/footer.php'; ?>

<script>
        $(document).ready(function () {
           var panel = $('#brazil').data('kendoExpansionPanel');

            $("#enable").click(function () {
                panel.enable(true);
            });

            $("#disable").click(function () {
                panel.enable(false);
            });

            $("#expand").click(function () {
                panel.toggle(true);
            });

            $("#collapse").click(function () {
                panel.toggle(false);
            });
        });
</script>
<style>
    .k-expander-content {
        max-width: 600px;
    }
</style>