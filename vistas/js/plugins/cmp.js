var commandQueue = [];

var cmp = function(command, parameter, callback) {
	commandQueue.push({
		command: command,
		parameter: parameter,
		callback: callback
	});
};

cmp.commandQueue = commandQueue;
cmp.config = {
	// customPurposeListLocation: '',
	layout: null,
	storePublisherData: false,
	storeConsentGlobally: true,
	logging: false,
	localization: {},
	forceLocale: idioma,
	gdprAppliesGlobally: false,
	repromptOptions: {
		fullConsentGiven: 360,
		someConsentGiven: 30,
		noConsentGiven: 30,
	},
	geoIPVendor: 'https://cdn.digitrust.mgr.consensu.org/1/geoip.json',
	testingMode: 'normal'
};

window.__cmp = cmp;