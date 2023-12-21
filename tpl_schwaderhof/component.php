<?php
/**
 * @package     Template.Schwaderhof
 *
 * @copyright   Thomas Hunziker
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\Helpers\Bootstrap;
use Joomla\CMS\HTML\HTMLHelper;

/** @var Joomla\CMS\Document\HtmlDocument $this */

$doc = Factory::getApplication()->getDocument();

// Add Stylesheets
Bootstrap::loadCss();
HTMLHelper::stylesheet('system/joomla-fontawesome.min.css', ['relative' => true]);
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/template.css');
?>
<!DOCTYPE html>
<html>
<head>
	<jdoc:include type="head"/>
</head>
<body class="component">
<div id="wrapper">
	<main id="content">
		<jdoc:include type="message"/>
		<jdoc:include type="component"/>
	</main>
</div>
</body>
</html>
