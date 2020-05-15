function goback(){
  window.history.go(-1);
}

function addfollower(name){
  $(document).ready(function(){
		$("#Follower").after(
      '<div class="row">'+
        '<div class="UserColumn">'+
          '<div class="card">'+
            '<div class="container">'+
              '<p>photo</p>'+
              '<h2>'+name+'</h2>'+
            '</div>'+
          '</div>'+
        '</div>'+
      '</div>'
		);
	});
}
