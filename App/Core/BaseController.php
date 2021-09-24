<?php

namespace Apps\Square\Core;

class BaseController
{
    public function view($path,  $params)
    {
        extract($params);
        require_once(VIEWS . $path . '.php');
    }
    public function db()
    {
    }
}
