<?php
defined('_JEXEC') or die;

require dirname(__FILE__) . '/php/init.php';

?>
<!doctype html>
<head>
    <jdoc:include type="head" />
	<link rel="stylesheet" href="/templates/osago/css/template.css" type="text/css">
	<link rel="stylesheet" href="/templates/osago/css/bootstrap.modal.css" type="text/css">
	<link rel="stylesheet" href="/templates/osago/css/jcarousel.responsive.css" type="text/css">
	<script src="/templates/osago/js/libs/jquery.jcarousel.min.js" type="text/javascript"></script>
	<script src="/templates/osago/js/libs/jquery.scrollTo.js" type="text/javascript"></script>
	<script src="/media/jui/js/bootstrap.min.js" type="text/javascript"></script>
	<?php if (preg_match('/kalkulyator/', $_SERVER['REQUEST_URI'])) : ?>
		<script src="/templates/osago/js/libs/jquery.maskedinput.js" type="text/javascript"></script>
		<script src="/templates/osago/js/calculator.min.js" type="text/javascript"></script>
	<?php endif; ?>
	<?php if (JFactory::getURI()->toString() == JURI::base() || JFactory::getURI()->toString() == JURI::base() . 'index.php') : ?>
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&language=ru"></script>
		<script type="text/javascript">
			function initialize() {
				var latlng = new google.maps.LatLng(50.4591235, 30.4881182);
				var settings = {
					zoom: 15,
					center: new google.maps.LatLng(50.461082, 30.503200),
					mapTypeControl: false,
					mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
					navigationControl: true,
					navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
					mapTypeId: google.maps.MapTypeId.ROADMAP
				};

				var map = new google.maps.Map(document.getElementById("map_canvas"), settings);
				
				var companyPos = new google.maps.LatLng(50.4591235, 30.4904182);
				var companyLogo = new google.maps.MarkerImage('images/map/mark.png',
					new google.maps.Size(100,120),
					new google.maps.Point(0,0),
					new google.maps.Point(55,97)
				);
				var companyMarker = new google.maps.Marker({
					position: companyPos,
					map: map,
					icon: companyLogo,
					title:"Company Title",
				});
				
				var styles = [{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#e0efef"}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"hue":"#1900ff"},{"color":"#c0e8e8"}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":100},{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"visibility":"on"},{"lightness":700}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#7dcdcd"}]}]

				map.setOptions({styles: styles});

			}
		</script>
	<?php endif; ?>

</head>
<body <?php echo ((JFactory::getURI()->toString() == JURI::base() || JFactory::getURI()->toString() == JURI::base() . 'index.php') ? 'onload="initialize()"' : "") ?> class="<?php echo $tpl->getBodyClasses(); ?>">
	<div class="wrapper">
		<header>
			<div class="header-line"></div>
			<div class="header-wrap">
				<div class="logo">
					<jdoc:include type="modules" name="logo" />
				</div>
				<div class="menus">
					<div class="first-line">
						<div class="callme">
							<div class="phone">+38 (050) 608 94 18</div>
							<jdoc:include type="modules" name="callme" />
						</div>
						<div class="soc_buttons">
							<jdoc:include type="modules" name="soc_buttons" />
						</div>
						<div class="submenu">
							<jdoc:include type="modules" name="submenu" />
						</div>
						<div class="clear"></div>
					</div>
					<div class="menu">
						<jdoc:include type="modules" name="menu" />
					</div>
				</div>
			</div>
		</header>
		
		<?php if (JFactory::getURI()->toString() == JURI::base() || JFactory::getURI()->toString() == JURI::base() . 'index.php') : ?>
			
			<div class="helper">
				<jdoc:include type="modules" name="block1" />
			</div>
			
			<div class="partners">
				<div class="jcarousel-wrapper">
						<jdoc:include type="modules" name="partners" />
					<a href="javascript:void(0)" class="jcarousel-control-prev"></a>
					<a href="javascript:void(0)" class="jcarousel-control-next"></a>
				</div>
			</div>
			
			<div class="blockwithbg">
				<div class="howitwork">
					<jdoc:include type="modules" name="howitwork" />
				</div>

				<div class="text-blocks">
					<div class="profile">
						<jdoc:include type="modules" name="profile" />
					</div>
					<div class="news">
						<jdoc:include type="modules" name="news"  style="XHTML"/>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			
			<div id="map" class="map">
				<div id="map_canvas"></div>
				<div class="map-wrap">
					<jdoc:include type="modules" name="map" />
				</div>
			</div>
			
		<?php else : ?>

			<div class="component-wrapper">
			
				<?php if (preg_match('/\/news/', $_SERVER['REQUEST_URI'])) : ?>
					<h2 class="page-head-title">		
						<span class="subheading-category">НОВОСТИ СТРАХОВОГО РЫНКА</span>
					</h2>
				<?php endif; ?>
				
				<?php if (preg_match('/\/partners/', $_SERVER['REQUEST_URI'])) : ?>
					<h2 class="page-head-title-gr">		
						<span class="subheading-category">ПАРТНЕРЫ</span>
					</h2>
				<?php endif; ?>

				<?php if (preg_match('/\/kalkulyator/', $_SERVER['REQUEST_URI'])) : ?>
					<h2 class="page-head-title-gr" style="color: #5f9a62;">
						<span class="subheading-category">КАЛЬКУЛЯТОР ОСАГО <br />(АВТОЦИВИЛКА, АВТОГРАЖДАНКА, ОСГПО)</span>
					</h2>
				<?php endif; ?>

				<?php if ($tpl->isError()) : ?>
					<jdoc:include type="message" />
				<?php endif; ?>

				<jdoc:include type="modules" name="pre_component" />
				<jdoc:include type="component" />
				
				<?php if (preg_match('/\/news\//', $_SERVER['REQUEST_URI'])) : ?>
					<div class="post-component">			
						<jdoc:include type="modules" name="post_component" />
						<div class="clear">
					</div>
				<?php endif; ?>
			</div>
		
		<?php endif; ?>
		
		<div class="foo-place"></div>
		
		<footer>
			<div class="footer-line"></div>
			<div class="footer-wrap">
				<div class="footer-logo">
					<jdoc:include type="modules" name="foo_logo" />
				</div>
				<div class="footer-paysysts"></div>
				<div class="footer-copyright">
					&copy; 2014-<?=date("Y", time())?> ОСАГОUA. Страхование online.
				</div>
			</div>
		</footer>
	</div>
		
</body>
</html>
