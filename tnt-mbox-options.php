<?php

$save_text = __("Save");

  if( isset($_POST['Submit']) ) :
	    //Get defaults
	    $mbox_options = get_option('tnt_mbox_options');
	    //Form data sent
		$mbox_options['tnt_mbox_js_url']	=	$_POST['tnt_mbox_js_url'];
	    update_option('tnt_mbox_options', $mbox_options);
  		echo '<div id="message" class="updated"><p><strong>Options saved.</strong></p></div>';
  else :
    //Normal page display
    $mbox_options = get_option('tnt_mbox_options');
    
    //set defaults if this is the first visit
    if ($mbox_options===FALSE) :
		add_option('tnt_mbox_options');
	endif;
		
  endif;

?>

<div class="wrap">
	<?php screen_icon('options-general'); ?>
	<h2>Test&Target MBox Shortcode Options</h2>
	<form name="tnt_mbox_admin_form" method="post" action="<?php $_SERVER['REQUEST_URI']; ?>">
		<table class="form-table">
			
			<tr valign="top">
				<td><p>Include the following mbox.js URL in my &lt;head&gt; tag. (Leave this empty if you have already added the URL to your theme.)</p>
					<input id="mboxjs-upload" type="text" name="tnt_mbox_js_url" value="<?php echo $mbox_options['tnt_mbox_js_url']; ?>" >
					<div class="submit"><input type="submit" class="button-primary" name="Submit" value="<?php echo $save_text; ?>"></div>
				</td>
				<td>
					<div class="hide-if-no-js wp-media-buttons" id="wp-content-media-buttons">
					<p>You can also upload your file using this link. Once you have uploaded, copy and paste the URL for your file in the field to your left. You can find the uploaded URL by clicking "File URL" in the Link URL section of the file properties.</p><a onclick="return false;" title="Add Media" id="content-add_media" class="thickbox add_media" href="media-upload.php?TB_iframe=1&amp;width=640&amp;height=497">Upload/Insert <img width="15" height="15" src="http://sandbox/wp-admin/images/media-button.png?ver=20111005"></a></div>
				</td>
			</tr>
							
		</table>
	</form>  

	<h3>Usage</h3>
	<p>[mbox name="myMbox"]My Test Content[/mbox]</p>
	<p>Where "myMbox" is the name of your mbox and "My Test Content" is the content you are testing using Adobe Test&Target.</p>
	<p>For best results, do not leave a space or line break after the first tag or after the last, even if wrapping multiple paragraphs. Doing so will likely cause extra line breaks or paragraphs to appear on the page.<br>
	(Note: this is an issue with the way WordPress handles shortcodes, not with this plugin)</p>
	<p><strong>**Good Example:**</strong></p>
	<p>[mbox name="myMbox"]Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
	<p>Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper.[/mbox]</p>
	<p><strong>**Bad Example:**</strong></p>
	<p>[mbox name="myMbox"]</p>
	<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
	<p>Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper.</p>
	<p>[/mbox]</p>
</div> 