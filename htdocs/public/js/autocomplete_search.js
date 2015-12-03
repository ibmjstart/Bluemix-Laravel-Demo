/**
 * Created by Nhuan on 11/28/2015.
 */

//--
var max_score=0;
var mySuggest = new Bloodhound({
    datumTokenizer: function(datum)
    {
        return Bloodhound.tokenizers.obj.whitespace(datum);
    },
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    remote:{
        url:"/search/user?q=%QUERY",
        filter: function(users){
            return $.map(users.result,function(user){
                if(max_score<user._score) max_score = user._score;
                if((max_score-user._score)>1.5) return;
                else
                return {
                    name:user._source.username,
                    avatar_link:"api/photo/"+user._source.avatar_link,
                    id:user._source._id
                }
            });
        },
        wildcard:"%QUERY"
    }
});
mySuggest.initialize();
$('#search-textbox').typeahead(null,{
    hint: true,
    highlight: true,
    minLength: 1,
    source:mySuggest.ttAdapter(),
    displayKey:"name",
    name:"name",
    templates:{
        suggestion: Handlebars.compile("<p class='show_result' data-id='{{id}}' style='padding:6px;cursor: pointer'> <img class='logo-profile' height='30' width='30' src='{{avatar_link}}'/><b>{{name}}</b></p>"),
        footer:Handlebars.compile("<b>Search for '{{QUERY}}'</b>"),
        notFound:"Please try another keyword",
        pending:"Searching..."
    }
});
$('p.show_result').on('click',function(){
    console.log($(this).data("id"));
});