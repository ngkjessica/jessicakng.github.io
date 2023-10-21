<?php

// Include packages and files for PHPMailer and SMTP protocol

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

// Initialize PHP mailer, configure to use SMTP protocol and add credentials

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";

$mail->SMTPDebug  = 0;
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "ssl";
$mail->Port       = 465;
$mail->Host       = "smtp.gmail.com";
$mail->Username   = "soham1255@gmail.com";
$mail->Password   = "lordshiva9586681231";


$success = "";
$error = "";
$name = $message = $email = "";
$errors = array('name' => '', 'email' => '','subject' =>'', 'message' => '');

if (isset($_POST["submit"])) {
    if (empty(trim($_POST["name"]))) {
        $errors['name'] = "Your name is required";
    } else {
        $name = SanitizeString($_POST["name"]);
        if (!preg_match('/^[a-zA-Z\s]{6,50}$/', $name)) {
            $errors['name'] = "Only letters and spaces allowed";
        }
    }

    if (empty(trim($_POST["email"]))) {
        $errors["email"] = "Your email is required";
    } else {
        $email = SanitizeString($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors["email"] = "Pls give a proper email address";
        }
    }

    if (empty(trim($_POST["subject"]))) {
        $errors["subject"] = "Please type your message";
    } else {
        $message = SanitizeString($_POST["subject"]);
        if (!preg_match("/^[a-zA-Z\d\s]+$/", $subject)) {
            $errors["subject"] = "Only letters, spaces and maybe numbers allowed";
        }
    }

    if (empty(trim($_POST["message"]))) {
        $errors["message"] = "Please type your message";
    } else {
        $message = SanitizeString($_POST["message"]);
        if (!preg_match("/^[a-zA-Z\d\s]+$/", $message)) {
            $errors["message"] = "Only letters, spaces and maybe numbers allowed";
        }
    }

    if (array_filter($errors)) {
    } else {
        try {

            $mail->setFrom('eclassroom1999@gmail', 'Anirudha B Shetty');

            $mail->addAddress($email, $name);

            $mail->Subject = 'Build a contact form with PHP';

            $mail->Body = $message;

            // send mail

            $mail->send();

            // empty users input

            $name = $message = $email = "";

            $success = "Message sent successfully";
        } catch (Exception $e) {

            // echo $e->errorMessage(); use for testing & debugging purposes
            $error = "Sorry message could not send, try again";
        } catch (Exception $e) {

            // echo $e->getMessage(); use for testing & debugging purposes
            $error = "Sorry message could not send, try again";
        }
    }
}

function SanitizeString($var)
{
    $var = strip_tags($var);
    $var = htmlentities($var);
    return stripslashes($var);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Jessica - Senior Product Manager</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Jessica Ng" name="keywords">
    <meta content="Senior Product Manager" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="51">
    <!-- Navbar Start -->
    <nav class="navbar fixed-top shadow-sm navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-lg-5">
        <a href="index.html" class="navbar-brand ml-lg-3">
            <h1 class="m-0 display-5"><span class="text-primary">Jessica</span>Ng</h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse px-lg-3" id="navbarCollapse">
            <div class="navbar-nav m-auto py-0">
                <a href="#home" class="nav-item nav-link active">Home</a>
                <a href="#about" class="nav-item nav-link">About</a>
                <a href="#qualification" class="nav-item nav-link">Quality</a>
                <a href="#skill" class="nav-item nav-link">Skill</a>
                <a href="#portfolio" class="nav-item nav-link">Portfolio</a>
                <a href="#testimonial" class="nav-item nav-link">Recommendations</a>
                <a href="#contact" class="nav-item nav-link">Contact</a>
            </div>
            <a href="" class="btn btn-outline-primary d-none d-lg-block">Hire Me</a>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="container-fluid bg-primary d-flex align-items-center mb-5 py-5" id="home" style="min-height: 100vh;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 px-5 pl-lg-0 pb-5 pb-lg-0">
                    <img class="img-fluid w-100 rounded-circle shadow-sm" src="img/Jessica.jpeg" alt="">
                </div>
                <div class="col-lg-7 text-center text-lg-left">
                    <h3 class="text-white font-weight-normal mb-3">I'm</h3>
                    <h1 class="display-3 text-uppercase text-primary mb-2" style="-webkit-text-stroke: 2px #ffffff;">Jessica Ng</h1>
                    <h1 class="typed-text-output d-inline font-weight-lighter text-white"></h1>
                    <div class="typed-text d-none">Senior Product Manager</div>
                    <div class="d-flex align-items-center justify-content-center justify-content-lg-start pt-5">
                        <a href="/file/Jessica_K_Ng Resume.pdf" class="btn btn-outline-light mr-5" download="Jessica_K_Ng Resume" >Download CV</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- About Start -->
    <div class="container-fluid py-5" id="about">
        <div class="container">
            <div class="position-relative d-flex align-items-center justify-content-center">
                <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">About</h1>
                <h1 class="position-absolute text-uppercase text-primary">About Me</h1>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-5 pb-4 pb-lg-0">
                    <img class="img-fluid rounded w-100" src="img/Jessica-ng 1.png" alt="">
                </div>
                <div class="col-lg-7">
                    <h3 class="mb-4">Senior Product Manager</h3>
                    <p>I am a dedicated and results-oriented product manager with over 15+ years experience who excels at transforming ordinary ideas into extraordinary solutions. 
                        My background includes expertise in the development and optimization of intricate complex workflows, leading to increased automation and operational efficiency by tenfold. 
                        I have led diverse cross-functional teams, from tech startups to Fortune 50 giants, in launching groundbreaking products that reshape the tech landscape. 
                        My data-driven approach consistently delivers remarkable results, fostering innovation and empowering high-performing teams.</p>
                    <div class="row mb-3">
                        <div class="col-sm-5 py-2"><h6>Name: <span class="text-secondary">Jessica Ng</span></h6></div>
                        <div class="col-sm-7 py-2"><h6>Degree: <span class="text-secondary">Master in Business Administration (MBA)</span></h6></div>
                        <div class="col-sm-5 py-2"><h6>Experience: <span class="text-secondary">15+ Years</span></h6></div>
                        <div class="col-sm-7 py-2"><h6>Phone: <span class="text-secondary">850-321-1755</span></h6></div>
                        <div class="col-sm-5 py-2" style="padding-right:0px;"><h6>Email: <span class="text-secondary">jessicakamanng@gmail.com</span></h6></div>
                        <div class="col-sm-7 py-2"><h6>LinkedIn: <span class="text-secondary">https://www.linkedin.com/in/jessicakng/</span></h6></div>
                       
                    </div>
                    <a href="" class="btn btn-outline-primary mr-4">Hire Me</a>
                    <a href="" class="btn btn-outline-primary">Learn More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Qualification Start -->
    <div class="container-fluid py-5" id="qualification">
        <div class="container">
            <div class="position-relative d-flex align-items-center justify-content-center">
                <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">Quality</h1>
                <h1 class="position-absolute text-uppercase text-primary">Education & Experience</h1>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 n_education" style="position:relative;bottom: 220px;">
                    <h3 class="mb-4">My Education</h3>
                    <div class="border-left border-primary pt-2 pl-4 ml-2">
                        <div class="position-relative mb-4">
                            <i class="far fa-dot-circle text-primary position-absolute" style="top: 2px; left: -32px;"></i>
                            <h5 class="font-weight-bold mb-1">Master of Business Administration (MBA) in International Business</h5>
                            <p class="mb-2"><strong>Florida International University – College of Business</strong> </p>
                            <p class="mb-2"><strong>Miami, Florida </strong> </p>
                        </div>
                        <div class="position-relative mb-4">
                            <i class="far fa-dot-circle text-primary position-absolute" style="top: 2px; left: -32px;"></i>
                            <h5 class="font-weight-bold mb-1">Bachelor of Science in Management Information Systems, Finance</h5>
                            <p class="mb-2"><strong>Florida State University</strong> </p>
                            <p class="mb-2"><strong>Tallahassee, Florida</strong> </p>
                        </div>
                    </div>
                    <h3 class="mb-4">Certificates</h3>
                    <div class="border-left border-primary pt-2 pl-4 ml-2">
                         <div class="position-relative mb-4">
                            <i class="far fa-dot-circle text-primary position-absolute" style="top: 2px; left: -32px;"></i>
                            <h5 class="font-weight-bold mb-1">Certified Scrum Master from Scrum Alliance</h5>
                            <img class="img-fluid rounded w-20" src="img/Scrum Alliance logo.jpeg" alt="">
                        </div>
                         <div class="position-relative mb-4">
                            <i class="far fa-dot-circle text-primary position-absolute" style="top: 2px; left: -32px;"></i>
                            <h5 class="font-weight-bold mb-1">Project Management Certification from Florida International University</h5>
                            <img class="img-fluid rounded w-20" src="img/1666125777673.jpeg" alt="">
                        </div>
                    </div>
                        
                </div>
                <div class="col-lg-6">
                    <h3 class="mb-4">My Experience</h3>
                    <div class="border-left border-primary pt-2 pl-4 ml-2">
                        <div class="position-relative mb-4">
                            <i class="far fa-dot-circle text-primary position-absolute" style="top: 2px; left: -32px;"></i>
                            <h5 class="font-weight-bold mb-1">Senior Product Manager</h5>
                            <p class="mb-2"><strong>First Republic Bank </strong> | <small>2021 - 2023</small></p>
                            <p>As a Senior Product Manager for the Eagle Lending Department, 
                                I collaborated closely with 10+ cross-functional teams to deliver high quality innovative solutions for a Loan Origination System (LOS) product that has over 200+ internal end users, 
                                spread across geographically diverse teams. <br><br>
                                Increased operational efficiency by tenfold for end users. 
                                Improved workflow automation by 100%. Reduced substantial costs (time and money) for the organization.
                            </p>
                        </div>
                        <div class="position-relative mb-4">
                            <i class="far fa-dot-circle text-primary position-absolute" style="top: 2px; left: -32px;"></i>
                            <h5 class="font-weight-bold mb-1">Senior Product Owner </h5>
                            <p class="mb-2"><strong>Wells Fargo</strong> | <small>2021 - 2021</small></p>
                            <p>As a Senior Product Owner for the Deposits Group department, 
                                I spearheaded the development and implementation of the microservices architecture for the Deposits account open workflow. 
                            <br><br>Improved scalability, agility, and flexibility for software development, leading to faster delivery times and product updates for the client.
                            </p>
                        </div>
                        <div class="position-relative mb-4">
                            <i class="far fa-dot-circle text-primary position-absolute" style="top: 2px; left: -32px;"></i>
                            <h5 class="font-weight-bold mb-1">Senior Product Owner </h5>
                            <p class="mb-2"><strong>First Republic Bank </strong> | <small>2019 - 2021</small></p>
                            <p>As a Senior Product Owner in the Bank Secrecy Act/Anti-Money Laundering (BSA/AML) Department, 
                                I led and supported the platform migration project for a 'Know Your Customer' (KYC) Due Diligence product. 
                                Additionally, I introduced new product features and enhanced existing features. 
                            <br><br>Increased workflow automation by 100%. Increased operational efficiency by tenfold for business end users.
                            </p>
                        </div>
                         <div class="position-relative mb-4">
                            <i class="far fa-dot-circle text-primary position-absolute" style="top: 2px; left: -32px;"></i>
                            <h5 class="font-weight-bold mb-1">Senior Product Owner </h5>
                            <p class="mb-2"><strong>Wells Fargo </strong> | <small>2017 - 2019</small></p>
                            <p>As a Senior Product Owner working on a 'Know Your Customer' (KYC) Customer Due Diligence Product, 
                                I collaborated closely with both international and domestic business partners and cross-functional teams that spanned across different locations to deliver innovative solutions. 
                            <br><br>Increased operational efficiency for end users by tenfold. 
                                Improved workflow automation by 100x for 200+ internal end users. 
                                Boosted customer satisfaction 100x and increased employee engagement.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Qualification End -->


    <!-- Skill Start -->
    <div class="container-fluid py-5" id="skill">
        <div class="container">
            <div class="position-relative d-flex align-items-center justify-content-center">
                <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">Skills</h1>
                <h1 class="position-absolute text-uppercase text-primary">My Skills</h1>
            </div>
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">Product Development and Launch</h6>
                            <h6 class="font-weight-bold">95%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">Product Roadmap</h6>
                            <h6 class="font-weight-bold">85%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">Product Strategy</h6>
                            <h6 class="font-weight-bold">90%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                     <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">JIRA</h6>
                            <h6 class="font-weight-bold">90%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                   
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">Agile</h6>
                            <h6 class="font-weight-bold">95%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-dark" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">Scrum</h6>
                            <h6 class="font-weight-bold">85%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">Team Communication</h6>
                            <h6 class="font-weight-bold">95%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">Team Building & Leadership</h6>
                            <h6 class="font-weight-bold">90%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Skill End -->


   

    <!-- Portfolio Start -->
    <div class="container-fluid pt-5 pb-3" id="portfolio">
        <div class="container">
            <div class="position-relative d-flex align-items-center justify-content-center">
                <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">Gallery</h1>
                <h1 class="position-absolute text-uppercase text-primary">My Portfolio</h1>
            </div>
            <div class="row">
                <div class="col-12 text-center mb-2">
                    <ul class="list-inline mb-4" id="portfolio-flters">
                        <li class="btn btn-sm btn-outline-primary m-1 active"  data-filter="*">All</li>
                        <li class="btn btn-sm btn-outline-primary m-1" data-filter=".first">Design</li>
                        <li class="btn btn-sm btn-outline-primary m-1" data-filter=".second">Development</li>
                        <li class="btn btn-sm btn-outline-primary m-1" data-filter=".third">Marketing</li>
                    </ul>
                </div>
            </div>
            <div class="row portfolio-container">
                <div class="col-lg-4 col-md-6 mb-4 portfolio-item first">
                    <div class="position-relative overflow-hidden mb-2">
                        <img class="img-fluid rounded w-100" src="img/portfolio-1.jpg" alt="">
                        <div class="portfolio-btn bg-primary d-flex align-items-center justify-content-center">
                            <a href="img/portfolio-1.jpg" data-lightbox="portfolio">
                                <i class="fa fa-plus text-white" style="font-size: 60px;"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 portfolio-item second">
                    <div class="position-relative overflow-hidden mb-2">
                        <img class="img-fluid rounded w-100" src="img/portfolio-2.jpg" alt="">
                        <div class="portfolio-btn bg-primary d-flex align-items-center justify-content-center">
                            <a href="img/portfolio-2.jpg" data-lightbox="portfolio">
                                <i class="fa fa-plus text-white" style="font-size: 60px;"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 portfolio-item third">
                    <div class="position-relative overflow-hidden mb-2">
                        <img class="img-fluid rounded w-100" src="img/portfolio-3.jpg" alt="">
                        <div class="portfolio-btn bg-primary d-flex align-items-center justify-content-center">
                            <a href="img/portfolio-3.jpg" data-lightbox="portfolio">
                                <i class="fa fa-plus text-white" style="font-size: 60px;"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 portfolio-item first">
                    <div class="position-relative overflow-hidden mb-2">
                        <img class="img-fluid rounded w-100" src="img/portfolio-4.jpg" alt="">
                        <div class="portfolio-btn bg-primary d-flex align-items-center justify-content-center">
                            <a href="img/portfolio-4.jpg" data-lightbox="portfolio">
                                <i class="fa fa-plus text-white" style="font-size: 60px;"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 portfolio-item second">
                    <div class="position-relative overflow-hidden mb-2">
                        <img class="img-fluid rounded w-100" src="img/portfolio-5.jpg" alt="">
                        <div class="portfolio-btn bg-primary d-flex align-items-center justify-content-center">
                            <a href="img/portfolio-5.jpg" data-lightbox="portfolio">
                                <i class="fa fa-plus text-white" style="font-size: 60px;"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 portfolio-item third">
                    <div class="position-relative overflow-hidden mb-2">
                        <img class="img-fluid rounded w-100" src="img/portfolio-6.jpg" alt="">
                        <div class="portfolio-btn bg-primary d-flex align-items-center justify-content-center">
                            <a href="img/portfolio-6.jpg" data-lightbox="portfolio">
                                <i class="fa fa-plus text-white" style="font-size: 60px;"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio End -->


    <!-- Testimonial Start -->
    <div class="container-fluid py-5" id="testimonial">
        <div class="container">
            <div class="position-relative d-flex align-items-center justify-content-center">
                <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">Recommendations</h1>
                <h1 class="position-absolute text-uppercase text-primary">Recommendations</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="owl-carousel testimonial-carousel">
                        <div class="text-center">
                            <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                            <h4 class="font-weight-light mb-4">I have had the pleasure of working alongside Jessica at FRB on a day to day basis and can confidently say that they are one of the most dedicated and hardworking team members 
                                I have had the pleasure of working with. 
                                She was the Product Manager for Appian Professional Loan Program Product in where I was the lead developer. 
                                Jessica has a unique ability to juggle multiple tasks while maintaining the highest quality and was able to also handle complex challenges/issues that arose with ease. </h4>
                            <img class="img-fluid rounded-circle mx-auto mb-3" src="img/user-profile-icon.jpg" style="width: 80px; height: 80px;">
                            <h5 class="font-weight-bold m-0">Veera Reddy Nandikanti</h5>
                            <span>Veera Reddy Nandikanti</span>
                        </div>
                        <div class="text-center">
                            <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                            <h4 class="font-weight-light mb-4">Jessica and I were on the same Scrum Team at Wells Fargo Bank, she was my Product Owner, and I worked in the BA role. 
                                Working closely with Jessica on the pretty complicated projects, 
                                I appreciated her PO style - attention to the details, deep research to understand the new functionality,
                                understanding the impact on the documentation, doing lots of homework before committing to the project work and the timeline. 
                                Jessica joined the group in the middle of the project and got very quickly up to speed and was able to lead the team successfully, 
                                improving the team's velocity. </h4>
                            <img class="img-fluid rounded-circle mx-auto mb-3" src="img/Olga.jpeg" style="width: 80px; height: 80px;">
                            <h5 class="font-weight-bold m-0">Olga Leontyeva, MS, PMP, CSPO, IIBA-AAC</h5>
                            <span>Product Analyst at Wells Fargo</span>
                        </div>
                        <div class="text-center">
                            <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                            <h4 class="font-weight-light mb-4">I had the privilege of working with Jessica Ng in Hellmann Worldwide Logistics for more than one year Jessica is proactive, 
                                result oriented, responsible and technically sound employee and she is always ready to put all her energy and time to get the job done. 
                                She has an exceptional troubleshooting and analytical skill with technologies. Is. a great asset to any company.</h4>
                            <img class="img-fluid rounded-circle mx-auto mb-3" src="img/user-profile-icon.jpg" style="width: 80px; height: 80px;">
                            <h5 class="font-weight-bold m-0">RUBY R</h5>
                            <span>Logistics Manager</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


   

    <!-- Contact Start -->
    <div class="container-fluid py-5" id="contact">
        <div class="container">
            <div class="position-relative d-flex align-items-center justify-content-center">
                <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">Contact</h1>
                <h1 class="position-absolute text-uppercase text-primary">Contact Me</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form text-center">
                        <div id="success"></div>
                        <form name="sentMessage" id="contactForm" novalidate="novalidate" action="index.php" method="post">
                            <div class="form-row">
                                <div class="control-group col-sm-6">
                                    <input type="text" class="form-control p-4" id="name" placeholder="Your Name"
                                        required="required" data-validation-required-message="Please enter your name" value="<?php echo htmlspecialchars($name) ?>" />
                                    <p class="help-block text-danger"></p>
                                    <div class="error"><?php echo $errors["name"] ?></div>
                                </div>
                                <div class="control-group col-sm-6">
                                    <input name="email" type="email" class="form-control p-4" id="email" placeholder="Your Email"
                                        required="required" data-validation-required-message="Please enter your email" value="<?php echo htmlspecialchars($email) ?>" />
                                    <p class="help-block text-danger"></p>
                                    <div class="error"><?php echo $errors["email"] ?></div>
                                </div>
                            </div>
                            <div class="control-group">
                                <input name="subject" type="text" class="form-control p-4" id="subject" placeholder="Subject"
                                    required="required" data-validation-required-message="Please enter a subject" value="<?php echo htmlspecialchars($subject) ?>/>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <textarea class="form-control py-3 px-4" rows="5" id="message" placeholder="Message"
                                    required="required"
                                    data-validation-required-message="Please enter your message"><?php echo htmlspecialchars($message) ?></textarea>
                                <p class="help-block text-danger"></p>
                                <div class="error"><?php echo $errors["message"] ?></div>
                            </div>
                            <div>
                                <input type="submit" class="btn btn-outline-primary z-depth-0" name="submit" id="sendMessageButton" value="Send Message"></input>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-primary text-white mt-5 py-5 px-sm-3 px-md-5">
        <div class="container text-center py-5">
            <div class="d-flex justify-content-center mb-4">
<!--                 <a class="btn btn-light btn-social mr-2" href="#"><i class="fab fa-twitter"></i></a> -->
<!--                 <a class="btn btn-light btn-social mr-2" href="#"><i class="fab fa-facebook-f"></i></a> -->
                <a class="btn btn-light btn-social mr-2" href="https://www.linkedin.com/in/jessicakng/"><i class="fab fa-linkedin-in"></i></a>
<!--                 <a class="btn btn-light btn-social" href="#"><i class="fab fa-instagram"></i></a> -->
            </div>
<!--             <div class="d-flex justify-content-center mb-3">
                <a class="text-white" href="#">Privacy</a>
                <span class="px-3">|</span>
                <a class="text-white" href="#">Terms</a>
                <span class="px-3">|</span>
                <a class="text-white" href="#">FAQs</a>
                <span class="px-3">|</span>
                <a class="text-white" href="#">Help</a>
            </div> -->
            <p class="m-0">&copy; <a class="text-white font-weight-bold" href="https://ngkjessica.github.io/">ngkjessica.github.io</a>. All Rights Reserved.2023
            </p>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Scroll to Bottom -->
    <i class="fa fa-2x fa-angle-down text-white scroll-to-bottom"></i>

    <!-- Back to Top -->
    <a href="#" class="btn btn-outline-dark px-0 back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/typed/typed.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
