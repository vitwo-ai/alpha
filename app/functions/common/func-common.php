<?php

function getSetAlertMessage($data = [])
{
    if (isset($data["status"]) && isset($data["message"])) {
        $_SESSION["alertMessage"]["status"] = $data["status"];
        $_SESSION["alertMessage"]["message"] = $data["message"];
    } else {
        $returnData = [];
        if (isset($_SESSION["alertMessage"])) {
            $returnData = $_SESSION["alertMessage"];
            unset($_SESSION["alertMessage"]);
        }
        return $returnData;
    }
    return 1;
}

function console($data = null)
{
    if ($data != null) {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}


function redirect($url = null)
{
    if ($url != null) {
    ?>
        <script>
            window.location.href = `<?= $url ?>`;
        </script>
    <?php
    }
}

function swalToast($icon = null, $title = null)
{
    if ($icon != null && $title != null) {
    ?>
        <script>
            $(document).ready(function() {
                let Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
                Toast.fire({
                    icon: `<?= $icon ?>`,
                    title: `&nbsp;<?= $title ?>`
                });
            });
        </script>
        <?php
    }
}

function swalAlert($icon = null, $title = null, $text = null, $url = null)
{
    if ($icon != null && $text != null) {
        if ($url != null) {
        ?>
            <script>
                $(document).ready(function() {
                    Swal.fire({
                        icon: `<?= $icon ?>`,
                        title: `<?= $title ?>`,
                        text: `<?= $text ?>`,
                    }).then(function() {
                        window.location.href = `<?= $url ?>`;
                    });
                });
            </script>
        <?php
        } else {
        ?>
            <script>
                $(document).ready(function() {
                    Swal.fire({
                        icon: `<?= $icon ?>`,
                        title: `<?= $title ?>`,
                        text: `<?= $text ?>`,
                    });
                });
            </script>
        <?php
        }
    }
}

function uploadFile($file = [], $dir = "", $allowedExtensions = [], $maxSize = 0, $minSize = 0)
{
    $validationError = "";
    $fileExtension = pathinfo($file["name"], PATHINFO_EXTENSION);
    $fileNewName = time() . rand(10000, 99999) . "." . $fileExtension;
    if (sizeof($allowedExtensions) > 0) {
        if (!in_array(strtolower($fileExtension), $allowedExtensions)) {
            $validationError = "Extension not allowed";
        }
    }
    if ($file["size"] <= 0) {
        $validationError = "Invalid file";
    }
    if ($maxSize > 0) {
        if ($file["size"] > $maxSize) {
            $validationError = "File size should be less then " . number_format($maxSize / 1024, 0) . " kb";
        }
    }
    if ($minSize > 0) {
        if ($file["size"] < $minSize) {
            $validationError = "File size should be grater then " . number_format($minSize / 1024, 0) . " kb";
        }
    }
    //upload
    if ($validationError == "") {
        if (move_uploaded_file($file["tmp_name"], $dir . $fileNewName)) {
            $returnData["status"] = "success";
            $returnData["message"] = "Upload success";
            $returnData["data"] = $fileNewName;
        } else {
            $returnData["status"] = "error";
            $returnData["message"] = "Upload fail";
            $returnData["data"] = "";
        }
    } else {
        $returnData["status"] = "error";
        $returnData["message"] = $validationError;
        $returnData["data"] = "";
    }
    return $returnData;
}

?>
