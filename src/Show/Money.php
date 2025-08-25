<?php

namespace Cooper\DcatUi\Show;

use Dcat\Admin\Show\AbstractField;

class Money extends AbstractField
{
    public $symbol;

    public function render(): string
    {
        return $this->symbol . number_format((float)bcdiv((string)$this->value, '100', 2), 2, '.', '');
    }
}
