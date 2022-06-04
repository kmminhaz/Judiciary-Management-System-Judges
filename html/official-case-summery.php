<?php include('./php/navbar.php') ?>

        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-5 align-self-center">
              <h4 class="page-title">Case Summary</h4>
            </div>
            <div class="col-7 align-self-center">
              <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="#">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Case Summary
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <?php 
          if (isset($_SESSION['comment'])) {
              echo $_SESSION['comment'];
              unset($_SESSION['comment']);
          }
        ?>

        <?php
          $caseId = $_GET['id'];

          $sql = "SELECT * FROM `case_summery` WHERE `caseId` = '$caseId'";
          $res = mysqli_query($conn, $sql);
          $rows = mysqli_fetch_array($res);
        ?>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
          <!-- ============================================================== -->
          <!-- Start Page Content -->
          <!-- ============================================================== -->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h3 class="fw-bold">Case ID : <span> <?php echo $rows['caseId'] ?> </span></h3>
                  <h4 class="fw-bold py-2 pb-3"><?php echo $rows['caseTitle'] ?> </span></h4>
                  <span class="label label-primary label-rounded fs-5 fw-bold"
                            ><?php echo $rows['caseType'] ?></span
                          >
                </div>
              </div>
            </div>

            <div class="col-12">
              <div class="card">
                <div class="card-body d-flex flex-column align-items-center">
                  <?php
                    if($rows['courtName'] == 'Supreme Court'){
                      ?>
                        <h3 class="fw-bold text-center">Supreme Court</span></h3>
                        <i class="mdi mdi-arrow-up-bold"></i>
                        <h3 class="fw-bold text-center">High Court</span></h3>
                        <i class="mdi mdi-arrow-up-bold"></i>
                        <h3 class="fw-bold text-center">Zilla Judge Court</span></h3>
                      <?php
                    }elseif($rows['courtName'] == 'High Court'){
                      ?>
                        <h3 class="fw-bold text-center">High Court</span></h3>
                        <i class="mdi mdi-arrow-up-bold"></i>
                        <h3 class="fw-bold text-center">Zilla Judge Court</span></h3>
                      <?php
                    }else{
                      ?>
                        <h3 class="fw-bold text-center">Zilla Judge Court</span></h3>
                      <?php
                    }
                  ?>
                </div>
              </div>
            </div>
            
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                      <div class="col-lg-6 d-flex flex-column align-items-center">
                          <h4 class="fw-bold">Plaintiff</h4>
                          <h5 class="pt-2">Name : <span> <?php echo $rows['plaintiffName'] ?></span></h5>
                          <h5>Address : <span> <?php echo $rows['plaintiffAddress'] ?> </span></h5>
                          <h5>Phone : <span> <?php echo $rows['plaintiffPhone'] ?> </span></h5>
                      </div>
                      <div class="col-lg-6 d-flex flex-column align-items-center">
                          <h4 class="fw-bold text-center">Defendant</h4>
                          <h5 class="pt-2">Name : <span><?php echo $rows['diffendentName'] ?></span></h5>
                          <h5>Address : <span> <?php echo $rows['diffendentAddress'] ?> </span></h5>
                          <h5>Phone : <span> <?php echo $rows['diffendentPhone'] ?> </span></h5>
                      </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                      <?php
                        // $plaintiffAdvocateId = $rows['plaintiffAdvocateId'];
                        // $diffendentAdvocateId = $rows['diffendentAdvocateId'];
                        // $sqlForImage = "SELECT 'image' FROM `advocate_profile` WHERE $advocateId = '$plaintiffAdvocateId'"
                      ?>
                      <h3 class="fw-bold pb-4">Appointed Advocates</h3>
                      <div class="col-lg-6 d-flex flex-column align-items-center">
                          <h4 class="fw-bold text-center">Plaintiff Side</h4>
                          <!-- <img class="mt-3" src="../assets/images/" alt="" height="100px" width="100px"> -->
                          <h5 class="pt-3">Name : <span> <?php echo $rows['plaintiffAdvocateName'] ?></span></h5>
                          <h5>Phone : <span> <?php echo $rows['plaintiffAdvocatePhone'] ?> </span></h5>
                      </div>
                      <div class="col-lg-6 d-flex flex-column align-items-center">
                          <h4 class="fw-bold text-center">Defendant Side</h4>
                          <!-- <img class="mt-3" src="../assets/images/people/player-2.png" alt="" height="100px" width="100px"> -->
                          <h5 class="pt-3">Name : <span> <?php echo $rows['diffendentAdvocateName'] ?></span></h5>
                          <h5>Phone : <span> <?php echo $rows['diffendentAdvocatePhone'] ?> </span></h5>
                      </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="fw-bold">Summary</h3>
                        <div class="mt-5">
                            <h4 class="fw-bold">Plaintiff Side</h4>
                            <p><?php echo $rows['plaintiffSummery'] ?></p>
                        </div>
                        <div class="mt-5">
                            <h4 class="fw-bold">Defendant Side</h4>
                            <p><?php echo $rows['diffendentSummary'] ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="row d-flex justify-content-center">
                      <h3 class="fw-bold pb-4">Judges</h3>
                      <div class="col-lg-4 d-flex flex-column align-items-center">
                          <img class="mt-3" src="../assets/images/judgesProfileImage/<?php echo $_SESSION['judgesImage'] ?>" alt="" height="100px" width="100px">
                          <h5 class="pt-3">Name : <span> <?php echo $rows['judgeName'] ?></span></h5>
                          <h5>Justice of <span> <?php echo $rows['courtName'] ?> </span></h5>
                      </div>
                  </div>
                </div>
              </div>
            </div>
            

            <!-- Judge Comments -->
            <?php
              $sql = "SELECT * FROM `judge_comments` WHERE `caseId` = '$caseId'";
              $res = mysqli_query($conn, $sql);

            ?>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                      <h3 class="fw-bold">Judges Verdicts</h3>
                      <?php
                        while($judgeCommentRow = mysqli_fetch_array($res)){
                        ?>
                          <div class="mt-5">
                              <h4 class="fw-bold"><?php echo $judgeCommentRow['date'] ?></h4>
                              <h4><?php echo $judgeCommentRow['judgeCourtName'] ?></h5>
                              <h4><?php echo $judgeCommentRow['judgeName'] ?></h5>
                              <p><?php echo $judgeCommentRow['judgeComment'] ?></p>
                              <h4> Final Decision : <span class="fw-bold"><?php echo $judgeCommentRow['finalDecision'] ?></span> </h4>
                          </div>
                        <?php
                        }
                      ?>
                    </div>
                </div>
            </div>

            <!-- Comment Edit -->
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="container mt-4 mb-4">
                    <div class="row justify-content-md-center">
                      <div class="col-md-12 col-lg-8">
                        <h1 class="h2 mb-4">Add Verdicts</h1>
                        <form method="POST" action="">
                        <label>Pass your judgements on todays case hearing</label>
                          <div class="form-group">
                            <div class="form-floating">
                            <textarea name="judgeComment" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                            <label for="floatingTextarea2">Comments</label>
                          </div>
                          </div>
                          <label class="col-md-12">Final Decision</label>
                          <div class="col-md-12 pb-4">
                            <input
                              type="text"
                              class="form-control form-control-line"
                              name="finalDecision"
                            />
                          </div>
                          <label class="col-md-12">Announcement</label>
                          <div class="col-lg-4 col-md-6 col-sm-12 pb-4">
                            <input
                              type="text"
                              class="form-control form-control-line"
                              name="announcement"
                              value= "<?php echo $rows['Announcement']; ?>"
                            />
                          </div>
                          <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

          <script>
            tinymce.init({
              selector: 'textarea#editor',
              menubar: false
            });
          </script>

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

if(isset($_POST['submit'])){
  $judgeComment = $_POST['judgeComment'];
  $finalDecision = $_POST['finalDecision'];
  
  $announcement = $_POST['announcement'];

  $sqli = "INSERT INTO `judge_comments` (`judgeId`, `judgeName`, `judgeCourtName`, `caseId`, `judgeComment`, `finalDecision`) VALUES ('{$_SESSION['judgeId']}', '{$_SESSION['user']}', '{$_SESSION['appointedCourt']}', '$caseId', '$judgeComment', '$finalDecision')";
  $sqliCase = "UPDATE `case_summery` SET `Announcement` = '$announcement' WHERE `caseId`='$caseId'";

  $res = mysqli_query($conn, $sqli);
  $resCase = mysqli_query($conn, $sqliCase);

  if($resCase){

  }
  if($res && $resCase){
    $_SESSION['comment'] = "<div class='text-success text-center'> <strong>A New comment has been added</strong> </div>";
    ?>
    <script type="text/javascript">
        window.location.href = '<?php echo SITEURL; ?>html/official-case-summery.php?id=<?php echo $caseId; ?>';
    </script>
  <?php
  }else{
    $_SESSION['comment'] = "<div class='text-danger text-center'> <strong>New comment can not be added</strong> </div>";
    ?>
    <script type="text/javascript">
        window.location.href = '<?php echo SITEURL; ?>html/official-case-summery.php?id=<?php echo $caseId; ?>';
    </script>
  <?php
  }
}

?>