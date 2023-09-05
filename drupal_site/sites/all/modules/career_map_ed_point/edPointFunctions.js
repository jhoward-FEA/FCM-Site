var tmpEdPoints = [];

function initEdPoints(){
    parseEdPoints(Drupal.settings.career_map.ed_points);
    loadEdPoints();
    loadEdPointsForCert();
}
function loadEdPoints(){
    for(var i=0;i<tmpEdPoints.length;i++){
        var edPoint = points[tmpEdPoints[i]];
        pointsContainer.addChild(edPoint); 
        shadowPointsContainer.addChild(edPoint.shadowPoint); 
   }
}
function parseEdPoints(edPoints){
    for(var i in edPoints){
        var pointRef = jobPointPrefix+edPoints[i].nid;
        var tmpPoint = new createjs.Shape();
        tmpPoint.pointId = pointRef;
        tmpPoint.nid = edPoints[i].nid;
        tmpPoint.alias = edPoints[i].alias;
        tmpPoint.type = edPoints[i].type;
        tmpPoint.swimlane = edPoints[i].field_swimlane.und[0].value;
        tmpPoint.graphics.beginFill(swimlaneOptions[tmpPoint.swimlane].pointColor).drawCircle(0,0,pointConfig.pointRadius);
        tmpPoint.x = edPoints[i].field_x_coordinate.und[0].value;
        tmpPoint.y = edPoints[i].field_y_coordinate.und[0].value;
        tmpPoint.title = edPoints[i].title;
        
        tmpPoint.leadsTo = paths.leadsTo[edPoints[i].nid];
        tmpPoint.comesFrom = paths.comesFrom[edPoints[i].nid];
        tmpPoint.jobSummary = edPoints[i].body.und[0].safe_summary;
        
        //Preset the values to empty strings so we don't get "undefined" output on the screen when displayed. 
        tmpPoint.degreeOverview = "";
        tmpPoint.occupations = "";
        tmpPoint.courseWork = "";
        tmpPoint.schools = "";
        
        if(edPoints[i].field_overview_of_degree.hasOwnProperty("und")){
            tmpPoint.degreeOverview = edPoints[i].field_overview_of_degree.und[0].safe_summary;
        }
        if(edPoints[i].field_potential_occupations.hasOwnProperty("und")){
            tmpPoint.occupations = edPoints[i].field_potential_occupations.und[0].safe_summary;
         }
        if(edPoints[i].field_course_work.hasOwnProperty("und")){
            tmpPoint.courseWork = edPoints[i].field_course_work.und[0].safe_summary;
        }
         if(edPoints[i].field_schools.hasOwnProperty("und")){
            tmpPoint.schools = edPoints[i].field_schools.und[0].safe_summary;
        }
        if(edPoints[i].field_preset_filter.hasOwnProperty("und")){
            for(var j in edPoints[i].field_preset_filter.und){
                presetIcons[
                    presetKeyToIconName[
                        edPoints[i].field_preset_filter.und[j].value
                    ]
                ].push(pointRef);
            }
        }
        /*Add a circle to act as a shadow to the jon point*/
        var shadowPoint = new createjs.Shape();
        shadowPoint.graphics.beginFill("#000000").drawCircle(0,0,pointConfig.shadowRadius);
        shadowPoint.x = edPoints[i].field_x_coordinate.und[0].value;
        shadowPoint.y = edPoints[i].field_y_coordinate.und[0].value;
        shadowPoint.alpha = 0;
        tmpPoint.shadowPoint = shadowPoint;
        
        points[pointRef] = tmpPoint;
        
        /*adds a closure so the event handlers stick to the correct object.*/
        (function(pointRef) {
            addJobPointHandlers(pointRef);
            //TODO:Add custom sidebar handler for ed points
            points[pointRef].on("click", function(event) { showEdPointSidebarInfo(points[pointRef]);});
        })(pointRef);
        tmpEdPoints.push(pointRef);
        
    }
}
function showEdPointSidebarInfo(point){
    if(certExpanded){
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
           //console.log(point.title+"="+point.title.length);
            if(point.title.length>=35){
                $('#sidebarTitle').css({"font-size":"1em","line-height":"1em","margin-top":"8px"});
            }
            else{
                $('#sidebarTitle').removeAttr('style');
            }
          
            var jobSummary = function(){
                    if(point.jobSummary!==""){
                        return "<strong>Education Summary:</strong><br/>"+point.jobSummary+"";
                    }else{return "";}
                };
            var degreeOverview = function(){
                if(point.degreeOverview!==""){
                    return "<strong>Degree Overview:</strong><br/>"+point.degreeOverview+"<br/><br/>";
                }else{return "";}
            };
            var occupations = function(){
                if(point.occupations!==""){
                    return  "<strong>Potential Occupations:</strong><br/>"+point.occupations+"<br/><br/>";
                }else{return "";}
            };
            
            $('#sidebarText').html(jobSummary()+degreeOverview()+occupations());
        })(jQuery);
    }
}
function loadEdPointsForCert(){
    for(var i in certPoints){
        getCertPathEdPoints(i, points[i],"comesFrom");
        getCertPathEdPoints(i, points[i],"leadsTo");
    }
}
function getCertPathEdPoints(certId, point,direction){
    //follow the chain of points on either direction of the given 
    //certification and store an array of all of these points for later comparison
    var path = point[direction];
    if(path===undefined){return;}//We've reached the end of our chain
    for(var i=0;i<path.length;i++){
        var toPoint = points[jobPointPrefix+path[i].nid];
        if(toPoint===undefined){console.log("getCertPathEdPoints: path end point is supposed to be "+path[i].nid);return;}//This path seems to not have a destination?
        if(toPoint.type === "ed_point"){
            certPoints[certId].push(toPoint.pointId);
        }
        getCertPathPoints(certId, toPoint,direction);//begin the process for the next point in our path
    }
}