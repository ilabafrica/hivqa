<?php

function cleanCode($dirtyCode)
{
    $cleanCode = filter_var($dirtyCode, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

    $cleanCode = preg_replace('/[^A-Za-z0-9\-]/', '_', strtolower(trim($cleanCode)));

    return str_slug($cleanCode);
}


function stdclassToArray($stdclass)
{
    return json_decode(json_encode($stdclass), true);
}

function assetUrl($path, $secure = null)
{
    $actualPath = env('APP_ASSET_PREPEND', '');

    if (substr($actualPath, -1) != '/') {
        $actualPath .= '/';
    }

    $actualPath .= 'assets';

    if ($path[0] != '/') {
        $actualPath .= '/';
    }

    $actualPath .= $path;

    return asset($actualPath, $secure);
}

function checkActiveLink($routeToCheck)
{

    if (strpos(\request()->route()->getName(), $routeToCheck) === false) {
        return '';
    }

    return 'class="active-link"';

}

function checkActiveLinkExact($routeToCheck)
{

    if (\request()->route()->getName() != $routeToCheck) {
        return '';
    }

    return 'class="active-link"';

}


function checkActiveGroupLink(array $routeToCheck)
{

    if (!in_array(\request()->route()->getName(), $routeToCheck)) {
        return '';
    }

    return 'class="active-sub active"';

}