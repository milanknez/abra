<?php

require_once '../lib/DataSourceResult.php';
require_once '../lib/Kendo/Autoload.php';
require_once '../include/header.php';
?>
<div class="demo-section k-content">
    <h4>T-shirt Size</h4>
<?php
$multicolumncomboBox = new \Kendo\UI\MultiColumnComboBox('select');

$multicolumncomboBox->placeholder('Select size ...')
         ->attr('style', 'width: 100%;')
         ->attr('accesskey', 'w')
         ->value('Large')
         ->dataTextField('text')
         ->dataValueField('value')
         ->dataSource(array(
            array('text' => 'X-Small', 'value'=> 'XS'),
            array('text' => 'Small', 'value'=> 'S'),
            array('text' => 'Medium', 'value'=> 'M'),
            array('text' => 'Large', 'value'=> 'L'),
            array('text' => 'X-Large', 'value'=> 'XL'),
            array('text' => '2X-Large', 'value'=> 'XXL')
        ))
        ->addColumn(
            array('field' => 'text', 'title' => 'Text'),
            array('field' => 'value', 'title' => 'Size')
        );

echo $multicolumncomboBox->render();
?>
</div>

<div class="box">
<h4>Keyboard legend</h4>
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
            <span class="key-button wide leftAlign">up arrow</span>
        </span>
        <span class="button-descr">
            highlights previous item
        </span>
    </li>
    <li>
        <span class="button-preview">
            <span class="key-button wider leftAlign">down arrow</span>
        </span>
        <span class="button-descr">
            highlights next item
        </span>
    </li>
    <li>
        <span class="button-preview">
            <span class="key-button wider rightAlign">home</span>
        </span>
        <span class="button-descr">
            highlights first item
        </span>
    </li>
    <li>
        <span class="button-preview">
            <span class="key-button wider rightAlign">end</span>
        </span>
        <span class="button-descr">
            highlights last item
        </span>
    </li>
    <li>
        <span class="button-preview">
            <span class="key-button wider rightAlign">enter</span>
        </span>
        <span class="button-descr">
            selects highlighted item
        </span>
    </li>
    <li>
        <span class="button-preview">
            <span class="key-button">esc</span>
        </span>
        <span class="button-descr">
            closes the popup / clears value if popup is not opened
        </span>
    </li>
    <li>
        <span class="button-preview">
            <span class="key-button">alt</span>
            <span class="key-button wider leftAlign">down arrow</span>
        </span>
        <span class="button-descr">
            opens the popup
        </span>
    </li>
    <li>
        <span class="button-preview">
            <span class="key-button">alt</span>
            <span class="key-button wide leftAlign">up arrow</span>
        </span>
        <span class="button-descr">
            closes the popup
        </span>
    </li>
</ul>
</div>
<?php require_once '../include/footer.php'; ?>
