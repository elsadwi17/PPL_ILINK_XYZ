<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: <?php echo esc_attr ($severity); ?></p>
<p>Message:  <?php echo esc_attr ($message); ?></p>
<p>Filename: <?php echo esc_attr ($filepath); ?></p>
<p>Line Number: <?php echo $line; ?></p>

<?php if (defined('SHOW_DEBUG_BACKTRACE') && SHOW_DEBUG_BACKTRACE === TRUE): ?>

	<p>Backtrace:</p>
	<?php foreach (debug_backtrace() as $error): ?>

		<?php if (isset($error['file']) && strpos($error['file'], realpath(BASEPATH)) !== 0): ?>

			<p style="margin-left:10px">
			File: <?php echo esc_attr ($error['file']) ?><br />
			Line: <?php echo esc_attr ($error['line']) ?><br />
			Function: <?php echo esc_attr ($error['function']) ?>
			</p>

		<?php endif ?>

	<?php endforeach ?>

<?php endif ?>

</div>