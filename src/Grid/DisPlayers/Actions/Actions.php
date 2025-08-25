<?php

namespace Cooper\DcatUi\Grid\DisPlayers\Actions;

use Dcat\Admin\Grid\Actions\Delete;
use Dcat\Admin\Grid\Actions\Edit;
use Dcat\Admin\Grid\Actions\QuickEdit;
use Dcat\Admin\Grid\Actions\Show;

class Actions extends \Dcat\Admin\Grid\Displayers\Actions
{
    protected $quickEditText = '编辑';

    protected $quickEditIcon = 'edit-1';

    protected $editText = '';

    protected $editIcon = 'edit';

    protected $viewText = '';

    protected $viewIcon = 'eye';

    protected $deleteText = '';

    protected $deleteIcon = 'trash';

    public function setQuickEditText($val)
    {
        $this->quickEditText = $val;

        return $this;
    }

    public function setQuickEditIcon($val)
    {
        $this->quickEditIcon = $val;

        return $this;
    }

    public function setEditText($val)
    {
        $this->editText = $val;

        return $this;
    }

    public function setEditIcon($val)
    {
        $this->editIcon = $val;

        return $this;
    }

    public function setViewText($val)
    {
        $this->viewText = $val;

        return $this;
    }

    public function setViewIcon($val)
    {
        $this->viewIcon = $val;

        return $this;
    }

    public function setDeleteText($val)
    {
        $this->deleteText = $val;

        return $this;
    }

    public function setDeleteIcon($val)
    {
        $this->deleteIcon = $val;

        return $this;
    }

    public function add($action)
    {
        $this->prepareAction($action);

        $this->custom[] = $action;

        return $this;
    }

    protected function renderView()
    {
        $action = config('admin.grid.actions.view') ?: Show::class;
        $action = $action::make($this->getViewLabel());
        $action->addHtmlClass(['mr-10px']);

        return $this->prepareAction($action);
    }

    protected function getViewLabel(): string
    {
        $label = $this->viewText ?: trans('admin.detail');

        return "<i title='{$label}' class=\"feather icon-{$this->viewIcon} grid-action-icon\"></i> {$label}";
    }

    protected function renderEdit()
    {
        $action = config('admin.grid.actions.edit') ?: Edit::class;
        $action = $action::make($this->getEditLabel());
        $action->addHtmlClass(['mr-10px']);

        return $this->prepareAction($action);
    }

    protected function getEditLabel(): string
    {
        $label = $this->editText ?: trans('admin.edit');

        return "<i title='{$label}' class=\"feather icon-{$this->editIcon} grid-action-icon\"></i> {$label}";
    }

    protected function renderQuickEdit()
    {
        $action = config('admin.grid.actions.quick_edit') ?: QuickEdit::class;
        $action = $action::make($this->getQuickEditLabel());
        $action->addHtmlClass(['mr-10px']);

        return $this->prepareAction($action);
    }

    protected function getQuickEditLabel(): string
    {
        $label = $this->quickEditText ?: trans('admin.quick_edit');

        return "<i title='{$label}' class=\"feather icon-{$this->quickEditIcon} grid-action-icon\"></i> {$label}";
    }

    protected function renderDelete()
    {
        $action = config('admin.grid.actions.delete') ?: Delete::class;
        $action = $action::make($this->getDeleteLabel());
        $action->addHtmlClass(['mr-10px']);

        return $this->prepareAction($action);
    }

    protected function getDeleteLabel(): string
    {
        $label = $this->deleteText ?: trans('admin.delete');

        return "<i class=\"feather icon-{$this->deleteIcon} grid-action-icon\" title='{$label}'></i> {$label}";
    }
}
