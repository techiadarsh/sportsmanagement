<?php 

defined('_JEXEC') or die;


/**
 * sportsmanagementViewRivals
 * 
 * @package 
 * @author Dieter Pl�ger
 * @copyright 2016
 * @version $Id$
 * @access public
 */
class sportsmanagementViewRivals extends JViewLegacy
{
    
    
	/**
	 * sportsmanagementViewRivals::display()
	 * 
	 * @param mixed $tpl
	 * @return void
	 */
	public function display($tpl = null)
	{
	   $app = JFactory::getApplication();
       // JInput object
        $jinput = $app->input;
        $option = $jinput->getCmd('option');
        
		// Get a refrence of the page instance in joomla
		$document	= JFactory::getDocument();
        
        $document->addScript ( JUri::root(true).'/components/'.$option.'/assets/js/smsportsmanagement.js' );

		$model	= $this->getModel();
		$config = sportsmanagementModelProject::getTemplateConfig($this->getName());
		
		$this->project = sportsmanagementModelProject::getProject();
		$this->overallconfig = sportsmanagementModelProject::getOverallConfig();
        
		if (!isset( $this->overallconfig['seperator']))
		{
			$this->overallconfig['seperator'] = "-";
		}
		$this->config = $config;
		$this->opos = $model->getOpponents();
		$this->team = $model->getTeam();
		
        //$app->enqueueMessage(JText::_(__METHOD__.' '.__FUNCTION__.' <br><pre>'.print_r($this->opos,true).'</pre>'),'');
        
		// Set page title
		$titleInfo = sportsmanagementHelper::createTitleInfo(JText::_('COM_SPORTSMANAGEMENT_RIVALS_PAGE_TITLE'));
		if (!empty($this->team))
		{
			$titleInfo->team1Name = $this->team->name;
		}
		if (!empty($this->project))
		{
			$titleInfo->projectName = $this->project->name;
			$titleInfo->leagueName = $this->project->league_name;
			$titleInfo->seasonName = $this->project->season_name;
		}
		if (!empty( $this->division ) && $this->division->id != 0)
		{
			$titleInfo->divisionName = $this->division->name;
		}
                		
        $this->pagetitle = sportsmanagementHelper::formatTitle($titleInfo, $this->config["page_title_format"]);
		$document->setTitle($this->pagetitle);
        
        $this->headertitle = $this->pagetitle;

		parent::display($tpl);
	}
}
