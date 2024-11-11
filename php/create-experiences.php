<?php
    include "connection.php";
    $cv_id = $_GET['cv_id'];

    if(isset($_POST['submit'])) {
        $school = htmlspecialchars(trim($_POST['exp_title']));
        $degree = htmlspecialchars(trim($_POST['exp_organization']));
        $city = htmlspecialchars(trim($_POST['exp_location']));

        $start_date = htmlspecialchars(trim($_POST['exp_start_date']));
        $end_date = htmlspecialchars(trim($_POST['exp_end_date']));
        $description = htmlspecialchars(trim($_POST['exp_description']));
        
        $sql = "INSERT INTO experiences (cv_id, title, organization, location, start_date, end_date, description) VALUES (?, ?, ?, ?, ?, ?, ?)";
                
        $stmt = mysqli_prepare($connection, $sql);
        mysqli_stmt_bind_param($stmt, "issssss", $cv_id, $school, $degree, $city, $start_date, $end_date, $description);
        
        if(mysqli_stmt_execute($stmt)) {
            header("location: index3.php");
        } else {
            echo "Error: " . mysqli_error($connection);
        }
        mysqli_stmt_close($stmt);
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Resume Page</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- custom css -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="../css/edit-resume.css">
        <style>
            .edu_description{
                width: 204%;
            }

            @media screen and (max-width: 600px) {
                .edu_description{
                    width: 100%;
                }
                
            }
        </style>
    </head>
    <body>
    <nav>
    <div class="hamburger" onclick="toggleMenu()">
    <span></span>
    <span></span>
    <span></span>
</div>
        <!-- Checkbox for toggling menu -->
        <input type="checkbox" id="check">

        <!-- Menu icon -->
        <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
        </label>

        <!-- Site logo -->
        <label class="logo">Resume builder</label>

        <!-- Navigation links -->
        <ul>
            <div class="dropdown">
                <button class="dropbtn">Add 
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="create-certifications.php?cv_id=<?php echo $cv_id; ?>">Add Certification</a>
                    <a href="create-educations.php?cv_id=<?php echo $cv_id ?>">Add Educations</a>
                    <a href="#">Add Experiences</a>
                    <a href="create-skill.php?cv_id=<?php echo $cv_id; ?>">Add Skill</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">Delete 
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                <a href="edit-certifications.php?cv_id=<?php echo $cv_id; ?>">Delete Certification</a>
                    <a href="#">Delete Educations</a>
                    <a href="#">Delete Experiences</a>
                    <a href="#">Delete Skills</a>
                </div>
            </div>
            <li><a href="index3.php">Back</a></li>
        </ul>
  </nav>
        <section id = "about-sc" class = "" style="margin-top: -3.5em;">
            <div class = "container">
                <div class = "about-cnt">
                <form id="cv-form" action="" method="POST" class="cv-form">
                <input type="hidden" name="cv_id" value="<?php echo $cv_id; ?>">

                <div class="cv-form-blk">
                <div class = "cv-form-row-title">
                                <h3>Add educations</h3>
                            </div>

                                        <div class = "cv-form-row">
                                        <div class = "cols-3">
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Title</label>
                                                    <input name = "exp_title" type = "text" class = "form-control exp_title" id = "" placeholder="e.g Full-stack programmer">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Company / Organization</label>
                                                    <input name = "exp_organization" type = "text" class = "form-control exp_organization" id = "" placeholder="e.g SMK PESAT ITXPRO">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Location</label>
                                                    <input name = "exp_location" type = "text" class = "form-control exp_location" id = "" placeholder="e.g Bogor, Indonesia">
                                                    <span class="form-text"></span>
                                                </div>
                                            </div>
                                        
                                            <div class="cols-2">
                                                <div class="form-elem">
                                                    <label for="exp_start_date" class="form-label">Start Month</label>
                                                    <input name="exp_start_date" type="text" class="form-control exp_start_date" id="exp_start_date" placeholder="e.g August">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class="form-elem">
                                                    <label for="exp_end_date" class="form-label">End Month - Year</label>
                                                    <input name="exp_end_date" type="text" class="form-control exp_end_date" id="exp_end_date" placeholder="e.g November 2021">
                                                    <span class="form-text"></span>
                                                </div>
                                        </div>
                                        <div class="cols-2">
                                                <div class="form-elem">
                                                    <label for="exp_description" class="form-label">Description</label>
                                                    <textarea name="exp_description" class="form-control edu_description" id="exp_description" rows="2" placeholder="e.g Lorem ipsum odor amet, consectetuer adipiscing elit. Mattis pharetra inceptos leo suscipit, condimentum aliquet enim praesent. Auctor facilisi aliquam accumsan non ultrices iaculis felis lectus senectus. Suscipit velit aptent tristique lobortis sagittis conubia senectus commodo."></textarea>
                                                    <span class="form-text"></span>
                                                </div>
                                        </div>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Save Experiences</button>
                            </div>
                        </div>
            </div>
        </section>

        <!-- jquery cdn -->
        <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
        <!-- jquery repeater cdn -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.js" integrity="sha512-bZAXvpVfp1+9AUHQzekEZaXclsgSlAeEnMJ6LfFAvjqYUVZfcuVXeQoN5LhD7Uw0Jy4NCY9q3kbdEXbwhZUmUQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!-- custom js -->
        <script src = "../js/script.js"></script>
        <!-- app js -->
        <script src="../js/app.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.min.js"></script>
        <script>
function toggleMenu() {
    const navUl = document.querySelector('nav ul');
    const hamburger = document.querySelector('.hamburger');
    const dropdowns = document.querySelectorAll('.dropdown');
    
    navUl.classList.toggle('active');
    hamburger.classList.toggle('active');
    
    // Make dropdowns visible when menu is active
    dropdowns.forEach(dropdown => {
        if(navUl.classList.contains('active')) {
            dropdown.style.display = 'block';
        } else {
            dropdown.style.display = '';
        }
    });
}

</script>
    </body>
</html>