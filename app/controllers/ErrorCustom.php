<?php

class ErrorCustom extends controller
{
    public function __construct()
    {
        $this->view('error/404');
    }
}
