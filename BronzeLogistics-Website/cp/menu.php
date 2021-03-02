                <div id="menu">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="customers.php">Customers</a></li>
                        <li><a href="news.php">News</a></li>
                        <li><a href="gallery.php">Gallery</a></li>
                    </ul>
                </div>
                <div id="row">
                <div id="lnews">
                    <a href="add_news.php"><img src="icons/add.png" id="add-news" title="Add News" /></a>
                    <ul id="news">
                        <?php
                            include('db.php');
                            $q1=$db->query("select * from news order by id desc limit 0,5");
                            $num1=$q1->num_rows;
                            for ($i=0; $i<$num1; $i++) {
                                $row1=$q1->fetch_assoc();
                        ?>
                        <li class="btn"><?php echo $row1['title']; ?><a href="del_news.php?id=<?php echo $row1['id']; ?>"><img title="Delete News" src="icons/delete.png" id="del-news" /></a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
                <div id="wrapper" style="width:749px; height:280px; position:absolute; left:9px; top:0px;">
                    <div class="slider-wrapper theme-default">
                        <div id="slider" class="nivoSlider">
                            <img src="slider/1.jpg" title="" />
                            <img src="slider/2.jpg" title=""/>
                            <img src="slider/3.jpg" title=""/>
                            <img src="slider/4.jpg" title=""/>
                        </div>
                    </div>
                </div>
                </div>
