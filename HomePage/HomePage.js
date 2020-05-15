$(document).ready(function(){
    $("#post").click(function(){
		var title = document.getElementById("titleinput").value;
		var text = $('textarea').val();
		var d = new Date();
    $.post("AddPost.php",
    {title:title,text:text,date:d.getFullYear()+"-"+(d.getMonth()+1)+"-"+d.getDate()});
    location.reload();
	});
});

function addpost(h,t,u,d,i)
{
	$(document).ready(function(){
		$("#header").after(
			'<div class="row container">'+
			'<div class="col container m6">'+
			'<h2 id="title" class="distext" data-value="'+i+'" onclick=topost(this)>'+h+'</h2>'+
			'<p class="distext">'+t+'</p>'+
			'</div>'+
			'<div class="col container m1 center">'+
			'<input type="image" class="round" src="head.png" height="30" width="30" data-value="'+i+'"onclick=toprofile(this)>'+
      '<p class="id">'+u+'</p>'+
			'<p class="id">'+d+'</p>'+
			'</div>'+
			'</div>'
		);
	});
}

function backHome(){
  window.location.replace("../LogInPage.php");
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

function topost(e){
  $.post("AddPostID.php",
  {postid:e.dataset.value}
  );
  $(document).ready(function(){
		$("#box").append(
      '<script> window.location.replace("../Post/Post.php");'+
      '</script>";'
		);
	});
}
