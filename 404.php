<?php
/**
 *  404 template (not found)
 *
 * @package nidavellir
 */

get_header();
?>
<section class="error-404 not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'nidavellir' ); ?></h1>
	</header>

	<div class="page-content">
		<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'nidavellir' ); ?></p>
		<?php
			get_search_form();
		?>
	</div>
</section>
<?php
get_footer();
