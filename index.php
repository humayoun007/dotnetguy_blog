<?php include('header.php') ?>

				

					<div class="clearfix slider">

						<ul class="pgwSlider">

							<li><img src="images/thumbs/megamind_07.jpg" alt="Paris, France" data-description="Eiffel Tower and Champ de Mars" data-large-src="images/slides/megamind_07.jpg"/></li>

							<li><img src="images/thumbs/wall-e.jpg" alt="Montréal, QC, Canada" data-large-src="images/slides/wall-e.jpg" data-description="Eiffel Tower and Champ de Mars"/></li>

							<li>

								<img src="images/thumbs/up-official-trailer-fake.jpg" alt="Shanghai, China" data-large-src="images/slides/up-official-trailer-fake.jpg" data-description="Shanghai ,chaina">

							</li>





						</ul>

					</div>

					

					<div class="clearfix content">

						<div class="content_title"><h2>Latest Blog Post</h2></div>

						<?php            
            			$sql = "SELECT postid,post_title,post_date,post_content,username,category_name FROM post join user on post.userid = user.userid join category on category.categoryid=post.categoryid LIMIT 5";
            			$result = $conn->query($sql);
            			if ($result->num_rows > 0) {
                			// output data of each row
                			while($row = $result->fetch_assoc()) {
						    $d = new DateTime($row['post_date']);							
							$day = date_format($d,'d'); 
							$month = date_format($d,'F'); 
							$fmt = date_format($d,'d M Y'); 
							echo "<div class='clearfix single_content'>

							<div class='clearfix post_date floatleft'>

								<div class='date'>

									<h3>{$day}</h3>

									<p>{$month}</p>

								</div>

							</div>

							<div class='clearfix post_detail'>

								<h2><a href=''>{$row['post_title']}</a></h2>

								<div class='clearfix post-meta'>

									<p><span><i class='fa fa-user'></i> {$row['username']}</span> <span><i class='fa fa-clock-o'></i> {$fmt}</span> <span><i class='fa fa-comment'></i> 4 comments</span> <span><i class='fa fa-folder'></i> {$row['category_name']}</span></p>

								</div>

								<div class='clearfix post_excerpt'>

									<img src='images/thumb.png' alt=''/>

									<p>{$row['post_content']}</p>

								</div>

								<a href='single_post.php'>Continue Reading</a>

							</div>

						</div>";
                			}
            			}
            	    	?>																		

					</div>

					

					<div class="pagination">

						<nav>

							<ul>

								<li><a href=""> << </a></li>

								<li><a href="">1</a></li>

								<li><a href="">2</a></li>

								<li><a href="">3</a></li>

								<li><a href="">4</a></li>

								<li><a href=""> >> </a></li>

							</ul>

						</nav>

					</div>

<?php include('footer.php') ?>				