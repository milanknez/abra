<?php

require_once '../lib/Kendo/Autoload.php';
require_once '../include/header.php';

?>
<div role="application">
<script>
 window.contentPath = '../content/web/filter';
    window.dataSource1 = new kendo.data.DataSource({
                transport: {
                    read: {
                        dataType: "json",
                        url: window.contentPath + "/menu.json"
                    }
                },
                pageSize: 4,
                schema: {
                    model: {
                        fields: {
                            name: { type: "string" },
                            price: { type: "number" },
                            image: { type: "string" },
                            category: { type: "string" },
                            description: { type: "string" },
                            featured: { type: "boolean" }
                        }
                    }
                }
            });

 

    function oddNumbersHandler(item) {
        return item % 2 === 1;
    }

</script>
<script type="text/x-kendo-template" id="item">
    <li class="products">
        <a class="view-details">
            <img class="main-image" src="#= window.contentPath #/images/200/#= image #" alt="#: name#" title="#: name #" />
            <strong>#= name #</strong>
            <span class="price"><span>$</span><span>#= price #</span></span>
            <span class="description">#= description #</span>
        </a>
    </li>
</script>
<?php
    $filter = new \Kendo\UI\Filter("filter");
    $filter->applyButton(true);
    $filter->expressionPreview(true);

    $nameField = new \Kendo\UI\FilterField();

    $nameField->name("name")
                    ->label("Name");

    $priceField = new \Kendo\UI\FilterField();

    $priceField->name("price")
                    ->type("number")
                    ->label("Price")
                    -> operators($operatorsPerField);

    $descriptionField = new \Kendo\UI\FilterField();

    $descriptionField->name("description")
                  ->label("Description");


    $filter ->dataSource(new \Kendo\JavaScriptFunction("dataSource1"))
        ->addField($nameField)
        ->addField($priceField)
        ->addField($descriptionField);

    echo $filter->render();

?>

<br />
<br />
<br />

<?php
    $listview = new \Kendo\UI\ListView('listView');
    $listview->dataSource(new \Kendo\JavaScriptFunction("dataSource1"))
             ->templateId('item')
             ->pageable(true);

    echo $listview->render();
    ?>
</div>

<style type="text/css">
    .products {
        position: relative;
        width: 200px;
        height: 300px;
        margin-bottom: 20px;
        padding: 10px 10px 62px 10px;
        text-align: center;
    }

    .view-details,
    .view-details:hover {
        display: block;
        position: relative;
        user-select:none;
    }

    .view-details:after {
        content: "";
        display: block;
        width: 200px;
        height: 200px;
        position: absolute;
        top: 0;
        left: 0;
        background-color: rgba(0,0,0,0);
    }

    .view-details:hover strong {
        color: #de5d20;
    }

    .main-image {
        position: relative;
        width: 200px;
        height: 200px;
    }

    .products h2 {
        color: #ab7829;
        font-size: 21px;
        font-weight: normal;
        padding-top: 25px;
    }

    .products strong {
        display: inline-block;
        color: #de5d20;
        font-size: 21px;
        font-weight: normal;
        padding-top: 25px;
        padding-bottom: 5px;
        width: 100%;
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
    }

    .price {
        font-size: 17px;
        color: #9e9e9e;
        width: 100%;
        position: relative;
        display: inline-block;
        line-height: 1em;
    }

    .description {
        font-size: 17px;
        color: #848484;
        width: 100%;
        display: inline-block;
        line-height: 1em;
        padding-top: 15px;
    }

    .cart-image-wrapper {
        display: inline-block;
        float: left;
        height: 100px;
        overflow: hidden;
    }

    #main-section ul li {
        float: left;
    }

    #main-section {
        line-height:0;
        max-width: 882px;
    }

    #listView {
        display: inline-block;
        width: 100%;
        border-bottom: 0;
        box-sizing: border-box;
    }

</style>
<?php require_once '../include/footer.php'; ?>