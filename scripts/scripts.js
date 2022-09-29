const PATH="/img/pict";
var i=0;
const COUNT_IMG = 4;
const COUNT_DIV = 15;
const DELAY_ANIM = 500;
	
function changeImg()
{
	var j=1;
	$("#main div").each(function () {
		j++;
		$(this).fadeOut(DELAY_ANIM*j, function() {
			$(this).css('background-image', 'url("'+PATH+i+'.jpg")');
			$(this).fadeIn(DELAY_ANIM*j);
		});
	});
	
}	
	
	
function leftImg()
{
	i--;
	if(i < 0)
		i=COUNT_IMG;
	changeImg();
}



function rightImg()
{
	i++;
	if(i >= COUNT_IMG)
		i=0;
	changeImg();
}


function createImg()
{
	for(var i=0; i<COUNT_DIV; i++)
	{
		html = "<div class='img"+i+"'></div>"
		var img = $(html);
		img.css("background-position", "-"+i*500/COUNT_DIV+"px 0px");
		img.css("width", 500/COUNT_DIV+"px");
		img.appendTo("#main");
	}
}


$(document).ready( function() {

	$("#right").on('click', function() { rightImg(); });
	createImg();
	//changeImg();
});



function confirmDelete(id)
{
	if(confirm('Удалить пользователя '+id))
		return true;
	else
		return false;
}
