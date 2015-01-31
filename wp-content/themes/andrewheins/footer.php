
	<footer class="page-footer">
		<div class="row" >
			<div class="inner">
				<div class="mod text-block">
					<?php echo( apply_filters('the_content', get_field( 'footer_content', 'option' ) ) ); ?>
				</div>
			</div>
		</div>
	</footer>

</div>


	<script src="<?php cl_asset_path(); ?>/js/lib/underscore.js"></script>
	<script src="<?php cl_asset_path(); ?>/js/lib/backbone.js"></script>
	<script src="<?php cl_asset_path(); ?>/js/lib/fitvids.js"></script>
	<?php wp_footer(); ?>
    
</body>
</html>