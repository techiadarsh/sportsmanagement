<?php
/** SportsManagement ein Programm zur Verwaltung f�r alle Sportarten
* @version         1.0.05
* @file                agegroup.php
* @author                diddipoeler, stony, svdoldie und donclumsy (diddipoeler@arcor.de)
* @copyright        Copyright: � 2013 Fussball in Europa http://fussballineuropa.de/ All rights reserved.
* @license                This file is part of SportsManagement.
*
* SportsManagement is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
*
* SportsManagement is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with SportsManagement.  If not, see <http://www.gnu.org/licenses/>.
*
* Diese Datei ist Teil von SportsManagement.
*
* SportsManagement ist Freie Software: Sie k�nnen es unter den Bedingungen
* der GNU General Public License, wie von der Free Software Foundation,
* Version 3 der Lizenz oder (nach Ihrer Wahl) jeder sp�teren
* ver�ffentlichten Version, weiterverbreiten und/oder modifizieren.
*
* SportsManagement wird in der Hoffnung, dass es n�tzlich sein wird, aber
* OHNE JEDE GEW�HELEISTUNG, bereitgestellt; sogar ohne die implizite
* Gew�hrleistung der MARKTF�HIGKEIT oder EIGNUNG F�R EINEN BESTIMMTEN ZWECK.
* Siehe die GNU General Public License f�r weitere Details.
*
* Sie sollten eine Kopie der GNU General Public License zusammen mit diesem
* Programm erhalten haben. Wenn nicht, siehe <http://www.gnu.org/licenses/>.
*
* Note : All ini files need to be saved as UTF-8 without BOM
*/

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');

/**
 * sportsmanagementViewTemplates
 * 
 * @package   
 * @author 
 * @copyright diddi
 * @version 2014
 * @access public
 */
class sportsmanagementViewTemplates extends sportsmanagementView
{
	
	/**
	 * sportsmanagementViewTemplates::init()
	 * 
	 * @return void
	 */
	public function init ()
	{
		$app = JFactory::getApplication();
		$jinput = $app->input;
		$option = $jinput->getCmd('option');
		$document = JFactory::getDocument();
		$uri = JFactory::getURI();
		$model	= $this->getModel();
		$starttime = microtime();
        
		$this->state = $this->get('State');
		$this->sortDirection = $this->state->get('list.direction');
		$this->sortColumn = $this->state->get('list.ordering');
        
		$this->project_id	= $app->getUserState( "$option.pid", '0' );
		$mdlProject = JModelLegacy::getInstance("Project", "sportsmanagementModel");
		$project = $mdlProject->getProject($this->project_id);
        $lists = '';
		$allTemplates = $model->checklist($this->project_id);

        // das sind die eigenen templates
		$templates = $this->get('Items');
        
		if ( COM_SPORTSMANAGEMENT_SHOW_QUERY_DEBUG_INFO )
		{
		$app->enqueueMessage(JText::_(__METHOD__.' '.__LINE__.' Ausfuehrungszeit query<br><pre>'.print_r(sportsmanagementModeldatabasetool::getQueryTime($starttime, microtime()),true).'</pre>'),'Notice');
		}
        
		$total = $this->get('Total');
//		$pagination = $this->get('Pagination');
        
		//$projectws =& $this->get('Data','projectws');
        //$this->project_id	= $app->getUserState( "$option.pid", '0' );
//        $mdlProject = JModelLegacy::getInstance("Project", "sportsmanagementModel");
//	    $project = $mdlProject->getProject($this->project_id);
		
		//$app->enqueueMessage(JText::_(get_class($this).' '.__FUNCTION__.' '.__LINE__.' <br><pre>'.print_r($project,true).'</pre>'),'');
        
		if ($project->master_template)
		{
			// das sind die templates aus einenm anderen projekt
			$model->set('_getALL',1);
			$allMasterTemplates = $model->getMasterTemplatesList();
			$model->set('_getALL',0);
			$masterTemplates = $model->getMasterTemplatesList();
			
			//$app->enqueueMessage(JText::_(__METHOD__.' '.__LINE__.' total Templates<br><pre>'.print_r($masterTemplates,true).'</pre>'),'');
			// Build in JText of template title here
			foreach ($masterTemplates as $temptext)
        {
			$temptext->text = JText::_($temptext->text);
		}
		
			$importlist = array();
			$importlist[] = JHtml::_('select.option', 0, JText::_('COM_SPORTSMANAGEMENT_ADMIN_TEMPLATES_SELECT_FROM_MASTER'));
			$importlist = array_merge($importlist, $masterTemplates);
			$lists['mastertemplates'] = JHtml::_('select.genericlist', $importlist, 'templateid', 
				'class="inputbox" onChange="Joomla.submitform(\'template.masterimport\', this.form);" ');
			$master = $model->getMasterName();
			$this->master = $master;
			$templates = array_merge($templates,$allMasterTemplates);
            
			$total = count($templates);
		}
        
        //$app->enqueueMessage(JText::_(__METHOD__.' '.__LINE__.' total<br><pre>'.print_r($total,true).'</pre>'),'');
        
        //$total = $this->get('Total');
		$pagination = $this->get('Pagination');

		$this->user = JFactory::getUser();
		$this->lists = $lists; //otherwise no indication of the list in default_data.php on line 64!
		$this->templates = $templates;
		$this->projectws = $project;
		$this->pagination = $pagination;
		$this->request_url = $uri->toString();
		
        
		
		
	}
    
	/**
	* Add the page title and toolbar.
	*
	* @since	1.7
	*/
	protected function addToolbar()
	{
	//// Get a refrence of the page instance in joomla
//        $document = JFactory::getDocument();
//        // Set toolbar items for the page
//        $stylelink = '<link rel="stylesheet" href="'.JURI::root().'administrator/components/com_sportsmanagement/assets/css/jlextusericons.css'.'" type="text/css" />' ."\n";
//        $document->addCustomTag($stylelink);
//		// Set toolbar items for the page
		$this->title = JText::_('COM_SPORTSMANAGEMENT_ADMIN_TEMPLATES_TITLE');
        
		if ( COM_SPORTSMANAGEMENT_CFG_WHICH_DATABASE )
		{
		}
		else
		{
			JToolBarHelper::editList('template.edit');
			JToolBarHelper::save('template.save');
			
		if ($this->projectws->master_template)
		{

			 JToolBarHelper::deleteList('', 'template.remove', 'JTOOLBAR_DELETE');
		}
		else
		{
			JToolBarHelper::custom('template.reset','restore','restore',JText::_('COM_SPORTSMANAGEMENT_GLOBAL_RESET'));
		}
		}
		JToolbarHelper::checkin('templates.checkin');
		parent::addToolbar();
	}	
}
?>
