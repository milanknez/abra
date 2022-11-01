<?php

require_once '../lib/Kendo/Autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $type = $_GET['type'];

    if ($type == 'chunksave') {
        $files = $_FILES['files'];

        if(!is_null($_POST['metadata'])){
            $metaData = json_decode($_POST['metadata']);

            // Save the uploaded files
            $file = $files['tmp_name'];

        //   $content = file_get_contents($file);
        //  file_put_contents( $metaData->fileName, $content, FILE_APPEND);

            $object = new stdClass();
            $object->uploaded = $metaData->totalChunks - 1<= $metaData->chunkIndex;
            $object->fileUid = $metaData->uploadUid;

            $jsonstring = json_encode($object);
            echo $jsonstring;
        } else{
             $files = $_FILES['files'];
            // Save the uploaded files
            /*
            for ($index = 0; $index < count($files['name']); $index++) {
                $file = $files['tmp_name'][$index];
                if (is_uploaded_file($file)) {
                    move_uploaded_file($file, './' . $files['name'][$index]);
                }
            }
            */
        }
        

    } else if ($type == 'remove') {
        $fileNames = $_POST['fileNames'];
        // Delete uploaded files
        /*
        for ($index = 0; $index < count($fileNames); $index++) {
            unlink('./' . $fileNames[$index]);
        }
        */
    }

    // Return an empty string to signify success
    echo '';

    exit;
}
require_once '../include/header.php';
?>


<div class="demo-section k-content wide" style="margin-bottom:0px; position: relative;">
    <div style="width:40%; float:left">
<?php
$upload = new \Kendo\UI\Upload('files');
$upload->attr('aria-label', 'files');

$upload->async(array(
    'saveUrl' => 'index.php?type=chunksave',
    'removeUrl' => 'index.php?type=remove',
    'autoUpload' => false,
    'removeField' => 'fileNames[]',
    'chunkSize' => 11000
))
->validation(array(
	'allowedExtensions'=>(array(".pdf", ".jpg", "docx", "xlsx", "zip"))
	));

echo $upload->render();
?>
</div>
 <div style="float:right">
        <div class="dropZoneElement">
                <div class="textWrapper">
                    <p>Drag &amp; Drop Files Here</p>
                    <p class="dropImageHereText">Drop file here to upload</p>
                </div>
            </div>
        </div>
        <div class="or">
            <h4>OR</h4>
        </div>
</div>
<div class="box">
    <div class="box-col">
        <h4>Select allowed files types for upload</h4>
        <?php
            $select = new \Kendo\UI\MultiSelect('fileTypes');
            $select ->dataTextField('text')
                    ->dataValueField('value')
                    ->dataSource(array(
                                array('text' => 'jpg', 'value' => 'jpg'),
                                array('text' => 'pdf', 'value' => 'pdf'),
                                array('text' => 'docx', 'value' => 'docx'),
                                array('text' => 'xlsx', 'value' => 'xlsx'),
                                array('text' => 'zip', 'value' => 'zip')
                    ))
                ->change('onChange')
                ->value(array("jpg","pdf","docx","xlsx","zip"));

            echo $select->render();
        ?>
    </div>
    <div class="box-col">
        <input type="checkbox" id="limitUploadSize" class="k-checkbox">
        <label class="k-checkbox-label" for="limitUploadSize">Limit File Size to 4MB</label>
    </div>
</div>
<script>

	function onChange() {
	    var upload = $("#files").getKendoUpload();
	    upload.destroy();

	    initUpload();
	}

	var initUpload = function () {
	    var validation = {};
	    var limitUploadSize = $("#limitUploadSize").prop("checked");
	    var filetypes = $("#fileTypes").getKendoMultiSelect().value();
	    if (limitUploadSize) {
	        validation.maxFileSize = 4194304;
	    }
	    validation.allowedExtensions = filetypes

	    $("#files").kendoUpload({
	        async: {
	            chunkSize: 11000,// bytes
	            saveUrl: "chunkSave",
	            removeUrl: "remove",
	            autoUpload: false
	        },
	        validation: validation,
	        dropZone: ".dropZoneElement"
	    }).data("kendoUpload");

	};
	$("#limitUploadSize").change(function () {
	    var upload = $("#files").getKendoUpload();
	    upload.destroy();

	    initUpload();
	});


</script>
<style>
    .dropZoneElement {
        position: relative;
        display: inline-block;
        background-color: #f8f8f8;
        border: 1px solid #c7c7c7;
        width: 350px;
        height: 200px;
        text-align: center;
    }

    .textWrapper {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 100%;
        font-size: 18px;
        line-height: 1.2em;
        font-family: Arial,Helvetica,sans-serif;
        color: #000;
    }

    .dropImageHereText {
        color: #c7c7c7;
        text-transform: uppercase;
        font-size: 12px;
    }

    .wrapper:after {
        content: ".";
        display: inline-block;
        height: 0;
        clear: both;
        visibility: hidden;
    }
    .or{
        margin:auto;
        text-align:center;
        position: absolute;
        top: 50%;
        left: 45%;
        transform: translate(-50%,-45%);
    }
</style>
<?php require_once '../include/footer.php'; ?>
