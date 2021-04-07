
// MAKES SELECT2 SEARCH START FROM THE FIRST CHARACTER

$(document).ready(function () {
$('.select2-hidden-accessible').each(function() {$(this).data("select2").options.options.matcher=Select2MatchFromStart;})
});


function Select2MatchFromStart(params, data){
var ex = new RegExp('^'+params.term,'i');
if((params.term==null) || (ex.test(data.text)))
	return data;
else
	return null;
}
