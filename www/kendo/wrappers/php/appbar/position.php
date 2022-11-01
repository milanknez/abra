<?php
require_once '../lib/Kendo/Autoload.php';
require_once '../include/header.php';
?>
<div id="example">
<div class="configurator">
        <div class="header">Configurator</div>
        <div class="box-col">
            <h4>Position Mode</h4>
            <input type="radio" id="top" name="positionMode" value="sticky" checked="checked">
            <label for="top">Sticky</label><br>
            <input type="radio" id="bottom" name="positionMode" value="static">
            <label for="bottom">Static</label>
        </div>
        <div class="box-col">
            <h4>Position</h4>
            <input type="radio" id="top" name="position" value="top" checked="checked">
            <label for="top">Top</label><br>
            <input type="radio" id="bottom" name="position" value="bottom" >
            <label for="bottom">Bottom</label>
        </div>
        <div class="box-col">
            <h4>Theme Color</h4>
            <input type="radio" id="light" name="themeColor" value="light">
            <label for="light">Light (default)</label><br>
            <input type="radio" id="dark" name="themeColor" value="dark" checked="checked">
            <label for="dark">Dark</label><br>
        </div>
    </div>
    <script id="search-template" type="text/x-kendo-tmpl">
        <span class="k-textbox k-display-flex">
            <input autocomplete="off" placeholder="Search..." title="Search..." class="k-input">
            <span class="k-input-icon">
                <span class="k-icon k-i-search"></span>
            </span>
        </span>
    </script>
<?php
    $appbar = new \Kendo\UI\AppBar('appbar');
    $appbar->position("bottom")
        ->positionMode("sticky")
        ->themeColor("dark");

 $spacer = new \Kendo\UI\AppBarItem();
 $spacer->type('spacer')
     ->width('8px');

 $secondSpacer = new \Kendo\UI\AppBarItem();
 $secondSpacer->type('spacer')
     ->width('8px');

 $title = new \Kendo\UI\AppBarItem();
 $title->type('contentItem')
     ->template('<h1 class="title">Kendo UI</h1>');

 $list = new \Kendo\UI\AppBarItem();
 $list->type('contentItem')
    ->className('social-section')
     ->template('<span class="k-icon k-i-facebook" />
     <span class="k-icon k-i-twitter" />
     <span class="k-icon k-i-pinterest" />
     <span class="k-icon k-i-google-plus" />
     <span class="k-icon k-i-linkedin" />');

 $emptySpacer = new \Kendo\UI\AppBarItem();
 $emptySpacer->type('spacer');

 $badge = new \Kendo\UI\AppBarItem();
 $badge->type('contentItem')
     ->template('<span class="k-badge-container" style="display: inline-block;">
     <span class="k-icon k-i-bell"></span>
     <span class="k-badge k-badge-sm k-badge-solid k-badge-primary k-badge-dot k-badge-inside k-top-end"></span>
     </span>');

 $separator =  new \Kendo\UI\AppBarItem();
 $separator->type('contentItem')
         ->template('<span class="k-appbar-separator"></span>');

 $search = new \Kendo\UI\AppBarItem();
 $search->type('contentItem')
        ->templateId('search-template');

 $avatar =new \Kendo\UI\AppBarItem();
 $avatar->type('contentItem')
     ->template('<div class="k-avatar k-avatar-circle k-avatar-image">
     <img src="https://www.telerik.com/kendo-angular-ui-develop/assets/cta-image-1-bd9b1b17d7634529ec481e163c99861674480ac09aef710a2b62acc9e8178b38.png">
     </div>');

 $appbar->addItem($avatar, $spacer, $title, $secondSpacer, $list, $emptySpacer, $search);
?>
<div class="appbar-container">
        <?php
            echo $appbar->render();
        ?>
        <div class="page-content">
        <p>
            Personal branding is the conscious and intentional effort to create and influence public perception of an individual by positioning
            them as an authority in their industry, elevating their credibility, and differentiating themselves from the competition,
            to ultimately advance their career, increase their circle of influence, and have a larger impact.
        </p>
        <p>
            The process of personal branding involves finding your uniqueness, building a reputation on the things you want to be known for,
            and then allowing yourself to be known for them. Ultimately, the goal is to create something that conveys a message and that can be monetized.
        </p>
        <p>
            Whereas some self-help practices focus on self-improvement, personal branding defines success as a form of self-packaging. The term is thought
            to have originated from an article written by Tom Peters in 1997. In Be Your Own Brand, first published in 1999, marketers David McNally
            and Karl Speak wrote: "Your brand is a perception or emotion, maintained by somebody other than you, that describes the total
            experience of having a relationship with you."
        </p>
        <p>
            Individuals sometimes associate personal names or pseudonyms with their businesses. Notably, 45th President of the United States and
            real estate mogul Donald Trump uses his last name on properties and other enterprises. Celebrities may also leverage their social
            status to support organizations for financial or social gain. For example, Kim Kardashian endorses brands and products through
            her media influence.
        </p>
        <p>
            The relationship between brands and consumers is dynamic and must be constantly refined. This continuous process demonstrates the
            ambivalence of consumerism. Bop Design estimates that 80% of consumers are more likely to evaluate solutions from the brands they follow
            on a social network.
        </p>
        <p>
            A personal brand is a widely-recognized and largely-uniform perception or impression of an individual based on their experience,
            expertise, competencies, actions and/or achievements within a community, industry, or the marketplace at large.
        </p>
        <p>
            Personal branding is the conscious and intentional effort to create and influence public perception of an individual by positioning
            them as an authority in their industry, elevating their credibility, and differentiating themselves from the competition,
            to ultimately advance their career, increase their circle of influence, and have a larger impact.
        </p>
        <p>
            The process of personal branding involves finding your uniqueness, building a reputation on the things you want to be known for,
            and then allowing yourself to be known for them. Ultimately, the goal is to create something that conveys a message and that can be monetized.
        </p>
        <p>
            Whereas some self-help practices focus on self-improvement, personal branding defines success as a form of self-packaging. The term is thought
            to have originated from an article written by Tom Peters in 1997. In Be Your Own Brand, first published in 1999, marketers David McNally
            and Karl Speak wrote: "Your brand is a perception or emotion, maintained by somebody other than you, that describes the total
            experience of having a relationship with you."
        </p>
        <p>
            Individuals sometimes associate personal names or pseudonyms with their businesses. Notably, 45th President of the United States and
            real estate mogul Donald Trump uses his last name on properties and other enterprises. Celebrities may also leverage their social
            status to support organizations for financial or social gain. For example, Kim Kardashian endorses brands and products through
            her media influence.
        </p>
        <p>
            The relationship between brands and consumers is dynamic and must be constantly refined. This continuous process demonstrates the
            ambivalence of consumerism. Bop Design estimates that 80% of consumers are more likely to evaluate solutions from the brands they follow
            on a social network.
        </p>
        <p>
            A personal brand is a widely-recognized and largely-uniform perception or impression of an individual based on their experience,
            expertise, competencies, actions and/or achievements within a community, industry, or the marketplace at large.
        </p>
        <p>
            Personal branding is the conscious and intentional effort to create and influence public perception of an individual by positioning
            them as an authority in their industry, elevating their credibility, and differentiating themselves from the competition,
            to ultimately advance their career, increase their circle of influence, and have a larger impact.
        </p>
        <p>
            The process of personal branding involves finding your uniqueness, building a reputation on the things you want to be known for,
            and then allowing yourself to be known for them. Ultimately, the goal is to create something that conveys a message and that can be monetized.
        </p>
    </div>
    </div>
 </div>
<script>
    $(function () {
        $(".box-col").on("change", "input", function (e) {
            var option = $(this).attr("name");
            var value = $(this).val();
            var options = {};
            var appbar = $("#appbar").getKendoAppBar();

            options[option] = value;

            appbar.setOptions(options);

            if (appbar.options.position == "top") {
                appbar.element.prependTo($(".appbar-container"));
            } else {
                appbar.element.appendTo($(".appbar-container"));
            }
        });
    });
</script>

<style>
  .spacer-container {
        background-color: #f3f3f3;
    }

    .appbar-container {
        height: 400px;
        overflow: auto;
    }

    #example div.configurator {
        margin: 0;
    }

    #demo-runner {
        padding: 0;
    }

    .title {
        font-size: 18px;
        margin: 0;
    }

    .social-section .k-icon {
        margin: 0 4px;
    }

    .links {
        font-size: 18px;
        margin: 0;
    }

    .k-display-flex {
        display: flex;
        width: 250px;
    }

    .page-content {
        background: white;
        padding: 25px 10px;
        margin-top: 1px;
    }

    .page-content p {
        font-size: 18px;
        padding: 10px 0 10px 0;
    }
</style>
<?php require_once '../include/footer.php'; ?>