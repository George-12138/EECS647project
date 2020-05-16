function addfollower(name){
  $(document).ready(function(){
		$("#Follower").after(
        '<div class="UserColumn">'+
          '<div class="card">'+
            '<div class="container">'+
              '<img src="head.png" height="70" width="70">'+
              '<h2>'+name+'</h2>'+
            '</div>'+
          '</div>'+
        '</div>'
		);
	});
}

function addfollowing(name,id){
  $(document).ready(function(){
		$("#Following").after(
        '<div class="UserColumn">'+
          '<div class="card">'+
            '<div class="container">'+
              '<img src="head.png" height="70" width="70">'+
              '<h2>'+name+'</h2>'+
              '<p><button class="button" data-value="'+id+'" onclick="unfollow(this)">Unfollow</button></p>'+
            '</div>'+
          '</div>'+
        '</div>'
		);
	});
}

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

function addreply(text,date,postid){
  $(document).ready(function(){
		$("#Reply").after(
        '<div class="column">'+
          '<div class="card">'+
            '<div class="container">'+
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

function unfollow(e){
  $.post("UnFollow.php",
  {guestid:e.dataset.value}
  );
  setTimeout(function(){ window.location.reload(); }, 500);
}
