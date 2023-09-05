// Get the SVG element
const svg = document.querySelector("svg");

// Create the background
const bg = document.createElementNS("http://www.w3.org/2000/svg", "rect");
bg.setAttribute("x", "0");
bg.setAttribute("y", "0");
bg.setAttribute("width", "775");
bg.setAttribute("height", "500");

// Create the stripes
const colors = ["#FFBA08", "#FAA307", "#F48C06", "#E85D04"];
const stripeWidth = (775 - (colors.length - 1) * 10) / colors.length;
let x = 0;
colors.forEach(color => {
  const stripe = document.createElementNS("http://www.w3.org/2000/svg", "rect");
  stripe.setAttribute("x", x);
  stripe.setAttribute("y", "0");
  stripe.setAttribute("width", stripeWidth);
  stripe.setAttribute("height", "500");
  stripe.setAttribute("fill", color);
  bg.appendChild(stripe);
  x += stripeWidth + 10;
});

// Add the background to the SVG
svg.appendChild(bg);

// Create the images
const imgSize = 120;
const imgMargin = (775 - imgSize * 4) / 5;
const imgY = (500 - imgSize) / 2;
for (let i = 0; i < 4; i++) {
  const img = document.createElementNS("http://www.w3.org/2000/svg", "rect");
  img.setAttribute("x", imgMargin + i * (imgSize + imgMargin));
  img.setAttribute("y", imgY);
  img.setAttribute("width", imgSize);
  img.setAttribute("height", imgSize);
  img.setAttribute("rx", "20");
  img.setAttribute("ry", "20");
  svg.appendChild(img);
  
  // Create the hover effects
  img.addEventListener("mouseenter", () => {
    // Add the border
    img.setAttribute("stroke", "#A0A0A0");
    img.setAttribute("stroke-width", "4");
    
    // Add the circles and lines
    const circleCount = Math.floor(Math.random() * 3) + 1;
    const circleSpacing = imgSize / (circleCount + 1);
    for (let j = 1; j <= circleCount; j++) {
      const circleX = imgMargin + i * (imgSize + imgMargin) + circleSpacing * j;
      const circleY = imgY + Math.floor(Math.random() * imgSize);
      
      const circle = document.createElementNS("http://www.w3.org/2000/svg", "circle");
      circle.setAttribute("cx", circleX);
      circle.setAttribute("cy", circleY);
      circle.setAttribute("r", "5");
      circle.setAttribute("fill", "rgba(160, 160, 160, 0.5)");
      svg.appendChild(circle);
      
      const line = document.createElementNS("http://www.w3.org/2000/svg", "line");
      line.setAttribute("x1", imgMargin + i * (imgSize + imgMargin) + imgSize);
      line.setAttribute("y1", circleY);
      line.setAttribute("x2", circleX);
      line.setAttribute("y2", circleY);
      line.setAttribute("stroke", "rgba(160, 160, 160, 0.5)");
      line.setAttribute("stroke-width", "4");
      svg.appendChild(line);
    }
  });
  
img.addEventListener("mouseleave", () => {
  // Remove the border
  img.removeAttribute("stroke");
  img.removeAttribute("stroke-width");
  
  // Remove the circles and lines added on hover
  const circles = svg.querySelectorAll("circle");
  circles.forEach(circle => {
    svg.removeChild(circle);
  });
  
  const lines = svg.querySelectorAll("line");
  lines.forEach(line => {
    svg.removeChild(line);
  });
});