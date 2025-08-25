<?php

namespace Cooper\DcatUi;

use Cooper\DcatUi\Grid\DisPlayers\Actions\Actions;
use Dcat\Admin\Admin;
use Dcat\Admin\Color;
use Dcat\Admin\Extend\ServiceProvider;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Layout\Navbar;
use Dcat\Admin\Show;
use Dcat\Admin\Show\Field;

class DcatUiServiceProvider extends ServiceProvider
{
    protected $type = self::TYPE_THEME;

    protected $js = [
        'js/dcat-ui.js',
    ];

    protected $css = [
        'css/adminlte-gray.css',
        'css/dcat-app-gray.css',
        'css/dcat-ui.css?v=1.0.0',
    ];

    public function register()
    {

    }

    public function init()
    {
        parent::init();

        Admin::requireAssets('@cooper.dcat-ui');

        Grid::resolving(static function (Grid $grid) {
            $grid->disableColumnSelector();
            $grid->disableRowSelector();
            $grid->disableViewButton();
            $grid->filter(function (Grid\Filter $filter) {
                $filter->panel();
                $filter->withoutInputBorder();
            });
            $grid->toolsWithOutline(false);
            $grid->disableRefreshButton();
            $grid->expandFilter();
        });

        Form::resolving(static function (Form $form) {
            $form->disableEditingCheck();
            $form->disableCreatingCheck();
            $form->disableViewCheck();
            $form->disableViewButton();
            $form->disableDeleteButton();
        });

        Show::resolving(static function (Show $show) {
            $show->disableDeleteButton();
            $show->disableEditButton();
        });

        Color::extend('gray', [
            'primary' => '#171717',
            'primary-darker' => '#171717',
            'link' => '#171717',
        ]);

        Grid::resolving(static function (Grid $grid) {
            $grid->setActionClass(Actions::class);
        });

        Grid\Column::extend('code', function ($v) {
            return "<code>$v</code>";
        });

        Grid\Column::extend('emp', \Cooper\DcatUi\Grid\EmptyData::class);
        Field::extend('emp', \Cooper\DcatUi\Show\EmptyData::class);

        Grid\Column::extend('usd', \Cooper\DcatUi\Grid\USD::class);
        Field::extend('usd', \Cooper\DcatUi\Show\USD::class);
        Form::extend('usd', \Cooper\DcatUi\Form\USD::class);

        Grid\Column::extend('cny', \Cooper\DcatUi\Grid\CNY::class);
        Field::extend('cny', \Cooper\DcatUi\Show\CNY::class);
        Form::extend('cny', \Cooper\DcatUi\Form\CNY::class);

        Grid\Column::extend('rate', \Cooper\DcatUi\Grid\Rate::class);
        Field::extend('rate', \Cooper\DcatUi\Show\Rate::class);

        Admin::navbar(static function (Navbar $navbar) {
            // $navbar->right((new RefreshButton)->render());
        });

        app('view')->prependNamespace('admin', base_path('vendor/cooper/dcat-ui/resources/views/dcat-admin'));
    }
}
