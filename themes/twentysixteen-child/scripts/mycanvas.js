const canvas = document.getElementById('myCanvas');
const ctx = canvas.getContext('2d');

const image = new Image();
image.src = document.getElementById('myImage').src;

// Wait for the image to load before drawing on canvas
image.onload = function() {
  canvas.width = image.width;
  canvas.height = image.height;
  ctx.drawImage(image, 0, 0);
}

canvas.addEventListener('mousemove', function(event) {
  const x = event.clientX - canvas.offsetLeft;
  const y = event.clientY - canvas.offsetTop;
  drawLine(x, y, 200, 200);
});

function drawLine(x1, y1, x2, y2) {
  ctx.clearRect(0, 0, canvas.width, canvas.height);
  ctx.drawImage(image, 0, 0);
  ctx.beginPath();
  ctx.moveTo(x1, y1);
  ctx.lineTo(x2, y2);
  ctx.strokeStyle = 'red';
  ctx.lineWidth = 2;
  ctx.stroke();
}
