
postDiv = document.getElementById('postDiv');
body = document.getElementById('body');

nav = document.getElementById('nav');

$('#postDiv').css('display','none');

navSize='big';

function toggleNav(){
	if(navSize=='big'){
		nav.style.marginTop='0';
		navSize='small';
	}else if(navSize=='small'){
		nav.style.marginTop='-100vh';
		navSize='big';
	}
}

function openPost(id, title=''){
	$('#postDiv').fadeIn();
	$('#body').fadeOut();
	$('#blog-post').html('<div class="blog-loading">Loading "'+title +'"...</div>');
	$.post('index.php', {post:id}, function(result){
		$('#blog-post').html(result);
	});

}

function closePost(){
	$('#body').fadeIn();
	$('#postDiv').fadeOut();
}