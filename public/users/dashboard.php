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
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/sweetalert2.min.css">
    <link rel="stylesheet" href="../assets/icons/bootstrap-icons.min.css">
    <style>
        body {
            background-color: #b3f3c123;
            /* font-family: Arial; */
        }
        .initiative_logo {
            width: 200px;
            height: 200px;
        }
        .future-green{
            color:#056D1B;
        }
        .bg-future-green {
            background: #4FA40F;
            color:#fff;
        }
        .header-initiative_logo {
            width: 50px;
            height: 50px;
        }
        .title-green {
            color:#4FA40F;
        }
        .fw-medium {
            font-weight: 400;
        }
        .join-prog-bt {
            background:#2F6704;
            color:#fff;
            border-radius:10px;
            padding:10px 5px;
            border:none;
            width: 80px;
        }
    </style>
</head>
<body>
    <!-- Beginning of the navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-future-green">
        <div class="container-fluid">
            <a href="index.html" class="navbar-brand">
                <a href="./home.html" class="navbar-brand"><center class="d-flex align-items-center"><img src="../favicon.png" alt="" class="rounded-corners mb-2 mt-1 header-initiative_logo"><h5 class="ms-3 p-0">Future Guardians initiative</h3></center></a>
            </a>
            <button data-bs-toggle="collapse" data-bs-target="#navBar" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse ms-5" id="navBar">
                <ul class="navbar-nav">
                    <li class="navbar-item">
                        <a href="<?php echo "dashboard.php?auth=".$auth?>" class="nav-link active">Home</a>
                    </li>
                    <li class="navbar-item">
                        <a href="<?php echo "learn.php?auth=".$auth?>" class="nav-link">Learn</a>
                    </li>
                    <li class="navbar-item">
                        <a href="#contact" class="nav-link">Contact us</a>
                    </li>
                    <li class="navbar-item">
                        <a href="donate.html" class="nav-link">Support</a>
                    </li>
                    <li class="navbar-item" onclick="logout()">
                        <a href="#" class="nav-link">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
   
    <!-- The end of the navbar -->
     <!-- The beginning of the main body -->
      <div class="container">
        <div data-aos="fade-left" data-aos-delay="500" class="row mt-2 mb-2">
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
      </div>
      <!-- The end of the main body -->
<style>
        footer {
            background-color: #162709da;
        }
    </style>
    <!-- THE BEGINNING OF THE FOOTER -->
    <footer data-aos="fade-out" data-aos-delay="500" class="p-5 w-100">
        <div class="container">
            <div class="row flex-wrap">
                <div class="col col-md-8 col-lg-4" id="contact">
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
                <div class="col col-sm-11 col-lg-5 ms-1 justify-self-center">
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
            </div>
        </div>
    </footer>
</body>
<script>
    function aosInit(){
        AOS.init({
            delay:600,
            ease:'ease-in-out',
            mirror:false,
            once:true
        });
    }
    var userName,userEmail,userCountry,userQuery;
    userName = document.getElementById('username');
    userEmail = document.getElementById('useremail');
    userCountry = document.getElementById('usercountry');
    userQuery = document.getElementById('userText');
    window.addEventListener('load',aosInit);
    document.getElementById('contactUsForm').addEventListener('submit',(e)=>{
        e.preventDefault();
        xhr = checkXml();
        xhr.open('POST','http://localhost/fgi/public/index.php',true);
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
        lreq.open("POST",'http://localhost/fgi/public/index.php',true);
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
    window.onload = updateOnline();
    function updateOnline(){
        const uoxhr = checkXml();
        uoxhr.open("POST",'http://localhost/fgi/public/index.php',true);
        uoxhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        uoxhr.onload = ()=>{
            console.log(uoxhr.responseText);
            const response = JSON.parse(uoxhr.responseText);
            if(!response.success){
                swal.fire(
                    'Sorry',
                    `${response.message}`,
                    'error'
                );
            }
            window.setTimeout(() => {
                updateOnline();
            }, 2000);
        }
        const data = `updateonline=${encodeURIComponent('true')}&sessid=${encodeURIComponent('<?php echo $auth?>')}`;
        uoxhr.send(data);
    }
</script>
<script src="../assets/js/aos.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/jquery-3.6.0.min.js"></script>
<script src="../assets/js/sweetalert2@11.js"></script>
</html>