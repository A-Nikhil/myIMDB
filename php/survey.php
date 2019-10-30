<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Survey</title>
    <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.11.1/js/all.js"></script>
    <link rel="stylesheet" href="survey.css">
    <link rel="icon" href="icon.png">
</head>
<body>

<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
        <img src="logo2.png" alt="logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <form class="form-inline mr-auto mt-2 mt-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
        </form>
        <ul class="navbar-nav my-2 my-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="http://localhost:27017">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="\http://localhost:27017/movies">Movies</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost:27017/engine">Recommendations</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Take a Survey</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="dash" href="http://localhost:27017/login">Login</a>
            </li>
        </ul>
    </div>
</nav>

<div class="jumbotron text-center">
    <p class="display-4">
        WhatToWatch.com / Survey
    </p>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2 col-md-1 col-sm-0">
        </div>
        <div class="col-lg-10 col-md-11 col-sm-12">
            <p class="display-4">
                Tell us what you feel
            </p>
            <hr class="light">
            <div class="breaker"></div>
            <form action="survey.php" method="post">
                <div class="form-group">
                    <label for="name">Name</label> <span class="badge badge-pill badge-danger">Required</span>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <br/>
                <div class="form-group">
                    <label for="email">Email</label> <span class="badge badge-pill badge-danger">Required</span>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="breaker"></div>
                <div id="ratingsForWebsite">
                    <h4>Please rate our services below</h4>
                    <hr class="damn">
                    <div class="ratingCategory">
                        <label for="design" class="sliderLabels">Design of the Website</label>
                        <input type="range" value="0" onchange="changeLabel(this, 1, 'design')" class="custom-range"
                               min="0" max="5" step="0.5" id="design" name="design">
                        <div class="rangeValue">
                            <p id="design1" class="rangeValue">0</p>
                        </div>
                    </div>

                    <div class="ratingCategory">
                        <label for="lookAndFeel" class="sliderLabels">Look and Feel</label>
                        <input type="range" value="0" onchange="changeLabel(this, 1, 'lookAndFeel')"
                               class="custom-range" min="0" max="5" step="0.5"
                               id="lookAndFeel" name="look">
                        <div class="rangeValue">
                            <p id="lookAndFeel1" class="rangeValue">0</p>
                        </div>
                    </div>

                    <div class="ratingCategory">
                        <label for="UX" class="sliderLabels">User Experience</label>
                        <input type="range" value="0" onchange="changeLabel(this, 1, 'UX')" class="custom-range" min="0"
                               max="5"
                               step="0.5"
                               id="UX" name="UX">
                        <div class="rangeValue">
                            <p id="UX1" class="rangeValue">0</p>
                        </div>
                    </div>

                    <div class="ratingCategory">
                        <label for="recommend" class="sliderLabels">Movie Recommendations</label>
                        <input type="range" value="0" onchange="changeLabel(this, 1, 'recommend')" class="custom-range"
                               min="0"
                               max="5"
                               step="0.5"
                               id="recommend"
                               name="recommend">
                        <div class="rangeValue">
                            <p id="recommend1" class="rangeValue">0</p>
                        </div>
                    </div>
                </div>

                <div class="breaker"></div>
                <h4>A few more questions ... </h4>
                <hr class="damn">
                <div id="radioButtons">
                    <div class="ratingCategory">
                        <h5>How likely are you to recommend this website to a friend?</h5>
                        <div class="custom-control custom-radio radioCheck">
                            <input type="radio" name="customRadio" required id="customRadio1"
                                   class="custom-control-input" value="5">
                            <label class="custom-control-label" for="customRadio1">Most Likely</label>
                        </div>
                        <div class="custom-control custom-radio radioCheck">
                            <input type="radio" name="customRadio" required class="custom-control-input"
                                   id="customRadio2" value="4">
                            <label class="custom-control-label" for="customRadio2">Likely</label>
                        </div>
                        <div class="custom-control custom-radio radioCheck">
                            <input type="radio" name="customRadio" required class="custom-control-input"
                                   id="customRadio3" value="3">
                            <label class="custom-control-label" for="customRadio3">Maybe</label>
                        </div>
                        <div class="custom-control custom-radio radioCheck">
                            <input type="radio" name="customRadio" required class="custom-control-input"
                                   id="customRadio4" value="2">
                            <label class="custom-control-label" for="customRadio4">Rarely</label>
                        </div>
                        <div class="custom-control custom-radio radioCheck">
                            <input type="radio" name="customRadio" required class="custom-control-input"
                                   id="customRadio5" value="1">
                            <label class="custom-control-label" for="customRadio5">Never</label>
                        </div>
                    </div>

                    <div class="breaker"></div>
                    <div class="ratingCategory">
                        <h5>How often would you use it?</h5>
                        <div class="custom-control custom-radio radioCheck">
                            <input type="radio" name="customRadioPart2" required id="customRadio6"
                                   class="custom-control-input" value="5">
                            <label class="custom-control-label" for="customRadio6">Very often</label>
                        </div>
                        <div class="custom-control custom-radio radioCheck">
                            <input type="radio" name="customRadioPart2" required class="custom-control-input"
                                   id="customRadio7" value="4">
                            <label class="custom-control-label" for="customRadio7">Often</label>
                        </div>
                        <div class="custom-control custom-radio radioCheck">
                            <input type="radio" name="customRadioPart2" required class="custom-control-input"
                                   id="customRadio8" value="3">
                            <label class="custom-control-label" for="customRadio8">Occasionally</label>
                        </div>
                        <div class="custom-control custom-radio radioCheck">
                            <input type="radio" name="customRadioPart2" required class="custom-control-input"
                                   id="customRadio9" value="2">
                            <label class="custom-control-label" for="customRadio9">Rarely</label>
                        </div>
                        <div class="custom-control custom-radio radioCheck">
                            <input type="radio" name="customRadioPart2" required class="custom-control-input"
                                   id="customRadio10" value="1">
                            <label class="custom-control-label" for="customRadio10">Never</label>
                        </div>
                    </div>

                    <div class="breaker"></div>
                    <div class="ratingCategory">
                        <h5>Any other suggestions for us? <span class="badge badge-pill badge-secondary">Optional</span>
                        </h5>
                        <textarea rows="5" name="additional" placeholder="Please let us know what we can improve.."></textarea>
                    </div>
                </div>
                <div class="breaker" style="margin-left: 25%">
                    <input type="submit" class="btn btn-outline-primary" style="width: 20%">
                </div>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['name'])) {
    $conn = mysqli_connect('localhost', 'root', '', 'wtwreviews');

    $name = $_POST['name'];
    $email = $_POST['email'];
    $design = $_POST['design'];
    $look = $_POST['look'];
    $ux = $_POST['UX'];
    $recommend = $_POST['recommend'];
    $likely = $_POST['customRadio'];
    $often = $_POST['customRadioPart2'];
    $additional = $_POST['additional'];
    $sql = "insert into reviews values('$name', '$email', '$design', '$look', '$ux', '$recommend', '$likely', '$often', '$additional')";

    echo "<script>alert('Review Submitted'); window.location.href = 'http://localhost:27017'</script>";
}
?>

<!--Footer-->
<div class="breaker"></div>
<footer>
    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-4">
                <h6>Our Offices </h6>
                <hr class="footerLight">
                <p>contact@wtw.com</p>
                <p>Mountain View, California</p>
                <p>CA - 90425</p>
            </div>
            <div class="col-4">
            </div>
            <div class="col-4">
                <h6>Get the app</h6>
                <hr class="footerLight text-center">
                <img src="google-button.png" style="width: 200px; height: auto" alt="play store"> <br><br>
                <img src="app-store.png" style="width: 200px; height: auto" alt="applestore">
            </div>
            <div class="col-12">
                <hr class="footerLight">
                <img src="logo2.png" alt="..">
            </div>
        </div>
    </div>
</footer>
<script>
    function changeLabel(object, number, pTag) {
        let rangeValueColor = pTag + number;
        document.getElementById(rangeValueColor).innerHTML = object.value;
        object.setAttribute("value", object.value);
    }
</script>
</body>
</html>