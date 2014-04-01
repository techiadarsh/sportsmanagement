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

// no direct access
defined('_JEXEC') or die('Restricted access');



/**
 * modSportsmanagementPlaygroundplanHelper
 * 
 * @package   
 * @author 
 * @copyright diddi
 * @version 2014
 * @access public
 */
class modSportsmanagementPlaygroundplanHelper
{

	/**
	 * Method to get the list
	 *
	 * @access public
	 * @return array
	 */
	function getData(&$params)
	{
	   $mainframe = JFactory::getApplication();
		$usedp = $params->get('projects','0');
		$usedpid = $params->get('playground', '0');
		$projectstring = (is_array($usedp)) ? implode(",", $usedp) : $usedp;
		$playgroundstring = (is_array($usedpid)) ? implode(",", $usedpid) : $usedpid;

		$numberofmatches=$params->get('maxmatches','5');

		$db  = JFactory::getDBO();
        $query = $db->getQuery(true);

		$result = array();
		
        $query->select('m.match_date, DATE_FORMAT(m.time_present, "%H:%i") time_present');	
        $query->select('p.name AS project_name, p.id AS project_id, tj1.team_id team1, tj2.team_id team2, lg.name AS league_name');
        $query->select('plcd.id AS club_playground_id');
        $query->select('plcd.name AS club_playground_name');
        $query->select('pltd.id AS team_playground_id');
        $query->select('pltd.name AS team_playground_name');
        $query->select('pl.id AS playground_id');
        $query->select('pl.name AS playground_name');
        $query->select('t1.name AS team1_name');
        $query->select('t2.name AS team2_name');
        
        $query->from('#__sportsmanagement_match AS m ');
        $query->join('INNER',' #__sportsmanagement_project_team as tj1 ON tj1.id = m.projectteam1_id  ');
        $query->join('INNER',' #__sportsmanagement_project_team as tj2 ON tj2.id = m.projectteam2_id  ');
        
        $query->join('INNER',' #__sportsmanagement_project AS p ON p.id = tj1.project_id  ');
        
        $query->join('INNER',' #__sportsmanagement_season_team_id as st1 ON st1.team_id = tj1.team_id ');
        $query->join('INNER',' #__sportsmanagement_season_team_id as st2 ON st2.team_id = tj2.team_id ');
        
        $query->join('INNER',' #__sportsmanagement_team as t1 ON t1.id = st1.team_id ');
        $query->join('INNER',' #__sportsmanagement_team as t2 ON t2.id = st2.team_id ');
        $query->join('INNER',' #__sportsmanagement_club c ON c.id = t1.club_id');
        $query->join('INNER',' #__sportsmanagement_league as lg ON lg.id = p.league_id');
        
        $query->join('LEFT',' #__sportsmanagement_playground AS plcd ON c.standard_playground = plcd.id');
        $query->join('LEFT',' #__sportsmanagement_playground AS pltd ON tj1.standard_playground = pltd.id ');
        $query->join('LEFT',' #__sportsmanagement_playground AS pl ON m.playground_id = pl.id');
        

//		$query = 'SELECT  m.match_date, DATE_FORMAT(m.time_present, "%H:%i") time_present,
//                             p.name AS project_name, p.id AS project_id, tj1.team_id team1, tj2.team_id team2, lg.name AS league_name,
//			     plcd.id AS club_playground_id, 
//			     plcd.name AS club_playground_name,
//			     pltd.id AS team_playground_id, 
//			     pltd.name AS team_playground_name, 
//			     pl.id AS playground_id, 
//			     pl.name AS playground_name,
//			     t1.name AS team1_name,
//			     t2.name AS team2_name
//                      FROM #__sportsmanagement_match AS m
//                      INNER JOIN #__sportsmanagement_project_team tj1 ON tj1.id = m.projectteam1_id 
//                      INNER JOIN #__sportsmanagement_project_team tj2 ON tj2.id = m.projectteam2_id 
//                      INNER JOIN #__sportsmanagement_project AS p ON p.id=tj1.project_id
//                      
//                      INNER JOIN #__sportsmanagement_team t1 ON t1.id = tj1.team_id
//		              INNER JOIN #__sportsmanagement_team t2 ON t2.id = tj2.team_id
//                      
//                      INNER JOIN #__sportsmanagement_club c ON c.id = t1.club_id
//                      
//		      INNER JOIN #__sportsmanagement_league lg ON lg.id = p.league_id
//		      LEFT JOIN #__sportsmanagement_playground AS plcd ON c.standard_playground = plcd.id
//		      LEFT JOIN #__sportsmanagement_playground AS pltd ON tj1.standard_playground = pltd.id 
//		      LEFT JOIN #__sportsmanagement_playground AS pl ON m.playground_id = pl.id
//
//                      WHERE (m.playground_id IN ('. $playgroundstring .')
//                          OR (tj1.standard_playground IN ('. $playgroundstring .') AND m.playground_id IS NULL)
//                          OR (c.standard_playground IN ('. $playgroundstring .') AND (m.playground_id IS NULL AND tj1.standard_playground IS NULL )))
//                      AND m.match_date > NOW()
//                      AND m.published = 1
//                      AND p.published = 1';


		$query->where('( m.playground_id IN ('.$playgroundstring.') 
        OR (tj1.standard_playground IN ('. $playgroundstring .') AND m.playground_id IS NULL)
                          OR (c.standard_playground IN ('. $playgroundstring .') AND (m.playground_id IS NULL AND tj1.standard_playground IS NULL )))
        ');
        $query->where('m.match_date > NOW()');
        $query->where('m.published = 1');
        $query->where('p.published = 1');
        
        if ($projectstring != 0)
		{
			//$query .= ' AND p.id IN ('. $projectstring .')';
            $query->where('p.id IN ('.$projectstring.')');
		}
        
        $query->order('m.match_date ASC');
        $query->setLimit($numberofmatches);

		//$query .= " ORDER BY m.match_date ASC LIMIT ".$numberofmatches;

			
		$db->setQuery($query);
        
        //$mainframe->enqueueMessage(JText::_(__FILE__.' '.__LINE__.' <br><pre>'.print_r($query->dump(),true).'</pre>'),'');
        
		$info = $db->loadObjectList();
        
        if ( !$info )
        {
            //$mainframe->enqueueMessage(JText::_(__FILE__.' '.__LINE__.' <br><pre>'.print_r($db->getErrorMsg(),true).'</pre>'),'Error');
        }

		return $info;
	}

	/**
	 * modSportsmanagementPlaygroundplanHelper::getTeams()
	 * 
	 * @param mixed $team1_id
	 * @param mixed $teamformat
	 * @return
	 */
	function getTeams( $team1_id, $teamformat)
	{
	   $mainframe = JFactory::getApplication();
	   $db  = JFactory::getDBO();
       $query = $db->getQuery(true);
       
       $query->select($teamformat);
       $query->from('#__sportsmanagement_team AS t ');
       $query->where('t.id ='.(int)$team1_id);

//		$query = "SELECT ". $teamformat. "
//                 FROM #__sportsmanagement_team
//                 WHERE id=".(int)$team1_id;
		
		$db->setQuery( $query );
        
        //$mainframe->enqueueMessage(JText::_(__FILE__.' '.__LINE__.' <br><pre>'.print_r($query->dump(),true).'</pre>'),'');
        
		$team_name = $db->loadResult();

		return $team_name;
	}

	/**
	 * modSportsmanagementPlaygroundplanHelper::getTeamLogo()
	 * 
	 * @param mixed $team_id
	 * @return
	 */
	function getTeamLogo($team_id)
	{
	   $mainframe = JFactory::getApplication();
	   $db  = JFactory::getDBO();
       $query = $db->getQuery(true);
       
       $query->select('c.logo_small');
       $query->from('#__sportsmanagement_team AS t ');
       $query->join('LEFT',' #__sportsmanagement_club as c ON c.id = t.club_id ');
       $query->where('t.id ='.$team_id);
       
//		$query = "
//            SELECT c.logo_small
//            FROM #__sportsmanagement_team t
//            LEFT JOIN #__sportsmanagement_club c ON c.id = t.club_id
//            WHERE t.id = ".$team_id;

	
		$db->setQuery( $query );
        
        //$mainframe->enqueueMessage(JText::_(__FILE__.' '.__LINE__.' <br><pre>'.print_r($query->dump(),true).'</pre>'),'');
        
		$club_logo = $db->loadResult();

		if ($club_logo == '') {
			$club_logo= sportsmanagementHelper::getDefaultPlaceholder('clublogosmall');
		}
		return $club_logo;
	}
}