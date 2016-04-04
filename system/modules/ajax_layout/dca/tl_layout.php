<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @license LGPL-3.0+
 */


$GLOBALS['TL_DCA']['tl_layout']['palettes']['default'] .= ';{ajax_legend},useAjaxLayout,customAjaxLayout';

$GLOBALS['TL_DCA']['tl_layout']['fields']['useAjaxLayout'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['useAjaxLayout'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50 m12'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_layout']['fields']['customAjaxLayout'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['customAjaxLayout'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'foreignKey'              => 'tl_layout.name',
	'options_callback'        => array('tl_layout_ajax_layout', 'getPageLayouts'),
	'eval'                    => array('chosen'=>true, 'tl_class'=>'w50'),
	'sql'                     => "int(10) unsigned NOT NULL default '0'",
	'relation'                => array('type'=>'hasOne', 'load'=>'lazy')
);
 

/**
 * Provide miscellaneous methods that are used by the data configuration array.
 *
 * @author Fritz Michael Gschwantner <https://github.com/fritzmg>
 */
class tl_layout_ajax_layout extends \Backend
{
	/**
	 * Return all page layouts grouped by theme
	 *
	 * @return array
	 */
	public function getPageLayouts()
	{
		$objLayout = $this->Database->execute("SELECT l.id, l.name, t.name AS theme FROM tl_layout l LEFT JOIN tl_theme t ON l.pid=t.id ORDER BY t.name, l.name");

		if ($objLayout->numRows < 1)
		{
			return array();
		}

		$return = array();
		$return[0] = '-';

		while ($objLayout->next())
		{
			$return[$objLayout->theme][$objLayout->id] = $objLayout->name;
		}

		return $return;
	}
}
