<?php

if (!function_exists('is_local_env')) {
    function is_local_env(): bool
    {
        return config('app.env') === 'local';
    }
}
