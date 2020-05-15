$(document).ready(function(){
    $("#reply").click(function(){
    var postid = document.getElementById("postid").value;
		var text = $('textarea').val();
		var d = new Date();
		$.post("AddReply.php",{text:text,date:d.getFullYear()+"-"+(d.getMonth()+1)+"-"+d.getDate(),postid:postid});
    location.reload();
	});
});

function backHome(){
  window.location.replace("../HomePage/HomePage.php");
}

function addreply(t,u,d,l,i)
{
	$(document).ready(function(){
		$("#replyarea").before(
      '<div class="row container">'+
        '<div class="col m1 container center">'+
        '<p class="id">'+u+'</p>'+
        '<input type="image" class="round" src="head.png" height="30" width="30" data-value="'+i+'" onclick="toprofile(this)">'+
        '<p class="id">'+d+'</p>'+
        '<div class="row container">'+
  			'<div class="col m05 container center button">'+
  			'<input type="image" src="tu.png" width="40" height="40" data-value="'+i+'" onclick="addlike(this)">'+
  			'</div>'+
  			'<div class="col m05 container center button">'+
  			'<p style="margin: 0;font-size:8px;">'+l+'</p>'+
  			'</div>'+
  			'</div>'+
        '</div>'+
        '<div class="col m6 container">'+
        '<p id="posttext" class="wrap">'+t+'</p>'+
        '</div>'+
      '</div>'
    );
	});
}

function addlike(e){
  $.post("AddLike.php",
  {postid:e.dataset.value}
  );
  location.reload();
}

function toprofile(e){
  var id = document.getElementById("userid").value;
  $.post("AddGuestID.php",
  {guestid:e.dataset.value}
  );
  if(id==e.dataset.value){
    $(document).ready(function(){
  		$("#box").append(
        '<script> window.location.replace("../UserProfile/UserProfile.php");'+
        '</script>";'
  		);
  	});
  }
  else{
    $(document).ready(function(){
  		$("#box").append(
        '<script> window.location.replace("../VisitProfile/VisitProfile.php");'+
        '</script>";'
  		);
  	});
  }
}
