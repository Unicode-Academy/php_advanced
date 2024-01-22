<?php

class Paginate
{
    private static function getPaginateLink($page, $isQuery)
    {
        if (!empty($_SERVER['QUERY_STRING']) && $isQuery) {
            $queryString = trim($_SERVER['QUERY_STRING']);
            parse_str($queryString, $params);
            $params['page'] = $page;
        } else {
            $params = ['page' => $page];
        }

        $link = http_build_query($params);
        $link = strpos($link, '?') !== false ? $link : '?' . $link;

        return $link;
    }

    private static function getView($data = [])
    {
        extract($data);
        ob_start();
        require 'core/views/paginate.php';
        $view = ob_get_contents();
        ob_end_clean();

        return $view;
    }

    public static function render($query, $limit, $page, $totalPage, $isQuery)
    {
        $self = __CLASS__;
        $pageHtml = '';

        /*
        $begin = $page - 3;
        if ($begin <= 0) {
        $begin = 1;
        }

        $end = $page + 3;
        if ($end > $totalPage) {
        $end = $totalPage;
        }
         */
        $begin = max(2, $page - 5);
        $end = min($page + 5, $totalPage);

        $view = self::getView(compact('page', 'totalPage', 'self', 'isQuery', 'begin', 'end'));

        return $view;
    }
}

/*
page = 1
1 2 3 4 5 6 ... 20

page = 10
1 ... 5 6 7 8 9 10 11 12 13 14 15 ... 20

page = 19
1 ... 14 15 16 17 18 19 20
 */