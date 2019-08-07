<?php
/**
 * Changelog
 */

$bloog_lite = wp_get_theme( 'fortyseven-street' );
?>
<div class="featured-section changelog">
<?php
	WP_Filesystem();
	global $wp_filesystem;
	$fortyseven_street_changelog       = $wp_filesystem->get_contents( get_template_directory() . '/readme.txt' );
	$changelog_start = strpos($fortyseven_street_changelog,'== Changelog ==');
	$fortyseven_street_changelog_before = substr($fortyseven_street_changelog,0,($changelog_start+15));
	$fortyseven_street_changelog = str_replace($fortyseven_street_changelog_before,'',$fortyseven_street_changelog);
	$fortyseven_street_changelog = str_replace('**','<br/>**',$fortyseven_street_changelog);
	$fortyseven_street_changelog = str_replace('= 1.0','<br/><br/>= 1.0',$fortyseven_street_changelog);
	echo wp_kses($fortyseven_street_changelog,array('br'=>array()));
	echo '<hr />';
	?>
</div>