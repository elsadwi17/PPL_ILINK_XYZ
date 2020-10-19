<?php
defined('BASEPATH') OR exit('No direct script access allowed');

echo esc_html ("\nDatabase error: ",
	$heading,
	"\n\n",
	$message,
	"\n\n");