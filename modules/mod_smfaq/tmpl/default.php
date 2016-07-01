<?php
/**
 * @package     Joomla.Tutorials
 * @subpackage  Module
 * @copyright   (C) 2012 http://jomla-code.ru
 * @license     License GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die('(@)|(@)');


$document =& JFactory::getDocument();
$document->addStyleSheet(JURI::base() . 'modules/mod_smfaq/css/smfaq.css');
$document->addStyleSheet(JURI::base() . 'modules/mod_smfaq/css/opentip.css');
$document->addScript(JURI::base() . 'modules/mod_smfaq/js/opentip.min.js');

?>
<?php if( $list ): ?>
	<ul class="mod_smfaq">
		<?php foreach ($list as $item): ?>
			<li class="list-item">
				<?php if( $params->get('show_question') ): ?>
					<?php if( $params->get('question_link_type') == '2' ): ?>
						<?php $link = '' ?>
					<?php else: ?>
						<?php $link = 'location.href=\'' . ($params->get('question_link_type') == '1' ? JRoute::_(SmfaqHelperRoute::getQuestionRoute($item->catid, $item->id)) : (JRoute::_(SmfaqHelperRoute::getCategoryRoute($item->catid)) . '#p' . $item->id)) . '\'' ; ?>
					<?php endif; ?>
					<div class="question-item" onclick="<?php echo $link ?>">
						<div class="question-label">
							<strong>
								<?php echo $params->get('question_label') ?>
							</strong>
						</div>
						<?php if ( $params->get('symbol_limit') > 0 ): ?>
							<?php $bIsShort = mb_strlen($item->question) > $params->get('symbol_limit') ?>
							<div class="question-content"<?php echo $bIsShort && $params->get('show_tooltip_question') ? ' data-ot="' . htmlspecialchars(strip_tags($item->question)) . '"' : ''?>>
								<?php echo mb_substr($item->question, 0, $params->get('symbol_limit')) ?>
								<?php echo $bIsShort ? '...' : ''?>
							</div>
						<?php else: ?>
							<div class="question-content">
								<?php echo $item->question ?>
							</div>
						<?php endif; ?>
					</div>
				<?php endif; ?>
				<?php if($params->get('show_answer') ): ?>
					<div class="question-item" onclick="<?php echo $link ?>">
						<?php if( $params->get('answer_label') ): ?>
							<div class="question-label">
								<strong>
									<?php echo $params->get('answer_label') ?>
								</strong>
							</div>
						<?php endif ?>
						<?php if ( $params->get('symbol_limit') > 0 ): ?>
							<?php $bIsShort = mb_strlen($item->answer) > $params->get('symbol_limit') ?>
							<div class="answer-content"<?php echo $bIsShort && $params->get('show_tooltip_answer') ? ' data-ot="' . htmlspecialchars(strip_tags($item->answer)) . '"' : ''?>>
								<?php echo mb_substr($item->answer, 0, $params->get('symbol_limit')) ?>
								<?php echo $bIsShort ? '...' : ''?>
							</div>
						<?php else: ?>
							<div class="answer-content">
								<?php echo $item->answer ?>
							</div>
						<?php endif; ?>
						
					</p>
				<?php endif; ?>
			</li>
		<?php endforeach; ?>
	</ul>
<?php endif;?>
<?php if(  $params->get('after_text') &&  $params->get('link_list_category_id') ): ?>
	<p><a href="<?php echo JRoute::_(SmfaqHelperRoute::getCategoryRoute( $params->get('link_list_category_id') ) ) ?>"><?php echo $params->get('after_text') ?></a></p>
<?php endif; ?>