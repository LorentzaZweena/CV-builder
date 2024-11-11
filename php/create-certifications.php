<?php
    include "connection.php";
    $cv_id = $_GET['cv_id'];

    if(isset($_POST['submit'])) {
        $cert_title = htmlspecialchars(trim($_POST['cert_title']));
        $description = htmlspecialchars(trim($_POST['description']));
        
        $sql = "INSERT INTO certifications (cv_id, title, description) VALUES (?, ?, ?)";
                
        $stmt = mysqli_prepare($connection, $sql);
        mysqli_stmt_bind_param($stmt, "iss", $cv_id, $cert_title, $description);
        
        if(mysqli_stmt_execute($stmt)) {
            // header("location: index3.php");
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
        <link rel="stylesheet" href="../css/create-certifications.css">
        <link rel="stylesheet" href="../css/edit-resume.css">
        <style>
            .firstname{
                width: 204%;
            }

            @media screen and (max-width: 600px) {
                .firstname{
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
                <a href="#">Add Certification</a>
                <a href="create-educations.php?cv_id=<?php echo $cv_id ?>">Add Educations</a>
                <a href="create-experiences.php?cv_id=<?php echo $cv_id ?>">Add Experiences</a>
                <a href="create-skill.php?cv_id=<?php echo $id_cv; ?>">Add Skill</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">Delete 
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                <a href="delete_certification.php?cv_id=<?php echo $id_cv; ?>">Delete Certification</a>
                <a href="delete-education.php?cv_id=<?php echo $id_cv; ?>">Delete education</a>
                <a href="delete-experience.php?cv_id=<?php echo $id_cv; ?>">Delete experience</a>
                <a href="delete-skill.php?cv_id=<?php echo $id_cv; ?>">Delete Skills</a>
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

                        <div class = "cv-form-blk">
                            <div class = "cv-form-row-title">
                                <h3>Add certifications</h3>
                            </div>
                            <div class = "cv-form-row cv-form-row-about">
                                <div class = "cols-2">
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Certification title</label>
                                        <input name = "cert_title" type = "text" class = "form-control firstname" id = "firstname" placeholder="e.g. Web application, 2023" required>
                                        <span class="form-text"></span>
                                    </div>
                                </div>
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Description</label>
                                        <textarea name="description" class="form-control" required placeholder="e.g Lorem ipsum odor amet, consectetuer adipiscing elit. Erat blandit felis ultricies sem accumsan lorem est et. Congue nam pretium turpis sociosqu hendrerit per magna"></textarea>
                                        <span class="form-text"></span>
                                    </div>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Save Certification</button>
                    </form>
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