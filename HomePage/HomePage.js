$(document).ready(function(){
    $("#post").click(function(){
		var title = document.getElementById("titleinput").value;
		var text = $('textarea').val();
		var d = new Date();
    $.post("AddPost.php");
		addpost(title,text,d.getFullYear()+"-"+(d.getMonth()+1)+"-"+d.getDate());

    /*
    {title:title,
      text:text,
      date:d.getFullYear()+"-"+(d.getMonth()+1)+"-"+d.getDate()
    }*/
	});
});

function addpost(h,t,d,i)
{
	$(document).ready(function(){
		$("#postarea").before(
			'<div class="row container">'+
			'<div class="col container m6">'+
			'<h2 id="title" class="distext">'+h+'</h2>'+
			'<p class="distext">'+t+'</p>'+
			'</div>'+
			'<div class="col container m1 center">'+
			'<input type="image" class="round" src="head.png" height="30" width="30" value="'+i+'">'+
			'<p class="id" id="id">'+d+'</p>'+
			'</div>'+
			'</div>'
		);
	});
}
