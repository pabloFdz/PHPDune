<?php

namespace App\Listeners;

use App\Events\ThemeSelected;
use Native\Laravel\Facades\Electron;
use Native\Laravel\Facades\Native as NativeFac;
class BroadcastThemeSelection
{
    public function handle(ThemeSelected $event)
    {
        // The theme string is in $event->payload['theme']
        NativeFac::broadcast('theme-selected', [
            'theme' => $event->payload['theme']
        ]);
    }
}
// namespace App\Listeners;
//
// use Illuminate\Broadcasting\Channel;
// use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
// use Native\Laravel\Events\Menu\MenuItemClicked;
//
// class BroadcastThemeSelection implements ShouldBroadcastNow
// {
//     public function __construct() {}
//     public function __invoke() {}
//     public function broadcastOn(): array
//     {
//         return [
//             new Channel('nativephp'),
//             'theme-selected', [
//                 'theme' => $event->payload['theme']
//             ]
//         ];
//     }
// }
