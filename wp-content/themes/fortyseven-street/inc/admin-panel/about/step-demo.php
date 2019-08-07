<div class="feature-section import-demo-data">
	<div class="warning-msg">
		<p><?php echo esc_html__('Please install Recommended Plugins for demo to be imported completely.','fortyseven-street');?></p>
		<p><?php echo esc_html__('And Make sure you download demo in a fresh install.','fortyseven-street');?></p>
		<p><?php echo esc_html__('Your Old Data might be deleted.','fortyseven-street');?></p>
	</div>
	<?php
	wp_enqueue_style( 'plugin-install' );
	wp_enqueue_script( 'plugin-install' );
	wp_enqueue_script( 'updates' );
	
	$fs_Class = new Fortyseven_street_About_Theme;
	$req_plugins = $fs_Class->req_plugins;

	foreach($req_plugins as $slug=>$plugin) :
		if($plugin['bundled'] == false) {
			?>
			<div class="action-tab warning">
				<h3><?php printf( // WPCS: XSS OK.
					/* translators: 1: plugin name. */
					esc_html__("Install : %s Plugin", 'fortyseven-street'), esc_html($plugin['name'])); ?></h3>
				<p><?php echo esc_html__('Please check the plugins folder inside theme and upload the zip of plugins from plugin uploader.','fortyseven-street');?></p>
			</div>
			<?php
		} else {
			$github_repo = isset($plugin['github_repo']) ? $plugin['github_repo'] : false;
			$github = false;

			if($github_repo) {
				$plugin['location'] = $fs_Class->get_local_dir_path($plugin);
				$github = true;
			}

			$status = $fs_Class->check_active($plugin);

			switch($status['needs']) {
				case 'install' :
				$btn_class = 'install-offline button';
				$label = esc_html__('Install and Activate', 'fortyseven-street');
				$link = $plugin['location'];
				break;

				case 'deactivate' :
				$btn_class = 'button';
				$label = esc_html__('Deactivate', 'fortyseven-street');
				$link = admin_url('plugins.php');
				break;

				case 'activate' :
				$btn_class = 'activate-offline button button-primary';
				$label = esc_html__('Activate', 'fortyseven-street');
				$link = $plugin['location'];
				break;
			}
			?>
			<?php if(!class_exists($plugin['class'])) : ?>
				<div class="action-tab warning">
					<h3><?php printf( // WPCS: XSS OK.
					/* translators: 1: plugin name. */
					esc_html__("Install : %s Plugin", 'fortyseven-street'), esc_html($plugin['name'])); ?></h3>
					<p><?php echo esc_html($plugin['info']); ?></p>

					<span class="plugin-card-<?php echo esc_attr($plugin['slug']); ?>" action_button>
						<a class="<?php echo esc_attr($btn_class); ?>" data-github="<?php echo esc_attr($github); ?>" data-file='<?php echo esc_attr($plugin['slug']).'/'.esc_attr($plugin['filename']); ?>' data-slug="<?php echo esc_attr($plugin['slug']); ?>" href="<?php echo esc_html($link); ?>"><?php echo esc_html($label); ?></a>
					</span>
				</div>
			<?php endif; ?>
			<?php
		}

	endforeach;
	?>

	<?php do_action('instant_demo_importer'); ?>
</div>