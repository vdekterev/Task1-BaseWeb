<?php

/**
 * Form Controller
 */
class Forms extends Controller
{
    protected object $formModel;

    public function __construct()
    {
        $this->formModel = $this->model('Form');
    }

}