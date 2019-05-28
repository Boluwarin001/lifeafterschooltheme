<?php
/**
 * The main template file
 *
 *
 * @link https://enochadediran.com
 *
 * @package WordPress
 * @subpackage LifeAfterSchool
 * @since 1.0.0
 */

if (isset($_POST['post']) and !empty($_POST['post'])) {
	if (!empty(get_post($_POST['post']))) {
		$p=get_post($_POST['post']);
?>
				<!-- <div class="blog-image"></div> -->
				<div class="blog-title">
					<?php echo $p->post_title; ?>
				</div>
				<div class="blog-dits">By <?php echo $p->post_author; ?>, April 20</div>
				<div class="blog-post"> 
				<?php echo $p->post_content; ?>
				</div>
<?php
		exit();
		}
	}

// echo'<pre>';

function timer($e){
  $loc="src/ig-api-timer.txt";
  $duration=($e*60)+1;
  $c_time=time();
  $h=fopen($loc, 'a');
  $last_print=file_get_contents($loc);
  $new_print=$last_print+$duration;

  if ($new_print<=$c_time) {
    file_put_contents($loc, $c_time);
    return true;
  }else{
    return false;
  }
  fclose($h);
}


$online=false;

    $products=array();
    $product=array();


if ($online==true and timer(60) and 2==3) {

    $username="xaviers_collection";
    // $username="boluwarin__";
      $ch = curl_init("https://www.instagram.com/$username/?__a=1");
      // curl_setopt($ch, CURLOPT_COOKIE, 'csrftoken=3Ig6ms36iaOJuMPgX35nhltXAMnUa53L');
      curl_setopt($ch, CURLOPT_COOKIE, 'sessionid=2252630323%3A5ESMC0xXLPSmoz%3A21');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

      $data = curl_exec($ch);
      curl_close($ch); 
    }else{
    $data=file_get_contents('ig-data');   
    }

    if ($data) {
      $q = json_decode($data)->graphql->user->edge_owner_to_timeline_media->edges;

      for ($i=0; $i < 4; $i++) { 
        $product['text']=$q[$i]->node->edge_media_to_caption->edges[0]->node->text;
        $product['instagram_id']=$q[$i]->node->id;
        $product['img1']=$q[$i]->node->display_url;
        $product['link_to_ig']='https://instagram.com/postschoollife';

        $txt=$product['text'];
		}

        $products[]=$product;
	}




// print_r(get_post(25));

// $rootLoc='https://www.lifeafterschool.ng/wp-content/themes/lifeafterschool/';
$rootLoc='http://localhost/wordpress/wp-content/themes/lifeafterschool/';
get_header();
?>


	<div class="post" id="postDiv">
		<div class="post-box">

			<div class="blog-content">
				<div class="blog-x" onclick="closePost()">X</div>	
				<div id="blog-post">
					
				</div>
			</div>


		</div>
	</div>



<div class="body" id="body">
<div class="top-row">
<div class="top-row-pad">

	<div class="logo"> <span class="hide-big hamburger" onclick="toggleNav()">&#9776;</span> <span class="hide-big"> &nbsp;</span>LifeAfterSchool</div>

	<div class="t-r-i"><span class="hide-small">Subscribe &nbsp; | &nbsp; </span>Sign In</div>
	<div class="clear"></div>

</div>	
</div>

<div class="nav" id="nav">
<div class="nav-pad">

	<div class="nav-item" style="color: inherit;">LIFE AFTER SCHOOL</div>
	<div class="nav-item">BUSINESS</div>
	<div class="nav-item">MAKING A FIRST CLASS</div>

	<div class="clear"></div>
</div>
</div>

<div class="wallpaper">
	
<div class="content">
<div class="content-pad">
	<div class="wallpaper-div">

		<div id="container">
		<div id="carousel">


		<div class="wall-div-item" style="background: url(<?php echo $rootLoc;?>images/front-gifs/3.gif); background-size: cover;" onclick="openPost(7, 'God wont help you')">
			<div class="wall-div-txt">
				<div style="padding: 100px 20px;">
					"Even when He does, He's too inconsistent to be reliable"
					<br>
					<br>
					<em>From: God won't help you</em> 
					<br>
					<div class="wdt2">By: Enoch Bolu</div>
				</div>
			</div>
		</div>
		<div class="wall-div-item" style="background: url(<?php echo $rootLoc;?>images/front-gifs/gif.gif); background-size: cover;">
			<div class="wall-div-txt">
				<div style="padding: 100px 20px;">
					"We write to taste life twice"
					<br>
					<br>
					<em>My first experience in the bush</em> 
					<br>
					<div class="wdt2">Daniel Owowowowo</div>
				</div>
			</div>
		</div>

		<div class="wall-div-item" style="background: url(<?php echo $rootLoc;?>images/front-gifs/2.gif); background-size: cover;">
			<div class="wall-div-txt">
				<div style="padding: 100px 20px;">
					"What life in Lagos is like for the new graduate"
					<br>
					<br>
					<em>Life in lagos</em> 
					<br>
					<div class="wdt2">Richard Branson</div>
				</div>
			</div>
		</div>

		</div>
		</div>

	</div>
</div>
</div>

</div>

<div class="content">
<div class="content-pad">

	<div class="col col-70">
	<div class="pad1">

		<?php
		$recent_posts = wp_get_recent_posts(array('numberposts'=>'5'));

		foreach ($recent_posts as $recent) {
		?>
		<div class="item" onclick="openPost('<?php echo $recent['ID']."', '".addslashes($recent['post_title']);?>')">
			<div class="item-txt">
				<div class="item-head">
					<?php echo $recent['post_title']; ?>
				</div>
				<div class="item-dit">
					<br>
					<?php echo $recent['post_excerpt']; ?><br>
					<?php echo $recent['post_author']; ?><br>
					<span style="color:grey"><?php //echo $recent['post_date']; ?>April 10 . 7 min read</span>
				</div>
			</div>
			<div class="item-pic" style="background: url(<?php 
				if (has_post_thumbnail()){ the_post_thumbnail(); } ?>)">
				</div>
			<div class="clear"></div>
		</div>
	<?php 
				}
	 ?>



	</div>
	</div>

	<div class="col col-30">
		<div class="pad1">
				<div class="social-head">
				<i class="fa fa-twitter"></i>
				<div class="social-avi"></div>
		</div>
			<br>
			<br>
			<div class="clear"></div>
				<div class="social-head">
					<i class="fa fa-instagram"></i>
					<div class="social-avi"></div>
				</div>
				<div class="clear"></div>
				<br>
				<br>
				<div class="item-pic ig-pictures"></div>
				<div class="item-pic ig-pictures"></div>
			<?php foreach ($products as $p) {
				?>
				<img class="ig-pictures" src="<?php echo $p['img1_url'];?>">
				<?php
			} ?>
	</div>

	<div class="clear"></div>	
</div>
</div>
</div>

<script type="text/javascript">
	$('#carousel').skippr({
		autoPlay:true,
		speed:1000,
		autoPlayDuration:5000,
		arrows:true,
		navType:'bubble',
		keyboadOnAlways:false,
	});
</script>

<script type="text/javascript" src="<?php echo $rootLoc;?>js/script.js"></script>

</body>
</html>