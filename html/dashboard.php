<?php include('./php/navbar.php') ?>
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->

        <?php
          $sqlAll = "SELECT * FROM `case_summery` WHERE `judgeId` = '{$_SESSION['judgeId']}' AND `courtName` = '{$_SESSION['appointedCourt']}'";
          $res = mysqli_query($conn, $sqlAll);
          $totalCases = mysqli_num_rows($res);

          $sqlCivil = "SELECT * FROM `case_summery` WHERE `judgeId` = '{$_SESSION['judgeId']}' AND `courtName` = '{$_SESSION['appointedCourt']}' AND `caseType` = 'Civil'";
          $resCivil = mysqli_query($conn, $sqlCivil);
          $totalCivil = mysqli_num_rows($resCivil);

          $sqlCriminal = "SELECT * FROM `case_summery` WHERE `judgeId` = '{$_SESSION['judgeId']}' AND `courtName` = '{$_SESSION['appointedCourt']}' AND `caseType` = 'Criminal'";
          $resCriminal = mysqli_query($conn, $sqlCriminal);
          $totalCriminal = mysqli_num_rows($resCriminal);

          if($totalCases>0){
            $civilParcentage = ($totalCivil/$totalCases) * 100 ;
            $criminalParcentage = ($totalCriminal/$totalCases) * 100 ;
          }else{
            $civilParcentage = 0;
            $criminalParcentage = 0;
          }

          $sqlAnnouncement = "SELECT * FROM `case_summery` WHERE `judgeId` = '{$_SESSION['judgeId']}' AND `courtName` = '{$_SESSION['appointedCourt']}' AND `Announcement` = 'Completed'";
          $resAnnouncement = mysqli_query($conn, $sqlAnnouncement);
          $totalAnnounced = mysqli_num_rows($resAnnouncement);

          $inProgress = $totalCases - $totalAnnounced;
          
          $sqlAnnouncementCivil = "SELECT * FROM `case_summery` WHERE `judgeId` = '{$_SESSION['judgeId']}' AND `courtName` = '{$_SESSION['appointedCourt']}' AND `Announcement` = 'Completed' AND `caseType` = 'Civil'";
          $resAnnouncementCivil = mysqli_query($conn, $sqlAnnouncementCivil);
          $totalAnnouncedCivil = mysqli_num_rows($resAnnouncementCivil);

          $sqlAnnouncementCriminal = "SELECT * FROM `case_summery` WHERE `judgeId` = '{$_SESSION['judgeId']}' AND `courtName` = '{$_SESSION['appointedCourt']}' AND `Announcement` = 'Completed' AND `caseType` = 'Criminal'";
          $resAnnouncementCriminal = mysqli_query($conn, $sqlAnnouncementCriminal);
          $totalAnnouncedCriminal = mysqli_num_rows($resAnnouncementCriminal);

          if($totalAnnounced > 0){
            $civilAnnouncementParcentage = ($totalAnnouncedCivil/$totalAnnounced) * 100 ;
            $criminalAnnouncementParcentage = ($totalAnnouncedCriminal/$totalAnnounced) * 100 ;
          }else{
            $civilAnnouncementParcentage = 0;
            $criminalAnnouncementParcentage = 0;
          }
        
        ?>

        <div class="page-breadcrumb py-4">
          <div class="row">
            <div class="col-5 align-self-center">
              <h4 class="page-title">Dashboard</h4>
            </div>
            <div class="col-7 align-self-center">
              <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="#">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Dashboard
                    </li>
                  </ol>
                </nav>
              </div>
              <?php
                if (isset($_SESSION['login'])) {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                    }
              ?>
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
          <!-- Email campaign chart -->
          <!-- ============================================================== -->

          <div class="row">
            <div class="col-lg-4">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-0 text-center">Total Cases</h4>
                  <h2 class="font-light text-center">
                    <?php echo $totalCases; ?>
                    <!-- <span class="font-16 text-success font-medium">+23%</span> -->
                  </h2>
                  <div class="mt-4">
                    <div class="row text-center">
                      <div class="col-6 border-right">
                        <h4 class="mb-0"><?php echo number_format((float)$civilParcentage, 2, '.', ''); ?>%</h4>
                        <span class="font-14 text-muted">Civil Cases</span>
                      </div>
                      <div class="col-6">
                        <h4 class="mb-0"><?php echo number_format((float)$criminalParcentage, 2, '.', ''); ?>%</h4>
                        <span class="font-14 text-muted">Criminal Cases</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card">
                <div class="card-body text-center">
                  <h5 class="card-title mb-1 my-auto">Cases In Progress</h5>
                  <h3 class="font-light fw-bold text-dark fs-1"><?php echo $inProgress; ?></h3>
                  <div class="mt-3 text-center">
                    <div id="earnings"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card">
                <div class="card-body text-center">
                  <h5 class="card-title mb-1 my-auto">Case Announced</h5>
                  <h3 class="font-light fw-bold text-success fs-1"><?php echo $totalAnnounced; ?></h3>
                  <div class="mt-3">
                    <div class="row text-center">
                      <div class="col-6 border-right">
                        <h4 class="mb-0"><?php echo number_format((float)$civilAnnouncementParcentage, 2, '.', ''); ?>%</h4>
                        <span class="font-14 text-muted">Civil Cases</span>
                      </div>
                      <div class="col-6">
                        <h4 class="mb-0"><?php echo number_format((float)$criminalAnnouncementParcentage, 2, '.', ''); ?>%</h4>
                        <span class="font-14 text-muted">Criminal Cases</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ============================================================== -->
          <!-- Email campaign chart -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Ravenue - page-view-bounce rate -->
          <!-- ============================================================== -->
          <div class="row">
            <!-- column -->
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Latest Case Updates</h4>
                </div>
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th class="border-top-0">CASE ID</th>
                        <th class="border-top-0">CASE TYPE</th>
                        <th class="border-top-0">COURT NAME</th>
                        <th class="border-top-0">STATUS</th>
                        <th class="border-top-0">DATE</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      while($totalCasesArray = mysqli_fetch_array($res)){
                    ?>
                      <tr>
                        <td class="txt-oflo"><?php echo $totalCasesArray['caseId']; ?></td>
                        <td class="txt-oflo"><?php echo $totalCasesArray['caseType']; ?></td>
                        <td><span class="font-medium"><?php echo $totalCasesArray['courtName']; ?></span></td>
                        <td>
                          <?php
                            if($totalCasesArray['Announcement'] == 'COMPLETED'){
                              ?>
                              <span class="label label-success label-rounded"
                                >COMPLETED</span>
                              <?php
                              
                            }else{
                              ?>
                              <span class="label label-info label-rounded"
                                >INPROGRESS</span>
                              <?php
                            }
                          ?>
                        </td>
                        <td class="txt-oflo"><?php echo $totalCasesArray['Date']; ?></td>
                      </tr>
                      <?php
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <a class="btn btn-primary" href="../html/case-result.php">
              Show All
            </a>
          </div>
          <!-- ============================================================== -->
          <!-- Recent comment and chats -->
          <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->

<?php include('./php/footer.php') ?>