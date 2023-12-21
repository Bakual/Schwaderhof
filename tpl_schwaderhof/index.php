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

// Adjusting content width
$left  = $this->countModules('position-7');
$right = $this->countModules('position-8');

if ($left && $right)
{
	$span = 'col-md-6';
}
elseif (($left && !$right) || (!$left && $right))
{
	$span = 'col-md-9';
}
else
{
	$span = 'col-md-12';
}
?>
<!DOCTYPE html>
<html>
<head>
	<jdoc:include type="head" />
</head>
<body>
	<div class="container">
		<div id="wrapper">
			<header class="header">
				<?php if ($this->countModules('menu', true)) : ?>
					<div class="container-nav">
						<jdoc:include type="modules" name="menu" style="none" />
					</div>
				<?php endif; ?>
				<jdoc:include type="modules" name="banner" style="xhtml" />
				<jdoc:include type="modules" name="breadcrumb" style="xhtml" />
			</header>
			<div class="row">
				<?php if ($left) : ?>
					<div id="sidebar" class="col-md-3">
						<div class="sidebar-nav">
							<jdoc:include type="modules" name="position-7" style="xhtml" />
						</div>
					</div>
				<?php endif; ?>
				<main id="content" class="<?php echo $span; ?>">
					<jdoc:include type="modules" name="position-3" style="xhtml" />
					<jdoc:include type="message" />
					<jdoc:include type="component" />
					<jdoc:include type="modules" name="position-2" style="none" />
				</main>
				<?php if ($right) : ?>
					<div id="aside" class="col-md-3">
						<jdoc:include type="modules" name="position-8" style="well" />
					</div>
				<?php endif; ?>
			</div>
		</div>
		<footer class="footer">
				<jdoc:include type="modules" name="footer" style="none" />
		</footer>
	</div>
	<jdoc:include type="modules" name="debug" style="none" />
</body>
</html>
