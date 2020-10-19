<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

A PHP Error was encountered

Severity:    <?php echo esc_attr($severity, "\n"); ?>
Message:     <?php echo esc_attr($message, "\n"); ?>
Filename:    <?php echo esc_attr($filepath, "\n"); ?>
Line Number: <?php echo esc_attr($line); ?>

<?php if (defined('SHOW_DEBUG_BACKTRACE') && SHOW_DEBUG_BACKTRACE === TRUE): ?>

Backtrace:
<?php	foreach (debug_backtrace() as $error): ?>
<?php		if (isset($error['file']) && strpos($error['file'], realpath(BASEPATH)) !== 0): ?>
	File: <?php echo esc_attr ($error['file'], "\n"); ?>
	Line: <?php echo esc_attr ($error['line'], "\n"); ?>
	Function: <?php echo esc_attr ($error['function'], "\n\n"); ?>
<?php		endif ?>
<?php	endforeach ?>

<?php endif ?>
