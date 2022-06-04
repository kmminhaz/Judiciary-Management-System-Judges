<?php include('./php/navbar.php') ?>
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-5 align-self-center">
              <h4 class="page-title my-4">Files Table</h4>
            </div>
            <div class="col-7 align-self-center">
              <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="dashboard.php">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Case Results
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
          <!-- Start Page Content -->
          <!-- ============================================================== -->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">All Case Files</h4>
                  <form method="POST" action="">
                    <div class="container px-5 input-group mb-3">
                      <input type="text" class="form-control" placeholder="Search By Case ID" name="searchText" value="">
                      <button class="input-group-text" id="basic-addon2" name="search">Search</button>
                    </div>
                  </form>
                </div>
                <?php

                  if(isset($_POST['search'])){
                    $searchText = $_POST['searchText'];
                    $sql = "SELECT `caseId`, `caseType`, `courtName`, `caseStatus`, `Date` FROM `case_summery` WHERE courtName='{$_SESSION['appointedCourt']}' AND `caseId` LIKE '$searchText' OR `caseType` LIKE '$searchText' OR `courtName` LIKE '$searchText' OR `caseStatus` LIKE '$searchText' OR `Date` LIKE '$searchText' ORDER BY caseId";
                    ?>
                    <form method="POST" action="">
                      <div class="d-flex justify-content-center pb-4">
                        <button
                          class="btn btn-primary"
                          name="submit">
                          <span>Load All Cases</span>
                      </button>
                      </div>
                    </form>
                    <?php
                  }
                  else{
                    $sql = "SELECT `caseId`, `caseType`, `courtName`, `caseStatus`, `Date` FROM `case_summery` WHERE `courtName` = '{$_SESSION['appointedCourt']}' AND `judgeId` = '{$_SESSION['judgeId']}' ORDER BY caseId";
                  }
                  $res = mysqli_query($conn, $sql);
                ?>
                <div class="table-responsive">
                  <table class="table">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col" class="text-center">
                          CASE ID
                        </th>
                        <th scope="col" class="text-center">CASE TYPE</th>
                        <th scope="col" class="text-center">COURT NAME</th>
                        <th scope="col" class="text-center">STATUS</th>
                        <th
                          scope="col"
                          class="text-center"
                        >
                          DATE
                        </th>
                        <th scope="col" class="text-center">OPTION</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        while($rows = mysqli_fetch_object($res)){
                          ?>
                          <tr>
                            <th scope="row" class="text-center"><?php echo $rows->caseId; ?></th>
                            <td class="text-center"><?php echo $rows->caseType; ?></td>
                            <td class="text-center"><?php echo $rows->courtName; ?></td>
                            <td class="text-center"><?php echo $rows->caseStatus; ?></td>
                            <td class="text-center">
                              <?php echo $rows->Date; ?>
                            </td>
                            <td class="text-center">
                              <a class="m-1 btn btn-primary btn" href="<?php echo SITEURL ?>html/official-case-summery.php?id=<?php echo $rows->caseId; ?>" role="button">
                                View Details
                              </a>
                            </td>
                          </tr>
                          <?php
                        }
                      ?>
                      <!-- <tr>
                        <th scope="row" class="text-center">10438</th>
                        <td class="text-center">Civil Case</td>
                        <td class="text-center">Chandpur Jilla Judge Court</td>
                        <td class="text-center">Khalash</td>
                        <td class="text-center">
                          02-01-2022
                        </td>
                        <td class="text-center">
                          <a class="m-1 btn btn-primary btn" href="official-case-summery.php" role="button">
                            View Details
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row" class="text-center">2</th>
                        <td class="text-center">Jacob</td>
                        <td class="text-center">Jacob</td>
                        <td class="text-center">Thornton</td>
                        <td class="text-center">
                          11th Self
                        </td>
                        <td class="text-center">
                          <button type="button" class="m-1 btn btn-primary btn">
                            View Details
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row" class="text-center">3</th>
                        <td class="text-center">Larry</td>
                        <td class="text-center">Larry</td>
                        <td class="text-center">the Bird</td>
                        <td class="text-center">
                          2nd Self
                        </td>
                        <td class="text-center">
                          <button type="button" class="m-1 btn btn-primary btn">
                            View Details
                          </button>
                        </td>
                      </tr> -->
                    </tbody>
                  </table>
                </div>
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
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
<?php include('./php/footer.php') ?>

<?php
  if(isset($_POST['submit'])){
    ?>
      <script type="text/javascript">
          window.location.href = '<?php echo SITEURL; ?>html/case-result.php';
      </script>
    <?php
  }
?>