<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @license LGPL-3.0+
 */


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	'AjaxLayout' => 'system/modules/ajax_layout/classes/AjaxLayout.php'
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'fe_page_ajax' => 'system/modules/ajax_layout/templates'
));
