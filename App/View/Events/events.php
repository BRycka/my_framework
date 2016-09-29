<div class="content">
	<h1>Events</h1>
	<a href=<?php echo BASE_URL . "/Events/create"?>>New Event</a>
	<table border="1">
		<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Lastname</th>
		</tr>
		</thead>
		<tbody>
		<?php
		foreach ($params['data']['list'] as $data) {
		?>
			<tr>
				<td><a href="<?php echo BASE_URL . '/Events/edit/' . $data['id']; ?>"><?php echo $data['id'] ?></a></td>
				<td><?php echo $data['name']; ?></td>
				<td><?php echo $data['lastname']; ?></td>
			</tr>

		<?php
		}
		?>
		</tbody>
	</table>
</div>
