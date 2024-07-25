<?php
/*
Plugin Name: Options Demo
Plugin URI: https://redoyit.com/
Description: Used by millions, WordCount is quite possibly the best way in the world to <strong>protect your blog from spam</strong>. WordCount Anti-spam keeps your site protected even while you sleep. To get started: activate the WordCount plugin and then go to your WordCount Settings page to set up your API key.
Version: 5.3
Requires at least: 5.8
Requires PHP: 5.6.20
Author: Md. Redoy Islam
Author URI: https://redoyit.com/wordpress-plugins/
License: GPLv2 or later
Text Domain: optiondemo
Domain Path: /languages
*/
//Plugin File Directory Constants Define
define('OPD_ASSETS_DIR', plugin_dir_url(__FILE__).'assets/');
define('OPD_ASSETS_PUBLIC_DIR', OPD_ASSETS_DIR.'public/');
define('OPD_ASSETS_PUBLIC_JS_DIR', OPD_ASSETS_PUBLIC_DIR.'js/');
define('OPD_ASSETS_PUBLIC_CSS_DIR', OPD_ASSETS_PUBLIC_DIR.'css/');
define('OPD_ASSETS_PUBLIC_IMG_DIR', OPD_ASSETS_PUBLIC_DIR.'images/');
define('OPD_ASSETS_ADMIN_DIR', OPD_ASSETS_DIR.'admin/');
define('OPD_ASSETS_ADMIN_JS_DIR', OPD_ASSETS_ADMIN_DIR.'js/');
define('OPD_ASSETS_ADMIN_CSS_DIR', OPD_ASSETS_ADMIN_DIR.'css/');
define('OPD_ASSETS_ADMIN_IMG_DIR', OPD_ASSETS_ADMIN_DIR.'images/');

define('OPD_VERSION', time());

class OptionDemo{
    private $version;
    public function __construct(){
        $this->version = time();
        add_action('plugin_loaded', array($this, 'opd_load_textdomain'));
        add_action('admin_menu', array($this, 'opd_create_admin_page'));
        add_action('admin_post_opd_admin_page', array($this, 'opd_save_form'));
        add_action('admin_enqueue_scripts', array($this, 'opd_load_admin_assets'), 9);
    }
    function opd_create_admin_page(){
        $page_title = __('Options Admin', 'optiondemo');
        $menu_title = __('Options Admin', 'optiondemo');
        $capability = 'manage_options';
        $slug = 'optiondemopage';
        $callback = array($this, 'opd_settings_content');
        add_menu_page($page_title, $menu_title, $capability, $slug, $callback);
    }

    function opd_settings_content(){
        require_once plugin_dir_path(__FILE__)."/opd-content.php";
    }

    function opd_save_form(){
        check_admin_referer('optiondemo');

        if(isset($_POST['opd_latitude']) || isset($_POST['opd_longitude']) || isset($_POST['opd_zoom_label']) || isset($_POST['opd_api_key']) || isset($_POST['opd_extarnal_css']) || isset($_POST['opd_expiry_date'])){
            update_option('opd_latitude', sanitize_text_field($_POST['opd_latitude']));
            update_option('opd_longitude', sanitize_text_field($_POST['opd_longitude']));
            update_option('opd_zoom_label', sanitize_text_field($_POST['opd_zoom_label']));
            update_option('opd_api_key', sanitize_text_field($_POST['opd_api_key']));
            update_option('opd_extarnal_css', sanitize_text_field($_POST['opd_extarnal_css']));
            update_option('opd_expiry_date', sanitize_text_field($_POST['opd_expiry_date']));
        }
        wp_redirect('admin.php?page=optiondemopage');
    }

    function opd_load_admin_assets($screen){
        $_screen = get_current_screen();
        if('toplevel_page_optiondemopage' == $screen){

            $css_files = array(
                'boostrap' => array('path'=>OPD_ASSETS_ADMIN_CSS_DIR.'bootstrap.css'),
                'font-awesome' => array('path'=>OPD_ASSETS_ADMIN_CSS_DIR.'font-awesome.css'),
                'sweetalert' => array('path'=>OPD_ASSETS_ADMIN_CSS_DIR.'sweetalert.css'),
                'toastr' => array('path'=>OPD_ASSETS_ADMIN_CSS_DIR.'toastr.min.css'),
                'theme-style' => array('path'=>OPD_ASSETS_ADMIN_CSS_DIR.'theme-style.css'),
                'opd-admin-style' => array('path'=>OPD_ASSETS_ADMIN_CSS_DIR.'opd-admin-style.css'),
            );
            foreach($css_files as $handle=>$fileinfo){
                wp_enqueue_style($handle, $fileinfo['path'], $this->version, false);
            }
    
            $js_files = array(
                'bootstrap' => array('path'=>OPD_ASSETS_ADMIN_JS_DIR.'bootstrap.min.js', 'dep'=> array('jquery')),
                'bootstrap' => array('path'=>OPD_ASSETS_ADMIN_JS_DIR.'bootstrap.min.js', 'dep'=> array('jquery')),
                'sweetalert' => array('path'=>OPD_ASSETS_ADMIN_JS_DIR.'sweetalert.min.js', 'dep'=> array('jquery')),
                'toastr' => array('path'=>OPD_ASSETS_ADMIN_JS_DIR.'toastr.min.js', 'dep'=> array('jquery')),
                'notifications-toastr' => array('path'=>OPD_ASSETS_ADMIN_JS_DIR.'notifications-toastr.js', 'dep'=> array('jquery')),
                'opd-main' => array('path'=>OPD_ASSETS_ADMIN_JS_DIR.'opd-admin.js', 'dep'=> array('jquery')),
            );
            foreach($js_files as $handle=>$fileinfo){
                wp_enqueue_script($handle, $fileinfo['path'], $fileinfo['dep'], $this->version, true);
            }
        }
    }

    function opd_load_textdomain(){ 
        load_plugin_textdomain('optiondemo', false, dirname(__FILE__) . '/languages');
    }
}
new OptionDemo();