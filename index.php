<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <!-- google -logo -->
        <div class="text-center">
            <img src="./googlelogo_color_272x92dp.png" alt="">
        </div>

        <!-- search area -->
        <form action="search.php" method="get">
            <div class="row justify-content-center mt-3">
                <div class="col-xl-7 col-lg-7 col-sm-10">
                    <div class="input-group">
                        <!-- google icon -->
                        <div class="input-group-prepend">
                            <span class="input-group-text google"><img class="icon"
                                    src="google_icon.png"></span>
                        </div>
                        <!-- input -->
                        <input type="text" name="query" class="form-control">
                        <!-- search icon -->
                        <div class="input-group-append">
                            <span class="input-group-text search_icon">
                                <button class="icon btn p-0 m-0">
                                    <img class="img-fluid"  src="search_icon.png" alt="">
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>