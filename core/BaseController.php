<?php

namespace InfinityCore\Core;

class BaseController
{
    protected BaseView $view;

    /**
     * BaseController constructor.
     * @return void
     */
    public function viewLoad(): void
    {
        $this->view = new BaseView();
    }
}