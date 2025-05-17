<?php
session_start();
if(isset($_GET["auth"])){
    $auth = htmlspecialchars($_GET["auth"]);
    if(!isset($_SESSION[$auth])){
        header("location:../login.html");
    }
} else {
    header("location:../login.html");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User dashboard</title>
    <link rel="stylesheet" href="../assets/css/animate.min.css">
    <link rel="stylesheet" href="../assets/css/aos.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/sweetalert2.min.css">
    <link rel="stylesheet" href="../assets/icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="shortcut icon" href="../favicon.png" type="image/x-icon">
    <style>
    </style>
</head>
<body>
    <!-- This is the beginning of the spinner body it will spin as the page loads info -->
    <div class="spinner-holder d-flex" id="loaderIndicator">
        <div class="spinner-border text-primary spin-style"></div>
     </div>
    <!-- This is the beginning of the header -->
    <header class="bg-future-green">
        <div class="container-fluid d-flex dnav">
            <a href="index.html" class="logo-holder">
                <a href="./home.html" class="navbar-brand"><center class="d-flex align-items-center"><img src="../favicon.png" alt="" class="rounded-corners mb-2 mt-1 header-initiative_logo"><h5 class="ms-3 p-0 fgi">Future Guardians initiative</h3></center></a>
            </a>
            <div class="not-prof-sec mt-3 d-flex flex-direction-row p-0">
                <span class="ms-3 me-3 position-relative notii" data-bs-toggle="dropdown">
                    <span class="badge position-absolute top-0 end-0 bg-primary mt-1">4</span>
                    <i class="bi mt-3 bi-bell-fill"></i>
                </span>
                <!-- Beginning of the notification dropdown -->
                 <div class="dropdown">
                    <ul class="dropdown-menu">
                        <li class="dropdown-header">
                            <p class="text-primary text-small m-0 p-0" id="notificationIndicator">
                                4 new Notifications 
                            </p>
                        </li>
                        <hr class="dropdown-divider">
                        <li class="dropdown-item">
                            <a href="" class="d-flex">
                                <div class="img-section">
                                    <img src="../assets/img/default.png" alt="">
                                </div>
                                <div class="info-sec">
                                   <p class="m-0 p-0 text-success">
                                    Henry sent feedback
                                   </p>
                                <div class="dd-description">
                                    <span class="text-small text-info">02:33 saturday 12/09/2023 </span>
                                </div>
                                </div>
                            </a>
                        </li>
                        <hr class="dropdown-divider">
                        <li class="dropdown-item">
                            <a href="" class="d-flex">
                                <div class="img-section">
                                    <img src="../assets/img/default.png" alt="">
                                </div>
                                <div class="info-sec">
                                   <p class="m-0 p-0 text-success">
                                    Henry sent feedback
                                   </p>
                                <div class="dd-description">
                                    <span class="text-small text-info">02:33 saturday 12/09/2023 </span>
                                </div>
                                </div>
                            </a>
                        </li>
                        <hr class="dropdown-divider">
                        <li class="dropdown-item">
                            <a href="" class="d-flex">
                                <div class="img-section">
                                    <img src="../assets/img/default.png" alt="">
                                </div>
                                <div class="info-sec">
                                   <p class="m-0 p-0 text-success">
                                    Henry sent feedback
                                   </p>
                                <div class="dd-description">
                                    <span class="text-small text-info">02:33 saturday 12/09/2023 </span>
                                </div>
                                </div>
                            </a>
                        </li>
                        <hr class="dropdown-divider">
                        <li class="dropdown-item">
                            <a href="" class="d-flex">
                                <div class="img-section">
                                    <img src="../assets/img/default.png" alt="">
                                </div>
                                <div class="info-sec">
                                   <p class="m-0 p-0 text-success">
                                    Henry sent feedback
                                   </p>
                                <div class="dd-description">
                                    <span class="text-small text-info">02:33 saturday 12/09/2023 </span>
                                </div>
                                </div>
                            </a>
                        </li>
                        <hr class="dropdown-divider">
                        <center><a href="" class="mb-1 mt-3">Show all</a></center>&nbsp;
                    </ul>
                 </div>
                 <!-- End of the notification dropdown -->
                 <span class="ms-3 me-3 position-relative notii" data-bs-target="#messages" data-bs-toggle="dropdown">
                    <span class="badge position-absolute top-0 end-0 bg-warning mt-1">4</span>
                    <i class="bi mt-3 bi-chat-dots-fill"></i>
                </span>
                <div class="dropdown" id="messages">
                    <ul class="dropdown-menu">
                        <p class="m-0 p-0 text-info">
                            4 new messages
                        </p>
                        <li class="dropdown-item"></li>
                    </ul>
                </div>
                <div class="dropdown">
                    <div class="prof-holder border-0 d-flex flex-direction-row" data-bs-toggle="dropdown">
                        <span class="me-1 p-0">Calvince Owino</span>
                        <img class="m-0" src="../assets/img/messages-3.jpg" alt="">
                    </div>
                    <ul class="dropdown-menu text-muted">
                        <li class="dropdown-item">
                            <center><img class="m-0 prof-pic-preview" src="../assets/img/messages-3.jpg" alt="" id="prof-pic-holder"></center>
                        </li>
                        <center>
                            <p class="m-1 text-secondary p-0 m-0 fw-medium userName" id="name-holder">Calvince Owino</p>
                            <p class="m-1 text-secondary p-0 m-0 fw-medium" id="user-type">Admin</p>
                        </center>
                        <hr class="dropdown-divider">
                        <li class="dropdown-item">
                            <a href="./profile.php?auth=<?php echo $auth;?>" class="text-secondary"><i class="bi bi-pencil-square"></i> Edit profile</a>
                        </li>
                        <hr class="dropdown-divider">
                        <li class="dropdown-item">
                            <a href="./profile.php?auth=<?php echo $auth;?>" class="text-secondary"><i class="bi bi-gear-fill"></i> Profile settings</a>
                        </li>
                        <hr class="dropdown-divider">
                        <li class="dropdown-item">
                            <a href="" class="text-secondary"><i class="bi bi-box-arrow-right"></i>Logout</a>
                        </li>
                        <hr class="dropdown-divider">
                    </ul>
                </div>
            </div>
        </div>
    </header>
     <!-- This is the end of the header -->
    <!-- This is the beginning of the navbar in phone -->
    <nav>
        <Section>
            
        </Section>
    </nav>
    <!-- This is thr beginnig of the nav in the desktop versions -->
    <div class="nav-sidebar">
        <ul class="navbar-container">
            <li class="navbar-item alert alert-success border-0">
                <a href="<?php echo "dashboard.php?auth=".$auth?>" class="navbar-link fw-medium text-muted"><i class="bi bi-house-door-fill"></i> Home</a>
            </li>
            <li class="navbar-item">
                <a href="./discussions.php?auth=<?php echo $auth;?>"" class="navbar-link fw-medium text-secondary"><i class="bi bi-person-lines-fill"></i> Discussions</a>
            </li>
            <li class="navbar-item">
                <a href="./donations.html" class="navbar-link fw-medium text-secondary"><img src="../assets/img/Coin Hand.png" class="nav-image" alt=""> Donations</a>
            </li>
            <li class="navbar-item">
                <a href="./queries.html" class="navbar-link fw-medium text-secondary"><i class="bi bi-chat-right-dots"></i> Queries</a>
            </li>
            <li class="navbar-item">
                <a href="./members.html" class="navbar-link fw-medium text-secondary"><i class="bi bi-people"></i> Members</a>
            </li>
            <li class="navbar-item">
                <a href="./resources.html?images='1'" class="navbar-link fw-medium text-secondary"><i class="bi bi-image-fill"></i> Images</a>
            </li>
            <li class="navbar-item">
                <a href="./resources.html?books='1'" class="navbar-link fw-medium text-secondary"><i class="bi bi-book-half"></i> Books</a>
            </li>
            <li class="navbar-item">
                <a href="./resources.html?videos='1'" class="navbar-link fw-medium text-secondary"><i class="bi bi-camera-reels"></i> Videos</a>
            </li>
        </ul>
    </div>
    <div class="main-body">
        
        <h5 class="text-secondary m-2">
            Dashboard/Profile
        </h5>
        <div class="row mb-4">
            <div class="col col-12 col-md-3 m-1">
                <br>
               <div class="card border-0">
                <center>
                    <img src="../assets/img/messages-1.jpg" class="mt-2" id="yourProfPic" alt="">
                </center>
                <center>
                    <h3 class="text-muted fw-medium mt-3">
                        Calvince Owino
                    </h3>
                    <p class="text-secondary fw-medium">
                        Environmetal Activist
                    </p>
                </center>
               </div>
            </div>
            <div class="col col-12 col-md-8 m-1 position-relative">
                <div class="dropdown position-absolute top-0 end-0 me-3">
                    <i class="bi bi-three-dots-vertical" data-bs-toggle="dropdown"></i>
                    <ul class="dropdown-menu">
                        <li class="dropdown-item mt-1" onclick="profSet('V')">
                            <i class="bi bi-eye-fill text-info"></i>&nbsp;View Your profile
                        </li>
                        <li class="dropdown-item mt-1" onclick="profSet('E')">
                            <i class="bi bi-pencil-square text-primary"></i>&nbsp;Edit Your profile
                        </li>
                        <li class="dropdown-item mt-1" onclick="profSet('C')">
                            <i class="bi bi-lock text-primary"></i>&nbsp;Change your password
                        </li>
                        <li class="dropdown-item mt-1">
                            <i class="bi bi-trash text-danger"></i>&nbsp;Delete profile
                        </li>
                    </ul>
                </div>
                <h5 class="text-info m-1" id="actionTitle">
                    View Your profile
                </h5>
                <div class="" id="ActionDisplay">
                    <!-- This is the beginning of the card to show the profile information -->
                    <div class="card border-0 shadow pb-2 mb-3 d-block" id="viewProfileCard">
                        <p class="m-3" id="userName"><span class="text-primary fw-medium">User Name </span>: ceojalsoft</p>
                        <p class="m-3" id="fullName"><span class="text-primary fw-medium">Full Name </span>: Calvince Owino</p>
                        <p class="m-3" id="useEmail"><span class="text-primary fw-medium">Your Email  </span>: jalikoa@gmail.com</p>
                        <p class="m-3" id="userPhone"><span class="text-primary fw-medium">Your Phone </span> : +254799311413</p>
                        <p class="m-3" id="userAbout"><span class="text-primary fw-medium">About You  </span>: I am a philathropist</p>
                        <p class="m-3" id="userWhatsapp"><span class="text-primary fw-medium">WhatsApp </span> : https://jalikoa.github.io/jalsoft</p>
                        <center>
                            <button class="btn btn-primary m-1" onclick="profSet('E')">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <button class="btn btn-danger m-1">
                                <i class="bi bi-trash"></i>
                            </button>
                        </center>
                    </div>
                    <!-- End of the card to show the profile information -->
                     <!-- Beginning of the card to edit the profile credentials -->
                     <div class="card border-0 ps-2 pe-3 d-none" id="editProfileCard">
                        <form action="" role="form">
                            <br>
                                <div class="input-group position-relative">
                                  <span class="input-group-text"><i class=" bi bi-person-fill input-group-addon"></i></span>
                                  <input type="text" name="userFirstName" class="form-control" id="yourFirstName" placeholder="First Name"  required>
                                </div>
                                <br>
                                <div class="input-group position-relative">
                                  <span class="input-group-text"><i class=" bi bi-person-fill input-group-addon"></i></span>
                                  <input type="text" name="userLastName" class="form-control" id="yourLastName" placeholder="Last Name"  required>
                                </div>
                                <br>
                                <div class="input-group position-relative">
                                  <span class="input-group-text"><i class=" bi bi-telephone-fill input-group-addon"></i></span>
                                  <input type="tel" name="userPhone" class="form-control" id="yourUserPhone" placeholder="Phone"  required>
                                </div>
                                <br>
                                <div class="input-group position-relative">
                                  <span class="input-group-text"><i class=" bi bi-person-lines-fill input-group-addon"></i></span>
                                  <input type="text" name="userBio" class="form-control" id="yourBio" placeholder="About You (Bio)"  required>
                                </div>
                                <br>
                                <div class="input-group position-relative">
                                  <span class="input-group-text"><i class=" bi bi-envelope-fill input-group-addon"></i></span>
                                  <input type="email" name="userEmail" class="form-control" id="yourUserEmail" placeholder="Your Email"  required>
                                </div>
                                <br>
                                <div class="input-group position-relative">
                                  <span class="input-group-text"><i class=" bi bi-person-fill input-group-addon"></i></span>
                                  <input type="text" name="userName" class="form-control" id="yourUsername" placeholder="username (public)"  required>
                                </div>
                                <br>
                                  <div class="input-group position-relative">
                                    <span class="input-group-text"><i class=" bi bi-link-45deg input-group-addon"></i></span>
                                    <input type="url" name="fblink" class="form-control" id="yourFbLink" placeholder="Fb or WhatsApp link"  required>
                                  </div>
                                  <br>
                                <div class="input-group position-relative">
                                  <span class="input-group-text"><i class=" bi bi-geo-alt-fill input-group-addon"></i></span>
                                  <input type="text" name="userCountry" class="form-control" id="yourCountry" placeholder="Your Country"  required>
                                </div>
                                <br>
                                <div class="input-group">
                                  <span class="input-group-text"><i class=" bi bi-lock-fill"></i></span>
                                  <input type="password" name="password" autocomplete="current-password" class="form-control" id="yourPassword" placeholder="Enter your password to complete your action" required>
                                </div>
                                <br>
                            <div class="col-12 mb-4">
                             <center> <button class="login-btn  w-100" type="submit">Save Changes</button></center>
                            </div>
                        </form>
                     </div>
                     <!-- End card edit profile -->
                      <!-- Begin card change password -->
                       <div class="card border-0 shadow d-none" id="ChangePassCard">
                            <br>
                            <form action="" role="form" class="m-3">
                                <div class="input-group mb-2">
                                    <input type="password" class="form-control" autocomplete="current-password" placeholder="Current password">
                                </div>
                                <div class="input-group mb-2">
                                    <input type="password" class="form-control" placeholder="New Password">
                                </div>
                                <div class="input-group mb-2">
                                    <input type="password" class="form-control" placeholder="Confirm New Password">
                                </div>
                                <center>
                                    <button class="login-btn"><i class="bi bi-gear"></i> Change</button>
                                </center>
                            </form>
                            <br>
                       </div>
                       <!-- End card to change password -->
                </div>
            </div>
        </div>
   <!-- Add more things here to add more functionalities to the page as expected -->
    </div>
    
</body>
<script>
    const sessid = '<?php echo $auth;?>';
</script>
<script src="../assets/js/aos.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/general.js"></script>
<script src="../assets/js/aosInit.js"></script>
<script src="../assets/js/profile_handler.js"></script>
<script src="../assets/js/jquery-3.6.0.min.js"></script>
<script src="../assets/js/sweetalert2@11.js"></script>
</html>