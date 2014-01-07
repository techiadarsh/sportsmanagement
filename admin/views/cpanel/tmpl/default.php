<?php
/**
* @category        Core
* @package                
* @copyright (C) 2013
* @license                GNU/GPL, see LICENSE.php
*/
 
;##################################################################
;/*
;* Modified by
;*
;* email:
;* date: 2013
;* Release: 1.0
;* License : http://www.gnu.org/copyleft/gpl.html GNU/GPL
;*/
###################################################################
 
// Disallow direct access to this file
defined('_JEXEC') or die('Restricted access');
JHTML::_('behavior.tooltip');
?>
    <div>      
      <div class="cpanel-left">        
        <div style="clear:both">          
          <legend>
            <?php echo JText::_('COM_SPORTSMANAGEMENT_D_HEADING_BASIS_DATA'); ?>
          </legend>        
        </div>
        <br>        
        <div class="cpanel">          
          <div class="icon-wrapper">            
            <div id="icon">              
              <?php echo $this->addIcon('sportarten.png','index.php?option=com_sportsmanagement&view=sportstypes', JText::_('COM_SPORTSMANAGEMENT_D_MENU_SPORTSTYPES'));?>
            </div>          
          </div>        
          <div class="icon-wrapper">            
            <div id="icon">              
              <?php echo $this->addIcon('saisons.png','index.php?option=com_sportsmanagement&view=seasons', JText::_('COM_SPORTSMANAGEMENT_D_MENU_SEASONS'));?>            
            </div>          
          </div>          
          <div class="icon-wrapper">            
            <div id="icon">              
              <?php echo $this->addIcon('ligen.png','index.php?option=com_sportsmanagement&view=leagues', JText::_('COM_SPORTSMANAGEMENT_D_MENU_LEAGUES'));?>            
            </div>          
          </div>          
          <div class="icon-wrapper">            
            <div id="icon">              
              <?php echo $this->addIcon('landesverbaende.png','index.php?option=com_sportsmanagement&view=jlextassociations', JText::_('COM_SPORTSMANAGEMENT_D_MENU_ASSOCIATIONS'));?>            
            </div>          
          </div>          
          <div class="icon-wrapper">            
            <div id="icon">              
              <?php echo $this->addIcon('laender.png','index.php?option=com_sportsmanagement&view=jlextcountries', JText::_('COM_SPORTSMANAGEMENT_D_MENU_COUNTRIES'));?>            
            </div>          
          </div>          
          <div class="icon-wrapper">            
            <div id="icon">              
              <?php echo $this->addIcon('positionen.png','index.php?option=com_sportsmanagement&view=positions', JText::_('COM_SPORTSMANAGEMENT_D_MENU_POSITIONS'));?>            
            </div>          
          </div>          
          <div class="icon-wrapper">            
            <div id="icon">              
              <?php echo $this->addIcon('ereignisse.png','index.php?option=com_sportsmanagement&view=eventtypes', JText::_('COM_SPORTSMANAGEMENT_D_MENU_EVENTS'));?>            
            </div>          
          </div>          
          <div class="icon-wrapper">            
            <div id="icon">              
              <?php echo $this->addIcon('altersklassen.png','index.php?option=com_sportsmanagement&view=agegroups', JText::_('COM_SPORTSMANAGEMENT_D_MENU_AGEGROUPS'));?>            
            </div>          
          </div>        
        </div>
        <br>        
        <div style="clear:both">          
          <legend>
            <?php echo JText::_('COM_SPORTSMANAGEMENT_D_HEADING_PERSONAL_DATA'); ?>
          </legend>        
        </div>
        <br>        
        <div class="cpanel">          
          <div class="icon-wrapper">            
            <div id="icon">              
              <?php echo $this->addIcon('vereine.png','index.php?option=com_sportsmanagement&view=clubs', JText::_('COM_SPORTSMANAGEMENT_D_MENU_CLUBS'));?>            
            </div>          
          </div>          
          <div class="icon-wrapper">            
            <div id="icon">              
              <?php echo $this->addIcon('mannschaften.png','index.php?option=com_sportsmanagement&view=teams', JText::_('COM_SPORTSMANAGEMENT_D_MENU_TEAMS'));?>            
            </div>          
          </div>          
          <div class="icon-wrapper">            
            <div id="icon">              
              <?php echo $this->addIcon('personen.png','index.php?option=com_sportsmanagement&view=persons', JText::_('COM_SPORTSMANAGEMENT_D_MENU_PERSONS'));?>            
            </div>          
          </div>          
          <div class="icon-wrapper">            
            <div id="icon">              
              <?php echo $this->addIcon('spielorte.png','index.php?option=com_sportsmanagement&view=playgrounds', JText::_('COM_SPORTSMANAGEMENT_D_MENU_VENUES'));?>            
            </div>          
          </div>          
          <div class="icon-wrapper">            
            <div id="icon">              
              <?php echo $this->addIcon('spielfeldpositionen.png','index.php?option=com_sportsmanagement&view=rosterpositions', JText::_('COM_SPORTSMANAGEMENT_D_MENU_ROSTER_POSITION'));?>            
            </div>          
          </div>        
        </div>
        <br>        
        <div style="clear:both">          
          <legend>
            <?php echo JText::_('COM_SPORTSMANAGEMENT_D_HEADING_SPECIAL_FUNCTION'); ?>
          </legend>        
        </div>
        <br>        
        <div class="cpanel">          
          <div class="icon-wrapper">            
            <div id="icon">              
              <?php echo $this->addIcon('extrafelder.png','index.php?option=com_sportsmanagement&view=extrafields', JText::_('COM_SPORTSMANAGEMENT_D_MENU_EXTRAFIELDS'));?>            
            </div>          
          </div>          
          <div class="icon-wrapper">            
            <div id="icon">              
              <?php echo $this->addIcon('statistik.png','index.php?option=com_sportsmanagement&view=statistics', JText::_('COM_SPORTSMANAGEMENT_D_MENU_STATISTICS'));?>            
            </div>          
          </div>        
        </div>
        <br>        
        <div style="clear:both">          
          <legend>
            <?php echo JText::_('COM_SPORTSMANAGEMENT_D_HEADING_IMPORT_EXPORT_FUNCTION'); ?>
          </legend>        
        </div>
        <br>        
        <div class="cpanel">          
          <div class="icon-wrapper">            
            <div id="icon">              
              <?php echo $this->addIcon('xmlimport.png','index.php?option=com_sportsmanagement&view=jlxmlimports&layout=default', JText::_('COM_SPORTSMANAGEMENT_D_MENU_XML_IMPORT'));?>            
            </div>          
          </div>          
          <div class="icon-wrapper">            
            <div id="icon">              
              <?php echo $this->addIcon('xmleditor.png','index.php?option=com_sportsmanagement&view=smextxmleditors&layout=default', JText::_('COM_SPORTSMANAGEMENT_D_MENU_XML_EDITOR'));?>            
            </div>          
          </div>        
        </div>
        <br>        
        <div style="clear:both">          
          <legend>
            <?php echo JText::_('COM_SPORTSMANAGEMENT_D_HEADING_INSTALL_TOOLS'); ?>
          </legend>        
        </div>
        <br>        
        <div class="cpanel">          
          <div class="icon-wrapper">            
            <div id="icon">              
              <?php echo $this->addIcon('updates.png','index.php?option=com_sportsmanagement&view=updates', JText::_('COM_SPORTSMANAGEMENT_D_MENU_UPDATES'));?>            
            </div>          
          </div>          
          <div class="icon-wrapper">            
            <div id="icon">              
              <?php echo $this->addIcon('datenbanktools.png','index.php?option=com_sportsmanagement&view=databasetools', JText::_('COM_SPORTSMANAGEMENT_D_MENU_TOOLS'));?>            
            </div>          
          </div>          
          <div class="icon-wrapper">            
            <div id="icon">              
              <?php echo $this->addIcon('zitate.png','index.php?option=com_sportsmanagement&view=smquotes', JText::_('COM_SPORTSMANAGEMENT_D_MENU_QUOTES'));?>            
            </div>          
          </div>        
        </div>      
      </div>      
      <div class="cpanel-right">        
        <div style=         " top:1px; background-color:#cccccc; border:4px ridge #0033ff; padding:10px; margin:5px;">        
          <div style="width:48px; float:right">            
            <div style="margin-bottom:5px">              
              <a title=               "<?php echo JText::_('COM_SPORTSMANAGEMENT_FACEBOOK_FOLLOW')?>"               target="_blank" href=               "https://www.facebook.com/joomlasportsmanagement">
                <img src=               "/administrator/components/com_sportsmanagement/assets/icons/facebook.png"               width="48px" height="48px"></a>            
            </div>            
            <div style="margin-bottom:5px">              
              <a title=               "<?php echo JText::_('COM_SPORTSMANAGEMENT_GITHUB_FOLLOW')?>"               target="_blank" href=               "https://www.github.com/diddipoeler/sportsmanagement">
                <img src=               "/administrator/components/com_sportsmanagement/assets/icons/github.png"               width="48px" height="48px"></a>            
            </div>            
            <div style="margin-bottom:5px">              
              <a title=               "<?php echo JText::_('COM_SPORTSMANAGEMENT_HELP_LINK')?>" target=               "_blank" href=               "http://www.joomleaguewiki.grammatikas-grill.de/index.php/Hauptseite">               
                <img src=               "/administrator/components/com_sportsmanagement/assets/icons/hilfe.png"               width="48px" height="48px"></a>            
            </div>          
          </div>          
          <div style="width:80%">            
            <div>              
              <a title=               "<?php echo JText::_('COM_SPORTSMANAGEMENT_SITE_LINK')?>" target=               "_blank" href="http://www.fussballineuropa.de">
                <img src=               "/administrator/components/com_sportsmanagement/assets/icons/boxklein.png"               width="100%" height="auto" max-width="100%"></a>            
            </div>          
          </div>        
        </div>        
        <div style="float:left">        
        </div>
        <?php echo $this->pane->startPane( 'stat-pane' );echo $this->pane->startPanel( JText::_('COM_SPORTSMANAGEMENT_DEVELOPER') , 'developer' );?>        
        <br />
        <br />
        <div style="text-align: center">          
          <div style=           "text-align: center; width: 142px;height: 190px;float:left;">            
            <a title="<?php echo JText::_('COM_SPORTSMANAGEMENT_SITE_LINK')?>"             target="_blank" href="http://www.fussballineuropa.de">
              <img src=             "/administrator/components/com_sportsmanagement/assets/icons/ploeger_dieter.jpg"></a>          
          </div>          
          <div style=           "text-align: center; width:142px;height: 190px;float:left;">            
            <a title="<?php echo JText::_('COM_SPORTSMANAGEMENT_SITE_LINK')?>"             target="_blank" href="http://www.esv-knittelfeld.at">
              <img src=             "/administrator/components/com_sportsmanagement/assets/icons/galun-siegfried02.png"></a>          
          </div>          
          <div style=           "text-align: center; width:142px;height: 190px;float:left;">            
            <a title="<?php echo JText::_('COM_SPORTSMANAGEMENT_SITE_LINK')?>"             target="_blank" href="http://svdoerpum.de/">
              <img src=             "/administrator/components/com_sportsmanagement/assets/icons/prochnow_hauke.jpg"></a>          
          </div>          
          <div style=           "text-align: center; width:142px;height: 190px;float:left;">            
            <a title="<?php echo JText::_('COM_SPORTSMANAGEMENT_SITE_LINK')?>"             target="_blank" href="">
              <img src=             "/administrator/components/com_sportsmanagement/assets/icons/keller-jens.jpg"></a>          
          </div>        
        </div>
        <br />
        <?php echo $this->pane->endPanel();echo $this->pane->startPanel( JText::_('COM_SPORTSMANAGEMENT_WELCOME_TO_CBECOMMUNITY') , 'welcome' );?>        
        <div style="font-weight:700;">          
          <?php echo JText::_('COM_SPORTSMANAGEMENT_GREAT_COMPONENT_MSG');?>        
        </div>
        <?php echo $this->pane->endPanel(); echo $this->pane->startPanel( JText::_('COM_SPORTSMANAGEMENT_STATISTICS') , 'cbe' );?>
        <?php echo JText::_( 'COM_SPORTSMANAGEMENT_TOTAL_USERS' ).': '; ?><strong>
          <?php echo $this->cbe->total; ?></strong>        
        <?php echo JText::_( 'COM_SPORTSMANAGEMENT_TOTAL_BLOCKED_USERS' ).': '; ?>        <strong>
          <?php echo $this->cbe->blocked; ?></strong>        
        <?php echo JText::_( 'COM_SPORTSMANAGEMENT_TOTAL_APPLICATIONS_INSTALLED' ).': '; ?>        <strong>
          <?php echo $this->cbe->applications; ?></strong>        
        <?php echo JText::_( 'COM_SPORTSMANAGEMENT_TOTAL_ACTIVITY_UPDATES' ).': '; ?>        <strong>
          <?php echo $this->cbe->updates; ?></strong>        
        <?php echo JText::_( 'COM_SPORTSMANAGEMENT_PHOTOS_TOTAL' ).': '; ?>        <strong>
          <?php echo $this->cbe->photos; ?></strong>        
        <?php echo JText::_( 'COM_SPORTSMANAGEMENT_VIDEOS_TOTAL' ).': '; ?>        <strong>
          <?php echo $this->cbe->videos; ?></strong>        
        <?php echo JText::_( 'COM_SPORTSMANAGEMENT_GROUPS_T0TAL_DISCUSSIONS' ).': '; ?>        <strong>
          <?php echo $this->cbe->groupDiscussion; ?></strong>        
        <?php echo JText::_( 'COM_SPORTSMANAGEMENT_TOTAL_USERS' ).': '; ?>        <strong>
          <?php echo $this->cbe->total; ?></strong>        
        <?php echo JText::_( 'COM_SPORTSMANAGEMENT_TOTAL_BLOCKED_USERS' ).': '; ?>        <strong>
          <?php echo $this->cbe->blocked; ?></strong>        
        <?php echo JText::_( 'COM_SPORTSMANAGEMENT_TOTAL_APPLICATIONS_INSTALLED' ).': '; ?>        <strong>
          <?php echo $this->cbe->applications; ?></strong>        
        <?php echo JText::_( 'COM_SPORTSMANAGEMENT_TOTAL_ACTIVITY_UPDATES' ).': '; ?>        <strong>
          <?php echo $this->cbe->updates; ?></strong>        
        <?php echo JText::_( 'COM_SPORTSMANAGEMENT_PHOTOS_TOTAL' ).': '; ?>        <strong>
          <?php echo $this->cbe->photos; ?></strong>        
        <?php echo JText::_( 'COM_SPORTSMANAGEMENT_VIDEOS_TOTAL' ).': '; ?>        <strong>
          <?php echo $this->cbe->videos; ?></strong>        
        <?php echo JText::_( 'COM_SPORTSMANAGEMENT_GROUPS_T0TAL_DISCUSSIONS' ).': '; ?>        <strong>
          <?php echo $this->cbe->groupDiscussion; ?></strong>        
        <?php echo $this->pane->endPanel(); echo $this->pane->startPanel( JText::_('COM_SPORTSMANAGEMENT_GROUPS_STATISTICS'), 'groups' );?>        
        <table class="adminlist">          
          <tr>            
            <?php echo JText::_( 'COM_SPORTSMANAGEMENT_GROUPS_PUBLISHED' ).': '; ?>            
            <td align="center">              <strong>
                <?php echo $this->groups->published; ?></strong>            </td>          
          </tr>          
          <tr>            
            <?php echo JText::_( 'COM_SPORTSMANAGEMENT_GROUPS_UNPUBLISHED' ).': '; ?>            
            <td align="center">              <strong>
                <?php echo $this->groups->unpublished; ?></strong>            </td>          
          </tr>          
          <tr>            
            <?php echo JText::_( 'COM_SPORTSMANAGEMENT_GROUP_CATEGORIES' ).': '; ?>            
            <td align="center">              <strong>
                <?php echo $this->groups->categories; ?></strong>            </td>          
          </tr>        
        </table>
        <?php echo $this->pane->endPanel(); echo $this->pane->startPanel( JText::_('COM_SPORTSMANAGEMENT_GITHUB_REQUESTS') , 'GITHUBREQUESTS' );?>        
        <table class="adminlist">          
          <tr>            <td>              
              <ul class="GH-commit&lt;?php echo $moduleclass_sfx;?&gt;">                
                <?php foreach ($this->githubrequest as $o) { ?>                
                <li>                  
                <?php echo $o->commit->message.$o->commit->author; if (isset($o->commit->committer)) {echo $o->commit->committer;}echo $o->commit->time; ?>                
                </li>
                <?php } ?>              
              </ul>            </td>          
          </tr>        
        </table>
        <?php echo $this->pane->endPanel(); echo $this->pane->startPanel( JText::_('COM_SPORTSMANAGEMENT_WELCOME_TO_FORUM') , 'FORUM' );?>        
        <table class="adminlist">          
          <tr>            <td>              coming soon             </td>          
          </tr>        
        </table>
        <?php echo $this->pane->endPanel();echo $this->pane->endPane();?>      
      </div>    
    </div>
    <!-- FOOTER INFO DASHBOARD TODO ALL PAGES -->    
    <div style="text-align:center; clear:both">      
      <br />      
      <br />      
      
              <a title= "<?php echo JText::_('COM_SPORTSMANAGEMENT_SITE_LINK')?>" target= "_blank" href="http://www.fussballineuropa.de">
                <img src= "/administrator/components/com_sportsmanagement/assets/icons/logo_transparent.png"               width="180" height="auto"</a>            
      <br />
      <?php echo JText::_( "COM_SPORTSMANAGEMENT_DESC" ); ?>
      <br />      
      <?php echo JText::_( "COM_SPORTSMANAGEMENT_COPYRIGHT" ); ?> : &copy; 
      <a href="http://www.fussballineuropa.de" target="_blank">Fussball in Europa</a>
      <br />      
      <?php echo JText::_( "COM_SPORTSMANAGEMENT_VERSION" ); ?> :       
      <?php echo JText::sprintf( '%1$s', $this->version ); ?>     
    </div>
