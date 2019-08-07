<?php
/**
* About Theme
*/
class Fortyseven_street_About_Theme {
	public $req_plugins = array(); // For Storing the list of the Required Plugins
	public function __construct() {
		/* create dashbord page */
		add_action( 'admin_menu', array( $this, 'fortyseven_street_welcome_register_menu' ) );
		/* activation notice */
		add_action( 'load-themes.php', array( $this, 'fortyseven_street_activation_admin_notice' ) );

		/** List of required Plugins **/
		$this->req_plugins = array(

			'instant-demo-importer' => array(
				'slug' => 'instant-demo-importer',
				'name' => __('Instant Demo Importer', 'fortyseven-street'),
				'filename' =>'instant-demo-importer.php',
				'class' => 'Instant_Demo_Importer',
				'github_repo' => true,
				'bundled' => true,
				'location' => 'https://github.com/8degreethemes/instant-demo-importer/archive/master.zip',
				'info' => __('Instant Demo Importer Plugin adds the feature to Import the Demo Conent with a single click.', 'fortyseven-street'),
			),
		);

		/** Plugin Installation Ajax **/
		add_action( 'wp_ajax_fortyseven_street_plugin_installer', array( $this, 'fortyseven_street_plugin_installer_callback' ) );

		/** Plugin Installation Ajax **/
		add_action( 'wp_ajax_fortyseven_street_plugin_offline_installer', array( $this, 'fortyseven_street_plugin_offline_installer_callback' ) );

		/** Plugin Activation Ajax **/
		add_action( 'wp_ajax_fortyseven_street_plugin_activation', array( $this, 'fortyseven_street_plugin_activation_callback' ) );

		/** Plugin Activation Ajax (Offline) **/
		add_action( 'wp_ajax_fortyseven_street_plugin_offline_activation', array( $this, 'fortyseven_street_plugin_offline_activation_callback' ) );
	}
	public function fortyseven_street_welcome_register_menu() {
		$title = __( 'About Fortyseven street', 'fortyseven-street' );

		add_theme_page( __( 'About Fortyseven street', 'fortyseven-street' ), $title, 'edit_theme_options', 'fortyseven-street-about', array(
			$this,
			'fortyseven_street_about_theme_page'
		) );
	}
	public function fortyseven_street_about_theme_page() {
		get_template_part( ABSPATH . 'wp-load' );
		get_template_part( ABSPATH . 'wp-admin/admin' );
		get_template_part( ABSPATH . 'wp-admin/admin','header' );

		$bloog_lite      = wp_get_theme();
		if(isset( $_GET['tab'] )){
			$active_tab = sanitize_text_field(wp_unslash($_GET['tab']));
		}else{
			$active_tab = 'getting_started';
		}
		?>

		<div class="wrap fortyseven-street-wrap">

			<div class="top-wrap">
				<div class="text-wrap">
					<h1><?php echo esc_html__( 'Welcome to Fortyseven street! - Version ', 'fortyseven-street' ) . esc_html( $bloog_lite['Version'] ); ?></h1>

					<div
					class="about-text"><?php echo esc_html__( 'Fortyseven street is now installed and ready to use! Get ready to build something beautiful. We hope you enjoy it! We want to make sure you have the best experience using Fortyseven street and that is why we gathered here all the necessary information for you. We hope you will enjoy using Fortyseven street, as much as we enjoy creating great products.', 'fortyseven-street' ); ?></div>
				</div>

				<div class="logo-wrap">
					<a target="_blank" href="<?php echo esc_url('https://8degreethemes.com/wordpress-themes/47street/');?>"><img src="<?php echo esc_url('http://8degreethemes.com/demo/upgrade-fortyseven-street.jpg');?>" alt="<?php esc_html_e('UPGRADE TO 47STREET PRO','fortyseven-street');?>"></a>
				</div>
			</div>

			<div class="bottom-block">
				<ul class="fortyseven-street-tab-wrapper wp-clearfix">
					<li><a href="<?php echo esc_url( admin_url( 'themes.php?page=fortyseven-street-about&tab=getting_started' ) ); ?>"
						class="fortyseven-street-tab <?php echo $active_tab == 'getting_started' ? 'fortyseven-street-tab-active' : ''; ?>"><?php echo esc_html__( 'Getting Started', 'fortyseven-street' ); ?>

					</a></li>
					<li><a href="<?php echo esc_url( admin_url( 'themes.php?page=fortyseven-street-about&tab=recommended_plugins' ) ); ?>"
						class="fortyseven-street-tab <?php echo $active_tab == 'recommended_plugins' ? 'fortyseven-street-tab-active' : ''; ?> "><?php echo esc_html__( 'Recommended Plugins', 'fortyseven-street' ); ?>

					</a></li>
					<li><a href="<?php echo esc_url( admin_url( 'themes.php?page=fortyseven-street-about&tab=demo_import' ) ); ?>"
						class="fortyseven-street-tab <?php echo $active_tab == 'demo_import' ? 'fortyseven-street-tab-active' : ''; ?> "><?php echo esc_html__( 'Import Demo', 'fortyseven-street' ); ?>

					</a></li>
					<li><a href="<?php echo esc_url( admin_url( 'themes.php?page=fortyseven-street-about&tab=support' ) ); ?>"
						class="fortyseven-street-tab <?php echo $active_tab == 'support' ? 'fortyseven-street-tab-active' : ''; ?> "><?php echo esc_html__( 'Support', 'fortyseven-street' ); ?>

					</a></li>
					<li><a href="<?php echo esc_url( admin_url( 'themes.php?page=fortyseven-street-about&tab=changelog' ) ); ?>"
						class="fortyseven-street-tab <?php echo $active_tab == 'changelog' ? 'fortyseven-street-tab-active' : ''; ?> "><?php echo esc_html__( 'Changelog', 'fortyseven-street' ); ?>

					</a></li>
					
					<li><a href="<?php echo esc_url( admin_url( 'themes.php?page=fortyseven-street-about&tab=more_wp' ) ); ?>"
						class="fortyseven-street-tab <?php echo $active_tab == 'more_wp' ? 'fortyseven-street-tab-active' : ''; ?> "><?php echo esc_html__( 'More WordPress Stuff', 'fortyseven-street' ); ?>

					</a></li>
				</ul>
				<div class="fortyseven-street-content-wrapper">
					<?php
					switch ( $active_tab ) {
						case 'getting_started':
						get_template_part('inc/admin-panel/about/step','first');
						break;
						case 'recommended_plugins':
						get_template_part('inc/admin-panel/about/step','second');
						break;
						case 'support':
						get_template_part('inc/admin-panel/about/step','third');
						break;
						case 'changelog':
						get_template_part('inc/admin-panel/about/step','fourth');
						break;
						case 'more_wp':
						get_template_part('inc/admin-panel/about/step','fifth');
						break;
						case 'demo_import':
						get_template_part('inc/admin-panel/about/step','demo');
						break;
						default:
						get_template_part('inc/admin-panel/about/step','first');
						break;
					}
					?>
				</div>
			</div>
		</div><!--/.wrap.about-wrap-->

		<?php
	}

	public function call_plugin_api( $slug ) {
		get_template_part( ABSPATH . 'wp-admin/includes/plugin','install' );

		if ( false === ( $call_api = get_transient( 'fortyseven_street_plugin_information_transient_' . $slug ) ) ) {
			$call_api = plugins_api( 'plugin_information', array(
				'slug'   => $slug,
				'fields' => array(
					'downloaded'        => false,
					'rating'            => false,
					'description'       => false,
					'short_description' => true,
					'donate_link'       => false,
					'tags'              => false,
					'sections'          => true,
					'homepage'          => true,
					'added'             => false,
					'last_updated'      => false,
					'compatibility'     => false,
					'tested'            => false,
					'requires'          => false,
					'downloadlink'      => false,
					'icons'             => true
				)
			) );
			set_transient( 'fortyseven_street_plugin_information_transient_' . $slug, $call_api, 30 * MINUTE_IN_SECONDS );
		}

		return $call_api;
	}

	public function check_active( $slug ) {
		if(is_array($slug)){
			$slug = (isset($slug['slug']))?$slug['slug']:$slug['location'];
		}
		if ( file_exists( ABSPATH . 'wp-content/plugins/' . $slug . '/' . $slug . '.php' ) ) {
			get_template_part( ABSPATH . 'wp-admin/includes/plugin' );
			$needs = is_plugin_active( $slug . '/' . $slug . '.php' ) ? 'deactivate' : 'activate';
			$key = $slug . '/' . $slug . '.php';
			return array( 'status' => is_plugin_active( $slug . '/' . $slug . '.php' ), 'needs' => $needs, 'key'=>$key );
		}
		$all_plugins = get_plugins();
		get_template_part( ABSPATH . 'wp-admin/includes/plugin' );
		// echoes the main file plugin if it's active
		foreach($all_plugins as $key => $plugin) {
			$kerarr = explode('/',$key);
			if($kerarr[0]==$slug){
				if( is_plugin_active($key) ) {
					$needs = is_plugin_active( $key ) ? 'deactivate' : 'activate';
					return array( 'status' => is_plugin_active($key), 'needs' => $needs,'key'=>$key);
				}
			}
		}
		$key = $slug . '/' . $slug . '.php';
		return array( 'status' => false, 'needs' => 'install','key'=>$key );
	}

	public function check_for_icon( $arr ) {
		if ( ! empty( $arr['svg'] ) ) {
			$plugin_icon_url = $arr['svg'];
		} elseif ( ! empty( $arr['2x'] ) ) {
			$plugin_icon_url = $arr['2x'];
		} elseif ( ! empty( $arr['1x'] ) ) {
			$plugin_icon_url = $arr['1x'];
		} else {
			$plugin_icon_url = $arr['default'];
		}

		return $plugin_icon_url;
	}

	public function create_action_link( $state, $slug, $key ) {
		switch ( $state ) {
			case 'install':
			return wp_nonce_url(
				add_query_arg(
					array(
						'action' => 'install-plugin',
						'plugin' => $slug
					),
					network_admin_url( 'update.php' )
				),
				'install-plugin_' . $slug
			);
			break;
			case 'deactivate':
			return add_query_arg( array(
				'action'        => 'deactivate',
				'plugin'        => rawurlencode( $key ),
				'plugin_status' => 'all',
				'paged'         => '1',
				'_wpnonce'      => wp_create_nonce( 'deactivate-plugin_' . $key ),
			), network_admin_url( 'plugins.php' ) );
			break;
			case 'activate':
			return add_query_arg( array(
				'action'        => 'activate',
				'plugin'        => rawurlencode( $key ),
				'plugin_status' => 'all',
				'paged'         => '1',
				'_wpnonce'      => wp_create_nonce( 'activate-plugin_' . $key ),
			), network_admin_url( 'plugins.php' ) );
			break;
		}
	}

	/**
	 * Adds an admin notice upon successful activation.
	 *
	 * @since 1.8.2.4
	 */
	public function fortyseven_street_activation_admin_notice() {
		global $pagenow;

		if ( is_admin() && ( 'themes.php' == $pagenow ) && isset( $_GET['activated'] ) ) {
			add_action( 'admin_notices', array( $this, 'fortyseven_street_welcome_admin_notice' ), 99 );
		}
	}

	/**
	 * Display an admin notice linking to the welcome screen
	 *
	 * @since 1.8.2.4
	 */
	public function fortyseven_street_welcome_admin_notice() {
		?>
		<div class="updated notice is-dismissible">
			<p><?php echo sprintf( // WPCS: XSS OK.
				/* translators: 1: link start, 2: link end. */
				esc_html__( 'Welcome! Thank you for choosing Fortyseven street! To fully take advantage of the best our theme can offer please make sure you visit our %1$swelcome page%2$s.', 'fortyseven-street' ), '<a href="' . esc_url( admin_url( 'themes.php?page=fortyseven-street-about' ) ) . '">', '</a>' ); ?></p>
				<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=fortyseven-street-about' ) ); ?>" class="button"
					style="text-decoration: none;"><?php esc_html_e( 'Get started with Fortyseven street', 'fortyseven-street' ); ?></a></p>
				</div>
				<?php
			}

			public function get_local_dir_path($plugin) {

				$url = wp_nonce_url(admin_url('themes.php??page=fortyseven-street-about&tab=demo_import'),'bloog-file-installation');
				if (false === ($creds = request_filesystem_credentials($url, '', false, false, null) ) ) {
					return; // stop processing here
				}

				if ( ! WP_Filesystem($creds) ) {
					request_filesystem_credentials($url, '', true, false, null);
					return;
				}

				global $wp_filesystem;
				$file = $wp_filesystem->get_contents( $plugin['location'] );

				$file_location = get_template_directory().'/inc/admin-panel/demo/'.$plugin['slug'].'.zip';

				$wp_filesystem->put_contents( $file_location, $file, FS_CHMOD_FILE );

				return $file_location;
			}



			/* ========== Plugin Installation Ajax =========== */
			public function fortyseven_street_plugin_installer_callback(){

				if ( ! current_user_can('install_plugins') )
					wp_die( esc_html__( 'Sorry, you are not allowed to install plugins on this site.', 'fortyseven-street' ) );
				if(isset($_POST["nonce"])){ $nonce = sanitize_text_field(wp_unslash($_POST["nonce"])); }
				if(isset($_POST["plugin"])){ $plugin = sanitize_text_field(wp_unslash($_POST["plugin"])); }
				if(isset($_POST["plugin_file"])){ $plugin_file = sanitize_text_field(wp_unslash($_POST["plugin_file"])); }

				// Check our nonce, if they don't match then bounce!
				if (! wp_verify_nonce( $nonce, 'fortyseven_street_plugin_installer_nonce' ))
					wp_die( esc_html__( 'Error - unable to verify nonce, please try again.', 'fortyseven-street') );


         		// Include required libs for installation
				get_template_part(ABSPATH . 'wp-admin/includes/class-wp','upgrader');
				get_template_part(ABSPATH . 'wp-admin/includes/class-wp','ajax-upgrader-skin');
				get_template_part(ABSPATH . 'wp-admin/includes/class','plugin-upgrader');

				// Get Plugin Info
				$api = $this->fortyseven_street_call_plugin_api($plugin);

				$skin     = new WP_Ajax_Upgrader_Skin();
				$upgrader = new Plugin_Upgrader( $skin );
				$upgrader->install($api->download_link);

				$plugin_file = ABSPATH . 'wp-content/plugins/'.esc_html($plugin).'/'.esc_html($plugin_file);

				if($api->name) {
					$main_plugin_file = $this->get_plugin_file($plugin);
					if($main_plugin_file){
						activate_plugin($main_plugin_file);
						echo "success";
						die();
					}
				}
				echo "fail";

				die();
			}

			/** Plugin Offline Installation Ajax **/
			public function fortyseven_street_plugin_offline_installer_callback() {

				if(isset($_POST["file_location"])){ $file_location = sanitize_text_field(wp_unslash($_POST["file_location"])); }
				if(isset($_POST["file"])){ $file = sanitize_text_field(wp_unslash($_POST["file"])); }
				if(isset($_POST["github"])){ $github = sanitize_text_field(wp_unslash($_POST["github"])); }
				if(isset($_POST["slug"])){ $slug = sanitize_text_field(wp_unslash($_POST["slug"])); }

				$plugin_directory = ABSPATH . 'wp-content/plugins/';

				$zip = new ZipArchive;
				if ($zip->open(esc_html($file_location), ZIPARCHIVE::CREATE) === TRUE) {

					$zip->extractTo($plugin_directory);
					$zip->close();

					if($github) {
						rename(realpath($plugin_directory).'/'.$slug.'-master', realpath($plugin_directory).'/'.$slug);
					}

					activate_plugin($file);
					echo "success";
					die();
				} else {
					echo 'failed';
				}

				die();
			}

			/** Plugin Offline Activation Ajax **/
			public function fortyseven_street_plugin_offline_activation_callback() {

				if(isset($_POST["plugin"])){ $plugin = sanitize_text_field(wp_unslash($_POST["plugin"])); }
				$plugin_file = ABSPATH . 'wp-content/plugins/'.esc_html($plugin).'/'.esc_html($plugin).'.php';

				if(file_exists($plugin_file)) {
					activate_plugin($plugin_file);
				} else {
					echo "Plugin Doesn't Exists";
				}

				die();

			}

			/** Plugin Activation Ajax **/
			public function fortyseven_street_plugin_activation_callback(){

				if ( ! current_user_can('install_plugins') )
					wp_die( esc_html__( 'Sorry, you are not allowed to activate plugins on this site.', 'fortyseven-street' ) );

				if(isset($_POST["nonce"])){ $nonce = sanitize_text_field(wp_unslash($_POST["nonce"])); }
				if(isset($_POST["plugin"])){ $plugin = sanitize_text_field(wp_unslash($_POST["plugin"])); }

				// Check our nonce, if they don't match then bounce!
				if (! wp_verify_nonce( $nonce, 'fortyseven_street_plugin_activate_nonce' ))
					die( esc_html__( 'Error - unable to verify nonce, please try again.', 'fortyseven-street' ) );


	         	// Include required libs for installation
				get_template_part(ABSPATH . 'wp-admin/includes/class-wp','upgrader');
				get_template_part(ABSPATH . 'wp-admin/includes/class-wp','ajax-upgrader-skin');
				get_template_part(ABSPATH . 'wp-admin/includes/class','plugin-upgrader');

				// Get Plugin Info
				$api = $this->fortyseven_street_call_plugin_api(esc_attr($plugin));


				if($api->name){
					$main_plugin_file = $this->get_plugin_file(esc_attr($plugin));
					$status = 'success';
					if($main_plugin_file){
						activate_plugin($main_plugin_file);
						$msg = $api->name .' successfully activated.';
					}
				} else {
					$status = 'failed';
					$msg = esc_html__('There was an error activating $api->name', 'fortyseven-street');
				}

				$json = array(
					'status' => $status,
					'msg' => $msg,
				);

				wp_send_json($json);

			}
		}
		new Fortyseven_street_About_Theme();

		/** Initializing Demo Importer if exists **/
		if(class_exists('Instant_Demo_Importer')) :
			$demoimporter = new Instant_Demo_Importer();

			$demoimporter->demos = array(
				'fortyseven-street' => array(
					'title' => __('Fortyseven street Demo', 'fortyseven-street'),
					'name' => 'fortyseven-street',
					'screenshot' => get_template_directory_uri().'/screenshot.png',
					'home_page' => 'home',
					'menus' => array(
						'Menu 1' => 'menu-1'
					)
				),
			);

		$demoimporter->demo_dir = get_template_directory().'/inc/admin-panel/demo/'; // Path to the directory containing demo files
		$demoimporter->options_replace_url = ''; // Set the url to be replaced with current siteurl
		$demoimporter->option_name = ''; // Set the the name of the option if the theme is based on theme option
	endif;