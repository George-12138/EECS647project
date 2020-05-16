function addpost(title,text,date,postid){
  $(document).ready(function(){
		$("#Post").after(
        '<div class="column">'+
          '<div class="card">'+
            '<div class="container">'+
              '<h2>'+title+'</h2>'+
              '<p class="title">'+date+'</p>'+
              '<p>'+text+'</p>'+
              '<p><button class="button" data-value="'+postid+'" onclick="topost(this)">Read Post</button></p>'+
            '</div>'+
          '</div>'+
        '</div>'
		);
	});
}

function topost(e){
  $.post("AddPostID.php",
  {postid:e.dataset.value}
  );
  $(document).ready(function(){
		$("body").append(
      '<script> window.location.replace("../Post/Post.php");'+
      '</script>";'
		);
	});
}

function follow(e){
  $.post("Follow.php",
  {guestid:e.dataset.value}
  );
  setTimeout(function(){ window.location.reload(); }, 500);
}
