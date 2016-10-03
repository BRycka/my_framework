<div class="content">

	<h3>Event/Edit <?php echo '#' . $params['data']['id']; ?></h3>

	<table>
		<form action="" method="post">
			<tbody>
			<tr>
				<td><label for="name">Vieta</label></td>
				<td><input type="text" id="location" name="location" value="<?php echo $params['data']['location'];?>"></td>
			</tr>
			<tr>
				<td><label for="lastname">Laikas</label></td>
				<td><input type="text" id="date_time" name="date_time" value="<?php echo $params['data']['date_time'];?>"></td>
			</tr>
			<tr>
				<td><label for="lastname">Kaina</label></td>
				<td><input type="text" id="price" name="price" value="<?php echo $params['data']['price'];?>"></td>
			</tr>
			<tr>
				<td><label for="lastname">Būsena</label></td>
				<td><input type="text" id="event_status" name="event_status" value="<?php echo $params['data']['event_status'];?>"></td>
			</tr>
			<tr>
				<td><label for="lastname">Apmokėjimas</label></td>
				<td><input type="text" id="is_paid" name="is_paid" value="<?php echo $params['data']['is_paid'];?>"></td>
			</tr>
			<tr>
				<td><label for="lastname">Užsakovas</label></td>
				<td><input type="text" id="customer_id" name="customer_id" value="<?php echo $params['data']['customer_id'];?>"></td>
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
