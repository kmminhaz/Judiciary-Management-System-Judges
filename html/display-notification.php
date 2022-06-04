<?php include('./php/navbar.php') ?>

<?php
  $id = $_GET['id'];

  $sql = "SELECT * FROM `notification` WHERE `id` = '$id'";
  $res = mysqli_query($conn, $sql);
  $rows = mysqli_fetch_array($res);
  $old = 'old';

  $sqlUpdate = "UPDATE `notification` SET `status` = '$old' WHERE `id` = '$id'";
  $resUpdate = mysqli_query($conn, $sqlUpdate);
?>

        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-5 align-self-center">
              <h4 class="page-title my-4">Notification Discription</h4>
            </div>
            <div class="col-7 align-self-center">
              <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="#">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Help Desk
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
          <!-- ============================================================== -->
          <!-- Start Page Content -->
          <!-- ============================================================== -->
          
            <div class="row">
              <div class="col-12">
                <div class="card card-body">
                  <div class="mb-2">
                    <label for="exampleFormControlInput1" class="form-label"
                      ><?php echo $rows['date'] ?></label
                    >
                  </div>
                  <div class="mb-2">
                    <label for="exampleFormControlInput1" class="form-label"
                      >Admin <span><?php echo $rows['name'] ?></span></label
                    >
                  </div>
                  <div class="mb-2">
                    <label for="exampleFormControlInput1" class="form-label"
                      > Title: <?php echo $rows['title'] ?></label
                    >
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label"
                      >Message for you</label
                    >
                    <textarea
                      class="form-control"
                      id="exampleFormControlTextarea1"
                      rows="3"
                      placeholder="Write Your Query Here"
                      readonly
                    >
                    <?php echo $rows['message'] ?>
                  </textarea>
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

<?php include('./php/footer.php') ?>