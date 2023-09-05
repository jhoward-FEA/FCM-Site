<?php
career_map_jobs();
/**
 * @file
 * Adaptivetheme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * Adaptivetheme supplied variables:
 * - $site_logo: Themed logo - linked to front with alt attribute.
 * - $site_name: Site name linked to the homepage.
 * - $site_name_unlinked: Site name without any link.
 * - $hide_site_name: Toggles the visibility of the site name.
 * - $visibility: Holds the class .element-invisible or is empty.
 * - $primary_navigation: Themed Main menu.
 * - $secondary_navigation: Themed Secondary/user menu.
 * - $primary_local_tasks: Split local tasks - primary.
 * - $secondary_local_tasks: Split local tasks - secondary.
 * - $tag: Prints the wrapper element for the main content.
 * - $is_mobile: Mixed, requires the Mobile Detect or Browscap module to return
 *   TRUE for mobile.  Note that tablets are also considered mobile devices.
 *   Returns NULL if the feature could not be detected.
 * - $is_tablet: Mixed, requires the Mobile Detect to return TRUE for tablets.
 *   Returns NULL if the feature could not be detected.
 * - *_attributes: attributes for various site elements, usually holds id, class
 *   or role attributes.
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Core Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * Adaptivetheme Regions:
 * - $page['leaderboard']: full width at the very top of the page
 * - $page['menu_bar']: menu blocks placed here will be styled horizontal
 * - $page['secondary_content']: full width just above the main columns
 * - $page['content_aside']: like a main content bottom region
 * - $page['tertiary_content']: full width just above the footer
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see adaptivetheme_preprocess_page()
 * @see adaptivetheme_process_page()
 */
?>
<header<?php print $header_attributes; ?>>

      <?php if ($site_logo || $site_name || $site_slogan): ?>
        <!-- !Branding -->
        <div<?php print $branding_attributes; ?>>

          <?php if ($site_logo): ?>
            <div id="logo">
              <?php print $site_logo; ?>
            </div>
          <?php endif; ?>

          <?php if ($site_name || $site_slogan): ?>
            <!-- !Site name and Slogan -->
            <div<?php print $hgroup_attributes; ?>>

              <?php if ($site_name): ?>
                <h1<?php print $site_name_attributes; ?>><?php print $site_name; ?></h1>
              <?php endif; ?>

              <?php if ($site_slogan): ?>
                <h2<?php print $site_slogan_attributes; ?>><?php print $site_slogan; ?></h2>
              <?php endif; ?>

            </div>
          <?php endif; ?>

        </div>
      <?php endif; ?>

      <!-- !Header Region -->
      <?php print render($page['header']); ?>
      <!-- !Navigation -->
      <div id="menu-wrapper">
      <?php if ($primary_navigation): print $primary_navigation; endif; ?>
      </div>
    </header>

<div id="page-wrapper">
  <div id="page" class="container <?php print $classes; ?>">

    <!-- !Leaderboard Region -->
    <?php print render($page['leaderboard']); ?>

    
    <?php #if ($secondary_navigation): print $secondary_navigation; endif; ?>

    <!-- !Breadcrumbs -->
    <?php if ($breadcrumb): print $breadcrumb; endif; ?>

    <!-- !Messages and Help -->
    <?php print $messages; ?>
    <?php print render($page['help']); ?>

    <!-- !Secondary Content Region -->
    <?php print render($page['secondary_content']); ?>

    <div id="columns" class="columns clearfix">
      <main id="content-column" class="content-column" role="main">
        <div class="content-inner">

          <!-- !Highlighted region -->
          <?php print render($page['highlighted']); ?>

          <<?php print $tag; ?> id="main-content">

            <?php print render($title_prefix); // Does nothing by default in D7 core ?>

            <!-- !Main Content Header -->
            <?php if ($title || $primary_local_tasks || $secondary_local_tasks || $action_links = render($action_links)): ?>
              <header<?php print $content_header_attributes; ?>>

                <?php if ($title): ?>
                  <h1 id="page-title">
                    <?php #print $title; ?>
                  </h1>
                <?php endif; ?>

                <?php if ($primary_local_tasks || $secondary_local_tasks || $action_links): ?>
                  <div id="tasks">

                    <?php if ($primary_local_tasks): ?>
                      <ul class="tabs primary clearfix"><?php print render($primary_local_tasks); ?></ul>
                    <?php endif; ?>

                    <?php if ($secondary_local_tasks): ?>
                      <ul class="tabs secondary clearfix"><?php print render($secondary_local_tasks); ?></ul>
                    <?php endif; ?>

                    <?php if ($action_links = render($action_links)): ?>
                      <ul class="action-links clearfix"><?php print $action_links; ?></ul>
                    <?php endif; ?>

                  </div>
                <?php endif; ?>

              </header>
            <?php endif; ?>

            <!-- !Main Content -->
            <?php if ($content = render($page['content'])): ?>
              <div id="content" class="region">
                <?php print $content; ?>
                <div id="mappingToolWrapper">
                    <div id="mapHeaders">
                        <ul>
                            <li>Key Roles of<br/>Building Professionals</li>
                            <li>Potential Entry Points</li>
                            <li>Professional Certifications</li>
                            <li>Energy Careers & Specializations</li>
                        </ul>
                    </div>
                    <div id="swimlaneDesc">
                        <div id="energyMgmt"><strong>Energy Management:</strong> Monitoring and improving energy use in buildings</div>
                        <div id="energyAudit"><strong>Energy Auditing:</strong> Investigating opportunities for improving energy efficiency</div>
                        <div id="buildingComm"><strong>Building Commissioning:</strong> Measuring and verifying systems performance</div>
                        <div id="buildingOps"><strong>Building Operations:</strong> Maintaining building systems </div>                        
                    </div>
                    <canvas id="careerMap" height="500" width="775"></canvas>
                    <img id="sidebarBanner" class="titlePosition" src="<?php echo file_create_url(drupal_get_path('module', 'career_map'));?>/images/title-banner.png"/>
                    <div id="sidebarTitle" class="titlePosition" >Career Mapping Tool</div>
                    <div id="sidebarContainer">
                        <div id="sidebarText">
							<div style="width:100%;text-align:center;font-weight:bold;font-size:10px;">
								<a href="http://www.youtube.com/watch?v=LzGsm8774v4" rel="lightvideo">Video: Intro to the Career Map</a><br/>
								<a href="https://www.youtube.com/watch?v=DO87DvGxN00" rel="lightvideo">Video: Using the Career Map</a><br/><br/></div>
                            This Career Map tool highlights emerging professional-level standards that are part of the Department of Energy’s Better Buildings Workforce Guidelines (BBWG).  The map articulates clear pathways for advancement for incumbent workers as well as the identification of strategic entry points for veterans in building trades professionals, graduates, and other job seekers.
                            <br/><br/>
                            The entry points on the left are strategic entry points identified as jobs that are good precursors or transition jobs to the four main BBWG jobs.  The right side of the map shows specializations to strive for and what career advancements are possible.  Hover over points to see the pathways and click on a point to see basic job data.
                            <br/><br/>
                            At the bottom of the map are four focus areas which act as filters.  Click on a filter to see all of the job entry points associated with that field along with the pathway for those jobs.  
                        </div>
                        <div id="accordion">
                            <h3 id="keysToSuccess">Keys to Success</h3>
                            <div></div>
                            <h3 id="jobDetail">Job Details</h3>
                            <div></div>
                            <h3 id="jobTask">Job Task Analysis</h3>
                            <div></div>
                            <h3 id="compModel">Competency Model</h3>
                            <div></div>
                        </div>
                        <div id="moreInfo">
                            <img id="infoBanner" class="footerPosition" src="<?php  echo file_create_url(drupal_get_path('module', 'career_map'));?>/images/info-banner-1.png"/> 
                            <a href="" id="infoBannerText" class="footerPosition">Learn More</a>
                        </div>
                    </div>
                </div>
                <div id="presetIcons">
                    <div class="filter">
                        <img id="vetIcon" src="<?php  echo file_create_url(drupal_get_path('module', 'career_map'));?>/images/veterans.png"/> 
                        <br/>
                        Veterans
                    </div>
                    <div class="filter">
                   <img id="tradesIcon" src="<?php  echo file_create_url(drupal_get_path('module', 'career_map'));?>/images/trades.png"/>
                    <br/>
                        Trades &amp; Builders
                    </div>
                    <div class="filter">
                    <img id="gradsIcon" src="<?php  echo file_create_url(drupal_get_path('module', 'career_map'));?>/images/grads.png"/>
                     <br/>
                        Graduates
                    </div>
                    <div class="filter">
                    <img id="energyProfsIcon" src="<?php  echo file_create_url(drupal_get_path('module', 'career_map'));?>/images/energyprofs.png"/>
                     <br/>
                        Energy Professionals
                    </div>
                    <div class="filter">
                        <img id="fedIcon" src="<?php  echo file_create_url(drupal_get_path('module', 'career_map'));?>/images/federal.png"/> 
                        <br/>
                        Federal Professionals
                    </div>
                </div>
                <div id="pathDescription">
                    <div></div>
                    <span id="closePathDescription">Close</span>
                </div>
            <?php endif; ?>

            <!-- !Feed Icons -->
            <?php print $feed_icons; ?>

            <?php print render($title_suffix); // Prints page level contextual links ?>

          </<?php print $tag; ?>><!-- /end #main-content -->

          <!-- !Content Aside Region-->
          <?php print render($page['content_aside']); ?>
        
        </div><!-- /end .content-inner -->
      </main><!-- /end #content-column -->

      <!-- !Sidebar Regions -->
      <?php $sidebar_first = render($page['sidebar_first']); print $sidebar_first; ?>
      <?php $sidebar_second = render($page['sidebar_second']); print $sidebar_second; ?>

    </div><!-- /end #columns -->

    <!-- !Tertiary Content Region -->
    <?php print render($page['tertiary_content']); ?>

  </div>
</div>
<!-- !Footer -->
<?php if ($page['footer'] || $attribution): ?>
  <footer<?php print $footer_attributes; ?>>
    <?php print render($page['footer']); ?>
    <?php print $attribution; ?>
  </footer>
<?php endif; ?>