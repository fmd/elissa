<form action="<?php echo home_url( '/' ); ?>" class="search-form clearfix">
	<fieldset>
		<input type="text" class="search-form-input text" name="s" onfocus="if (this.value == '<?php _e('search','okay'); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('search','okay'); ?>';}" value="<?php _e('search','okay'); ?>"/>
		<input type="submit" value="Go" class="submit" />
	</fieldset>
</form>