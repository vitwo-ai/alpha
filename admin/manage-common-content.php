<?php
include("../app/connection-admin.php");
include("common/header.php");
include("common/navbar.php");
include("common/sidebar.php");

administratorAuth();

if (isset($_POST["changeStatus"])) {
    $newStatusObj = adminFuncChangeStatus($_POST, "tbl_common_content", "contentKey", "contentStatus");
    swalToast($newStatusObj["status"], $newStatusObj["message"]);
}

if (isset($_POST["addNewContentFormBtn"])) {
    $addNewObj = addNewCommonContent($_POST + $_FILES);
    swalToast($addNewObj["status"], $addNewObj["message"]);
}

if (isset($_POST["editContentFormBtn"])) {
    $editDataObj = updateCommonContent($_POST);
    swalToast($editDataObj["status"], $editDataObj["message"]);
}



if (isset($_GET["view"]) && $_GET["view"] > 0) {
?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header mb-2 p-0  border-bottom">
            <div class="container-fluid">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= ADMIN_URL ?>" class="text-dark"><i class="fas fa-home"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= basename($_SERVER['PHP_SELF']); ?>" class="text-dark">Manage Common Content</a></li>
                    <li class="breadcrumb-item active"><a href="<?= basename($_SERVER['PHP_SELF']); ?>" class="text-dark">View</a></li>
                </ol>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- row -->
                <div class="row p-0 m-0">

                    <div class="col-12 m-0 p-0">
                        <div class="card card-dark card-tabs">
                            <div class="card-header">
                                <h3 class="card-title">Common Content Details <small class="text-muted">View</small></h3>
                            </div>
                            <div class="card-body">
                                <?php
                                $viewResult = getCommonContents($_GET["view"]);
                                if ($viewResult["status"] == "success") {
                                    $viewData = $viewResult["data"];
                                    //console($viewData);
                                ?>
                                    <table class="table">
                                        <tr>
                                            <td class="text-muted">Content Name</td>
                                            <td><?= $viewData["contentName"] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Content Data</td>
                                            <td><?= $viewData["contentData"] ?></td>
                                        </tr>

                                        <tr>
                                            <td class="text-muted">Create Date</td>
                                            <td><?= $viewData["contentCreatedAt"] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Update Date</td>
                                            <td><?= $viewData["contentUpdatedAt"] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Status</td>
                                            <td><b><?= ucfirst($viewData["contentStatus"]) ?></b></td>
                                        </tr>
                                    </table>
                                <?php
                                    //console($viewData);
                                } else {
                                ?>
                                    <div class="col-12 my-2">
                                        <?= $viewResult["message"] ?>
                                    </div>
                                <?php
                                }
                                ?>

                                <div class="col-12 m-0 p-0">
                                    <a href="<?= basename($_SERVER['PHP_SELF']); ?>" class="btn btn-warning text-light">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.Content Wrapper. Contains page content -->


<?php
} elseif (isset($_GET["edit"]) && $_GET["edit"] > 0) {
?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header mb-2 p-0  border-bottom">
            <div class="container-fluid">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= ADMIN_URL ?>" class="text-dark"><i class="fas fa-home"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= basename($_SERVER['PHP_SELF']); ?>" class="text-dark">Manage Common Content</a></li>
                    <li class="breadcrumb-item active"><a href="<?= basename($_SERVER['PHP_SELF']); ?>" class="text-dark">Edit</a></li>
                </ol>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- row -->
                <div class="row p-0 m-0">
                    <div class="col-12 m-0 p-0">
                        <div class="card card-dark card-tabs">
                            <div class="card-header">
                                <h3 class="card-title">Common Content Details <small class="text-muted">Edit</small></h3>
                            </div>
                            <div class="card-body">
                                <?php
                                $editResult = getCommonContents($_GET["edit"]);
                                if ($editResult["status"] == "success") {
                                    $editData = $editResult["data"];
                                ?>
                                    <form action="" method="POST">
                                        <input type="hidden" name="contentKey" value="<?= $editData["contentKey"] ?>">
                                        <div class="row m-0 p-0">
                                            <div class="col-md-12">
                                                <span class="text-muted">Content Name:</span>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="contentName" value="<?= $editData["contentName"] ?>" placeholder="Enter Content Name" required>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <span class="text-muted">Content Data:</span>
                                                <div class="form-group">
                                                    <textarea name="contentData" class="form-control" cols="30" rows="10" placeholder="Enter Content Data" required><?= $editData["contentData"] ?></textarea>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <a href="<?= basename($_SERVER['PHP_SELF']); ?>" class="btn btn-warning text-light">Cancel</a>
                                                <button type="submit" name="editContentFormBtn" class="btn btn-dark">Modify Content</button>
                                            </div>
                                        </div>


                                    </form>
                                <?php
                                } else {
                                ?>
                                    <p><?= $editResult["message"] ?></p>
                                    <div class="col-12 m-0 p-0">
                                        <a href="<?= basename($_SERVER['PHP_SELF']); ?>" class="btn btn-warning text-light">Cancel</a>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.Content Wrapper. Contains page content -->

<?php
} else {
?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header mb-2 p-0  border-bottom">
            <div class="container-fluid">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= ADMIN_URL ?>" class="text-dark"><i class="fas fa-home"></i> Home</a></li>
                    <li class="breadcrumb-item active"><a href="<?= basename($_SERVER['PHP_SELF']); ?>" class="text-dark">Manage Common Content</a></li>
                </ol>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- row -->
                <div class="row p-0 m-0">

                    <div class="col-12 m-0 p-0">
                        <div class="card card-dark card-tabs">
                            <div class="card-header p-0 pt-1">
                                <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                                    <li class="pt-2 px-3">
                                        <h3 class="card-title">Common Content List</h3>
                                    </li>
                                    <li class="nav-item ml-auto">
                                        <a class="nav-link active" id="listTab" data-toggle="pill" href="#listTabPan" role="tab" aria-controls="listTabPan" aria-selected="true">List</a>
                                    </li>
                                    <li class="nav-item mr-1">
                                        <a class="nav-link" id="addNewTab" data-toggle="pill" href="#addNewTabPan" role="tab" aria-controls="addNewTabPan" aria-selected="false">Add New</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-two-tabContent">
                                    <div class="tab-pane fade show active" id="listTabPan" role="tabpanel" aria-labelledby="listTab">
                                        <?php
                                        $listResult = getCommonContents();
                                        if ($listResult["status"] == "success") {
                                        ?>
                                            <table class="table defaultDataTable table-hover text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Content Name</th>
                                                        <th>Content Data</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sl = 0;
                                                    foreach ($listResult["data"] as $listRow) {
                                                        $listRowKey = $listRow["contentKey"];
                                                        $listRowStatus = $listRow["contentStatus"];
                                                        $statusClass = ($listRowStatus == "active") ? "text-success" : "text-warning";
                                                    ?>
                                                        <tr>
                                                            <td><?= $sl += 1; ?></td>
                                                            <td><?= $listRow["contentName"] ?></td>
                                                            <td><?= $listRow["contentData"]; ?></td>
                                                            <td><b><?= explode(" ", $listRow["contentCreatedAt"])[0] ?></b></td>
                                                            <td>
                                                                <form action="" method="POST">
                                                                    <input type="hidden" name="id" value="<?= $listRowKey ?>">
                                                                    <input type="hidden" name="changeStatus" value="active_inactive">
                                                                    <button type="submit" onclick="return confirm('Are you sure change status?')" class="p-0 m-0 ml-2" style="cursor: pointer; border:none" data-toggle="tooltip" data-placement="top" title="<?= $listRowStatus; ?>">
                                                                        <?php echo ($listRowStatus == "active") ? '<i class="fa fa-toggle-on text-success" ></i>' : '<i class="fa fa-toggle-off text-warning"></i>'; ?>
                                                                    </button>
                                                                </form>
                                                            </td>
                                                            <td>
                                                                <div class="row p-0 m-0">
                                                                    <a href="<?= basename($_SERVER['PHP_SELF']) . "?view=" . $listRowKey; ?>" style="cursor: pointer;" class="ml-2"><i class="fa fa-eye text-primary"></i></a>
                                                                    <a href="<?= basename($_SERVER['PHP_SELF']) . "?edit=" . $listRowKey; ?>" style="cursor: pointer;" class="ml-2"><i class="fa fa-edit text-success"></i></a>
                                                                    <form action="" method="POST">
                                                                        <input type="hidden" name="id" value="<?= $listRowKey ?>">
                                                                        <input type="hidden" name="changeStatus" value="delete">
                                                                        <button type="submit" onclick="return confirm('Are you sure to delete?')" class="p-0 m-0 ml-2" style="cursor: pointer; border:none"><i class='fa fa-trash text-danger'></i></button>
                                                                    </form>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        <?php
                                        } else {
                                            echo "<p class='ml-3'>" . $listResult["message"] . "</p>";
                                        }
                                        ?>
                                    </div>
                                    <div class="tab-pane fade" id="addNewTabPan" role="tabpanel" aria-labelledby="addNewTab">
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <div class="row m-0 p-0">
                                                <div class="col-md-12">
                                                    <span class="text-muted">Content Name:</span>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="contentName" placeholder="Enter Content Name" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <span class="text-muted">Content Data:</span>
                                                    <div class="form-group">
                                                        <textarea name="contentData" class="form-control" cols="30" rows="10" placeholder="Enter Content Data" required></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <a href="<?= basename($_SERVER['PHP_SELF']); ?>" class="btn btn-warning text-light">Cancel</a>
                                                    <button type="submit" name="addNewContentFormBtn" class="btn btn-dark">Add New Content</button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.Content Wrapper. Contains page content -->


<?php
}




include("common/footer.php");
?>