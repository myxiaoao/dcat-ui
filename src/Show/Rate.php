<?php

namespace Cooper\DcatUi\Show;

use Dcat\Admin\Show\AbstractField;

class Rate extends AbstractField
{
    public function render(): string
    {
        return $this->value . '%';
    }
}
