<?php
/*
 * @package Joomla 1.5/1.6/1.7/2.5/3.0
 * @copyright Copyright (C) 2012. All rights reserved.
 *
 * @Module Callback aKernel
 * @copyright Copyright (C) A.Kernel www.akernel.ru
 */

  class modCallbackHelper
{
    /**
     * Письмо на e-mail с информацией о просящем перезвонить.
     */
    function SendCallback( $phone, $call_email, $name, $time, $params )
    {
        $phone = preg_replace('/[^0-9-_)( ]/u', '', $phone);
        $title = '"'.stripslashes(JRequest::getVar('title_cb')).'"';

        jimport('joomla.mail.mail');
        $m = & JMail::getInstance();
        $m->setSender(array($call_email, JText::_('modcallback_title')));
        
        $pattern = array('{name}', '{phone}', '{time}', '{curr_day}', '{curr_month}', '{curr_year}', '{curr_time}', '{title}');
        $replace = array($name, $phone, $time, date('d'), date('m'), date('Y'), date('H:i'), $title);
        $subject = str_replace($pattern, $replace, $params->get('subject_email'));
        $m->setSubject($subject);
        $body = str_replace($pattern, $replace, $params->get('body_email'));
        $m->setBody($body);
        $m->addRecipient($call_email);
        $result = $m->Send();
        //echo $result;

        return $result;
    }
    
    function end ()
    {
    	$end='
	</div>
	<div id="bg_right"></div>
	<div class="clr"></div>
	<div id="bg_bottom"></div>
	</div></div>';
	return $end;
    }
}
?>
