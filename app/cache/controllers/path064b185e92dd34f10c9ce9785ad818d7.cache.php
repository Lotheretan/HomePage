<div id='toolbar-utilisateur' class="ui menu"><div id='item-toolbar-utilisateur-0' class="item"><button id='bt-Ajouterunutilisateur' class="ui button">Ajouter un utilisateur</button></div></div> <table id='utilisateur' class="ui table"><thead id='' class=""><tr id='htmltablecontent--0' class=""><th id='htmltr-htmltablecontent--0-0' class="">Identifiant</th> <th id='htmltr-htmltablecontent--0-1' class="">Login</th> <th id='htmltr-htmltablecontent--0-2' class="">Statut</th> <th id='htmltr-htmltablecontent--0-3' class="">Site</th> <th id='htmltr-htmltablecontent--0-4' class=""></th></tr></thead> <tbody id='' class=""><tr id='utilisateur-tr-1' class="" data-ajax="1"><td id='htmltr-utilisateur-tr-1-0' class="">1</td> <td id='htmltr-utilisateur-tr-1-1' class="">jcheron</td> <td id='htmltr-utilisateur-tr-1-2' class="">Utilisateur</td> <td id='htmltr-utilisateur-tr-1-3' class="">Campus III Ifs</td> <td id='htmltr-utilisateur-tr-1-4' class=""><button id='' class="ui button visibleover icon _edit basic" style="visibility:hidden;" data-ajax="1"><i id='icon-' class="icon edit"></i></button><button id='' class="ui button visibleover icon _delete red basic" style="visibility:hidden;" data-ajax="1"><i id='icon-' class="icon remove"></i></button></td></tr></tbody></table><script type="text/javascript" >
// <![CDATA[
window.defer=function (method) {if (window.jQuery) method(); else setTimeout(function() { defer(method) }, 50);};window.defer(function(){$(document).ready(function() {

	$("#utilisateur tr").mouseover(function(event){
		
if(event && event.stopPropagation) event.stopPropagation();
$(event.target).closest('tr').find('.visibleover').css('visibility', 'visible');

	});

	$("#utilisateur tr").mouseout(function(event){
		
if(event && event.stopPropagation) event.stopPropagation();
$(event.target).closest('tr').find('.visibleover').css('visibility', 'hidden');

	});
$( "#toolbar-utilisateur .item" ).on("click" , function( event, data ) {if(!$(this).hasClass("dropdown")&&!$(this).hasClass("no-active")){$(this).addClass("active").siblings().removeClass("active");}});})});
// ]]>
</script>

