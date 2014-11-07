<?php

	/**
	 * @author Akbar Khrisna <akbarkhrisna@gmail.com>
	 * @copyright Copyright: Akbar Khrisna, Kafeinfo Bookmarking Sosial 2009.
	 * @abstract Template and styling configuration
	 */

	// assign the base templates
	$main_template = "main.tpl";
	$header_template = "includes/header.inc.tpl";
	$links_template = "includes/links.inc.tpl";
	$stylesheets_template = "includes/stylesheets.inc.tpl";
	$languages_template = "includes/languages.inc.tpl";
	$javascript_template = "includes/javascript.inc.tpl";
	$logo_template = "includes/logo.inc.tpl";
	$sublinks_template = "includes/sublinks.inc.tpl";
	$footer_template = "includes/footer.inc.tpl";
	$statistics_template = "includes/statistics.inc.tpl";
	$meta_template = "includes/meta.inc.tpl";
	$gradient_template = "includes/gradient.inc.tpl";
	$filter_template = "includes/filter.inc.tpl";
	$paging_template = "includes/paging.inc.tpl";
	
	// set global templates for pages
	$templates = array();
	$templates['newslist'] = "newscontent.tpl"; // index template
	$templates['about'] = "regularcontent.tpl"; // about us template
	$templates['login'] = "regularcontent.tpl"; // login template
	$templates['register'] = "regularcontent.tpl"; // register template
	$templates['activation'] = "regularcontent.tpl"; // activation template
	$templates['getactivation'] = "regularcontent.tpl"; // get activation template
	$templates['getpassword'] = "regularcontent.tpl"; // get activation template
	$templates['howto'] = "regularcontent.tpl"; // how to template
	$templates['terms'] = "regularcontent.tpl"; // terms of use template
	$templates['profile'] = "regularcontent.tpl";
	$templates['favourites'] = "regularcontent.tpl";
	$templates['comments'] = "regularcontent.tpl";
	$templates['news'] = "regularcontent.tpl";
	$templates['submit'] = "regularcontent.tpl";
	$templates['tools'] = "regularcontent.tpl";
	$templates['details'] = "detailscontent.tpl"; // terms of use template
	
	// set text for homepage
	$hometext = array();
	$hometext['en'][0] = "Welcome to Kafeinfo Bookmarking Sosial, for newest news please choose <a href='upcoming.php'>UPCOMING</a> page.";
	$hometext['en'][1]  = "Welcome to Kafeinfo Bookmarking Sosial, please take a minute to view <a href='howto.php'>how Kafeinfo works</a>.";
	$hometext['en'][2]  = "Welcome to Kafeinfo Bookmarking Sosial, for newest news please choose <a href='upcoming.php'>UPCOMING</a> page.";
	$hometext['ina'][0] = "Selamat datang di Kafeinfo Bookmarking Sosial, silahkan melihat halaman <a href='upcoming.php'>BERITA BARU</a> untuk membaca berita terkini.";
	$hometext['ina'][1]  = "Selamat datang di Kafeinfo Bookmarking Sosial, silahkan melihat <a href='howto.php'>CARA KERJA</a> KAFEINFO terlebih dahulu.";
	$hometext['ina'][2]  = "Selamat datang di Kafeinfo Bookmarking Sosial, silahkan melihat halaman <a href='upcoming.php'>BERITA BARU</a> untuk membaca berita terkini.";
	
	// assign variables for templates
	$titlepage = "Kafeinfo Bookmarking Sosial";
	$stylepath = "style/";
	$faviconpath = "images/favicon.png";
	$charset = "utf-8";
	
	// amount of galli before showing in popular
	$newslistamt = 10;
	$galli = 5;

?>