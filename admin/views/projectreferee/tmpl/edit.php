<?php 
defined('_JEXEC') or die('Restricted access');?>
<form action="<?php echo JRoute::_('index.php?option=com_sportsmanagement&layout=edit&id='.(int) $this->item->id); ?>" method="post" id="adminForm" name="adminForm" >
	<div class="col50">
		<?php
		echo JHTML::_('tabs.start','tabs', array('useCookie'=>1));
		echo JHTML::_('tabs.panel',JText::_('COM_JOOMLEAGUE_TABS_DETAILS'), 'panel1');
		echo $this->loadTemplate('details');

		echo JHTML::_('tabs.panel',JText::_('COM_JOOMLEAGUE_TABS_PICTURE'), 'panel2');
		echo $this->loadTemplate('picture');

		echo JHTML::_('tabs.panel',JText::_('COM_JOOMLEAGUE_TABS_DESCRIPTION'), 'panel3');
		echo $this->loadTemplate('description');

		echo JHTML::_('tabs.panel',JText::_('COM_JOOMLEAGUE_TABS_EXTENDED'), 'panel3');
		echo $this->loadTemplate('extended');
		echo JHTML::_('tabs.end');
		?>
		
		
        <input type="hidden" name="project_id" value="<?php echo $this->item->project_id; ?>" />
	    <input type="hidden" name="pid" value="<?php echo $this->item->project_id; ?>" />
		<input type="hidden" name="task"   value="projectreferee.edit" />
	</div>
	<?php echo JHTML::_('form.token')."\n"; ?>
</form>
