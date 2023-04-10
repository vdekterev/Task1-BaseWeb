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
     * The only controller
     * @return void
     */
    public function notfound(): void
    {

        $this->view('pages/notfound');
    }
}