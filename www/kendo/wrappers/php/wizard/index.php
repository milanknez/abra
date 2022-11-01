<?php
require_once '../lib/Kendo/Autoload.php';
require_once '../include/header.php';
?>

<div class="demo-section k-content wide" style="width:600px">
    <?php
        $countries = array("France", "Germany", "Italy", "Netherlands", "Norway", "Spain");
		$genders = array("Female", "Male", "Other");

        $wizard = new \Kendo\UI\Wizard('wizard');

        $username = new \Kendo\UI\FormItem();
        $username->label("Username")
            ->field("Username")
            ->validation(array("required" => true));

        $email = new \Kendo\UI\FormItem();
        $email->label("Email")
            ->field("Email")
            ->validation(array("required" => true,  "email" => true));

        $password = new \Kendo\UI\FormItem();
        $password->label("Password")
            ->field("Password")
            ->validation(array("required" => true))
            ->hint("Hint: enter alphanumeric characters only.")
            ->attributes(array("type" => "password"));

        $formOne = new \Kendo\UI\Form("form");
        $formOne->orientation("vertical")
            ->formData(array("Username" => "johny", "Email" => "john.doe@email.com", "Password" => "pass123"))
            ->addItem($username)
            ->addItem($email)
            ->addItem($password);

        $buttonNextOne = new \Kendo\UI\WizardStepButton();
        $buttonNextOne->name("next");

        $stepOne = new \Kendo\UI\WizardStep();
        $stepOne->title("Account Details")
            ->addButton($buttonNextOne)
            ->form($formOne);

        $buttonNextTwo = new \Kendo\UI\WizardStepButton();
        $buttonNextTwo->name("next");

        $buttonPrevTwo = new \Kendo\UI\WizardStepButton();
        $buttonPrevTwo->name("previous");

        $name = new \Kendo\UI\FormItem();
        $name->label("Full Name")
            ->field("FullName")
            ->validation(array("required" => true));

        $country = new \Kendo\UI\FormItem();
        $country->label("Country")
            ->field("Country")
            ->validation(array("required" => true))
            ->editor("AutoComplete")
            ->editorOptions(array("dataSource" => $countries, "filter" => "startswith", "placeholder" => "Select country..."));

        $gender = new \Kendo\UI\FormItem();
        $gender->label("Gender")
            ->field("Gender")
            ->validation(array("required" => true))
			->editor("RadioGroup")
            ->editorOptions(array("items" => $genders, "layout" => "horizontal", "labelPosition" => "Select country..."));

        $about = new \Kendo\UI\FormItem();
        $about->label("About(Optional)")
            ->field("About");

        $formTwo = new \Kendo\UI\Form("form");
        $formTwo->orientation("vertical")
            ->addItem($name)
            ->addItem($country)
            ->addItem($gender)
            ->addItem($about);

        $stepTwo = new \Kendo\UI\WizardStep();
        $stepTwo->title("Personal Details")
            ->addButton($buttonPrevTwo)
            ->addButton($buttonNextTwo)
            ->form($formTwo);

        $buttonDone = new \Kendo\UI\WizardStepButton();
        $buttonDone->name("done");

        $buttonPrevThree = new \Kendo\UI\WizardStepButton();
        $buttonPrevThree->name("previous");

        $paymentType = new \Kendo\UI\FormItem();
        $paymentType->label("Payment Type")
            ->field("PaymentType")
            ->validation(array("required" => true))
            ->editorFunction("paymentEditor")
            ->colSpan(3);

        $cardNumber = new \Kendo\UI\FormItem();
        $cardNumber->label("Card Number")
            ->field("CardNumber")
            ->validation(array("required" => true))
            ->editor("MaskedTextBox")
            ->editorOptions(array("mask" => "0000-0000-0000-0000"))
            ->colSpan(2);

        $csvNumber = new \Kendo\UI\FormItem();
        $csvNumber->label("CSV Number")
            ->field("CSVNumber")
            ->validation(array("required" => true))
            ->editor("MaskedTextBox")
            ->editorOptions(array("mask" => "000"))
            ->colSpan(1)
            ->hint("The last 3 digids on the back");

        $expirationDate = new \Kendo\UI\FormItem();
        $expirationDate->label("Expiration Date")
            ->field("ExpirationDate")
            ->validation(array("required" => true))
            ->editor("DateInput")
            ->editorOptions(array("format" => "MM/yyyy"))
            ->colSpan(3);

        $holderName = new \Kendo\UI\FormItem();
        $holderName->label("Card Holder Name")
            ->field("CardHolderName")
            ->validation(array("required" => true))
            ->colSpan(3);

        $group = new \Kendo\UI\FormItem();
        $group->type("group")
            ->layout("grid")
            ->grid(array("cols" => 3, "gutter" => 10))
            ->addItem($paymentType)
            ->addItem($cardNumber)
            ->addItem($csvNumber)
            ->addItem($expirationDate)
            ->addItem($holderName);

        $formThree = new \Kendo\UI\Form("form");
        $formThree->orientation("vertical")
            ->addItem($group);

        $stepThree = new \Kendo\UI\WizardStep();
        $stepThree->title("Payment Details")
            ->addButton($buttonPrevThree)
            ->addButton($buttonDone)
            ->form($formThree);

        $wizard->tag("form")
            ->addStep($stepOne)
            ->addStep($stepTwo)
            ->addStep($stepThree)
            ->attributes(array("novalidate" => ""))
            ->done("onDone");

        echo $wizard->render();
     ?>
</div>

<script>
    function onDone(e) {
        kendo.alert("Thank you for registering! Registration details would be sent to you.");
    }

    function paymentEditor(container, item) {
        container.append($(
            '<div class="payment-type">' +
            '<ul class="k-radio-list k-list-horizontal">' +
            '<li class="k-radio-item">' +
            '<input type="radio" id="visa" name="' + item.field + '" value="Visa" class="k-radio" required />' +
            '<label for="visa" class="card visa"></label>' +
            '</li>' +
            '<li class="k-radio-item">' +
            '<input type="radio" id="mastercard" name="' + item.field + '" value="MasterCard" class="k-radio" required />' +
            '<label for="mastercard" class="card mastercard"></label>' +
            '</li>' +
            '<li class="k-radio-item">' +
            '<input type="radio" id="paypal" name="' + item.field + '" value="PayPal" class="k-radio" required />' +
            '<label for="paypal" class="card paypal">' +
            '</li>' +
            '</ul>' +
            '</div>' +
            '<span class="k-invalid-msg" data-for="' + item.field + '"></span>'
        ));
    }
</script>

<style>
    .payment-type input {
        visibility: hidden;
        position: absolute;
    }

    .card {
        cursor: pointer;
        background-size: auto;
        background-repeat: no-repeat;
        background-position: center;
        display: inline-block;
        width: 152px;
        height: 70px;
        border: 1px solid;
        filter: brightness(1.8) grayscale(1) opacity(.7);
    }

    .card:hover {
        filter: brightness(1.2) grayscale(.5) opacity(.9);
    }

    .visa {
        background-image: url(https://image.flaticon.com/icons/svg/196/196578.svg);
    }

    .mastercard {
        background-image: url(https://image.flaticon.com/icons/svg/196/196561.svg);
    }

    .paypal {
        background-image: url(https://image.flaticon.com/icons/svg/196/196565.svg);
    }

    .payment-type input:active + .card {
        opacity: .9;
    }

    .payment-type input:checked + .card {
        filter: none;
    }
</style>

<?php require_once '../include/footer.php'; ?>