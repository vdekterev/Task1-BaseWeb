<?php

class Pages extends Controller
{
    public function __construct()
    {
    }

    public function feedback()
    {
        $data = [
            'title' => 'Welcome',
        ];

        $this->view('pages/feedback', $data);
    }

    public function notfound()
    {
        $data = [
            'title' => 'Welcome',
        ];

        $this->view('pages/notfound', $data);
    }
}