<?php

use Shaarli\Router;
use Shaarli\Legacy\LegacyRouter;
use Shaarli\Plugin\PluginManager;

/**
 * Get the available Shaarli router class.
 * Keeps compatibility with older Shaarlies besides supporting the new Slim rewrite.
 * 
 * @see: https://github.com/shaarli/Shaarli/pull/1511
 * @see: https://github.com/ilesinge/shaarli-related/pull/4/files
 * 
 * @return string - the namespaced router class name
 */
function eo_get_router()
{
    /** introduced with the Slim rewrite of the recent Shaarli */
    $newShaarliRouter = 'Shaarli\Legacy\LegacyRouter';
    /** original router class of old Shaarlies */
    $oldShaarliRouter = 'Shaarli\Router';

    if (class_exists($newShaarliRouter)) {
        return $newShaarliRouter;
    }

    return $oldShaarliRouter;
}

/**
 * Get plugin assets base path
 * 
 * @param array $data - hook data
 * 
 * @return string - the basepath of the assets
 */
function eo_get_basepath($data) {
    return ($data['_BASE_PATH_'] ?? '') . '/' . PluginManager::$PLUGINS_PATH;
}

function hook_emojione_render_includes($data)
{
    $router = eo_get_router();

    $data['css_files'][] = eo_get_basepath($data) . '/emojione/assets/css/emojione.css';

    if ($data['_PAGE_'] == $router::$PAGE_EDITLINK) {
        $data['css_files'][] = eo_get_basepath($data) . '/emojione/assets/css/autocomplete.css';
    }

    return $data;
}

function hook_emojione_render_footer($data)
{
    $router = eo_get_router();

    /*
     * Comment the five lines below to disable the autocomplete function.
     * If your theme use jquery, you must comment the jquery.min.js line to avoid conflicts.
     */
    if ($data['_PAGE_'] == $router::$PAGE_EDITLINK) {
        $data['js_files'][] = eo_get_basepath($data) . '/emojione/assets/js/jquery.min.js';
        $data['js_files'][] = eo_get_basepath($data) . '/emojione/assets/js/textcomplete.min.js';
        $data['js_files'][] = eo_get_basepath($data) . '/emojione/assets/js/autocomplete.js';
    }

    $data['js_files'][] = eo_get_basepath($data) . '/emojione/assets/js/emojione.min.js';
    $data['js_files'][] = eo_get_basepath($data) . '/emojione/assets/js/unicode.js';
    $data['js_files'][] = eo_get_basepath($data) . '/emojione/assets/js/emojione.js';

    return $data;
}
