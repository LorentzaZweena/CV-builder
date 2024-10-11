<?php
    session_start();
    include 'connection.php';
    include 'function-register.php';

    // if (!isset($_SESSION['login'])) {
    //     header('location:index.php');
    //     exit();
    // }

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Basic information
    $firstname = htmlspecialchars(trim($_POST['firstname'] ?? ''));
    $middlename = htmlspecialchars(trim($_POST['middlename'] ?? ''));
    $lastname = htmlspecialchars(trim($_POST['lastname'] ?? ''));
    $full_name = trim($firstname . " " . $middlename . " " . $lastname);
    $designation = htmlspecialchars(trim($_POST['designation'] ?? ''));
    $address = htmlspecialchars(trim($_POST['address'] ?? ''));
    $email = htmlspecialchars(trim($_POST['email'] ?? ''));
    $mobileno = htmlspecialchars(trim($_POST['mobileno'] ?? ''));
    $summary = htmlspecialchars(trim($_POST['summary'] ?? ''));

    // Handle file upload
    $photo = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $upload_dir = 'uploads/';
        $filename = uniqid() . '_' . $_FILES['image']['name'];
        $upload_file = $upload_dir . $filename;
        
        if (move_uploaded_file($_FILES['image']['tmp_name'], $upload_file)) {
            $photo = $upload_file;
        } else {
            echo "Error uploading file.";
        }
    }

    // Prepare and execute the SQL statement for basic info
    $stmt = $connection->prepare("INSERT INTO creative (full_name, designation, address, photo, email, mobileno, selfDescription) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $full_name, $designation, $address, $photo, $email, $mobileno, $summary);

    if ($stmt->execute()) {
        $cv_id = $stmt->insert_id;
        echo "<script>alert('Basic information saved successfully!');</script>";

        // Handle certifications
        if (isset($_POST['group-a'])) {
            foreach ($_POST['group-a'] as $certification) {
                $title = htmlspecialchars(trim($certification['achieve_title'] ?? ''));
                $description = htmlspecialchars(trim($certification['achieve_description'] ?? ''));
                
                $cert_stmt = $connection->prepare("INSERT INTO certifications (cv_id, title, description) VALUES (?, ?, ?)");
                $cert_stmt->bind_param("iss", $cv_id, $title, $description);
                $cert_stmt->execute();
            }
        }

        // Handle experiences
        if (isset($_POST['group-b'])) {
            foreach ($_POST['group-b'] as $experience) {
                $title = htmlspecialchars(trim($experience['exp_title'] ?? ''));
                $organization = htmlspecialchars(trim($experience['exp_organization'] ?? ''));
                $location = htmlspecialchars(trim($experience['exp_location'] ?? ''));
                $start_date = htmlspecialchars(trim($experience['exp_start_date'] ?? ''));
                $end_date = htmlspecialchars(trim($experience['exp_end_date'] ?? ''));
                $description = htmlspecialchars(trim($experience['exp_description'] ?? ''));
                
                $exp_stmt = $connection->prepare("INSERT INTO experiences (cv_id, title, organization, location, start_date, end_date, description) VALUES (?, ?, ?, ?, ?, ?, ?)");
                $exp_stmt->bind_param("issssss", $cv_id, $title, $organization, $location, $start_date, $end_date, $description);
                $exp_stmt->execute();
            }
        }

        // Handle education
        if (isset($_POST['group-c'])) {
            foreach ($_POST['group-c'] as $education) {
                $school = htmlspecialchars(trim($education['edu_school'] ?? ''));
                $degree = htmlspecialchars(trim($education['edu_degree'] ?? ''));
                $city = htmlspecialchars(trim($education['edu_city'] ?? ''));
                $start_date = htmlspecialchars(trim($education['edu_start_date'] ?? ''));
                $end_date = htmlspecialchars(trim($education['edu_graduation_date'] ?? ''));
                $description = htmlspecialchars(trim($education['edu_description'] ?? ''));
                
                $edu_stmt = $connection->prepare("INSERT INTO education (cv_id, school, degree, city, start_date, end_date, description) VALUES (?, ?, ?, ?, ?, ?, ?)");
                $edu_stmt->bind_param("issssss", $cv_id, $school, $degree, $city, $start_date, $end_date, $description);
                $edu_stmt->execute();
            }
        }

        // Handle projects
        if (isset($_POST['group-d'])) {
            foreach ($_POST['group-d'] as $project) {
                $title = htmlspecialchars(trim($project['proj_title'] ?? ''));
                $description = htmlspecialchars(trim($project['proj_description'] ?? ''));
                
                $proj_stmt = $connection->prepare("INSERT INTO projects (cv_id, title, description) VALUES (?, ?, ?)");
                $proj_stmt->bind_param("iss", $cv_id, $title, $description);
                $proj_stmt->execute();
            }
        }

        // Handle skills
        if (isset($_POST['group-e'])) {
            foreach ($_POST['group-e'] as $skill) {
                $skill_name = htmlspecialchars(trim($skill['skill'] ?? ''));
                
                $skill_stmt = $connection->prepare("INSERT INTO skills (cv_id, skill_name) VALUES (?, ?)");
                $skill_stmt->bind_param("is", $cv_id, $skill_name);
                $skill_stmt->execute();
            }
        }

        // After all data is saved successfully
        header("Location: resume-creative.php?success=1");
        exit();
        
      } else {
        echo "Error: " . $stmt->error;
        header("Location: resume-creative.php?error=1");
        exit();
    }    
}
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
  <link id="pagestyle" href="afterlogin.css?v=3.1.0" rel="stylesheet" />
</head>

<body class="g-sidenav-show bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-blue" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="index2.php">
        <img src="images/logo2.png" class="navbar-brand-img h-100" alt="main_logo">
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
          <a class="nav-link text-white " href="resume-creative.php">
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
</head>
<body>
  <h4 class="mt-5 ms-4">Resume sample</h4>
  <p class="ms-4">Here are some sample resumes that you can follow</p>
  <div class="d-flex flex-row mb-2">
    <div class="p-2">
    <div class="card ms-3" style="width: 15rem;">
    <a href="https://asset.velvetjobs.com/resume-sample-examples/images/graduate-software-engineer-v1.png"><img src="images/image.png" class="card-img-top"></a>
    <div class="card-body">
      <p class="card-text fw-semibold">Software development engineering</p>
      <p class="card-text mt-n2">Problem solver creating efficient, scalable software solutions.</p>
    </div>
</div>
    </div>
    <div class="p-2">
    <div class="card ms-1" style="width: 15rem;">
    <a href="https://asset.velvetjobs.com/resume-sample-examples/images/visual-communications-v1.png"><img src="images/image2.png" class="card-img-top"></a>
    <div class="card-body">
      <p class="card-text fw-semibold">Visual communication design</p>
      <p class="card-text mt-n2">Crafting engaging visuals to communicate complex messages.</p>
    </div>
</div>
    </div>
    <div class="p-2">
          <div class="card ms-1" style="width: 15rem;">
          <a href="https://d25zcttzf44i59.cloudfront.net/senior-network-engineer-resume-example.png"><img src="images/image3.png" class="card-img-top"></a>
          <div class="card-body">
            <p class="card-text fw-semibold">Network computer engineering</p>
            <p class="card-text mt-n2">Efficient data transmission strategies.</p>
          </div>
      </div>
    </div>
    <div class="p-2">
          <div class="card ms-1" style="width: 15rem;">
          <a href="https://i.pinimg.com/736x/fc/7e/3e/fc7e3eecb7d8b373df00fd125458318b.jpg"><img src="images/creative.png" class="card-img-top"></a>
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
          echo "<td>" . $data['id']++ . "</td>";
          echo "<td>" . htmlspecialchars($data['full_name']) . "</td>";
          echo "<td>" . htmlspecialchars($data['designation']) . "</td>";
          echo "<td>";
          echo "<a class='btn btn-danger btn-sm' href='delete2.php?id=" . $data['id'] . "'>Delete</a>";
          echo "<a class='btn btn-primary btn-sm ms-1' href='delete2.php?id=" . $data['id'] . "'>Edit</a>";
          echo "<a class='btn btn-success btn-sm ms-1' href='delete2.php?id=" . $data['id'] . "'>Preview</a>";
          echo "</td>";
          echo "</tr>";
      }
      
    ?>
    <!-- <tr>
      <th scope="row">1</th>
      <td>Zweena Ariva</td>
      <td><a href=""><i class='bx bx-trash bx-sm' style="color: red;"></i></a><a href=""><i class='bx bxs-edit bx-sm' style="color: green; margin-left: 0.5em;"></i></a><a href=""><span class="material-symbols-outlined" style="margin-left: 0.5em;"> visibility </span></a></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Ariva Zweena</td>
      <td><a href=""><i class='bx bx-trash bx-sm' style="color: red;"></i></a><a href=""><i class='bx bxs-edit bx-sm' style="color: green; margin-left: 0.5em;"></i></a><a href=""><span class="material-symbols-outlined" style="margin-left: 0.5em;"> visibility </span></a></td>
    </tr> -->
  </tbody>
  </table>

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