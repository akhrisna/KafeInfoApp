<?php

	/** development or live settings */
	if($_SERVER["DOCUMENT_ROOT"] == "/home/web/snl242676") 
	{
		// Instead of using a symlink, redirect the browser to the correct file (LIVE)
		Header("Location:/web");
	} 
	else 
	{
		// Instead of using a symlink, redirect the browser to the correct file
		Header("Location: /workspace/ki/web/");
	}
   	exit();   
?>
