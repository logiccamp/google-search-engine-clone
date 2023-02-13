<?php

// class for later
include("engine/engine.php");

$engine = new Engine();
$results = [];
if (isset($_GET['query'])) {
    $q = $_GET['query'];
    $page = isset($_GET['pg']) ? $_GET["pg"] + 1 : 1;
    $Cpage = isset($_GET['pg']) ? $_GET["pg"] : 1;

    if ($q == "") header("Location: ./");
    if ($q == "") header("Location: ./");
    $result = $engine->searchNews($q, $page);
    // exit(var_dump($result));
    $results = $result["value"];
    $totalPages = ceil($result["totalCount"] % 10);
    $relatedSearch = $result["relatedSearch"];
    // $results = $result["value"];
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
        <form action="news-result.php" class="form">
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
                        <li>
                            <a href="image-result.php?query=<?php echo $q; ?>"> <i class="mdi mdi-image-outline"></i> Images</a>
                        </li>
                        <li class="active">
                            <a href="news-result.php?query=<?php echo $q; ?>"> <i class="mdi mdi-newspaper-variant-outline"></i> News</a>
                        </li>
                    </ul>
                </div>
            </div>
            <hr class="border-2 m-0">
            <div class="row px-3">
                <div class="col-auto mt-2 google_brand">

                </div>
                <div class="col-xl-7 col-lg-7 col-sm-10 mt-4">
                    <!-- result card -->
                    <div class="results">
                        <?php foreach ($results as $result) : ?>
                            <div class="result_card my-3 d-flex">
                                <div class="card_content <?php echo $result["image"]["url"] != '' ? 'with_avatar' : ''; ?>">
                                    <a href="<?php echo $result['url']; ?>">
                                        <div>
                                            <p class="m-0 sub_link">
                                                <?php echo strlen($result["url"]) > 15 ? substr($result["url"], 0, 25) . ' > ' . $result["provider"]["name"] :  $result["url"]; ?>
                                            </p>
                                        </div>
                                        <div>
                                            <h6 class="result_title mt-1"><?php echo $result["title"]; ?> </h6>
                                        </div>
                                    </a>
                                    <div class="content">
                                        <p><?php echo $result["snippet"]; ?></p>
                                    </div>
                                </div>
                                <?php if ($result["image"]["url"] != "") : ?>
                                    <div class="result_avatar">
                                        <img src='<?php echo $result["image"]["url"]; ?>' alt="">
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach ?>
                    </div>

                    <!-- related -->
                    <!-- #202124 -->

                    <div class="related_searches">
                        <div class="row m-0">
                            <?php foreach ($relatedSearch as $related) :
                                $link = str_replace(['<b>', '</b>'], '', $related);
                            ?>
                                <div class="col-md-6 related">
                                    <a href="news-result.php?query=<?php echo $link; ?>" class="w-100 m-0">
                                        <div class="d-flex bg-light align-items-center related_inner">
                                            <i class="mdi mdi-magnify"></i>
                                            <div class="mx-2"></div>
                                            <p class="m-0"><?php echo $related; ?></p>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <!-- pagination -->
                    <div class="page_pagination">
                        <ul>
                            <?php
                            if ($totalPages > 5) : ?>
                                <?php for ($i = 1; $i < 6; $i++) : ?>
                                    <li class="<?php echo $i == $Cpage ? 'active' : ''; ?>">
                                        <a href="news-result.php?query=<?php echo $q; ?>&pg=<?php echo $i; ?> "><?php echo $i; ?></a>
                                    </li>
                                <?php endfor; ?>
                                <li class="next">
                                    <a href="news-result.php?query=<?php echo $q; ?>&pg=<?php echo $page + 1; ?>">Next</a>
                                </li>
                            <?php else : ?>
                                <?php for ($i = 1; $i < $totalPages; $i++) : ?>
                                    <li class="<?php echo $i == $Cpage ? 'active' : ''; ?>">
                                        <a href="news-result.php?query=<?php echo $q; ?>&pg=<?php echo $i; ?> "><?php echo $i; ?></a>
                                    </li>
                                <?php endfor; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>