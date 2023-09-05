var point1 = new createjs.Shape();
point1.graphics.beginFill("#ff0000").drawCircle(0,0,baseCircleRadius);
point1.addEventListener("click", function(event) { removePathLines();drawLineToChain(point1,"leadsTo"); });
point1.addEventListener("mouseover", function(event) { showHoverText(point1); });
point1.addEventListener("mouseout", function(event) { removeHoverText(); });
point1.x = 25;
point1.y = 75;
point1.title = "Point 1";
point1.leadsTo = ["point2"];
point1.comesFrom = [];
point1.swimlane = 1;
point1.sidebarText = "I am the point 1 sidebar text. I appear whenever you hover over point 1.";

var point2 = new createjs.Shape();
point2.graphics.beginFill("#ff0000").drawCircle(0,0,baseCircleRadius);
point2.addEventListener("click", function(event) { removePathLines();drawLineToChain(point2,"leadsTo"); });
point2.addEventListener("mouseover", function(event) { showHoverText(point2); });
point2.addEventListener("mouseout", function(event) { removeHoverText(); });
point2.x = 195;
point2.y = 185;
point2.title = "Point 2";
point2.leadsTo = ["point3","point5"];
point2.comesFrom = ["point1"];
point2.swimlane = 1;
point2.sidebarText = "I am the point 2 sidebar text. I appear whenever you hover over point 2.";

var point3 = new createjs.Shape();
point3.graphics.beginFill("#ff0000").drawCircle(0,0,baseCircleRadius);
point3.addEventListener("click", function(event) {  removePathLines();drawLineToChain(point3,"leadsTo"); })
point3.addEventListener("mouseover", function(event) { showHoverText(point3); });
point3.addEventListener("mouseout", function(event) { removeHoverText(); });
point3.x = 254;
point3.y = 75;
point3.title = "Point3";
point3.leadsTo = ["point4"];
point3.comesFrom = ["point2"];
point3.swimlane = 1;
point3.sidebarText = "I am the point 3 sidebar text. I appear whenever you hover over point 3.";

var point4 = new createjs.Shape();
point4.graphics.beginFill("#ff0000").drawCircle(0,0,baseCircleRadius);
point4.addEventListener("click", function(event) {  removePathLines();drawLineToChain(point4,"leadsTo"); })
point4.addEventListener("mouseover", function(event) { showHoverText(point4); });
point4.addEventListener("mouseout", function(event) { removeHoverText(); });
point4.x = 390;
point4.y = 100;
point4.title = "Point 4";            
point4.leadsTo = ["point5"];
point4.comesFrom = ["point3"];
point4.swimlane = 1;
point4.sidebarText = "I am the point 4 sidebar text. I appear whenever you hover over point 4.";

var point5 = new createjs.Shape();
point5.graphics.beginFill("#ff0000").drawCircle(0,0,baseCircleRadius);
point5.addEventListener("click", function(event) { removePathLines();drawLineToChain(point5,"comesFrom"); });
point5.addEventListener("mouseover", function(event) { showHoverText(point5); });
point5.addEventListener("mouseout", function(event) { removeHoverText(); });
point5.x = 490;
point5.y = 215;
point5.title = "Point 5";  
point5.leadsTo = [];
point5.comesFrom = ["point2","point4","point6"];
point5.swimlane = 1;
point5.sidebarText = "I am the point 5 sidebar text. I appear whenever you hover over point 5.";
 
var point6 = new createjs.Shape();
point6.graphics.beginFill("#ff0000").drawCircle(0,0,baseCircleRadius);
point6.addEventListener("click", function(event) { removePathLines();drawLineToChain(point6,"leadsTo"); });
point6.addEventListener("mouseover", function(event) { showHoverText(point6); });
point6.addEventListener("mouseout", function(event) { removeHoverText(); });
point6.x = 75;
point6.y = 275;
point6.title = "Point 6";  
point6.leadsTo = ["point5"];
point6.comesFrom = [];
point6.swimlane = 2;
 point6.sidebarText = "I am the point6 sidebar text. I appear whenever you hover over point 6.";




var points = [point1,point2,point3,point4,point5,point6];
