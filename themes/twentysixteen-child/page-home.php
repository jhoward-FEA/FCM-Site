    <?php /* Template Name: Homepage */ 
    get_header( 'home' ); ?>
  
<body onload="draw();"> 

<!-- !Main Content -->
 <div id="map-content" class="region">
    <div id="block-system-main" class="block block-system no-title">
        
    </div>

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
        
        <div id="careerMap" height="500" width="775"><?php
        // Start the loop.
        while ( have_posts() ) :
            the_post();

            // Include the page content template.
            get_template_part( 'template-parts/content', 'page' );

            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }

            // End the loop.
        endwhile;
        ?></div>
        
        <img id="sidebarBanner" class="titlePosition" src="http://fcm/wp-content/uploads/title-banner.png"/>
        
        <div id="sidebarTitle" class="titlePosition" >Career Mapping Tool</div>
        
        <div id="sidebarContainer">

            <!-- <div id="sidebarText">
                <div style="width:100%;text-align:center;font-weight:bold;font-size:10px;">
                    <a href="http://www.youtube.com/watch?v=LzGsm8774v4" rel="lightvideo">Video: Intro to the Career Map</a><br/>
                    <a href="https://www.youtube.com/watch?v=DO87DvGxN00" rel="lightvideo">Video: Using the Career Map</a><br/><br/></div>
                    This Career Map tool highlights emerging professional-level standards that are part of the Department of Energy’s Better Buildings Workforce Guidelines (BBWG).  The map articulates clear pathways for advancement for incumbent workers as well as the identification of strategic entry points for veterans in building trades professionals, graduates, and other job seekers.
                    <br/><br/>
                    The entry points on the left are strategic entry points identified as jobs that are good precursors or transition jobs to the four main BBWG jobs.  The right side of the map shows specializations to strive for and what career advancements are possible.  Hover over points to see the pathways and click on a point to see basic job data.
                    <br/><br/>
                    At the bottom of the map are four focus areas which act as filters.  Click on a filter to see all of the job entry points associated with that field along with the pathway for those jobs.
                </div> -->

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
                    <img id="infoBanner" class="footerPosition" src="http://fcm/wp-content/uploads/info-banner-1.png"/>
                    <a href="" id="infoBannerText" class="footerPosition">Learn More</a>
                </div>

            </div>

        </div>
        
        <div id="presetIcons">

            <div class="filter">
                <img id="vetIcon" src="http://fcm/wp-content/uploads/veterans.png"/>
                <br/>
                Veterans
            </div>
            
            <div class="filter">
                <img id="tradesIcon" src="http://fcm/wp-content/uploads/trades.png"/>
                <br/>
                Trades &amp; Builders
            </div>

            <div class="filter">
                <img id="gradsIcon" src="http://fcm/wp-content/uploads/grads.png"/>
                <br/>
                Graduates
            </div>
            
            <div class="filter">
                <img id="energyProfsIcon" src="http://fcm/wp-content/uploads/energyprofs.png"/>
                <br/>
                Energy Professionals
            </div>
            
            <div class="filter">
                <img id="fedIcon" src="http://fcm/wp-content/uploads/federal.png"/> 
                <br/>
                Federal Professionals
            </div>

        </div>
                
        <div id="pathDescription">
            <div></div>
            <span id="closePathDescription">Close</span>
        </div> -->
        
<?php // get_sidebar(); ?>

<?php if (is_page(7)) {
		get_footer('career-map');
	// } elseif (is_page(#)) {
	// 	get_footer('NAME');
	} else {
		get_footer();
	} ?>