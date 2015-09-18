<?php
/**
 * @package     Template.Schwaderhof
 *
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$app = JFactory::getApplication();
$doc = JFactory::getDocument();

// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');

// Add Stylesheets
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/template.css');

// Adjusting content width
$left  = $this->countModules('position-7');
$right = $this->countModules('position-8');

if ($left && $right)
{
	$span = 'span6';
}
elseif (($left && !$right) || (!$left && $right))
{
	$span = 'span9';
}
else
{
	$span = 'span12';
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
			<header class="header" role="banner">
				<div class="header-inner">
					<a class="brand" href="<?php echo $this->baseurl; ?>/">
						<span class="site-title"><?php echo $app->get('sitename'); ?></span>
					</a>
					<div class="header-search pull-right">
						<jdoc:include type="modules" name="position-0" style="none" />
					</div>
				</div>
				<?php if ($this->countModules('position-1')) : ?>
					<nav class="navigation" role="navigation">
						<div class="navbar pull-left">
							<a class="btn btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</a>
						</div>
						<div class="nav-collapse">
							<jdoc:include type="modules" name="position-1" style="none" />
						</div>
					</nav>
				<?php endif; ?>
			</header>
			<jdoc:include type="modules" name="banner" style="xhtml" />
			<div class="row-fluid">
				<?php if ($left) : ?>
					<div id="sidebar" class="span3">
						<div class="sidebar-nav">
							<jdoc:include type="modules" name="position-7" style="xhtml" />
						</div>
					</div>
				<?php endif; ?>
				<main id="content" role="main" class="<?php echo $span; ?>">
					<jdoc:include type="modules" name="position-3" style="xhtml" />
					<jdoc:include type="message" />
					<jdoc:include type="component" />
					<jdoc:include type="modules" name="position-2" style="none" />
				</main>
				<?php if ($right) : ?>
					<div id="aside" class="span3">
						<jdoc:include type="modules" name="position-8" style="well" />
					</div>
				<?php endif; ?>
			</div>
		</div>
		<footer class="footer" role="contentinfo">
				<jdoc:include type="modules" name="footer" style="none" />
		</footer>
	</div>
	<jdoc:include type="modules" name="debug" style="none" />
</body>
</html>
