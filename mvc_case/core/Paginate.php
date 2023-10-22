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
        $link = strpos($link, '?') !== false ? $link : '?'.$link;

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

    public static function render($query, $limit, $page, $isQuery)
    {
        $totalRows = $query->rowCount();

        $totalPage = ceil($totalRows / $limit);

        $self = __CLASS__;

        $pageHtml = '';
        for ($i = 1; $i <= $totalPage; ++$i) {
            $pageHtml .= '<li class="page-item '.($page == $i ? 'active' : null).'"><a class="page-link" href="'.self::getPaginateLink($i, $isQuery).'">'.$i.'</a></li>';
        }

        $html = '<nav class="d-flex justify-content-end"><ul class="pagination pagination-sm">'.($page > 1 ? '<li class="page-item"><a class="page-link" href="'.self::getPaginateLink($page - 1, $isQuery).'">Trước</a></li>' : '').$pageHtml.($page < $totalPage ? '<li class="page-item"><a class="page-link" href="'.self::getPaginateLink($page + 1, $isQuery).'">Sau</a></li>' : '').'
        </ul></nav>';

        $view = self::getView(compact('page', 'totalPage', 'self', 'isQuery'));

        return $view;
    }
}
