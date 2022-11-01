<?php
require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';
?>

<div class="demo-section k-content">
    <div id="avatar-container">
        <div class="contact-list">Contacts</div>
        <div class="user-data-container">
            <div class="k-hbox">
                <?php
                    $avatarText = new \Kendo\UI\Avatar('avatar-text');

                    $avatarText->type('text')
                            ->text('JS');

                    echo $avatarText->render();
                ?>
                <div style="margin-left: 10px">
                    <h2 class="contact-name">Jason Smith</h2>
                    <p class="contact-position">UX Desiner</p>
                </div>
            </div>
            <div class="k-hbox">
                <?php
                    $avatarTextSecond = new \Kendo\UI\Avatar('avatar-text-second');

                    $avatarTextSecond->type('text')
                            ->text('GP');

                    echo $avatarTextSecond->render();
                ?>
                <div style="margin-left: 10px">
                    <h2 class="contact-name">George Porter</h2>
                    <p class="contact-position">Software Engineer</p>
                </div>
            </div>
        </div>
        <div class="user-data-container k-hbox">
            <?php
                $avatarImage = new \Kendo\UI\Avatar('avatar-image');

                $avatarImage->type('image')
                        ->image('../content/shared/images/employees/1.png');

                echo $avatarImage->render();
            ?>
            <div style="margin-left: 10px">
                <h2 class="contact-name">Michael Holz</h2>
                <p class="contact-position">Manager</p>
            </div>
            <?php
                $avatarImageSecond = new \Kendo\UI\Avatar('avatar-image-second');

                $avatarImageSecond->type('image')
                        ->image('../content/shared/images/employees/4.png');

                echo $avatarImageSecond->render();
            ?>
            <div style="margin-left: 10px">
                <h2 class="contact-name">Andre Steward</h2>
                <p class="contact-position">Product Manager</p>
            </div>
        </div>
        <div class="user-data-container k-hbox">
            <?php
                $avatarIcon = new \Kendo\UI\Avatar('avatar-icon');

                $avatarIcon->rounded(null)
                        ->type('icon')
                        ->icon('user');

                echo $avatarIcon->render();
            ?>
            <div style="margin-left: 10px">
                <h2 class="contact-name">Unknown</h2>
                <p class="contact-position">Not Specified</p>
            </div>
        </div>
    </div>
</div>

<style>
    #avatar-container {
        width: 340px;
        margin: auto;
        padding: 4px 10px;
        box-shadow: 0px 1px 5px 0px rgba(0, 0, 0, 0.26), 0px 2px 2px 0px rgba(0, 0, 0, 0.12), 0px 3px 1px -2px rgba(0, 0, 0, 0.08);
    }

    .contact-position {
        margin: 0px;
        font-size: 0.8em;
    }

    .contact-name {
        font-size: 1.3em;
        font-weight: normal;
        margin: 0px;
    }

    .contact-list {
        text-align: center;
        padding: 4px;
        font-size: 20px;
    }

    .user-data-container{
        padding: 8px 14px;
        margin-bottom: 4px;
        box-shadow: 0 1px 2px #ccc;
    }

    .k-hbox {
        padding-top: 10px;
        padding-bottom: 10px;
    }
</style>

<?php require_once '../include/footer.php'; ?>
