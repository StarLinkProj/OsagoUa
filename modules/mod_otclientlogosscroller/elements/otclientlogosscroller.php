<?php
/**
 * @package 	OT Client Logos Scroller Module for Joomla! 3.3
 * @version 	$Id: otclientlogosscroller.php - Aug 2014 00:00:00Z OmegaTheme
 * @author 		OmegaTheme Extensions (services@omegatheme.com) - http://omegatheme.com
 * @copyright	Copyright(C) 2014 - OmegaTheme Extensions
 * @license 	http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
**/
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.html.html');
jimport('joomla.form.formfield');

class JFormFieldOtclientlogosscroller extends JFormField
{
  protected $type = 'Otclientlogosscroller';

  protected function getInput()
  {
    // Initialize variables.
      JFactory::getDocument()->addStyleSheet(JURI::root().'modules/mod_otclientlogosscroller/assets/css/mod_otclientlogosscroller.css');

      JHtml::_('behavior.framework');
      JHtml::_('behavior.modal');


      $html = array();

      $class = !empty($this->class) ? ' class="' . $this->class . '"' : '';
      $disabled = $this->disabled ? ' disabled' : '';

      // Initialize JavaScript field attributes.
      $onchange = $this->onchange ? ' onchange="' . $this->onchange . '"' : '';

      $html[] = '
        <div class="tabs">'.$this->getTabsInput().'</div>
        <div id="tabs-template" class="hidden">'.$this->getTabsInput(true).'</div>
        <div class="clearfix"></div>
        <a class="tabAdd btn button btn-success" href="#"><span class="icon-plus"></span> </a>
        ';

      JFactory::getDocument()->addScriptDeclaration($this->getScript());
      return implode($html);
  }

  protected function getTabsInput($is_template = false)
  {
    $html = array();
    if ($is_template){
      $html[] = '
        <div class="tab">
          <div class="col">
          <label class="hasTooltip" title="'.JHtml::tooltipText('MOD_OTSCROLLER_FIELD_AVATAR_DESC').'">'.JText::_('MOD_OTSCROLLER_FIELD_AVATAR_LABEL').'</label>
          '.$this->getInputMedia($this->name.'[REPLACE][avatar]', $this->id .'_REPLACE_avatar','').'
          </div>          
          <div class="col">
          <label class="hasTooltip" title="'.JHtml::tooltipText('MOD_OTSCROLLER_FIELD_WEBSITE_DESC').'">'.JText::_('MOD_OTSCROLLER_FIELD_WEBSITE_LABEL').'</label>
          '.$this->getInputText($this->name.'[REPLACE][website]', $this->id.'_REPLACE_website', '').'
          </div>
          <div class="col">
          <label class="hasTooltip" title="'.JHtml::tooltipText('MOD_OTSCROLLER_FIELD_TITLE_DESC').'">'.JText::_('MOD_OTSCROLLER_FIELD_TITLE_LABEL').'</label>
          '.$this->getInputText($this->name.'[REPLACE][title]', $this->id.'_REPLACE_title', '').'
          </div>
          <div class="clearfix"></div>
          <a class="tabRemove btn btn-small" href="#"><span class="icon-cancel"></span> </a>
        </div>
        <div class="clearfix"></div>
      ';
    } else {
      if (!empty($this->value)){
        for ($i = 0; $i < count($this->value); $i++){
          if (!empty($this->value[$i]['avatar']))
          $html[] = '
        <div class="tab">          
          <div class="col">
          <label class="hasTooltip" title="'.JHtml::tooltipText('MOD_OTSCROLLER_FIELD_AVATAR_DESC').'">'.JText::_('MOD_OTSCROLLER_FIELD_AVATAR_LABEL').'</label>
          '.$this->getInputMedia($this->name.'['.$i.'][avatar]', $this->id .'_'.$i.'_avatar', $this->value[$i]['avatar']).'
          </div>         
          <div class="col">
          <label class="hasTooltip" title="'.JHtml::tooltipText('MOD_OTSCROLLER_FIELD_WEBSITE_DESC').'">'.JText::_('MOD_OTSCROLLER_FIELD_WEBSITE_LABEL').'</label>
          '.$this->getInputText($this->name.'['.$i.'][website]', $this->id. '_'.$i.'_website', $this->value[$i]['website']).'
          </div>
          <div class="col">
          <label class="hasTooltip" title="'.JHtml::tooltipText('MOD_OTSCROLLER_FIELD_TITLE_DESC').'">'.JText::_('MOD_OTSCROLLER_FIELD_TITLE_LABEL').'</label>
          '.$this->getInputText($this->name.'['.$i.'][title]', $this->id. '_'.$i.'_title', $this->value[$i]['title']).'
          </div>
          <a class="tabRemove btn btn-small" href="#"><span class="icon-cancel"></span> </a>
        </div>
        <div class="clearfix"></div>
          ';
        }
      }
      else {
        $html[] = '
        <div class="tab">
          <div class="col">
          <label class="hasTooltip" title="'.JHtml::tooltipText('MOD_OTSCROLLER_FIELD_AVATAR_DESC').'">'.JText::_('MOD_OTSCROLLER_FIELD_AVATAR_LABEL').'</label>
          '.$this->getInputMedia($this->name.'[0][avatar]', $this->id.'_0_avatar', '').'
          </div>          
          <div class="col">
          <label class="hasTooltip" title="'.JHtml::tooltipText('MOD_OTSCROLLER_FIELD_WEBSITE_DESC').'">'.JText::_('MOD_OTSCROLLER_FIELD_WEBSITE_LABEL').'</label>
          '.$this->getInputText($this->name.'[0][website]', $this->id.'_0_website', '').'
          </div> 
          <div class="col">
          <label class="hasTooltip" title="'.JHtml::tooltipText('MOD_OTSCROLLER_FIELD_TITLE_DESC').'">'.JText::_('MOD_OTSCROLLER_FIELD_TITLE_LABEL').'</label>
          '.$this->getInputText($this->name.'[0][title]', $this->id.'_0_title', '').'
          </div>  
          <a class="tabRemove btn btn-small" href="#"><span class="icon-cancel"></span> </a>
        </div>
        <div class="clearfix"></div>
        ';
      }
    }
    return implode($html);
  }


  protected function getInputText($name, $id, $value = '')
  {
    return '<input type="text" value="'.htmlspecialchars($value, ENT_COMPAT, 'UTF-8').'" id="'.$id.'" name="'.$name.'" class="" aria-required="true" />';
  }

  protected function getInputMedia($name, $id, $value = '')
  {

    $html = array();
    $html[] = '<div class="input-prepend input-append">';

    // The Preview.
		$showPreview = true;
		$showAsTooltip = true;
    $options = array(
      'onShow' => 'jMediaRefreshPreviewTip',
    );
    JHtml::_('behavior.tooltip', '.hasTipPreview', $options);

    if ($showPreview)
		{
			if ($value && file_exists(JPATH_ROOT . '/' . $value))
			{
				$src = JUri::root() . $value;
			}
			else
			{
				$src = '';
			}

			$width = 300;
			$height = 200;
			$style = '';
			$style .= ($width > 0) ? 'max-width:' . $width . 'px;' : '';
			$style .= ($height > 0) ? 'max-height:' . $height . 'px;' : '';

			$imgattr = array(
				'id' => $id . '_preview',
				'class' => 'media-preview',
				'style' => $style,
			);

			$img = JHtml::image($src, JText::_('JLIB_FORM_MEDIA_PREVIEW_ALT'), $imgattr);
			$previewImg = '<div id="' . $id . '_preview_img"' . ($src ? '' : ' style="display:none"') . '>' . $img . '</div>';
			$previewImgEmpty = '<div id="' . $id . '_preview_empty"' . ($src ? ' style="display:none"' : '') . '>'
				. JText::_('JLIB_FORM_MEDIA_PREVIEW_EMPTY') . '</div>';

			if ($showAsTooltip)
			{
				$html[] = '<div class="media-preview add-on">';
				$tooltip = $previewImgEmpty . $previewImg;
				$options = array(
					'title' => JText::_('JLIB_FORM_MEDIA_PREVIEW_SELECTED_IMAGE'),
					'text' => '<i class="icon-eye"></i>',
					'class' => 'hasTipPreview'
				);

				$html[] = JHtml::tooltip($tooltip, $options);
				$html[] = '</div>';
			}
			else
			{
				$html[] = '<div class="media-preview add-on" style="height:auto">';
				$html[] = ' ' . $previewImgEmpty;
				$html[] = ' ' . $previewImg;
				$html[] = '</div>';
			}
    }
    $html[] = '	<input class="" type="text" name="' . $name . '" id="' . $id . '" value="'
			. htmlspecialchars($value, ENT_COMPAT, 'UTF-8') . '" readonly="readonly" />';

    $html[] = '<a class="modal btn" title="' . JText::_('JLIB_FORM_BUTTON_SELECT') . '" href="index.php?option=com_media&amp;view=images&amp;tmpl=component&amp;fieldid=' . $id . '"'
				. ' rel="{handler: \'iframe\', size: {x: 800, y: 500}}">';
    $html[] = JText::_('JLIB_FORM_BUTTON_SELECT') . '</a><a class="btn hasTooltip" title="' . JText::_('JLIB_FORM_BUTTON_CLEAR') . '" href="#" onclick="';
    $html[] = 'jInsertFieldValue(\'\', \'' . $id . '\');';
    $html[] = 'return false;';
    $html[] = '">';
    $html[] = '<i class="icon-remove"></i></a>';
    $html[] = '</div>';
    return implode("\n", $html);
  }

  protected function getScript()
  {
    $html = array();

    $html[] = '

        jQuery(document).ready(function($){

          reloadValidator = function () {
            if(document.formvalidator == null) {
              document.formvalidator = new JFormValidator(jQuery.noConflict());
            }
            //document.formvalidator.initialize();
          }

          resetSelectChosen = function (clone) {
            // Chosen reset
            $(clone).find("select").removeClass("chzn-done").show();

            // Assign random id
            //$.each($(clone).find("select"), function (index, c) {
            //    c.id = c.id + "_" + (Math.random() * 10000000).toInt();
            //});

            $(clone).find(".chzn-container").remove();

            $("select").chosen({
                disable_search_threshold : 10,
                allow_single_deselect : true
            });
          };

          addTab = function () {
            var container = $(".tabs")[0];
            var count = $(container).children(".tab").length;
            var clone = $("#tabs-template").find(".tab").clone(true, true);

            clone.appendTo(container);
            var contentClone = $(clone).html();
            contentClone = contentClone.replace(/REPLACE/ig, count);
            $(clone).html(contentClone);

            resetSelectChosen(clone);
            reloadValidator();
            reInitModal();
            $(".hasTooltip").tooltip({"html": true,"container": "body"});
          }

          removeTab = function (el) {
            $(el).remove();
            updateTabs();
          }

          updateTabs = function () {
            $(".tabs .tab").each(function(index, element){
              // method 1: replace all of the string
              //var originalContent = $(element).html();
              //originalContent = originalContent.replace(/\[[0-9]\]/g, "[" + index + "]");
              //originalContent = originalContent.replace(/\_[0-9]/g, "_" + index);
              //$(element).html(originalContent);

              // method 2: replace name and id of element
              $(element).find("input, select").each(function(id, el){
                el.name = el.name.replace(/\[[0-9]\]/, "[" + index + "]");
                el.id = el.id.replace(/_[0-9]/, "_" + index);
              });

              resetSelectChosen(element);
            });
            reloadValidator();
          }

          $("#tabs-template").appendTo($("body"));

          $(document).on( "click", "a.tabAdd", function(e){
            e.preventDefault();
            addTab();
          });

          $(document).on( "click", "a.tabRemove", function(e){
            e.preventDefault();
            removeTab($(this).parent(".tab"));
          });

        });

        function reInitModal(){
          SqueezeBox.initialize({});
          SqueezeBox.assign($$("a.modal"), {
            parse: "rel"
          });
        }

        function jInsertFieldValue(value, id) {
          var old_value = document.id(id).value;
          if (old_value != value) {
            var elem = document.id(id);
            elem.value = value;
            elem.fireEvent("change");
            if (typeof(elem.onchange) === "function") {
              elem.onchange();
            }
            jMediaRefreshPreview(id);
          }
        }

        function jMediaRefreshPreview(id) {
          var value = document.id(id).value;
          var img = document.id(id + "_preview");
          if (img) {
            if (value) {
              img.src = "' . JUri::root() . '" + value;
              document.id(id + "_preview_empty").setStyle("display", "none");
              document.id(id + "_preview_img").setStyle("display", "");
            } else {
              img.src = ""
              document.id(id + "_preview_empty").setStyle("display", "");
              document.id(id + "_preview_img").setStyle("display", "none");
            }
          }
        }

        function jMediaRefreshPreviewTip(tip)
        {
          var img = tip.getElement("img.media-preview");
          tip.getElement("div.tip").setStyle("max-width", "none");
          var id = img.getProperty("id");
          id = id.substring(0, id.length - "_preview".length);
          jMediaRefreshPreview(id);
          tip.setStyle("display", "block");
        }
    ';

    return implode("\n", $html);
  }
}
