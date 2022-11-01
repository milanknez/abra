<?php
require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';
?>

<div class="demo-section k-content">
    <div>
        <h4>Default Button</h4>
        <?php
                $defaultButton = new \Kendo\UI\SplitButton('defaultButton');
                $defaultButton->content("Paste");
                $defaultButton->icon("paste");
                $defaultButton->click("onClick");

                $keepText = new \Kendo\UI\SplitButtonItem();
                $keepText->text("Keep Text Only")
                    ->icon("paste-as-html")
                    ->id("paste-html");

                $pasteHTML = new \Kendo\UI\SplitButtonItem();
                $pasteHTML->text("Paste as HTML")
                    ->icon("paste-plain-text")
                    ->id("keep-text");

                $pasteMarkdown = new \Kendo\UI\SplitButtonItem();
                $pasteMarkdown->text("Paste Markdown")
                    ->icon("paste-markdown")
                    ->id("keep-markdown");

                $setDefault = new \Kendo\UI\SplitButtonItem();
                $setDefault->text("Set Default Paste")
                    ->id("paste-default");

                $defaultButton->addItem($keepText);
                $defaultButton->addItem($pasteHTML);
                $defaultButton->addItem($pasteMarkdown);
                $defaultButton->addItem($setDefault);
                echo $defaultButton->render();
            ?>
    </div>
    <div>
        <h4>Flat Button</h4>
        <?php
                $flatButton = new \Kendo\UI\SplitButton('flatButton');
                $flatButton->content("Paste");
                $flatButton->icon("paste");
                $flatButton->click("onClick");
                $flatButton->fillMode("flat");

                $keepText = new \Kendo\UI\SplitButtonItem();
                $keepText->text("Keep Text Only")
                    ->icon("paste-as-html")
                    ->id("paste-html");

                $pasteHTML = new \Kendo\UI\SplitButtonItem();
                $pasteHTML->text("Paste as HTML")
                    ->icon("paste-plain-text")
                    ->id("keep-text");

                $pasteMarkdown = new \Kendo\UI\SplitButtonItem();
                $pasteMarkdown->text("Paste Markdown")
                    ->icon("paste-markdown")
                    ->id("keep-markdown");

                $setDefault = new \Kendo\UI\SplitButtonItem();
                $setDefault->text("Set Default Paste")
                    ->id("paste-default");

                $flatButton->addItem($keepText);
                $flatButton->addItem($pasteHTML);
                $flatButton->addItem($pasteMarkdown);
                $flatButton->addItem($setDefault);
                echo $flatButton->render();
            ?>
    </div>
    <div>
        <h4>Outline Button</h4>
        <?php
                $outlineButton = new \Kendo\UI\SplitButton('outlineButton');
                $outlineButton->content("Paste");
                $outlineButton->icon("paste");
                $outlineButton->click("onClick");
                $outlineButton->fillMode("outline");

                $keepText = new \Kendo\UI\SplitButtonItem();
                $keepText->text("Keep Text Only")
                    ->icon("paste-as-html")
                    ->id("paste-html");

                $pasteHTML = new \Kendo\UI\SplitButtonItem();
                $pasteHTML->text("Paste as HTML")
                    ->icon("paste-plain-text")
                    ->id("keep-text");

                $pasteMarkdown = new \Kendo\UI\SplitButtonItem();
                $pasteMarkdown->text("Paste Markdown")
                    ->icon("paste-markdown")
                    ->id("keep-markdown");

                $setDefault = new \Kendo\UI\SplitButtonItem();
                $setDefault->text("Set Default Paste")
                    ->id("paste-default");

                $outlineButton->addItem($keepText);
                $outlineButton->addItem($pasteHTML);
                $outlineButton->addItem($pasteMarkdown);
                $outlineButton->addItem($setDefault);
                echo $outlineButton->render();
            ?>
    </div>
    <script>
        function onClick(e) {
                alert("event :: click (#" + e.id + ")" );
        }
    </script>
    <style>
        .demo-section{
            display:flex;
            justify-content: space-between;
        }
    </style>
</div>

<?php require_once '../include/footer.php'; ?>
