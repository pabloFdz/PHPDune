<?php

namespace App\Providers;

use App\Events\MyCustomMenuEvent;
use App\Events\ThemeSelected;
use Native\Laravel\Facades\Menu;
use Native\Laravel\Facades\Window;

class NativeAppServiceProvider
{
    public function boot(): void
    {
        // Menu::default();
        Menu::create(
            Menu::app(),
            Menu::file(),
            Menu::edit(),
            Menu::make(
                Menu::radio('dune')->checked(),
                Menu::radio('eclipse'),
                Menu::radio('icecoder'),
                Menu::radio('idea'),
                Menu::radio('midnight'),
                Menu::radio('monokai'),
                Menu::radio('moxer'),
                Menu::radio('neat'),
                Menu::radio('neo'),
                Menu::radio('oceanic-next'),
                Menu::radio('solarized-dark'),
                Menu::radio('solarized-light'),
                Menu::radio('ttcn'),
                Menu::radio('yonce'),
                Menu::radio('zenburn')
            )->label('Themes'),
            Menu::make(
                Menu::link('https://salmonjump.com')
                    ->openInBrowser()
                    ->label('Visit Salmon Jump'),
            )->label('About'),
        );

        Window::open()
            ->url(route('app'))
            ->titleBarHiddenInset()
            ->fullscreenable(false)
            ->width(1024)
            ->height(768);
    }
}
