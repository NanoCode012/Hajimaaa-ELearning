<body class="red-skin">

    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div id="preloader"><div class="preloader"><span></span><span></span></div></div>

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
      <?php include 'includes/nav.php'; ?>
        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->
  <div class="clearfix"></div>
  <!-- ============================================================== -->
  <!-- Top header  -->
  <!-- ============================================================== -->

  <section class="gray pt-0">
    <div class="container">
      <!-- Row -->
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <!-- Row -->
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 pt-4 pb-4">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add Course</li>
                </ol>
              </nav>
            </div>
          </div>
          <!-- /Row -->

          <!-- Row -->
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="dashboard_container">
                <div class="dashboard_container_header">
                  <div class="dashboard_fl_1">
                    <h4>Submit your Course</h4>
                  </div>
                </div>
                <div class="dashboard_container_body p-4">
                  <!-- Basic info -->
                  <div class="submit-section">
                    <div class="form-row">

                      <div class="form-group col-md-6">
                        <label>Course Title</label>
                        <input type="text" class="form-control" placeholder="Course Title">
                      </div>

                      <div class="form-group col-md-6">
                        <label>Instructor Name</label>
                        <input type="text" class="form-control" placeholder="Anshu Majavi">
                      </div>

                      <div class="form-group col-md-12">
                        <label>Course Image</label>
                        <form action="/upload-target" class="dropzone dz-clickable primary-dropzone">
                          <div class="dz-default dz-message">
                            <i class="ti-gallery"></i>
                            <span>Drag & Drop To Change Logo</span>
                          </div>
                        </form>
                      </div>

                    </div>
                  </div>
                  <!-- Basic info -->

                </div>

              </div>
            </div>
          </div>
          <!-- /Row -->

          <!-- Row -->
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="dashboard_container">
                <div class="dashboard_container_header">
                  <div class="dashboard_fl_1">
                    <h4>Course Description</h4>
                  </div>
                </div>
                <div class="dashboard_container_body p-4">
                  <!-- Basic info -->
                  <div class="submit-section">
                    <div class="form-row">

                      <div class="form-group col-md-12">
                        <label>About Course</label>
                        <textarea class="form-control" placeholder="Description"></textarea>
                      </div>

                      <div class="form-group col-md-12">
                        <label>Category</label>
                        <input type="text" class="form-control" placeholder="Ex. Science, Physics, Math..">
                      </div>

                    </div>
                  </div>
                  <!-- Basic info -->

                </div>

              </div>
            </div>
          </div>
          <!-- /Row -->

          <div class="row">
            <div class="form-group col-lg-12 col-md-12">
              <button class="btn btn-theme" type="submit">Save Course</button>
            </div>
          </div>

        </div>

      </div>
      <!-- Row -->

    </div>
  </section>


  <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>

</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->

<script src="assets/js/dropzone.js"></script>

</body>
