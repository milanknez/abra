<?php
require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';
?>
<div class="demo-section k-content">
    <h4>Set Value</h4>
<?php
$numeric = new \Kendo\UI\NumericTextBox('numerictextbox');

$numeric->attr('style', 'width: 100%');
$numeric->attr('accesskey', 'w');

echo $numeric->render();
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
            increases the widget's value
        </span>
    </li>
    <li>
        <span class="button-preview">
            <span class="key-button wider leftAlign">down arrow</span>
        </span>
        <span class="button-descr">
            decreases the widget's value
        </span>
    </li>
</ul>
</div>

<?php require_once '../include/footer.php'; ?>
