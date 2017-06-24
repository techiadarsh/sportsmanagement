<?php
/** SportsManagement ein Programm zur Verwaltung f�r alle Sportarten
* @version 1.0.58
* @file 
* @author diddipoeler, stony, svdoldie (diddipoeler@gmx.de)
* @copyright Copyright: ? 2013 Fussball in Europa http://fussballineuropa.de/ All rights reserved.
* @license This file is part of SportsManagement.
 */

// no direct access
defined('_JEXEC') or die ;

jimport('joomla.form.formfield');

/**
 * JFormFieldSYWOnlineHelp
 * 
 * @package 
 * @author Dieter Pl�ger
 * @copyright 2017
 * @version $Id$
 * @access public
 */
class JFormFieldSYWOnlineHelp extends JFormField
{
	protected $type = 'SYWOnlineHelp';

	/**
	 * JFormFieldSYWOnlineHelp::getLabel()
	 * 
	 * @return
	 */
	protected function getLabel()
	{

		JHtml::_('stylesheet', 'syw/fonts-min.css', false, true);

		$title = $this->element['label'] ? (string) $this->element['label'] : ($this->element['title'] ? (string) $this->element['title'] : '');
		$heading = $this->element['heading'] ? (string) $this->element['heading'] : 'h4';
		$description = (string) $this->element['description'];
		$class = !empty($this->class) ? ' class="' . $this->class . '"' : '';

		$url = (string) $this->element['url'];

		$html = array();

		$html[] = !empty($title) ? '<' . $heading . '>' . JText::_($title) . '</' . $heading . '>' : '';

		$html[] = '<table style="width: 100%"><tr>';
		$html[] = !empty($description) ? '<td>'.JText::_($description).'</td>' : '';
		$html[] = '<td style="text-align: right"><a href="'.$url.'" target="_blank" class="btn btn-info btn-mini btn-xs"><i class="SYWicon-local-library"></i></a></td>';
		$html[] = '</tr></table>';

		return '</div><div ' . $class . '>' . implode('', $html);
	}

	/**
	 * JFormFieldSYWOnlineHelp::getInput()
	 * 
	 * @return
	 */
	protected function getInput()
	{
		return '';
	}

}
