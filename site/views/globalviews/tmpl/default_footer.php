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

defined('_JEXEC') or die('Restricted access');

$option = JRequest::getCmd('option');
$view = JRequest::getVar( "view") ;
$view = ucfirst(strtolower($view));
$cfg_help_server = JComponentHelper::getParams($option)->get('cfg_help_server','') ;
$modal_popup_width = JComponentHelper::getParams($option)->get('modal_popup_width',0) ;
$modal_popup_height = JComponentHelper::getParams($option)->get('modal_popup_height',0) ;
$cfg_bugtracker_server = JComponentHelper::getParams($option)->get('cfg_bugtracker_server','') ;	
$logo_width = JComponentHelper::getParams($option)->get('logo_picture_width',100) ;
?>

<style>
.modaljsm {
    width: 80%;
    height: 60%;
  }  
  

</style>


<style>
.modal-dialog {
    width: 80%;
  }  
.modal-dialog,
.modal-content {
    /* 95% of window height */
    height: 95%;
}  
</style>

<script type="text/javascript" >

function openLink(url)
{
var width = get_windowPopUpWidth();
var heigth = get_windowPopUpHeight(); 

SqueezeBox.open(url, {
       handler: 'iframe', 
       size: { x: width, y: heigth }
   });
       
} 

</script>	

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align:center; clear:both">

<br />      
      
<a title= "<?php echo JText::_('COM_SPORTSMANAGEMENT_SITE_LINK')?>" target="_blank" href="http://www.fussballineuropa.de">
<img src= "<?php echo  JURI::root( true );?>/components/com_sportsmanagement/assets/images/logo_transparent.png" width="<?PHP echo $logo_width; ?>" height="auto"></a>            
	<br />
	<?php echo JText::_( "COM_SPORTSMANAGEMENT_DESC" ); ?>
	<br />      
<img src= "<?php echo  JURI::root( true );?>/components/com_sportsmanagement/assets/images/fussballineuropa.png" width="<?PHP echo $logo_width; ?>" height="auto"></a>            		
	<?php echo JText::_( "COM_SPORTSMANAGEMENT_COPYRIGHT" ); ?> : &copy;
	<a href="http://www.fussballineuropa.de" target="_blank">Fussball in Europa</a>
<br />  
<img src= "<?php echo  JURI::root( true );?>/components/com_sportsmanagement/assets/images/facebook.png" width="<?PHP echo $logo_width; ?>" height="auto"></a>            		
<a href="https://www.facebook.com/joomlasportsmanagement/" target="_blank">JSM auf Facebook</a>	

	<br />      
	<?php echo JText::_( "COM_SPORTSMANAGEMENT_VERSION" ); ?> :       
	<?php 
		//echo JText::sprintf( '%1$s', sportsmanagementHelper::getVersion() );
	echo JHtml::link('index.php?option='.$option.'&amp;view=about',sprintf('Version %1$s (diddipoeler)',sportsmanagementHelper::getVersion()));
	?>
	<br />    
      
<?PHP
// welche joomla version ?
if(version_compare(JVERSION,'3.0.0','ge')) 
{

}
elseif(version_compare(JVERSION,'2.5.0','ge')) 
{
// Joomla! 2.5 code here
?>
<!-- Button HTML (to Trigger Modal) -->
<a href="<?php echo $cfg_bugtracker_server; ?>" rel="modaljsm:open">Bug-Tracker</a>
<br />
<a href="<?php echo $cfg_help_server; ?>" rel="modaljsm:open">Online-Help</a>
<br />
<?PHP
} 

?>      


</div>


            
<?php
//}
?>
