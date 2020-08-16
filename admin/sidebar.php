<!-- start sidebar menu -->
<div class="sidebar-container">
 				<div class="sidemenu-container navbar-collapse collapse fixed-menu">
	                <div id="remove-scroll">
	                    <ul class="sidemenu page-header-fixed p-t-20" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
	                        <li class="sidebar-toggler-wrapper hide">
	                            <div class="sidebar-toggler">
	                                <span></span>
	                            </div>
	                        </li>
	                        <li class="sidebar-user-panel">
	                            <div class="user-panel">
	                                <div class="row">
                                            <div class="sidebar-userpic">
                                                <img src="img/logo.jpeg" class="img-responsive" alt=""> </div>
                                        </div>
                                        <div class="profile-usertitle">
                                            <div class="sidebar-userpic-name">Welcome</div>
                                            <div class="profile-usertitle-job"> Admin </div>
                                        </div>
                                        <div class="sidebar-userpic-btn">
									        <a class="tooltips" href="#" data-placement="top" data-original-title="Profile">
									        	<i class="fa fa-User"></i>
									        </a>
									        <a class="tooltips" target="_blank" href="#" data-placement="top" data-original-title="Login to Web mail">
									        	<i class="fa fa-envelope"></i>
									        </a>
									        <a class="tooltips" target="_blank" href="#" data-placement="top" data-original-title="Login to cPanel">
									        	<i class="fa fa-wrench"></i>
									        </a>
									        <a class="tooltips" href="logout.php" data-placement="top" data-original-title="Logout">
									        	<i class="fa fa-lock"></i>
									        </a>
									    </div>
	                            </div>
	                        </li>
	                        <li class="menu-heading">
			                	<span> Welcome</span>
			                </li>
	                        <li class="nav-item start <?php if($page=='dashboard' or $page=='change_password'){ echo 'active';}?>">
	                            <a href="#" class="nav-link nav-toggle">
	                                <i class="material-icons">dashboard</i>
	                                <span class="title">Dashboard</span>
                                	<span class="arrow"></span>
									 <span class="selected"></span>
	                            </a>
	                            <ul class="sub-menu">
	                                <li class="nav-item">
	                                    <a href="dashboard.php" class="nav-link ">
	                                        <span class="title" <?php if($page=='dashboard'){?> style="color:white;" <?php }?>>Dashboard</span>
											
	                                    </a>
	                                </li>
	                                <li class="nav-item ">
	                                    <a href="change_password.php" class="nav-link ">
	                                        <span class="title" <?php if($page=='change_password'){?> style="color:white;" <?php }?>>Change Password</span>
	                                    </a>
	                                </li>
	                            </ul>
	                        </li>
	                        
	                       
	                        <li class="nav-item <?php if($page=='add_category'){ echo 'active';}?>">
	                            <a href="#" class="nav-link nav-toggle">
	                                <i class="material-icons">vpn_key</i>
	                                <span class="title">Manage Categories</span>
	                                <span class="arrow"></span>
	                            </a>
	                            <ul class="sub-menu">
	                                <li class="nav-item">
	                                    <a href="add-categories.php" class="nav-link ">
	                                        <span class="title" <?php if($page=='add_category'){?> style="color:white;" <?php }?>>Add categories</span>
	                                    </a>
	                                </li>
	                              
	                               
	                            </ul>
	                        </li>
							<li class="nav-item <?php if($page=='add_articles' or $page=='delete_articles' or $page=='edit_articles'){ echo 'active';}?>">
	                            <a href="#" class="nav-link nav-toggle">
	                                <i class="material-icons">shop</i>
	                                <span class="title">Manage News Articles</span>
	                                <span class="arrow"></span>
	                            </a>
	                            <ul class="sub-menu">
	                                <li class="nav-item">
	                                    <a href="add-news-articles.php" class="nav-link ">
	                                        <span class="title" <?php if($page=='add_articles'){?> style="color:white;" <?php }?>>Add News Articles</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item">
	                                    <a href="view-news-articles.php" class="nav-link ">
	                                        <span class="title" <?php if($page=='delete_articles'){?> style="color:white;" <?php }?>>View News Articles</span>
	                                    </a>
	                                </li>
	                               
	                            </ul>
	                        </li>
							
	                        
							<li class="nav-item <?php if($page=='add_cities'){ echo 'active';}?>">
	                            <a href="#" class="nav-link nav-toggle">
	                                <i class="material-icons">location_on</i>
	                                <span class="title">Cities</span>
	                                <span class="arrow"></span>
	                            </a>
	                            <ul class="sub-menu">
	                                <li class="nav-item">
	                                    <a href="add-cities.php" class="nav-link ">
	                                        <span class="title" <?php if($page=='add_cities'){?> style="color:white;" <?php }?>>Add Cities</span>
	                                    </a>
	                                </li>
	                              
	                               
	                            </ul>
								
	                        </li>
							
							<li class="nav-item <?php if($page=='corona_cases'){ echo 'active';}?>">
	                            <a href="#" class="nav-link nav-toggle">
	                                <i class="material-icons">assignment_turned_in</i>
	                                <span class="title">Manage Users</span>
	                                <span class="arrow"></span>
	                            </a>
	                            <ul class="sub-menu">
	                                <li class="nav-item">
	                                    <a href="corona-cases.php" class="nav-link ">
	                                        <span class="title" <?php if($page=='corona_cases'){?> style="color:white;" <?php }?>>Update cases</span>
	                                    </a>
	                                </li>
	                              
	                               
	                            </ul>
								
	                        </li>
							
	                        
	                        
	                    </ul>
	                </div>
                </div>
            </div>
            <!-- end sidebar menu --> 