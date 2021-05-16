<?php

if (!function_exists('model_has_attribute')) {
    function model_has_attribute(\Illuminate\Database\Eloquent\Model $model, string $key)
    {
        return array_key_exists($key, $model->attributesToArray());
    }
}

if (!function_exists('slugger')) {
    function slugger(string $string, string $class): string
    {
        $x = 0;
        $slug = strtolower(preg_replace('/\s/', '_', str_replace('-', '_', $string)));
        while ($class::where('slug', $x !== 0 ? $slug . '_' . $x : $slug)->first()) {
            $x !== 0 ? ++$x : $x = 1;
        }
        return $x !== 0 ? $slug . '_' . $x : $slug;
    }
}

if (!function_exists('get_slug')) {
    function get_slug(string $string): string
    {
        return strtolower(preg_replace('/\s/', '_', $string));
    }
}
