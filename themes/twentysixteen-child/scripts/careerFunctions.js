/**
 * TODO:
 * cert image rollover or spriting
 * Add job profile content type which will be tied to a specific job.
 * 
 */
var stage;//All the world
var swimlaneTracker = {};//keeps track of the individual swimlane objects 
var pathLines = {"hover":[],"click":[]};//maintains references to all currently generated path lines
var pointText = {"hover":[],"click":[]};//maintains references to all currently generated point text
var shadowPoint = {"hover":[],"click":[]};//maintains references to all currently displayed shadow points
var pointsContainer = new createjs.Container();//contains all regular job points
var shadowPointsContainer = new createjs.Container();//contains the "shadows" for the regular job points
var linesContainer = new createjs.Container();//holds all path lines
var certPoints = {};//contains all the point ids that fall within a cert's path

var hoverText;//holds a single object, the currently hovered over job point
var certExpanded = false;//whether or not we're in the expanded cert view
var currentCertFocus = null;//the currently selected certification point id
var popOutLine = false;//holds the single instance of a popout line dialog
var points = {};//contains reference to all points & certs displayed on mapping tool
var paths = {
     leadsTo:{}, //leadsTo:{"1":[{"nid":2,"description":"Takes 1-2 years of study."}]}, 
     comesFrom:{}
 };//the parsed path object from Drupal. 
 var pointsLinked = {"hover":[],"click":[]};
 
//window.onload = init;

/**
 * Adds all points to the points container and the shadowPoints container
 * @returns void
 */
function loadPoints(){
    for(var i in points){
        pointsContainer.addChild(points[i]); 
        shadowPointsContainer.addChild(points[i].shadowPoint); 
        if(points[i].type==="certification"){
            getCertPathPoints(points[i].pointId, points[i],"comesFrom");
            getCertPathPoints(points[i].pointId, points[i],"leadsTo");
        }
   }
}
/**
 * Adds the point text to the points text container
 * @TODO: add colision detection with edge of canvas
 * 
 * @param {obj} point
 * @param {string} action
 * @returns void
 */
function showPointText(point,action){
    if(point===undefined){return;}
    if(action===undefined){action = "hover";}
    
     /* If we're in the expanded view, only show text for points in the cert's point array */
    if(certExpanded){
        if(certPoints[currentCertFocus].indexOf(point.pointId)===-1){
            return;
        }
    }
    var text = showPointTitle(point);
    pointText[action].push(text);
    pointsContainer.addChild(text);
    stage.update();
}
/**
 * Displays the text for the currently hovered point
 * @param {obj} point
 * @returns void
 */
function showHoverText(point){
    var text = showPointTitle(point);
    hoverText = text;
    pointsContainer.addChild(text);
    stage.update();
}
/**
 * Generates the text to be displayed for the given point obj
 * @param {obj} point
 * @returns {string}
 */
function showPointTitle(point){
    text = new createjs.Text(point.title, textConfig.size+textConfig.font, textConfig.color);
    var x = point.x;
    var y = point.y-(5+pointConfig.pointRadius);
    
    if(point.hasOwnProperty("centerX")){x = point.centerX;}
    if(point.hasOwnProperty("centerY")){y = point.y+110;}
//    text.shadow = new createjs.Shadow("#0f0f0f", 0, 0, 5);
    text.x = x;
    text.y = y;
    text.textBaseline = "alphabetic";
    text.textAlign="center";
    return text;
}
/**
 * Draws a line from one set of coordinates (point.x, point.y) to another
 * @param {obj} point
 * @param {string} direction
 * @param {decimal} opacity
 * @param {string} action
 * @returns void
 */
function drawLineTo(point,direction,opacity,action){
    if(point===undefined){return;}
    if(!point.hasOwnProperty(direction)){return;}
    var path = point[direction];
    if(path===undefined){return;}//We've reached the end of our chain
    if(opacity===undefined){opacity = lineConfig.opacity;}
    if(action===undefined){action = "hover";}
    
    for(var i=0;i<path.length;i++){
        var line = new createjs.Shape();
        var toObj = path[i];
        var toPoint = points[jobPointPrefix+toObj.nid];
        if(toPoint===undefined){continue;}//This should only happen when we have data from another point type but the module that supports it is disabled.
        
        /* If we're in the expanded view, only draw lines for points in the cert's point array */
        if(certExpanded){
            if(certPoints[currentCertFocus].indexOf(toPoint.pointId)===-1){
                continue;
            }else{
            //As per Maureen, when we're in the expanded view, change all connected points to the same color that the cert is in.
            //if(toPoint.swimlane !== points[currentCertFocus].swimlane){
                if(toPoint.type!=="certification"){
                    toPoint.graphics
                            .clear()/*clear the existing graphic*/
                            .beginFill(swimlaneOptions[points[currentCertFocus].swimlane].pointColor)/* change the fill color to the currently focused cert's swimlane's color*/
                            .drawCircle(0,0,pointConfig.pointRadius).endFill();
                }
           // }
            }
        }
        
        //set up our coordinates. Certificates are positioned differently than job points
        var x = point.x;
        var y = point.y;
        var toPointX = toPoint.x;
        var toPointY = toPoint.y;
        if(point.hasOwnProperty("centerX")){x = point.centerX;}
        if(point.hasOwnProperty("centerY")){y = point.centerY;}
        if(toPoint.hasOwnProperty("centerX")){toPointX = toPoint.centerX;}
        if(toPoint.hasOwnProperty("centerY")){toPointY = toPoint.centerY;}
        
        line.graphics.setStrokeStyle(lineConfig.strokeWidth);
        line.graphics.beginStroke(lineConfig.color);
        line.alpha = opacity;
        line.graphics.moveTo(x,y);
        line.graphics.lineTo(toPointX, toPointY);
        line.graphics.endStroke();
        //Find the mid point coordinates
        line.midX = Math.round((parseInt(x) + parseInt(toPointX))/2);
        line.midY = Math.round((parseInt(y) + parseInt(toPointY))/2);
        
        (function(line,toObj){
            if(certExpanded){//We only want to allow the path pop out if we're in the certification view
                line.on("click", function(event) {drawPopout(toObj,line);});
                line.on("mouseover", function(event) { document.body.style.cursor='pointer';});
                line.on("mouseout", function(event) { document.body.style.cursor='default';});
            }
        })(line,toObj);
        
        pathLines[action].push(line);
        linesContainer.addChild(line);
        stage.update();
    }
}
function drawLineToRedux(startPoint,toPoint,opacity,action,toObj){
    if(startPoint===undefined){return;}
    if(toPoint===undefined){return;}
    if(opacity===undefined){opacity = lineConfig.opacity;}
    if(action===undefined){action = "hover";}
    
    var line = new createjs.Shape();
        
    /* If we're in the expanded view, only draw lines for points in the cert's point array */
    if(certExpanded){
        if(certPoints[currentCertFocus].indexOf(toPoint.pointId)===-1){
            return;
        }else{
        //As per Maureen, when we're in the expanded view, change all connected points to the same color that the cert is in.
            if(toPoint.type!=="certification"){
                toPoint.graphics
                        .clear()/*clear the existing graphic*/
                        .beginFill(swimlaneOptions[points[currentCertFocus].swimlane].pointColor)/* change the fill color to the currently focused cert's swimlane's color*/
                        .drawCircle(0,0,pointConfig.pointRadius).endFill();
            }
        }
    }
        
    //set up our coordinates. Certificates are positioned differently than job points
    var x = startPoint.x;
    var y = startPoint.y;
    var toPointX = toPoint.x;
    var toPointY = toPoint.y;
    if(startPoint.hasOwnProperty("centerX")){x = startPoint.centerX;}
    if(startPoint.hasOwnProperty("centerY")){y = startPoint.centerY;}
    if(toPoint.hasOwnProperty("centerX")){toPointX = toPoint.centerX;}
    if(toPoint.hasOwnProperty("centerY")){toPointY = toPoint.centerY;}

    line.graphics.setStrokeStyle(lineConfig.strokeWidth);
    line.graphics.beginStroke(lineConfig.color);
    line.alpha = opacity;
    line.graphics.moveTo(x,y);
    line.graphics.lineTo(toPointX, toPointY);
    line.graphics.endStroke();
    //Find the mid point coordinates
    line.midX = Math.round((parseInt(x) + parseInt(toPointX))/2);
    line.midY = Math.round((parseInt(y) + parseInt(toPointY))/2);

    (function(line,toObj){
        if(certExpanded){//We only want to allow the path pop out if we're in the certification view
            line.on("click", function(event) {drawPopout(toObj,line);});
            line.on("mouseover", function(event) { document.body.style.cursor='pointer';});
            line.on("mouseout", function(event) { document.body.style.cursor='default';});
        }
    })(line,toObj);

    pathLines[action].push(line);
    linesContainer.addChild(line);
    stage.update();
}
/**
 * Draws a popout dialog begining at the midpoint of the passed line.
 * @param {obj} path
 * @param {obj} line
 * @returns void
 */
function drawPopout(path, line){
    removePopOutLine();
    stage.update();
    console.log(path);
    if(path.description===""){return;}/*If we have no description, don't do anything other than remove the existing line*/
    var popline = new createjs.Shape();
    var cert = points[currentCertFocus];
    var curSwimlane  = cert.swimlane;
    
    //Determine our line coordinates
    var x = line.midX;
    var y = line.midY;
    var toPointX = x;
    var toPointY = y;
    var descY = y;
    var descX = x;
    
    if(curSwimlane<=2){
        toPointY += 150;
    }else{
        toPointY -= 150;
    }
    
    popline.graphics.setStrokeStyle(lineConfig.strokeWidth/2);
    popline.graphics.beginStroke(lineConfig.color);
    popline.alpha = .75;
    popline.graphics.moveTo(x,y);
    popline.graphics.lineTo(toPointX, toPointY);
    popline.graphics.endStroke();
    
    popOutLine = popline;//only one popline can exist at a time
    linesContainer.addChild(popline);
    stage.update();
     
    (function($){
        //descX -= ($('#pathDescription').width())/2;
        if(curSwimlane<=2){
            descY += 150;//Top two swimlanes
        }else{//bottom two swimlanes
             descY -= 110 + ($('#pathDescription').height());
        }
        $('#pathDescription').css({"left":descX,"top":descY});
        $('#pathDescription div').html(path.description);
        $('#pathDescription').show();
    })(jQuery);
    
}
/**
 * Removes the popout line & calls hidePathDescription()
 * @returns void
 */
function removePopOutLine(){
    if(popOutLine!==false){//If we have an existing line, get rid of it.
        linesContainer.removeChild(popOutLine);
        popOutLine = false;
        hidePathDesctription();
    }
}
/**
 * Hides the path description div
 * @returns void
 */
function hidePathDesctription(){
    (function($){
         $('#pathDescription').hide();
    })(jQuery);
}
/**
 * Recursive function which intiates calls to drawLineTo based on the current 
 * point's ancestor and decendant paths, depending on the passed direction. 
 * Also initiates call to applyPointShadow showPointText.
 * 
 * @param {obj} startingPoint
 * @param {string} direction
 * @param {decimal} opacity
 * @param {string} action
 * @returns void
 * TODO: For large #s of connections, there is a delay that forms if we get into
 *  mildly recursive paths. Fix this. 
 */
function drawLineToChain(startingPoint,direction,opacity,action){
    if(startingPoint===undefined){return;}
    if(action===undefined){action = "hover";}
    var pathType = pointsLinked[action];//Check our tracking array
    
    if(certExpanded){
        if(action==="hover"){
//            return;
            opacity = .5;
        }
    }
    
    applyPointShadow(startingPoint,action); //Show the shadow for the current point
    if(startingPoint.type!=="certification"){
        showPointText(startingPoint,action);//show the text for the current point
    }
    var path = startingPoint[direction];
    if(path===undefined){return;}//We've reached the end of our chain
    for(var i=0;i<path.length;i++){
        var toPoint = points[jobPointPrefix+path[i].nid];
        if(toPoint===undefined){console.log("drawLineToChain: path end point is supposed to be "+path[i].nid);return;}//This path seems to not have a destination?
        
        if(certExpanded){
            if(certPoints[currentCertFocus].indexOf(toPoint.pointId)===-1){
                continue;
            }
        }
        if(pathType[startingPoint.pointId]===undefined){//Have we logged this starting point yet?
            //No, we've never logged this starting point
            pathType[startingPoint.pointId] = [toPoint.pointId];
        } else if(pathType[startingPoint.pointId].indexOf(toPoint.pointId)===-1){//Have we logged this destination yet for this starting point?
            //No, we have not. Add it. 
             pathType[startingPoint.pointId].push(toPoint.pointId);//We haven't logged this path before. Add it.
        }else{//We have logged this path previously. Skip out, we're done. 
            continue;
        }
        var toObj = path[i];
        drawLineToRedux(startingPoint,toPoint,opacity,action,toObj);
        drawLineToChain(toPoint,direction,opacity,action);//begin the process for the next point in our path
    }
}
/**
 * removes all pathlines for the given action
 * @param {string} action
 * @returns void
 */
function removePathLines(action){
    resetLogPath();
    if(action===undefined){action = "hover";}
    for(var i=0;i<pathLines[action].length;i++){
        linesContainer.removeChild(pathLines[action][i]);
        removePointShadow(action);
        removePointText(action);
        stage.update();
    }
    pathLines[action] = [];
}
/**
 * Removes all the point text for the given action type
 * @param {string} action
 * @returns void
 */
function removePointText(action){
    if(action===undefined){action = "hover";}
    for(var i=0;i<pointText[action].length;i++){
        pointsContainer.removeChild(pointText[action][i]);
        stage.update();
    }
    pointText[action] = [];
}
/**
 * Removes the hovertext from the container
 * @returns void
 */
function removeHoverText(){
    pointsContainer.removeChild(hoverText);
    stage.update();
}
function resetLogPath(){
    pointsLinked = {"hover":[],"click":[]};//Reset Path log
}
/**
 * This function toggles the mapping tool into and out of the "expanded state". 
 * @param {obj} cert
 * @returns void
 */
function toggleCertificationView(cert){
    certExpanded = !certExpanded;//toggle the status of whether we're in cert view or not
    resetLogPath();
    if(certExpanded){
        hideSidebarInfo();//hide the job-point sidebar
        showCertSidebarInfo(cert);//show the certification sidebar
        hideNonActiveCertPaths(cert);//hide all paths not tied to the current cert
        currentCertFocus = cert.pointId; //set the current cert focus to the current cert's point ID
        drawLineToChain(cert,"comesFrom",.3,"click");//trigger the ancestor path
        drawLineToChain(cert,"leadsTo",.3,"click");//trigger the decendant path
        hideOtherSwimlanes(cert.swimlane);//hide all but the current cert's swimlane
        (function($){
           $('#accordion').before('<div id="mapReturn">Return To Map</div>');
           $('#accordion').after('<div id="certLearnMore">Click here to learn more about the <em>'+cert.title+'</em> Certification</div>');
           $('#mapReturn').click(function(){
                toggleCertificationView(cert);
           });
           $('#certLearnMore').click(function(){window.open(Drupal.settings.basePath+cert.alias,"_blank");return false;});
         })(jQuery);
    }
    else{
        (function($){
            $('#mapReturn').remove();
            $('#certLearnMore').remove();
        })(jQuery);
        removePopOutLine();//hide the popout line (if displayed)
        resetCertPaths();
        resetJobPoints();
        resetOtherSwimlanes();
        resetCertSidebarInfo();
        currentCertFocus = null;//unset the cert focus.
    }
}

/**
 * Draws the rectangular swimlane shapes on the canvas.
 * @param {obj} swimlanes
 * @returns void
 */
function drawSwimlanes(swimlanes){
    for(var i in swimlanes){
        var bounds = swimlanes[i].bounds;
        var lane = new createjs.Shape();
        lane.graphics.beginFill(swimlaneOptions[i].backgroundColor).drawRect(bounds.x,bounds.y,bounds.width,bounds.height);
        lane.alpha = swimlaneOptions[i].opacity;
        swimlaneTracker[i] = lane;
        stage.addChild(lane);
    }
    stage.update();
}
/**
 * Displays the "shadow" for the given point
 * @param {obj} point
 * @param {string} action
 * @returns void
 */
function applyPointShadow(point,action){
    if(point===undefined){return;}
    /* If we're in the expanded view, only draw lines for points in the cert's point array */
    if(certExpanded){
        if(certPoints[currentCertFocus].indexOf(point.pointId)===-1){
            return;
        }
    }
    
    var shadow = point.shadowPoint;
    switch(action){
        case "hover":
            if( shadow.alpha === 0){//Hover cannot override the alpha of a click
                shadow.alpha = .25;
                shadowPoint.hover.push(point);
            }
            break;
        case "click":
            if(shadow.isFilterView){
                shadow.alpha = 1;
            }else{
                shadow.alpha = .5;
            }
            shadowPoint.click.push(point);
            break;
    }
   stage.update();
}
/**
 * Removes the "shadow" for all points of a given action
 * @param {string} action
 * @returns void
 */
function removePointShadow(action){
    if(action===undefined){action = "hover";}
    for(var i=0;i<shadowPoint[action].length;i++){
        var shadow = shadowPoint[action][i].shadowPoint;
        if(shadow.isFilterView){
            shadow.isFilterView = false;
            shadow.alpha = 0;
        }
        switch(action){
            case "hover"://on a hover action, only change points that are in a hover state
                if( shadow.alpha === .25){
                    shadow.alpha = 0;
                }
                break;
            case "click"://on a click action, only change points that are in a click state
                if( shadow.alpha === .50){
                    shadow.alpha = 0;
                }
                break;
        }
    }
    stage.update();
    shadowPoint[action] = [];//reset reference array
}/**
 * Collects an array of all job points tied to a certification. 
 * When the first call is made, point is the cert obj, but everything after that is a job point
 * @param {string} certId
 * @param {obj} point
 * @param {string} direction
 * @returns void
 */
function getCertPathPoints(certId, point,direction){
    //follow the chain of points on either direction of the given 
    //certification and store an array of all of these points for later comparison
    
    var path = point[direction];
    if(path===undefined){return;}//We've reached the end of our chain
    
    for(var i=0;i<path.length;i++){
        var toPoint = points[jobPointPrefix+path[i].nid];
        if(toPoint !== undefined){
            certPoints[certId].push(toPoint.pointId);
            getCertPathPoints(certId, toPoint,direction);//begin the process for the next point in our path
        }
    }
}
/**
 * Hides all job points not tied to the current certification
 * @param {obj} cert
 * @returns void
 */
function hideNonActiveCertPaths(cert){
    var certPointAr = certPoints[cert.pointId];
    for(var i in points){
       if(certPointAr.indexOf(points[i].pointId)===-1){
           points[i].alpha = 0;
           points[i].mouseEnabled = false;
       }
    }
    removePathLines("click");
    stage.update();
}
/**
 * Un-hides all job points by restoring the alpha value to 1
 * @returns void
 */
function resetCertPaths(){
    for(var i in points){
           points[i].alpha = 1;
           points[i].mouseEnabled = true;
    }
    removePathLines("click");
    stage.update();
}
/**
 * Resets the color of the job points to the correct color based on the point's own swimlane.
 * @returns void
 */
function resetJobPoints(){
    var certPointAr = certPoints[currentCertFocus];
    for(var i in certPointAr){
        if(points[certPointAr[i]].swimlane !== points[currentCertFocus].swimlane){
            points[certPointAr[i]].graphics.clear().beginFill(swimlaneOptions[points[certPointAr[i]].swimlane].pointColor).drawCircle(0,0,pointConfig.pointRadius).endFill();
        }
     }
    
    stage.update();
}
/**
 * Hides all swimlanes other than the passed swimlane by reducing the alpha channel to 0
 * @param {int} swimlaneNum
 * @returns void
 */
function hideOtherSwimlanes(swimlaneNum){
    for(var i=1;i<5;i++){
        if(parseInt(swimlaneNum)===i){continue;}
        swimlaneTracker[i].alpha = 0;
    }
    stage.update();
}
/**
 * Restore all swimlanes's alpha channel to the correct opacity
 * @returns void
 */
function resetOtherSwimlanes(){
    for(var i=1;i<5;i++){
        swimlaneTracker[i].alpha = swimlaneOptions[i].opacity;
    }
    stage.update();
}
/**
 * Displays the sidebar info for the passed job point.
 * @param {obj} point
 * @returns void
 */
function showSidebarInfo(point){
    if(certExpanded){//When in cert view, put the job summary of the clicked point into the job summary section
         (function($){
             var summary = ""; 
             if(point.jobSummary!==""){
                summary= "<strong>"+point.title+":</strong><br/>"+point.jobSummary;
             }
             $('h3#jobDetail +div').html(summary);
         })(jQuery);
    }else{
        (function($){
           showMoreInfoSection(point);
            $('#sidebarContainer').css('background-color', convertHex(swimlaneOptions[point.swimlane].backgroundColor,50));
            $('#sidebarTitle').text(point.title);
            //dynamic sizing...oy vey
            if(point.title.length>=35){
                $('#sidebarTitle').css({"font-size":"1em","line-height":"1em","margin-top":"8px"});
            }else{
                $('#sidebarTitle').removeAttr('style');
            }
            
            var jobSummary = function(){
                    if(point.jobSummary!==""){
                        return "<strong>Job Summary:</strong><br/>"+point.jobSummary+"";
                    }else{return "";}
                };
            var commonTitles = function(){
                if(point.commonTitles!==""){
                    return "<strong>Common Titles:</strong><br/>"+point.commonTitles+"<br/><br/>";
                }else{return "";}
            };
            var educationTraining = function(){
                if(point.educationTraining!==""){
                    return  "<strong>Education/Training:</strong><br/>"+point.educationTraining+"<br/><br/>";
                }else{return "";}
            };
            var credentials = function(){
                if(point.credentials!==""){
                    return "<strong>Credentials:</strong><br/>"+point.credentials+"<br/><br/>";
                }else{return "";}
            };
            var militaryCodes = function(){
                if(point.military!==""){
                    return "<strong>Military:</strong><br/>"+point.military;
                }else{return "";}
            };
            
            $('#sidebarText').html(jobSummary()+commonTitles()+educationTraining()+credentials()+militaryCodes());
        })(jQuery);
    }
}
/**
 * Shows the "More Info" icon for job points
 * @param {obj} point
 * @returns void
 */
function showMoreInfoSection(point){
    (function($){
        $('#moreInfo').css('display','block');
         //make learn more icon visible, change src to proper swimlane color
        $('#infoBanner').attr("src", Drupal.settings.basePath + 'sites/all/modules/career_map/images/info-banner-'+point.swimlane+'.png');
         //change link to proper nid url
//         $('#infoBannerText').attr("href","?q=node/"+point.nid);
//         $('#infoBannerText').attr('target','_blank');
//        $('#infoBannerText').click(function(){window.open("?q=node/"+point.nid,"_blank");return false;});
        $('#infoBannerText').unbind("click");
        $('#infoBannerText').click(function(){window.open(Drupal.settings.basePath+point.alias,"_blank");return false;});
    })(jQuery);
        
}
/**
 * Taken from Stackoverflow. Function to add opacity to background color.
 * @param {number} hex
 * @param {number} opacity
 * @returns {String}
 */
function convertHex(hex,opacity){
    hex = hex.replace('#','');
    r = parseInt(hex.substring(0,2), 16);
    g = parseInt(hex.substring(2,4), 16);
    b = parseInt(hex.substring(4,6), 16);
    result = 'rgba('+r+','+g+','+b+','+opacity/100+')';
    return result;
}
/**
 * Hides the "More Info" icon for job points
 * @returns void
 */
function hideMoreInfoSection(){
    (function($){
        $('#moreInfo').css('display','none');
    })(jQuery);
}
/**
 * Hides the sidebar for job points
 * @returns void
 */
function hideSidebarInfo(){
    (function($){
        hideMoreInfoSection();
        $('#sidebarText').html("");
    })(jQuery);
}
/**
 * Displays the sidebar for the currently selected certification
 * @param {obj} point
 * @returns void
 */
function showCertSidebarInfo(point){
    (function($){
        $('#sidebarContainer').css('background-color', convertHex(swimlaneOptions[point.swimlane].backgroundColor,25));
        $('#sidebarText').html("").hide();
//        $('#sidebarBanner').css("right","0px");
        $('#sidebarTitle').text(point.title).css({"width":"375px","font-size":"1.2em","text-align":"center"});
        
        //load content into sidebar
        $('#keysToSuccess + div').html("<div class='scroll'>"+point.keysToSuccess+"</div>");
        $('#jobDetail + div').html(point.jobCertDetails);
        $('#jobTask + div').html(point.jobTask);
        $('#compModel + div').html(point.compModel);
        
        $('#accordion').accordion( "option", "active", 0 ).show();
    })(jQuery);
}
/**
 * Hides the certification sidebar
 * @returns void
 */
function resetCertSidebarInfo(){
      (function($){
        hideSidebarInfo();
        $('#sidebarContainer').removeAttr('style');
        $('#sidebarBanner').removeAttr('style');
        $('#sidebarTitle').removeAttr('style').text($('#sidebarTitle').data('defaultSidebarTitleText'));
        $('#sidebarText').html($('#sidebarText').data('defaultSidebarText')).show();
        $('#accordion').hide();
        
    })(jQuery);
}
/********** CMS-Dependent Functions **********/
/**
  * Intializes the mapping tool. 
  * @returns void
  */
function init() {
    /* Parse the data from Drupal into formats we can use */
    parseJobPoints(Drupal.settings.career_map.job_points,Drupal.settings.career_map.job_paths,Drupal.settings.career_map.job_certs);
    stage = new createjs.Stage("careerMap");
    stage.enableMouseOver();//turn on mouseover. resource intensive, of course.
    drawSwimlanes(swimlanes);//
    stage.addChild(linesContainer);
    stage.addChild(shadowPointsContainer);
    stage.addChild(pointsContainer);
    loadPoints();
    stage.update();
    (function($){
        //set the sidebar defaults so we can reset them after the cert view
        $('#sidebarTitle').data('defaultSidebarTitleText',$('#sidebarTitle').text());
        $('#sidebarText').data('defaultSidebarText',$('#sidebarText').html());
        $(function() {
            $( "#accordion" ).accordion({
            collapsible: false,
            animate:false,
            icons:false,
            heightStyle:"content"
            });
        });
        //add event handlers for preset icons
        $('#vetIcon').parent().click(function(){forcePathClick(presetIcons["vets"]);});
        $('#tradesIcon').parent().click(function(){forcePathClick(presetIcons["trades"]);});
        $('#gradsIcon').parent().click(function(){forcePathClick(presetIcons["grads"]);});
        $('#energyProfsIcon').parent().click(function(){forcePathClick(presetIcons["energy"]);});
        $('#fedIcon').parent().click(function(){forcePathClick(presetIcons["federal"]);});
        $('#closePathDescription').click(function(){ removePopOutLine();stage.update();});
    })(jQuery);
}
/**
 * Parses through the job array from Drupal and builds our jobPoints array.
 * @param {array} jobs
 * @param {array} jobPaths
 * @param {array} jobCerts
 * @returns void
 */
function parseJobPoints(jobs, jobPaths,jobCerts){
    parseJobPaths(jobPaths);
    parseCerts(jobCerts);
    for(var i in jobs){
        var pointRef = jobPointPrefix+jobs[i].nid;
        var tmpPoint = new createjs.Shape();
        tmpPoint.pointId = pointRef;
        tmpPoint.nid = jobs[i].nid;
        tmpPoint.alias = jobs[i].alias;
        tmpPoint.type = jobs[i].type;
        tmpPoint.swimlane = jobs[i].field_swimlane.und[0].value;
        tmpPoint.graphics.beginFill(swimlaneOptions[tmpPoint.swimlane].pointColor).drawCircle(0,0,pointConfig.pointRadius);
        tmpPoint.x = jobs[i].field_x_coordinate.und[0].value;
        tmpPoint.y = jobs[i].field_y_coordinate.und[0].value;
        tmpPoint.title = jobs[i].title;
        
        tmpPoint.leadsTo = paths.leadsTo[jobs[i].nid];
        tmpPoint.comesFrom = paths.comesFrom[jobs[i].nid];
        tmpPoint.jobSummary = jobs[i].body.und[0].safe_summary;
        
        //Preset the values to empty strings so we don't get "undefined" output on the screen when displayed. 
        tmpPoint.commonTitles = "";
        tmpPoint.educationTraining = "";
        tmpPoint.credentials = "";
        tmpPoint.military = "";
        
        if(jobs[i].field_common_titles.hasOwnProperty("und")){
            tmpPoint.commonTitles = jobs[i].field_common_titles.und[0].safe_summary;
        }
        if(jobs[i].field_education_training.hasOwnProperty("und")){
            tmpPoint.educationTraining = jobs[i].field_education_training.und[0].safe_summary;
         }
        if(jobs[i].field_related_credentials.hasOwnProperty("und")){
            tmpPoint.credentials = jobs[i].field_related_credentials.und[0].safe_summary;
        }
         if(jobs[i].field_military.hasOwnProperty("und")){
            tmpPoint.military = jobs[i].field_military.und[0].safe_summary;
        }
        if(jobs[i].field_preset_filter.hasOwnProperty("und")){
            for(var j in jobs[i].field_preset_filter.und){
                presetIcons[
                    presetKeyToIconName[
                        jobs[i].field_preset_filter.und[j].value
                    ]
                ].push(pointRef);
            }
        }
        /*Add a circle to act as a shadow to the jon point*/
        var shadowPoint = new createjs.Shape();
        shadowPoint.graphics.beginFill("#000000").drawCircle(0,0,pointConfig.shadowRadius);
        shadowPoint.x = jobs[i].field_x_coordinate.und[0].value;
        shadowPoint.y = jobs[i].field_y_coordinate.und[0].value;
        shadowPoint.alpha = 0;
        shadowPoint.isFilterView = false;
        tmpPoint.shadowPoint = shadowPoint;
        
        points[pointRef] = tmpPoint;
        /*adds a closure so the event handlers stick to the correct object.*/
        (function(pointRef) {
            addJobPointHandlers(pointRef);
            points[pointRef].on("click", function(event) { showSidebarInfo(points[pointRef]);});
            
        })(pointRef);
        
    }
}
function addJobPointHandlers(pointRef){
     if(points[pointRef].leadsTo === undefined){//has no descendatns, we can draw ancestors
        points[pointRef].on("click", function(event){
            if(!certExpanded){//Don't remove path lines in the expanded view
                removePathLines("click");
                drawLineToChain(points[pointRef],"comesFrom",.3,"click"); 
            }
        });
        points[pointRef].on("mouseover", function(event) { 
//            console.log("draw hover ancestors");
            removePathLines();
            drawLineToChain(points[pointRef],"comesFrom",.25,"hover"); 
        });
    }else /*if(points[pointRef].comesFrom === undefined)*/{//has no ancestors, we can draw descendants
        points[pointRef].on("click", function(event){ 
            if(!certExpanded){//Don't remove path lines in the expanded view
                removePathLines("click");
                drawLineToChain(points[pointRef],"leadsTo",.3,"click"); 
            }
        });
        points[pointRef].on("mouseover", function(event) { removePathLines();drawLineToChain(points[pointRef],"leadsTo",lineConfig.opacity,"hover"); });
    }
    
    points[pointRef].on("mouseover", function(event){
//            console.log(pointRef);
//            console.log(points[pointRef]);
            document.body.style.cursor='pointer'; 
            showHoverText(points[pointRef]);
        });
    points[pointRef].on("mouseout", function(event) {document.body.style.cursor='default'; removePathLines("hover");removeHoverText();});
}
/**
 * Parses through the Drupal provided array of certification data. Adds the 
 * certification to the jobPoints array. 
 * @param {array} certs
 * @returns void
 */
function parseCerts(certs){
     for(var i in certs){
        var pointRef = jobPointPrefix+certs[i].nid;
        var img = new Image();
        img.src = Drupal.settings.basePath+"sites/default/files/"+certs[i].field_standard_icon.und[0].filename;
        img.onload = function(){stage.update();}; 
        var certIcon = new createjs.Bitmap(img);   
        certIcon.pointId = pointRef;
        certIcon.type = certs[i].type;
        certIcon.nid = certs[i].nid;
        certIcon.alias = certs[i].alias;
        certIcon.x = parseInt(certs[i].field_x_coordinate.und[0].value)-50;
        certIcon.y = parseInt(certs[i].field_y_coordinate.und[0].value)-50;
        
        certIcon.centerX = certIcon.x+50;
        certIcon.centerY = certIcon.y+50;
        
        certIcon.title = certs[i].title;
        certIcon.swimlane = certs[i].field_swimlane.und[0].value;
        certIcon.leadsTo = paths.leadsTo[certs[i].nid];
        certIcon.comesFrom = paths.comesFrom[certs[i].nid];
        certIcon.jobSummary = certs[i].body.und[0].safe_summary;
        
        //Additional Certification display info
        certIcon.keysToSuccess = "";
        certIcon.jobCertDetails = "Click a point on the mapping tool to see details";
        certIcon.jobTask = "";
        certIcon.compModel = "";
         
         if(certs[i].field_keys_to_success.hasOwnProperty("und")){
            certIcon.keysToSuccess = certs[i].field_keys_to_success.und[0].safe_value;
        }
        if(certs[i].field_competency_model.hasOwnProperty("und")){
            if(certs[i].field_job_task_analysis_descript.hasOwnProperty("und")){
                certIcon.compModel+=certs[i].field_competency_model_descript.und[0].safe_value+"<br/>";
            }
            certIcon.compModel+= '<a href="'+certs[i].field_competency_model.und[0].url+'" target="_blank">'+certs[i].field_competency_model.und[0].title+'</a>';
        }
        if(certs[i].field_job_task_analysis.hasOwnProperty("und")){
            if(certs[i].field_job_task_analysis_descript.hasOwnProperty("und")){
                certIcon.jobTask+=certs[i].field_job_task_analysis_descript.und[0].safe_value+"<br/>";
            }
            certIcon.jobTask += '<strong><a href="'+certs[i].field_job_task_analysis.und[0].url+'" target="_blank">'+certs[i].field_job_task_analysis.und[0].title+'</a><strong>';
        }

        /* Add a circle to act as a shadow for this cert point */
        var shadowPoint = new createjs.Shape();
        shadowPoint.graphics.beginFill("#000000").rr(-55,-55,110,110,10);
        shadowPoint.x = certIcon.centerX;
        shadowPoint.y = certIcon.centerY;
        shadowPoint.alpha = 0;
        certIcon.shadowPoint = shadowPoint;
        
        certPoints[pointRef] = [pointRef];
        points[pointRef] = certIcon;
        /*adds a closure so the event handlers stick to the correct object.*/
        (function(pointRef) {
            points[pointRef].on("click", function(event) { toggleCertificationView(points[pointRef]); });
            points[pointRef].on("mouseover", function(event) { document.body.style.cursor='pointer';/*showHoverText(points[pointRef]); */});
            points[pointRef].on("mouseout", function(event) { document.body.style.cursor='default';/*removeHoverText();*/ });
        })(pointRef);
    }
}
/**
 * Parses through the jobPaths array and builds the ancestor and 
 * descendant arrays for each jobPoint
 * @param {array} jobPaths
 */
function parseJobPaths(jobPaths){
    for(var i in jobPaths){
        //get the Ancestor NID, Descendant NID, path description
        var ancestorId = jobPaths[i].field_ancestor.und[0].target_id;
        var descendantId = jobPaths[i].field_descendant.und[0].target_id;
        var desc = "";
        if(jobPaths[i].field_path_description.hasOwnProperty('und')){
            desc = jobPaths[i].field_path_description.und[0].safe_value;
        }
        
        //Make sure the properties exist. If not, create them.
        if(!paths.leadsTo.hasOwnProperty(ancestorId)){paths.leadsTo[ancestorId] = [];}
        if(!paths.comesFrom.hasOwnProperty(descendantId)){ paths.comesFrom[descendantId] = [];}
       //Make some tmp variables to hold the value of the global array we want to concat with
        var tmpD = paths.leadsTo[ancestorId];
        var tmpA = paths.comesFrom[descendantId];
        //Build the objects which will hold info on the relationship between job points
        var descendantObj = {"nid":descendantId,"description":desc};
        var ancestorObj = {"nid":ancestorId,"description":desc};
        //add our new ancestors and decendants to the appropriate array
        paths.leadsTo[ancestorId] = tmpD.concat([descendantObj]);//Adds a descendant (leadsTo) NID to the leadsTo array for jobPoint_NID
        paths.comesFrom[descendantId] = tmpA.concat([ancestorObj]);//Adds a ancestor (comesFrom) NID to the comesFrom array for jobPoint_NID
    }
}
/**
 * Simulates a click on multiple entry points
 * @param {type} pointName
 * @returns {undefined}
 */
function forcePathClick(filterPointCollection){
    removePathLines("click");
    for(var i=0;i<filterPointCollection.length;i++){
        points[filterPointCollection[i]].shadowPoint.isFilterView = true;
        drawLineToChain(points[filterPointCollection[i]],"leadsTo",.3,"click");
    }
}
