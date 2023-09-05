//stores all career profiles, grouped by swimlane
var careerProfiles = {
    1:[],
    2:[],
    3:[],
    4:[]
};
//stores the path to the thumbnail images
var thumbnailPath = "";
/**
 * Initializes the Career Profile JS.
 * @returns {void}
 */
function initProfile(){
    thumbnailPath = Drupal.settings.basePath+Drupal.settings.filePath+"/styles/thumbnail/public/";
    parseCareerProfiles(Drupal.settings.career_map.career_profiles);
    addHandlerToCerts();
}
/**
 * Parses through the career profiles and groups them by swimlane
 * @param {array} profileArray
 * @returns {void}
 */
function parseCareerProfiles(profileArray){
    for(var i in profileArray){
        var profileSwimlane = profileArray[i].field_cert_view_swimlane.und[0].value;
//        tmpPoint.alias = edPoints[i].alias;
        careerProfiles[profileSwimlane].push(profileArray[i]);
    }
}
/**
 * Randomly selects a career profile and triggers the HTML generation 
 * for that profile. If the certification has no career profiles, it removes
 * the career profile panel from the accordion.
 * 
 * @param {obj} cert
 * @returns {void}
 */
function addProfileToCertSidebar(cert){
    (function($){
        var profilesToChooseFrom = careerProfiles[cert.swimlane];
        //Now choose a random profile to display
        if(profilesToChooseFrom.length>0){
            var randProfileIndex = Math.floor((Math.random() * profilesToChooseFrom.length)); 
            var profileToDisplay = profilesToChooseFrom[randProfileIndex];
            generateCareerProfileHTML(profileToDisplay);
        }else{
            //delete career profile panel since this cert has no profiles associated with it
             $('#careerProfile + div').remove();
             $('#careerProfile').remove();
             $('#accordion').accordion( "refresh" );
        }
    })(jQuery);
}
/**
 * Adds an event handler to the Cert icons which will trigger the profile's 
 * display when clicked on.
 * @returns {void}
 */
function addHandlerToCerts(){
    var certIds = Object.keys(certPoints);
    for(var i=0;i<certIds.length;i++){
       var refId = certIds[i];
        (function(refId){
            points[refId].on("click", function(event) { addProfileToCertSidebar(points[refId]); });
        })(refId);
    }
}
/**
 * Generates the HTML for the Career Profile accodion panel
 * @param {obj} profile
 * @returns {void}
 */
function generateCareerProfileHTML(profile){
    var imgHTML = '<img id="careerProfileThumbnail" src="'+thumbnailPath+profile.field_headshot.und[0].filename+'"/>';
    var careerProfileDescriptionHTML = '<p><strong>'+profile.title+'</strong>'+profile.body.und[0].safe_summary+'</p>';
    var accordianPanel = '<h3 id="careerProfile">Career Profile</h3><div></div>';
    var learnMoreString = '<span id="careerProfileLearnMore">Learn More!</span>';
    var panelContent = imgHTML+careerProfileDescriptionHTML+learnMoreString;
    
    (function($){
       
    
        //Create the panel header if it doesn't already exist
        if(!$('#careerProfile').length){
            $('#accordion').append(accordianPanel);
        }
        $('#careerProfile + div').html(panelContent);
        $('#accordion').accordion( "refresh" );
        $('#careerProfileThumbnail').click(function(){window.open(Drupal.settings.basePath+profile.alias,"_blank");return false;});
        $('#careerProfileLearnMore').click(function(){window.open(Drupal.settings.basePath+profile.alias,"_blank");return false;});
    })(jQuery);
}