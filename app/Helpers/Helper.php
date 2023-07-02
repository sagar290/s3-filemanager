<?php


use Illuminate\Support\Str;

if(!function_exists('underscore_to_camel_case')) {
    function underscore_to_camel_case($string, $capitalizeFirstCharacter = false): string
    {

        $str = str_replace(' ', '', ucwords(str_replace('_', ' ', $string)));

        if (!$capitalizeFirstCharacter) {
            $str[0] = strtolower($str[0]);
        }

        return $str;
    }
}

if(!function_exists('separate_bucket_and_path_from_string')) {
    function separate_bucket_and_path_from_string(string $path): array
    {
        $pathExplode = explode('/', $path);
        // get bucket name
        $bucketName = $pathExplode[0];

        if (count($pathExplode) > 1) {
            $path = Str::replace($bucketName . '/', '', $path) . '/';
        } else {
            $path = '';
        }

        return [$bucketName, $path];
    }
}

if ( ! function_exists('normalize_path')) {
    function normalize_path($path): string
    {
        $path = Str::replace("#\/+#", "/", $path);
        return Str::startsWith($path, '/') ? Str::replaceFirst('/', '', $path) : $path;
    }
}
