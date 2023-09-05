<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
	<?php endif; ?>
	<?php wp_enqueue_script("jquery"); ?>

	<?php wp_head(); ?>
	
	<script src="https://code.createjs.com/easeljs-0.8.0.min.js"></script>
	<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

		<script type="application/javascript">
      function draw() {
		  const canvas = document.getElementById("careerMap");
		  const ctx = canvas.getContext("2d");

		  // Define background colors and padding
		  const colors = ["#E3F6F3", "#FCEEB5", "#FFF6CC", "#FFCCB6"];
		  const padding = 1;
		  const stripHeight = (canvas.height - 2 * padding) / colors.length;

		  // Draw background strips and dots
		  for (let i = 0; i < colors.length; i++) {
		    const startY = padding + i * stripHeight;
		    const endY = startY + stripHeight;

		    // Draw background strip
		    ctx.fillStyle = colors[i];
		    ctx.fillRect(0, startY, canvas.width, stripHeight);

		    // Draw dots
		    const dotSize = 5;
		    const dotSpacing = 20;
		    const dotColor = darkenColor(colors[i], 0.2);
		    const dotCoordinates = [  [50, 50],
		    	[100, 100],
			  	[150, 150]
			  	// add more coordinates as needed
				];
				for (let j = 0; j < dotCoordinates.length; j++) {
					const [x, y] = dotCoordinates[j];
					drawCircle(ctx, x, y, dotSize, dotColor);
				}

		  // Add hover effect to dots
		  canvas.addEventListener("mousemove", (e) => {
		    const mouseX = e.clientX - canvas.offsetLeft;
		    const mouseY = e.clientY - canvas.offsetTop;

		    for (let i = 0; i < colors.length; i++) {
		      const startY = padding + i * stripHeight;
		      const endY = startY + stripHeight;

		      for (let x = dotSpacing; x < canvas.width - dotSpacing; x += dotSpacing) {
		        const y = startY + stripHeight / 2;
		        const dist = Math.sqrt((mouseX - x) ** 2 + (mouseY - y) ** 2);

		        if (dist < dotSize + 10) {
		          drawCircle(ctx, x, y, dotSize + 2, "white", "rgba(255, 255, 255, 0.5)");
		        } else {
		          const dotColor = darkenColor(colors[i], 0.2);
		          drawCircle(ctx, x, y, dotSize, dotColor);
		        }
		      }
		    }
		  });
		}

		// Helper function to draw a circle
		function drawCircle(ctx, x, y, radius, fillColor, strokeColor) {
		  ctx.beginPath();
		  ctx.arc(x, y, radius, 0, Math.PI * 2);
		  ctx.fillStyle = fillColor;
		  ctx.fill();
		  ctx.strokeStyle = strokeColor || "transparent";
		  ctx.stroke();
		}

		// Helper function to darken a color by a given percentage
		function darkenColor(color, percentage) {
		  const factor = 1 - percentage;
		  return (
		    "#" +
		    color
		      .slice(1)
		      .match(/.{2}/g)
		      .map((c) => Math.floor(parseInt(c, 16) * factor))
		      .map((c) => c.toString(16).padStart(2, "0"))
		      .join("")
		  );
		}


    </script>

	<script type="text/javascript" id="" src="/wp-content/themes/twentysixteen-child/scripts/canvas_config.js"></script>
	<script type="text/javascript" id="" src="/wp-content/themes/twentysixteen-child/scripts/careerFunctions.js"></script>
	<script type="text/javascript" id="" src="/wp-content/themes/twentysixteen-child/scripts/careerProfileFunctions.js"></script>
	<script type="text/javascript" id="" src="/wp-content/themes/twentysixteen-child/scripts/edPointFunctions.js"></script>

	<script>jQuery(document).ready(function (){ init(); });</script>
	<script>jQuery(document).ready(function (){ initEdPoints(); });</script>
	<script>jQuery(document).ready(function (){ initProfile(); });</script>

	<style>
		@import url("/wp-content/themes/twentysixteen-child/css/system.base.css");
		@import url("/wp-content/themes/twentysixteen-child/css/system.menus.css");
		@import url("/wp-content/themes/twentysixteen-child/css/system.messages.css");
		@import url("/wp-content/themes/twentysixteen-child/css/system.theme.css");

		@import url("/wp-content/themes/twentysixteen-child/css/canvasStyles.css");
		@import url("/wp-content/themes/twentysixteen-child/css/careerProfile.styles.css");
		@import url("/wp-content/themes/twentysixteen-child/css/comment.css");
		@import url("/wp-content/themes/twentysixteen-child/css/field.css");
		@import url("/wp-content/themes/twentysixteen-child/css/node.css");
		@import url("/wp-content/themes/twentysixteen-child/css/search.css");
		@import url("/wp-content/themes/twentysixteen-child/css/user.css");
		@import url("/wp-content/themes/twentysixteen-child/css/extlink.css");
		@import url("/wp-content/themes/twentysixteen-child/css/views.css");
		@import url("/wp-content/themes/twentysixteen-child/css/ckeditor.css");

		@import url("/wp-content/themes/twentysixteen-child/css/ctools.css");
		@import url("/wp-content/themes/twentysixteen-child/css/lightbox.css");
		@import url("/wp-content/themes/twentysixteen-child/css/at.layout.css");
		@import url("/wp-content/themes/twentysixteen-child/css/global.base.css");
		@import url("/wp-content/themes/twentysixteen-child/css/global.styles.css");

	</style>

	<link type="text/css" rel="stylesheet" href="/wp-content/themes/twentysixteen-child/css/careermap.responsive.layout.css" media="only screen" />
	<link type="text/css" rel="stylesheet" href="/wp-content/themes/twentysixteen-child/css/responsive.custom.css" media="only screen" />
	<link type="text/css" rel="stylesheet" href="/wp-content/themes/twentysixteen-child/css/responsive.smalltouch.portrait.css" media="only screen and (max-width:320px)" />
	<link type="text/css" rel="stylesheet" href="/wp-content/themes/twentysixteen-child/css/responsive.smalltouch.landscape.css" media="only screen and (min-width:321px) and (max-width:580px)" />
	<link type="text/css" rel="stylesheet" href="/wp-content/themes/twentysixteen-child/css/responsive.tablet.portrait.css" media="only screen and (min-width:581px) and (max-width:768px)" />
	<link type="text/css" rel="stylesheet" href="/wp-content/themes/twentysixteen-child/css/responsive.tablet.landscape.css" media="only screen and (min-width:769px) and (max-width:1024px)" />
	<link type="text/css" rel="stylesheet" href="/wp-content/themes/twentysixteen-child/css/responsive.desktop.css" media="only screen and (min-width:1025px)" />

	<script src="/wp-content/themes/twentysixteen-child/scripts/jquery.js"></script>
	<script src="/wp-content/themes/twentysixteen-child/scripts/jquery.once.js"></script>
	<script src="/wp-content/themes/twentysixteen-child/scripts/extlink.js"></script>
	<script src="/wp-content/themes/twentysixteen-child/scripts/lightbox_video.js"></script>
	<script src="/wp-content/themes/twentysixteen-child/scripts/lightbox.js"></script>
	
	<script src="https://code.createjs.com/easeljs-0.8.0.min.js"></script>
	<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

	<script src="/wp-content/themes/twentysixteen-child/scripts/canvas_config.js"></script>
	<script src="/wp-content/themes/twentysixteen-child/scripts/careerFunctions.js"></script>
	<script src="/wp-content/themes/twentysixteen-child/scripts/edPointFunctions.js"></script>
	<script src="/wp-content/themes/twentysixteen-child/scripts/careerProfileFunctions.js"></script>
	<script src="/wp-content/themes/twentysixteen-child/scripts/html5.js"></script>

</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<div class="site-inner">
		<a class="skip-link screen-reader-text" href="#content">
			<?php
			/* translators: Hidden accessibility text. */
			_e( 'Skip to content', 'twentysixteen' );
			?>
		</a>

		<header id="masthead" class="site-header">
			<?php if ( get_header_image() ) : ?>
				<?php
					/**
					 * Filters the default twentysixteen custom header sizes attribute.
					 *
					 * @since Twenty Sixteen 1.0
					 *
					 * @param string $custom_header_sizes sizes attribute
					 * for Custom Header. Default '(max-width: 709px) 85vw,
					 * (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px'.
					 */
					$custom_header_sizes = apply_filters( 'twentysixteen_custom_header_sizes', '(max-width: 709px) 85vw, (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px' );
				?>
				<div class="header-image">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php header_image(); ?>" srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( get_custom_header()->attachment_id ) ); ?>" sizes="<?php echo esc_attr( $custom_header_sizes ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
					</a>
				</div><!-- .header-image -->
			<?php endif; // End header image check. ?>
			<div class="site-header-main">
				<!-- <div class="site-branding"> -->
					<?php twentysixteen_the_custom_logo(); ?>

					<?php if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
					endif;

					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) :
						?>
						<p class="site-description"><?php echo $description; ?></p>
					<?php endif; ?>
				<!-- </div>--> <!-- .site-branding -->

				<?php if ( has_nav_menu( 'primary' ) || has_nav_menu( 'social' ) ) : ?>
					<button id="menu-toggle" class="menu-toggle"><?php _e( 'Menu', 'twentysixteen' ); ?></button>

					<div id="site-header-menu" class="site-header-menu">
						<?php if ( has_nav_menu( 'primary' ) ) : ?>
							<nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'twentysixteen' ); ?>">
								<?php
									wp_nav_menu(
										array(
											'theme_location' => 'primary',
											'menu_class' => 'primary-menu',
										)
									);
								?>
							</nav><!-- .main-navigation -->
						<?php endif; ?>

						<?php if ( has_nav_menu( 'social' ) ) : ?>
							<nav id="social-navigation" class="social-navigation" aria-label="<?php esc_attr_e( 'Social Links Menu', 'twentysixteen' ); ?>">
								<?php
									wp_nav_menu(
										array(
											'theme_location' => 'social',
											'menu_class'  => 'social-links-menu',
											'depth'       => 1,
											'link_before' => '<span class="screen-reader-text">',
											'link_after'  => '</span>',
										)
									);
								?>
							</nav><!-- .social-navigation -->
						<?php endif; ?>
					</div><!-- .site-header-menu -->
				<?php endif; ?>
			</div><!-- .site-header-main -->
		</header><!-- .site-header -->

		<div id="content" class="site-content">
