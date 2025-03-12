<?php defined( 'ABSPATH' ) || exit; ?>
<div id="omnipress">
	<style>
	.container{width:100vw;height:100vh;position:fixed;top:0;left:0;background:#0b3389;display:flex;flex-direction:column;align-items:stretch;justify-content:center;align-content:center}.flex{min-height:60pt}@keyframes loading{0%{width:50pt;height:50pt;margin-top:0}25%{height:4pt;margin-top:23pt}50%{width:4pt}75%{width:50pt}100%{width:50pt;height:50pt;margin-top:0}}.loader{width:50pt;height:50pt;border-radius:100%;border:#6767fa 4pt solid;margin-left:auto;margin-right:auto;background-color:transparent;animation:loading 1s infinite}.load-text{padding-top:15px;text-align:center;font:14pt "Helvetica Neue",Helvetica,Arial,sans-serif;color:#fff}
	</style>
	<div class="container op-bg-primary">
		<div class="flex"><div class="loader"></div></div>
		<div class="load-text"> Loading... </div>
	</div>
	<?php do_action( 'omnipress_admin_render' ); ?>
</div>
