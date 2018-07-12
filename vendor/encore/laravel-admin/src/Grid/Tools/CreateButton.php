<?php

namespace Encore\Admin\Grid\Tools;

use Encore\Admin\Grid;
use Illuminate\Support\Facades\Request;

class CreateButton extends AbstractTool
{
    /**
     * Create a new CreateButton instance.
     *
     * @param Grid $grid
     */
    public function __construct(Grid $grid)
    {
        $this->grid = $grid;
    }

    /**
     * Render CreateButton.
     *
     * @return string
     */
    public function render()
    {
        if (!$this->grid->allowCreation()) {
            return '';
        }
        $url=http_build_query(Request::all());

        $new = trans('admin.new');

        return <<<EOT

<div class="btn-group pull-right" style="margin-right: 10px">
    <a href="{$this->grid->resource()}/create?{$url}" class="btn btn-sm btn-success">
        <i class="fa fa-save"></i>&nbsp;&nbsp;{$new}
    </a>
</div>

EOT;
    }
}
