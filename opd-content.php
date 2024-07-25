<section id="form-section" class="from-wrapper">
    <div class="content-area">
    <div class="row">
        <div class="col-md-6 col-lg-4">
            <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
            <!--PROFILE-->
            <div>
                <div class="profile-photo">
                    <img alt="User photo" src="http://localhost/WP/wpplugindev/wp-content/uploads/2024/07/DSC01428-212.jpg">
                </div>
                <div class="user-header-info">
                    <h2 class="user-name">Md. Redoy Islam</h2>
                    <h5 class="user-position">Developer ( Web & Software )</h5>
                    <div class="user-social-media">
                        <span class="text-lg"><a href="#" class="fa fa-twitter-square"></a> <a href="#" class="fa fa-facebook-square"></a> <a href="#" class="fa fa-linkedin-square"></a> <a href="#" class="fa fa-google-plus-square"></a></span>
                    </div>
                </div>
            </div>
            <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
            <!--CONTACT INFO-->
            <div class="panel bg-scale-0 b-primary bt-sm mt-xl">
                <div class="panel-content">
                    <h4 class=""><b>Contact Information</b></h4>
                    <ul class="user-contact-info ph-sm">
                        <li><b><i class="color-primary mr-sm fa fa-envelope"></i></b> mdredoyislam.web@gmail.com</li>
                        <li><b><i class="color-primary mr-sm fa fa-phone"></i></b> (+880) 1770 930936</li>
                        <li><b><i class="color-primary mr-sm fa fa-globe"></i></b> 53/2 Sukrabad, Dhanmondi 32, Dhaka-1207, Bangladesh</li>
                        <li class="mt-sm"> <b><i class="color-primary mr-sm fa fa-info-circle"></i></b>Passionate learner and conscientious web developer looking for a challenging role where I can use my 4+ years of full-stack development skills. Proficient of developing user-friendly websites and applications using WordPress, PHP, and a variety of front-end and back-end technologies. I'm constantly acquiring new skills to stay current and give clients impactful solutions. </li>
                    </ul>
                </div>
            </div>
            <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
            <!--LIST-->
            <div class="panel  b-primary bt-sm ">
                <div class="panel-content">
                    <div class="widget-list list-sm list-left-element ">
                        <ul>
                            <li>
                                <a href="#">
                                    <div class="left-element"><i class="fa fa-check color-success"></i></div>
                                    <div class="text">
                                        <span class="title">95 Jobs</span>
                                        <span class="subtitle">Completed</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="left-element"><i class="fa fa-clock-o color-warning"></i></div>
                                    <div class="text">
                                        <span class="title">3 Proyects</span>
                                        <span class="subtitle">working on</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="left-element"><i class="fa fa-warning color-warning"></i></div>
                                    <div class="text">
                                        <span class="title">8 Bugs</span>
                                        <span class="subtitle">reported today</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="left-element"><i class="fa fa-flag color-danger"></i></div>
                                    <div class="text">
                                        <span class="title">Error</span>
                                        <span class="subtitle">sevidor C down</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="left-element"><i class="fa fa-tasks color-success"></i></div>
                                    <div class="text">
                                        <span class="title">14 Task</span>
                                        <span class="subtitle">completed</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-8">
            <h1 class="section-subtitle"><b><?php _e('Option Demo Admin Page', 'optiondemo'); ?></b></h1>
            <div class="panel">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="<?php echo admin_url('admin-post.php'); ?>" method="post">
                                <?php
                                    wp_nonce_field('optiondemo');
                                    $opd_latitude = get_option('opd_latitude');
                                    $opd_longitude = get_option('opd_longitude');
                                    $opd_zoom_label = get_option('opd_zoom_label');
                                    $opd_api_key = get_option('opd_api_key');
                                    $opd_extarnal_css = get_option('opd_extarnal_css');
                                    $opd_expiry_date = get_option('opd_expiry_date');
                                ?>
                                <h4 class="mb-md "><?php _e('Demonstration of plugin settings page', 'optiondemo'); ?></h4>
                                <div class="form-group">
                                    <label for="opd_latitude">Latitude</label>
                                    <input type="text" name="opd_latitude" class="form-control" id="opd_latitude" value="<?php echo esc_attr($opd_latitude); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="opd_longitude">Longitude</label>
                                    <input type="text" name="opd_longitude" class="form-control" id="opd_longitude" value="<?php echo esc_attr($opd_longitude); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="opd_zoom_label">Zoom Label</label>
                                    <input type="text" name="opd_zoom_label" class="form-control" id="opd_zoom_label" value="<?php echo esc_attr($opd_zoom_label); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="opd_api_key">API Key</label>
                                    <input type="text" name="opd_api_key" class="form-control" id="opd_api_key" value="<?php echo esc_attr($opd_api_key); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="opd_extarnal_css" class="control-label">Extarnal CSS</label>
                                    <textarea class="form-control" rows="2" name="opd_extarnal_css" id="opd_extarnal_css" maxlength="500"><?php echo esc_html($opd_extarnal_css); ?></textarea>
                                    <span class="help-block"><i class="fa fa-info-circle mr-xs"></i>Max characters set to <span class="code">500</span></span>
                                </div>
                                <div class="form-group">
                                    <label for="opd_expiry_date">Expiry Date</label>
                                    <input type="date" name="opd_expiry_date" class="form-control" id="opd_expiry_date" value="<?php echo esc_attr($opd_expiry_date); ?>">
                                </div>
                                <input type="hidden" name="action" value="opd_admin_page">
                                <div class="form-group">
                                    <?php submit_button('Save Changes'); ?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>