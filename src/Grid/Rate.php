<?php

namespace Cooper\DcatUi\Grid;

use Dcat\Admin\Grid\Displayers\AbstractDisplayer;

class Rate extends AbstractDisplayer
{
    public function display(): string
    {
        return $this->value . '%';
    }
}
