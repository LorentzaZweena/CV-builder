<?php
    include "connection.php";
    // session_start();
    
    $user_id = $_SESSION['id'];

    if (isset($_POST['firstname'])) {
        $firstname = htmlspecialchars(trim($_POST['firstname'] ?? ''));
        $middlename = htmlspecialchars(trim($_POST['middlename'] ?? ''));
        $lastname = htmlspecialchars(trim($_POST['lastname'] ?? ''));
        
        $full_name = trim($firstname . " " . $middlename . " " . $lastname);
        $photo = '';

        if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
            $photoTmpName = $_FILES['image']['tmp_name'];
            $photoName = basename($_FILES['image']['name']);
            $photoPath = '../images/' . $photoName;
            move_uploaded_file($photoTmpName, $photoPath);
            $photo = $photoPath;
        }
        
        $designation = $_POST['designation'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $phone = $_POST['mobileno'];
        $selfDescription = $_POST['summary'];

        $sql = "INSERT INTO `creative` (`full_name`, `designation`, `address`, `photo`, `email`, `mobileno`, `selfDescription`, `user_id`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = mysqli_prepare($connection, $sql);
        mysqli_stmt_bind_param($stmt, "sssssssi", $full_name, $designation, $address, $photo, $email, $phone, $selfDescription, $user_id);

        if(mysqli_stmt_execute($stmt)){
            header("location:index3.php");
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
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

            :root{
                --clr-blue: #1A91F0;
                --clr-blue-mid: #1170CD;
                --clr-blue-dark: #1A1C6A;
                --clr-white: #fff;
                --clr-bright: #EFF2F9;
                --clr-dark: #1e2532;
                --clr-black: #000;
                --clr-grey: #656e83;
                --clr-green: #084C41;
                --font-poppins: 'Poppins', sans-serif;
                --font-manrope: 'Manrope', sans-serif;;
                --transition: all 300ms ease-in-out;
            }

            *{
                padding: 0;
                margin: 0;
                box-sizing: border-box;
                scroll-behavior: smooth;
            }

            html{
                font-size: 10px;
            }

            body{
                font-size: 1.6rem;
                font-family: var(--font-poppins);
            }

            button{
                border: none;
                background-color: transparent;
                outline: 0;
                cursor: pointer;
                font-family: inherit;
            }

            img{
                width: 100%;
                display: block;
            }

            a{
                text-decoration: none;
            }

            /* fonts */
            .font-poppins{font-family: var(--font-poppins);}
            .font-manrope{font-family: var(--font-manrope);}

            /* text colors */
            .text-blue{color: var(--clr-blue);}
            .text-blue-mid{color: var(--clr-blue-mid);}
            .text-blue-dark{color: var(--clr-blue-dark);}
            .text-bright{color: var(--clr-bright);}
            .text-dark{color: var(--clr-dark);}
            .text-grey{color: var(--clr-grey);}
            .text-white{color: var(--clr-white);}

            /* backgrounds */
            .bg-blue{background-color: var(--clr-blue);}
            .bg-blue-mid{background-color: var(--clr-blue-mid);}
            .bg-blue-dark{background-color: var(--clr-blue-dark);}
            .bg-bright{background-color: var(--clr-bright);}
            .bg-dark{background-color: var(--clr-dark);}
            .bg-grey{background-color: var(--clr-grey);}
            .bg-white{background-color: var(--clr-white);}
            .bg-black{background-color: var(--clr-black);}
            .bg-green{background-color: var(--clr-green);}
            .bg-pesat{background-color: #002e63;}

            .text-center{ text-align: center;}
            .text-left{text-align: left;}
            .text-right{text-align: right;}
            .text-uppercase{text-transform: uppercase;}
            .text-lowercase{text-transform: lowercase;}
            .text-capitalize{text-transform: capitalize;}
            .text{
                color: var(--clr-dark);
                opacity: 0.9;
                margin: 2rem 0;
                line-height: 1.6;
            }

            .fw-2{font-weight: 200;}
            .fw-3{font-weight: 300;}
            .fw-4{font-weight: 400;}
            .fw-5{font-weight: 500;}
            .fw-6{font-weight: 600;}
            .fw-7{font-weight: 700;}
            .fw-8{font-weight: 800;}

            .fs-13{font-size: 13px;}
            .fs-14{font-size: 14px;}
            .fs-15{font-size: 15px;}
            .fs-16{font-size: 16px;}
            .fs-17{font-size: 17px;}
            .fs-18{font-size: 18px;}
            .fs-19{font-size: 19px;}
            .fs-20{font-size: 20px;}
            .fs-21{font-size: 21px;}
            .fs-22{font-size: 22px;}
            .fs-23{font-size: 23px;}
            .fs-24{font-size: 24px;}
            .fs-25{font-size: 25px;}

            .ls-1{letter-spacing: 1px;}
            .ls-2{letter-spacing: 2px;}

            .container{
                max-width: 1200px;
                margin: 0 auto;
                padding: 0 1.6rem;
            }

            /* bars button */
            .bars{
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                height: 16.5px;
                width: 25px;
            }
            .bars .bar{
                width: 100%;
                height: 2px;
                background-color: var(--clr-blue);
                transition: var(--transition);
            }

            .bars:hover .bar{
                background-color: var(--clr-dark);
            }

            /* buttons */
            .btn{
                font-size: 14.5px;
                font-weight: 600;
                padding: 1.4rem 1.6rem;
                border-radius: 4px;
                display: inline-block;
            }

            .btn-primary{
                background-color: var(--clr-blue);
                color: var(--clr-white);
                border: 1px solid var(--clr-blue);
                transition: var(--transition);
            }

            .btn-primary:hover{
                background-color: transparent;
                color: var(--clr-dark);
                border-color: var(--clr-grey);
            }

            .btn-secondary{
                background-color: transparent;
                color: var(--clr-dark);
                border: 1px solid var(--clr-grey);
                transition: var(--transition);
            }

            .btn-secondary:hover{
                background-color: var(--clr-blue);
                color: var(--clr-white);
                border-color: var(--clr-blue);
            }

            .btn-group button:first-child, .btn-group a:first-child{
                margin-right: 1rem!important;
            }

            /* navbar part */
            .navbar{
                height: 80px;
                display: flex;
                align-items: center;
                box-shadow: rgba(0, 0, 0, 0.08) 0px 3px 8px;
            }

            .navbar .container{
                width: 100%;
            }

            .navbar-brand{
                display: flex;
                align-items: center;
                justify-content: flex-start;
                font-size: 1.8rem;
            }
            .navbar-brand-text{
                color: var(--clr-dark);
                font-weight: 600;
            }
            .navbar-brand-text span{
                color: var(--clr-blue);
            }
            .navbar-brand-icon{
                width: 100px;
                margin-right: 6px;
                opacity: 0.8;
            }
            .brand-and-toggler{
                display: flex;
                align-items: center;
                justify-content: space-between;
            }
            .header{
                min-height: calc(100vh - 80px);
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }
            .header-content{
                max-width: 740px;
                margin-right: auto;
                margin-left: auto;
            }
            .header-content img{
                max-width: 760px;
                border-top-right-radius: 8px;
                border-top-left-radius: 8px;
                margin-top: 3.2rem;
            }
            .lg-title{
                margin: 1.4rem 0;
                font-size: 37px;
                line-height: 1.4;
                color: var(--clr-dark);
            }
            .header-content p{
                margin-bottom: 2.6rem;
                line-height: 1.6;
            }


            /* section one */
            .section-one{
                padding: 64px 0;
                min-height: 80vh;
                display: flex;
                align-items: center;
            }
            .section-one-l img{
                max-width: 545px;
                margin-right: auto;
                margin-left: auto;
            }
            .section-one-r{
                margin-top: 4rem;
            }

            .section-one .btn-group{
                margin-top: 2rem;
            }
            .section-one-r{
                max-width: 545px;
                margin-right: auto;
                margin-left: auto;
            }
            .section-one-r .btn-group{
                margin-top: 3rem;
            }

            /* section two */
            .section-two{
                padding: 64px 0;
            }
            .section-two .section-items{
                display: grid;
                gap: 2rem;
            }

            .section-two .section-item{
                max-width: 350px;
                text-align: center;
                margin-right: auto;
                margin-left: auto;
            }
            .section-two .section-item-icon{
                margin: 1rem 0;
            }
            .section-two .section-item-icon img{
                width: 80px;
                margin-right: auto;
                margin-left: auto;
            }
            .section-two .section-item-title{
                color: var(--clr-blue-dark);
                font-size: 1.8rem;
                font-weight: 600;
            }
            .section-two .text{
                margin: 0.9rem 0;
            }

            /* footer */
            .footer{
                padding: 3rem 0;
            }
            .footer-content p{
                color: var(--clr-grey);
            }
            .footer-content p span{
                color: var(--clr-white);
            }

            /* media queries */
            @media screen and (min-width: 768px){
                .section-two .section-items{
                    grid-template-columns: repeat(2, 1fr);
                }
            }

            @media screen and (min-width: 992px){
                .section-one-content{
                    display: grid;
                    grid-template-columns: repeat(2, 1fr);
                    column-gap: 3rem;
                }
                .section-one-r{
                    text-align: left;
                }
                .section-two .section-items{
                    grid-template-columns: repeat(3, 1fr);
                }
                .section-two .section-item{
                    text-align: left;
                }
                .section-two .section-item-icon img{
                    margin-left: 0;
                }
            }



            /* resume page */
            #about-sc{
                padding: 64px 0;
            }

            .cv-form-row-title{
                background-color: var(--clr-dark);
                padding: 0.8rem 1.6rem;
                margin-bottom: 2rem;
            }

            .cv-form-row-title h3{
                color: var(--clr-white);
                font-weight: 500;
                text-transform: uppercase;
                letter-spacing: 1.5px;
                font-size: 1.7rem;
            }
            .cv-form-blk{
                margin: 3rem 0;
            }
            .cv-form-row{
                padding: 3rem 2rem 0 2rem;
                border: 1px solid rgba(0, 0, 0, 0.08);
                margin-bottom: 1rem;
                position: relative;
            }
            textarea{
                resize: none;
            }
            .form-elem{
                margin-bottom: 3rem;
                position: relative;
            }
            .form-label{
                display: block;
                font-weight: 600;
                font-size: 14px;
                color: var(--clr-dark);
                margin-bottom: 0.5rem;
            }
            .form-control{
                border-radius: none;
                border: 1px solid rgba(0, 0, 0, 0.1);
                font-size: 14px;
                padding: 0.8rem 1.6rem;
                font-family: inherit;
                width: 100%;
                outline: 0;
                transition: var(--transition);
            }

            .form-control:focus{
                border-color: rgba(0, 0, 0, 0.3);
            }
            .form-text{
                color: #ca0b00;
                font-size: 12px;
                position: absolute;
                letter-spacing: 0.5px;
                top: calc(100% + 2px);
                left: 0;
                width: 100%;
            }
            .cols-3, .cols-2{
                display: grid;
            }
            .repeater-add-btn{
                width: 25px;
                height: 25px;
                background-color: var(--clr-blue-mid);
                font-size: 1.6rem;
                color: var(--clr-white);
                margin: 1rem 0;
            }
            .repeater-remove-btn{
                position: absolute;
                top: 10px;
                right: 10px;
                z-index: 999;
                width: 25px;
                height: 25px;
                border-radius: 50%;
                background-color: #ca0b00;
                color: var(--clr-white);
                font-size: 1.6rem;
            }

            .preview-cnt{
                border-radius: 5px;
                display: grid;
                grid-template-columns: 32% auto;
                overflow: hidden;
            }

            .preview-cnt-l{
                padding: 3rem 4rem 2rem 3rem;
            }
            .preview-cnt-r{
                padding: 3rem 3rem 3rem 4rem;
                margin-left: 1em;
            }
            .preview-cnt-l .preview-blk:nth-child(1){
                text-align: center;
            }
            .preview-image{
                width: 120px;
                height: 120px;
                border-radius: 50%;
                overflow: hidden;
                margin-right: auto;
                margin-left: auto;
            }
            .preview-image img{
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
            .preview-item-name{
                font-size: 2.4rem;
                font-weight: 600;
                margin: 1.8rem 0;
                position: relative;
            }
            .preview-item-name::after{
                position: absolute;
                content: "";
                bottom: -10px;
                width: 50px;
                height: 1.5px;
                background-color: rgba(255, 255, 255, 0.5);
                left: 50%;
                transform: translateX(-50%);
            }
            .preview-blk{
                padding: 1rem 0;
                margin-bottom: 1rem;
            }
            .preview-blk-title h3{
                text-transform: uppercase;
                letter-spacing: 0.5px;
                border-bottom: 0.5px solid rgba(0, 0, 0, 0.08);
                padding-bottom: 0.5rem;
            }
            .preview-blk-title{
                margin-bottom: 1rem;
            }
            .preview-blk-list .preview-item{
                font-size: 1.5rem;
                margin-bottom: 0.2rem;
                opacity: 0.95;
            }
            .preview-cnt-r .preview-blk-title{
                color: var(--clr-dark);
            }
            .preview-cnt-r .preview-blk-list .preview-item{
                margin-top: 1.8rem;
            }

            .achievements-items.preview-blk-list .preview-item span:first-child,
            .educations-items.preview-blk-list .preview-item span:first-child,
            .experiences-items.preview-blk-list .preview-item span:first-child{
                display: block;
                font-weight: 600;
                margin-bottom: 1em;
                /* background-color: rgba(0, 0, 0, 0.03); */
            }

            .educations-items.preview-blk-list .preview-item span:nth-child(2),
            .experiences-items.preview-blk-list .preview-item span:nth-child(2){
                font-weight: 600;
                margin-right: 1rem;
                display: block;
                /* margin-top: 1em; */
                margin-bottom: 0.5em;
            }

            .educations-items.preview-blk-list .preview-item span:nth-child(3),
            .experiences-items.preview-blk-list .preview-item span:nth-child(3){
                font-style: italic;
                margin-right: 1rem;
            }

            .educations-items.preview-blk-list .preview-item span:nth-child(4),
            .educations-items.preview-blk-list .preview-item span:nth-child(5),
            .experiences-items.preview-blk-list .preview-item span:nth-child(4),
            .experiences-items.preview-blk-list .preview-item span:nth-child(5){
                margin-right: 0.5em;
                background-color: #002e63;
                color: var(--clr-white);
                padding: 0 1rem;
                border-radius: 0.6rem;
            }

            .educations-items.preview-blk-list .preview-item span:nth-child(6),
            .experiences-items.preview-blk-list .preview-item span:nth-child(6){
                font-size: 13.5px;
                display: block;
                opacity: 0.8;
                margin-top: 1rem;
            }
            .projects-items.preview-blk-list .preview-item span{
                display: block;
            }

            .projects-items.preview-blk-list .preview-item span:first-child {
                display: block;
                font-weight: 600;
                margin-bottom: 1rem;
                font-size: 1em;
            }

            .projects-items.preview-blk-list .preview-item span:nth-child(2) {
                /* font-weight: 600; */
                margin-right: 1rem;
            }

            .projects-items.preview-blk-list .preview-item span:nth-child(3) {
                /* font-style: italic; */
                margin-right: 1rem;
            }

            .projects-items.preview-blk-list .preview-item span:nth-child(4),
            .projects-items.preview-blk-list .preview-item span:nth-child(5) {
                margin-right: 1rem;
                background-color: #002e63;
                color: var(--clr-white);
                padding: 0 1rem;
                border-radius: 0.6rem;
            }

            .projects-items.preview-blk-list .preview-item span:nth-child(6) {
                font-size: 13.5px;
                display: block;
                opacity: 0.8;
                margin-top: 1rem;
            }

            .dropdown-container {
                display: flex;
                flex-direction: column;
                align-items: flex-start;
                margin-bottom: 1em;
                margin-left: 6em;
                margin-top: -4em;
            }

            .dropdown-label {
                font-size: 1em;
                margin-bottom: 0.5em;
                color: #333;
            }

            .dropdown-select {
                width: 150px;
                padding: 0.5em 2.5em 0.5em 1em;
                font-size: 1em;
                border: 1px solid #ccc;
                border-radius: 5px;
                background-color: #fff;
                color: #333;
                outline: none;
                transition: all 0.3s ease;
                cursor: pointer;
                appearance: none;
                background-image: url('data:image/svg+xml;charset=UTF-8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="%23333" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>');
                background-repeat: no-repeat;
                background-position: right 1em center;
                background-size: 1em;
            }

            .dropdown-select:hover,
            .dropdown-select:focus {
                border-color: #007bff;
                box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            }

            @media screen and (min-width: 768px){
                .cols-3{
                    grid-template-columns: repeat(3, 1fr);
                    column-gap: 2rem;
                }
                .cols-2{
                    grid-template-columns: repeat(2, 1fr);
                    column-gap: 2rem;
                }
            }

            @media screen and (min-width: 992px){
                .cv-form-row{
                    padding: 3rem 3rem 0rem 3rem;
                }
                .cols-3{
                    grid-template-columns: repeat(3, 1fr);
                }
            }

            .print-btn-sc{
                margin: 2rem 0 6rem 0;
            }

            @media print{
                body *{
                    visibility: hidden;
                }

                .non_print_area{
                    display: none;
                }

                .print_area, .print_area *{
                    visibility: visible;
                }

                .print_area{
                    width: 100%;
                    position: absolute;
                    left: 0;
                    top: 0;
                    overflow: hidden;
                }
            }
                    nav {
                    background: #002147;
                    height: 80px;
                    width: 100%;
                    }

                    label.logo {
                    color: white;
                    font-size: 20px;
                    line-height: 80px;
                    padding: 0 100px;
                    font-weight: bold;
                    }

                    nav ul {
                    float: right;
                    margin-right: 20px;
                    }

                    nav ul li {
                    display: inline-block;
                    line-height: 80px;
                    margin: 0 5px;
                    }

                    nav ul li a {
                    color: white;
                    /* font-size: 17px; */
                    padding: 7px 13px;
                    border-radius: 3px;
                    /* text-transform: uppercase; */
                    }

                    a.active,
                    a:hover {
                    background: #284260;
                    transition: .5s;
                    /* opacity: 0.5; */
                    color: white;
                    }

                    .checkbtn {
                    font-size: 22px;
                    color: white;
                    float: right;
                    line-height: 80px;
                    margin-right: 30px;
                    cursor: pointer;
                    display: none;
                    }

                    #check {
                    display: none;
                    }

                    @media (max-width: 1050px) {
                    label.logo {
                        padding-left: 30px;
                    }

                    nav ul li a {
                        font-size: 16px;
                    }
                    }

                    /* Responsive media query code for small screen */
                    @media (max-width: 890px) {
                    .checkbtn {
                        display: block;
                    }

                    label.logo {
                        font-size: 22px;
                    }

                    ul {
                        position: fixed;
                        width: 100%;
                        height: 100vh;
                        background: #2c3e50;
                        top: 80px;
                        left: -100%;
                        text-align: center;
                        transition: all .5s;
                    }

                    nav ul li {
                        display: block;
                        margin: 50px 0;
                        line-height: 30px;
                    }

                    nav ul li a {
                        font-size: 20px;
                    }

                    a:hover,
                    a.active {
                        background: none;
                        color: #0082e6;
                    }

                    #check:checked~ul {
                        left: 0;
                    }
                    }

                    .buat-flex{
                        display: flex;
                    }
        </style>
    </head>
    <body>
    <nav>
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
            <li><a href="index3.php">Home</a></li>
            <li><a href="#" class="active">Create resume</a></li>
            <!-- <li><a href="#">ATS</a></li> -->
            <li><a href="https://smkpesat.sch.id/civitas/" target="_blank">Profile</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
  </nav>
        <section id = "about-sc" class = "" style="margin-top: -3.5em;">
            <div class = "container">
                <div class = "about-cnt">
                <form id="cv-form" action="create-resume.php" method="POST" enctype="multipart/form-data" class="cv-form">

                        <div class = "cv-form-blk">
                            <div class = "cv-form-row-title">
                                <h3>about section</h3>
                            </div>
                            <div class = "cv-form-row cv-form-row-about">
                                <div class = "cols-3">
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">First Name</label>
                                        <input name = "firstname" type = "text" class = "form-control firstname" id = "firstname" placeholder="e.g. Ariva" required>
                                        <span class="form-text"></span>
                                    </div>
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Middle Name <span class = "opt-text">(optional)</span></label>
                                        <input name = "middlename" type = "text" class = "form-control middlename" id = "middlename" placeholder="e.g Lorentza">
                                        <span class="form-text"></span>
                                    </div>
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Last Name</label>
                                        <input name = "lastname" type = "text" class = "form-control lastname" id = "lastname" placeholder="e.g. Zweena" required>
                                        <span class="form-text"></span>
                                    </div>
                                </div>

                                <div class="cols-3">
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Your Image</label>
                                        <input name = "image" type = "file" class = "form-control image" id = "image" accept = "image/*" onchange="previewImage()" required>
                                    </div>
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Designation</label>
                                        <input name = "designation" type = "text" class = "form-control designation" id = "designation" placeholder="e.g. Web programmer" required>
                                        <span class="form-text"></span>
                                    </div>
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Address</label>
                                        <input name = "address" type = "text" class = "form-control address" id = "address" placeholder="e.g. Cilebut barat, sukaraja" required>
                                        <span class="form-text"></span>
                                    </div>
                                </div>

                                <div class = "cols-2">
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Email</label>
                                        <input name = "email" type = "text" class = "form-control email" id = "email" placeholder="e.g. ariva02zweena@gmail.com" onkeyup="generateCV()" required>
                                        <span class="form-text"></span>
                                    </div>
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Phone number:</label>
                                        <input name = "mobileno" type = "text" class = "form-control mobileno" id = "mobileno" placeholder="e.g. +62 123-456-7890" required>
                                        <span class="form-text"></span>
                                    </div>
                                </div>
                                <div class = "cols-2">
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Self description</label>
                                        <textarea name="summary" class="form-control summary" id="summary" placeholder="e.g. Lorem ipsum odor amet, consectetuer adipiscing elit. Integer integer mauris tempor hac netus ut habitant finibus. Placerat arcu egestas duis suspendisse nisl, tristique placerat dis" style="width: 204%;" required></textarea>

                                        <span class="form-text"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="cv-form-blk">
                            <div class = "cv-form-row-title">
                                <h3>Certifications</h3>
                            </div>

                            <div class = "row-separator repeater">
                                <div class = "repeater" data-repeater-list = "group-a">
                                    <div data-repeater-item>
                                        <div class = "cv-form-row cv-form-row-achievement">
                                            <div class = "cols-2">
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Title</label>
                                                    <input name="group-a[0][achieve_title]" type="text" class="form-control achieve_title" placeholder="e.g. Web design, 2024" style="width: 204%;">
                                                    <span class="form-text"></span>
                                                </div>
                                            </div>
                                            <div class = "cols-2">
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Description</label>
                                                    <textarea name="group-a[0][achieve_description]" class="form-control achieve_description" style="width: 204%;" placeholder="e.g. Lorem ipsum odor amet, consectetuer adipiscing elit. Integer integer mauris tempor hac netus ut habitant finibus. Placerat arcu egestas duis suspendisse nisl, tristique placerat dis"></textarea>
                                                    <span class="form-text"></span>
                                                </div>
                                            </div>
                                            <button data-repeater-delete type = "button" class = "repeater-remove-btn">-</button>
                                        </div>
                                    </div>
                                </div>
                                <button type = "button" data-repeater-create value = "Add" class = "repeater-add-btn" id="add-certification-btn">+</button>
                            </div>
                        </div>

                        <div class="cv-form-blk">
                            <div class = "cv-form-row-title">
                                <h3>experience</h3>
                            </div>

                            <div class = "row-separator repeater">
                                <div class = "repeater" data-repeater-list = "group-b">
                                    <div data-repeater-item>
                                        <div class = "cv-form-row cv-form-row-experience">
                                            <div class = "cols-3">
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Title</label>
                                                    <input name="group-b[0][exp_title]" type="text" class="form-control exp_title" placeholder="e.g Web developer">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Company / Organization</label>
                                                    <input name="group-b[0][exp_organization]" type="text" class="form-control exp_organization" placeholder="e.g Google">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Location</label>
                                                    <input name="group-b[0][exp_location]" type="text" class="form-control exp_location" placeholder="e.g Bogor, Indonesia">
                                                    <span class="form-text"></span>
                                                </div>
                                            </div>
                                        
                                            <div class="cols-2">
                                                <div class="form-elem">
                                                    <label for="exp_start_date" class="form-label">Start Date</label>
                                                    <input name="group-b[0][exp_start_date]" type="text" class="form-control exp_start_date" placeholder="e.g August">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class="form-elem">
                                                    <label for="exp_end_date" class="form-label">End Date</label>
                                                    <input name="group-b[0][exp_end_date]" type="text" class="form-control exp_end_date" placeholder="e.g September 2020">
                                                    <span class="form-text"></span>
                                                </div>
                                            </div>
                                            <div class="cols-2">
                                                <div class="form-elem">
                                                    <label for="exp_description" class="form-label">Description</label>
                                                    <textarea name="group-b[0][exp_description]" class="form-control exp_description" placeholder="e.g Lorem ipsum dolor, sit amet consectetur adipisicing elit. Porro tempore quod praesentium nam itaque dolorem nostrum quo ipsam, modi, ut et earum sit perspiciatis inventore fugit, molestias suscipit doloremque voluptates?"  rows="5" style="width: 204%;"></textarea>

                                                    <span class="form-text"></span>
                                                </div>
                                            </div>
                                            <button data-repeater-delete type = "button" class = "repeater-remove-btn">-</button>
                                    </div>
                                </div>
                                <button type = "button" data-repeater-create value = "Add" class = "repeater-add-btn">+</button>
                            </div>
                        </div>

                        <div class="cv-form-blk">
                            <div class = "cv-form-row-title">
                                <h3>education</h3>
                            </div>

                            <div class = "row-separator repeater">
                                <div class = "repeater" data-repeater-list = "group-c">
                                    <div data-repeater-item>
                                        <div class = "cv-form-row cv-form-row-experience">
                                            <div class = "cols-3">
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">School</label>
                                                    <input name = "edu_school" type = "text" class = "form-control edu_school" id = "" onkeyup="generateCV()" placeholder="e.g SMK INFORMATIKA PESAT">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class="form-elem">
                                                    <label for="edu_degree_input" class="form-label">Majors</label>
                                                    <input name="edu_degree" type="text" class="form-control edu_degree" id="" placeholder="e.g Rekayasa perangkat lunak">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">City</label>
                                                    <input name = "edu_city" type = "text" class = "form-control edu_city" id = "" onkeyup="generateCV()" placeholder="e.g Bogor, Indonesia">
                                                    <span class="form-text"></span>
                                                </div>
                                            </div>

                                            <div class = "cols-2">
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Start Date</label>
                                                    <input name = "edu_start_date" type = "text" class = "form-control edu_start_date" id = "edu_start_date" onkeyup="generateCV()" placeholder="20-05-2013">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">End Date</label>
                                                    <input name = "edu_graduation_date" type = "text" class = "form-control edu_graduation_date" id = "edu_graduation_date" onkeyup="generateCV()" placeholder="29-12-2040">
                                                    <span class="form-text"></span>
                                                </div>
                                            </div>
                                            <div class = "cols-2">
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Description</label>
                                                    <textarea name = "edu_description" type = "text" class = "form-control edu_description" id = "" onkeyup="generateCV()" placeholder="e.g. Lorem ipsum odor amet, consectetuer adipiscing elit. Integer integer mauris tempor hac netus ut habitant finibus. Placerat arcu egestas duis suspendisse nisl, tristique placerat dis" style="width: 204%;"></textarea>
                                                    <span class="form-text"></span>
                                                </div>
                                            </div>

                                            <button data-repeater-delete type = "button" class = "repeater-remove-btn">-</button>
                                        </div>
                                    </div>
                                </div>
                                <button type = "button" data-repeater-create value = "Add" class = "repeater-add-btn">+</button>
                            </div>
                        </div>

                        <div class="cv-form-blk">
                            <div class = "cv-form-row-title">
                                <h3>projects</h3>
                            </div>

                            <div class = "row-separator repeater">
                                <div class = "repeater" data-repeater-list = "group-d">
                                    <div data-repeater-item>
                                        <div class = "cv-form-row cv-form-row-experience">
                                            <div class = "cols-2">
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Project Name</label>
                                                    <input name = "proj_title" type = "text" class = "form-control proj_title" id = ""  placeholder="e.g Sistem voting osis" style="width: 204%;">
                                                    <span class="form-text"></span>
                                                </div>
                                            </div>
                                            <div class = "cols-2">
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Description</label>
                                                    <textarea name = "proj_description" type = "text" class = "form-control proj_description" id = "" onkeyup="generateCV()" placeholder="e.g. Lorem ipsum odor amet, consectetuer adipiscing elit. Integer integer mauris tempor hac netus ut habitant finibus. Placerat arcu egestas duis suspendisse nisl, tristique placerat dis" style="width: 204%;"></textarea>
                                                    <span class="form-text"></span>
                                                </div>
                                            </div>
                                            <button data-repeater-delete type = "button" class = "repeater-remove-btn">-</button>
                                        </div>
                                    </div>
                                </div>
                                <button type = "button" data-repeater-create value = "Add" class = "repeater-add-btn">+</button>
                            </div>
                        </div>

                        <div class="cv-form-blk">
                            <div class = "cv-form-row-title">
                                <h3>skills</h3>
                            </div>

                            <div class = "row-separator repeater">
                                <div class = "repeater" data-repeater-list = "group-e">
                                    <div data-repeater-item>
                                        <div class = "cv-form-row cv-form-row-skills">
                                            <div class = "form-elem">
                                                <label for = "" class = "form-label">Skill</label>
                                                <input name = "skill" type = "text" class = "form-control skill" id = "" placeholder="e.g PHP">
                                                <span class="form-text"></span>
                                            </div>
                                            
                                            <button data-repeater-delete type = "button" class = "repeater-remove-btn">-</button>
                                        </div>
                                    </div>
                                </div>
                                <button type = "button" data-repeater-create value = "Add" class = "repeater-add-btn">+</button>
                            </div>
                        </div> -->
                        <!-- <div class="form-submit">
                            <button type="submit" name="submit" class="btn btn-primary">Save CV</button>
                        </div> -->
                        <input type="submit" value="Save CV" class="btn btn-primary"></input>
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
    </body>
</html>