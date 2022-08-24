<?php
include("../app/connection-admin.php");
include("common/header.php");
include("common/navbar.php");
include("common/sidebar.php");

// add goods
if(isset($_POST['addInventoryItem'])){
    // classification
    $goodsType = $_POST['goodsType']; 
    $goodsGroup = $_POST['goodsGroup']; 
    $purchaseGroup = $_POST['purchaseGroup']; 
    $availabilityCheck = $_POST['availabilityCheck']; 
    
    // basic details
    $itemCode = $_POST['itemCode']; 
    $itemName = $_POST['itemName']; 
    $itemDesc = $_POST['itemDesc']; 
    $netWeight = $_POST['netWeight']; 
    $grossWeight = $_POST['grossWeight']; 
    $volume = $_POST['volume']; 
    $height = $_POST['height']; 
    $width = $_POST['width']; 
    $length = $_POST['length']; 
    $baseUnitMeasure = $_POST['baseUnitMeasure']; 
    $issueUnitMeasure = $_POST['issueUnit']; 
    
    // storage details
    $storageBin = $_POST['storageBin']; 
    $pickingArea = $_POST['pickingArea']; 
    $tempControl = $_POST['tempControl']; 
    $storageControl = $_POST['storageControl']; 
    $maxStoragePeriod = $_POST['maxStoragePeriod']; 
    $timeUnit = $_POST['timeUnit']; 
    $minRemainSelfLife = $_POST['minRemainSelfLife']; 
    
      $insert = "INSERT INTO inventory_items 
          SET 
              goodsType = '$goodsType',
              goodsGroup = '$goodsGroup',
              purchaseGroup = '$purchaseGroup',
              availabilityCheck = '$availabilityCheck',
              itemCode = '$itemCode',
              itemName = '$itemName',
              itemDesc = '$itemDesc',
              netWeight = '$netWeight',
              grossWeight = '$grossWeight',
              height = '$height',
              width = '$width',
              volume = '$volume',
              length = '$length',
              baseUnitMeasure = '$baseUnitMeasure',
              issueUnitMeasure = '$issueUnitMeasure',
              storageBin = '$storageBin',
              pickingArea = '$pickingArea',
              tempControl = '$tempControl',
              storageControl = '$storageControl',
              maxStoragePeriod = '$maxStoragePeriod',
              maxStoragePeriodTimeUnit = '$timeUnit',
              minRemainSelfLife = '$minRemainSelfLife'
      ";
      if($dbCon->query($insert)){
        $msg = "Insert successfull";
      }else{
        $msg = "Something went wrong";
      }
    }


if(isset($_GET['add-goods'])) {
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header mb-2 p-0  border-bottom">
    <?php if(isset($msg)){ ?>
    <div style="z-index: 999; float:right" class="mx-3 p-1 alert-success rounded">
      <?= $msg ?>
    </div>
    <?php } ?>
    <div class="container-fluid">
      <div class="row pt-2 pb-2">
        <div class="col-md-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= ADMIN_URL ?>" class="text-dark"><i class="fas fa-home"></i>
                Home</a></li>
            <li class="breadcrumb-item"><a href="<?= basename($_SERVER['PHP_SELF']); ?>" class="text-dark">Manage
                Goods</a></li>
            <li class="breadcrumb-item active"><a href="<?= basename($_SERVER['PHP_SELF']); ?>" class="text-dark">Add
                Goods</a></li>
          </ol>
        </div>
        <div class="col-md-6">
          <button class="btn-primary">Save</button>
          <button class="btn-danger ml-2">Draft</button>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <form action="" method="POST">
        <div class="row">
          <div class="col-md-8">
            <div id="accordion">
              <div class="card card-primary">
                <div class="card-header cardHeader">
                  <h4 class="card-title w-100">
                    <a class="d-block w-100 text-dark" data-toggle="collapse" href="#collapseOne">
                      Classification
                    </a>
                  </h4>
                </div>
                <div id="collapseOne" class="collapse show" data-parent="#accordion">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <!-- <input type="text" name="itemName" class="form-control form-control-border borderColor"
                                      id="exampleInputBorderWidth2" placeholder="Item Name"> -->
                        <div class="input-group">
                          <select id="" name="goodsType" class="select2 form-control form-control-border borderColor">
                            <option value="">Goods Type</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                          </select>
                        </div>
                      </div>
                      <div class="modal" id="myModal">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Modal Heading</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                              Modal body..
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 mb-3">
                        <div class="input-group">
                          <select name="goodsGroup" class="select2 form-control form-control-border borderColor">
                            <option value="">Goods Group</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                          </select>
                        </div>
                      </div>
                      <!-- <div class="col-md-6 mb-3">
                                <select id="select2" class="form-control form-control-border borderColor">
                                  <option value="">Select</option>
                                  <option value="40">Fairy Floss Machine</option>
                                  <option value="10">Smoke Machine</option>
                                  <option value="0">party Effect Light</option>
                                </select>
                              </div>
                              <div class="modal" id="myModal">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Modal Heading</h4>
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                      Modal body..
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                                </div>
                              </div> -->
                      <div class="col-md-6">
                        <div class="input-group">
                          <select name="purchaseGroup" class="select2 form-control form-control-border borderColor">
                            <option value="">Purchase Group</option>
                            <option value="">A</option>
                            <option value="">B</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="input-group">

                          <input type="text" name="branh" class="m-input" id="exampleInputBorderWidth2">
                          <label>Branch</label>
                        </div>

                      </div>
                      <div class="col-md-6">
                        <div class="input-group">
                          <select name="availabilityCheck" class="select2 form-control form-control-border borderColor">
                            <option value="">Availability Check</option>
                            <option value="Daily">Daily</option>
                            <option value="Weekly">Weekly</option>
                            <option value="By Weekly">By Weekly</option>
                            <option value="Monthly">Monthly</option>
                            <option value="Qtr">Qtr</option>
                            <option value="Half Y">Half Y</option>
                            <option value="Year">Year</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card card-danger">
                <div class="card-header cardHeader">
                  <h4 class="card-title w-100">
                    <a class="d-block w-100 text-dark" data-toggle="collapse" href="#collapseTwo">
                      Basic Details
                    </a>
                  </h4>
                </div>
                <div id="collapseTwo" class="collapse" data-parent="#accordion">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="input-group">
                          <input type="text" name="itemCode" class="m-input" id="exampleInputBorderWidth2">

                          <label>Item Code</label>
                        </div>

                      </div>
                      <div class="col-md-6">
                        <div class="input-group">

                          <input type="text" name="itemName" class="m-input" id="exampleInputBorderWidth2">
                          <label>Item Name</label>
                        </div>

                      </div>

                      <div class="col-md-6">
                        <div class="input-group">
                          <input type="text" name="netWeight" class="m-input" id="exampleInputBorderWidth2">
                          <label>Net Weight</label>
                        </div>

                      </div>
                      <div class="col-md-6">
                        <div class="input-group">
                          <input type="text" name="grossWeight" class="m-input">
                          <label>Gross Weight</label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="input-group">
                          <input type="text" name="volume" class="m-input">
                          <label>Volume</label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-6">
                            <label for="" class="form-control borderNone">Volume :</label>
                          </div>
                          <div class="col-md-6">
                            <input type="text" name="volume" class="form-control form-control-border borderColor"
                              id="exampleInputBorderWidth2" placeholder="volume">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-6">
                            <label for="" class="form-control borderNone">height :</label>
                          </div>
                          <div class="col-md-6">
                            <input type="text" name="height" class="form-control form-control-border borderColor"
                              id="exampleInputBorderWidth2" placeholder="height">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-6">
                            <label for="" class="form-control borderNone">width :</label>
                          </div>
                          <div class="col-md-6">
                            <input type="text" name="width" class="form-control form-control-border borderColor"
                              id="exampleInputBorderWidth2" placeholder="width">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-6">
                            <label for="" class="form-control borderNone">length :</label>
                          </div>
                          <div class="col-md-6">
                            <input type="text" name="length" class="form-control form-control-border borderColor"
                              id="exampleInputBorderWidth2" placeholder="length">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-6">
                            <label for="" class="form-control borderNone">Base Unit Of Measure :</label>
                          </div>
                          <div class="col-md-6">
                            <input type="text" name="baseUnitMeasure"
                              class="form-control form-control-border borderColor" id="exampleInputBorderWidth2"
                              placeholder="baseUnitOfMeasure">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-6">
                            <label for="" class="form-control borderNone">Issue Unit :</label>
                          </div>
                          <div class="col-md-6">
                            <input type="text" name="issueUnit" class="form-control form-control-border borderColor"
                              id="exampleInputBorderWidth2" placeholder="issueUnit">
                          </div>
                        </div>

                      </div>
                      <div class="col-md-12">

                        <textarea type="text" name="itemDesc" class="form-control form-control-border borderColor"
                          id="exampleInputBorderWidth2" placeholder="Item Description"></textarea>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card card-success">
                <div class="card-header cardHeader">
                  <h4 class="card-title w-100">
                    <a class="d-block w-100 text-dark" data-toggle="collapse" href="#collapseThree">
                      Storage Details
                    </a>
                  </h4>
                </div>
                <div id="collapseThree" class="collapse" data-parent="#accordion">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-6">
                            <label for="" class="form-control borderNone">Storage Bin :</label>
                          </div>
                          <div class="col-md-6">
                            <input type="text" name="storageBin" class="form-control form-control-border borderColor"
                              id="exampleInputBorderWidth2" placeholder="Storage Bin">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-6">
                            <label for="" class="form-control borderNone">Picking Area :</label>
                          </div>
                          <div class="col-md-6">
                            <input type="text" name="pickingArea" class="form-control form-control-border borderColor"
                              id="exampleInputBorderWidth2" placeholder="Picking Area">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-6">
                            <label for="" class="form-control borderNone">Temp Control :</label>
                          </div>
                          <div class="col-md-6">
                            <input type="text" name="tempControl" class="form-control form-control-border borderColor"
                              id="exampleInputBorderWidth2" placeholder="Temp Control">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-6">
                            <label for="" class="form-control borderNone">Storage Control :</label>
                          </div>
                          <div class="col-md-6">
                            <input type="text" name="storageControl"
                              class="form-control form-control-border borderColor" id="exampleInputBorderWidth2"
                              placeholder="Storage Control">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-6">
                            <label for="" class="form-control borderNone">Max Storage Period :</label>
                          </div>
                          <div class="col-md-6">
                            <input type="text" name="maxStoragePeriod"
                              class="form-control form-control-border borderColor" id="exampleInputBorderWidth2"
                              placeholder="Max Storage Period">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-6">
                            <label for="" class="form-control borderNone">Time Unit :</label>
                          </div>
                          <div class="col-md-6">
                            <input type="text" name="timeUnit" class="form-control form-control-border borderColor"
                              id="exampleInputBorderWidth2" placeholder="Time Unit">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-6">
                            <label for="" class="form-control borderNone">Min Remain Self Life :</label>
                          </div>
                          <div class="col-md-6">
                            <input type="text" name="minRemainSelfLife"
                              class="form-control form-control-border borderColor" id="exampleInputBorderWidth2"
                              placeholder="Min Remain Self Life">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card card-success">
                <div class="card-header cardHeader">
                  <h4 class="card-title w-100">
                    <a class="d-block w-100 text-dark" data-toggle="collapse" href="#collapseFour">
                      Purchase Details
                    </a>
                  </h4>
                </div>
                <div id="collapseFour" class="collapse" data-parent="#accordion">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-6">
                            <label for="" class="form-control borderNone">Purchasing Value Key :</label>
                          </div>
                          <div class="col-md-6">
                            <input type="text" name="purchasingValueKey"
                              class="form-control form-control-border borderColor" id="exampleInputBorderWidth2"
                              placeholder="Purchasing Value Key">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-primary card-outline card-tabs">
              <div class="card-header p-0 pt-1 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill"
                      href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home"
                      aria-selected="true">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill"
                      href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile"
                      aria-selected="false">Profile</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill"
                      href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages"
                      aria-selected="false">Messages</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-three-settings-tab" data-toggle="pill"
                      href="#custom-tabs-three-settings" role="tab" aria-controls="custom-tabs-three-settings"
                      aria-selected="false">Settings</a>
                  </li>
                </ul>
              </div>
              <div class="card-body fontSize">
                <div class="tab-content" id="custom-tabs-three-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel"
                    aria-labelledby="custom-tabs-three-home-tab">
                    90 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin malesuada lacus ullamcorper
                    dui
                    molestie, sit amet congue quam finibus. Etiam ultricies nunc non magna feugiat commodo. Etiam
                    odio
                    magna, mollis auctor felis vitae, ullamcorper ornare ligula. Proin pellentesque tincidunt nisi,
                    vitae ullamcorper felis aliquam id. Pellentesque habitant morbi tristique senectus et netus et
                    malesuada fames ac turpis egestas. Proin id orci eu lectus blandit suscipit. Phasellus porta,
                    ante
                    et varius ornare, sem enim sollicitudin eros, at commodo leo est vitae lacus. Etiam ut porta
                    sem.
                    Proin porttitor porta nisl, id tempor risus rhoncus quis. In in quam a nibh cursus pulvinar non
                    consequat neque. Mauris lacus elit, condimentum ac condimentum at, semper vitae lectus. Cras
                    lacinia erat eget sapien porta consectetur.
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel"
                    aria-labelledby="custom-tabs-three-profile-tab">
                    Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut
                    ligula
                    tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas
                    sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere purus ligula eu
                    lectus. Donec nunc tellus, elementum sit amet ultricies at, posuere nec nunc. Nunc euismod
                    pellentesque diam.
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel"
                    aria-labelledby="custom-tabs-three-messages-tab">
                    Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue
                    id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac
                    tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit
                    condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus
                    tristique.
                    Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est
                    libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id
                    fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna.
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-three-settings" role="tabpanel"
                    aria-labelledby="custom-tabs-three-settings-tab">
                    Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis
                    ac,
                    ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi
                    euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum
                    placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam.
                    Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet
                    accumsan ex sit amet facilisis.
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
            <div class="w-100 mt-3">
              <button type="submit" name="addInventoryItem" class="gradientBtn btn-success btn btn-block btn-sm">
                <i class="fa fa-plus fontSize"></i>
                Add New
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </section>
  <!-- /.content -->
</div>

<?php
} else {
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <!-- <div class="content-header mb-2 p-0  border-bottom">
            <div class="container-fluid">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= ADMIN_URL ?>" class="text-dark"><i class="fas fa-home"></i> Home</a></li>
                    <li class="breadcrumb-item active"><a href="<?= basename($_SERVER['PHP_SELF']); ?>" class="text-dark">Manage Goods</a></li>
                </ol>
            </div>
        </div> -->
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- row -->
      <div class="row p-0 m-0">

        <div class="col-12 mt-2 p-0">
          <div class="card card-tabs">
            <div class="card-header p-0 pt-1">
              <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                <li class="pt-2 px-3 d-flex justify-content-between align-items-center" style="width:100%">
                  <h3 class="card-title">Manage Goods</h3>
                  <a href="goods.php?add-goods" class="card-title btn btn-sm btn-primary m-2"><i class="fa fa-plus"></i>
                    Add New</a>
                </li>
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content" id="custom-tabs-two-tabContent">
                <div class="tab-pane fade show active" id="listTabPan" role="tabpanel" aria-labelledby="listTab">
                  <?php
                                        $listResult = getAllAdministratorRoles();
                                        if ($listResult["status"] == "success") {
                                        ?>
                  <table class="table defaultDataTable table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Item Code</th>
                        <th>Item Name</th>
                        <th>Net Weight</th>
                        <th>Volume</th>
                        <th>Goods Type</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                                            $sql = "select * from inventory_items";
                                            $i = 1;
                                            if($res = $dbCon->query($sql)){
                                                while($row = $res->fetch_assoc()){
                                            ?>
                      <tr>
                        <td>
                          <?=$i++?>
                        </td>
                        <td>
                          <?= $row['itemCode'] ?>
                        </td>
                        <td>
                          <?= $row['itemName'] ?>
                        </td>
                        <td>
                          <?= $row['netWeight'] ?>
                        </td>
                        <td>
                          <?= $row['volume'] ?>
                        </td>
                        <td>
                          <?= $row['goodsType'] ?>
                        </td>
                        <td>
                          <?= $row['itemStatus'] ?>
                        </td>
                        <td>
                          <button class="btn btn-sm"><i class="fa fa-eye"></i></button>
                          <button class="btn btn-sm"><i class="fa fa-edit"></i></button>
                          <button class="btn btn-sm"><i class="fa fa-trash"></i></button>
                        </td>
                      </tr>
                      <?php } } ?>
                    </tbody>
                  </table>
                  <?php
                                        } else {
                                            ?>
                  <div class="col-12 my-2">
                    <?= $listResult["message"] ?>
                  </div>
                  <?php
                                        }
                                        ?>
                </div>
                <div class="tab-pane fade" id="addNewTabPan" role="tabpanel" aria-labelledby="addNewTab">
                  <form action="" method="POST">
                    <div class="form-group">
                      <span class="text-muted">Role Name:</span>
                      <input type="text" class="form-control" name="roleName" placeholder="Enter Role Name" required>
                    </div>
                    <div class="form-group">
                      <span class="text-muted">Role Description:</span>
                      <textarea class="form-control" rows="3" name="roleDescription"
                        placeholder="Enter Role Description (Optional)"></textarea>
                    </div>
                    <div class="form-group">
                      <span class="text-muted">Select Menu & Sub-Menu:</span>
                      <table class="table table-bordered">
                        <tr>
                          <th class="w-25">Menu</th>
                          <th>Sub Menus</th>
                        </tr>
                        <?php foreach (getAdministratorMenuList()['data'] as $menuDetails) { ?>
                        <tr>
                          <td><label class="text-muted">
                              <?= $menuDetails['fldMenuLabel'] ?>
                            </label></td>
                          <td>
                            <?php foreach (getAdministratorMenuList($menuDetails['fldMenuKey'])['data'] as $subMenuDetails) { ?>
                            <span class="form-group mr-2">
                              <input type="checkbox" name="menuFiles[]" class="form-control-default"
                                value="<?= $subMenuDetails['fldMenuKey'] ?>">
                              <label class="text-muted">
                                <?= $subMenuDetails['fldMenuLabel'] ?>
                              </label>
                            </span>
                            <?php } ?>
                          </td>
                        </tr>
                        <?php } ?>
                      </table>
                    </div>

                    <div class="col-12">
                      <a href="<?= basename($_SERVER['PHP_SELF']); ?>" class="btn btn-warning text-light">Cancel</a>
                      <button type="submit" name="addNewAdminRoleFormBtn" class="btn btn-dark">Add
                        New Role</button>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
  $(document).ready(function () {
    $('.select2')
      .select2()
      .on('select2:open', () => {
        $(".select2-results:not(:has(a))").append(`<div class="btn-row"><a type="button" class="btn btn-primary add-btn" data-toggle="modal" data-target="#myModal">
    Open modal
  </a></div>`);
      });
  });
</script>
<script>
  function leaveInput(el) {
    if (el.value.length > 0) {
      if (!el.classList.contains('active')) {
        el.classList.add('active');
      }
    } else {
      if (el.classList.contains('active')) {
        el.classList.remove('active');
      }
    }
  }

  var inputs = document.getElementsByClassName("m-input");
  for (var i = 0; i < inputs.length; i++) {
    var el = inputs[i];
    el.addEventListener("blur", function () {
      leaveInput(this);
    });
  }

// *** autocomplite select *** //

</script>