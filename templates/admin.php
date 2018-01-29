<div class="wrap">
	<h1>MarkoDevTest</h1>
	<?php settings_errors(); ?>

	<ul class="nav nav-tabs">
		<li class="active"><a href="#tab-1">Marko DevTest</a></li>
	</ul>

	<div class="tab-content">
		<div id="tab-1" class="tab-pane active">

            <?php

            settings_fields( 'marko_options_group' );
            do_settings_sections('markodevtest');

            ?>

		</div>
	</div>
</div>