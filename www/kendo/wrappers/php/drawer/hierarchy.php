<?php

require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';

?>

 <div class="demo-section">
<?php
    $drawer = new \Kendo\UI\Drawer('drawer');

    $drawer->startContent();
    ?>
            <div id="drawer-content">
                <div id="About" class="hidden">
                    <h4 class="header">Kendo UI</h4>
                    <h6>
                        Kendo UI is a comprehensive HTML5 user interface framework for building interactive and high-performance websites and applications.
                        It comes with a library of 70+ UI widgets, an abundance of data-visualization gadgets, client-side data source, and a built-in MVVM (Model-View-ViewModel) library.
                    </h6>
                    <h6>
                        Kendo UI for jQuery provides AngularJS and Bootstrap integration and is also distributed as part of several product units that you can choose from depending on your project requirements.
                        The suite includes widgets for enterprise-grade line-of-business applications and is suitable for creating professional websites that require expert and timely technical support.
                    </h6>
                </div>

                <div id="All" class="hidden">
                    <h4 class="header">
                        <div class="kendoka">
                        </div>
                        Check all available components of Kendo UI for jQuery at the following
                        <a href="https://demos.telerik.com/kendo-ui/">Demos</a>
                        article.
                    </h4>
                </div>

                <div id="Angular" class="header hidden">
                    <h6>
                        Kendo UI allows to quickly build stunning and high-performance responsive web applications.
                    </h6>
                </div>

                <div id="GettingStarted" class="hidden">
                    <h4 class="header">A Complete UI Toolkit for Web Development</h4>
                    <h6>
                        <strong>Progress&reg; Kendo UI&reg;</strong> delivers everything you need to build a modern web application under tight deadlines,
                        with out-of-the-box features and functions that can speed your development time by 50 percent:
                    </h6>
                    <ul>
                        <li>Flexible - Use your preferred framework, including jQuery, AngularJS/Angular, React, and Vue.js.</li>
                        <li>
                            Versatile - Leverage more than 200 customizable UI components spread across the various libraries to create
                            eye-catching, data-rich desktop, tablet, and mobile web apps.
                        </li>
                        <li>
                            Powerful - Accelerate development time with responsive layout, powerful data-binding, cross-browser compatibility and
                            ready-to-use themes.
                        </li>
                        <li>
                            Supported -Get started fast with easy integration backed by comprehensive documentation, flexible support options,
                            hands-on training courses and a large developer community.
                        </li>
                    </ul>
                </div>

                <div id="Kendo" class="hidden">
                    <h4 class="header">Build Better JavaScript Apps Faster</h4>
                    <h6>
                        The ultimate collection of JavaScript UI components with libraries for jQuery, Angular, React, and Vue. Quickly build
                        eye-catching, high-performance, responsive web applications, regardless of your JavaScript framework choice.
                    </h6>
                    <ul>
                        <li>Decreases time-to-market</li>
                        <li>Provides advanced UI features</li>
                        <li>Supports popular frameworks</li>
                        <li>Reduces design risk</li>
                    </ul>
                    <a href="https://www.telerik.com/kendo-ui">Click here for more information</a>
                </div>

                <div id="ThemeSupport" class="hidden">
                    <h4 class="header">Kendo UI provides themes that you can use to style your application.</h4>
                    <h6>Currently, the Kendo ships the following themes:</h6>
                    <ul>
                        <li>Kendo UI Default theme</li>
                        <li>Kendo UI Bootstrap theme</li>
                        <li>Kendo UI Material theme</li>
                    </ul>
                    <h6>
                        The Kendo UI <strong>Theme Builder</strong> is a web application which enables you to create new or customize existing
                        themes.
                    </h6>
                    <h6>
                        The Theme Builder renders the same look and feel as all other components in the suite and delivers full control over their
                        visual elements.
                    </h6>
                    <a href="https://themebuilder.telerik.com">Play with the Theme Builder</a>
                </div>

                <div id="Overview">
                    <h4 class="header">Spend your time developing core functionality, not UI components</h4>
                    <h6>
                        Build your next application, or augment an existing one, with easy-to-use Kendo UI components designed with performance and
                        rich user experience in mind.
                    </h6>
                    <h6>
                        Easily add advanced UI components into your existing designs or take advantage of our comprehensive library in new design
                        starts. Kendo UI lets you save time by integrating components to handle all the key functionality you need in a UI, letting
                        you focus your development efforts on your proprietary features.
                    </h6>
                </div>

                <div id="Popular" class="hidden">
                    <h4 class="header">Most Popular Widgets</h4>
                    <ul>
                        <li>Grid</li>
                        <li>Charts</li>
                        <li>Dropdowns</li>
                        <li>Inputs</li>
                        <li>Themes</li>
                    </ul>
                </div>
            </div>
    <?php
    $drawer->endContent();

    $drawer->template("
    <ul>
      <li data-role='drawer-item'><span class='k-icon k-i-information'></span><span class='k-item-text' data-id='GettingStarted'>Getting Started</span><span class='k-spacer'></span><span class='k-icon k-i-arrow-chevron-right'></span></li>
      <li data-role='drawer-separator'></li>
      <li data-role='drawer-item' class='hidden'><span class='k-icon k-i-none'></span><span class='k-icon k-i-question'></span><span class='k-item-text' data-id='Kendo'>About Kendo UI</span></li>
      <li data-role='drawer-item' class='hidden'><span class='k-icon k-i-none'></span><span class='k-icon k-i-palette'></span><span class='k-item-text' data-id='ThemeSupport'>Supported Themes</span></li>
      <li data-role='drawer-separator'></li>
      <li data-role='drawer-item' class='k-state-selected'><span class='k-icon k-i-zoom'></span><span class='k-item-text' data-id='Overview'>Overview</span><span class='k-spacer'></span><span class='k-icon k-i-arrow-chevron-down'></li>
      <li data-role='drawer-item'><span class='k-icon k-i-none'></span><span class='k-icon k-i-js'></span><span class='k-item-text' data-id='About'>About Kendo</span></li>
      <li data-role='drawer-item'><span class='k-icon k-i-none'></span><span class='k-icon k-i-style-builder'></span><span class='k-item-text' data-id='All'>All Kendo Components</span></li>
      <li data-role='drawer-separator'></li>
      <li data-role='drawer-item'><span class='k-icon k-i-star'></span><span class='k-item-text' data-id='Popular'>Most popular components</span></li>
    </ul>
        ");

    $drawer->mode("push")
           ->mini(true)
           ->itemClick("onItemClick")
           ->autoCollapse(false)
           ->position("left")
           ->minHeight(330)
           ->swipeToOpen(true);


    echo $drawer->render();
?>
</div>

<script>
	function onItemClick(e) {
		if (!e.item.hasClass("k-drawer-separator")) {
            var drawerContainer = e.sender.drawerContainer;
            var expandIcon = e.item.find("span.k-i-arrow-chevron-right");
            var collapseIcon = e.item.find("span.k-i-arrow-chevron-down");
            drawerContainer.find("#drawer-content > div").addClass("hidden");
            drawerContainer.find("#drawer-content").find("#" + e.item.find(".k-item-text").attr("data-id")).removeClass("hidden");

            if (expandIcon.length) {
                e.item.nextAll(".k-drawer-item:not(.k-drawer-separator):lt(2)").removeClass("hidden");
                expandIcon.removeClass("k-i-arrow-chevron-right").addClass("k-i-arrow-chevron-down");
            }

            if (collapseIcon.length) {
                e.item.nextAll(".k-drawer-item:not(.k-drawer-separator):lt(2)").addClass("hidden");
                collapseIcon.addClass("k-i-arrow-chevron-right").removeClass("k-i-arrow-chevron-down");
            }
        }
	}

    $(document).on("ready", function () {
        $("#drawer").data("kendoDrawer").show();
    });
</script>

<style>
        #drawer-content li {
            font-size: 1.2em;
            padding-left: .89em;
            background: 0 0;
            border-radius: 0;
            border-width: 0 0 1px;
            border-color: rgba(33, 37, 41, 0.125);
            line-height: 1.5em;
            padding: 0em 0.4em 0.7em .84em
        }

        #drawer-content li:last-child {
            border: 0;
        }

        .hidden {
            display: none;
        }

        #example div.demo-section {
            max-width: 800px;
        }

        .k-toolbar .k-icon {
            font-size: 18px;
        }

        #drawer-content li {
            list-style: disc;
        }

        #drawer-content ul {
            margin-top: 0;
            margin-bottom: 1rem;
            padding: 24px;
        }

        h6 {
            font-size: 1.5em;
            margin-bottom: .5rem;
            font-family: inherit;
            font-weight: 500;
            line-height: 1.2;
            color: inherit;
        }

        .k-drawer-content {
            padding: 15px;
        }

        .kendoka {
            margin: 0 auto;
            width: 300px;
            height: 300px;
            background-size: cover;
            background-image: url('https://demos.telerik.com/kendo-ui/content/shared/images/site/kendoka-cta.svg');
        }

        h4.header {
            text-align: center;
            margin-bottom: 30px;
            margin-left: 8px;
            font-weight: bold;
            font-size: 20px;
        }
    </style>

<?php require_once '../include/footer.php'; ?>


