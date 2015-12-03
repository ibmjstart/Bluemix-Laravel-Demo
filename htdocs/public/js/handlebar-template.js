/**
 * Created by Nhuan on 11/23/2015.
 */
var theTemplateScript = $("#list-post-template").html();
Handlebars.registerHelper('convert', function(str){
    // str is the argument passed to the helper when called
    var url = window.location.href.replace("home","").replace("#","")+"api/photo/"+str;
    return url
});
// Compile the template
var theTemplate = Handlebars.compile(theTemplateScript);
// Define our data object
var context;
var user_id = $("#user-id-info").data("id");
var url = window.location.href.replace("home","").replace("#","")+"api/user/"+user_id+"/posts";
$.getJSON(url,function(data){
    var theCompiledHtml = theTemplate(data);
    $('#list-post').append(theCompiledHtml);
    var waterfall = new Waterfall({
        containerSelector: '.wf-container',
        boxSelector: '.wf-box'
    });
    console.log("load list");
},'json');
// Pass our data to the template

//// Add the compiled html to the page
//$('#list-post').append(theCompiledHtml);
// Register a helper
