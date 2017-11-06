[![](https://img.shields.io/maintenance/yes/2017.svg)](https://github.com/fritzmg/contao-ajax-layout)
[![](https://img.shields.io/packagist/v/fritzmg/contao-ajax-layout.svg)](https://packagist.org/packages/fritzmg/contao-ajax-layout)
[![](https://img.shields.io/packagist/dt/fritzmg/contao-ajax-layout.svg)](https://packagist.org/packages/fritzmg/contao-ajax-layout)

Contao AJAX Layout
=====================

Contao extension to automatically use a different page layout for AJAX requests.

![screenshot](https://raw.githubusercontent.com/fritzmg/contao-ajax-layout/master/screenshot.png)

When this option is enabled in your page layout, all AJAX request to pages with this layout will generate the page under a different, minimal layout, with only the regular article module. By default, only the content of the main columdn will be returned. This helps reduce the processing time for generating the page and reduces the amount of data sent to the client via AJAX.

You can also set another page layout to be used as your AJAX layout for this page layout.
