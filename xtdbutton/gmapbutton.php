<?php

 // no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.plugin.plugin' );

class plgButtonGmapbutton extends JPlugin {

    function plgButtonGmapbutton(& $subject, $config)
    {
        parent::__construct($subject, $config);
    }
    function onDisplay($name)
    {
        $js =  "function XTDButtonClick(editor) {
			txt = prompt('Please enter address','street nr, town');
			if (!txt) return;
			jInsertEditorText('{mosmap address=\''+txt+'\'}', editor);
		}";
				
        $doc = & JFactory::getDocument();
        $doc->addScriptDeclaration($js);
		
        $button = new JObject;		
	$button->modal = false;
	$button->class = 'btn';
	$button->link = '#';
	$button->text = JText::_('Insert Gmap');
	$button->name = 'flag';
	$button->onclick = 'XTDButtonClick(\''.$name.'\'); return false;';
		
        return $button;
    }
}
