<div class="content">

	<h3>Event/Edit <?php echo '#' . $params['data']['id']; ?></h3>

	<table>
		<form action="" method="post">
			<tbody>
			<tr>
				<td><label for="name">Name</label></td>
				<td><input type="text" id="name" name="name" value="<?php echo $params['data']['name'];?>"></td>
			</tr>
			<tr>
				<td><label for="lastname">Lastname</label></td>
				<td><input type="text" id="lastname" name="lastname" value="<?php echo $params['data']['lastname'];?>"></td>
			</tr>
			<tr>
				<td><input type="submit" name="updateEvent" value="Save"></td>
			</tr>
			</tbody>
		</form>
		<form action="" method="post">
			<td><input type="submit" name="deleteEvent" value="Delete"></td>
		</form>
	</table>
</div>
