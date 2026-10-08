<?php
variables([
	VARLinkToSectionHome => true,
	VAREmail => 'autosaint@amadeusweb.in',
	VAREmail2 => VARSystemEmail,
	VARPhone => $ph = '+91-90944-22331',
	VARWhatsapp => whatsapp_clean($ph),
]);

function site_before_render() {
	autosetPageMenu([VARDontOverwriteLogo => true, VARLinkToNodeHome => true, VARLinkToSubnodeHome => true]);
}
