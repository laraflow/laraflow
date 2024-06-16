<?php

if (!function_exists('render')) {
    /***
     * @param string $component
     * @param array|\Illuminate\Contracts\Support\Arrayable $props
     * @return \Inertia\Response
     */
    function render(string $component, array|\Illuminate\Contracts\Support\Arrayable $props = []): \Inertia\Response
    {
        return \Inertia\Inertia::render($component, $props);
    }
}
