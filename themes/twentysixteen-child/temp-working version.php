<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

			</div><!-- .site-content -->
		</div><!-- .site-info -->
	</footer><!-- .site-footer -->
</div><!-- .site-inner -->

		<footer id="colophon" class="site-footer">
			<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
				<div class="widget-area">
					<?php dynamic_sidebar( 'sidebar-3' ); ?>
				</div><!-- .widget-area -->
			<?php endif; ?>

			<?php if ( has_nav_menu( 'primary' ) ) : ?>
				<nav class="main-navigation" aria-label="<?php esc_attr_e( 'Footer Primary Menu', 'twentysixteen' ); ?>">
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'primary',
								'menu_class'     => 'primary-menu',
							)
						);
					?>
				</nav><!-- .main-navigation -->
			<?php endif; ?>

			<?php if ( has_nav_menu( 'social' ) ) : ?>
				<nav class="social-navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'twentysixteen' ); ?>">
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'social',
								'menu_class'     => 'social-links-menu',
								'depth'          => 1,
								'link_before'    => '<span class="screen-reader-text">',
								'link_after'     => '</span>',
							)
						);
					?>
				</nav><!-- .social-navigation -->
			<?php endif; ?>

			<div class="site-info">
				<?php
					/**
					 * Fires before the twentysixteen footer text for footer customization.
					 *
					 * @since Twenty Sixteen 1.0
					 */
					do_action( 'twentysixteen_credits' );
				?>
				<span class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span>
				<?php
				if ( function_exists( 'the_privacy_policy_link' ) ) {
					the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
				}
				?>
				<!-- <a href="<?php // echo esc_url( __( 'https://wordpress.org/', 'twentysixteen' ) ); ?>" class="imprint">
					<?php
					/* translators: %s: WordPress */
					// printf( __( 'Proudly powered by %s', 'twentysixteen' ), 'WordPress' );
					?>
				</a> -->
			
</div><!-- .site -->

<?php wp_footer(); ?>

<script type="text/javascript">

  const certTitle = document.getElementById('certTitle');
  const titleElement = document.getElementById('sidebarTitle');
  const jobSummaryElement = document.getElementById('node-summary');
  const jobTitlesElement = document.getElementById('node-titles');
  const jobTrainingElement = document.getElementById('node-training');
  const degreeOverviewElement = document.getElementById('node-overview');
  const degreeOccupationsElement = document.getElementById('node-occupations');
  const jobLinkElement = document.getElementById('node-link');
  const presetIconsContainer = document.getElementById("presets");

  // Get a list of all job elements
  const jobElements = document.querySelectorAll("[id^='job']");
  const certElements = document.querySelectorAll("[id^='cert-badge-']");
  const jobInfo = null;

  // Initialize variables to keep track of the active elements
  let activeNode = null;
  let activePath = null;
  let activeJob = null;
  let activePathElements = [];
  let isVisible = false;

  function updateJobSummary() {
    const activeJob = jobsArray.find(job => job["Job ID"] === activeNode);

    if (activeJob) {

      // Clear previous list content
      titleElement.innerHTML = null;
      jobSummaryElement.innerHTML = null;
      jobTitlesElement.innerHTML = null;
      jobTrainingElement.innerHTML = null;
      degreeOverviewElement.innerHTML = null;
      degreeOccupationsElement.innerHTML = null;

      if (activeJob["Job Title"] && activeJob["Job Title"].length > 0) {
        titleElement.innerHTML = `${activeJob["Job Title"]}`;
      }

      if (activeJob["Job Summary"] && activeJob["Job Summary"].length > 0) {
        jobSummaryElement.innerHTML = `<strong>Job Summary:</strong><br>${activeJob["Job Summary"]}`;
      }

      if (activeJob["Common Titles"] && activeJob["Common Titles"].length > 0) {
        jobTitlesElement.innerHTML = `<strong>Common Titles:</strong><br>${activeJob["Common Titles"]}`;
      }

      if (activeJob["Education and Training"] && activeJob["Education and Training"].length > 0) {
        jobTrainingElement.innerHTML = `<strong>Education and Training:</strong><br>${activeJob["Education and Training"]}`;
      }

      if (activeJob["Degree Overview"] && activeJob["Degree Overview"].length > 0) {
        degreeOverviewElement.innerHTML = `<strong>Degree Overview:</strong><br>${activeJob["Degree Overview"]}`;
      }

      if (activeJob["Potential Occupations"] && activeJob["Potential Occupations"].length > 0) {
        const potentialOccupationsList = document.createElement("ul");
        
        activeJob["Potential Occupations"].forEach(occupation => {
          const occupationItem = document.createElement("li");
          occupationItem.textContent = occupation;
          potentialOccupationsList.appendChild(occupationItem);
        });

        const potentialOccupationsContainer = document.createElement("div");
        potentialOccupationsContainer.innerHTML = `<strong>Potential Occupations:</strong>`;
        potentialOccupationsContainer.appendChild(potentialOccupationsList);

        degreeOccupationsElement.appendChild(potentialOccupationsContainer);
      } else {
        degreeOccupationsElement.textContent = "";
      }

      // Apply background color to sidebarText element
      const backgroundColor = activeJob["Background Color"];
      const sidebarText = document.getElementById("sidebarText");
      switch (activeJob["Background Color"]) {
        case "green":
          bannerImageSrc = "http://fcm/wp-content/uploads/info-banner-1.png";
          sidebarText.style.backgroundColor = "#eff0da";
          break;
        case "orange":
          bannerImageSrc = "http://fcm/wp-content/uploads/info-banner-2.png";
          sidebarText.style.backgroundColor = "#faebda";
          break;
        case "blue":
          bannerImageSrc = "http://fcm/wp-content/uploads/info-banner-3.png";
          sidebarText.style.backgroundColor = "#d5ebed";
          break;
        case "maroon":
          bannerImageSrc = "http://fcm/wp-content/uploads/info-banner-4.png";
          sidebarText.style.backgroundColor = "#efe1e5";
          break;
        default:
          sidebarText.style.backgroundColor = "rgba(255, 255, 255, 1)"; // Default to white background
      }

      if (activeJob["Link"] && activeJob["Link"].length > 0) {
        jobLinkElement.innerHTML = `<div class="info-banner"><a href="${activeJob["Link"]}" target="_blank"><img src="${bannerImageSrc}"><p class="text-overlay">Learn More</p></a></div>`;
      }

    } else {
      jobSummaryElement.textContent = "Select a job for summary";
    }
  }

  // Define onMouseOver function
  function onMouseOver(pathId) {
    const pathElements = document.querySelectorAll(`.${pathId}`);
    if (!activePathElements.includes(pathId)) {
      pathElements.forEach(path => {
        path.style.opacity = "0.6";
      });
    }
  }

  // Define onMouseOut function
  function onMouseOut(pathId) {
    const pathElements = document.querySelectorAll(`.${pathId}`);
    if (!activePathElements.includes(pathId)) {
      pathElements.forEach(path => {
        path.style.opacity = "0";
      });
    }
  }

  jobElements.forEach(job => {
    const jobId = job.id;
    const pathId = `path${jobId.substring(3)}`; // Construct corresponding path id
    const pathElements = document.querySelectorAll(`.${pathId}`);

    // Add event listeners using the defined functions
    job.addEventListener("click", () => {
      activeNode = jobId;
      updateJobSummary();
      console.log('activeNode is now:', activeNode);

      const numericPart = activeNode.replace(/\D/g, '');
      activePath = 'path' + numericPart;
      console.log('activePath is now:', activePath);
      // Clear the previous active path elements
      activePathElements.forEach(activePathId => {
        const activePathElementsToClear = document.querySelectorAll(`.${activePathId}`);
        activePathElementsToClear.forEach(path => {
          path.classList.remove("active-path");
          path.style.opacity = "0"; // Set opacity to 0
        });
      });

      // Set the new active path elements
      pathElements.forEach(path => {
        path.classList.add("active-path");
      });

      // Update the active elements
      activeJob = job;
      activePathElements = [pathId];
    });

    job.addEventListener("mouseover", () => onMouseOver(pathId));
    job.addEventListener("mouseout", () => onMouseOut(pathId));

  });

  const jobsArray = [
    {
      "Job ID": "job1",
      "Job Title": "B.S. Mechanical Eng",
      "Job Summary": "",
      "Common Titles": "",
      "Education and Training": "",
      "Degree Overview": "Bachelors degree in Mechanical Engineering focuses on the application of principles of engineering, physics, and building science for the design, analysis, and maintenance of mechanical systems.  Mechanical engineers apply the principles of force, motion, energy, and thermal fluids to design tools and processes. Note: Degree programs may vary",
      "Potential Occupations": [
        "Senior Level Building Engineer",
        "Heating, Ventilating, and Air Conditioning (HVAC) Engineer",
        "Materials Engineer",
        "Maintenance Engineer",
        "Reliability and Testing Engineer", 
        "Robotics Engineer",
        "Energy Consultant",  
        "Commissioning Technician",
        "Energy Manager"
        ],
      "Link": "/b-s-mechanical-eng/",
      "Certification Info": null,
      "Background Color": "green"
    },
    {
      "Job ID": "job2",
      "Job Title": "Energy Engineer",
      "Job Summary": "Energy Engineer designs, develops, or evaluates energy-related projects or programs to reduce energy costs or improve energy efficiency during the designing, building, or remodeling stages of construction.",
      "Common Titles": "Energy Project Manager, Systems Engineer, Energy Project Engineer",
      "Education and Training": "Bachelor's Degree in Engineering, preferably mechanical or electrical engineering<br><br>Building Analyst Certified Professional certification or Certified Energy Manager may be required.",
      "Degree Overview": "",
      "Potential Occupations": "",
      "Link": "/energy-engineer/",
      "Certification Info": null,
      "Background Color": "green"
    },
    {
      "Job ID": "job3",
      "Job Title": "Federal Energy Engineer",
      "Job Summary": "A Federal Energy Engineer develops, evaluates, and implements energy-related projects to reduce energy costs or improve energy efficiency at the facility level.",
      "Common Titles": "Mechanical Engineer, Electrical Engineer, Energy Engineer",
      "Education and Training": "Bachelor's Degree in Engineering preferred and may be required, preferably mechanical or electrical engineering<br><br>Certified Energy Manager (CEM) or equivalent preferred and may be required.",
      "Degree Overview": "",
      "Potential Occupations": null,
      "Link": "/federal-energy-engineer/",
      "Certification Info": null,
      "Background Color": "green"
    },
    {
      "Job ID": "job4",
      "Job Title": "Sustainability Specialist",
      "Job Summary": "A Sustainability Specialist addresses organizational sustainability issues, such as energy and water efficiency, waste stream management, and sustainable building practices.",
      "Common Titles": "Sustainability Coordinator, Sustainability Advisor, Sustainability Consultant",
      "Education and Training": "Bachelor's Degree in Environmental Science, Energy Engineering, Sustainable Buildings Science Technology, Sustainable Business, or equivalent<br><br>Certifications may be required such as the Sustainability Facility Professional (SFP).",
      "Degree Overview": "",
      "Potential Occupations": null,
      "Link": "/sustainability-specialist/",
      "Certification Info": null,
      "Background Color": "green"
    },
    {
      "Job ID": "job5",
      "Job Title": "Chief Sustainability Officer",
      "Job Summary": "The Chief Sustainability Officer (CSO) communicates and coordinates with management, shareholders, customers, and employees to address sustainability issues. The CSO will enact or oversee a corporate sustainability strategy.",
      "Common Titles": "Director of Sustainability, Corporate Sustainability Officer, Director of Environment, Energy, & Safety",
      "Education and Training": "Bachelor's Degree in Environmental Science, Energy Engineering, Sustainable Buildings Science Technology, Sustainable Business, or equivalent.  Some positions may require a master's degree in a related field.<br><br>Certifications may be required such as the SFP. Certified Energy Manager or Building Analyst Certified Professional certification may be preferred.",
      "Degree Overview": "",
      "Potential Occupations": null,
      "Link": "/chief-sustainability-officer/",
      "Certification Info": null,
      "Background Color": "green"
    },
    {
      "Job ID": "job6",
      "Job Title": "Regional Energy Manager",
      "Job Summary": "A Federal Regional Energy Manager writes policies, develops energy plans, and monitors energy utilization and compliance with federal mandates across their region or program.",
      "Common Titles": "A regional/program level energy position is common across Federal agencies. However, titles and responsibilities vary across the agencies.<br><br>Energy Team Lead, Network/VISN Energy Manager, Program Energy Manager",
      "Education and Training": "",
      "Degree Overview": "",
      "Potential Occupations": null,
      "Link": "/regional-energy-manager/",
      "Certification Info": null,
      "Background Color": "green"
    },
    {
      "Job ID": "job7",
      "Job Title": "CEO/Owner of Energy Firm",
      "Job Summary": "The CEO or owner of an Energy Firm plans, directs, or coordinates operational activities at the highest level of management and provides an overall direction of the organization with the help or within guidelines set up by a board of directors or similar governing body.",
      "Common Titles": "Chief Operating Officer (COO), Executive Director, Executive Vice President (EVP)",
      "Education and Training": "Most of these occupations require graduate school. For example, they may require a master's degree, and some require a Ph.D., M.D., or J.D. (law degree).<br><br>Certified Energy Manager or Building Analyst Certified Professional certification may be preferred.",
      "Degree Overview": "",
      "Potential Occupations": null,
      "Link": "/ceo-owner-of-energy-firm/",
      "Certification Info": null,
      "Background Color": "green"
    },
    {
      "Job ID": "job8",
      "Job Title": "HVAC Technician",
      "Job Summary": "An HVAC Technician is responsible for installing, maintaining and repairing heating, ventilation, air-conditioning and refrigeration systems. In addition, HVAC technicians diagnose and fix problems that they find in HVAC systems.",
      "Common Titles": "Heating and Air Conditioning Mechanic and Installer, HVAC Service Tech, Service Technician",
      "Education and Training": "",
      "Degree Overview": "",
      "Potential Occupations": null,
      "Link": "/hvac-technician/",
      "Certification Info": null,
      "Background Color": "orange"
    },
    {
      "Job ID": "job9",
      "Job Title": "Air Force HVAC/R",
      "Job Summary": "Air Force HVAC/R (3E1X1) specialty position installs, operates, maintains, and repairs heating, ventilation, air conditioning and refrigeration (HVAC/R) systems, and manages HVAC/R functions and activities.",
      "Common Titles": "",
      "Education and Training": "",
      "Degree Overview": "",
      "Potential Occupations": null,
      "Link": "/air-force-hvacr/",
      "Certification Info": null,
      "Background Color": "orange"
    },
    {
      "Job ID": "job10",
      "Job Title": "B.S. HVAC Tech",
      "Job Summary": "",
      "Common Titles": "",
      "Education and Training": "",
      "Degree Overview": "Bachelors degree in Heating, Ventilation, Air Conditioning and Refrigeration (HVACR) Engineering Technology curriculum is a two-year, upper-division sequence leading to a bachelor of science degree in HVAC. Instruction is aimed at developing expertise in HVAC system and HVAC controls design, HVAC retrofitting, HVAC testing and adjusting, system balancing and building HVAC operations with microcomputer controls.Note: Degree programs may vary",
      "Potential Occupations": [
        "Maintenance Technician",
        "Facilities Engineer",
        "Heating, Ventilating, and Air Conditioning (HVAC) Engineer",
        "Building Engineer",
        "Commissioning Technician",
        "Energy Consultant",
        "Energy Manager"
        ],
      "Link": "/b-s-hvac-tech/",
      "Certification Info": null,
      "Background Color": "orange"
    },
    {
      "Job ID": "job11",
      "Job Title": "Construction and Building Inspector",
      "Job Summary": "Construction and Building Inspectors ensure that construction meets local and national building codes and ordinances, zoning regulations, and contract specifications.",
      "Common Titles": "Building Inspector, Building Code Administrator, Building Official",
      "Education and Training": "",
      "Degree Overview": "",
      "Potential Occupations": null,
      "Link": "/construction-and-building-inspector/",
      "Certification Info": null,
      "Background Color": "orange"
    },
    {
      "Job ID": "job12",
      "Job Title": "Energy Assessor",
      "Job Summary": "An Energy Assessor is responsible for evaluating energy usage, benchmarking energy consumption, and determining programs/strategies to improve energy performance.",
      "Common Titles": "Energy Consultant, Home Performance Consultant",
      "Education and Training": "",
      "Degree Overview": "",
      "Potential Occupations": null,
      "Link": "/residential-energy-assessor/",
      "Certification Info": null,
      "Background Color": "orange"
    },
    {
      "Job ID": "job13",
      "Job Title": "Energy Consultant",
      "Job Summary": "An Energy Consultant assesses facility systems, observes site conditions, analyzes and evaluates equipment and energy usage, and recommends strategies to help clients meet established goals.  The work typically includes energy benchmarking, energy analysis, and development of energy conservation measures.",
      "Common Titles": "Energy Engineer, Energy Auditor, Energy Rater",
      "Education and Training": "",
      "Degree Overview": "",
      "Potential Occupations": null,
      "Link": "/energy-consultant/",
      "Certification Info": null,
      "Background Color": "orange"
    },
    {
      "Job ID": "job14",
      "Job Title": "Senior Energy Auditor",
      "Job Summary": "A Senior level energy auditor is an energy solutions professional who assesses facility systems, evaluates equipment and energy usage, and recommends strategies to reduce energy, water, and associated costs.",
      "Common Titles": "Mechanical Engineer, Project Manager, Senior Energy Engineer",
      "Education and Training": "",
      "Degree Overview": "",
      "Potential Occupations": null,
      "Link": "/senior-energy-auditor/",
      "Certification Info": null,
      "Background Color": "orange"
    },
    {
      "Job ID": "job15",
      "Job Title": "Senior Technical Specialist",
      "Job Summary": "The Senior Technical Specialist provides expertise in energy efficiency, pollution prevention, and environmental compliance.",
      "Common Titles": "",
      "Education and Training": "",
      "Degree Overview": "",
      "Potential Occupations": null,
      "Link": "/senior-technical-specialist/",
      "Certification Info": null,
      "Background Color": "orange"
    },
    {
      "Job ID": "job16",
      "Job Title": "A.S. HVAC Tech",
      "Job Summary": "",
      "Common Titles": "",
      "Education and Training": "",
      "Degree Overview": "An associate degree program in HVAC (heating, ventilation and air conditioning) technology trains students to help design, maintain and repair both private and commercial heating and air conditioning systems. Such programs are designed to offer the technical training necessary to help students prepare for entry-level positions as heating or air conditioning system technicians.<br><br><em>Note: Degree programs may vary<em>",
      "Potential Occupations": [
        "HVAC Technician",
        "HVAC Test Technician",
        "Service Technician",
        "HVAC Mechanic",
        "Building Systems Technician",
        "Maintenance Technician",
        "Commissioning Technician",
        "Superintendent"
        ],
      "Link": "/a-s-hvac-tech/",
      "Certification Info": null,
      "Background Color": "blue"
    },
    {
      "Job ID": "job17",
      "Job Title": "Sheet Metal Worker",
      "Job Summary": "A Sheet Metal Worker fabricates, assembles, installs, and repairs sheet metal products and equipment, such as ducts, control boxes, drainpipes, and furnace casings.",
      "Common Titles": "Sheet Metal Mechanic, Sheet Metal Technician, Sheet Metal Installer",
      "Education and Training": "High School Diploma or equivalent, Associates degree in mechanical systems or equivalent education, or relevant apprenticeship programs Certificates may be required. Such as Precision Sheet Metal Operator Certification (Fabricators & Manufacturers Association, International) and Air System Cleaning Specialist (National Air Duct Cleaners Association)",
      "Degree Overview": "",
      "Potential Occupations": null,
      "Link": "/sheet-metal-worker/",
      "Certification Info": null,
      "Background Color": "blue"
    },
    {
      "Job ID": "job18",
      "Job Title": "B.S. Building Automation Tech",
      "Job Summary": "",
      "Common Titles": "",
      "Education and Training": "",
      "Degree Overview": "A Bachelors Degree in Building Automation Technology prepares students to work in the field of building automation, heating, ventilating, air conditioning and refrigeration control (HVACR) and building energy management. The major emphasizes application control system design, programming and documentation, building control networks, building commissioning, the operation and control of chillers and boilers, and related mechanical and electrical equipment.<br><br><em>Note: Degree programs may vary</em>",
      "Potential Occupations": [
        "Automation Engineer",
        "Automation Specialist",
        "Controls Engineer"
        ],
      "Link": "/b-s-building-automation-tech/",
      "Certification Info": null,
      "Background Color": "blue"
    },
    {
      "Job ID": "job19",
      "Job Title": "Commissioning Technician",
      "Job Summary": "A Commissioning Technician works under general direction of more experienced personnel who can review MEP designs and specifications, prepare commissioning plans, schedules, and commissioning documentation.",
      "Common Titles": "Commissioning Specialist, Mechanical Commissioning Technician, Engineering Technician",
      "Education and Training": "Associates Degree in electronics, mechanical systems, computer technology, HVAC. Some positions may require a Bachelor's Degree in Engineering, preferably in a related engineering technology such as electrical or mechanical, and an understanding of the basics of electrical and HVAC systems, as well as controls. Licensing and Certificates may be required.",
      "Degree Overview": "",
      "Potential Occupations": null,
      "Link": "/commissioning-technician/",
      "Certification Info": null,
      "Background Color": "blue"
    },
    {
      "Job ID": "job20",
      "Job Title": "Controls Technician",
      "Job Summary": "A Controls Technician is responsible for the installation, start-up, troubleshooting, commissioning and servicing of building automation systems.",
      "Common Titles": "Controls Specialist, Building Automation Specialist, Automation Controls Specialist, Control Technician",
      "Education and Training": "High School Diploma or equivalent, Associates degree in electronics, mechanical systems, computer technology, air conditioning or similar field equivalent education. Certificates may be required, such as ISA Certified Control Systems Technician",
      "Degree Overview": "",
      "Potential Occupations": null,
      "Link": "/controls-technician/",
      "Certification Info": null,
      "Background Color": "blue"
    },
    {
      "Job ID": "job21",
      "Job Title": "Senior Commissioning Manager",
      "Job Summary": "A Senior Commissioning Manager oversees multiple commissioning projects, and serves as a senior technical reviewer of project documentation and staff.",
      "Common Titles": "Commissioning Engineer, Senior Commissioning Engineer, Senior Commissioning Agent",
      "Education and Training": "Bachelor's Degree in Engineering, preferably in electrical or mechanical engineering with a strong understanding of buildings, MEP systems, and building controls.",
      "Degree Overview": "",
      "Potential Occupations": null,
      "Link": "/senior-commissioning-manager/",
      "Certification Info": null,
      "Background Color": "blue"
    },
    {
      "Job ID": "job22",
      "Job Title": "President of Commissioning Firm",
      "Job Summary": "The CEO or owner of an Commissioning Firm plans, directs, or coordinates operational activities at the highest level of management and provides an  overall direction of the organization with the help or within guidelines set up by a board of directors or similar governing body.",
      "Common Titles": "Chief Executive Officer (CEO), Chief Operating Officer (COO), Executive Director",
      "Education and Training": "Most of these occupations require graduate school. For example, they may require a master's degree, and some require a Ph.D., M.D., or J.D. (law degree).",
      "Degree Overview": "",
      "Potential Occupations": null,
      "Link": "/president-of-commissioning-firm/",
      "Certification Info": null,
      "Background Color": "blue"
    },
    {
      "Job ID": "job23",
      "Job Title": "Electrician",
      "Job Summary": "An Electrician installs, maintains, and repairs electrical wiring, equipment, and fixtures. Ensures that work is in accordance with relevant codes. May install or service street lights, intercom systems, or electrical control systems.",
      "Common Titles": "Control Electrician; Industrial Electrician; Inside Wireman; Journeyman Electrician; Journeyman Wireman; Maintenance Electrician; Qualified Craft Worker",
      "Education and Training": "",
      "Degree Overview": "",
      "Potential Occupations": null,
      "Link": "/electrician/",
      "Certification Info": null,
      "Background Color": "maroon"
    },
    {
      "Job ID": "job24",
      "Job Title": "A.S. Building Maint. Tech",
      "Job Summary": "",
      "Common Titles": "",
      "Education and Training": "",
      "Degree Overview": "Associate-level program in Building Maintenance Technology prepares students to acquire general maintenance jobs in multiple trades by providing instruction in HVAC principles, electrical systems and general maintenance. Completion of a program in this field can lead to an Associate of Science, Associate of Applied Science or Associate of Occupational Studies, with an emphasis in an area such as building management and maintenance or building maintenance technology.<br><br><em>Note: Degree programs may vary</em>",
      "Potential Occupations": [
        "Building maintenance",
        "Stationary engineer",
        "Furnace mechanic",
        "Facility maintenance foreman",
        "Maintenance Technician"
        ],
      "Link": "/a-s-building-maint-tech/",
      "Certification Info": null,
      "Background Color": "maroon"
    },
    {
      "Job ID": "job25",
      "Job Title": "A.S. Electro. Mech. Maint. Tech",
      "Job Summary": "",
      "Common Titles": "",
      "Education and Training": "",
      "Degree Overview": "Associate-level program in Electromechanical Maintenance Technology prepares students to develop a wide variety of technical skills in electronics, fluid power, mechanical systems, computers and computer-controlled machines. Programmable logic controllers, robotics, motors and drives, servo hydraulic systems and closed loop positioning are also possible areas to be studied.",
      "Potential Occupations": [
        "Electromechanical Technician ",
        "Industrial Automation Technician",
        "Electronic Instrument Technician",
        "Maintenance Technician",
        "Mechanical Technician",
        "Engineering Technician",
        "Robotics Technician",
        "Industrial Maintenance Technician"
        ],
      "Link": "/a-s-electro-mech-maint-tech/",
      "Certification Info": null,
      "Background Color": "maroon"
    },
    {
      "Job ID": "job26",
      "Job Title": "Navy UT Utilitiesman",
      "Job Summary": "Navy (Enlisted) Utilitiesmen are involved with plumbing, heating, steam, compressed air, fuel storage, and distribution systems. Their work also includes water treatment and distribution systems, air conditioning and refrigeration equipment, and sewage collecting and disposal facilities at Navy shore installations around the world.",
      "Common Titles": "",
      "Education and Training": "Related military training in system maintenance and repair",
      "Degree Overview": "",
      "Potential Occupations": null,
      "Link": "/navy-ut-utilitiesman/",
      "Certification Info": null,
      "Background Color": "maroon"
    },
    {
      "Job ID": "job27",
      "Job Title": "Maintenance Technician",
      "Job Summary": "The Maintenance Technician is responsible for troubleshooting, repairing, and performing preventive maintenance on mechanical, electrical, HVAC, plumbing systems and physical structural elements of a building.",
      "Common Titles": "HVAC Technician, HVAC Service Technician, HVAC Installer, HVAC Mechanic",
      "Education and Training": "Training in vocational schools, related on-the-job experience, apprenticeship programs or an associate's degree Licensing and Certificates may be required.",
      "Degree Overview": "",
      "Potential Occupations": null,
      "Link": "/maintenance-technician/",
      "Certification Info": null,
      "Background Color": "maroon"
    },
    {
      "Job ID": "job28",
      "Job Title": "Federal Facility Specialist",
      "Job Summary": "Serves as a technical specialist for operations and maintenance equipment and personnel/contractors.",
      "Common Titles": "Building Management Specialist, Property Management Specialist, Assistant Building Manager, Staff Engineer, Supervisory Engineer",
      "Education and Training": "Training in building maintenance, related on-the-job experience, or a related degree may be required.",
      "Degree Overview": "",
      "Potential Occupations": null,
      "Link": "/federal-facility-specialist/",
      "Certification Info": null,
      "Background Color": "maroon"
    },
    {
      "Job ID": "job29",
      "Job Title": "Federal Facility Manager",
      "Job Summary": "Provides occupants with safe, secure, clean, and sustainable facilities and serves as the primary customer agency advocate.",
      "Common Titles": "Building Manager, Property Manager, Assistant Chief Engineer, Building Manager",
      "Education and Training": "Training in building management principles, operations and maintenance practices, related on-the-job experience, or a related degree may be required.",
      "Degree Overview": "",
      "Potential Occupations": null,
      "Link": "/federal-facility-manager/",
      "Certification Info": null,
      "Background Color": "maroon"
    },
    {
      "Job ID": "job30",
      "Job Title": "Building Engineer",
      "Job Summary": "The Building Engineer's main job requirements are monitoring building system operations and performance utilizing several trade skills and knowledge of mechanical, energy management systems, electrical systems, lighting, water and building envelope including doors, windows, insulation, roofing, etc.",
      "Common Titles": "Building Operator, Lead Building Operating Engineer, Building Engineer II",
      "Education and Training": "Training in vocational schools, related on-the-job experience, apprenticeship programs or an associate's degree Licensing and Certificates may be required.<br><br>Certifications may be required including the Facility Management Professional (FMP).",
      "Degree Overview": "",
      "Potential Occupations": null,
      "Link": "/building-engineer/",
      "Certification Info": null,
      "Background Color": "maroon"
    },
    {
      "Job ID": "job31",
      "Job Title": "Superintendent",
      "Job Summary": "A Superintendent is responsible for the safe and economical maintenance of the building including: the grounds, outside perimeter, and building's mechanical equipment.",
      "Common Titles": "Buildings and Grounds Supervisor, Maintenance Supervisor",
      "Education and Training": "High School Diploma or equivalent, Associates degree in mechanical systems or equivalent education, or Relevant Apprenticeship Programs",
      "Degree Overview": "",
      "Potential Occupations": null,
      "Link": "/superintendent/",
      "Certification Info": null,
      "Background Color": "maroon"
    },
    {
      "Job ID": "job32",
      "Job Title": "Senior Manager of Operations",
      "Job Summary": "The Senior Manager of Operations plans, directs, or coordinates the operations of public or private sector organizations.",
      "Common Titles": "Operations Manager, Director of Operations, Facilities Manager",
      "Education and Training": "Training in vocational schools, related on-the-job experience, apprenticeship programs or an associate's degree",
      "Degree Overview": "",
      "Potential Occupations": null,
      "Link": "/senior-manager-of-operations/",
      "Certification Info": null,
      "Background Color": "maroon"
    },
    {
      "Job ID": "job33",
      "Job Title": "Chief Building Engineer",
      "Job Summary": "The Chief Building Engineer oversees the maintenance operations and overall building performance.",
      "Common Titles": "",
      "Education and Training": "",
      "Degree Overview": "",
      "Potential Occupations": null,
      "Link": "/chief-building-engineer/",
      "Certification Info": null,
      "Background Color": "maroon"
    },
    {
      "Job ID": "job34",
      "Job Title": "Chief Engineer (Federal O&M Contractor)",
      "Job Summary": "The Chief Engineer for an O&M Contractor works with federal agencies to maintain a building or a set of buildings.  The Chief Engineer oversees the maintenance operations and overall building performance.",
      "Common Titles": "Senior Engineer, Senior Chief Engineer",
      "Education and Training": "Training and experience in building management principles, operations and maintenance practices, facility management, asset management, and leadership roles or a related degree may be required.",
      "Degree Overview": "",
      "Potential Occupations": null,
      "Link": "/chief-engineer-federal-om-contractor/",
      "Certification Info": null,
      "Background Color": "maroon"
    },
    {
      "Job ID": "job35",
      "Job Title": "Federal Regional Facility Manager",
      "Job Summary": "A Federal Regional Facility Manager is responsible for facility planning, operations, and maintenance across multiple buildings or large, complex, buildings.",
      "Common Titles": "Field Office Manager, Zone Manager, Chief Engineer",
      "Education and Training": "Training and experience in building management principles, operations and maintenance practices, facility management, asset management, and leadership roles or a related degree may be required.",
      "Degree Overview": "",
      "Potential Occupations": null,
      "Link": "/regional-facility-manager/",
      "Certification Info": null,
      "Background Color": "maroon"
    },
    {
      "Job ID": "job36",
      "Job Title": "Director of Maintenance",
      "Job Summary": "The Director of Maintenance is responsible for the day to day coordination and oversight of all aspects of the operations of a facility.",
      "Common Titles": "Operations Manager, Director of Operations, Facilities Manager",
      "Education and Training": "Training in vocational schools, related on-the-job experience, apprenticeship programs or an associate's degree",
      "Degree Overview": "",
      "Potential Occupations": null,
      "Link": "/director-of-maintenance/",
      "Certification Info": null,
      "Background Color": "maroon"
    },
    {
      "Job ID": "cert-badge-1",
      "Job Title": null,
      "Job Summary": null,
      "Common Titles": null,
      "Education and Training": null,
      "Degree Overview": "",
      "Potential Occupations": null,
      "Link": null,
      "Certification Info": "<p>test</p>",
      "Background Color": "green"
    },
    {
      "Job ID": "cert-badge-2",
      "Job Title": null,
      "Job Summary": null,
      "Common Titles": null,
      "Education and Training": null,
      "Degree Overview": "",
      "Potential Occupations": null,
      "Link": null,
      "Certification Info": "<p>test</p>",
      "Background Color": "orange"
    },
    {
      "Job ID": "cert-badge-3",
      "Job Title": null,
      "Job Summary": null,
      "Common Titles": null,
      "Education and Training": null,
      "Degree Overview": "",
      "Potential Occupations": null,
      "Link": null,
      "Certification Info": "<p>test</p>",
      "Background Color": "blue"
    },
    {
      "Job ID": "cert-badge-4",
      "Job Title": null,
      "Job Summary": null,
      "Common Titles": null,
      "Education and Training": null,
      "Degree Overview": "",
      "Potential Occupations": null,
      "Link": null,
      "Certification Info": "<p>test</p>",
      "Background Color": "maroon"
    }
  ];

  function toggleDisplayAndOpacity(areaElements, targetElements, notElements, displayOnly = false) {
    areaElements.addEventListener("click", (event) => {
      jobId = areaElements.id;
      activeNode = jobId;
      activeBadge = jobsArray.find(job => job["Job ID"] === activeNode);
      console.log("Active Badge is: ", activeBadge);
      
      // Clear the previous active path elements
      activePathElements.forEach(activePathId => {
        const activePathElementsToClear = document.querySelectorAll(`.${activePathId}`);
        activePathElementsToClear.forEach(path => {
          path.classList.remove("active-path");
          path.style.opacity = "0"; // Set opacity to 0
        });
      });

      // Watch for cert-icon element ids
      if (activeBadge === "cert1-badge" || activeBadge === "cert2-badge" || activeBadge === "cert3-badge" || activeBadge === "cert4-badge") {
          const activeJob = jobsArray.find(job => job["Job ID"] === activeBadge);

          if (activeJob) {
            console.log("Got activeJob: ", activeJob);
            if (activeJob["Certification Info"] && activeJob["Certification Info"].length > 0) {
                certTitle.innerHTML = `${activeJob["Certification Info"]}`;                    
            }
          }
      }

      console.log("Clicked:", areaElements.id);
      isVisible = !isVisible;
      console.log("Is Visible:", isVisible);

      for (const targetElement of targetElements) {
          targetElement.style.opacity = isVisible ? 1.0 : 0.0;
          targetElement.style.pointerEvents = isVisible ? "auto" : "none";
          // console.log("Toggled:", targetElement.id);
      }

      for (const notElement of notElements) {
          if (displayOnly) {
              notElement.style.pointerEvents = isVisible ? "none" : "auto";

          } else {
              notElement.style.opacity = isVisible ? 0.3 : 1.0;
              notElement.style.pointerEvents = isVisible ? "none" : "auto";
          }
          // console.log("Toggled:", notElement.id);
      }

      // Array of elements to check against
      const elementsToCheck = [
          document.getElementById("vet-icon"),
          document.getElementById("trades-icon"),
          document.getElementById("grads-icon"),
          document.getElementById("energyProfs-icon"),
          document.getElementById("fed-icon")
      ];

      // Reset opacity for all elements
      elementsToCheck.forEach(element => {
          element.style.opacity = "1.0";
      });

      for (const element of elementsToCheck) {
          if (element === areaElements) {
              element.style.opacity = "1.0";
          } else {
              element.style.opacity = isVisible ? 0.3 : 1.0;
          }
      }

      if (isVisible === true) {
          console.log("Removed Event Listeners");
      } else {
          console.log("Added Event Listeners");
      }

      for (const jobElement of jobElements) {
          jobElement.style.pointerEvents = isVisible ? "none" : "auto";
      }

      for (const areaElement of areaElements) {
          areaElement.style.pointerEvents = isVisible ? "none" : "auto";
      }
    });
  }

  // Get the target, area, and not elements
  const targetElements1 = document.getElementsByClassName("track1");
  const targetElements2 = document.getElementsByClassName("track2");
  const targetElements3 = document.getElementsByClassName("track3");
  const targetElements4 = document.getElementsByClassName("track4");
  const targetElements5 = document.getElementsByClassName("track5");
  const targetElements6 = document.getElementsByClassName("track6");
  const targetElements7 = document.getElementsByClassName("track7");
  const targetElements8 = document.getElementsByClassName("track8");
  const targetElements9 = document.getElementsByClassName("track9");

  const notElement1 = document.getElementsByClassName("not1");
  const notElement2 = document.getElementsByClassName("not2");
  const notElement3 = document.getElementsByClassName("not3");
  const notElement4 = document.getElementsByClassName("not4");
  const notElement5 = document.getElementsByClassName("not5");
  const notElement6 = document.getElementsByClassName("not6");
  const notElement7 = document.getElementsByClassName("not7");
  const notElement8 = document.getElementsByClassName("not8");
  const notElement9 = document.getElementsByClassName("not9");

  const areaElement1 = document.getElementById("cert-badge-1");
  const areaElement2 = document.getElementById("cert-badge-2");
  const areaElement3 = document.getElementById("cert-badge-3");
  const areaElement4 = document.getElementById("cert-badge-4");
  const areaElement5 = document.getElementById("vet-icon");
  const areaElement6 = document.getElementById("trades-icon");
  const areaElement7 = document.getElementById("grads-icon");
  const areaElement8 = document.getElementById("energyProfs-icon");
  const areaElement9 = document.getElementById("fed-icon");

  toggleDisplayAndOpacity(areaElement1, targetElements1, notElement1);
  toggleDisplayAndOpacity(areaElement2, targetElements2, notElement2);
  toggleDisplayAndOpacity(areaElement3, targetElements3, notElement3);
  toggleDisplayAndOpacity(areaElement4, targetElements4, notElement4);
  toggleDisplayAndOpacity(areaElement5, targetElements5, notElement5, true);
  toggleDisplayAndOpacity(areaElement6, targetElements6, notElement6, true);
  toggleDisplayAndOpacity(areaElement7, targetElements7, notElement7, true);
  toggleDisplayAndOpacity(areaElement8, targetElements8, notElement8, true);
  toggleDisplayAndOpacity(areaElement9, targetElements9, notElement9, true);

</script>
</body>
</html>
