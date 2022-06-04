<?php include('./php/navbar.php') ?>
        <link rel="stylesheet" href="./judgesStyle.css">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-5 align-self-center">
              <h4 class="page-title my-4">Documents</h4>
            </div>
            <div class="col-7 align-self-center">
              <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="#">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Documents
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
          <!-- ============================================================== -->
          <!-- Files & Documents -->
          <!-- ============================================================== -->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <?php
                    if (isset($_SESSION['caseSummeryMessage'])) {
                        echo $_SESSION['caseSummeryMessage'];
                        unset($_SESSION['caseSummeryMessage']);
                      }
                  ?>
                <?php
                    if (isset($_SESSION['pdf'])) {
                        echo $_SESSION['pdf'];
                        unset($_SESSION['pdf']);
                      }
                  ?>
                  <?php
                    $sqlForCaseId = "SELECT * FROM `case_summery` ORDER BY id DESC LIMIT 1";
                    $resForCaseId = mysqli_query($conn, $sqlForCaseId);
                    $rowsForCaseId = mysqli_fetch_array($resForCaseId);

                    $lastCaseId = $rowsForCaseId['id'];
                    $caseId = $lastCaseId + 1;
                  ?>
                <div class="card-body d-flex">
                  <div>
                    <button type="button" class="btn btn-outline-primary mx-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      <i class="mdi mdi-file-document fs-1"></i> <br />
                      <span> Upload A File </span>
                    </button>
                    <!-- Modal -->
                    <form method="POST" action="" enctype="multipart/form-data">
                      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Upload Your File</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <label for="">Chose your PDF file here</label> <br> <br>
                              <input id="pdf" type="file" name="pdf" value="" require>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button id="submit" type="submit" name="submit" value="upload" class="btn btn-primary">Submit</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                  
                  <!-- Case Summery -->
                  <div>
                    <button type="button" class="btn btn-outline-primary mx-3" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                      <i class="mdi mdi-folder-plus fs-1"></i> <br />
                      <span>Create Case Summary</span>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <form method="POST" action="">
                        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Add a Case Summary</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <div class="row">
                                    <div class="col-12">
                                      <div class="card">
                                        <div class="card-body">
                                          <label class="col-md-12">Case ID</label>
                                            <div class="col-md-12">
                                              <input
                                                type="text"
                                                class="form-control form-control-line"
                                                name="caseId"
                                                value="<?php echo $caseId; ?>"
                                                readonly
                                              />
                                            </div>
                                          <label class="col-md-12">Case Title</label>
                                                  <div class="col-md-12">
                                                    <input
                                                      type="text"
                                                      class="form-control form-control-line"
                                                      name="caseTitle"
                                                    />
                                                  </div>
                                          <label class="col-md-12">Case Type</label>
                                                  <div class="col-md-12">
                                                    <input
                                                      type="text"
                                                      class="form-control form-control-line"
                                                      name="caseType"
                                                    />
                                                  </div>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="col-12">
                                      <div class="card">
                                        <div class="card-body">
                                          <div class="row">
                                              <div class="col-lg-6 d-flex flex-column align-items-center">
                                                  <h4 class="fw-bold">Plaintiff</h4>
                                                  <label class="col-md-12">Name</label>
                                                  <div class="col-md-12">
                                                    <input
                                                      type="text"
                                                      class="form-control form-control-line"
                                                      name="plaintiffName"
                                                    />
                                                  </div>
                                                  <label class="col-md-12">Address</label>
                                                  <div class="col-md-12">
                                                    <input
                                                      type="text"
                                                      class="form-control form-control-line"
                                                      name="plaintiffAddress"
                                                    />
                                                  </div>
                                                  <label class="col-md-12">Phone</label>
                                                  <div class="col-md-12">
                                                    <input
                                                      type="text"
                                                      class="form-control form-control-line"
                                                      name="plaintiffPhone"
                                                    />
                                                  </div>
                                              </div>
                                              <div class="col-lg-6 d-flex flex-column align-items-center">
                                                  <h4 class="fw-bold">Defendant</h4>
                                                  <label class="col-md-12">Name</label>
                                                  <div class="col-md-12">
                                                    <input
                                                      type="text"
                                                      class="form-control form-control-line"
                                                      name="diffendentName"
                                                    />
                                                  </div>
                                                  <label class="col-md-12">Address</label>
                                                  <div class="col-md-12">
                                                    <input
                                                      type="text"
                                                      class="form-control form-control-line"
                                                      name="diffendentAddress"
                                                    />
                                                  </div>
                                                  <label class="col-md-12">Phone</label>
                                                  <div class="col-md-12">
                                                    <input
                                                      type="text"
                                                      class="form-control form-control-line"
                                                      name="diffendentPhone"
                                                    />
                                                  </div>
                                              </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="col-12">
                                      <div class="card">
                                        <div class="card-body">
                                          <div class="row">
                                              <h3 class="fw-bold">Advocates</h3>
                                              <div class="col-lg-6 d-flex flex-column align-items-center">
                                                  <h4 class="fw-bold text-center">Plaintiff Side</h4>
                                                  <label class="col-md-12">Advocate Name</label>
                                                  <div class="col-md-12">
                                                    <input
                                                      type="text"
                                                      class="form-control form-control-line"
                                                      name="plaintiffAdvocateName"
                                                    />
                                                  </div>
                                                  <label class="col-md-12">Advocate ID</label>
                                                  <div class="col-md-12">
                                                    <input
                                                      type="text"
                                                      class="form-control form-control-line"
                                                      name="plaintiffAdvocateId"
                                                    />
                                                  </div>
                                                  <label class="col-md-12">Advocate Phone</label>
                                                  <div class="col-md-12">
                                                    <input
                                                      type="text"
                                                      class="form-control form-control-line"
                                                      name="plaintiffAdvocatePhone"
                                                    />
                                                  </div>
                                              </div>
                                              <div class="col-lg-6 d-flex flex-column align-items-center">
                                                  <h4 class="fw-bold text-center">Defendant Side</h4>
                                                  <label class="col-md-12">Advocate Name</label>
                                                  <div class="col-md-12">
                                                    <input
                                                      type="text"
                                                      class="form-control form-control-line"
                                                      name="diffendentAdvocateName"
                                                    />
                                                  </div>
                                                  <label class="col-md-12">Advocate ID</label>
                                                  <div class="col-md-12">
                                                    <input
                                                      type="text"
                                                      class="form-control form-control-line"
                                                      name="diffendentAdvocateId"
                                                    />
                                                  </div>
                                                  <label class="col-md-12">Advocate Phone</label>
                                                  <div class="col-md-12">
                                                    <input
                                                      type="text"
                                                      class="form-control form-control-line"
                                                      name="diffendentAdvocatePhone"
                                                    />
                                                  </div>
                                              </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="col-12">
                                      <div class="card">
                                        <div class="card-body">
                                            <h3 class="fw-bold">Summary</h3>
                                            <h4 class="fw-bold text-center">Plaintiff Side</h4>
                                            <label class="col-md-12">Summary</label>
                                              <div class="col-md-12">
                                                <textarea
                                                  type="text"
                                                  class="form-control form-control-line"
                                                  name="plaintiffSummery">

                                                </textarea>
                                              </div>
                                            <label class="col-md-12">Summary</label>
                                            <h4 class="fw-bold text-center">Defendent Side</h4>
                                              <div class="col-md-12">
                                                <textarea
                                                  type="text"
                                                  class="form-control form-control-line"
                                                  name="diffendentSummery">

                                                </textarea>
                                              </div>
                                            <label class="col-md-12">Case Status</label>
                                              <div class="col-md-12">
                                                <input
                                                  type="text"
                                                  class="form-control form-control-line"
                                                  name="caseStatus"
                                                />
                                              </div>
                                        </div>
                                      </div>
                                    </div>
                                    

                                    <div class="col-12">
                                      <div class="card">
                                        <div class="card-body">
                                          <div class="row">
                                              <h3 class="fw-bold pb-4">Judges</h3>
                                              <div class="col-lg-4 d-flex flex-column align-items-center">
                                                  <label class="col-md-12">Judge Name</label>
                                                  <div class="col-md-12">
                                                    <input
                                                      type="text"
                                                      class="form-control form-control-line"
                                                      name="judgeName"
                                                      readonly
                                                      value="<?php echo $_SESSION['judgesName']; ?>"
                                                    />
                                                  </div>
                                                  <label class="col-md-12">Judge ID</label>
                                                  <div class="col-md-12">
                                                    <input
                                                      type="text"
                                                      class="form-control form-control-line"
                                                      name="judgeId"
                                                      readonly
                                                      value="<?php echo $_SESSION['judgeId']; ?>"
                                                    />
                                                  </div>
                                              </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button id="submit" type="submit" name="submitSummery" value="upload" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Uploaded Documents or Showing files -->
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <section class="p-4 d-flex justify-content-center w-100">
                    <form method="POST" action="">
                    <?php
                      $sql="SELECT * FROM `judge_documents` WHERE `judgeId`='{$_SESSION['judgeId']}'";
                      $res = mysqli_query($conn, $sql);
                      ?>
                        <div class="container">
                          <div class="row">
                        <?php
                        while($info=mysqli_fetch_array($res)){
                        ?>
                            <div class="col-lg-3 col-sm-1 col-md-2 openBtn">
                              <div class="d-flex justify-content-center">
                                <a target="_blank" href="../assets/pdf/<?php echo $info['pdf'] ?>">
                                <p class="btn btn-outline-danger m-3">
                                  <i class="mdi mdi-file-pdf fs-1"></i> <br />
                                  <span name="pdfClick"><?php echo $info['pdf'] ?></span>
                                </p>
                                </a>
                              </div>
                              <div class="d-flex justify-content-center">
                                <a class="btn btn-primary m-2 btnsDocument" target="_blank" href="../assets/pdf/<?php echo $info['pdf'] ?>">
                                  Open
                                </a>
                                <a class="m-2 btn btn-danger btnsDocument" onclick="return confirm('Are you sure, You want to delete this case study');"  role="button" href="<?php echo SITEURL; ?>html/document.php?btn=delete&id=<?php echo $info['id']; ?>">
                                  Delete
                                </a>
                              </div>
                            </div>
                        <?php
                        }
                        ?>
                          </div>
                        </div>
                        </form>
                  </section>
                </div>
              </div>
            </div>
          <!-- ============================================================== -->
          <!-- End PAge Content -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Right sidebar -->
          <!-- ============================================================== -->
          <!-- .right-sidebar -->
          <!-- ============================================================== -->
          <!-- End Right sidebar -->
          <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
<?php include('./php/footer.php') ?>

<?php
if(isset($_GET['btn']) && $_GET['btn']=='delete'){
  $id = $_GET['id'];
  $deleteQuery = "DELETE FROM judge_documents WHERE id = '$id'";
  echo $deleteQuery;
  
  $resDelete = mysqli_query($conn, $deleteQuery);

  if($resDelete){
    $_SESSION['delete'] = "<div class='text-success text-center py-3'><strong?> A file has been Deleted Successfully </strong></div>";
    ?>
     <script type="text/javascript">
        window.location.href = '<?php echo SITEURL; ?>html/document.php';
    </script>
  <?php
  }else{
    $_SESSION['delete'] = "<div class='text-danger text-center py-3'><strong?> A file Deletation Failed </strong></div>";
    ?>
    <script type="text/javascript">
        window.location.href = '<?php echo SITEURL; ?>html/document.php';
    </script>
  <?php
  }
}
?>

<?php

if(isset($_POST['submit'])){
  $judgeId = $_SESSION['judgeId'];
  $pdfName = $_FILES['pdf']['name'];
  $pdf = $judgeId."_".$pdfName;
  $pdf_type=$_FILES['pdf']['type'];
  $pdf_size=$_FILES['pdf']['size'];
  $pdf_tem_loc=$_FILES['pdf']['tmp_name'];
  $pdf_store="../assets/pdf/$pdf";
  move_uploaded_file($pdf_tem_loc, $pdf_store);

  $sql="INSERT INTO `judge_documents` (`judgeId`,`pdf`) VALUES ('{$_SESSION['judgeId']}','$pdf')";
  $query=mysqli_query($conn,$sql);

  if($query){
    $_SESSION['pdf'] = "<div class='text-success text-center py-3'><strong?> File Added Successfully </strong></div>";
    ?>
    <script type="text/javascript">
            window.location.href = '<?php echo SITEURL; ?>html/document.php';
    </script>
    <?php
  }else{
    $_SESSION['pdf'] = "<div class='text-danger text-center py-3'><strong?> File Addition Failed </strong></div>";
    ?>
    <script type="text/javascript">
            window.location.href = '<?php echo SITEURL; ?>html/document.php';
    </script>
    <?php
  }
}

if(isset($_POST['submitSummery'])){

  $caseId = $_POST['caseId'];
  $caseTitle = $_POST['caseTitle'];
  $caseType = $_POST['caseType'];
  $plaintiffName = $_POST['plaintiffName'];
  $plaintiffAddress = $_POST['plaintiffAddress'];
  $plaintiffPhone = $_POST['plaintiffPhone'];
  $diffendentName = $_POST['diffendentName'];
  $diffendentAddress = $_POST['diffendentAddress'];
  $diffendentPhone = $_POST['diffendentPhone'];
  
  $plaintiffAdvocateName = $_POST['plaintiffAdvocateName'];
  $plaintiffAdvocateId = $_POST['plaintiffAdvocateId'];
  $plaintiffAdvocatePhone = $_POST['plaintiffAdvocatePhone'];
  
  $diffendentAdvocateName = $_POST['diffendentAdvocateName'];
  $diffendentAdvocateId = $_POST['diffendentAdvocateId'];
  $diffendentAdvocatePhone = $_POST['diffendentAdvocatePhone'];

  $plaintiffSummery = $_POST['plaintiffSummery'];
  $diffendentSummery = $_POST['diffendentSummery'];
  $caseStatus = $_POST['caseStatus'];
  $caseAnnouncement = 'INPROGRESS';
  
  $judgeName = $_POST['judgeName'];
  // $judgeId = $_POST['judgeId'];

  $sqlSummery="INSERT INTO `case_summery` (`caseId`, `caseTitle`, `caseType`, `courtName`, `plaintiffName`, `plaintiffAddress`, `plaintiffPhone`, `diffendentName`, `diffendentAddress`, `diffendentPhone`, `plaintiffAdvocateName`, `plaintiffAdvocateId`, `plaintiffAdvocatePhone`, `diffendentAdvocateName`, `diffendentAdvocateId`, `diffendentAdvocatePhone`, `plaintiffSummery`, `diffendentSummary`, `caseStatus`, `Announcement`, `judgeName`, `judgeId`) VALUES ('$caseId', '$caseTitle', '$caseType', '{$_SESSION['appointedCourt']}', '$plaintiffName',
    '$plaintiffAddress', '$plaintiffPhone', '$diffendentName', '$diffendentAddress', '$diffendentPhone',
    '$plaintiffAdvocateName', '$plaintiffAdvocateId', '$plaintiffAdvocatePhone', '$diffendentAdvocateName',
    '$diffendentAdvocateId', '$diffendentAdvocatePhone', '$plaintiffSummery', '$diffendentSummery', '$caseStatus', '$caseAnnouncement', 
    '$judgeName', '{$_SESSION['judgeId']}') ";

  $res = mysqli_query($conn, $sqlSummery);

  if($res){
    $_SESSION['caseSummeryMessage'] = "<div class='text-success text-center py-3'><strong?> Case Summery Added Successfully </strong></div>";
    ?>
    <script type="text/javascript">
            window.location.href = '<?php echo SITEURL; ?>html/document.php';
    </script>
    <?php
  }else{
    $_SESSION['caseSummeryMessage'] = "<div class='text-danger text-center py-3'><strong?> Case Summery Can Not Be Added </strong></div>";
    ?>
    <script type="text/javascript">
            window.location.href = '<?php echo SITEURL; ?>html/document.php';
    </script>
    <?php
  }
}

?>