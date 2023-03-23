<?php
/**
 * Displays footer site info
 *
 * @package Automobile Hub
 * @subpackage automobile_hub
 */

?>
<div class="site-info">
	<div class="container">
		<p><?php automobile_hub_credit();?> <?php echo esc_html(get_theme_mod('automobile_hub_footer_text',__('By Themespride','automobile-hub'))); ?></p>
	</div>
</div>