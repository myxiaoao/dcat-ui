<?php

namespace Cooper\DcatUi\Widgets;

use Illuminate\Contracts\Support\Renderable;

class RefreshButton implements Renderable
{
    public function render()
    {
        return view('cooper.dcat-ui::dcat-admin.widgets.refresh-btn');
    }
}
