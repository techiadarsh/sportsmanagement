<?php 
/** SportsManagement ein Programm zur Verwaltung für alle Sportarten
* @version         1.0.05
* @file                agegroup.php
* @author                diddipoeler, stony, svdoldie und donclumsy (diddipoeler@arcor.de)
* @copyright        Copyright: © 2013 Fussball in Europa http://fussballineuropa.de/ All rights reserved.
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
* SportsManagement ist Freie Software: Sie können es unter den Bedingungen
* der GNU General Public License, wie von der Free Software Foundation,
* Version 3 der Lizenz oder (nach Ihrer Wahl) jeder späteren
* veröffentlichten Version, weiterverbreiten und/oder modifizieren.
*
* SportsManagement wird in der Hoffnung, dass es nützlich sein wird, aber
* OHNE JEDE GEWÄHRLEISTUNG, bereitgestellt; sogar ohne die implizite
* Gewährleistung der MARKTFÄHIGKEIT oder EIGNUNG FÜR EINEN BESTIMMTEN ZWECK.
* Siehe die GNU General Public License für weitere Details.
*
* Sie sollten eine Kopie der GNU General Public License zusammen mit diesem
* Programm erhalten haben. Wenn nicht, siehe <http://www.gnu.org/licenses/>.
*
* Note : All ini files need to be saved as UTF-8 without BOM
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

JHtml::_( 'behavior.tooltip' );

//// Set toolbar items for the page
//JToolBarHelper::title( JText::_( JText::_( 'COM_SPORTSMANAGEMENT_ADMIN_DFBKEYS_MATCHDAY_INFO_1' ) ) );
//JToolBarHelper::save();

/*
echo '<pre>';
print_r($_POST);
echo '</pre>';
*/

//echo 'projekt ->'.$this->projectid.'<br>';

/*
echo '<pre>';
print_r($this->newmatchdays);
echo '</pre>';
*/

?>
<form action="index.php" method="post" name="adminForm" id="adminForm">
	<div id="editcell">
		<fieldset class="adminform">
			<legend>
				<?php
				echo JText::sprintf( 'COM_SPORTSMANAGEMENT_ADMIN_DFBKEYS_MATCHDAY_INFO_2',  $this->projectid  );
				?>
			</legend>

<table class="adminlist">
<thead>
<tr>
<th class="title" nowrap="nowrap" style="vertical-align:top; ">
<?PHP echo JText::_( 'COM_SPORTSMANAGEMENT_ADMIN_DFBKEYS_MATCHDAY_INFO_3' ); ?>
</th>
<th class="title" nowrap="nowrap" style="vertical-align:top; ">
<?PHP echo JText::_( 'COM_SPORTSMANAGEMENT_ADMIN_DFBKEYS_MATCHDAY_INFO_4' ); ?>
</th>
<th class="title" nowrap="nowrap" style="vertical-align:top; ">
<?PHP echo JText::_( 'COM_SPORTSMANAGEMENT_ADMIN_DFBKEYS_MATCHDAY_INFO_5' ); ?>
</th>
<th class="title" nowrap="nowrap" style="vertical-align:top; ">
<?PHP echo JText::_( 'COM_SPORTSMANAGEMENT_ADMIN_DFBKEYS_MATCHDAY_INFO_6' ); ?>
</th>

</tr>
</thead>

<?PHP
$i=0;
foreach($this->newmatchdays as $rowdays) 
{
?>
<tr>
<input type="hidden" name="roundcode[]" value="<?php echo $rowdays->spieltag;?> " />
<td><?php echo $rowdays->spieltag;?></td>
<td> <input type="text" name="name[]" value="<?php echo $rowdays->spieltag.JText::_('COM_SPORTSMANAGEMENT_ADMIN_DFBKEYS_MATCHDAY_INFO_7') ;?> " /> </td>

<td> 
<?php
$append = ' style="background-color:#bbffff;" ';

echo JHtml::calendar(	$date1,
														'round_date_first['.$i.']',
														'round_date_first['.$i.']',
														'%d-%m-%Y',
														'size="10" ' . $append .
														'onchange="document.getElementById(\'cb' . $i . '\').checked=true"' );

?>
</td>
<td>  

<?php
$append = ' style="background-color:#bbffff;" ';

echo JHtml::calendar(	$date1,
														'round_date_last['.$i.']',
														'round_date_last['.$i.']',
														'%d-%m-%Y',
														'size="10" ' . $append .
														'onchange="document.getElementById(\'cb' . $i . '\').checked=true"' );

?>


</td>

</tr>

<?PHP

$i++;
}
?>
</table>
</fieldset>
</div>

<fieldset class="actions">
						
							
</fieldset>
<input type="hidden" name="sent"			value="1" />
<input type="hidden" name="projectid"			value="<?php echo $this->projectid;?> " />
<input type="hidden" name="task"			value="" />

<input type="hidden" name="option"			value="com_sportsmanagement" />
               			
</form>

