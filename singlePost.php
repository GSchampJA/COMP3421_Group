﻿<!DOCTYPE html>
<html>
<head>
    <title>PolyU Forum</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!--Add Bootstrap framework into the HTML file-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <!---->

</head>

<body>
    <!--Bootstrap navigation bar-->
    <nav class="navbar fixed-top navbar navbar-custom">
        <a class="navbar-brand" href="index.php">
            <img src="images/icon.png" width="30" height="30" class="d-inline-block align-top" alt="">
            PolyU Forum
        </a>
        <div class="navBar">
            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                <div class="btn-group" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Posts
                    </button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <button class="dropdown-item" type="button">All</button>
                        <button class="dropdown-item" type="button">Most Popular</button>
                        <button class="dropdown-item" type="button">PolyU Life</button>
                        <button class="dropdown-item" type="button">Faculty News</button>
                    </div>
                </div>
                <a class="btn" href="createPost.php" role="button" data-toggle="tooltip" data-placement="bottom" title="Create post"><i class="material-icons md-24">add_box</i></a>
                <a class="btn" href="#" role="button" data-toggle="tooltip" data-placement="bottom" title="User"><i class="material-icons md-24">account_circle</i></a>
            </div>
        </div>
    </nav>
    <!---->

    <div class="container-fluid" style="margin-top:90px">
        <div class="row">
            <div class="col-sm-12">
                <div class="single-post-container">
                    <h3 class="single-post-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
                    <div class="single-post-author">
                        <h5>By: Jane Doe</h5>
                        <small>16 March, 2023 - 13:52</small>
                    </div>
                    <div class="single-post-thumbnail">
                        <img src="dog.jpg">
                    </div>
                    <div class="single-post-paragraph">
                        <p class="single-post-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sed dolor ut nisl pharetra aliquet at et sapien.Vestibulum non tempor elit. Quisque id feugiat leo, finibus mattis urna.Sed finibus, nulla in luctus pretium, felis nunc consectetur velit, et lacinia nisi enim sit amet nisl. Nunc lacinia magna sit amet massa posuere, eget maximus quam viverra. Pellentesque vulputate lacus eu elementum pharetra. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!--Page footer-->
    <footer>
        <div class="footer-links">
            <a href="https://www38.polyu.edu.hk/eStudent/" target="_blank" data-toggle="tooltip" title="eStudent"><i class="material-icons md-24">key</i></a>
            <a href="https://learn.polyu.edu.hk/" target="_blank" data-toggle="tooltip" title="LEARN@PolyU"><i class="material-icons md-24">collections_bookmark</i></a>
            <a href="https://www.lib.polyu.edu.hk/" target="_blank" data-toggle="tooltip" title="Pao Yue-kong Library"><i class="material-icons md-24">local_library</i></a>
        </div>
        <div class="footer-copyright">
            <small>Copyright &copy; COMP3421 PolyU Forum Group</small>
        </div>
    </footer>
    <!---->
<script src="script.js"></script>
</body>
</html>