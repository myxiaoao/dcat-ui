<?php

namespace Cooper\DcatUi\Show;

use Dcat\Admin\Show\AbstractField;

class EmptyData extends AbstractField
{
    public function render()
    {
        return $this->value ?: '-';
    }
}
