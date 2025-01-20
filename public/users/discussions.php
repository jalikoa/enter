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
    <title>Welcome to future guardians initiative</title>
    <link rel="shortcut icon" href="../favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/animate.min.css">
    <link rel="stylesheet" href="../assets/css/aos.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/sweetalert2.min.css">
    <link rel="stylesheet" href="../assets/icons/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
    </style>
</head>

<body>
    <!-- This is the beginning of the spinner body it will spin as the page loads info -->
    <div class="spinner-holder d-flex" id="loaderIndicator">
        <div class="spinner-border text-primary spin-style"></div>
     </div>
     <!-- This is the beginning if the div for the edit message modal -->
     <button class="d-none" id="jalikoaEditBtn" data-bs-toggle="modal" data-bs-target="#EditMessageModal"><bi class="bi-plus-circle"></bi></button>
      <!-- Modal for adding or editing member -->
      <div class="modal fade" id="EditMessageModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <center><h5 class="modal-title text-success" id="whatToDo">Edit Message</h5></center>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="input-group">
                    <input type="text" id="edInp" placeholder="New message here" required class="form-control">
                    <button class="btn btn-secondary"><i class="bi bi-send"></i></button>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" id="closeFormModal" class="btn btn-secondary d-none" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div><!-- End Modal add or edit-->
    <!-- The beginning of the navbar -->
    <header class="bg-future-green">
        <div class="container-fluid d-flex dnav">
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
    <div class="main-body">

    <style>
    </style>
    <div class="row">
       <h4 class="m-2 text-secondary">
        Dasboard/discussions
       </h4>
       <div class="discussions-chat-holder">
            <div class="discussions-holder">
                <!-- Here the list of all the discussions will be listed here -->
                 <!-- The beginning of the discussion card -->
                <div class="discussion-holder d-flex">
                    <div class="dis-img-holder">
                        <div class="dropdown">
                            <img src="../assets/img/default.png" class="cursor-pointer" data-bs-toggle="dropdown" alt="">
                            <ul class="dropdown-menu">
                                <center>
                                    <img src="../assets/img/default.png" alt="">
                                </center>
                                <li class="dropdown-item">
                                    <center>
                                        <h5 class="fw-medium text-secondary">
                                        Jalikoa Michigan
                                        </h5>
                                    </center>
                                    <center>
                                        <h6 class="fw-medium text-secondary">
                                            Member
                                        </h6>
                                    </center>
                                </li>
                                <hr class="p-0 m-0 dropdown-divider">
                                <li class="dropdown-item">
                                    <div class="form-check form-switch">
                                        <label for="archDisc">Archive discussion</label>
                                        <input type="checkbox" class="form-check-input" id="archDisc">
                                    </div>
                                </li>
                                <hr class="p-0 m-0 dropdown-divider">
                                <li class="dropdown-item">
                                    <a href="#" class="dropdown-link text-dark"><i class="bi bi-box-arrow-left text-secondary"></i>&nbsp; Exit discussion</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="discussion-meta-information ms-1 position-relative">
                        <span class="rounded-pill badge bg-primary text-small position-absolute top-0 end-0">100+ new messages</span>
                        <div class="discussion-name-holder mt-4">
                            <h6 class="fw-medium h-100 text-secondary ms-1 overflow-hidden">
                                Jalikoa Michigan overflow-hidden overflow-hidden
                            </h6>
                        </div>
                        <div class="last-message-holder">
                            <p class="text-small text-muted h-100 overflow-hidden">
                                Now please it is like I am stranded please can some one tell me on how I can make the best of me please it is 
                            </p>
                        </div>
                    </div>
                </div>
                <!-- End discussion card -->
                 <!-- The beginning of the discussion card -->
                <div class="discussion-holder d-flex">
                    <div class="dis-img-holder">
                        <div class="dropdown">
                            <img src="../assets/img/default.png" class="cursor-pointer" data-bs-toggle="dropdown" alt="">
                            <ul class="dropdown-menu">
                                <center>
                                    <img src="../assets/img/default.png" alt="">
                                </center>
                                <li class="dropdown-item">
                                    <center>
                                        <h5 class="fw-medium text-secondary">
                                        Jalikoa Michigan
                                        </h5>
                                    </center>
                                    <center>
                                        <h6 class="fw-medium text-secondary">
                                            Member
                                        </h6>
                                    </center>
                                </li>
                                <hr class="p-0 m-0 dropdown-divider">
                                <li class="dropdown-item">
                                    <div class="form-check form-switch">
                                        <label for="archDisc">Archive discussion</label>
                                        <input type="checkbox" class="form-check-input" id="archDisc">
                                    </div>
                                </li>
                                <hr class="p-0 m-0 dropdown-divider">
                                <li class="dropdown-item">
                                    <a href="#" class="dropdown-link text-dark"><i class="bi bi-box-arrow-left text-secondary"></i>&nbsp; Exit discussion</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="discussion-meta-information ms-1 position-relative">
                        <span class="rounded-pill badge bg-primary text-small position-absolute top-0 end-0">100+ new messages</span>
                        <div class="discussion-name-holder mt-4">
                            <h6 class="fw-medium h-100 text-secondary ms-1 overflow-hidden">
                                Jalikoa Michigan overflow-hidden overflow-hidden
                            </h6>
                        </div>
                        <div class="last-message-holder">
                            <p class="text-small text-muted h-100 overflow-hidden">
                                Now please it is like I am stranded please can some one tell me on how I can make the best of me please it is 
                            </p>
                        </div>
                    </div>
                </div>
                <!-- End discussion card -->
                 <!-- The beginning of the discussion card -->
                <div class="discussion-holder d-flex">
                    <div class="dis-img-holder">
                        <div class="dropdown">
                            <img src="../assets/img/default.png" class="cursor-pointer" data-bs-toggle="dropdown" alt="">
                            <ul class="dropdown-menu">
                                <center>
                                    <img src="../assets/img/default.png" alt="">
                                </center>
                                <li class="dropdown-item">
                                    <center>
                                        <h5 class="fw-medium text-secondary">
                                        Jalikoa Michigan
                                        </h5>
                                    </center>
                                    <center>
                                        <h6 class="fw-medium text-secondary">
                                            Member
                                        </h6>
                                    </center>
                                </li>
                                <hr class="p-0 m-0 dropdown-divider">
                                <li class="dropdown-item">
                                    <div class="form-check form-switch">
                                        <label for="archDisc">Archive discussion</label>
                                        <input type="checkbox" class="form-check-input" id="archDisc">
                                    </div>
                                </li>
                                <hr class="p-0 m-0 dropdown-divider">
                                <li class="dropdown-item">
                                    <a href="#" class="dropdown-link text-dark"><i class="bi bi-box-arrow-left text-secondary"></i>&nbsp; Exit discussion</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="discussion-meta-information ms-1 position-relative">
                        <span class="rounded-pill badge bg-primary text-small position-absolute top-0 end-0">100+ new messages</span>
                        <div class="discussion-name-holder mt-4">
                            <h6 class="fw-medium h-100 text-secondary ms-1 overflow-hidden">
                                Jalikoa Michigan overflow-hidden overflow-hidden
                            </h6>
                        </div>
                        <div class="last-message-holder">
                            <p class="text-small text-muted h-100 overflow-hidden">
                                Now please it is like I am stranded please can some one tell me on how I can make the best of me please it is 
                            </p>
                        </div>
                    </div>
                </div>
                <!-- End discussion card -->
                 <!-- The beginning of the discussion card -->
                <div class="discussion-holder d-flex">
                    <div class="dis-img-holder">
                        <div class="dropdown">
                            <img src="../assets/img/default.png" class="cursor-pointer" data-bs-toggle="dropdown" alt="">
                            <ul class="dropdown-menu">
                                <center>
                                    <img src="../assets/img/default.png" alt="">
                                </center>
                                <li class="dropdown-item">
                                    <center>
                                        <h5 class="fw-medium text-secondary">
                                        Jalikoa Michigan
                                        </h5>
                                    </center>
                                    <center>
                                        <h6 class="fw-medium text-secondary">
                                            Member
                                        </h6>
                                    </center>
                                </li>
                                <hr class="p-0 m-0 dropdown-divider">
                                <li class="dropdown-item">
                                    <div class="form-check form-switch">
                                        <label for="archDisc">Archive discussion</label>
                                        <input type="checkbox" class="form-check-input" id="archDisc">
                                    </div>
                                </li>
                                <hr class="p-0 m-0 dropdown-divider">
                                <li class="dropdown-item">
                                    <a href="#" class="dropdown-link text-dark"><i class="bi bi-box-arrow-left text-secondary"></i>&nbsp; Exit discussion</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="discussion-meta-information ms-1 position-relative">
                        <span class="rounded-pill badge bg-primary text-small position-absolute top-0 end-0">100+ new messages</span>
                        <div class="discussion-name-holder mt-4">
                            <h6 class="fw-medium h-100 text-secondary ms-1 overflow-hidden">
                                Jalikoa Michigan overflow-hidden overflow-hidden
                            </h6>
                        </div>
                        <div class="last-message-holder">
                            <p class="text-small text-muted h-100 overflow-hidden">
                                Now please it is like I am stranded please can some one tell me on how I can make the best of me please it is 
                            </p>
                        </div>
                    </div>
                </div>
                <!-- End discussion card -->
            </div>
            <!-- ====== Div no discussion selected start ========== -->
            <div class="no-chat-selected d-none">
                <!-- Shown when there is no chat that has been selected -->
                <div class="no-chat-holder">
                    <center><img src="../assets/img/comment.svg" alt="no-chat"></center>
                    <center>
                        <p class="text-info">
                            No discussion selected.If you select a discussion the messages will appear here 
                        </p>
                    </center>
                </div>
            </div>
            <!-- ====== Div no discussion selected end ========== -->
            <!-- ====== Div discussion selected start ========== -->
             <style>
                
             </style>
             <div class="dis-chat-selected d-flex flex-column">
                <div class="discussion-meta-information d-flex">
                    <!-- ========Begin of the discussion image and dropdown ===========-->
                    <div class="dropdown">
                        <img src="../assets/img/messages-1.jpg" class="dissImage" data-bs-toggle="dropdown" alt="">
                        <ul class="dropdown-menu">
                            <center>
                                <img src="../assets/img/messages-1.jpg" class="w-100" alt="">
                            </center>
                            <li class="dropdown-item">
                                <center>
                                    <h5 class="fw-medium text-secondary h-30 overflow-hidden">
                                    Jalikoa Michigan
                                    </h5>
                                </center>
                                <center>
                                    <h6 class="fw-medium text-secondary">
                                        Member
                                    </h6>
                                </center>
                            </li>
                            <hr class="p-0 m-0 dropdown-divider">
                            <li class="dropdown-item">
                                <div class="form-check form-switch">
                                    <label for="archDisc">Archive discussion</label>
                                    <input type="checkbox" class="form-check-input" id="archDisc">
                                </div>
                            </li>
                            <hr class="p-0 m-0 dropdown-divider">
                            <li class="dropdown-item">
                                <a href="#" class="dropdown-link text-dark"><i class="bi bi-box-arrow-left text-secondary"></i>&nbsp; Exit discussion</a>
                            </li>
                        </ul>
                    </div>
                    <!--========= End discussion image and dropdown ===========-->
                    <div class="discussion-members-name h-60 overflow-hidden">
                        <h5 class="text-muted fw-medium ms-0 mb-0 mt-0 me-0 h-30 overflow-hidden">Jalikoa Michigan</h5>
                        <span class="text-small text-secondary">Hans Jalikoa <span class="text-success"><i>typing</i></span>,</span>
                        <span class="text-small text-secondary">Hans Jalikoa <span class="text-success"><i>typing</i></span>,</span>
                        <span class="text-small text-secondary">Hans Jalikoa <span class="text-success"><i>typing</i></span>,</span>
                        <span class="text-small text-secondary">Hans Jalikoa <span class="text-success"><i>typing</i></span>,</span>
                        
                    </div>
                    <div class="discussion-action d-flex">
                        <button type="button" class="btn m-1 btn-secondary bi bi-telephone-plus-fill" data-bs-toggle="modal" data-bs-target="#audioacallModal">
                        </button>
                        <div class="modal fade" id="audioacallModal" tabindex="-1">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title align-center">Audio Call</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                  <i class="ico-size bi bi-telephone-forward-fill ms-4"></i>
                                  <span class="spinner-grow spinner-grow-sm tex-primary ms-1"></span>
                                  <span class="spinner-grow spinner-grow-sm text-success ms-1"></span>
                                  <span class="spinner-grow spinner-grow-sm text-info ms-1"></span>
                                  <span class="spinner-grow spinner-grow-sm text-warning ms-1"></span>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger bi bi-telephone-x-fill" data-bs-dismiss="modal"> Hang' up</button>
                                <button type="button" class="btn btn-primary bi bi-telephone-outbound ms-5"> Add call</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- End audio chat section -->
                        <!-- Start video button  -->
                        <button type="button" class="btn btn-secondary m-1 bi bi-camera-video" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                          </button>
                          <div class="modal fade" id="verticalycentered" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title align-center">Video Call</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img src="../assets/img/profile-img.jpg" class="rounded-circle w-100" alt="">
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-danger bi bi-telephone-x-fill" data-bs-dismiss="modal"></button>
                                  <button type="button" class="btn btn-primary bi bi-telephone-outbound ms-5"></button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- Start chat settings section -->
                          <button class="btn btn-secondary m-1 bi bi-gear" data-bs-toggle="dropdown"></button>
                          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow p-3">
                            <li class="dropdown-header">
                                <h5 class="dropdown-title text-secondary text-center">
                                    Chat settings
                                </h5>
                            </li>
                            <div class="form-check form-switch">
                                <label for="showActive">Show active</label>
                                <input type="checkbox" class="form-check-input" id="showActive" checked>
                            </div>
                            <div class="form-check form-switch">
                                <label for="showTyping">Show typing</label>
                                <input type="checkbox" class="form-check-input" id="showTyping" checked>
                            </div>
                            <div class="form-check form-switch">
                                <label for="discArchive">Archive discussion</label>
                                <input type="checkbox" class="form-check-input" id="discArchive">
                            </div>
                          </ul>
                    </div>
                </div>
                <div class="dis-messages-box" id="messagesHolder">
                    <!--============= The messages will apear here after selecting a discussion ========================-->
                </div>
                <div class="dis-action-box">
                    <form action="" id="messagesForm">
                        <div class="input-group">
                            <button type="button" class="h-60 bi bi-paperclip btn btn-light"></button>
                            <button type="button" class="h-60 bi bi-emoji-frown btn btn-light"></button>
                            <textarea type="text" class="form-control" required id="messageBox"></textarea>
                            <button class="h-60 bi bi bi-send btn btn-secondary"></button>
                        </div>
                    </form>
                </div>
             </div>
            <!-- ====== Div discussion selected end ========== -->
       </div>
    </div>
   <button class="btn btn-primary float-rbt-end" data-bs-toggle="modal" data-bs-target="#addNewDiscussions"><bi class="bi-plus-circle"></bi></button>
      <!-- Modal for adding or editing member -->
      <div class="modal fade" id="addNewDiscussions" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <center><h5 class="modal-title text-success" id="activityToDo">Add new Discussion </h5></center>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="addDiscussionForm">
                    <div class="form-group mt-1">
                        <label for="discName">Name:</label>
                        <input type="text" id="discName" class="form-control" placeholder="Name" required>
                    </div>
                    <div class="form-group mt-1">
                        <label for="discImage">Upload Discussion Image:</label>
                        <input type="file" id="discImage" class="d-none"  required>
                    </div>
                    <div class="form-group mt-1">
                        <label for="discAbout">About:</label>
                        <textarea type="text" id="discAbout" class="form-control" rows="10" cols="10"  placeholder="About" required></textarea>
                    </div>
                    <div class="form-group mt-1">
                        <label for="discType">Type:</label>
                        <select name="discType" id="discType" class="form-control" required>
                            <option value="">Type</option>
                            <option value="0">Private</option>
                            <option value="1">Public</option>
                        </select>
                    </div>
                    <div class="form-group mt-1">
                        <label for="whoMess">Who can message:</label>
                        <select name="whoMess" id="whoMess" class="form-control" required>
                            <option value="">Who can Send message</option>
                            <option value="0">Admin</option>
                            <option value="1">Everyone</option>
                        </select>
                    </div>
                    <div class="form-group m-2">
                        <button type="submit" class="btn btn-primary w-100">Save</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" id="closeFormModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div><!-- End Modal add or edit-->
 <!-- THE BEGINNING OF THE FOOTER -->
 <footer data-aos="fade-in" data-aos-delay="600" class="p-5 w-100">
        <div class="row">
            <!--  -->
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
        </div>
        <div class="row">
            <div class="col w-100">
                <h5 class="text-success">
                    Meet Our team
                </h5>
                <br>
                <div class="team-holder d-flex">
                    <div class="footer-img-holder">
                        <img src="../assets/img/jalikoa.jpg" alt="">
                        <p class="footer-team-name text-light m-0 p-0"><center class="text-light">Michael Mboya</center></p>
                        <h6 class="fw-medium text-light m-0 p-0 ">
                            <center>Co-founder</center>
                        </h6>
                    </div>
                    <div class="footer-img-holder">
                        <img src="../assets/img/jaliko2.jpg" alt="">
                        <p class="footer-team-name text-light m-0 p-0"><center class="text-light">Calvince Owino</center></p>
                        <h6 class="fw-medium text-light m-0 p-0 ">
                            <center>Co-founder</center>
                        </h6>
                    </div>
                    <div class="footer-img-holder">
                        <img src="../assets/img/jalikoa.jpg" alt="">
                        <p class="footer-team-name text-light m-0 p-0"><center class="text-light">Michael Mboya</center></p>
                        <h6 class="fw-medium text-light m-0 p-0 ">
                            <center>Co-founder</center>
                        </h6>
                    </div>
                    <div class="footer-img-holder">
                        <img src="../assets/img/jaliko2.jpg" alt="">
                        <p class="footer-team-name text-light m-0 p-0"><center class="text-light">Calvince Owino</center></p>
                        <h6 class="fw-medium text-light m-0 p-0 ">
                            <center>Co-founder</center>
                        </h6>
                    </div>
                    <div class="footer-img-holder">
                        <img src="../assets/img/jalikoa.jpg" alt="">
                        <p class="footer-team-name text-light m-0 p-0"><center class="text-light">Michael Mboya</center></p>
                        <h6 class="fw-medium text-light m-0 p-0 ">
                            <center>Co-founder</center>
                        </h6>
                    </div>
                    <div class="footer-img-holder">
                        <img src="../assets/img/jaliko2.jpg" alt="">
                        <p class="footer-team-name text-light m-0 p-0"><center class="text-light">Calvince Owino</center></p>
                        <h6 class="fw-medium text-light m-0 p-0 ">
                            <center>Co-founder</center>
                        </h6>
                    </div>
                </div>
                <center>
                    <p class="text-info mt-3">
                        &copy; Future guardins initiative @jalsoft
                    </p>
                </center>
            </div>
        </div>
    </div>
</footer>
</body>
<!-- This is the audio to be played for the new messages -->
<audio src="../assets/music/error-8-206492.mp3" class="d-none" id="newMessAudio"></audio>
<script>
</script>
<script>
    const sessid = '<?php echo $auth;?>';
</script>
<script src="../assets/js/aos.js"></script>
<script src="../assets/js/aosInit.js"></script>
<script src="../assets/js/general.js"></script>
<script src="../assets/js/discussion_handler.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/jquery-3.6.0.min.js"></script>
<script src="../assets/js/sweetalert2@11.js"></script>
</html>