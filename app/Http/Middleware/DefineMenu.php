<?php

namespace App\Http\Middleware;

use Closure;
use Lavary\Menu\Facade as Menu;

class DefineMenu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Menu::make('primary', function ($menu) {
            $menu->add('<i class="fe fe-home"></i>&nbsp;&nbsp;Home');
            $menu->add('<i class="fe fe-tag"></i>&nbsp;&nbsp;Gerenciador de Tags', 'tags-manager');
            $menu->add('<i class="fe fe-user-x"></i>&nbsp;&nbsp;Não Contactar', 'do-not-contact');
            $menu->add('<i class="fe fe-settings"></i>&nbsp;&nbsp;Configurações', 'settings');
        });

        return $next($request);
    }
}
