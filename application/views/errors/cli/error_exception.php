<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

An uncaught Exception was encountered

Type:        <?php echo esc_html (get_class($exception)), "\n"; ?>
Message:     <?php echo esc_html ($message, "\n"); ?>
Filename:    <?php echo esc_html ($exception->getFile()), "\n"; ?>
Line Number: <?php echo esc_html ($exception->getLine()); ?>

<?php if (defined('SHOW_DEBUG_BACKTRACE') && SHOW_DEBUG_BACKTRACE === TRUE): ?>

Backtrace:
<?php	foreach ($exception->getTrace() as $error): ?>
<?php		if (isset($error['file']) && strpos($error['file'], realpath(BASEPATH)) !== 0): ?>
	File: <?php echo esc_html ($error['file'], "\n"); ?>
	Line: <?php echo esc_html ($error['line'], "\n"); ?>
	Function: <?php echo esc_html ($error['function'], "\n\n"); ?>
<?php		endif ?>
<?php	endforeach ?>

<?php endif ?>
