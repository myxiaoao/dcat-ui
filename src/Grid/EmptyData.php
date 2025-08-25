<?php

namespace Cooper\DcatUi\Grid;

use Dcat\Admin\Grid\Displayers\AbstractDisplayer;

class EmptyData extends AbstractDisplayer
{
    public function display($placeholder = '-')
    {
        return $this->value ?: $placeholder;
    }
}
