<?php defined('_JEXEC') or die;

/**
 * File       .php
 * Created    2/10/14 8:57 AM
 * Author     Matt Thomas | matt@betweenbrain.com | http://betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2014 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v3 or later
 */

jimport('joomla.plugin.plugin');

class plgSystemTdwfb extends JPlugin
{
	function plgSystemTdwfb(&$subject, $params)
	{
		parent::__construct($subject, $params);

		$this->app = JFactory::getApplication();
	}

	function onAfterRender()
	{

		if ($this->app->isAdmin())
		{
			return true;
		}

		$banner = '<!--[if !(lt IE 8)]><!-->
		<script type="text/javascript">
			(function(){var e=document.createElement("script");e.type="text/javascript";e.async=true;e.src=document.location.protocol+"//d1agz031tafz8n.cloudfront.net/thedaywefightback.js/widget.min.js";var t=document.getElementsByTagName("script")[0];t.parentNode.insertBefore(e,t)})()
		</script>
	<!--<![endif]-->';

		$buffer = JResponse::getBody();

		// Convert pseudo tags to real HTML tags
		$buffer = str_replace('</body>', $banner . "\n" . '</body>', $buffer);

		JResponse::setBody($buffer);

		return true;
	}
}