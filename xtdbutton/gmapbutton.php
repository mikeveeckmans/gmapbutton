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
        $js =  "function sampleXTDButtonClick(editor) {
			txt = prompt('Please enter address','straat nr gemeente');
			if (!txt) return;
			jInsertEditorText('{mosmap width='500'|height='400'|'+txt+'|zoom='15'|
marker='1'|align='center'}', editor);
		}";
				
        $doc = & JFactory::getDocument();
        $doc->addScriptDeclaration($js);
		
        $button = new JObject;		
	$button->modal = false;
	$button->class = 'btn';
	$button->link = '#';
	$button->text = JText::_('Insert Gmap');
	$button->name = 'wand';
	$button->onclick = 'sampleXTDButtonClick(\''.$name.'\'); return false;';
		
        return $button;
    }
}
