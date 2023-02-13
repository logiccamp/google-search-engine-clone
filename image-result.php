<?php

// class for later
include("engine/engine.php");

$engine = new Engine();
$results = [];
if (isset($_GET['query'])) {
    $q = $_GET['query'];


    if ($q == "") header("Location: ./");
    $result = $engine->searchImage($q);
    $results = $result["value"];
} else {
    header('Location: ./');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="material_icons/css/materialdesignicons.min.css">
</head>


<body class="search_page bg-white">
    <div class="container-fluid">
        <form action="search.php" class="form">
            <div class="row align-items-start px-3 mt-4 mb-0 pb-0 search-card">
                <div class="col-auto mt-2 google_brand">
                    <img width="100" src="./googlelogo_color_272x92dp.png" alt="">
                </div>
                <div class="col-xl-7 col-lg-7 col-sm-10">
                    <div class="input-group">
                        <!-- google icon -->
                        <div class="input-group-prepend">
                            <span class="input-group-text google"><img class="icon" src="google_icon.png"></span>
                        </div>
                        <!-- input -->
                        <input type="text" name="query" value="<?php echo $q; ?>" class="form-control">
                        <!-- search icon -->
                        <div class="input-group-append">
                            <span class="input-group-text search_icon">
                                <button class="icon btn p-0 m-0">
                                    <img class="img-fluid" src="search_icon.png" alt="">
                                </button>
                            </span>
                        </div>
                    </div>
                    <ul class="search-tabs">
                        <li class="">
                            <a href="search.php?query=<?php echo $q; ?>"> <i class="mdi mdi-magnify-expand"></i> All</a>
                        </li>
                        <li class="active">
                            <a href="image-result.php?query=<?php echo $q; ?>"> <i class="mdi mdi-image-outline"></i> Images</a>
                        </li>
                        <li>
                            <a href="news-result.php?query=<?php echo $q; ?>"> <i class="mdi mdi-newspaper-variant-outline"></i> News</a>
                        </li>
                    </ul>
                </div>
            </div>
        </form>
        <hr class="border-2 m-0">
        <div class=" mt-4">
            <!-- result card -->
            <div class="results_image">
                <?php foreach ($results as $image) : ?>
                    <div class="result_card_image">
                        <a href="<?php echo $image['url']; ?>">
                            <img src="<?php echo $image['url']; ?>" onerror="return this.src=''" alt="">
                        </a>
                        <div class="content">

                            <small class="text-muted"><?php echo strlen($image["title"]) > 20 ? substr($image["title"], 0, 20) : $image["title"]; ?></small>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="page_pagination d-none">
                <ul>
                    <li class="active">
                        <a href="">1</a>
                    </li>
                    <li>
                        <a href="">2</a>
                    </li>
                    <li>
                        <a href="">2</a>
                    </li>
                    <li>
                        <a href="">3</a>
                    </li>
                    <li class="next">
                        <a href="">Next</a>
                    </li>
                </ul>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>