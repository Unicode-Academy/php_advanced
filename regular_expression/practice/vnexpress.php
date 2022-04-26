<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lấy dữ liệu Vnexpress</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .post-lists article{
            margin-bottom: 15px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 15px;
        }

        .post-lists article a{
            color: #333;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="text-center text-uppercase">Danh sách bài viết Vnexpress</h1>
    <hr>
    <div class="post-lists">
        <?php

        $arrContextOptions=array(
            "ssl"=>array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ),
        );

        $content = file_get_contents(
            'https://vnexpress.net/thoi-su',
            false,
            stream_context_create($arrContextOptions)
        );

        preg_match('~<div.*id="automation_TV1">\n<div.*?>(.+)</div>\n</div>~ius', $content, $matchesPost);

        if (!empty($matchesPost[1])){
            $listPosts = $matchesPost[1];

            preg_match_all('~<article class="item-news item-news-common".*?>(.+?)</article>~ius', $listPosts, $innerPosts);

            if (!empty($innerPosts[1])){
                foreach ($innerPosts[1] as $post){
                    preg_match('~<h3 class="title-news">\n<a.*?href="(.+?)".*?>(.+?)</a>\n</h3>~ius', $post, $titleArr);

                    preg_match('~<p class="description">(.+?)</p>~ius', $post, $descArr);

                    preg_match('~<img.*?src="(.+?)"~ius', $post, $imgArr);

                    $title = null;
                    $link = null;
                    $desc = null;
                    $img = null;


                    if (!empty($titleArr[2])){
                        $title = trim($titleArr[2]);
                    }

                    if (!empty($titleArr[2])){
                        $link = trim($titleArr[1]);
                    }

                    if (!empty($descArr[1])){
                        $desc = trim(strip_tags($descArr[1]));
                    }

                    if (!empty($imgArr[1])){
                        $img = trim($imgArr[1]);

                        if (preg_match('~base64~', $img)){
                            preg_match('~<img.*?data-src="(.+?)"~ius', $post, $imgArr);
                            if (!empty($imgArr[1])){
                                $img = $imgArr[1];
                            }
                        }
                    }

                    if (!empty($title)):

                        ?>
                        <article>
                            <div class="row">
                                <div class="col-3">
                                    <?php if (!empty($img)): ?>
                                        <a target="_blank" href="<?php echo $link; ?>"><img src="<?php echo $img; ?>" alt=""></a>
                                    <?php endif; ?>
                                </div>
                                <div class="col-9">
                                    <h4><a target="_blank" href="<?php echo $link; ?>"><?php echo $title; ?></a></h4>
                                    <p>
                                        <?php echo $desc; ?>
                                    </p>
                                </div>
                            </div>
                        </article>
                        <?php
                    endif;
                }
            }

        }
        ?>
    </div>
</div>
</body>
</html>
