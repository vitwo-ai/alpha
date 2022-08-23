<?php
include("../app/connection-admin.php");
include("common/header.php");
include("common/navbar.php");
include("common/sidebar.php");

$gstin = (isset($_GET["gstin"]) && !empty($_GET["gstin"])) ? $_GET["gstin"] : "";
$vendorPan = strlen($gstin) >= 10 ? substr($gstin, 2, 10) : "";
if ($gstin != "") {
    if (!isset($_SESSION["gstDetails"][$gstin])) {
        $gstResponseObj = file_get_contents("http://localhost/projects/vitwo/webmaster/ajax-gst-details.php?gstin=" . $gstin);
        $gstResponseData = json_decode($gstResponseObj, true);
        $_SESSION["gstDetails"][$gstin] = isset($gstResponseData["data"]) ? $gstResponseData["data"] : [];
        //console($gstResponseData);
    } else {
        echo "getting data from session!";
        //console($_SESSION["gstDetails"][$gstin]);
    }
}

if (isset($_SESSION["gstDetails"][$gstin])) {
    $gstDetails = $_SESSION["gstDetails"][$gstin];
} else {
    $gstDetails = [];
}


?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header mb-2 p-0  border-bottom">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= ADMIN_URL ?>" class="text-dark"><i class="fas fa-home"></i> Home</a></li>
                <li class="breadcrumb-item active"><a href="<?= basename($_SERVER['PHP_SELF']); ?>" class="text-dark">Manage Vendors</a></li>
            </ol>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Create New Vendor</h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="row p-0 m-0">
                                <?php
                                
                                ?>
                            </div>
                            <div class="row m-0 p-0 mt-3">
                                <div class="card card-outline card-primary ml-auto mr-auto">
                                    <div class="card-header text-center h4 text-bold">Verify GSTIN</div>
                                    <div class="card-body">
                                        <small class="mt-2 text-muted">Put your GSTIN and click on below verify button to get your Bussiness details!</small>
                                        <div class="input-group mb-3">
                                            <input type="text" id="vendorGstNoInput" class="form-control" placeholder="Enter your GSTIN here!">
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <span class="btn btn-primary btn-block" id="checkAndVerifyGstinBtn">
                                                    Verify
                                                </span>
                                            </div>
                                        </div>
                                        <div class="row mt-2 ml-auto mr-auto">
                                            <div>
                                                <span>Don't have GSTIN? Check me </span>
                                                <div class="icheck-primary d-inline ml-2">
                                                    <input type="checkbox" id="isGstRegisteredCheckBoxBtn">
                                                    <label for="isGstRegisteredCheckBoxBtn">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-2" id="vendorCreateMainForm"></div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.Content Wrapper. Contains page content -->
<?php
include("common/footer.php");
?>


<script>
    var BASE_URL = `<?= BASE_URL ?>`;
    var ADMIN_URL = `<?= ADMIN_URL ?>`;
    $(document).ready(function() {
        $(document).on("change", "#isGstRegisteredCheckBoxBtn", function() {
            let isChecked = $(this).is(':checked');
            if (isChecked) {
                $("#vendorGstNoInput").attr("readonly", "readonly");
                $("#vendorPanNo").removeAttr("readonly");
                
                $.ajax({
                    type: "GET",
                    url: `${ADMIN_URL}ajaxs/ajax-vendor-with-out-verify-gstin.php`,
                    beforeSend: function() {
                        $('#checkAndVerifyGstinBtn').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...');
                        $("#checkAndVerifyGstinBtn").toggleClass("disabled");
                    },
                    success: function(response) {
                        $("#checkAndVerifyGstinBtn").toggleClass("disabled");
                        $('#checkAndVerifyGstinBtn').html("Re-Verify");
                        responseObj = (response);
                        $("#vendorCreateMainForm").html(responseObj);
                        console.log(responseObj);
                    }
                });

            } else {
                $("#vendorCreateMainForm").html("");
                $("#vendorGstNoInput").removeAttr("readonly");
                $("#vendorPanNo").attr("readonly", "readonly");
            }
            $("#checkAndVerifyGstinBtn").toggleClass("disabled");
        });

        $("#checkAndVerifyGstinBtn").click(function() {
            let vendorGstNo = $("#vendorGstNoInput").val();
            if (vendorGstNo != "") {
                $.ajax({
                    type: "GET",
                    url: `${ADMIN_URL}ajaxs/ajax-vendor-verify-gstin.php?gstin=${vendorGstNo}`,
                    beforeSend: function() {
                        $('#checkAndVerifyGstinBtn').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...');
                        $("#checkAndVerifyGstinBtn").toggleClass("disabled");
                    },
                    success: function(response) {
                        $("#checkAndVerifyGstinBtn").toggleClass("disabled");
                        $('#checkAndVerifyGstinBtn').html("Re-Verify");
                        responseObj = (response);
                        $("#vendorCreateMainForm").html(responseObj);
                        console.log(responseObj);
                    }
                });
            } else {
                let Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
                Toast.fire({
                    icon: `warning`,
                    title: `&nbsp;Please provide GSTIN No!`
                });
            }
        });
        // $("#checkAndVerifyGstinBtn").click(function() {
        //     let vendorGstNo = $("#vendorGstNo").val();
        //     if (vendorGstNo != "") {
        //         //window.location.href=`http://localhost/projects/vitwo/webmaster/ajax-gst-details.php?gstin=${vendorGstNo}`;
        //         window.location.href = `http://localhost/projects/vitwo/webmaster/manage-vendors.php?gstin=${vendorGstNo}`;
        //         $("#vendorPanNo").val(vendorGstNo.substr(2, 10));

        //         // $.ajax({
        //         //     type: "GET",
        //         //     url: `http://localhost/projects/vitwo/webmaster/ajax-gst-details.php?gstin=${vendorGstNo}`,
        //         //     beforeSend: function() {
        //         //         $('#checkGstinBtn').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...');
        //         //     },
        //         //     success: function(response){

        //         //         $('#checkGstinBtn').html("Re-Check Now");
        //         //         responseObj = JSON.parse(response);
        //         //         if(responseObj["status"]=="success"){
        //         //             responseData=responseObj["data"];

        //         //             console.log(responseData);

        //         //             $("#vendorStatus").val(responseData["sts"]);

        //         //         }else{
        //         //             let Toast = Swal.mixin({
        //         //                 toast: true,
        //         //                 position: 'top-end',
        //         //                 showConfirmButton: false,
        //         //                 timer: 3000
        //         //             });
        //         //             Toast.fire({
        //         //                 icon: `warning`,
        //         //                 title: `&nbsp;Invalid GSTIN No!`
        //         //             });
        //         //         }
        //         //     }
        //         // });
        //     } else {
        //         let Toast = Swal.mixin({
        //             toast: true,
        //             position: 'top-end',
        //             showConfirmButton: false,
        //             timer: 3000
        //         });
        //         Toast.fire({
        //             icon: `warning`,
        //             title: `&nbsp;Please provide GSTIN No!`
        //         });
        //     }
        //     console.log("clicked!!!!!!!!!!!!!!!!!!", vendorGstNo);
        // });


        $(document).on("click", ".deleteOtherAddressBtns", function() {
            let deleteAddNo = ($(this).attr("id")).split("_")[1];
            $(`#otherAddressItem_${deleteAddNo}`).remove();
        });

        let otherAddressItemCounter = 1;
        $(document).on("click", ".addNewOtherAddress", function() {
            otherAddressItemCounter += 1;
            let formHtml = `
                                                <div id="otherAddressItem_${otherAddressItemCounter}">
                                                    <div class="row m-0 p-2 bg-secondary">
                                                        <!-- <div class="h5 text-bold ml-1">1. Address</div> -->
                                                        <div class="ml-auto mr-2">
                                                            <span class="btn btn-warning btn-sm text-light deleteOtherAddressBtns" id="deleteOtherAddressBtn_${otherAddressItemCounter}">Delete</span>
                                                            <span class="btn btn-success btn-sm addNewOtherAddress">Add New</span>
                                                        </div>
                                                    </div>
                                                    <div class="row m-0 p-0">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="text-muted">GST Legal Name</label>
                                                                <input type="text" class="form-control" placeholder="GST Legal Name" name="vendorBranchGstLegalName[]" required>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="text-muted">GST Trade Name</label>
                                                                <input type="text" class="form-control" placeholder="GST Trade Name" name="vendorBranchGstTradeName[]" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row m-0 p-0">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="text-muted">Constitution of Business</label>
                                                                <input type="text" class="form-control" placeholder="GST Legal Name" name="vendorBranchConstitutionBusiness[]" required>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="text-muted">Building Number</label>
                                                                <input type="text" class="form-control" placeholder="Building Number" name="vendorBranchBuildingNumber[]" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row m-0 p-0">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="text-muted">Flat Number</label>
                                                                <input type="text" class="form-control" placeholder="Flat Number" name="vendorBranchFlatNumber[]" required>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="text-muted">Street Name</label>
                                                                <input type="text" class="form-control" placeholder="Street Name" name="vendorBranchStreetName[]" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row m-0 p-0">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="text-muted">Pin Code</label>
                                                                <input type="text" class="form-control" placeholder="Pin Code" name="vendorBranchPinCode[]" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="text-muted">Location</label>
                                                                <input type="text" class="form-control" placeholder="Location" name="vendorBranchLocation[]" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row m-0 p-0">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="text-muted">City</label>
                                                                <input type="text" class="form-control" placeholder="City" name="vendorBranchCity[]" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="text-muted">District</label>
                                                                <input type="text" class="form-control" placeholder="District" name="vendorBranchDistrict[]" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row m-0 p-0">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="text-muted">State</label>
                                                                <input type="text" class="form-control" placeholder="State" name="vendorBranchState[]" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="text-muted">Status</label>
                                                                <input type="text" class="form-control" placeholder="Status" name="vendorBranchStatus[]" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>`;
            $("#otherAddressesListDiv").append(formHtml);
        });

    });
</script>