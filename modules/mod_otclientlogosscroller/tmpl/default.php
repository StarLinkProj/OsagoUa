
<?php
/**
 * @package 	OT Client Logos Scroller Module for Joomla! 3.3
 * @version 	$Id: default.php - Aug 2014 00:00:00Z OmegaTheme
 * @author 		OmegaTheme Extensions (services@omegatheme.com) - http://omegatheme.com
 * @copyright	Copyright(C) 2014 - OmegaTheme Extensions
 * @license 	http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
**/
// no direct access
defined('_JEXEC') or die( 'Restricted access' );
?>
<?php if($ot_display == 'slider') : ?>
<script src="<?php echo JUri::root(); ?>modules/mod_otclientlogosscroller/assets/js/jquery.carousel.js" type="text/javascript"></script>
<style type="text/css">
	.the-carousel img .ot_image {
    width:<?php echo $ot_width_img; ?>px;
	height:<?php echo $ot_height_img; ?>px;
	}
	.the-carousel .ot_content {
	width:<?php echo $ot_width_img; ?>px;
	height:<?php echo $ot_height_img; ?>px;
	float:left;
	margin: 2px;
	}
</style>
<?php if($ot_opacity2 == 1) : ?>
<style type="text/css">
 .the-carousel  img {
 opacity: 0.6;
 filter: alpha(opacity=40);
 }
 .the-carousel  img:hover {
    filter: none;
    opacity: 1;
}

</style>
<?php endif; ?>
<?php endif; ?>
<?php if($ot_display =='grid') : ?>
<?php if($ot_opacity == 1) : ?>
<style type="text/css">
.ot_row img {
    opacity: 0.6;
    filter: alpha(opacity=40);
}
.ot_row img:hover {
    filter: none;
    opacity: 1;
}
</style>
<?php endif; ?>
<?php endif; ?>

  
<?php if($ot_display == 'slider') : ?>
    <div class="ot_logo_scroller" id="ot_logo_scroller_<?php echo $module->id; ?>">
        <div class="the-carousel">
            <?php foreach ($lists as $list) : ?>           
                <?php if(isset($list->avatar) && $list->avatar !='') : ?> 
					<?php if(isset($list->website) && $list->website !='') : ?>
                        <div class="ot_content"><a  target="_blank" href="<?php echo 'http://' . $list->website;  ?>"  ><img class="ot_image" src="<?php echo $list->avatar; ?>" /></a></div>
                    <?php else : ?>
                        <div class="ot_content"><img "ot_image"   src="<?php echo $list->avatar; ?>" /></div>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <?php if($ot_pn == 1) : ?>
            <a class="the-prev" href="#"></a>
            <a class="the-next" href="#"></a>
        <?php endif; ?>
        <?php if($ot_pager ==1) : ?>
        <div class="the-pager"></div>
        <?php endif; ?>
		<?php /* REMOVING Copyright warning 
		The Joomla module: OT Client Logos Scroller is free for all websites. We're welcome any developer want to contributes the module. But you must keep our credits that is the very tiny image under the module. If you want to remove it, you may visit http://www.omegatheme.com/member/signup/additional to purchase the Removing copyrights, then you can free your self to remove it. Thank you very much. Omegatheme.com
		*/?>
		<a href="http://wwww.omegatheme.com" class="omega-powered" title="Powered by Omegatheme.com">
		<img src="<?php JURI::base()?>modules/mod_otclientlogosscroller/assets/images/powered_icon.png" alt="Joomla Module OT Client Logos Scroller powered by OmegaTheme.com">
		</a>
		<?php /*********/ ?>
    </div>
<?php elseif($ot_display =='grid') : ?>
    <div class="ot_logo_scroller_wrapper" id="ot_logo_scroller_<?php echo $module->id; ?>">
        <div class="ot_row">
            <?php foreach ($lists as $list) : ?>
            <div class="col-ot-<?php echo $ot_number; ?>" data-toggle="tooltip"  data-original-title="<?php echo $list->title; ?>">
                <?php if(isset($list->avatar) && $list->avatar !='') : ?>        
                    <?php if(isset($list->website) && $list->website !='') : ?>
                        <a target="_blank" href="<?php echo 'http://' . $list->website; ?>"  data-toggle="tooltip"  data-original-title="<?php echo $list->title; ?>"><img src="<?php echo $list->avatar; ?>" /></a>
                    <?php else : ?>
                        <img src="<?php echo $list->avatar; ?>"  />
                    <?php endif; ?>
                <?php endif; ?>
            </div> 
            <?php endforeach; ?>
        </div>
		<?php /* REMOVING Copyright warning 
		The Joomla module: OT Client Logos Scroller is free for all websites. We're welcome any developer want to contributes the module. But you must keep our credits that is the very tiny image under the module. If you want to remove it, you may visit http://www.omegatheme.com/member/signup/additional to purchase the Removing copyrights, then you can free your self to remove it. Thank you very much. Omegatheme.com
		*/?>
		<a href="http://wwww.omegatheme.com" class="omega-powered" title="Powered by Omegatheme.com">
		<img src="<?php JURI::base()?>modules/mod_otclientlogosscroller/assets/images/powered_icon.png" alt="Joomla Module OT Client Logos Scroller powered by OmegaTheme.com">
		</a>
		<?php /*********/ ?>
        </div>
<?php endif; ?>

<div style="clear: both"></div>
<?php if($ot_display =='grid') : ?>
<?php if ($ot_tooltip == 1) : ?>
<script type="text/javascript">
jQuery(function ($){
    $(".ot_row .col-ot-<?php echo $ot_number; ?>").tooltip({
        placement : 'top'
    });
});
</script>
<?php endif; ?>
<?php endif; ?>
<?php if($ot_display == 'slider') : ?>
<script type="text/javascript">
jQuery(document).ready(function ($){

        $('#ot_logo_scroller_<?php echo $module->id; ?> .the-carousel').carouFredSel({
            width: '<?php echo $ot_width; ?>%',
            items: <?php echo $ot_item; ?>,
            scroll: 1,
            auto: {
                duration:<?php echo $ot_duration; ?>,
                timeoutDuration:<?php echo $ot_toduration; ?>
            },
            prev: '.the-prev',
            next: '.the-next'
    <?php if($ot_pager ==1) : ?>  ,
            pagination: '.the-pager'
    <?php endif; ?>
        });

    });
</script>
<?php endif; ?>