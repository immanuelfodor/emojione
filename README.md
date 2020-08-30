# Shaarli Plugin Emojione

Add colorful emojis to your Shaarli.

## Installation

```bash
cd plugins
git clone https://github.com/immanuelfodor/emojione.git
```

Or download the zip archive and extract it in `plugins/emojione`.

Then activate the new plugin.

## Options

ASCII Smiley is deactivated by default.  
http://git.emojione.com/demos/latest/ascii-smileys.html  
To activate it, edit `assets/js/emojione.js`:

```javascript
emojione.ascii = false; /* change to 'true' to have ASCII conversion */
```

SVG is the default format for emojis. If you prefer PNG, edit `assets/js/emojione.js`:

```javascript
emojione.imageType = 'svg'; /* change to 'png' to have emojis in PNG */
```

The autocomplete function is activated by default.  
http://git.emojione.com/demos/latest/autocomplete.html  
To deactivate it, edit `emojione.php`:

```php
    /*
     * Comment the five lines below to disable the autocomplete function.
     * If your theme use jquery, you must comment the jquery.min.js line to avoid conflicts.
     */
#    if (eo_strip_underscores($data['_PAGE_']) == eo_strip_underscores($router::$PAGE_EDITLINK)) {
#        $data['js_files'][] = PluginManager::$PLUGINS_PATH . '/emojione/assets/js/jquery.min.js';
#        $data['js_files'][] = PluginManager::$PLUGINS_PATH . '/emojione/assets/js/textcomplete.min.js';
#        $data['js_files'][] = PluginManager::$PLUGINS_PATH . '/emojione/assets/js/autocomplete.js';
#    }
```

## Compatibility

The plugin and the options are fully compatible with these themes:
- Default
- Material (https://github.com/kalvn/Shaarli-Material)
- AlbinoMouse (https://github.com/alexisju/albinomouse-template) - Untested in this fork
