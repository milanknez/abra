<?php
require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';

$textarea = new \Kendo\UI\TextArea('invitation');
$textarea->placeholder("Enter your text here.")
        ->rows(10)
        ->attr('style', 'width: 100%')
        ->attr('min', 1)
        ->attr('max', 200)
        ->attr('required', true)
        ->attr('data-required-msg', 'Please enter a text.')
        ->attr('data-max-msg', 'Enter value between 1 and 200');
?>



<div class="demo-section k-content">
    <form id="invitationForm">
        <h4>Send invitation:</h4>
        <?= $textarea->render() ?>
        <div class="k-form-footer">
            <div class="k-counter-container"><span class="k-counter-value">0</span>/200</div>
            <button class="k-button k-primary">Send</button>
        </div>
    </form>
</div>

<script>
    $(document).ready(function() {
        $("#invitation").on('input', function (e) {
            $('.k-counter-container .k-counter-value').html($(e.target).val().length);
        });

        $("#invitationForm").kendoValidator();

        $("form").submit(function (event) {
            event.preventDefault();
        });
    });
</script>

<style>
    .k-floating-label-container {
        width: 100%;
    }

    .k-form-footer{
        display:flex;
        flex-direction:column;
    }

    #example .k-button{
        margin-top: 20px;
        width:80px;
        margin-left:auto;
    }
    #example .k-counter-container {
        color: #9C9C9C;
        font-size:13px;
        margin-top: 5px;
        margin-left:auto;
    }
</style>



<?php require_once '../include/footer.php'; ?>
