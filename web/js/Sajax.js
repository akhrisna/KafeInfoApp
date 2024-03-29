/*
 * (c) copyright 2005 modernmethod, inc
 * All rights reserved.
 *
 * BSD Licence
 */
var sajax_debug_mode = false;
var sajax_request_type = "GET";
var sajax_target_id = "";
var sajax_failure_redirect = "";

// added
var sajax_uri = "";
var sajax_asynchronous = true;

function sajax_debug(text) {
	if (sajax_debug_mode)
		alert(text);
}

	function sajax_init_object() {
		sajax_debug("sajax_init_object() called..")
		
		var A;
		
		var msxmlhttp = new Array(
		'Msxml2.XMLHTTP.5.0',
		'Msxml2.XMLHTTP.4.0',
		'Msxml2.XMLHTTP.3.0',
		'Msxml2.XMLHTTP',
		'Microsoft.XMLHTTP');
	for (var i = 0; i < msxmlhttp.length; i++) {
		try {
			A = new ActiveXObject(msxmlhttp[i]);
		} catch (e) {
			A = null;
		}
	}
		
	if(!A && typeof XMLHttpRequest != "undefined")
		A = new XMLHttpRequest();
	if (!A)
		sajax_debug("Could not create connection object.");
	return A;
}

var sajax_requests = new Array();

function sajax_cancel() {
	for (var i = 0; i < sajax_requests.length; i++) 
		sajax_requests[i].abort();
}

function sajax_do_call(func_name, args) {
	var i, x, n;
	var uri;
	var post_data;
	var target_id;
	
	sajax_debug("in sajax_do_call().." + sajax_request_type + "/" + sajax_target_id);
	target_id = sajax_target_id;
	if (typeof(sajax_request_type) == "undefined" || sajax_request_type == "") 
		sajax_request_type = "GET";
	
	uri = sajax_uri;
	if (sajax_request_type == "GET") {
	
		if (uri.indexOf("?") == -1) 
			uri += "?rs=" + escape(func_name);
		else
			uri += "&rs=" + escape(func_name);
		uri += "&rst=" + escape(sajax_target_id);
		uri += "&rsrnd=" + new Date().getTime();
		
		for (i = 0; i < args.length-1; i++) 
			uri += "&rsargs[]=" + escape(args[i]);

		post_data = null;
	} 
	else if (sajax_request_type == "POST") {
		post_data = "rs=" + escape(func_name);
		post_data += "&rst=" + escape(sajax_target_id);
		post_data += "&rsrnd=" + new Date().getTime();
		
		for (i = 0; i < args.length-1; i++) 
			post_data = post_data + "&rsargs[]=" + escape(args[i]);
	}
	else {
		alert("Illegal request type: " + sajax_request_type);
	}
	
	x = sajax_init_object();
	if (x == null) {
		if (sajax_failure_redirect != "") {
			location.href = sajax_failure_redirect;
			return false;
		} else {
			sajax_debug("NULL sajax object for user agent:\n" + navigator.userAgent);
			return false;
		}
	} else {
		sajax_debug('asynchronous: '+sajax_asynchronous);
		x.open(sajax_request_type, uri, sajax_asynchronous);
		// window.open(uri);
		
		sajax_requests[sajax_requests.length] = x;
		
		if (sajax_request_type == "POST") {
			x.setRequestHeader("Method", "POST " + uri + " HTTP/1.1");
			x.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		}
	
		var readyFunc = function() {
			if (x.readyState != 4) 
				return;

			sajax_debug("received " + x.responseText);
		
			var status;
			var data;
			var txt = x.responseText.replace(/^\s*|\s*$/g,"");
			status = txt.charAt(0);
			data = txt.substring(2);

			if (status == "") {
				// let's just assume this is a pre-response bailout and let it slide for now
			} else if (status == "-") 
				alert("Error: " + data);
			else {
				if (target_id != "") 
					document.getElementById(target_id).innerHTML = eval(data);
				else {
					try {
						var callback;
						var extra_data = false;
						if (typeof args[args.length-1] == "object") {
							callback = args[args.length-1].callback;
							extra_data = args[args.length-1].extra_data;
						} else {
							callback = args[args.length-1];
						}
						callback(eval(data), extra_data);
					} catch (e) {
						sajax_debug("Caught error " + e + ": Could not eval " + data );
					}
				}
			}
		}
	}
	
	if(sajax_asynchronous) {
		x.onreadystatechange = readyFunc;
	}
	sajax_debug(func_name + " uri = " + uri + "/post = " + post_data);
	x.send(post_data);
	if(!sajax_asynchronous) {
		readyFunc();
	}
	delete x;
	sajax_debug(func_name + " waiting..");
	return true;
}