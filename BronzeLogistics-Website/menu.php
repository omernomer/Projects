                <div id="menu">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="aboutus.php">About Us</a></li>
                        <li><a href="services.php">Services</a></li>
                        <li><a href="contracts.php">Contracts</a></li>
                        <li><a href="partners.php">Partners & Clients</a></li>
                        <li><a href="customers.php">Customers</a></li>
                        <li><a href="future.php">Future Vision</a></li>
                        <li><a href="news.php">News</a></li>
                        <li><a href="gallery.php">Gallery</a></li>
                        <li><a href="contactus.php">Contact Us</a></li>
                    </ul>
                </div>
                <div id="row">
                <div id="lnews">
                    <ul id="news">
                        <?php
                            include('db.php');
                            $q1=$db->query("select * from news order by id desc limit 0,5");
                            $num1=$q1->num_rows;
                            for ($i=0; $i<$num1; $i++) {
                                $row1=$q1->fetch_assoc();
                        ?>
                        <li onclick="window.location='v_news.php?id=<?php echo $row1['id']; ?>'" class="btn"><?php echo $row1['title']; ?></li>
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
                            <img src="slider/5.jpg" title=""/>
                            <img src="slider/6.jpg" title=""/>
                        </div>
                    </div>
                </div>
                </div>