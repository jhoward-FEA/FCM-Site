<?php
/* Template Name: Homepage */
    get_header( 'home' ); 
?>
  
<body> 

<!-- !Main Content -->
 <div id="map-content" class="region">
  <div class="map-overlay"></div>

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
    
<div id="careerMap">
        
  <!-- <div style="float: left;">
    <svg width="160" height="700">
      <rect x="0" y="0" width="160" height="700" fill="#FFFFFF" />
    </svg>  
  </div> -->
   
    <svg id="career-map-container" width="960" height="624">

      <!-- background stripes -->
      <rect x="0" y="0" width="960" height="624" fill="#FFFFFF" />
      <rect class="not2 not3 not4 not5 not6 not7 not8 not9" x="0" y="6" width="1085" height="150" fill="#eff0da" />
      <rect class="not1 not3 not4 not5 not6 not7 not8 not9" x="0" y="162" width="960" height="150" fill="#faebda" />
      <rect class="not1 not2 not4 not5 not6 not7 not8 not9" x="0" y="318" width="960" height="150" fill="#d5ebed" />
      <rect class="not1 not2 not3 not5 not6 not7 not8 not9" x="0" y="474" width="960" height="150" fill="#efe1e5" />

      <!-- Building Commissioning Professional paths -->

      <!-- Swimlane 1 (to second # swimline) Paths -->

      <g id="swimlane1-paths-1">
        <!-- B.S. Mechanical Engineering to Sustainability Specialist-->
        <line class="highlights track1 track7 path1 path5 path6 path7" x1="85" y1="35" x2="320" y2="130" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
        <!-- Energy Engineer to Building Energy Manager Certification -->
        <line class="highlights track1 track8 path2 path5 path6 path7" x1="135" y1="115" x2="480" y2="76" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
        <!-- Sustainability Specialist to Building Energy Manager Certification -->
        <line class="highlights track1 track8 track7 path1 path4 path5 path6 path7" x1="320" y1="130" x2="480" y2="76" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
        <!-- Federal Energy Engineer to Building Energy Manager Certification -->
        <line class="highlights track1 track8 track9 path3 path5 path6 path7" x1="215" y1="70" x2="480" y2="76" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
        <!-- Building Energy Manager Certification to Chief Sustainability Officer -->
        <line class="highlights track1 track5 track6 track7 track8 track9 path1 path2 path3 path4 path5 path8 path9 path10 path11 path12 path13 path16 path18 path23 path25 path26" x1="480" y1="76" x2="685" y2="50" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
        <!-- Building Energy Manager Certification to Regional Energy Manager -->
        <line class="highlights track1 track5 track6 track7 track8 track9 path1 path2 path3 path4 path6 path8 path9 path10 path11 path12 path13 path16 path18 path23 path25 path26" x1="480" y1="76" x2="760" y2="95" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
        <!-- Building Energy Manager Certification to CEO/Owner of Energy Firm -->
        <line class="highlights track1 track5 track6 track7 track8 track9 path1 path2 path3 path4 path7 path8 path9 path10 path11 path12 path13 path16 path18 path23 path25 path26" x1="480" y1="76" x2="855" y2="135" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
      </g>

      <g id="swimlane1-paths-2">
        <!-- B.S. Mechanical Engineering to Energy Consultant -->
        <line class="highlights track1 track2 track7 path1 path5 path6 path7 path14 path15" x1="85" y1="35" x2="350" y2="235" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
        <!-- Energy Engineer to Building Energy Auditor Certification -->
        <line class="highlights track2 track8 path2 path7 path14 path15" x1="135" y1="115" x2="480" y2="240" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
      </g>

      <g id="swimlane1-paths-3">
        <!-- B.S. Mechanical Engineering to Commissioning Technician -->
        <line class="highlights track3 track7 path1 path21 path22" x1="85" y1="35" x2="240" y2="430" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
        <!-- Energy Engineer to Building Commissioning Professional-->
        <line class="highlights track3 track8 path2 path21 path22" x1="135" y1="115" x2="480" y2="390" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
      </g>
      <g id="swimlane1-paths-4">
        <!-- B.S. Mechanical Engineering to Federal Facility Manager -->
        <line class="highlights track4 track7 path1 path32 path33 path34 path35 path36" x1="85" y1="35" x2="325" y2="555" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
      </g>

      <!-- Swimlane 2 (to second # swimline) Paths -->

      <g id="swimlane2-paths-1">
        <!-- Energy Consultant to Building Energy Manager Certification -->
        <line class="highlights track1 track5 track6 track7 track8 path1 path5 path6 path7 path8 path9 path10 path11 path12 path13 path16 path18 path23 path25 path26" x1="350" y1="235" x2="480" y2="76" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
        <!-- Building Energy Auditor Certification to CEO/Owner of Energy Firm -->
        <line class="highlights track2 track5 track6 track7 track8 path1 path2 path7 path8 path9 path10 path11 path12 path13 path16 path18 path23 path25 path26" x1="480" y1="240" x2="855" y2="135" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
      </g>

      <g id="swimlane2-paths-2">
        <!-- HVAC Technician to Energy Consultant -->
        <line class="highlights track1 track2 track6 track7 path5 path6 path7 path8 path14 path15 path16" x1="70" y1="280" x2="350" y2="235" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
        <!-- Air Force HVACR to Energy Consultant -->
        <line class="highlights veteran-jobs track1 track2 track5 path5 path6 path7 path9 path14 path15" x1="65" y1="210" x2="350" y2="235" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
        <!-- B.S. HVAC Tech to Energy Consultant -->
        <line class="highlights track1 track2 track7 path5 path6 path10 path14 path15 path16" x1="135" y1="245" x2="350" y2="235" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
        <!-- Construction and Building Inspectors to Energy Consultant -->
        <line class="highlights track1 track2 track6 path6 path7 path11 path14 path15" x1="200" y1="190" x2="350" y2="235" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
        <!-- Residential Energy Assessor to Energy Consultant -->
        <line class="highlights track1 track2 track8 path5 path6 path7 path12 path14 path15" x1="240" y1="295" x2="350" y2="235" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
        <!-- Energy Consultant to Building Energy Auditor Certification -->
        <line class="highlights track2 track5 track6 track7 track8 path1 path7 path8 path9 path10 path11 path12 path13 path14 path15 path16 path18 path23 path25 path26" x1="350" y1="235" x2="480" y2="240" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
        <!-- Building Energy Auditor Certification to Senior Energy Auditor -->
        <line class="highlights track2 track5 track6 track7 track8 path1 path2 path8 path9 path10 path11 path12 path13 path14 path16 path18 path23 path25 path26" x1="480" y1="240" x2="710" y2="270" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
         <!-- Building Energy Auditor Certification to Senior Technical Specialist -->
        <line class="highlights track2 track5 track6 track7 track8 path1 path2 path8 path9 path10 path11 path12 path13 path15 path16 path18 path23 path25 path26" x1="480" y1="240" x2="820" y2="215" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
      </g>

      <g id="swimlane2-paths-3">
        <!-- HVAC Technician to Commissioning Technician -->
        <line class="highlights track3 track6 track7 path8 path16 path21 path22" x1="70" y1="280" x2="240" y2="430" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
        <!-- B.S. HVAC Tech to Controls Technician -->
        <line class="highlights track3 track7 path10 path16 path21 path22" x1="135" y1="245" x2="330" y2="375" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
        <!-- B.S. HVAC Tech to Commissioning Technician -->
        <line class="highlights track3 track7 path10 path16 path21 path22" x1="135" y1="245" x2="240" y2="430" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
      </g>

      <g id="swimlane2-paths-4">
        <!-- Air Force HVACR to Building Engineer -->
        <line class="highlights track4 track5 path9 path32 path33 path34 path35 path36" x1="65" y1="210" x2="345" y2="520" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
        <!-- B.S. HVAC Tech to Building Engineer -->
        <line class="highlights track4 track7 path10 path16 path32 path33 path34 path35 path36" x1="135" y1="245" x2="345" y2="520" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
        <!-- HVAC Technician to Building Engineer -->
        <line class="highlights track4 track6 track7 path8 path16 path32 path33 path34 path35 path36" x1="70" y1="280" x2="345" y2="520" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
      </g>

      <!-- Swimlane 3 (to second # swimline) Paths -->
      <g id="swimlane3-paths-1">
      </g>

      <g id="swimlane3-paths-2">
        <!-- A.S. HVAC Tech to HVAC Technician -->
        <line class="highlights track1 track2 track3 track4 track7 path5 path6 path7 path14 path15 path16 path21 path22 path32 path33 path34 path35 path36" x1="55" y1="390" x2="70" y2="280" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
        <!-- A.S. HVAC Tech to B.S. HVAC Tech -->
        <line class="highlights track1 track2 track7 track3 track7 path5 path6 path7 path14 path15 path16 path21 path22 path32 path33 path34 path35 path36" x1="55" y1="390" x2="135" y2="245" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
        <!-- B.S. Building Automation Tech to Energy Consultant -->
        <line class="highlights track1 track2 track7 path5 path6 path7 path14 path15 path18 path25" x1="170" y1="350" x2="350" y2="235" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
      </g>

      <g id="swimlane3-paths-3">
        <!-- Sheet Metal Worker to Commissioning Technician -->
        <line class="highlights track3 track6 path17 path21 path22" x1="115" y1="450" x2="240" y2="430" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
        <!-- B.S. Building Automation Tech to Controls Technician -->
        <line class="highlights track3 track7 path18 path21 path22 path25" x1="170" y1="350" x2="330" y2="375" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
        <!-- B.S. Building Automation Tech to Commissioning Technician -->
        <line class="highlights track3 track7 path18 path21 path22 path25" x1="170" y1="350" x2="240" y2="430" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
        <!-- Controls Technician to Building Commissioning Professional -->
        <line class="highlights track3 track7 track8 path10 path16 path18 path20 path21 path22 path25" x1="330" y1="375" x2="480" y2="390" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
        <!-- Commissioning Technician to Building Commissioning Professional -->
        <line class="highlights track3 track6 track7 track8 path1 path8 path10 path16 path17 path18 path19 path21 path22 path25" x1="240" y1="430" x2="480" y2="390" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
        <!-- Building Commissioning Professional to Senior Commissioning Manager -->
        <line class="highlights track3 track6 track7 track8 path1 path2 path8 path10 path16 path17 path18 path19 path20 path21 path25" x1="480" y1="390" x2="735" y2="390" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
        <!-- Building Commissioning Professional to President of Commissioning Firm -->
        <line class="highlights track3 track6 track7 track8 path1 path2 path8 path10 path16 path17 path18 path19 path20 path22 path25" x1="480" y1="390" x2="840" y2="440" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
      </g>

      <g id="swimlane3-paths-4">
        <!-- A.S. HVAC Tech to Maintenance Technician -->
        <line class="highlights track4 track7 path16 path32 path33 path34 path35 path36" x1="55" y1="390" x2="275" y2="585" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
        <!-- A.S. HVAC Tech to Superintendent -->
        <line class="highlights track4 track7 path16 path32 path33 path34 path35 path36" x1="55" y1="390" x2="355" y2="610" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
      </g>

      <!-- Swimlane 4 (to second # swimline) Paths -->

      <g id="swimlane4-paths-1">
      </g>

      <g id="swimlane4-paths-2">
        <!-- Electrician to Energy Consultant -->
        <line class="highlights track1 track2 track5 track6 path14 path15 path23" x1="50" y1="510" x2="350" y2="235" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
        <!-- Navy UT Utilitiesman to Energy Consultant -->
        <line class="highlights track1 track2 track5 path14 path15 path26" x1="185" y1="545" x2="350" y2="235" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
      </g>

      <g id="swimlane4-paths-3">
        <!-- A.S. Electro. Mech. Maint. Tech to B.S. Building Automation Tech -->
        <line class="highlights track1 track2 track3 track7 path14 path15 path21 path22 path25" x1="145" y1="600" x2="170" y2="350" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
      </g>

      <g id="swimlane4-paths-4">
        <!-- Electrician to Building Engineer -->
        <line class="highlights trades-jobs track4 track5 track6 path23 path32 path33 path34 path35 path36" x1="50" y1="510" x2="345" y2="520" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
        <!-- A.S. Building Maint. Tech to Maintenance Technician -->
        <line class="highlights track4 track7 path24 path32 path33 path34 path35 path36" x1="90" y1="560" x2="275" y2="585" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
        <!-- A.S. Electro. Mech. Maint. Tech to Maintenance Technician -->
        <line class="highlights track4 track7 path25 path32 path33 path34 path35 path36" x1="145" y1="600" x2="275" y2="585" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
        <!-- Navy UT Utilitiesman to Building Engineer -->
        <line class="highlights track4 track5 path26 path32 path33 path34 path35 path36" x1="185" y1="545" x2="345" y2="520" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
        <!-- Maintenance Technician to Building Engineer -->
        <line class="highlights track4 track6 track7 path16 path24 path25 path27 path32 path33 path34 path35 path36" x1="275" y1="585" x2="345" y2="520" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
        <!-- Federal Facility Specialist to Federal Facility Manager -->
        <line class="highlights track4 track6 track9 path28 path32 path33 path34 path35 path36" x1="260" y1="505" x2="325" y2="555" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
        <!-- Federal Facility Manager to Building Operations Professional -->
        <line class="highlights track4 track6 track7 track9 path1 path28 path29 path32 path33 path34 path35 path36" x1="325" y1="555" x2="480" y2="550" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
        <!-- Building Engineer to Building Operations Professional -->
        <line class="highlights track4 track6 track5 track7 path9 path8 path10 path16 path23 path24 path25 path26 path27 path30 path32 path33 path34 path35 path36" x1="345" y1="520" x2="480" y2="550" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
        <!-- Superintendent to Building Operations Professional -->
        <line class="highlights track4 track6 track7 path16 path31 path32 path33 path34 path35 path36" x1="355" y1="610" x2="480" y2="550" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
        <!-- Building Operations Professional to Senior Manager of Operations -->
        <line class="highlights track4 track5 track6 track7 track9 path1 path8 path9 path10 path16 path23 path24 path25 path26 path27 path28 path29 path30 path31 path32" x1="480" y1="550" x2="650" y2="515" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
        <!-- Building Operations Professional to Chief Building Engineer -->
        <line class="highlights track4 track5 track6 track7 track9 path1 path8 path9 path10 path16 path23 path24 path25 path26 path27 path28 path29 path30 path31 path33" x1="480" y1="550" x2="650" y2="585" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
        <!-- Building Operations Professional to Chief Engineer (Federal O&M Contractor) -->
        <line class="highlights track4 track5 track6 track7 track9 path1 path8 path9 path10 path16 path23 path24 path25 path26 path27 path28 path29 path30 path31 path34" x1="480" y1="550" x2="770" y2="560" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
        <!-- Building Operations Professional to Regional Facility Manager -->
        <line class="highlights track4 track5 track6 track7 track9 path1 path8 path9 path10 path16 path23 path24 path25 path26 path27 path28 path29 path30 path31 path35" x1="480" y1="550" x2="870" y2="505" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
        <!-- Building Operations Professional to Director of Maintenance -->
        <line class="highlights track4 track5 track6 track7 track9 path1 path8 path9 path10 path16 path23 path24 path25 path26 path27 path28 path29 path30 path31 path36" x1="480" y1="550" x2="865" y2="600" stroke="#666" stroke-width="5" stroke-opacity="0.5" />
      </g>

      <!-- Node Highlights -->
      <g id="node-highlights">

        <!-- lane 1 -->
        <!-- B.S. Mechanical Engineering -->
        <circle class="highlights track1 track2 track3 track4 track7 path1 path5 path6 path7 path14 path15 path21 path22 path32 path33 path34 path35 path36" cx="85" cy="35" r="12" fill="#666" />
        <!-- Energy Engineer -->
        <circle class="highlights track1 track2 track3 track8 path2 path5 path6 path7 path14 path15 path21 path22" cx="135" cy="115" r="12" fill="#666" />
        <!-- Federal Energy Engineer -->
        <circle class="highlights track1 track8 track9 path3 path5 path6 path7" cx="215" cy="70" r="12" fill="#666" />
        <!-- Sustainability Specialist -->
        <circle class="highlights track1 track7 track8 path1 path4 path5 path6 path7 path10" cx="320" cy="130" r="12" fill="#666" />
        <!-- Chief Sustainability Officer -->
        <circle class="highlights track1 track5 track6 track7 track8 track9 path1 path2 path3 path4 path5 path8 path9 path10 path11 path12 path13 path16 path18 path23 path25 path26" cx="685" cy="50" r="12" fill="#666" />
        <!-- Regional Energy Manager -->
        <circle class="highlights track1 track5 track6 track7 track8 track9 path1 path2 path3 path4 path6 path8 path9 path10 path11 path12 path13 path16 path18 path23 path25 path26" cx="760" cy="95" r="12" fill="#666" />
        <!-- CEO/Owner of Energy Firm -->
        <circle class="highlights track1 track2 track5 track6 track7 track8 track9 path1 path2 path3 path4 path7 path8 path9 path10 path11 path12 path13 path16 path18 path23 path25 path26" cx="855" cy="135" r="12" fill="#666" />

        <!-- lane 2 -->
        <!-- HVAC Technician -->
        <circle class="highlights track1 track2 track3 track4 track6 track7 path5 path6 path7 path8 path14 path15 path16 path21 path22 path32 path33 path34 path35 path36" cx="70" cy="280" r="12" fill="#666" />
        <!-- Air Force HVACR -->
        <circle class="highlights track1 track2 track4 track5 path5 path6 path7 path9 path14 path15 path32 path33 path34 path35 path36" cx="65" cy="210" r="12" fill="#666" />
        <!-- B.S. HVAC Tech -->
        <circle class="highlights track1 track2 track3 track4 track7 path5 path6 path7 path10 path14 path15 path16 path21 path22 path32 path33 path34 path35 path36" cx="135" cy="245" r="12" fill="#666" />
        <!-- Construction and Building Inspectors -->
        <circle class="highlights track1 track2 track6 path5 path6 path7 path11 path14 path15" cx="200" cy="190" r="12" fill="#666" />
        <!-- Residential Energy Assessor -->
        <circle class="highlights track1 track2 track8 path5 path6 path7 path12 path14 path15" cx="240" cy="295" r="12" fill="#666" />
        <!-- Energy Consultant -->
        <circle class="highlights track1 track2 track5 track6 track7 track8 path1 path5 path6 path7 path8 path9 path10 path11 path12 path13 path14 path15 path16 path18 path23 path25 path26" cx="350" cy="235" r="12" fill="#666" />
        <!-- Senior Energy Auditor -->
        <circle class="highlights track2 track5 track6 track7 track8 path1 path2 path8 path9 path10 path11 path12 path13 path14 path16 path18 path23 path25 path26" cx="710" cy="270" r="12" fill="#666" />
        <!-- Senior Technical Specialist -->
        <circle class="highlights track2 track5 track6 track7 track8 path1 path2 path8 path9 path10 path11 path12 path13 path15 path16 path18 path23 path25 path26" cx="820" cy="215" r="12" fill="#666" />

        <!-- lane 3 -->
        <!-- A.S. HVAC Tech -->
        <circle class="highlights track1 track2 track3 track4 track7 path5 path6 path7 path14 path15 path16 path21 path22 path32 path33 path34 path35 path36" cx="55" cy="390" r="12" fill="#666" />
        <!-- Sheet Metal Worker -->
        <circle class="highlights track3 track6 path17 path21 path22" cx="115" cy="450" r="12" fill="#666" />
        <!-- B.S. Building Automation Tech -->
        <circle class="highlights track1 track2 track3 track7 path5 path6 path7 path14 path15 path18 path21 path22 path25" cx="170" cy="350" r="12" fill="#666" />
        <!-- Commissioning Technician -->
        <circle class="highlights track3 track6 track7 track8 path1 path8 path10 path16 path17 path18 path19 path21 path22 path25" cx="240" cy="430" r="12" fill="#666" />
        <!-- Controls Technician -->
        <circle class="highlights track3 track7 track8 path10 path16 path18 path20 path21 path22 path25" cx="330" cy="375" r="12" fill="#666" />
        <!-- Senior Commissioning Manager -->
        <circle class="highlights track3 track6 track7 track8 path1 path2 path8 path10 path16 path17 path18 path19 path20 path21 path25" cx="735" cy="390" r="12" fill="#666" />
        <!-- President of Commissioning Firm -->
        <circle class="highlights track3 track6 track7 track8 path1 path2 path8 path10 path16 path17 path18 path19 path20 path22 path25" cx="840" cy="440" r="12" fill="#666" />

        <!-- lane 4 -->
        <!-- Electrician -->
        <circle class="highlights track1 track2 track4 track5 track6 path14 path15 path23 path32 path33 path34 path35 path36" cx="50" cy="510" r="12" fill="#666" /> 
        <!-- A.S. Building Maint. Tech -->
        <circle class="highlights track4 track7 path24 path32 path33 path34 path35 path36" cx="90" cy="560" r="12" fill="#666" /> 
        <!-- A.S. Electro. Mech. Maint. Tech -->
        <circle class="highlights track1 track2 track3 track4 track7 path14 path15 path21 path22 path25 path32 path33 path34 path35 path36" cx="145" cy="600" r="12" fill="#666" /> 
        <!-- Navy UT Utilitiesman -->
        <circle class="highlights track1 track2 track4 track5 path14 path15 path26 path32 path33 path34 path35 path36" cx="185" cy="545" r="12" fill="#666" /> 
        <!-- Maintenance Technician -->
        <circle class="highlights track4 track6 track7 path16 path24 path25 path27 path32 path33 path34 path35 path36" cx="275" cy="585" r="12" fill="#666" /> 
        <!-- Federal Facility Specialist -->
        <circle class="highlights track4 track6 track9 path28 path32 path33 path34 path35 path36" cx="260" cy="505" r="12" fill="#666" /> 
        <!-- Federal Facility Manager -->
        <circle class="highlights track4 track6 track7 track9 path1 path28 path29 path32 path33 path34 path35 path36" cx="325" cy="555" r="12" fill="#666" /> 
        <!-- Building Engineer -->
        <circle class="highlights track4 track5 track6 track7 path8 path9 path10 path16 path23 path24 path25 path26 path27 path30 path32 path33 path34 path35 path36" cx="345" cy="520" r="12" fill="#666" /> 
        <!-- Superintendent -->
        <circle class="highlights track4 track6 track7 path16 path31 path32 path33 path34 path35 path36" cx="355" cy="610" r="12" fill="#666" /> 
        <!-- Senior Manager of Operations -->
        <circle class="highlights track4 track5 track6 track7 track9 path1 path8 path9 path10 path16 path23 path24 path25 path26 path27 path28 path29 path30 path31 path32" cx="650" cy="515" r="12" fill="#666" /> 
        <!-- Chief Building Engineer -->
        <circle class="highlights track4 track5 track6 track7 track9 path1 path8 path9 path10 path16 path23 path24 path25 path26 path27 path28 path29 path30 path31 path33" cx="650" cy="585" r="12" fill="#666" /> 
        <!-- Chief Engineer (Federal O&M Contractor) -->
        <circle class="highlights track4 track5 track6 track7 track9 path1 path8 path9 path10 path16 path23 path24 path25 path26 path27 path28 path29 path30 path31 path34" cx="770" cy="560" r="12" fill="#666" /> 
        <!-- Regional Facility Manager -->
        <circle class="highlights track4 track5 track6 track7 track9 path1 path8 path9 path10 path16 path23 path24 path25 path26 path27 path28 path29 path30 path31 path35" cx="870" cy="505" r="12" fill="#666" /> 
        <!-- Director of Maintenance -->
        <circle class="highlights track4 track5 track6 track7 track9 path1 path8 path9 path10 path16 path23 path24 path25 path26 path27 path28 path29 path30 path31 path36" cx="865" cy="600" r="12" fill="#666" /> 
      </g>

      <!-- nodes --> 

      <g id="swimlane1-nodes">
        <!-- B.S. Mechanical Eng. -->
        <circle id="job1" class="fade-in fade-out" cx="85" cy="35" r="8" fill="#6eaf45" />
        <!-- Energy Engineer -->
        <circle id="job2" class="fade-in fade-out not4" cx="135" cy="115" r="8" fill="#6eaf45" />
        <!-- Federal Energy Engineer -->
        <circle id="job3" class="fade-in fade-out not2 not3 not4" cx="215" cy="70" r="8" fill="#6eaf45" />
        <!-- Sustainability Specialist -->
        <circle id="job4" class="fade-in fade-out not2 not3 not4" cx="320" cy="130" r="8" fill="#6eaf45" />
        <!-- Chief Sustainability Officer -->
        <circle id="job5" class="fade-in fade-out not2 not3 not4" cx="685" cy="50" r="8" fill="#6eaf45" />
        <!-- Regional Energy Manager -->
        <circle id="job6" class="fade-in fade-out not2 not3 not4" cx="760" cy="95" r="8" fill="#6eaf45" />
        <!-- CEO/Owner of Energy Firm -->
        <circle id="job7" class="fade-in fade-out not3 not4" cx="855" cy="135" r="8" fill="#6eaf45" />
      </g>
      <g id="swimlane2-nodes">
        <!-- HVAC Technician -->
        <circle id="job8" class="fade-in fade-out" cx="70" cy="280" r="8" fill="#f7931f" />
        <!-- Air Force HVACR -->
        <circle id="job9" class="fade-in fade-out not3" cx="65" cy="210" r="8" fill="#f7931f" />
        <!-- B.S. HVAC Tech -->
        <circle id="job10" class="fade-in fade-out" cx="135" cy="245" r="8" fill="#f7931f" />
        <!-- Construction and Building Inspectors -->
        <circle id="job11" class="fade-in fade-out not3 not4" cx="200" cy="190" r="8" fill="#f7931f" />
        <!-- Residential Energy Assessor -->
        <circle id="job12" class="fade-in fade-out not3 not4" cx="240" cy="295" r="8" fill="#f7931f" />
        <!-- Energy Consultant -->
        <circle id="job13" class="fade-in fade-out not3 not4" cx="350" cy="235" r="8" fill="#f7931f" />
        <!-- Senior Energy Auditor -->
        <circle id="job14" class="fade-in fade-out not1 not3 not4" cx="710" cy="270" r="8" fill="#f7931f" />
        <!-- Senior Technical Specialist -->
        <circle id="job15" class="fade-in fade-out not1 not3 not4" cx="820" cy="215" r="8" fill="#f7931f" />
      </g>
      <g id="swimlane3-nodes">
        <!-- A.S. HVAC Tech -->
        <circle id="job16" class="fade-in fade-out" cx="55" cy="390" r="8" fill="#00919f" />
        <!-- Sheet Metal Worker -->
        <circle id="job17" class="fade-in fade-out not1 not2 not4" cx="115" cy="450" r="8" fill="#00919f" />
        <!-- B.S. Building Automation Tech -->
        <circle id="job18" class="fade-in fade-out not4" cx="170" cy="350" r="8" fill="#00919f" />
        <!-- Commissioning Technician -->
        <circle id="job19" class="fade-in fade-out not1 not2 not4" cx="240" cy="430" r="8" fill="#00919f" />
        <!-- Controls Technician -->
        <circle id="job20" class="fade-in fade-out not1 not2 not4" cx="330" cy="375" r="8" fill="#00919f" />
        <!-- Senior Commissioning Manager -->
        <circle id="job21" class="fade-in fade-out not1 not2 not4" cx="735" cy="390" r="8" fill="#00919f" />
        <!-- President of Commissioning Firm -->
        <circle id="job22" class="fade-in fade-out not1 not2 not4" cx="840" cy="440" r="8" fill="#00919f" />
      </g>
      <g id="swimlane4-nodes">
        <!-- Electrician -->
        <circle id="job23" class="fade-in fade-out not3" cx="50" cy="510" r="8" fill="#ac4c6a" />
        <!-- A.S. Building Maint. Tech -->
        <circle id="job24" class="fade-in fade-out not1 not2 not3" cx="90" cy="560" r="8" fill="#ac4c6a" />
        <!-- A.S. Electro. Mech. Maint. Tech -->
        <circle id="job25" class="fade-in fade-out" cx="145" cy="600" r="8" fill="#ac4c6a" />
        <!-- Navy UT Utilitiesman -->
        <circle id="job26" class="fade-in fade-out not3" cx="185" cy="545" r="8" fill="#ac4c6a" />
        <!-- Maintenance Technician -->
        <circle id="job27" class="fade-in fade-out not1 not2 not3" cx="275" cy="585" r="8" fill="#ac4c6a" />
        <!-- Federal Facility Specialist -->
        <circle id="job28" class="fade-in fade-out not1 not2 not3" cx="260" cy="505" r="8" fill="#ac4c6a" />
        <!-- Federal Facility Manager -->
        <circle id="job29" class="fade-in fade-out not1 not2 not3" cx="325" cy="555" r="8" fill="#ac4c6a" />
        <!-- Building Engineer -->
        <circle id="job30" class="fade-in fade-out not1 not2 not3" cx="345" cy="520" r="8" fill="#ac4c6a" />
        <!-- Superintendent -->
        <circle id="job31" class="fade-in fade-out not1 not2 not3" cx="355" cy="610" r="8" fill="#ac4c6a" />
        <!-- Senior Manager of Operations -->
        <circle id="job32" class="fade-in fade-out not1 not2 not3" cx="650" cy="515" r="8" fill="#ac4c6a" />
        <!-- Chief Building Engineer -->
        <circle id="job33" class="fade-in fade-out not1 not2 not3" cx="650" cy="585" r="8" fill="#ac4c6a" />
        <!-- Chief Engineer (Federal O&M Contractor) -->
        <circle id="job34" class="fade-in fade-out not1 not2 not3" cx="770" cy="560" r="8" fill="#ac4c6a" />
        <!-- Regional Facility Manager -->
        <circle id="job35" class="fade-in fade-out not1 not2 not3" cx="870" cy="505" r="8" fill="#ac4c6a" />
        <!-- Director of Maintenance -->
        <circle id="job36" class="fade-in fade-out not1 not2 not3" cx="865" cy="600" r="8" fill="#ac4c6a" />
      </g>

      <!-- text -->

      <g id="swimlane1-text">
        <text class="node-title track1 track2 track3 track4 track7 path1 path5 path6 path7 path14 path15 path21 path22 path32 path33 path34 path35 path36" text-anchor="middle" x="85" y="18">B.S. Mechanical Eng.</text>
        <text class="node-title track1 track2 track3 track8 path2 path5 path6 path7 path14 path15 path21 path22" text-anchor="middle" x="135" y="98">Energy Engineer</text>
        <text class="node-title track1 track8 track9 path3 path5 path6 path7" text-anchor="middle" x="215" y="53">Federal Energy Engineer</text>
        <text class="node-title track1 track7 track8 path1 path4 path5 path6 path7" text-anchor="middle" x="320" y="113">Sustainability Specialist</text>
        <text class="node-title track1 track5 track6 track7 track8 track9 path1 path2 path3 path4 path5 path8 path9 path10 path11 path12 path13 path16 path18 path23 path25 path26" text-anchor="middle" x="685" y="33">Chief Sustainability Officer</text>
        <text class="node-title track1 track5 track6 track7 track8 track9 path1 path2 path3 path4 path6 path8 path9 path10 path11 path12 path13 path16 path18 path23 path25 path26" text-anchor="middle" x="760" y="78">Regional Energy Manager</text>
        <text class="node-title track1 track2 track5 track6 track7 track8 track9 path1 path2 path3 path4 path7 path8 path9 path10 path11 path12 path13 path16 path18 path23 path25 path26" text-anchor="middle" x="855" y="118">CEO/Owner of Energy Firm</text>
      </g>
      <g id="swimlane2-text">
        <text class="node-title track1 track2 track3 track4 track6 track7 path5 path6 path7 path8 path14 path15 path16 path21 path22 path32 path33 path34 path35 path36" text-anchor="middle" x="70" y="263">HVAC Technician</text>
        <text class="node-title track1 track2 track4 track5 path5 path6 path7 path9 path14 path15 path32 path33 path34 path35 path36" text-anchor="middle" x="65" y="193">Air Force HVACR</text>
        <text class="node-title track1 track2 track3 track4 track7 path5 path6 path7 path10 path14 path15 path16 path21 path22 path32 path33 path34 path35 path36" text-anchor="middle" x="135" y="228">B.S. HVAC Tech</text>
        <text class="node-title track1 track2 track6 path5 path6 path7 path11 path14 path15" text-anchor="middle" x="200" y="173">Construction and Building Inspectors</text>
        <text class="node-title track1 track2 track8 path5 path6 path7 path12 path14 path15" text-anchor="middle" x="240" y="278">Residential Energy Assessor</text>
        <text class="node-title track1 track2 track5 track6 track7 track8 path1 path5 path6 path7 path8 path9 path10 path11 path12 path13 path14 path15 path16 path18 path23 path25 path26" text-anchor="middle" x="350" y="218">Energy Consultant</text>
        <text class="node-title track2 track5 track6 track7 track8 path1 path2 path8 path9 path10 path11 path12 path13 path14 path16 path18 path23 path25 path26" text-anchor="middle" x="710" y="253">Senior Energy Auditor</text>
        <text class="node-title track2 track5 track6 track7 track8 path1 path2 path8 path9 path10 path11 path12 path13 path15 path16 path18 path23 path25 path26" text-anchor="middle" x="820" y="198">Senior Technical Specialist</text>
      </g>
       <g id="swimlane3-text">
        <text class="node-title track1 track2 track3 track4 track7 path5 path6 path7 path14 path15 path16 path21 path22 path32 path33 path34 path35 path36" text-anchor="middle" x="55" y="373">A.S. HVAC Tech</text>
        <text class="node-title track3 track6 path17 path21 path22" text-anchor="middle" x="115" y="433">Sheet Metal Worker</text>
        <text class="node-title track1 track2 track3 track7 path5 path6 path7 path14 path15 path18 path21 path22 path25" text-anchor="middle" x="170" y="333">B.S. Building Automation Tech</text>
        <text class="node-title track3 track6 track7 track8 path1 path8 path10 path16 path17 path18 path19 path21 path22 path25" text-anchor="middle" x="240" y="413">Commissioning Technician</text>
        <text class="node-title track3 track7 track8 path10 path16 path18 path20 path21 path22 path25" text-anchor="middle" x="330" y="358">Controls Technician</text>
        <text class="node-title track3 track6 track7 track8 path1 path2 path8 path10 path16 path17 path18 path19 path20 path21 path25" text-anchor="middle" x="735" y="373">Senior Commissioning Manager</text>
        <text class="node-title track3 track6 track7 track8 path1 path2 path8 path10 path16 path17 path18 path19 path20 path22 path25" text-anchor="middle" x="840" y="423">President of Commissioning Firm</text>
      </g>
      <g id="swimlane4-text">
        <text class="node-title track1 track2 track4 track5 track6 path14 path15 path23 path32 path33 path34 path35 path36" text-anchor="middle" x="50" y="493">Electrician</text>
        <text class="node-title track4 track7 path24 path32 path33 path34 path35 path36" text-anchor="middle" x="90" y="543">A.S. Building Maint. Tech</text>
        <text class="node-title track1 track2 track3 track4 track7 path14 path15 path21 path22 path25 path32 path33 path34 path35 path36" text-anchor="middle" x="145" y="583">A.S. Electro. Mech. Maint. Tech</text>
        <text class="node-title track1 track2 track4 track5 path14 path15 path26 path32 path33 path34 path35 path36" text-anchor="middle" x="185" y="528">Navy UT Utilitiesman</text>
        <text class="node-title track4 track6 track7 path16 path24 path25 path27 path32 path33 path34 path35 path36" text-anchor="middle" x="275" y="568">Maintenance Technician</text>
        <text class="node-title track4 track6 track9 path28 path32 path33 path34 path35 path36" text-anchor="middle" x="260" y="488">Federal Facility Specialist</text>
        <text class="node-title track4 track6 track7 track9 path1 path28 path29 path32 path33 path34 path35 path36" text-anchor="middle" x="325" y="543">Federal Facility Manager</text>
        <text class="node-title track4 track5 track6 track7 path8 path9 path10 path16 path23 path24 path25 path26 path27 path28 path30 path32 path33 path34 path35 path36" text-anchor="middle" x="345" y="503">Building Engineer</text>
        <text class="node-title track4 track6 track7 path16 path31 path32 path33 path34 path35 path36" text-anchor="middle" x="355" y="593">Superintendent</text>
        <text class="node-title track4 track5 track6 track7 track9 path1 path8 path9 path10 path16 path23 path24 path25 path26 path27 path28 path29 path30 path31 path32" text-anchor="middle" x="650" y="498">Senior Manager of Operations</text>
        <text class="node-title track4 track5 track6 track7 track9 path1 path8 path9 path10 path16 path23 path24 path25 path26 path27 path28 path29 path30 path31 path33" text-anchor="middle" x="650" y="568">Chief Building Engineer</text>
        <text class="node-title track4 track5 track6 track7 track9 path1 path8 path9 path10 path16 path23 path24 path25 path26 path27 path28 path29 path30 path31 path34" text-anchor="middle" x="770" y="543">Chief Engineer (Federal O&M Contractor)</text>
        <text class="node-title track4 track5 track6 track7 track9 path1 path8 path9 path10 path16 path23 path24 path25 path26 path27 path28 path29 path30 path31 path35" text-anchor="middle" x="870" y="488">Regional Facility Manager</text>
        <text class="node-title track4 track5 track6 track7 track9 path1 path8 path9 path10 path16 path23 path24 path25 path26 path27 path28 path29 path30 path31 path36" text-anchor="middle" x="865" y="583">Director of Maintenance</text>
      </g>


      <!-- images -->

      <!-- Draw images and circles -->
      <g id="cert-container" transform="translate(412,0)">
        <g id="cert-badge-1" class="image not2 not3 not4 not5 not6 not7 not8 not9" transform="translate(0,13)">
            <image width="136" height="136" xlink:href="http://fcm/wp-content/uploads/BEM-100-x-100-test-with-title.png" clip-path="url(#circleView)" />
          <!-- <rect x="0" y="0" width="136" height="136" rx="7" ry="7" fill="#6eaf45" /> -->
        </g>
        <g id="cert-badge-2" class="image not1 not3 not4 not5 not6 not7 not8 not9" transform="translate(0,169)">
            <image width="136" height="136" xlink:href="http://fcm/wp-content/uploads/BEA-100-x-100-test-with-title.png" clip-path="url(#circleView)" />
          <!-- <rect x="0" y="0" width="136" height="136" rx="7" ry="7" fill="#f7931f" /> -->
        </g>
        <g id="cert-badge-3" class="image not1 not2 not4 not5 not6 not7 not8 not9" transform="translate(0,325)">
            <image width="136" height="136" xlink:href="http://fcm/wp-content/uploads/BCP-100-x-100-test-with-title.png" clip-path="url(#circleView)" />
          <!-- <rect x="0" y="0" width="136" height="136" rx="7" ry="7" fill="#00919f" /> -->
        </g>
        <g id="cert-badge-4" class="image not1 not2 not3 not5 not6 not7 not8 not9" transform="translate(0,481)">
            <image width="136" height="136" xlink:href="http://fcm/wp-content/uploads/BOP-100-x-100-test-with-title.png" clip-path="url(#circleView)" />
          <!-- <rect x="0" y="0" width="136" height="136" rx="7" ry="7" fill="#ac4c6a" /> -->
        </g>
      </g>
    </svg>
</div>

<div id="sidebarText">
  <div id="cert-info">
    <div id="keys-pane" class="accordion-content">
      <p id="keys"></p>
    </div>
    <div id="deets-pane" class="accordion cert-tab">
      <p id="deets"></p>
    </div>
    <div id="task-pane" class="accordion cert-tab">
      <p id="task"></p>
    </div>
    <div id="comp-pane" class="accordion cert-tab">
      <p id="comp"></p>
    </div>
    <div id="profile-pane" class="accordion cert-tab">
      <p id="profile"></p>
    </div>  
  </div>

  <p id="node-summary">
    <!-- <a href="http://www.youtube.com/watch?v=LzGsm8774v4" rel="lightvideo">Video: Intro to the Career Map</a><br/>
    <a href="https://www.youtube.com/watch?v=DO87DvGxN00" rel="lightvideo">Video: Using the Career Map</a><br/><br/>
    This Career Map tool highlights emerging professional-level standards that are part of the Department of Energy’s Better Buildings Workforce Guidelines (BBWG).  The map articulates clear pathways for advancement for incumbent workers as well as the identification of strategic entry points for veterans in building trades professionals, graduates, and other job seekers.
    <br/><br/>
    The entry points on the left are strategic entry points identified as jobs that are good precursors or transition jobs to the four main BBWG jobs.  The right side of the map shows specializations to strive for and what career advancements are possible.  Hover over points to see the pathways and click on a point to see basic job data.
    <br/><br/>
    At the bottom of the map are five focus areas which act as filters.  Click on a filter to see all of the job entry points associated with that field along with the pathway for those jobs.</p> -->
    <p id="node-titles"></p>
    <p id="node-training"></p>
    <p id="node-overview"></p>
    <p id="node-occupations"></p>
    <p id="node-link"></p>
</div>

    
    <img id="sidebarBanner" class="titlePosition" src="http://fcm/wp-content/uploads/title-banner.png"/>

    <div id="sidebarTitle" class="titlePosition" >Career Mapping Tool</div>

    <div id="presets">

        <div class="filter not1 not2 not3 not4 not6 not7 not8 not9">
            <img id="vet-icon" src="http://fcm/wp-content/uploads/veterans.png"/><br/>Veterans
        </div>
        
        <div class="filter not1 not2 not3 not4 not5 not7 not8 not9">
            <img id="trades-icon" src="http://fcm/wp-content/uploads/trades.png"/><br/>Trades &amp; Builders
        </div>

        <div class="filter not1 not2 not3 not4 not5 not6 not8 not9">
            <img id="grads-icon" src="http://fcm/wp-content/uploads/grads.png"/><br/>Graduates
        </div>
        
        <div class="filter not1 not2 not3 not4 not5 not6 not7 not9">
            <img id="energyProfs-icon" src="http://fcm/wp-content/uploads/energyprofs.png"/><br/>Energy Professionals
        </div>
        
        <div class="filter not1 not2 not3 not4 not5 not6 not7 not8">
            <img id="fed-icon" src="http://fcm/wp-content/uploads/federal.png"/><br/>Federal Professionals
        </div>

    </div>
            
    <div id="pathDescription">
        <div></div>
        <span id="closePathDescription">Close</span>
    </div>
        
</div>

<?php if (is_page(7)) {
		get_footer('career-map');
	// } elseif (is_page(#)) {
	// 	get_footer('NAME');
	} else {
		get_footer();
	} ?>