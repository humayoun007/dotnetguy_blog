<?php include('header.php') ?>
<?php
if(session_id() == '') {
    session_start();
}

if(empty($_SESSION['username'])){
    header('Location: index.php');
    exit();
}

if (isset($_POST['submit']) && !empty($_POST['title']) 
               && !empty($_POST['content'])) {			
             
                $stmt = $conn->prepare("INSERT INTO post (post_title,post_date,userid,categoryid,post_content) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param("ssiis", $post_title, $post_date, $userid,$categoryid,$post_content); //The argument may be one of four types:i - integer,d - double,s - string,b - BLOB
                // set parameters and execute

                $post_title = $_POST['title'];
                $post_date = date("Y-m-d");
                $userid = $_SESSION['userid'];
                $categoryid = $_POST['category'];
                $post_content = $_POST['content'];

                //echo "{$post_title},{$post_date},{$userid},{$categoryid},{$post_content}";
                //exit();

                $stmt->execute();
                //$msg = 'You have entered valid use name and password';
				header('Location: index.php');
				exit();
               
            }

?>
<div class="post_content">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method="post">

        <p>Title: <input type="text" class="wpcf7-text" name="title" placeholder="Post Title" /></p>

        <p> Category:
            <select name="category">
                <?php            
            $sql = "SELECT categoryid, category_name FROM category";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {                    
                    echo "<option value = '{$row['categoryid']}' >". $row['category_name'] ."</option>";
                }
            }
            ?>
            </select>
        </p>

        <p>Content: <textarea class="wpcf7-textarea" name="content" placeholder="Post Content"></textarea></p>

        <p><input type="Submit" class="wpcf7-submit" name="submit" value="Submit" /></p>

    </form>
</div>

</div>
</div>
</section>
</body>

</html>