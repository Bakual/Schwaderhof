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
JHtmlBootstrap::framework();
JHtmlBootstrap::carousel();
$doc->addScriptDeclaration("
	jQuery(document).ready(function($) {
		$('.carousel').carousel('cycle')
	});
");

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
			<div class="beforeheader"></div>
			<header class="header" role="banner">
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
				<div id="headerCarousel" class="carousel slide">
					<ol class="carousel-indicators">
						<li data-target="#headerCarousel" data-slide-to="0" class="active"></li>
						<li data-target="#headerCarousel" data-slide-to="1"></li>
						<li data-target="#headerCarousel" data-slide-to="2"></li>
						<li data-target="#headerCarousel" data-slide-to="3"></li>
						<li data-target="#headerCarousel" data-slide-to="4"></li>
					</ol>
					<!-- Carousel items -->
					<div class="carousel-inner">
						<div class="active item"><img src="images/slides/slide1.jpg" /></div>
						<div class="item"><img src="images/slides/slide2.jpg" /></div>
						<div class="item"><img src="images/slides/slide3.jpg" /></div>
						<div class="item"><img src="images/slides/slide4.jpg" /></div>
						<div class="item"><img src="images/slides/slide5.jpg" /></div>
					</div>
					<!-- Carousel nav -->
					<a class="carousel-control left" href="#headerCarousel" data-slide="prev">&lsaquo;</a>
					<a class="carousel-control right" href="#headerCarousel" data-slide="next">&rsaquo;</a>
				</div>
				<jdoc:include type="modules" name="banner" style="xhtml" />
				<jdoc:include type="modules" name="breadcrumb" style="xhtml" />
			</header>
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
