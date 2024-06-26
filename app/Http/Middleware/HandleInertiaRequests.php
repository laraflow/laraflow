<?php

namespace App\Http\Middleware;

use Diglactic\Breadcrumbs\Breadcrumbs;
use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * Determine the current asset version.
     */
    public function version(Request $request): string|null
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return [
            ...parent::share($request),
            'auth.user' => $request->user(),
            'flash.message' => fn() => $request->session()->get('message'),
            'breadcrumbs.entries' => fn() => Breadcrumbs::generate()->toArray(),
            'breadcrumbs.current' => fn() => Breadcrumbs::generate()->last(),
        ];
    }
}
