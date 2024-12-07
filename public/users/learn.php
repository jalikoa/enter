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
        .nav-tabs-bordered {
            border-bottom: 2px solid #ebeef4;
        }

        .nav-tabs-bordered .nav-link {
            margin-bottom: -2px;
            border: none;
            color: #2c384e;
            font-size:13px;
        }

        .nav-tabs-bordered .nav-link:hover,.nav-tabs-bordered .nav-link:focus {
            color: #1a5a00;
        }

        .nav-tabs-bordered .nav-link.active {
            background-color: #fff;
            color: #008521;
            font-weight: 500;
            border-bottom: 2px solid #105f00;
        }
        .inner-file,.bg-hehe {
            background: #32333227;
        }
        .inner-file {
            padding:10px 10px;
        }
        .bd-r-20 {
            border-radius: 20px;
        }
        .bd-r-5 {
            border-radius:5px;
        }
        .bd-r-15 {
            border-radius: 15px;
        }
        .bd-r-10 {
            border-radius: 10px;
        }
        .file-holder {
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .fileSize,.uploadDate {
            font-size:12px;
            font-weight: 500;
            color:#050e3d85;
        }
        .forum-container .img-holder img {
            width:50px;
            height:50px;
            border-radius:50%;
            object-fit:cover;
        }
        .text-small {
            font-size:14px;
        }
        .sender-pro-pic {
            width:20px;
            height:20px;
            object-fit:cover;
            border-radius:50%;
        }
        .text-xs {
            font-size:10px;
        }
        .forum-container {
            margin:5px;
            background:#f2f2f9ff;
            padding:10px;
            border-radius:10px;
            max-width: 600px;
        }
        .forum-meta-info {
            margin-top:10px;
        }
        @media (min-width: 768px) {
    .dropdown-menu-arrow::before {
      content: "";
      width: 13px;
      height: 13px;
      background: #fff;
      position: absolute;
      top: -7px;
      right: 20px;
      transform: rotate(45deg);
      border-top: 1px solid #eaedf1;
      border-left: 1px solid #eaedf1;
    }
  }
  .message-chat-col {
    display:grid;
    grid-template-columns:300px auto;
}
.chats-section {
    background:#fff;
    border-radius:3px;
    padding:3px;
    max-height:85vh;
    overflow: auto;
}
.select-mess-plusnav {
    justify-content: space-around;
}
.ico-size {
    font-size:70px;
}
@media (max-width:770px){
    .chats-section {
        display:none;
    }
    .no-chat-selected {
        width:100%;
    }
    .chat-selected,.messages-section {
        width:100%;
    }
    .message-chat-col {
        grid-template-columns:auto;
    }
}
.chat-meta-information {
    display:flex;
    align-items:center;
    justify-content: space-between;
    flex-direction: column;
}
.chat-div {
    background:#f1f1f3;
    border-radius:3px;
    display:flex;
    align-items:center;
    padding:3px 3px;
    justify-content: space-between;
    cursor: pointer;
    margin:10px 0px;
}
.chat-div .chat-meta-information .sender-name {
    width:80px;
    height:20px;
    overflow: hidden;
}
.chat-meta-information .sender-last-message {
    width:100px;
    height:22px;
    overflow: hidden;
    padding:1px;
}
.selected-chat-messages {
    display:flex;
    flex-direction:column;
    min-height:400px;
    max-height:400px;
    overflow: auto;
}
.message-received {
    align-self:flx-start;
    background:rgba(196, 196, 196, 0.518);
    max-width:60%;
    padding:5px;
    padding-bottom:10px;
    border-bottom-right-radius:20px;
    border-bottom-left-radius:10px;
}
.message-sent {
    align-self:flex-end;
    background:rgba(66, 85, 109, 0.374);
    max-width:60%;
    padding:5px;
    padding-bottom:10px;
    border-bottom-right-radius:10px;
    border-bottom-left-radius:20px;
}

.chat-div .chat-last-message-time {
    font-size: 15px;
    display:flex;
    flex-direction:column;
    justify-content:space-between;
    align-items: center;
}
.chat-div .chat-last-message-time .sent-status,.sent-status {
    font-size:20px;
}
.text-small {
    font-size: 12px;
}
.profile-picture {
    width:40px;
    height:40px;
    border-radius:50%;
    object-fit: cover;
}
.messages-section .no-chat-selected {
    min-height: 85vh;
    background:rgba(134, 134, 134, 0.377);
    display:flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}
.messages-section .no-chat-selected img {
    height:200px;
    width:200px;
}
    </style>
</head>

<body>
    <!-- The beginning of the navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-future-green">
        <div class="container-fluid">
            <a href="index.html" class="navbar-brand">
                <a href="./home.html" class="navbar-brand"><center class="d-flex align-items-center"><img src="../favicon.png" alt="" class="rounded-corners mb-2 mt-1 header-initiative_logo"><h5 class="ms-3 p-0">Future Guardians initiative</h3></center></a>
            </a>
            <button data-bs-toggle="collapse" data-bs-target="#navBar" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse ms-5" id="navBar">
                <ul class="navbar-nav">
                    <li class="navbar-item">
                        <a href="<?php echo "dashboard.php?auth=".$auth?>" class="nav-link">Home</a>
                    </li>
                    <li class="navbar-item">
                        <a href="<?php echo "learn.php?auth=".$auth?>" class="nav-link active">Learn</a>
                    </li>
                    <li class="navbar-item">
                        <a href="#about" class="nav-link">About us</a>
                    </li>
                    <li class="navbar-item">
                        <a href="#contact" class="nav-link">Contact us</a>
                    </li>
                    <li class="navbar-item">
                        <a href="donate.html" class="nav-link">Support</a>
                    </li>
                    <li onclick="" class="navbar-item">
                        <a href="#" class="nav-link">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
   
    <!-- The end of the navbar -->
     <!-- Beginning if the new body -->
    <div class="container">
        <div data-aos="fade-in" data-aos-delay="500" class="row mt-3">
            <div class="col col-lg-6">
                <form action="" role="form">
                    <div class="input-group">
                        <input type="text" class="form-control" id="search_inp" required placeholder="Search here">
                        <button class="btn bi bi-search btn-secondary"></button>
                    </div>
                </form>
            </div>
            <div class="card border-0 mt-3 mb-3">
                <div class="card-body">
    
                  <!-- Bordered Tabs Justified -->
                  <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabs" role="tablist">
                    <li class="nav-item " role="presentation">
                      <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#allTab" type="button" role="tab" aria-controls="all" aria-selected="true">All</button>
                    </li>
                    <li class="nav-item " role="presentation">
                      <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab" data-bs-target="#imagesTab" type="button" role="tab" aria-controls="images" aria-selected="false">Images</button>
                    </li>
                    <li class="nav-item " role="presentation">
                        <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab" data-bs-target="#videosTab" type="button" role="tab" aria-controls="videos" aria-selected="false">Videos</button>
                      </li>
                      <li class="nav-item " role="presentation">
                        <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab" data-bs-target="#booksTab" type="button" role="tab" aria-controls="books" aria-selected="false">Books</button>
                      </li>
                    <li class="nav-item " role="presentation">
                        <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab" data-bs-target="#discussTab" type="button" role="tab" aria-controls="discuss" aria-selected="false">Discuss</button>
                      </li>
                  </ul>
                  <div class="tab-content pt-2" id="borderedTabContent">
                    <div class="tab-pane fade show active" id="allTab" role="tabpanel" aria-labelledby="all-tab">
                        <!-- This is the tab where all the learning resources will be displayed -->
                      Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.
                    </div>
                    <div class="tab-pane fade" id="imagesTab" role="tabpanel" aria-labelledby="images-tab">
                        <!-- This is the tab where the images for learning will be displayed -->
                      Nesciunt totam et. Consequuntur magnam aliquid eos nulla dolor iure eos quia. Accusantium distinctio omnis et atque fugiat. Itaque doloremque aliquid sint quasi quia distinctio similique. Voluptate nihil recusandae mollitia dolores. Ut laboriosam voluptatum dicta.
                    </div>
                    <div class="tab-pane fade" id="videosTab" role="tabpanel" aria-labelledby="videos-tab">
                        <!-- This is the tab where all the vidoes for learning will be displayed -->
                        Saepe animi et soluta ad odit soluta sunt. Nihil quos omnis animi debitis cumque. Accusantium quibusdam perspiciatis qui qui omnis magnam. Officiis accusamus impedit molestias nostrum veniam. Qui amet ipsum iure. Dignissimos fuga tempore dolor.
                      </div>
                      <div class="tab-pane fade" id="booksTab" role="tabpanel" aria-labelledby="books-tab">
                        <!-- This is the tab where all the books will be displayed -->
                        <!-- Trees card beginning -->
                        <div class="file-holder bg-light">
                            <div class="inner-file position-relative bd-r-10">
                                <button class="position-absolute top-0 end-0 m-1 btn btn-primary"><i class="bi bi-download"></i></button>
                                <p class="file-name bg-hehe ps-2 bd-r-5">
                                    How to make trees in the moon.pdf 
                                </p>
                                <p class="file-desc">
                                    Learn the importance fo conserving planting and make thins work out for you in a little while.
                                </p>
                                <span class="position-absolute bottom-0 start-0 ms-2 mb-1 fileSize bg-hehe rounded-pill ps-2 pe-2">26.35 Mbs</span>
                                <span class="position-absolute bottom-0 end-0 me-2 mb-1 uploadDate bg-hehe rounded-pill ps-2 pe-2">5 days ago</span>
                            </div>
                        </div>
                        <!-- Trees card end -->
                         <!-- examples start -->
                         <div class="file-holder bg-light">
                            <div class="inner-file position-relative bd-r-10">
                                <button class="position-absolute top-0 end-0 m-1 btn btn-primary"><i class="bi bi-download"></i></button>
                                <p class="file-name bg-hehe ps-2 bd-r-5">
                                    How to make trees in the moon.pdf 
                                </p>
                                <p class="file-desc">
                                    Learn the importance fo conserving planting and make thins work out for you in a little while.
                                </p>
                                <span class="position-absolute bottom-0 start-0 ms-2 mb-1 fileSize bg-hehe rounded-pill ps-2 pe-2">26.35 Mbs</span>
                                <span class="position-absolute bottom-0 end-0 me-2 mb-1 uploadDate bg-hehe rounded-pill ps-2 pe-2">5 days ago</span>
                            </div>
                        </div>
                        <div class="file-holder bg-light">
                            <div class="inner-file position-relative bd-r-10">
                                <button class="position-absolute top-0 end-0 m-1 btn btn-primary"><i class="bi bi-download"></i></button>
                                <p class="file-name bg-hehe ps-2 bd-r-5">
                                    How to make trees in the moon.pdf 
                                </p>
                                <p class="file-desc">
                                    Learn the importance fo conserving planting and make thins work out for you in a little while.
                                </p>
                                <span class="position-absolute bottom-0 start-0 ms-2 mb-1 fileSize bg-hehe rounded-pill ps-2 pe-2">26.35 Mbs</span>
                                <span class="position-absolute bottom-0 end-0 me-2 mb-1 uploadDate bg-hehe rounded-pill ps-2 pe-2">5 days ago</span>
                            </div>
                        </div>
                        <div class="file-holder bg-light">
                            <div class="inner-file position-relative bd-r-10">
                                <button class="position-absolute top-0 end-0 m-1 btn btn-primary"><i class="bi bi-download"></i></button>
                                <p class="file-name bg-hehe ps-2 bd-r-5">
                                    How to make trees in the moon.pdf 
                                </p>
                                <p class="file-desc">
                                    Learn the importance fo conserving planting and make thins work out for you in a little while.
                                </p>
                                <span class="position-absolute bottom-0 start-0 ms-2 mb-1 fileSize bg-hehe rounded-pill ps-2 pe-2">26.35 Mbs</span>
                                <span class="position-absolute bottom-0 end-0 me-2 mb-1 uploadDate bg-hehe rounded-pill ps-2 pe-2">5 days ago</span>
                            </div>
                        </div>
                        <div class="file-holder bg-light">
                            <div class="inner-file position-relative bd-r-10">
                                <button class="position-absolute top-0 end-0 m-1 btn btn-primary"><i class="bi bi-download"></i></button>
                                <p class="file-name bg-hehe ps-2 bd-r-5">
                                    How to make trees in the moon.pdf 
                                </p>
                                <p class="file-desc">
                                    Learn the importance fo conserving planting and make thins work out for you in a little while.
                                </p>
                                <span class="position-absolute bottom-0 start-0 ms-2 mb-1 fileSize bg-hehe rounded-pill ps-2 pe-2">26.35 Mbs</span>
                                <span class="position-absolute bottom-0 end-0 me-2 mb-1 uploadDate bg-hehe rounded-pill ps-2 pe-2">5 days ago</span>
                            </div>
                        </div>
                        <div class="file-holder bg-light">
                            <div class="inner-file position-relative bd-r-10">
                                <button class="position-absolute top-0 end-0 m-1 btn btn-primary"><i class="bi bi-download"></i></button>
                                <p class="file-name bg-hehe ps-2 bd-r-5">
                                    How to make trees in the moon.pdf 
                                </p>
                                <p class="file-desc">
                                    Learn the importance fo conserving planting and make thins work out for you in a little while.
                                </p>
                                <span class="position-absolute bottom-0 start-0 ms-2 mb-1 fileSize bg-hehe rounded-pill ps-2 pe-2">26.35 Mbs</span>
                                <span class="position-absolute bottom-0 end-0 me-2 mb-1 uploadDate bg-hehe rounded-pill ps-2 pe-2">5 days ago</span>
                            </div>
                        </div>
                        <div class="file-holder bg-light">
                            <div class="inner-file position-relative bd-r-10">
                                <button class="position-absolute top-0 end-0 m-1 btn btn-primary"><i class="bi bi-download"></i></button>
                                <p class="file-name bg-hehe ps-2 bd-r-5">
                                    How to make trees in the moon.pdf 
                                </p>
                                <p class="file-desc">
                                    Learn the importance fo conserving planting and make thins work out for you in a little while.
                                </p>
                                <span class="position-absolute bottom-0 start-0 ms-2 mb-1 fileSize bg-hehe rounded-pill ps-2 pe-2">26.35 Mbs</span>
                                <span class="position-absolute bottom-0 end-0 me-2 mb-1 uploadDate bg-hehe rounded-pill ps-2 pe-2">5 days ago</span>
                            </div>
                        </div>
                          <!-- Examples end -->
                    </div>
                      <div class="tab-pane fade" id="discussTab" role="tabpanel" aria-labelledby="discuss-tab">
                        <!-- This is the tab where all the discussion forums and the discusions themselves will get displayed  -->
                       <h5 class="text-muted m-2">
                        My discussions
                        </h5>  
                        <div class="discussions-holder">
                            <div class="forums d-xl">
                                <!-- Beginning of forum/discussion card -->
                                <div class="forum-container d-flex position-relative">
                                    <span class="position-absolute top-0 end-0 bg-success rounded-pill badge text-xs m-1">100+ new messages</span>
                                    <div class="img-holder">
                                        <img src="../assets/img/messages-1.jpg" class="rounded-circle" alt="">
                                    </div>
                                    <div class="forum-meta-info">
                                        <h6 class="text-muted text-small ms-3 forum-title">
                                            Kenya Young Men association
                                        </h6>
                                        <div class="last-sent-mess d-flex">
                                            <div class="sender-info">
                                                <img src="../assets/img/messages-3.jpg" alt="" class="sender-pro-pic">
                                                <p class="text-xs senderName">Hans Jalikoa</p>
                                            </div>
                                            <div class="last-mess text-small mt-1">
                                                Hey can you tell me on how I can.....
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end of forum/discussion card -->
                                 <!-- Beginning of forum/discussion card -->
                                <div class="forum-container d-flex position-relative">
                                    <span class="position-absolute top-0 end-0 bg-success rounded-pill badge text-xs m-1">100+ new messages</span>
                                    <div class="img-holder">
                                        <img src="../assets/img/messages-1.jpg" class="rounded-circle" alt="">
                                    </div>
                                    <div class="forum-meta-info">
                                        <h6 class="text-muted text-small ms-3 forum-title">
                                            Kenya Young Men association
                                        </h6>
                                        <div class="last-sent-mess d-flex">
                                            <div class="sender-info">
                                                <img src="../assets/img/messages-3.jpg" alt="" class="sender-pro-pic">
                                                <p class="text-xs senderName">Hans Jalikoa</p>
                                            </div>
                                            <div class="last-mess text-small mt-1">
                                                Hey can you tell me on how I can.....
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end of forum/discussion card -->
                            </div>
                            <div class="chats">
                                <!-- Message card here  -->
                            <div class="chat-selected">
                                <div class="selected-message-holder">
                            <div class="select-mess-plusnav d-flex">
                                <div class="profile-nav-div d-flex m-2">
                                    <button class="bi bi-chevron-left btn btn-light"></button>
                                    <div class="selected-chat-holder d-flex">
                                        <img src="../assets/img/profile-img.jpg" alt="" class="profile-picture" data-bs-toggle="dropdown">
                                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow p-2">
                                            <li class="dropdown-header">
                                                <img src="../assets/img/profile-img.jpg" class="rounded-circle" alt="">
                                                <h5 class="dropdown-title text-secondary text-center">
                                                    James Gicheni
                                                </h5>
                                                <h6 class="text-muted text-center text-small">
                                                    Web developer
                                                </h6>
                                            </li>
                                            <hr class="dropdown-divider">
                                            <li class="dropdown-item">
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" name="" id="muteSwitch" class="form-check-input">
                                                    <label for="muteSwitch"><i class="bi bi-bell-slash-fill text-secondary me-1"></i>Mute</label>
                                                </div>
                                            </li>
                                            <li class="dropdown-item">
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" name="" id="blockTextSwitch" class="form-check-input">
                                                    <label for="blockTextSwitch"><i class="bi bi-chat-dots-fill me-1 text-secondary"></i> Block texts</label>
                                                </div>
                                            </li>
                                            <li class="dropdown-item">
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" name="" id="blockCallSwitch" class="form-check-input">
                                                    <label for="blockCallwitch"><i class=" text-secondary bi bi-telephone-minus-fill me-1"></i> Block calls</label>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="name-last-active-section">
                                            <h4 class="text-small m-2">James Gicheni</h4>
                                            <p class="text-small m-0 p-0">
                                                Last seen 09:40 AM
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="selected-chat-action">
                                    <!-- Start audio chat button here -->
                                    <button type="button" class="btn btn-secondary bi bi-telephone-plus-fill" data-bs-toggle="modal" data-bs-target="#audioacallModal">
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
                                    <button type="button" class="btn btn-secondary bi bi-camera-video" data-bs-toggle="modal" data-bs-target="#verticalycentered">
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
                                      <!-- End video section -->
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
                                            <label for="showBlock">Show block</label>
                                            <input type="checkbox" class="form-check-input" id="showBlock">
                                        </div>
                                      </ul>
                                </div>
                            </div>
                            <div class="selected-chat-messages d-flex h-100 m-1 p-1">
                                <div class="message-text message-received position-relative mt-3">
                                    <p class="message-text-text mb-4">
                                       Hey hello this is the CEO of JalSoft Ukoje lakini bro
                                    </p>
                                    <span class="received-time text-small position-absolute end-0 m-1 bottom-0">
                                       00:34 AM
                                    </span>
                                  </div>
                                  <div class="message-text message-sent position-relative mt-3">
                                    <p class="message-text-text mb-4">
                                       Hey hello this is the CEO of JalSoft Ukoje lakini bro
                                    </p>
                                    <span class="received-time text-small position-absolute start-0 m-1 bottom-0">
                                        00:34 AM
                                     </span>
                                     <span class="sent-status bi text-primary bi-check2-all position-absolute end-0 m-1 bottom-0">
                                            <!-- Here the user will get notified whether message is sent -->
                                     </span>
                                  </div>
                                  <div class="message-text message-received position-relative mt-3">
                                    <p class="message-text-text mb-4">
                                       Hey hello this is the CEO of JalSoft Ukoje lakini bro
                                    </p>
                                    <span class="received-time text-small position-absolute end-0 m-1 bottom-0">
                                       00:34 AM
                                    </span>
                                  </div>
                                  <div class="message-text message-received position-relative mt-3">
                                    <p class="message-text-text mb-4">
                                       Hey hello this is the CEO of JalSoft Ukoje lakini bro
                                    </p>
                                    <span class="received-time text-small position-absolute end-0 m-1 bottom-0">
                                       00:34 AM
                                    </span>
                                  </div>
                                  <div class="message-text message-sent position-relative mt-3">
                                    <p class="message-text-text mb-4">
                                       Hey hello this is the CEO of JalSoft Ukoje lakini bro
                                    </p>
                                    <span class="received-time text-small position-absolute start-0 m-1 bottom-0">
                                        00:34 AM
                                     </span>
                                     <span class="sent-status bi text-primary bi-check2-all position-absolute end-0 m-1 bottom-0">
                                            <!-- Here the user will get notified whether message is sent -->
                                     </span>
                                  </div>
                                  <div class="message-text message-received position-relative mt-3">
                                    <p class="message-text-text mb-4">
                                       Hey hello this is the CEO of JalSoft Ukoje lakini bro
                                    </p>
                                    <span class="received-time text-small position-absolute end-0 m-1 bottom-0">
                                       00:34 AM
                                    </span>
                                  </div>
                                  <div class="message-text message-received position-relative mt-3">
                                    <p class="message-text-text mb-4">
                                       Hey hello this is the CEO of JalSoft Ukoje lakini bro
                                    </p>
                                    <span class="received-time text-small position-absolute end-0 m-1 bottom-0">
                                       00:34 AM
                                    </span>
                                  </div>
                                  <div class="message-text message-sent position-relative mt-3">
                                    <p class="message-text-text mb-4">
                                       Hey hello this is the CEO of JalSoft Ukoje lakini bro
                                    </p>
                                    <span class="received-time text-small position-absolute start-0 m-1 bottom-0">
                                        00:34 AM
                                     </span>
                                     <span class="sent-status bi text-primary bi-check2-all position-absolute end-0 m-1 bottom-0">
                                            <!-- Here the user will get notified whether message is sent -->
                                     </span>
                                  </div>
                                  <div class="message-text message-received position-relative mt-3">
                                    <p class="message-text-text mb-4">
                                       Hey hello this is the CEO of JalSoft Ukoje lakini bro
                                    </p>
                                    <span class="received-time text-small position-absolute end-0 m-1 bottom-0">
                                       00:34 AM
                                    </span>
                                  </div>
                                  <div class="message-text message-received position-relative mt-3">
                                    <p class="message-text-text mb-4">
                                       Hey hello this is the CEO of JalSoft Ukoje lakini bro
                                    </p>
                                    <span class="received-time text-small position-absolute end-0 m-1 bottom-0">
                                       00:34 AM
                                    </span>
                                  </div>
                                  <div class="message-text message-sent position-relative mt-3">
                                    <p class="message-text-text mb-4">
                                       Hey hello this is the CEO of JalSoft Ukoje lakini bro
                                    </p>
                                    <span class="received-time text-small position-absolute start-0 m-1 bottom-0">
                                        00:34 AM
                                     </span>
                                     <span class="sent-status bi text-primary bi-check2-all position-absolute end-0 m-1 bottom-0">
                                            <!-- Here the user will get notified whether message is sent -->
                                     </span>
                                  </div>
                                  <div class="message-text message-received position-relative mt-3">
                                    <p class="message-text-text mb-4">
                                       Hey hello this is the CEO of JalSoft Ukoje lakini bro
                                    </p>
                                    <span class="received-time text-small position-absolute end-0 m-1 bottom-0">
                                       00:34 AM
                                    </span>
                                  </div>
                                   <!--End of sample messages sent and received  -->
                                </div></div></div>
                            </div>
                        </div>
                                                 
                    </div>
                  </div><!-- End Bordered Tabs Justified -->
    
                </div>
              </div>
        </div>
    </div>
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
                    <form action="" role="form">
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
    window.addEventListener('load',aosInit);
</script>
<script src="../assets/js/aos.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/jquery-3.6.0.min.js"></script>
<script src="../assets/js/sweetalert2@11.js"></script>
</html>