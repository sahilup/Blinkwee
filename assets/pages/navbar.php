<?php
global $user;
?>

<nav class="navbar navbar-expand-lg navbar-light border"  style="background-color: #ffdc00;">
        <div class="container col-9 d-flex justify-content-between">
            <div class="d-flex justify-content-between col-8">
                <a class="navbar-brand" href="?">
                    <img src="assets/images/blinkwee.png" alt="" height="28">

                </a>

                <form class="d-flex">
                    <input class="form-control me-2" type="search"  style="background-color:#ffe859" placeholder="looking for someone.."
                        aria-label="Search">

                </form>

            </div>


            <ul class="navbar-nav  mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link text-dark" href="?"><i class="bi bi-house-door-fill"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" data-bs-toggle="modal" data-bs-target="#addpost" href="#"><i class="bi bi-plus-square-fill"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#"><i class="bi bi-heart-fill"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#"><i class="bi bi-chat-fill"></i></a>
                </li>
                <li class="nav-item dropdown" >
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="assets/images/profile/<?=$user['profile_pic'] ?>" alt="" height="30" class="rounded-circle border">
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown" >
                        <li><a class="dropdown-item" href="?edit_profile">Edit My Profile</a></li>
                        <li><a class="dropdown-item" href="#">Account Settings</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="assets/php/validation.php?logout">Logout</a></li>
                    </ul>
                </li>

            </ul>


        </div>
    </nav>