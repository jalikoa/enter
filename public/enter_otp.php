<?php
if(isset($_GET["uid"])){
    $uid = htmlspecialchars(trim(stripslashes($_GET["uid"])));
} else {
    header("location:login.html");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to future guardians initiative</title>
    <link rel="shortcut icon" href="./favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="./assets/css/animate.min.css">
    <link rel="stylesheet" href="./assets/css/aos.css">
    <link rel="stylesheet" href="./assets/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="./assets/css/sweetalert2.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/icons/bootstrap-icons.min.css">
</head>

<body>
    <!-- this is the begginning of the main body -->
    <div class="container row">
        <div class="row d-flex justify-content-center">
            <div class="col col-lg-6 col-xl-5 mb-5"  data-aos="zoom-out" data-aos-delay="500">
                <div class="card shadow h-100 border-0 mt-4 ms-3">
                    <center><img src="./favicon.png" alt="" class="rounded-corners mt-5 initiative_logo" data-aos="zoom-in" data-aos-delay="500"></center>
                   <div class="d-flex justify-content-center flex-column align-items-center">
                    <h3 class="m-1 future-green fw-bold">Enter OTP</h3>
                   </div>
                   <div class="card mb-3 border-0">

                    <div class="card-body">
    
                      <div class="pt-4 pb-2">
                        <p class="text-center">Please check on the inbox of your email we have sent an <b>OTP</b> enter it below</p>
                      </div>
    
                      <form class="row g-3" id="otpForm" data-aos="fade-left" data-aos-delay="500">
    
                        <div class="col-12">
                          <div class="input-group position-relative">
                            <span class="input-group-text"><i class=" bi bi-code input-group-addon"></i></span>
                            <input type="text" name="userOTP" class="form-control" id="yourUserOTP" placeholder="Enter OTP"  required>
                          </div>
                        </div>
                        <div class="col-12">
                         <center> <button class="login-btn" type="submit">Verify OTP</button></center>
                        </div>
                        <div class="col-12" data-aos="fade-out" data-aos-delay="500">
                          <p class="small mb-0">Or <a href="login.html" class="deco-none purple fw-medium">Login?</a></p>
                        </div>
                      </form>
    
                    </div>
            </div>
        </div>
    </div>
</body>
<script src="./assets/js/general.js"></script>
<script>
    const otp = document.getElementById('yourUserOTP');
    function aosInit(){
        AOS.init({
            delay:600,
            ease:'ease-in-out',
            mirror:false,
            once:true
        });
    }
    window.addEventListener('load',aosInit);
    document.getElementById('otpForm').addEventListener('submit',(e)=>{
        e.preventDefault();
        const xhr = checkXml();
        xhr.open('POST',route,true);
        xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        xhr.onload = ()=>{
            console.log(xhr.responseText);
            var response;
        try {response = JSON.parse(xhr.responseText)} catch (e){
            Swal.fire(
              'Error',
              `Sorry an Uncaught exception occurred`,
              'error'
            )
        }
        if(JSON.parse(xhr.responseText)){
          if(response.success){
                        Swal.fire(
                        'Verified',
                        `${response.message}`,
                        'success'
                    )
          setTimeout(()=>{location.href=`./login.html`},1000);
                }else {
                        Swal.fire(
                        'Sorry',
                        `${response.message}`,
                        'error'
                    );
        }
        }
        }
        const data = `enter_otp=${encodeURIComponent('true')}&userid=${encodeURIComponent('<?php echo $uid ?>')}&userotp=${encodeURIComponent(otp.value)}&`;
        xhr.send(data);
        console.log(data);

    });
    function checkXml(){
      if(window.XMLHttpRequest){
        return new XMLHttpRequest();
      } else if (window.ActiveXObject) {
          return new ActiveXObject();
      }
    }
</script>
<script src="./assets/js/aos.js"></script>
<script src="./assets/js/bootstrap.bundle.min.js"></script>
<script src="./assets/js/jquery-3.6.0.min.js"></script>
<script src="./assets/js/sweetalert2@11.js"></script>
</html>