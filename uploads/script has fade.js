      <script type="text/javascript">
        // Get the target elements
        const targetElements1 = document.getElementsByClassName("track1");
        const targetElements2 = document.getElementsByClassName("track2");
        const targetElements3 = document.getElementsByClassName("track3");
        const targetElements4 = document.getElementsByClassName("track4");

        // Get the area elements
        const areaElement1 = document.getElementById("cert1-icon");
        const areaElement2 = document.getElementById("cert2-icon");
        const areaElement3 = document.getElementById("cert3-icon");
        const areaElement4 = document.getElementById("cert4-icon");

        // Get the 'not' elements (nodes)
        const notElement1 = document.getElementsByClassName("not1");
        const notElement2 = document.getElementsByClassName("not2");
        const notElement3 = document.getElementsByClassName("not3");
        const notElement4 = document.getElementsByClassName("not4");

        // Add event listeners for mouseover on each area
        areaElement1.addEventListener("mouseover", () => {
          // Loop through target elements and hide each one
          for (let i = 0; i < targetElements1.length; i++) {
            targetElements1[i].style.display = "block";
          }
    
          // Loop through not1 nodes and fade each one
          for (let i = 0; i < notElement1.length; i++) {
            notElement1[i].style.opacity = 0.3;
          }
        });
        areaElement2.addEventListener("mouseover", () => {
          // Loop through target elements and hide each one
          for (let i = 0; i < targetElements2.length; i++) {
            targetElements2[i].style.display = "block";
          }
    
          // Loop through not2 nodes and fade each one
          for (let i = 0; i < notElement2.length; i++) {
            notElement2[i].style.opacity = 0.3;
          }
        });
        areaElement3.addEventListener("mouseover", () => {
          // Loop through target elements and hide each one
          for (let i = 0; i < targetElements3.length; i++) {
            targetElements3[i].style.display = "block";
          }
    
          // Loop through not3 nodes and fade each one
          for (let i = 0; i < notElement3.length; i++) {
            notElement3[i].style.opacity = 0.3;
          }
        });
        areaElement4.addEventListener("mouseover", () => {
          // Loop through target elements and hide each one
          for (let i = 0; i < targetElements4.length; i++) {
            targetElements4[i].style.display = "block";
          }
    
          // Loop through not4 nodes and fade each one
          for (let i = 0; i < notElement4.length; i++) {
            notElement4[i].style.opacity = 0.3;
          }
        });

        // Add event listeners for mouseout on each area
        areaElement1.addEventListener("mouseout", () => {
          // Loop through target elements and show each one
          for (let i = 0; i < targetElements1.length; i++) {
            targetElements1[i].style.display = "none";
          }
    
          // Loop through not1 elements and un-fade each one
          for (let i = 0; i < notElement1.length; i++) {
            notElement1[i].style.opacity = 1.0;
          }
        });
        areaElement2.addEventListener("mouseout", () => {
          // Loop through target elements and show each one
          for (let i = 0; i < targetElements2.length; i++) {
            targetElements2[i].style.display = "none";
          }
    
          // Loop through not2 elements and un-fade each one
          for (let i = 0; i < notElement2.length; i++) {
            notElement2[i].style.opacity = 1.0;
          }
        });
        areaElement3.addEventListener("mouseout", () => {
          // Loop through target elements and show each one
          for (let i = 0; i < targetElements3.length; i++) {
            targetElements3[i].style.display = "none";
          }
    
          // Loop through not3 elements and un-fade each one
          for (let i = 0; i < notElement3.length; i++) {
            notElement3[i].style.opacity = 1.0;
          }
        });
        areaElement4.addEventListener("mouseout", () => {
          // Loop through target elements and show each one
          for (let i = 0; i < targetElements4.length; i++) {
            targetElements4[i].style.display = "none";
          }
    
          // Loop through not4 elements and un-fade each one
          for (let i = 0; i < notElement4.length; i++) {
            notElement4[i].style.opacity = 1.0;
          }
        });
      </script>