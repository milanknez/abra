<?php
require_once '../lib/Kendo/Autoload.php';
require_once '../include/header.php';
?>

<div class="demo-section k-content wide">
    <?php
        $stepper = new \Kendo\UI\Stepper('stepper');
        $stepper->linear(false);

        $stepOne = new \Kendo\UI\StepperStep();
        $stepOne->label("Personal Info")
            ->icon("user");

        $stepTwo = new \Kendo\UI\StepperStep();
        $stepTwo->label("Education")
            ->icon("dictionary-add")
            ->error(true);

        $stepThree = new \Kendo\UI\StepperStep();
        $stepThree->label("Experience")
            ->selected(true)
            ->icon("flip-vertical");

        $stepFour = new \Kendo\UI\StepperStep();
        $stepFour->label("Attachments")
            ->icon("attachment");

        $stepFive = new \Kendo\UI\StepperStep();
        $stepFive->label("Review")
            ->icon("preview")
            ->enabled(false);

        $stepSix = new \Kendo\UI\StepperStep();
        $stepSix->label("Submit")
            ->icon("file-add");

        $stepper->addStep($stepOne);
        $stepper->addStep($stepTwo);
        $stepper->addStep($stepThree);
        $stepper->addStep($stepFour);
        $stepper->addStep($stepFive);
        $stepper->addStep($stepSix);

        echo $stepper->render();
     ?>
</div>

<?php require_once '../include/footer.php'; ?>