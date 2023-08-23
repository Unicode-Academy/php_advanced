<?php
require_once 'includes/functions.php';

$content = httpGet('https://vnexpress.net/thoi-su');

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