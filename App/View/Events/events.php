<div class="content">
	<h1>Užsakymai</h1>
	<a href=<?php echo BASE_URL . "/Events/create"?>>Kurti naują</a>
	<table border="1">
		<thead>
		<tr>
			<th>ID</th>
			<th>Vieta</th>
			<th>Laikas</th>
			<th>Kaina</th>
			<th>Būsena</th>
			<th>Apmokėjimas</th>
			<th>Užsakovas</th>
		</tr>
		</thead>
		<tbody>
		<?php
		foreach ($params['data']['list'] as $data) {
		?>
			<tr>
				<td><a href="<?php echo BASE_URL . '/Events/edit/' . $data['id']; ?>"><?php echo $data['id'] ?></a></td>
				<td><?php echo $data['location']; ?></td>
				<td><?php echo $data['date_time']; ?></td>
				<td><?php echo $data['price']; ?></td>
				<td><?php echo $data['event_status']; ?></td>
				<td><?php echo $data['is_paid']; ?></td>
				<td><?php echo $data['customer_id']; ?></td>
			</tr>

		<?php
		}
		?>
		</tbody>
	</table>
</div>
