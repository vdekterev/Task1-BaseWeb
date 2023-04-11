<?php

/**
 * Pages Controller
 */
class Pages extends Controller
{
    public function __construct()
    {
    }

    /**
     * Not found page
     * @return void
     */
    public function notfound(): void
    {

        $this->view('pages/notfound');
    }

    /**
     * Success page
     * @return void
     */
    public function success(): void
    {
        $this->view('pages/success');
    }
}