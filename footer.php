<?php
			$msg = '';			
            
            if (isset($_POST['login']) && !empty($_POST['username']) 
               && !empty($_POST['password'])) {
				$sql = "SELECT userid, username,email,mobile,password FROM user where username='".$_POST['username']."'";
            			$result = $conn->query($sql);
            			if ($result->num_rows > 0) {
                			// output data of each row
                			while($obj = $result->fetch_object()) {								
								if ($_POST['username'] == $obj->username && 
                  					$_POST['password'] == $obj->password) {
										if(session_id() == '') {
											session_start();
										}
										$_SESSION['valid'] = true;
										$_SESSION['timeout'] = time();
										$_SESSION['username'] = $obj->username;
										$_SESSION['userid'] = $obj->userid;
										
										//$msg = 'You have entered valid use name and password';
										header('Location: post_content.php');
										exit();
								}else {
									$msg = 'Wrong username or password';
								}
                			}
            			}
               
            }
         ?>
</div>

<div class="clearfix sidebar_container floatright">



    <div class="clearfix newsletter">

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method="post">
            <h2>login for new post</h2>
            <h6><?php echo $msg; ?></h6>
            <input type="text" name="username" placeholder="username" id="mce-TEXT" />

            <input type="password" name="password" placeholder="password" id="mce-PASSWORD" />

            <input type="submit" name="login" value="Login" id="mc-embedded-subscribe" />

        </form>

    </div>

    <div class="clearfix sidebar">

        <div class="clearfix single_sidebar">

            <div class="popular_post">

                <div class="sidebar_title">
                    <h2>Most Popular</h2>
                </div>

                <ul>
                    <?php            
            			$sql = "SELECT postid,post_title FROM post LIMIT 5";
            			$result = $conn->query($sql);
            			if ($result->num_rows > 0) {
                			// output data of each row
                			while($row = $result->fetch_assoc()) {
								echo "<li><a href='single_post.php?postid={$row['postid']}'>{$row['post_title']}</a></li>";
                			}
            			}
            	    ?>

                </ul>

            </div>

        </div>

        <div class="clearfix single_sidebar category_items">

            <h2>Categories</h2>

            <ul>
                <?php            
            			$sql = "SELECT categoryid, category_name FROM category";
            			$result = $conn->query($sql);
            			if ($result->num_rows > 0) {
                			// output data of each row
                			while($row = $result->fetch_assoc()) {								
								echo "<li class='cat-item'><a href='index.php?cat={$row['category_name']}'>{$row['category_name']}</a>(12)</li>";
                			}
            			}
            	?>

            </ul>

        </div>

        <div class="clearfix single_sidebar">

            <h2>Recent Post</h2>

            <ul>
                <?php            
            			$sql = "SELECT categoryid, category_name FROM category";
            			$result = $conn->query($sql);
            			if ($result->num_rows > 0) {
                			// output data of each row
                			while($row = $result->fetch_assoc()) {								
								echo "<li><a href='index.php?cat={$row['category_name']}'>{$row['category_name']} <span>(12)</span></a></li>";
                			}
            			}
            	?>
            </ul>

        </div>

    </div>

</div>

</div>

</section>



<!-- <section id="footer_top_area">

    <div class="clearfix wrapper footer_top">

        <div class="clearfix footer_top_container">

            <div class="clearfix single_footer_top floatleft">

                <h2>From Twitter</h2>

                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. <a href="">Lorem Ipsum has
                        been the industry</a> standard dummy text ever since the 1500s, when an unknown printer took a
                    galley of type and scrambled it to make a type specimen book. It has survived not only five
                    centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was
                    popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and
                    more recently with desktop publishing software like Aldus PageMaker including versions of Lorem
                    Ipsum.</p>

            </div>

            <div class="clearfix single_footer_top floatleft">

                <h2>Recent Post</h2>

                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy <a href="">Lorem Ipsum has been the industry</a> text ever since the
                    1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                    It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                    essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets
                    containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus
                    PageMaker including versions of Lorem Ipsum.</p>

            </div>

            <div class="clearfix single_footer_top floatleft">

                <h2>Usefull Links</h2>

                <ul>

                    <li><a href="">Important links of this site</a></li>

                    <li><a href="">Important links of this site</a></li>

                    <li><a href="">Important links of this site</a></li>

                    <li><a href="">Important links of this site</a></li>

                    <li><a href="">Important links of this site</a></li>

                    <li><a href="">Important links of this site</a></li>

                </ul>

            </div>

        </div>

    </div>

</section> -->



<section id="footer_bottom_area">

    <div class="clearfix wrapper footer_bottom">

        <div class="clearfix copyright floatleft">

            <p> Copyright &copy; All rights reserved by <span>Humayoun Kabir</span></p>

        </div>

        <div class="clearfix social floatright">

            <ul>

                <li><a class="tooltip" title="Facebook" href=""><i class="fa fa-facebook-square"></i></a></li>

                <li><a class="tooltip" title="Twitter" href=""><i class="fa fa-twitter-square"></i></a></li>

                <li><a class="tooltip" title="Google+" href=""><i class="fa fa-google-plus-square"></i></a></li>

                <li><a class="tooltip" title="LinkedIn" href=""><i class="fa fa-linkedin-square"></i></a></li>

                <li><a class="tooltip" title="tumblr" href=""><i class="fa fa-tumblr-square"></i></a></li>

                <li><a class="tooltip" title="Pinterest" href=""><i class="fa fa-pinterest-square"></i></a></li>

                <li><a class="tooltip" title="RSS Feed" href=""><i class="fa fa-rss-square"></i></a></li>

                <li><a class="tooltip" title="Sitemap" href=""><i class="fa fa-sitemap"></i> </a></li>

            </ul>

        </div>

    </div>

</section>



<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.0.min.js"></script>

<script type="text/javascript" src="js/jquery.tooltipster.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {

    $('.tooltip').tooltipster();

});
</script>

<script type="text/javascript" src="js/selectnav.min.js"></script>

<script type="text/javascript">
selectnav('nav', {

    label: '-Navigation-',

    nested: true,

    indent: '-'

});
</script>

<script src="js/pgwslider.js"></script>

<script type="text/javascript">
$(document).ready(function() {

    $('.pgwSlider').pgwSlider({



        intervalDuration: 5000



    });

});
</script>

<script type="text/javascript" src="js/placeholder_support_IE.js"></script>



<!--

---- Clean html template by http://WpFreeware.com

---- This is the main file (index.html).

---- You are allowed to change anything you like. Find out more Awesome Templates @ wpfreeware.com

---- Read License-readme.txt file to learn more.

-->



</body>

</html>