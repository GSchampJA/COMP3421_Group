<!DOCTYPE html>
<html>
<head>
    <title>Create a post</title>
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
    <div class="container-fluid" style="margin-top:100px">
        <div class="postForm">
            <div class="row justify-content-center">
                <div class="col-sm-4">
                    <a href="index.html" id="closeButton"><i class="material-icons md-24">close</i></a>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-4" id="createTitle">
                    <h2>Sign up to PolyU Forum~</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-4">
                    <form action="#.php" class="was-validated">
                        <div class="form-group">
                            <h6>Name:</h6>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Input here..." required>
                        </div>
                        <div class="form-group">
                            <h6>Password:</h6>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Input here..." required>
                        </div>
                        
                        <button type="submit" class="btn btn-secondary">Submit</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-sm-4" style = "text-align: center;">
                <h6>Or do you have an account already? Log In <a href="login.php">Here</a></h6>
            </div>
        </div>
    </div>
</body>
</html>
