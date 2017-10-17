<table id='utilisateur' class="ui table"><thead id='' class=""><tr id='htmltablecontent--0' class=""><th id='htmltr-htmltablecontent--0-0' class="">Identifiant</th> <th id='htmltr-htmltablecontent--0-1' class="">Login</th> <th id='htmltr-htmltablecontent--0-2' class="">Couleur</th> <th id='htmltr-htmltablecontent--0-3' class="">Fond d'écran</th> <th id='htmltr-htmltablecontent--0-4' class="">Statut</th> <th id='htmltr-htmltablecontent--0-5' class="">Site</th> <th id='htmltr-htmltablecontent--0-6' class=""></th> <th id='htmltr-htmltablecontent--0-7' class=""></th></tr></thead> <tbody id='' class=""><tr id='utilisateur-tr-1' class="" data-ajax="1"><td id='htmltr-utilisateur-tr-1-0' class="">1</td> <td id='htmltr-utilisateur-tr-1-1' class="">jcheron</td> <td id='htmltr-utilisateur-tr-1-2' class=""></td> <td id='htmltr-utilisateur-tr-1-3' class=""></td> <td id='htmltr-utilisateur-tr-1-4' class="">Utilisateur</td> <td id='htmltr-utilisateur-tr-1-5' class="">Campus III Ifs</td> <td id='htmltr-utilisateur-tr-1-6' class=""><button id='' class="ui button visibleover icon _edit basic" style="visibility:hidden;" data-ajax="1"><i id='icon-' class="icon edit"></i></button></td> <td id='htmltr-utilisateur-tr-1-7' class=""><button id='' class="ui button visibleover icon _delete red basic" style="visibility:hidden;" data-ajax="1"><i id='icon-' class="icon remove"></i></button></td></tr> <tr id='utilisateur-tr-2' class="" data-ajax="2"><td id='htmltr-utilisateur-tr-2-0' class="">2</td> <td id='htmltr-utilisateur-tr-2-1' class="">erabillon</td> <td id='htmltr-utilisateur-tr-2-2' class=""></td> <td id='htmltr-utilisateur-tr-2-3' class="">/image/img.png</td> <td id='htmltr-utilisateur-tr-2-4' class="">Administrateur de site</td> <td id='htmltr-utilisateur-tr-2-5' class="">Campus II Caen</td> <td id='htmltr-utilisateur-tr-2-6' class=""><button id='' class="ui button visibleover icon _edit basic" style="visibility:hidden;" data-ajax="2"><i id='icon-' class="icon edit"></i></button></td> <td id='htmltr-utilisateur-tr-2-7' class=""><button id='' class="ui button visibleover icon _delete red basic" style="visibility:hidden;" data-ajax="2"><i id='icon-' class="icon remove"></i></button></td></tr> <tr id='utilisateur-tr-4' class="" data-ajax="4"><td id='htmltr-utilisateur-tr-4-0' class="">4</td> <td id='htmltr-utilisateur-tr-4-1' class="">cvvx</td> <td id='htmltr-utilisateur-tr-4-2' class=""></td> <td id='htmltr-utilisateur-tr-4-3' class=""></td> <td id='htmltr-utilisateur-tr-4-4' class="">Administrateur de site</td> <td id='htmltr-utilisateur-tr-4-5' class="">Campus III Ifs</td> <td id='htmltr-utilisateur-tr-4-6' class=""><button id='' class="ui button visibleover icon _edit basic" style="visibility:hidden;" data-ajax="4"><i id='icon-' class="icon edit"></i></button></td> <td id='htmltr-utilisateur-tr-4-7' class=""><button id='' class="ui button visibleover icon _delete red basic" style="visibility:hidden;" data-ajax="4"><i id='icon-' class="icon remove"></i></button></td></tr></tbody></table><script type="text/javascript" >
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

	$("#utilisateur ._delete").click(function(event){
		
if(event && event.stopPropagation) event.stopPropagation();

if(event && event.preventDefault) event.preventDefault();
url='http://127.0.0.1/homepage//DeleteUser';url=url+'/'+($(this).attr('data-ajax')||'');
var self=this;
$("#divUsers").empty();
		$("#divUsers").prepend('<div class="ajax-loader"><span></span><span></span><span></span><span></span><span></span></div>');
$.get(url,{}).done(function( data ) {
	$("#divUsers").html( data );
	
});

	});

	$("#utilisateur ._edit").click(function(event){
		
if(event && event.stopPropagation) event.stopPropagation();

if(event && event.preventDefault) event.preventDefault();
url='http://127.0.0.1/homepage//EditUser';url=url+'/'+($(this).attr('data-ajax')||'');
var self=this;
$("#divUsers").empty();
		$("#divUsers").prepend('<div class="ajax-loader"><span></span><span></span><span></span><span></span><span></span></div>');
$.get(url,{}).done(function( data ) {
	$("#divUsers").html( data );
	
});

	});
})});
// ]]>
</script>

