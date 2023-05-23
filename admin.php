<?php

require_once 'model/apps.php';

if( ! $apps = getApps() ) die( 'No apps found' );
?>

<table>
	<thead>
		<tr>
			<td>Date</td>
			<td>Name</td>
			<td>Phone</td>
		</tr>
	</thead>

	<tbody>
		<?php
		foreach( $apps as $app ){
			?>
			<tr>
				<td><?=$app['date']?></td>
				<td><?=$app['name']?></td>
				<td><?=$app['phone']?></td>
			</tr>
			<?php
		}
		?>
	</tbody>
</table>

