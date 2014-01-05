<?php
/**
 * @copyright	Copyright (C) 2013 fussballineuropa.de. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

// Check to ensure this file is included in Joomla!
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.modellist');

/**
 * Sportsmanagement Component Divisions Model
 *
 * @package		Joomleague
 * @since 0.1
 */
class sportsmanagementModelDivisions extends JModelList
{
	var $_identifier = "divisions";
    var $_project_id = 0;
	
	protected function getListQuery()
	{
		$mainframe	= JFactory::getApplication();
		$option = JRequest::getCmd('option');
        $this->_project_id	= $mainframe->getUserState( "$option.pid", '0' );
        
        //$mainframe->enqueueMessage(JText::_('sportsmanagementModelDivisions _project_id<br><pre>'.print_r($this->_project_id,true).'</pre>'),'Notice');
        
        // Get the WHERE and ORDER BY clauses for the query
		$where		= $this->_buildContentWhere();
		$orderby	= $this->_buildContentOrderBy();
        // Create a new query object.
        $query = $this->_db->getQuery(true);
        $query->select(array('dv.*', 'dvp.name AS parent_name','u.name AS editor'))
        ->from('#__'.COM_SPORTSMANAGEMENT_TABLE.'_division AS dv')
        ->join('LEFT', '#__'.COM_SPORTSMANAGEMENT_TABLE.'_division AS dvp ON dvp.id = dv.parent_id')
        ->join('LEFT', '#__users AS u ON u.id = dv.checked_out');

        //if ($where)
        //{
            $query->where($where);
        //}
        if ($orderby)
        {
            $query->order($orderby);
        }


		return $query;
	}

	function _buildContentOrderBy()
	{
		$option = JRequest::getCmd('option');
		$mainframe	= JFactory::getApplication();
		$filter_order		= $mainframe->getUserStateFromRequest( $option .'.'.$this->_identifier. 'dv_filter_order','filter_order','dv.ordering','cmd');
		$filter_order_Dir	= $mainframe->getUserStateFromRequest( $option .'.'.$this->_identifier. 'dv_filter_order_Dir','filter_order_Dir','','word');

		if ( $filter_order == 'dv.ordering' )
		{
			$orderby 	= 'dv.ordering ' . $filter_order_Dir;
		}
		else
		{
			$orderby 	= '' . $filter_order . ' '.$filter_order_Dir . ' , dv.ordering ';
		}

		return $orderby;
	}

	function _buildContentWhere()
	{
		$option = JRequest::getCmd('option');
 		$mainframe	= JFactory::getApplication();
		//$project_id = $mainframe->getUserState( $option . 'project' );
		$where = array();

		$where[]	= ' dv.project_id = ' . $this->_project_id;

		$filter_order		= $mainframe->getUserStateFromRequest( $option .'.'.$this->_identifier. 'dv_filter_order','filter_order','dv.ordering','cmd');
		$filter_order_Dir	= $mainframe->getUserStateFromRequest( $option .'.'.$this->_identifier. 'dv_filter_order_Dir','filter_order_Dir','','word');
		$search				= $mainframe->getUserStateFromRequest( $option .'.'.$this->_identifier. 'dv_search','search','','string');
		$search				= JString::strtolower( $search );

		if ( $search )
		{
			$where[] = 'LOWER(dv.name) LIKE ' . $this->_db->Quote( '%' . $search . '%' );
		}


		$where = ( count( $where ) ? '' . implode( ' AND ', $where ) : '' );

		return $where;
	}
	
	/**
	* Method to return a divisions array (id, name)
	*
	* @param int $project_id
	* @access  public
	* @return  array
	* @since 0.1
	*/
	function getDivisions($project_id)
	{
		$query = '	SELECT	id AS value,
					name AS text
					FROM #__'.COM_SPORTSMANAGEMENT_TABLE.'_division
					WHERE project_id=' . $project_id .
					' ORDER BY name ASC ';

		$this->_db->setQuery( $query );
		if ( !$result = $this->_db->loadObjectList("value") )
		{
			sportsmanagementModeldatabasetool::writeErrorLog(get_class($this), __FUNCTION__, __FILE__, $this->_db->getErrorMsg(), __LINE__);
			return array();
		}
		else
		{
			return $result;
		}
		
	}
	
	/**
	 * return count of project divisions
	 *
	 * @param int project_id
	 * @return int
	 */
	function getProjectDivisionsCount($project_id)
	{
		$query='SELECT count(*) AS count
		FROM #__'.COM_SPORTSMANAGEMENT_TABLE.'_division AS d
		JOIN #__'.COM_SPORTSMANAGEMENT_TABLE.'_project AS p on p.id = d.project_id
		WHERE p.id='.$project_id;
		$this->_db->setQuery($query);
		return $this->_db->loadResult();
	}
	
}
?>