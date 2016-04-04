<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @license LGPL-3.0+
 */

use Contao\PageModel;
use Contao\PageRegular;
use Contao\LayoutModel;
use Contao\Environment;


/**
 * Helper class for Ajax Layout selection
 *
 * @author Fritz Michael Gschwantner <https://github.com/fritzmg>
 */
class AjaxLayout
{
	public function getPageLayout( PageModel $objPage, LayoutModel &$objLayout, PageRegular $objPageRegular )
	{
		// layout must use ajax layout
		if( !$objLayout->useAjaxLayout )
			return;

		// request must be ajax
		if( !Environment::get('isAjaxRequest') )
			return;

		// set custom or default ajax layout
		if( $objLayout->customAjaxLayout )
		{
			// load custom layout
			if( ( $objAjaxLayout = LayoutModel::findById( $objLayout->customAjaxLayout ) ) !== null )
			{
				$objLayout = $objAjaxLayout;
			}
		}
		else
		{
			// create default layout
			$pid = $objLayout->pid;
			$objLayout = new LayoutModel();
			$objLayout->pid = $pid;
			$objLayout->rows = '1rw';
			$objLayout->cols = '1cl';
			$objLayout->orderExt = '';
			$objLayout->modules = 'a:1:{i:0;a:3:{s:3:"mod";s:1:"0";s:3:"col";s:4:"main";s:6:"enable";s:1:"1";}}';
			$objLayout->template = 'fe_page_ajax';
			$objLayout->doctype = $objLayout->doctype;
		}
	}
}
