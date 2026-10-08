<?php
variables([
	VARLinkToSectionHome => true,
	VAREmail => 'autosaint@amadeusweb.in',
	VAREmail2 => VARSystemEmail,
	VARPhone => $ph = '+91-90944-22331',
	VARWhatsapp => whatsapp_clean($ph),
]);

if (nodeIs(SITEHOME))
	setHtmlVariable(VARWelcomeMessage, getSnippet('welcome'));

function site_before_render() {
	autosetPageMenu([VARDontOverwriteLogo => true, VARLinkToNodeHome => true, VARLinkToSubnodeHome => true]);
}

function after_file() {
	$show = !nodeIs($thisSection = sectionValue()) || nodeIs(SITEHOME);
	if (!$show) return;

	sectionId('dir-list', 'container text-center content-box');
	h2(variable('name') .'\'s Sections');
	foreach (variable('sections') as $ix => $section)//TODO: use cssUX
		echo makeLink(humanize($section), pageUrl($section), false, false, 
			'btn m-2 '
			 . ($section == $thisSection ? 'btn-primary ' . cssUX::underline : 'btn-secondary'))
			 . ($ix % 4 == 2 ? BRNL : '');
	sectionEnd();
}
