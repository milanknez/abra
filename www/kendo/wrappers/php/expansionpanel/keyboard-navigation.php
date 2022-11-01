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

$chile = new \Kendo\UI\ExpansionPanel('chile');
$chile->title('Chile');
$chile->subTitle('South America');
$chile->expanded(false);
$chile->content("There are various theories about the origin of the word Chile. According to 17th-century Spanish chronicler Diego de Rosales, the Incas called the valley of the Aconcagua Chili by corruption of the name of a Picunche tribal chief(cacique) called Tili, who ruled the area at the time of the Incan conquest in the 15th century.Another theory points to the similarity of the valley of the Aconcagua with that of the Casma Valley in Peru, where there was a town and valley named Chili.");

$colombia = new \Kendo\UI\ExpansionPanel('colombia');
$colombia->title('Colombia');
$colombia->subTitle('South America');
$colombia->expanded(false);
$colombia->content("The name 'Colombia' is derived from the last name of the Italian navigator Christopher Columbus. It was conceived by the Venezuelan revolutionary Francisco de Miranda as a reference to all of the New World, but especially to those portions under Spanish law. The name was later adopted by the Republic of Colombia of 1819, formed from the territories of the old Viceroyalty of New Granada (modern-day Colombia, Panama, Venezuela, Ecuador, and northwest Brazil).");

$ecuador = new \Kendo\UI\ExpansionPanel('ecuador');
$ecuador->title('Ecuador');
$ecuador->subTitle('South America');
$ecuador->expanded(false);
$ecuador->content("The origin of the name of Ecuador is from Spain. When the Spaniards colonized the land they called it 'el ecuador' which translated means 'the equator'.");

$guyana = new \Kendo\UI\ExpansionPanel('guyana');
$guyana->title('Guyana');
$guyana->subTitle('South America');
$guyana->expanded(false);
$guyana->content("The name 'Guyana' derives from Guiana, the original name for the region that formerly included Guyana (British Guiana), Suriname (Dutch Guiana), French Guiana, and parts of Colombia, Venezuela and Brazil. According to the Oxford English Dictionary, 'Guyana' comes from an indigenous Amerindian language and means 'land of many waters'.");

?>

<div class="demo-section k-content">
    <?= $brazil->render() ?>
    <?= $chile->render() ?>
    <?= $colombia->render() ?>
    <?= $ecuador->render() ?>
    <?= $guyana->render() ?>
</div>

<div class="box">
    <div class="box-col">
        <h3>Focus:</h3>
        <ul class="keyboard-legend">
            <li>
                <span class="button-preview">
                    <span class="key-button leftAlign wider"><a target="_blank" href="https://en.wikipedia.org/wiki/Access_key">Access key</a></span>
                    +
                    <span class="key-button">w</span>
                </span>
                <span class="button-descr">
                    focuses the widget
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button wider leftAlign">space</span>
                </span>
                <span class="button-descr">
                    Toggles the content of the widget.
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button wider rightAlign">enter</span>
                </span>
                <span class="button-descr">
                    Toggles the content of the widget.
                </span>
            </li>
        </ul>
    </div>
</div>

<script>
    $(document.body).keydown(function (e) {
        if (e.altKey && e.keyCode == 87) {
            $("#brazil").prev().focus();
        }
    });
</script>

<style>
    .k-expander-content {
        max-width: 600px;
    }
</style>

<?php require_once '../include/footer.php'; ?>