
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
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<?php wp_footer(); ?>
    
</body>
</html>