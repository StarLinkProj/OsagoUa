<?php
/**
 * SMFAQ
 *
 * @package		component for Joomla 2.5+
 * @version		1.7 beta 2
 * @copyright	(C)2009 - 2011 by SmokerMan (http://joomla-code.ru)
 * @license		GNU/GPL v.3 see http://www.gnu.org/licenses/gpl.html
 */

// защита от прямого доступа
defined('_JEXEC') or die('@-_-@'); ?>
<?php 
$user = JFactory::getUser();

if ($user->guest) {
    $app = JFactory::getApplication();
    
	$created_by = $this->escape( $app->input->cookie->get(JApplication::getHash('com_smfaq.name'), null, 'STRING') );
	$created_by_email = $this->escape( $app->input->cookie->get(JApplication::getHash('com_smfaq.email'), null, 'STRING') );
	
	//установка значений из куки
	if ($created_by) {
		$this->form->setValue('created_by', null, $created_by);
	}
	if ($created_by_email) {
		$this->form->setValue('created_by_email', null, $created_by_email);;
	}
	
}

?>

<div class="overlay-container">
	<div class="window-container zoomin">
		<span class="mod-close">Закрыть</span>
		<div class="clear"></div>		
		<form action="#" name="smfaq-form" id="smfaq-form" method="post" >

			<div class="titleform"><?php echo JText::_('COM_SMFAQ_TITLE_FORM'); ?></div>
			<?php if ($user->guest) { 
					echo "<div class='label'>" . $this->form->getLabel('created_by') . "</div>"; 
					echo "<div class='field'>" . $this->form->getInput('created_by') . "</div>";
					echo "<div class='faq-name-error'></div>";
					
					echo "<div class='clear-margin'></div>";
					if ($this->params->get('show_email', 0) != 2) {
						echo "<div class='label'>" . $this->form->getLabel('created_by_email') . "</div>";
						echo "<div class='field'>" . $this->form->getInput('created_by_email') . "</div>";
						echo "<div class='faq-mail-error'></div>";
						
						echo "<div class='clear-margin'></div>";
					}
				}
				foreach ($this->form->getFieldset('details') as $field) {
					echo "<div class='label'>" . $field->label . "</div>";
					echo "<div class='field'>" . $field->input . "</div>"; 
				}		
				echo "<div class='label'>" . $this->form->getLabel('question') . "</div>";
				echo "<div class='field'>" . $this->form->getInput('question') . "</div>";
				echo "<div class='faq-question-error'></div>";
				
				echo "<div class='clear-margin'></div>";
				
				if ($this->params->get('show_char_count', 1)) {
					echo '<div class="count">';
					echo '<span>'.JText::sprintf('COM_SMFAQ_COUNTER',  '<span id="smfaq-counter">'.$this->params->get('max_length_question').'</span>').'</span>';
					echo '</div>';
				} else {
					echo '<div class="clr"></div>';
				}
				if (($this->params->get('show_captcha', 1) == 1 && $user->guest) || ($this->params->get('show_captcha') == 2)) {
					echo $this->form->getInput('captcha');
				}
				if ($this->params->get('show_send_mail') && $this->params->get('show_email') != 2) {
					echo '<div class="ch_email">';
					echo $this->form->getInput('answer_email');
					echo $this->form->getLabel('answer_email');
					echo '</div>';
				}
			?>
			<div class="clr"></div>
			<input type="button" class="send-quest button" onclick="SmFaq.sendform(this.form)" value="<?php echo JText::_('COM_SMFAQ_SEND'); ?>" />
			<?php if (!$this->params->get('show_form', 0)) : ?>
				<input type="button" class="button" onclick="SmFaq.showform(false)" value="<?php echo JText::_('COM_SMFAQ_CLOSE'); ?>" />
			<?php endif; ?>	  	
		  <input type="hidden" name="count" value="<?php echo $this->params->get('max_length_question'); ?>" />
		  <input type="hidden" name="catid" value="<?php echo $this->category->id; ?>" />
		  <input type="hidden" name="token" value="<?php echo JSession::getFormToken(); ?>"  />	 
		</form>
	</div>
</div>
<div class="clr"></div>
