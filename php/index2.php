<?php
    session_start();
    include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Resume builder
  </title>
  <!--     Fonts and icons     -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../css/afterlogin.css?v=3.1.0" rel="stylesheet" />
</head>

<body class="g-sidenav-show bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-blue" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="index2.php">
        <img src="../images/logo2.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">Resume builder</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary" href="index2.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">My resumes</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="create-resume.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Create resume</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">More about this web</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="https://smkpesat.sch.id/" target="_blank">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            
            <span class="material-symbols-outlined"> public </span>
            </div>
            <span class="nav-link-text ms-1">Sites</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="https://smkpesat.sch.id/contact/" target="_blank">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <span class="material-symbols-outlined"> Call </span>
            </div>
            <span class="nav-link-text ms-1">Contact</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="https://www.instagram.com/smkpesat_itxpro?igsh=ZnVldWUzZjN5bWJx" target="_blank">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <span class="material-symbols-outlined"> apartment </span>
            </div>
            <span class="nav-link-text ms-1">Instagram</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Other menu</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="https://smkpesat.sch.id/">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            
            <span class="material-symbols-outlined"> person </span>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="logout.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            
            <span class="material-symbols-outlined"> logout </span>
            </div>
            <span class="nav-link-text ms-1">Logout</span>
          </a>
        </li>
      </ul>
    </div>

  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resume builder | Home</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" type='text/css'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    .modal-content {
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

.modal-body button {
    padding: 10px 20px;
    border-radius: 8px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.modal-body button:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

  </style>
</head>
<body>
  <h4 class="mt-5 ms-4">Resume sample</h4>
  <p class="ms-4">Here are some sample resumes that you can follow</p>
  <div class="d-flex flex-row mb-2">
    <div class="p-2">
    <div class="card ms-3" style="width: 15rem;">
    <a href="https://asset.velvetjobs.com/resume-sample-examples/images/graduate-software-engineer-v1.png"><img src="../images/image.png" class="card-img-top"></a>
    <div class="card-body">
      <p class="card-text fw-semibold">Software development engineering</p>
      <p class="card-text mt-n2">Problem solver creating efficient, scalable software solutions.</p>
    </div>
</div>
    </div>
    <div class="p-2">
    <div class="card ms-1" style="width: 15rem;">
    <a href="https://asset.velvetjobs.com/resume-sample-examples/images/visual-communications-v1.png"><img src="../images/image2.png" class="card-img-top"></a>
    <div class="card-body">
      <p class="card-text fw-semibold">Visual communication design</p>
      <p class="card-text mt-n2">Crafting engaging visuals to communicate complex messages.</p>
    </div>
</div>
    </div>
    <div class="p-2">
          <div class="card ms-1" style="width: 15rem;">
          <a href="https://d25zcttzf44i59.cloudfront.net/senior-network-engineer-resume-example.png"><img src="../images/image3.png" class="card-img-top"></a>
          <div class="card-body">
            <p class="card-text fw-semibold">Network computer engineering</p>
            <p class="card-text mt-n2">Efficient data transmission strategies.</p>
          </div>
      </div>
    </div>
    <div class="p-2">
          <div class="card ms-1" style="width: 15rem;">
          <a href="https://i.pinimg.com/736x/fc/7e/3e/fc7e3eecb7d8b373df00fd125458318b.jpg"><img src="../images/creative.png" class="card-img-top"></a>
          <div class="card-body">
            <p class="card-text fw-semibold">Stylish career overview</p>
            <p class="card-text mt-n2">Concise summary showcasing professional journey and achievements.</p>
          </div>
      </div>
    </div>
</div>
<h4 class="mt-4 ms-4">My resume</h4>
  <p class="ms-4">Take the time to design your own personalized resume that highlights your unique skills</p>
  <table class="table table-striped ms-4 w-95">
  <thead class="text-center">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Name</th>
      <th scope="col">Designation</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody class="text-center">
    <?php
      $sql = "SELECT id, full_name, designation FROM creative";
      $query = mysqli_query($connection, $sql);
      
      if (!$query) {
          die("Error: " . mysqli_error($connection));
      }
      
      while($data = mysqli_fetch_assoc($query)){
          echo "<tr>";
          echo "<td>" . $data['id'] . "</td>";
          echo "<td>" . htmlspecialchars($data['full_name']) . "</td>";
          echo "<td>" . htmlspecialchars($data['designation']) . "</td>";
          echo "<td>";
          echo "<a class='btn btn-danger btn-sm' href='delete.php?id=" . $data['id'] . "'>Delete</a>";
          echo "<button class='btn btn-primary btn-sm ms-1' onclick='showEditAlert(" . $data['id'] . ")'>Edit</button>";
          echo "<a class='btn btn-success btn-sm ms-1' href='preview.php?id=" . $data['id'] . "'>Preview</a>";
          echo "</td>";
          echo "</tr>";
      }
      
    ?>
  </tbody>
  </table>

  <!-- Custom Alert Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">What would you like to edit?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex flex-wrap gap-2 justify-content-center">
    <button class="btn btn-primary" onclick="showForm('basic', currentCvId)">Basic information</button>
    <button class="btn btn-secondary" onclick="showForm('experience', currentCvId)">Experiences</button>
    <button class="btn btn-success" onclick="showForm('skills', currentCvId)">Skills</button>
    <button class="btn btn-info" onclick="showForm('certifications', currentCvId)">Certifications</button>
    <button class="btn btn-warning" onclick="showForm('education', currentCvId)">Educations</button>
    <button class="btn btn-danger" onclick="showForm('projects', currentCvId)">Projects</button>
</div>

    </div>
  </div>
</div>

<!-- Basic Information Form Modal -->
<div class="modal fade" id="basicFormModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Basic Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="update_basic.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                    <div class="mb-3">
                        <label>Full Name</label>
                        <input type="text" class="form-control" id="basic_full_name" name="full_name">
                    </div>
                    <div class="mb-3">
                        <label>Designation</label>
                        <input type="text" class="form-control" id="basic_designation" name="designation">
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" class="form-control" id="basic_email" name="email">
                    </div>
                    <div class="mb-3">
                        <label>Mobile Number</label>
                        <input type="tel" class="form-control" id="basic_mobileno" name="mobileno">
                    </div>
                    <div class="mb-3">
                        <label>Address</label>
                        <textarea class="form-control" id="basic_address" name="address" rows="2"></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Self Description</label>
                        <textarea class="form-control" id="basic_selfDescription" name="selfDescription" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Photo</label>
                        <input type="file" class="form-control" id="basic_photo" name="photo">
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Experience Choice Modal -->
<div class="modal fade" id="experienceChoiceModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">What would you like to do?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body d-flex justify-content-center gap-3">
                <button class="btn btn-primary" onclick="showExperienceForm('add')">Add New</button>
                <button class="btn btn-secondary" onclick="showExperienceForm('edit')">Edit</button>
            </div>
        </div>
    </div>
</div>

<!-- Experience Form Modal -->
<div class="modal fade" id="experienceFormModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Experience</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="update_experience.php" method="POST">
                    <input type="hidden" name="cv_id" id="exp_cv_id">
                    <div class="mb-3">
                        <label>Title</label>
                        <input type="text" class="form-control" name="exp_title" required>
                    </div>
                    <div class="mb-3">
                        <label>Organization</label>
                        <input type="text" class="form-control" name="exp_organization" required>
                    </div>
                    <div class="mb-3">
                        <label>Location</label>
                        <input type="text" class="form-control" name="exp_location" required>
                    </div>
                    <div class="mb-3">
                        <label>Start Date</label>
                        <input type="date" class="form-control" name="exp_start_date" required>
                    </div>
                    <div class="mb-3">
                        <label>End Date</label>
                        <input type="date" class="form-control" name="exp_end_date">
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea class="form-control" name="exp_description" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Experience</button>
                </form>
            </div>
        </div>
    </div>
</div>



</body>
</html>

  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <script>
  let currentCvId = null;

  function showEditAlert(id) {
      currentCvId = id;
      new bootstrap.Modal(document.getElementById('editModal')).show();
  }
  function showForm(type, id) {
      bootstrap.Modal.getInstance(document.getElementById('editModal')).hide();
    
      if (type === 'experience') {
          document.getElementById('exp_cv_id').value = id;
          new bootstrap.Modal(document.getElementById('experienceChoiceModal')).show();
          return;
      }
    
      const formModal = new bootstrap.Modal(document.getElementById(`${type}FormModal`));
      document.querySelector('#basicFormModal input[name="id"]').value = id;
    
      fetch(`get_form_data.php?type=${type}&id=${id}`)
          .then(response => response.json())
          .then(data => {
              document.getElementById('basic_full_name').value = data.full_name;
              document.getElementById('basic_designation').value = data.designation;
              document.getElementById('basic_email').value = data.email;
              document.getElementById('basic_mobileno').value = data.mobileno;
              document.getElementById('basic_address').value = data.address;
              document.getElementById('basic_selfDescription').value = data.selfDescription;
              formModal.show();
          });
  }

  function showExperienceForm(action) {
      bootstrap.Modal.getInstance(document.getElementById('experienceChoiceModal')).hide();
      new bootstrap.Modal(document.getElementById('experienceFormModal')).show();
  }  </script>

    <!-- bootstrap :3  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>
</body>
</html>