$(document).ready(function(){
    $("#reply").click(function(){
    var id = document.getElementById("userid").value;
		var text = $('textarea').val();
		var d = new Date();
		addreply(text,d.getFullYear()+"-"+(d.getMonth()+1)+"-"+d.getDate(),0,id);
    alert(id);
		//$.post("AddRelpy.php",{text:text,date:d.getFullYear()+"-"+(d.getMonth()+1)+"-"+d.getDate()})
	});
});

function backHome(){
  window.location.replace("../HomePage/HomePage.php");
}

function addreply(t,d,l,i)
{
	$(document).ready(function(){
		$("#replyarea").before(
      '<div class="row container">'+
        '<div class="col m1 container center">'+
        '<input type="image" class="round" src="head.png" height="30" width="30" value="'+i+'">'+
        '<p class="id" id="id">'+d+'</p>'+
        '<div class="row container">'+
  			'<div class="col m05 container center button">'+
  			'<input type="image" src="tu.png" width="40" height="40">'+
  			'</div>'+
  			'<div class="col m05 container center button">'+
  			'<p style="margin: 0;font-size:8px;">'+l+'</p>'+
  			'</div>'+
  			'</div>'+
        '</div>'+
      '</div>'
    );
	});
}
