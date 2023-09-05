var jobPointPrefix = "point_";
var textConfig = {
    "color":"#000000",
    "size":" 10px ",
    "font":" Arial "
};
var pointConfig = {
    "pointRadius":6,
    "shadowRadius":10,
    "shadowColor":"#6C6D6F"
};
var lineConfig = {
    "color" : "#6C6D6F",
    "opacity" : .15,
    "strokeWidth": 5
};
var swimlaneOptions ={
    1:{"pointColor":"#ACB323","backgroundColor":"#ACB323","opacity" : .15},//green
    2:{"pointColor":"#F7941F","backgroundColor":"#F7941F","opacity" : .15},//orange
    3:{"pointColor":"#0092A0","backgroundColor":"#0092A0","opacity" : .15},//blue
    4:{"pointColor":"#AD4D6A","backgroundColor":"#AD4D6A","opacity" : .15}//purple
};
/* When modifying the height of the swimlanes, remember that the Y values of 
 * subsequent sqimlanes is cumulative of all the prior swimlane heights*/
var swimlanes = {
    1:{"bounds":{"x":0,"y":5,"width":775,"height":115}},
    2:{"bounds":{"x":0,"y":130,"width":775,"height":115}},
    3:{"bounds":{"x":0,"y":255,"width":775,"height":115}},
    4:{"bounds":{"x":0,"y":380,"width":775,"height":115}}
};        

var presetIcons = {
    "vets":[],
    "trades":[],
    "grads":[],            
    "energy":[],
    "federal":[]
};
var presetKeyToIconName = {
    1:"vets",
    2: "trades",
    3:"grads",
    4:"energy",
    5:"federal"
};      