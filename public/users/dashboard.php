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
    <title>Dashboard home</title>
    <link rel="shortcut icon" href="../favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/animate.min.css">
    <link rel="stylesheet" href="../assets/css/aos.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/sweetalert2.min.css">
    <link rel="stylesheet" href="../assets/icons/bootstrap-icons.min.css">
<style>
        .bg-head-top {
            z-index:-1;
            position:absolute;
            top:0;
            left:0;
            width:60%;
            border-bottom-right-radius:100%;
            background:#0bf01e;
        }
    </style>
</head>
<body>
    <div class="bg-head-top" id="bgFindHeight">

    </div>
    <div class="spinner-holder d-flex" id="loaderIndicator">
        <div class="spinner-border text-primary spin-style"></div>
     </div>
    <!-- The beginning of the navbar -->
    <header class="bg-future-green">
        <div class="container-fluid d-flex dnav">
            <button class="btn btn-light m-1" id="menuButton">
                <bi class="bi-justify" id="menuIcon"></bi>
             </button>
            <a href="dashboard.html" class="logo-holder">
                <a href="./dashboard.html" class="navbar-brand"><center class="d-flex align-items-center"><img src="../favicon.png" alt="" class="rounded-corners mb-2 mt-1 header-initiative_logo"><h5 class="ms-3 p-0 fgi">Future Guardians initiative</h3></center></a>
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
                        <span class="me-1 p-0 userName">Calvince Owino</span>
                        <img class="m-0" src="../assets/img/messages-3.jpg" alt="">
                    </div>
                    <ul class="dropdown-menu text-muted">
                        <li class="dropdown-item">
                            <center><img class="m-0 prof-pic-preview" src="../assets/img/messages-3.jpg" alt="" id="prof-pic-holder"></center>
                        </li>
                        <center>
                            <p class="m-1 text-secondary p-0 m-0 fw-medium" id="name-holder">Calvince Owino</p>
                            <p class="m-1 text-secondary p-0 m-0 fw-medium" id="user-type">Admin</p>
                        </center>
                        <hr class="dropdow-divider">
                        <li class="dropdown-item">
                            <a href="" class="text-secondary"><i class="bi bi-pencil-square"></i> Edit profile</a>
                        </li>
                        <hr class="dropdow-divider">
                        <li class="dropdown-item">
                            <a href="" class="text-secondary"><i class="bi bi-gear-fill"></i> Profile settings</a>
                        </li>
                        <hr class="dropdow-divider">
                        <li class="dropdown-item">
                            <a href="" class="text-secondary"><i class="bi bi-box-arrow-right"></i>Logout</a>
                        </li>
                        <hr class="dropdow-divider">
                    </ul>
                </div>
            </div>
        </div>
    </header>
     <!-- This is the end of the header -->
     <div class="nav-sidebar">
        <ul class="navbar-container">
            <li class="navbar-item alert alert-success border-0">
                <a href="./dashboard.php?auth=<?php echo $auth;?>" class="navbar-link fw-medium text-muted"><i class="bi bi-house-door-fill"></i> Home</a>
            </li>
            <li class="navbar-item">
                <a href="./discussions.php?auth=<?php echo $auth;?>" class="navbar-link fw-medium text-secondary"><i class="bi bi-person-lines-fill"></i> Discussions</a>
            </li>
            <li class="navbar-item">
                <a href="./learn.php?auth=<?php echo $auth;?>" class="navbar-link fw-medium text-secondary"><i class="bi bi-people-fill"></i> Learn</a>
            </li>
            <li class="navbar-item">
                <a href="./activities.html" class="navbar-link fw-medium text-secondary"><i class="bi bi-tropical-storm"></i> Activities</a>
            </li>
            <li class="navbar-item">
                <a href="./donations.html" class="navbar-link fw-medium text-secondary"><img src="../assets/img/Coin Hand.png" class="nav-image" alt=""> Donations</a>
            </li>
            <li class="navbar-item">
                <a href="./queries.html" class="navbar-link fw-medium text-secondary"><i class="bi bi-chat-right-dots"></i> Queries</a>
            </li>
            <li class="navbar-item">
                <a href="./members.php?auth=<?php echo $sessid;?>" class="navbar-link fw-medium text-secondary"><i class="bi bi-people"></i> Members</a>
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
    <!-- The beginning of the sidebar in the phone -->
    <div class="nav-sidebar-phone d-none" id="phoneSidebar">
        <ul class="navbar-container">
            <li class="navbar-item alert alert-success border-0">
                <a href="./dashboard.php?auth=<?php echo $auth;?>" class="navbar-link fw-medium text-muted"><i class="bi bi-house-door-fill"></i> Home</a>
            </li>
            <li class="navbar-item">
                <a href="./discussions.php?auth=<?php echo $auth;?>" class="navbar-link fw-medium text-secondary"><i class="bi bi-person-lines-fill"></i> Discussions</a>
            </li>
            <li class="navbar-item">
                <a href="./learn.php?auth=<?php echo $auth;?>" class="navbar-link fw-medium text-secondary"><i class="bi bi-people-fill"></i> Users</a>
            </li>
            <li class="navbar-item">
                <a href="./activities.html" class="navbar-link fw-medium text-secondary"><i class="bi bi-tropical-storm"></i> Activities</a>
            </li>
            <li class="navbar-item">
                <a href="./donations.html" class="navbar-link fw-medium text-secondary"><img src="../assets/img/Coin Hand.png" class="nav-image" alt=""> Donations</a>
            </li>
            <li class="navbar-item">
                <a href="./queries.html" class="navbar-link fw-medium text-secondary"><i class="bi bi-chat-right-dots"></i> Queries</a>
            </li>
            <li class="navbar-item">
                <a href="./members.php?auth=<?php echo $sessid;?>" class="navbar-link fw-medium text-secondary"><i class="bi bi-people"></i> Members</a>
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
     <!-- The beginning of the main body -->
      <div class="main-body" data-aos="fade-left" data-aos-delay="500" >
      <div class="row mt-3">
            <center>
                <h3 class="title-green">Sustainable Solutions for a Greener Future</h3>
                <h4 class="text-success">Protect Our Planet, Together</h4>
            </center>
        </div>
        <div data-aos="fade-left" data-aos-delay="500" class="row">
            <h5 data-aos="fade-right" data-aos-delay="500" class="title-green fw-medium m-2"><i>Our programs</i></h5>
            <div class="col m-2">
                <div class="card border-0 p-2">
                    <div class=" bg-light d-flex">
                        <img src="../assets/img/Teacher.png" alt="">
                        <h5 class="title-green fw-medium m-2"><i>Education</i></h5>
                    </div>
                    <p class="descr-text">
                        Learn importance of conserving environment and how
                    </p>
                    <button class="mt-3 m-b-2 join-prog-bt">join <i class="bi bi-arrow-right"></i></button>
                </div>
            </div>
            <div data-aos="zoom-in" data-aos-delay="500" class="col m-2">
                <div class="card border-0 p-2">
                    <div class=" bg-light d-flex">
                        <img src="../assets/img/People.png" alt="">
                        <h6 class="title-green fw-medium m-2"><i>Community participation</i></h6>
                    </div>
                    <p class="descr-text">
                        Participate in community development
                    </p>
                    <button class="mt-3 m-b-2 join-prog-bt">join <i class="bi bi-arrow-right"></i></button>
                </div>
            </div>
            <div data-aos="zoom-out" data-aos-delay="500" class="col m-2">
                <div class="card border-0 p-2">
                    <div class=" bg-light d-flex">
                        <img src="../assets/img/Coin Hand.png" alt="">
                        <h5 class="title-green fw-medium m-2"><i>Support</i></h5>
                    </div>
                    <p class="descr-text">
                        We support desperate hearts and make them feel right
                    </p>
                    <button class="mt-3 m-b-2 join-prog-bt">join <i class="bi bi-arrow-right"></i></button>
                </div>
            </div>
            <div data-aos="fade-left" data-aos-delay="500" class="col m-2">
                <div class="card border-0 p-2">
                    <div class=" bg-light d-flex">
                        <img src="../assets/img/Map_pin.png" alt="">
                        <h6 class="title-green fw-medium m-2"><i>Carbon footprinting</i></h6>
                    </div>
                    <p class="descr-text">
                        We help you trace carbon in your land seamlessly
                    </p>
                    <button class="mt-3 m-b-2 join-prog-bt">join <i class="bi bi-arrow-right"></i></button>
                </div>
            </div>


        </div>
        <!-- Begiinning of thr footer-->
    <!-- THE BEGINNING OF THE FOOTER -->
    <footer data-aos="fade-out" data-aos-delay="500" class="p-5 w-100">
        <div class="row">
            <div class="col col-12 col-md-4">
                <h4><i class="text-info">About us</i></h4>
                <a href="" class="text-light text-decoration-none">Our mission</a><br>
                <a href="" class="text-light text-decoration-none">Team</a><br>
                <a href="" class="text-light text-decoration-none">Partners</a><br>
            </div>
            <div class="col col-12 col-md-4">
                <h4><i class="text-info">Get Involved</i></h4>
                <a href="" class="text-light text-decoration-none">Volunteer Opportunities</a><br>
                <a href="" class="text-light text-decoration-none">Donate</a><br>
                <a href="" class="text-light text-decoration-none">Sign Petitions</a><br>
            </div>
            <div class="col col-12 col-md-4">
                <h4><i class="text-info">Learn</i></h4>
                <a href="" class="text-light text-decoration-none">Environmental issues</a><br>
                <a href="" class="text-light text-decoration-none">Climate change</a><br>
                <a href="" class="text-light text-decoration-none">Pollution</a><br>
                <a href="" class="text-light text-decoration-none">Biodiversity Loss</a><br>
                <a href="" class="text-light text-decoration-none">Resource Depletion</a><br>
                <a href="" class="text-light text-decoration-none">Sustainable Living</a><br>
                <a href="" class="text-light text-decoration-none">Reduce, Reuse ,Recycle (3R)</a><br>
                <a href="" class="text-light text-decoration-none">Energy Conservation</a><br>
                <a href="" class="text-light text-decoration-none">Sustainable Food</a><br>
                <a href="" class="text-light text-decoration-none">Eco-Friendly Transportation</a><br>
            </div>
        </div>
        <div class="row flex-wrap">
            <div class="col col-12 col-md-8 col-lg-4 " data-aos="fade-up" data-aos-delay="600" id="contact">
                <h3 class="text-warning"><i>Get in touch</i></h3>
                <form action="" role="form" id="contactUsForm">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="username" placeholder="name" required>
                        <label for="username">Your name</label>
                    </div>
                    <div class="form-floating mt-2">
                        <input type="email" class="form-control" id="useremail" placeholder="Your Email" required>
                        <label for="useremail">Your Email</label>
                    </div>
                    <div class="form-floating mt-2">
                        <input type="text" class="form-control" id="usercountry" placeholder="Your Country" required>
                        <label for="usercountry">Your Country</label>
                    </div>
                    <div class="form-floating mt-1">
                        <textarea name="" id="userText" class="form-control" placeholder="Your text here*" style="height:200px;" required></textarea>
                        <label for="userText">Your text here*</label>
                    </div>
                    <div class="form-group p-3">
                        <button class="btn btn-warning w-100">Submit</button>
                    </div>
                </form>
            </div>
            <div class="col col-12 col-lg-5 ms-1 justify-self-center" data-aos="fade-up" data-aos-delay="700" >
                <h3 class="text-info">
                    <i>Quick Links</i>
                </h3>
                <p class="bi bi-phone text-light"> +25479931413</p>
                <p class="bi bi-envelope text-light"> fgi@futureguardians.com</p>
                <p class="bi bi-facebook text-light"> Future Guardians</p>
                <p class="bi bi-twitter text-light"> Future Guardians</p>
                <p class="bi bi-whatsapp text-light"> +25479931413</p>
                <p class="bi bi-geo-alt text-light"> 99-40223 Kadongo</p>
            </div>
            <center>
                <p class="text-info mt-3">
                    &copy; Future guardins initiative @jalsoft
                </p>
            </center>
        </div>
    </footer>
</div>
    <!-- The end of the main body -->
</body>
<script src="../assets/js/aos.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/jquery-3.6.0.min.js"></script>
<script src="../assets/js/sweetalert2@11.js"></script>
<script src="../assets/js/aosInit.js"></script>
<script src="../assets/js/general.js"></script>
<script>
    var sessid = '<?php echo $auth?>';
    var userName,userEmail,userCountry,userQuery,bgFindHeight;
    userName = document.getElementById('username');
    userEmail = document.getElementById('useremail');
    userCountry = document.getElementById('usercountry');
    userQuery = document.getElementById('userText');
    bgFindHeight = document.getElementById('bgFindHeight');
    window.addEventListener('DOMContentLoaded',()=>{
        let h = window.innerWidth * 0.5;
        if(h<450){
            h= 450
        }
        bgFindHeight.style.height = h+'px';
    });
    document.getElementById('contactUsForm').addEventListener('submit',(e)=>{
        e.preventDefault();
        xhr = checkXml();
        xhr.open('POST',route,true);
        xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        xhr.onload = ()=>{
            console.log(xhr.responseText);
            var response;
        try {response = JSON.parse(xhr.responseText)} catch (e){
            Swal.fire(
              'Error',
              `Sorry an Uknown exeption occurred`,
              'error'
            )
        }
        if(JSON.parse(xhr.responseText)){
          if(response.success){
                        Swal.fire(
                        'Received',
                        `${response.message}`,
                        'success'
                    )} else {
                        Swal.fire(
                        'Sorry',
                        `${response.message}`,
                        'error'
                    );
        }
        }
        }
        const data = `contactus=${encodeURIComponent('true')}&useremail=${encodeURIComponent(userEmail.value)}&username=${encodeURIComponent(userName.value)}&usercountry=${encodeURIComponent(userCountry.value)}&usertext=${encodeURIComponent(userQuery.value)}`;
        xhr.send(data);
    });
      
    function checkXml(){
        if(window.XMLHttpRequest){
        return new XMLHttpRequest();
      } else if (window.ActiveXObject) {
          return new ActiveXObject();
      }
    }
    function logout(){
        lreq = checkXml();
        lreq.open("POST",route,true);
        lreq.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        lreq.onload = ()=>{
            console.log(lreq.responseText);
            try {response = JSON.parse(lreq.responseText)} catch (e){
            Swal.fire(
              'Error',
              `Sorry an Uncaught exception occurred`,
              'error'
            )
        }
        if(JSON.parse(lreq.responseText)){
          if(response.success){
                        Swal.fire(
                        'Logged Out',
                        `${response.message}`,
                        'success'
                    )
          setTimeout(()=>{location.href='../login.html'},1000);
                }else {
                        Swal.fire(
                        'Sorry',
                        `${response.message}`,
                        'error'
                    );
        }
        }
        }
        const data = `logout=${encodeURIComponent('true')}&sessid=${encodeURIComponent('<?php echo $auth?>')}`;
        lreq.send(data);
    }
    var menuButton,menuIcon,phoneSidebar;
    menuButton = byId('menuButton');
    menuIcon = byId('menuIcon');
    phoneSidebar = byId('phoneSidebar');
    menuButton.addEventListener('click',()=>{
        if(menuIcon.classList.contains('bi-justify')){
            menuIcon.classList.remove('bi-justify');
            menuIcon.classList.add('bi-x-lg');
            phoneSidebar.classList.remove('d-none');
            phoneSidebar.classList.add('d-block');
        }
         else if (menuIcon.classList.contains('bi-x-lg')){
            menuIcon.classList.remove('bi-x-lg');
            menuIcon.classList.add('bi-justify');
            phoneSidebar.classList.remove('d-block');
            phoneSidebar.classList.add('d-none');
        }
    })
</script>
<script src="../assets/js/update_online.js"></script>
</html>