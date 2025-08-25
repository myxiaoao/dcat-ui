<?php

namespace Cooper\DcatUi\Grid;

use Dcat\Admin\Grid\Displayers\AbstractDisplayer;

class Money extends AbstractDisplayer
{
    public $symbol;

    public function display(): string
    {
        return $this->symbol . number_format((float)bcdiv((string)$this->value, '100', 2), 2, '.', '');
    }
}
