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

defined('_JEXEC') or die('Restricted access');

/**
 * modJSMClubiconsHelper
 * 
 * @package   
 * @author 
 * @copyright diddi
 * @version 2014
 * @access public
 */
class modJSMClubiconsHelper
{
	var $project;
	var $ranking;
	var $teams = array ();
	var $params;
    var $module;
	var $placeholders = array (
			'logo_small' => 'images/com_sportsmanagement/database/placeholders/placeholder_small.png',
			'logo_middle' => 'images/com_sportsmanagement/database/placeholders/placeholder_50.png',
			'logo_big' => 'images/com_sportsmanagement/database/placeholders/placeholder_150.png'
		);
	/**
	 * modJSMClubiconsHelper::__construct()
	 * 
	 * @param mixed $params
	 * @return
	 */
	function __construct( &$params,$module )
	{
		$this->params = $params;
        $this->module = $module;
		self::_getData();
	}
	
	/**
	 * modJSMClubiconsHelper::_getData()
	 * 
	 * @return
	 */
	private function _getData()
	{
		$app = JFactory::getApplication();
        //$app->enqueueMessage(JText::_(__METHOD__.' '.__LINE__.' module<br><pre>'.print_r($this->module,true).'</pre>'),'');

		$project_id = (JRequest::getVar('option','') == 'com_sportsmanagement' AND 
									JRequest::getInt('p',0) > 0 AND 
									$this->params->get('usepfromcomponent',0) == 1 ) ? 
									JRequest::getInt('p') : $this->params->get('project_ids');
		if (is_array($project_id)) { $project_id = $project_id[0];}
		
        if ( $project_id )
        {
        //$model = JModel::getInstance('project', 'sportsmanagementModel');
		sportsmanagementModelProject::setProjectId($project_id);

		$this->project = sportsmanagementModelProject::getProject();

		$ranking = JSMRanking::getInstance($this->project);
		//$ranking->setProjectId($project_id);
        sportsmanagementModelRanking::$projectid = $project_id;
		$divisionid = explode(':', $this->params->get('division_id', 0));
		$divisionid = $divisionid[0];
		$this->ranking   = $ranking->getRanking(null, null, $divisionid);

		if ($this->params->get( 'logotype' ) == 'logo_small')
		{
			$teams = sportsmanagementModelProject::getTeamsIndexedByPtid();
		}
		else //get the teams cause we don't have logo_middle and big in ranking model's getTeams:
		{
			$teams = sportsmanagementModelProject::getTeams($divisionid);
		}
		
        //$app->enqueueMessage(JText::_(__METHOD__.' '.__LINE__.' projectid<br><pre>'.print_r($teams,true).'</pre>'),'');
        
		self::buildData($teams);
		unset($teams);
		//unset($model);
        }

	}
    
	/**
	 * modJSMClubiconsHelper::buildData()
	 * 
	 * @param mixed $result
	 * @return
	 */
	function buildData( &$result )
	{
	   $app = JFactory::getApplication();
        //$app->enqueueMessage(JText::_(__METHOD__.' '.__LINE__.' module<br><pre>'.print_r($this->module,true).'</pre>'),'');
        
		if (count($result))
		{
			foreach($result as $r)
			{
				$this->teams[$r->projectteamid] = array();
				$this->teams[$r->projectteamid]['link'] = self::getLink( $r );
				$class = (!empty($this->teams[$r->projectteamid]['link'])) ? 'smstarticon' : 'smstarticon nolink';
				$this->teams[$r->projectteamid]['logo'] = self::getLogo( $r, $class );
			}
		}
	}
    
	/**
	 * modJSMClubiconsHelper::getLogo()
	 * 
	 * @param mixed $item
	 * @param mixed $class
	 * @return
	 */
	function getLogo( & $item, $class )
	{
	   $app = JFactory::getApplication();
        //$app->enqueueMessage(JText::_(__METHOD__.' '.__LINE__.' module<br><pre>'.print_r($this->module,true).'</pre>'),'');
        
        $imgtype = $this->params->get( 'logotype','logo_middle' );
		$logourl = $item->$imgtype;

		if ( !sportsmanagementHelper::existPicture($logourl) )
{
$logourl = sportsmanagementHelper::getDefaultPlaceholder('logo_big');    
}

//        if ( JFile::exists($logourl) )
//        {
//        $logourl = $logourl;   
//        }
//        else
//        {
//        $logourl = $this->placeholders[$imgtype];    
//        }
        
//		$logourl = (!empty($item->$imgtype) AND file_exists($this->module->picture_server.DS.$item->$imgtype))
//			? $item->$imgtype : $this->placeholders[$imgtype];

        //$app->enqueueMessage(JText::_(__METHOD__.' '.__LINE__.' logourl<br><pre>'.print_r($logourl,true).'</pre>'),'');
        
		$imgtitle = JText::_('View ') . $item->name;
		return JHTML::image($logourl, $item->name,'border="0" class="'.$class.'" title="'.$imgtitle.'"');
	}
    
	/**
	 * modJSMClubiconsHelper::getLink()
	 * 
	 * @param mixed $item
	 * @return
	 */
	function getLink( &$item )
	{
	   $app = JFactory::getApplication();
        //$app->enqueueMessage(JText::_(__METHOD__.' '.__LINE__.' module<br><pre>'.print_r($this->module,true).'</pre>'),'');
        
	    $routeparameter = array();
$routeparameter['cfg_which_database'] = $this->params->get('cfg_which_database');
$routeparameter['s'] = $this->params->get('s');
$routeparameter['p'] = $this->project->slug;
		switch ($this->params->get('teamlink'))
		{
			case 0:
				return '';
			case 1:
            $routeparameter['tid'] = $item->team_slug;
$routeparameter['ptid'] = 0;
				return sportsmanagementHelperRoute::getSportsmanagementRoute('teaminfo',$routeparameter);
			case 2:
            $routeparameter['tid'] = $item->team_slug;
$routeparameter['ptid'] = 0;
				return sportsmanagementHelperRoute::getSportsmanagementRoute('roster',$routeparameter);
			case 3:
            $routeparameter['tid'] = $item->team_slug;
$routeparameter['division'] = 0;
$routeparameter['mode'] = 0;
$routeparameter['ptid'] = 0;
				return sportsmanagementHelperRoute::getSportsmanagementRoute('teamplan',$routeparameter);
			case 4:
				return sportsmanagementHelperRoute::getClubInfoRoute($this->project->slug, $item->club_slug);
			case 5:
				return (isset($item->club_www)) ? $item->club_www : $item->website;
		}
	}
}