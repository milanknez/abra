<?php

require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';

?>

<div class="demo-section k-content">
    <div id="validation-summary"></div>
<?php
    $form = new \Kendo\UI\Form('test');
    $form->formData(array("Username" => "", "Password" => "", "Email" => "", "Birth" => new DateTime(), "Agree"=> false));



    $formItem = new \Kendo\UI\FormItem();
    $formItem
        ->label("Registration Form")
        ->type("group");



    $username = new \Kendo\UI\FormItem();
    $username
        ->label("Username:")
        ->field("Username")
        ->validation(array("required" => true));

    $email = new \Kendo\UI\FormItem();
    $email
        ->label("Email:")
        ->field("Email")
        ->validation(array("required" => true));

    $password = new \Kendo\UI\FormItem();
    $password
        ->label("Password:")
        ->field("Password")
        ->hint("Hint: enter alphanumeric characters only.")
        ->validation(array("required" => true));



    $birth = new \Kendo\UI\FormItem();
    $birth
        ->label("Birth:")
        ->field("Birth")
        ->label(array("text"=>"Date of Birth: ", "optional" => true));

    $agree = new \Kendo\UI\FormItem();
    $agree
        ->label("Agree to Terms:")
        ->field("Agree")
        ->validation(array("required" => true));

    $formItem->addItem($username);
    $formItem->addItem($email);
    $formItem->addItem($password);
    $formItem->addItem($birth);
    $formItem->addItem($agree);



    $form->addItem($formItem);
    $form->validateField('onValidationField')
         ->submit('onSubmit')
         ->clear('onClear')
         ->attributes(array("method" => "post"));

    echo $form->render();
?>
</div>

<script>
    var validationSummary = $("#validation-summary");
    function onValidationField(e) {
        validationSummary.html("");
    }

    function onSubmit(e) {
        e.preventDefault();
        validationSummary.html("<div class='k-messagebox k-messagebox-success'>Form data is valid!</div>");
    }

    function onClear(e) {
        validationSummary.html("");
    }
</script>

<?php require_once '../include/footer.php'; ?>
