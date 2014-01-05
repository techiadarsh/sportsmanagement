<?php
/**
 * @copyright	Copyright (C) 2013 fussballineuropa.de. All rights reserved.
 * @license		GNU/GPL,see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License,and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');


jimport('joomla.application.component.modellist');

/**
 * Sportsmanagement Component Venues Model
 *
 * @package	Sportsmanagement
 * @since	0.1
 */
class sportsmanagementModelPlaygrounds extends JModelList
{
	var $_identifier = "playgrounds";
	
	function getListQuery()
	{
		$mainframe = JFactory::getApplication();
        $option = JRequest::getCmd('option');
        $search	= $mainframe->getUserStateFromRequest($option.'.'.$this->_identifier.'.search','search','','string');
        $search_nation		= $mainframe->getUserStateFromRequest($option.'.'.$this->_identifier.'.search_nation','search_nation','','word');
        //$mainframe->enqueueMessage(JText::_('playgrounds getListQuery search<br><pre>'.print_r($search,true).'</pre>'   ),'');
        
        // Create a new query object.
		$db		= $this->getDbo();
		$query	= $db->getQuery(true);
		$user	= JFactory::getUser(); 
		
        // Select some fields
		$query->select('v.*');
        // From table
		$query->from('#__'.COM_SPORTSMANAGEMENT_TABLE.'_playground as v');
        // Join over the clubs
		$query->select('c.name As club');
		$query->join('LEFT', '#__'.COM_SPORTSMANAGEMENT_TABLE.'_club AS c ON c.id = v.club_id');
        // Join over the users for the checked out user.
		$query->select('uc.name AS editor');
		$query->join('LEFT', '#__users AS uc ON uc.id = v.checked_out');
        
        
        if ($search || $search_nation)
		{
        $query->where(self::_buildContentWhere());
        }
		$query->order(self::_buildContentOrderBy());
        
        //$mainframe->enqueueMessage(JText::_('playgrounds query<br><pre>'.print_r($query,true).'</pre>'   ),'');
		return $query;
        
        
        
	}

	function _buildContentOrderBy()
	{
		$option = JRequest::getCmd('option');
		$mainframe = JFactory::getApplication();
		$filter_order		= $mainframe->getUserStateFromRequest($option.'.'.$this->_identifier.'.filter_order','filter_order','v.ordering','cmd');
		$filter_order_Dir	= $mainframe->getUserStateFromRequest($option.'.'.$this->_identifier.'.filter_order_Dir','filter_order_Dir','','word');
		if ($filter_order == 'v.ordering')
		{
			$orderby='  v.ordering '.$filter_order_Dir;
		}
		else
		{
			$orderby='  '.$filter_order.' '.$filter_order_Dir.',v.ordering ';
		}
		return $orderby;
	}

	function _buildContentWhere()
	{
		$option = JRequest::getCmd('option');
		$mainframe = JFactory::getApplication();
		//$filter_order		= $mainframe->getUserStateFromRequest($option.'.'.$this->_identifier.'.filter_order',		'filter_order',		'v.ordering',	'cmd');
		//$filter_order_Dir	= $mainframe->getUserStateFromRequest($option.'.'.$this->_identifier.'.filter_order_Dir',	'filter_order_Dir',	'',				'word');
        $search_nation		= $mainframe->getUserStateFromRequest($option.'.'.$this->_identifier.'.search_nation','search_nation','','word');
		$search				= $mainframe->getUserStateFromRequest($option.'.'.$this->_identifier.'.search','search','','string');
		$search_mode		= $mainframe->getUserStateFromRequest($option.'.'.$this->_identifier.'.search_mode','search_mode','','string');
		$search=JString::strtolower($search);
		$where=array();
		if ($search)
		{
			if($search_mode)
			{
				$where[]='LOWER(v.name) LIKE '.$this->_db->Quote($search.'%');
			}
			else
			{
				$where[]='LOWER(v.name) LIKE '.$this->_db->Quote('%'.$search.'%');
			}
		}
        if ( $search_nation )
		{
		  $where[] = "v.country = '".$search_nation."'";
        }
		$where=(count($where) ? '  '. implode(' AND ',$where) : '');
		return $where;
	}
    
    
    /**
	 * Method to return a playground/venue array (id,text)
		*
		* @access	public
		* @return	array
		* @since 0.1
		*/
	function getPlaygrounds()
	{
		$query='SELECT id AS value, name AS text FROM #__'.COM_SPORTSMANAGEMENT_TABLE.'_playground ORDER BY text ASC ';
		$this->_db->setQuery($query);
		if (!$result=$this->_db->loadObjectList())
		{
			sportsmanagementModeldatabasetool::writeErrorLog(get_class($this), __FUNCTION__, __FILE__, $this->_db->getErrorMsg(), __LINE__);
			return false;
		}
		return $result;
	}
    
    public function getPlaygroundListSelect()
	{
		$query='SELECT id,name,id AS value,name AS text,short_name,club_id FROM #__'.COM_SPORTSMANAGEMENT_TABLE.'_playground ORDER BY name';
		$this->_db->setQuery($query);
		if ($results=$this->_db->loadObjectList())
		{
			return $results;
		}
		return false;
	}
    
    

	
}
?>
