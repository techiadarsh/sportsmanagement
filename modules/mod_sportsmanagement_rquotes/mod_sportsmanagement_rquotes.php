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
 
 
 //no direct access
defined('_JEXEC') or die('Restricted access'); 
if(!defined('DS'))
{
define('DS',DIRECTORY_SEPARATOR);
error_reporting(0);
}

if ( !defined('JSM_PATH') )
{
DEFINE( 'JSM_PATH','components/com_sportsmanagement' );
}

//include helper file	
require_once(dirname(__FILE__).DS.'helper.php'); 
// prüft vor Benutzung ob die gewünschte Klasse definiert ist
if ( !class_exists('sportsmanagementHelper') ) 
{
//add the classes for handling
$classpath = JPATH_ADMINISTRATOR.DS.JSM_PATH.DS.'helpers'.DS.'sportsmanagement.php';
JLoader::register('sportsmanagementHelper', $classpath);
JModelLegacy::getInstance("sportsmanagementHelper", "sportsmanagementModel");
}

$source = $params->get('source');
$cfg_which_database = $params->get('cfg_which_database');
//text file params
$filename=$params->get('filename','rquotes.txt');
$randomtext=$params->get('randomtext');
//database params
$style = $params->get('style', 'default'); 
$category = $params->get('category','');
$rotate = $params->get('rotate');
$num_of_random = $params->get('num_of_random');

switch ($source) 
{
case 'db':
if($rotate=='single_random')
{
$list = modRquotesHelper::getRandomRquote($category,$num_of_random,$params);
}
elseif($rotate=='multiple_random')
{
$list = modRquotesHelper::getMultyRandomRquote($category,$num_of_random,$params);
}
elseif($rotate=='sequential') 
{
$list = modRquotesHelper::getSequentialRquote($category,$params);
}
elseif($rotate=='daily')
{
$list = modRquotesHelper::getDailyRquote($category,$params);
}
elseif($rotate=='weekly')
{
$list = modRquotesHelper::getWeeklyRquote($category,$params);
}
elseif($rotate=='monthly')
{
$list = modRquotesHelper::getMonthlyRquote($category,$params);
}
elseif($rotate=='yearly')
{
$list = modRquotesHelper::getYearlyRquote($category,$params);
}
//start
elseif($rotate=='today')
{
$list = modRquotesHelper::getTodayRquote($category,$params);
}

//end
?>
<div id="<?php echo $module->module; ?>-<?php echo $module->id; ?>">
<?PHP
require(JModuleHelper::getLayoutPath($module->module, $style,'default'));
?>
</div>
<?PHP
break;

case 'text':
if (!$randomtext)
{
$list = modRquotesHelper::getTextFile($params,$filename,$module);
}
else
{
$list = modRquotesHelper::getTextFile2($params,$filename,$module);
}
break;
default:
echo JText::_('MOD_SPORTSMANAGEMENT_RQUOTES_SAVE_DISPLAY_INFORMATION');


}
?> 
