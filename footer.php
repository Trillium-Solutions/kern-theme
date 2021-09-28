<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * 
 */

?>
	
			<footer class="footer" role="contentinfo">

				<div id="inner-footer" class="container">
					<div class="row">
						<nav role="navigation" class="col-sm-7">
							<?php wp_nav_menu( array (
								'theme_location' => 'footer-left',
							) ); ?>

								<?php wp_nav_menu( array (
								'theme_location' => 'footer-right',
							) ); ?>
						</nav>

						<div id="footer-copyright" class=" col-sm-4 source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>
							<div id="footer-attributions">
								<a href="<?php echo get_site_url(); ?>/attributions">Site Credits</a>
							</div>
						</div>

					</div><!-- class="row" -->
				</div>

			</footer>

		</div>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>
		<script type="text/javascript">
			function googleTranslateElementInit() {
				new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
			}
		</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
	</body>

</html> <!-- end of site. what a ride! -->
