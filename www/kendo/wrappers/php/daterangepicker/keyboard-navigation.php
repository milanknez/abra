<?php

require_once '../lib/Kendo/Autoload.php';
require_once '../include/header.php';
?>

<div id="example" style="text-align: center;">
    <div class="demo-section k-content wide" style="display: inline-block;">
        <h4>Select date: </h4>
    <?php
    $dateRangePicker = new \Kendo\UI\DateRangePicker('daterangepicker');

    $dateRangePicker->attr('style', 'width: 100%')
            ->attr('title', 'daterangepicker');

    echo $dateRangePicker->render();
    ?>
    </div>
    <script>
        $(document.body).keydown(function(e) {
            if (e.altKey && e.keyCode == 87) {
                $("#daterangepicker input:first").focus();
            }
        });
    </script>
    <div class="box wide">
    <div class="box-col">
        <h4>Focus:</h4>
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
        </ul>
    </div>
    <div class="box-col">
        <h4>Closed popup:</h4>
        <ul class="keyboard-legend">
            <li>
                <span class="button-preview">
                    <span class="key-button wider rightAlign">enter</span>
                </span>
                <span class="button-descr">
                    triggers change event
                </span>
            </li>
        <li>
                <span class="button-preview">
                    <span class="key-button">esc</span>
                </span>
                <span class="button-descr">
                    closes the popup
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
                    <span class="key-button wider leftAlign">up arrow</span>
                </span>
                <span class="button-descr">
                    closes the popup
                </span>
            </li>
        </ul>
    </div>
    <div class="box-col">
    <h4>
        Opened popup (date view):
    </h4>
    <ul id="calendar-nav" class="keyboard-legend">
        <li>
            <span class="button-preview">
                <span class="key-button wider leftAlign">left arrow</span>
            </span>
            <span class="button-descr">
                highlights previous day
            </span>
        </li>
        <li>
            <span class="button-preview">
                <span class="key-button wider leftAlign">right arrow</span>
            </span>
            <span class="button-descr">
                highlights next day
            </span>
        </li>
        <li>
            <span class="button-preview">
                <span class="key-button wider leftAlign">up arrow</span>
            </span>
            <span class="button-descr">
                highlights same day from the previous week
            </span>
        </li>
        <li>
            <span class="button-preview">
                <span class="key-button wider leftAlign">down arrow</span>
            </span>
            <span class="button-descr">
                highlights same day from the next week
            </span>
        </li>
        <li>
            <span class="button-preview">
                <span class="key-button">ctrl</span>
                <span class="key-button wider leftAlign">left arrow</span>
            </span>
            <span class="button-descr">
                navigates to previous month
            </span>
        </li>
        <li>
            <span class="button-preview">
                <span class="key-button">ctrl</span>
                <span class="key-button wider leftAlign">right arrow</span>
            </span>
            <span class="button-descr">
                navigates to next month
            </span>
        </li>
        <li>
            <span class="button-preview">
                <span class="key-button">ctrl</span>
                <span class="key-button wider leftAlign">up arrow</span>
            </span>
            <span class="button-descr">
                navigates to previous view
            </span>
        </li>
        <li>
            <span class="button-preview">
                <span class="key-button">ctrl</span>
                <span class="key-button wider leftAlign">down arrow</span>
            </span>
            <span class="button-descr">
                navigates to next view
            </span>
        </li>
        <li>
            <span class="button-preview">
                <span class="key-button">home</span>
            </span>
            <span class="button-descr">
                highlights first day of the month
            </span>
        </li>
        <li>
            <span class="button-preview">
                <span class="key-button">end</span>
            </span>
            <span class="button-descr">
                highlights last day of the month
            </span>
        </li>
        <li>
            <span class="button-preview">
                <span class="key-button wider rightAlign">enter</span>
            </span>
            <span class="button-descr">
                if in "month" view selects the highlighted day. In other
                views navigates to a lower view
            </span>
        </li>
        </ul>
    </div>
    </div>
</div>
<?php require_once '../include/footer.php'; ?>
