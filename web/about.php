<?php
/**
 * @author Akbar Khrisna <akbarkhrisna@gmail.com>
 * @copyright Copyright: Akbar Khrisna, Kafeinfo Bookmarking Sosial 2008.
 * @abstract About us page.
 */

	/** start the session by requesting the controller */
	require_once("controller.inc.php");
	
	/** the main function */
	function main($smarty)
	{
		// global variables
		global $templates;
		
		// initial variables
		$template = $templates['about'];
		$template_gradient = "includes/static.gradient.tpl";
		$template_regular = "static/about.tpl";
		$template_footer = "includes/footer.black.tpl";
		$page = "about";
		
		// pass variables to the template
		$smarty->assign('content_section', $template);
		$smarty->assign('regular_section', $template_regular);
		$smarty->assign('gradient_content',$template_gradient);
		$smarty->assign('regular_footer_section',$template_footer);
		$smarty->assign('staticpage',$page);
	}
?>