<?php
function mpc_create_menu() {
	$mpcAdminMenu = add_options_page('Marketpress Carousel', 'MP Carousel', 'manage_options', 'marketpress-carousel-settings', 'mpc_settings_page',plugins_url('/images/simple-dropbox-icon.png', __FILE__),66);
	
	add_action('admin_print_styles-' . $mpcAdminMenu, 'mpcAdmin_add_style');
	add_action('admin_print_scripts-' . $mpcAdminMenu, 'mpcAdmin_add_script');
}
add_action('admin_menu', 'mpc_create_menu');

function mpc_settings_page(){
		global $mpc_options;
	?>

<div class="wrap">
  <div id="mpc-header">
    <div id="mpc-title">
      <h2>
        <?php _e('Marketpress Carousel','cdsinc_carousel');?>
      </h2>
    </div>
    <div id="mpc-sub-title">
      <p>
        <?php _e('This plugin will create a carousel product display.','cdsinc_carousel');?>
      </p>
    </div>
  </div>
  <div id="poststuff" class="metabox-holder has-right-sidebar"> 
    <!-- BEGIN SIDEBAR -->
    <div id="side-info-column" class="inner-sidebar">
      <div class="meta-box-sortables">
        <div id="about" class="postbox">
          <h3 class="hndle" id="about-sidebar">Account Information</h3>
          <div class="inside">
            <p>
            <li><strong>User:</strong> Something here</li>
            <li><a href="https://www.dropbox.com/home" target="_blank">Dropbox</a></li>
            </p>
          </div>
        </div>
      </div>
      <div class="meta-box-sortables">
        <div id="about" class="postbox">
          <h3 class="hndle" id="about-sidebar">Get In Touch!</h3>
          <div class="inside">
            <p> <a href="http://www.facebook.com/creativedesignsolutionsinc" target="_blank"><img src="<?php echo MPC_BASE_URL.'/images/facebook.png'; ?> "></a>&nbsp; <a href="http://www.twitter.com/intent/user?screen_name=cdsincdesign" target="_blank"><img src="<?php echo MPC_BASE_URL.'/images/twitter.png'; ?>"></a>&nbsp; <a href="http://www.pinterest.com/hiphopsmurf" target="_blank"><img src="<?php echo MPC_BASE_URL.'/images/pinterest.png';?>"></a>&nbsp; 
              <!--a href="http://www.cdsincdesign.com/blog" target="_blank"><img src="<?php echo MPC_BASE_URL.'/images/wordpress.png';?>"></a>&nbsp;
                    <a href="http://www.cdsincdesign.com/feed" target="_blank"><img src="<?php echo MPC_BASE_URL.'/images/rss.png';?>"></a>&nbsp;
                    <a href="http://www.cdsincdesign.com/contact" target="_blank"><img src="<?php echo MPC_BASE_URL.'/images/email.png';?>"></a--> 
            </p>
          </div>
        </div>
      </div>
      <div class="meta-box-sortables">
        <div id="about" class="postbox">
          <h3 class="hndle" id="about-sidebar">Keep This Plugin Free!</h3>
          <div class="inside">
            <p>
            <form method="POST" enctype="multipart/form-data" action="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=N56JT9B8VVAJN&currency_code=USD&item_name=Plugin Donation - Thank You!" target="_blank">
              <table border="0" cellpadding="5">
                <tr>
                  <td width="20%" align="center"><input type="radio" name="amount" value="5" checked>
                    <br>
                    $5</td>
                  <td width="20%" align="center"><input type="radio" name="amount" value="10">
                    <br>
                    $10</td>
                  <td width="20%" align="center"><input type="radio" name="amount" value="25">
                    <br>
                    $25</td>
                  <td width="20%" align="center"><input type="radio" name="amount" value="50">
                    <br>
                    $50</td>
                  <td width="20%" align="center"><input type="radio" name="amount" value="">
                    <br>
                    Other<br></td>
                </tr>
              </table>
              <input type="image" name="side-donate" value="Donate With PayPal!" src="https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif" />
            </form>
            </p>
          </div>
        </div>
      </div>
      <div class="meta-box-sortables">
        <div id="about" class="postbox">
          <h3 class="hndle" id="about-sidebar">Tell The World!</h3>
          <div class="inside">
            <p><b>Like This Plugin? Please Share!</b></p>
            <p>
            <table border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td style="padding-top:4px;"><div class="fb-like" data-href="http://cdsincdesign.com/about/plugins/simple-dropbox-upload-form/" data-send="false" data-layout="button_count" data-show-faces="false"></div></td>
                <td style="padding-top:4px;"><a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.cdsincdesign.com/about/plugins/simple-dropbox-upload-form" data-text="Simple Dropbox Uploader for WordPress:" data-via="hipHOPsMuRf">Tweet</a> 
                  <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></td>
                <td id="gplus" style="padding-top:4px;"><!-- Place this tag where you want the +1 button to render. -->
                  
                  <div class="g-plusone" data-size="medium" data-href="http://cdsincdesign.com/about/plugins/simple-dropbox-upload-form/"></div>
                  
                  <!-- Place this tag after the last +1 button tag. --> 
                  <script type="text/javascript">
                      (function() {
                        var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                        po.src = 'https://apis.google.com/js/plusone.js';
                        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                      })();
                    </script> 
                  <!-- Place this tag where you want the +1 button to render. -->
                  
                  <div class="g-plusone" data-size="medium" data-annotation="none"></div>
                  
                  <!-- Place this tag after the last +1 button tag. --> 
                  <script type="text/javascript">
					  (function() {
						var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
						po.src = 'https://apis.google.com/js/plusone.js';
						var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
					  })();
					</script></td>
                <td id="pinterest" style="padding-top:4px;"><a href="http://pinterest.com/pin/create/button/?url=http://www.cdsincdesign.com/about/plugins/simple-dropbox-upload-form&media=http://www.cdsincdesign.com/socialimg/simple-dropbox.png&description=WordPress%20plugin%20to%20allow%20users%20to%20upload%20files%20to%20specific%20folders%20on%20your%20Dropbox%20account%20using%20a%20simple%20shortcode%21" class="pin-it-button" count-layout="none"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a> 
                  <script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script></td>
              </tr>
            </table>
            </p>
          </div>
        </div>
      </div>
    </div>
    <!-- END SIDE-INFO-COLUMN --> 
    <!-- END SIDEBAR --> 
    
    <!-- BEGIN CONTENT AREA -->
    <div id="post-body" class="has-sidebar">
      <div id="post-body-content" class="has-sidebar-content">
        <div id="normal-sortables" class="meta-box-sortables">
          <div id="about" class="postbox">
		  <h3 class="hndle"><?php _e('Carousel Settings', 'cdsinc_carousel'); ?></h3>
            <div class="inside"> <br class="clear" />
              <!--center-->
              
              <form method="post" action="options.php">
                <?php settings_fields('mpc_settings_group'); ?>
                <!--table class="form-table">
                  <tbody>
                    <tr valign="top">
                      <th scope="row" valign="top"> <?php _e('Test Mode', 'cdsinc_carousel'); ?>
                      </th>
                      <td><input id="mpc_settings[test_mode]" name="mpc_settings[test_mode]" type="checkbox" value="1" <?php checked(1, $mpc_options['test_mode']); ?> />
                        <label class="description" for="mpc_settings[test_mode]">
                          <?php _e('Check this to use the plugin in test mode.', 'cdsinc_carousel'); ?>
                        </label></td>
                    </tr>
                  </tbody>
                </table-->
                
                <table class="form-table">
                  <tbody>
                    <tr valign="top">
                      <th scope="row" valign="top"> <?php _e('Featured Title', 'cdsinc_carousel'); ?>
                      </th>
                      <td><input id="mpc_settings[hover_title]" name="mpc_settings[hover_title]" type="text" class="regular-text" value="<?php echo $mpc_options['hover_title']; ?>"/>
                        <label class="description" for="mpc_settings[hover_title]">
                          <?php _e('Shown when visitor mouses over image.', 'cdsinc_carousel'); ?>
                        </label></td>
                    </tr>
                    <tr valign="top">
                      <th scope="row"><p>
                          <?php _e('Background Color.',simpleDbUpload);?>
                        </p></th>
                      <td><input type="text" name="mpc_settings[mpc_color]" id="mpc-color" value="<?php echo $mpc_options['mpc_color']; ?>" />
                        <a href="#" class="pickcolor hide-if-no-js" id="mpc-color-example"></a>
                        <input type="button" class="pickcolor button hide-if-no-js" value="<?php esc_attr_e( 'Select a Color', 'twentyeleven' ); ?>" />
                        <div id="colorPickerDiv" style="z-index: 100; background:#eee; border:1px solid #ccc; position:absolute; display:none;"></div>
                        <br />
                        <span><?php printf( __( 'Default color: %s', 'twentyeleven' ), '<span id="default-color">#FFFFFF</span>' ); ?></span></td>
                    </tr>
					<tr valign="top">
                      <th scope="row" valign="top"> <?php _e('Carousel Width', 'cdsinc_carousel'); ?>
                      </th>
                      <td><input id="mpc_settings[mpc_carousel_width]" name="mpc_settings[mpc_carousel_width]" type="text" class="regular-text" value="<?php echo $mpc_options['mpc_carousel_width']; ?>"/>
                        <label class="description" for="mpc_settings[mpc_carousel_width]">
                          <?php _e('px', 'cdsinc_carousel'); ?>
                        </label></td>
                    </tr>
                    <tr valign="top">
                      <th scope="row" valign="top"> <?php _e('Carousel Height', 'cdsinc_carousel'); ?>
                      </th>
                      <td><input id="mpc_settings[mpc_carousel_height]" name="mpc_settings[mpc_carousel_height]" type="text" class="regular-text" value="<?php echo $mpc_options['mpc_carousel_height']; ?>"/>
                        <label class="description" for="mpc_settings[mpc_carousel_height]">
                          <?php _e('px', 'cdsinc_carousel'); ?>
                        </label></td>
                    </tr>
                    <tr valign="top">
                      <th scope="row" valign="top"> <?php _e('Thumbnail Width', 'cdsinc_carousel'); ?>
                      </th>
                      <td><input id="mpc_settings[mpc_image_width]" name="mpc_settings[mpc_image_width]" type="text" class="regular-text" value="<?php echo $mpc_options['mpc_image_width']; ?>"/>
                        <label class="description" for="mpc_settings[mpc_image_width]">
                          <?php _e('px', 'cdsinc_carousel'); ?>
                        </label></td>
                    </tr>
                    <tr valign="top">
                      <th scope="row" valign="top"> <?php _e('Thumbnail Height', 'cdsinc_carousel'); ?>
                      </th>
                      <td><input id="mpc_settings[mpc_image_height]" name="mpc_settings[mpc_image_height]" type="text" class="regular-text" value="<?php echo $mpc_options['mpc_image_height']; ?>"/>
                        <label class="description" for="mpc_settings[mpc_image_height]">
                          <?php _e('px', 'cdsinc_carousel'); ?>
                        </label></td>
                    </tr>
                    <tr valign="top">
                      <th scope="row" valign="top"> <?php _e('Number of Products', 'cdsinc_carousel'); ?>
                      </th>
                      <td><!--input id="mpc_settings[mpc_num_prod]" name="mpc_settings[mpc_num_prod]" class="regular-text" type="text" value="<?php echo $mpc_options['mpc_num_prod']; ?>"/-->
					  <select id="mpc_settings[mpc_num_prod]" name="mpc_settings[mpc_num_prod]">
					  <?php
					  for($i=1;$i <= 30; $i++):
						$selBuild = '<option value="'.$i.'"';
						if ($mpc_options['mpc_num_prod'] == $i)$selBuild .= ' selected="selected"';
						$selBuild .= '>'.$i.'</option>';
						echo $selBuild;
					  endfor;
					  ?>
					  </select>
                        <label class="description" for="mpc_settings[mpc_num_prod]">
                          <?php _e('Total images to load', 'cdsinc_carousel'); ?>
                        </label></td>
                    </tr>
                    <tr valign="top">
                      <th scope="row" valign="top"> <?php _e('Number to Display', 'cdsinc_carousel'); ?>
                      </th>
                      <td><select id="mpc_settings[mpc_num_load]" name="mpc_settings[mpc_num_load]">
					  <?php
					  $numLoad = array('1','3','5');
					  for($i=0;$i < count($numLoad); $i++):
						$selBuild = '<option value="'.$numLoad[$i].'"';
						if ($mpc_options['mpc_num_load'] == $numLoad[$i])$selBuild .= ' selected="selected"';
						$selBuild .= '>'.$numLoad[$i].'</option>';
						echo $selBuild;
					  endfor;
					  ?>
					  </select>
                        <label class="description" for="mpc_settings[mpc_num_load]">
                          <?php _e('Total images viewable at once', 'cdsinc_carousel'); ?>
                        </label></td>
                    </tr>
                    <tr valign="top">
                      <th scope="row" valign="top"> <?php _e('Show Title', 'cdsinc_carousel'); ?>
                      </th>
                      <td><input id="mpc_settings[show_title]" name="mpc_settings[show_title]" type="checkbox" value="1" <?php checked(1, $mpc_options['show_title']); ?> />
                        <label class="description" for="mpc_settings[show_title]">
                          <?php _e('Check this to show titles above items.', 'cdsinc_carousel'); ?>
                        </label></td>
                    </tr>
                    <tr valign="top">
                      <th scope="row" valign="top"> <?php _e('Show Price', 'cdsinc_carousel'); ?>
                      </th>
                      <td><input id="mpc_settings[show_price]" name="mpc_settings[show_price]" type="checkbox" value="1" <?php checked(1, $mpc_options['show_price']); ?> />
                        <label class="description" for="mpc_settings[show_price]">
                          <?php _e('Check this to show prices below items.', 'cdsinc_carousel'); ?>
                        </label></td>
                    </tr>
                    <tr valign="top">
                      <th scope="row" valign="top"> <?php _e('Show Buy Button', 'cdsinc_carousel'); ?>
                      </th>
                      <td><input id="mpc_settings[buy_button]" name="mpc_settings[buy_button]" type="checkbox" value="1" <?php checked(1, $mpc_options['buy_button']); ?> />
                        <label class="description" for="mpc_settings[buy_button]">
                          <?php _e('Check this to show buy button below items.', 'cdsinc_carousel'); ?>
                        </label></td>
                    </tr>
                  </tbody>
                </table>
                <!--table class="form-table">
                  <tbody>
                    <tr valign="top">
                      <th scope="row" valign="top"> <?php _e('Allow Recurring', 'cdsinc_carousel'); ?>
                      </th>
                      <td><input id="mpc_settings[recurring]" name="mpc_settings[recurring]" type="checkbox" value="1" <?php checked(1, $mpc_options['recurring']); ?> />
                        <label class="description" for="mpc_settings[recurring]">
                          <?php _e('Check this to allow users to setup recurring payments.', 'cdsinc_carousel'); ?>
                        </label></td>
                    </tr>
                  </tbody>
                </table-->
                <p class="submit">
                  <input type="submit" class="button-primary" value="<?php _e('Save Options', 'mfwp_domain'); ?>" />
                </p>
              </form>
              <!--/center--> 
              <br class="clear" />
            </div>
            <!-- END INSIDE --> 
          </div>
          <!-- END ABOUT --> 
        </div>
        <!-- END NORMAL-SORTABLES --> 
      </div>
      <!-- END POST-BODY-CONTENT--> 
    </div>
    <!-- END POST-BODY --> 
  </div>
  <!-- END POSTSTUFF --> 
</div>
<!-- END WRAP -->
<?php
}

function mpc_register_settings() {
	// creates our settings in the options table
	register_setting('mpc_settings_group', 'mpc_settings');
}
add_action('admin_init', 'mpc_register_settings');
?>
