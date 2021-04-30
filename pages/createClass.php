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
        <form action="?p=addNewClass" method="post" enctype="multipart/form-data">
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
                        <input type="text" class="form-control" placeholder="Course Title" name="course_title" required>
                      </div>

                      <div class="form-group col-md-6">
                        <label>Course Code</label>
                        <input type="text" class="form-control" placeholder="Course Code" name="course_code" required>
                      </div>

                      <div class="form-group col-md-12">
                        <label>Course Image</label>
                        <div class="dropzone dz-clickable primary-dropzone">
                          <div class="dz-default dz-message">
                            <input name="course_cover" id="fileToUpload" type="file" required>
                          </div>
                        </div>
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
                        <textarea class="form-control" placeholder="Description" name="course_description" required></textarea>
                      </div>
                      <div class="form-group col-md-12">
                        <label>Category</label>
                        <select class="form-control styled-select" multiple name="categorySelect[]" required>
                          <option value="Computer Science">Computer Science</option>
                          <option value="Programming Language">Programming Language</option>
                          <option value="Web Development">Web Development</option>
                          <option value="Mobile Development">Mobile Development</option>
                          <option value="Data Science">Data Science</option>
                          <option value="Artificial Intelligence">Artificial Intelligence</option>
                          <option value="Network and Security">Network and Security</option>
                          <option value="Hardware">Hardware</option>
                          <option value="Language">Languages</option>
                          <option value="Art and Design">Art and Design</option>
                          <option value="Business and Management">Business and Management</option>
                          <option value="Finance and Accounting">Finance and Accounting</option>
                          <option value="Music">Music</option>
                          <option value="Self Development">Self Development</option>
                          <option value="TU Subject">TU Subject</option>
                        </select>
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
        </form>
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
