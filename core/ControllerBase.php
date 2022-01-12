<?php

namespace InfinityCore\Core;

class ControllerBase
{
    protected ViewBase $view;

    /**
     * ControllerBase constructor.
     * @return void
     */
    public function viewLoad(): void
    {
        $this->view = new ViewBase();
    }
}