    <div id="main">
        <div class="main-area-top">
            <div class="container">
                <div class="logo">
                    <h3 class="muted">
                        <img src="<?= assets_url() ?>images/logo-badge.png" alt="img">
                    </h3> </div>
                <div class="masthead">
                    <!-- nav container start -->
                    <section id="nav-container">
                        <!-- main navigation start  -->
                        <nav id="nav">
                            <ul class="nav nav-list" style="display: none;">
                                <li class="active"> <a href="<?php echo site_url() ?>" class="active">Home</a> </li>
                                <li> <a href="#">Pages</a>
                                    <ul style="display: none;">
                                        <li><a href="about.html">About us</a> </li>
                                        <li><a href="page-sidebar-left.html">Page with sidebar left</a> </li>
                                        <li><a href="page-sidebar-right.html">Page with sidebar right</a> </li>
                                        <li><a href="404.html">404 page</a> </li>
                                        <li><a href="pricing.html">Pricing tables</a> </li>
                                    </ul>
                                </li>
                                <li> <a href="#">Portfolio</a>
                                    <ul style="visibility: hidden; display: block;">
                                        <li><a href="portfolio3.html">Portfolio v2</a> </li>
                                        <li><a href="portfolio4.html">Portfolio v3</a> </li>
                                    </ul>
                                </li>
                                <li> <a href="blog-archive.html">Blog</a>
                                    <ul style="visibility: hidden; display: block;">
                                        <li><a href="blog-archive.html">Blog Archive</a> </li>
                                        <li><a href="blog-single.html">Blog single</a> </li>
                                    </ul>
                                </li>
                                <li> <a href="#">Features</a>
                                    <ul style="display: none;">
                                        <li><a href="typography.html">Typography</a> </li>
                                        <li><a href="">Third level +</a>
                                            <ul style="display: none;">
                                                <li><a href="#">Menu item</a> </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li> <a href="#">Contact</a> </li>
                            </ul>
                        </nav>
                        <!-- main navigation end -->
                        <!-- responsive navigation start -->
                        <select id="nav-responsive">
                            <option selected="" value="">Site Navigation...</option>
                            <option value="">Home</option>
                            <option value="index.html">- Home default</option>
                            <option value="">Pages</option>
                            <option value="about.html">- About us</option>
                            <option value="page-sidebar-left.html">- Page with sidebar left</option>
                            <option value="page-sidebar-right.html">- Page with sidebar right</option>
                            <option value="404.html">- 404 page</option>
                            <option value="pricing.html">- Pricing tables</option>
                            <option value="">Portfolio</option>
                            <option value="portfolio2.html">- Portfolio v2 </option>
                            <option value="portfolio3.html">- Portfolio v3 </option>
                            <option value="">Blog</option>
                            <option value="blog.html">- Blog</option>
                            <option value="blog-single.html">- Blog single</option>
                            <option value="">Features</option>
                            <option value="typography.html">- Tipography</option>
                            <option value="">Contact</option>
                            <option value="#">- Contact default</option>
                        </select>
                        <!-- responsive navigation end -->
                    </section>
                    <!-- nav container end -->
                </div>
            </div>
            <!-- /.main area top -->
        </div>
        <!-- /.container -->