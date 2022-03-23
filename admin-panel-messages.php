<?php
include "admin-pages/admin-header.php";
?>
<div class="row">
	<div class="container col s12 stripped">
		<div class="col s12">
			<h2>All Messages</h2>
		</div>
		<table>
			<thead>
				<tr>
					<th>RB</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email</th>
					<th>Message</th>
					<th></th>
				</tr>
			</thead>

			<tbody>

				<?php
				$rb = 1;
				$allMessages = getAllMessages();

				foreach ($allMessages as $message) :
				?><tr>
						<td><?= $rb++ ?></td>
						<td><?= $message->name ?></td>
						<td><?= $message->lastName ?></td>
						<td><?= $message->email ?></td>
						<td><?= $message->message ?></td>
						<td>
						<td><a class=" waves-effect waves-light btn  btn-deleteMessage" id="<?= $message->idMessage ?>">Delete</a></td>
						</td>
					<tr>
					<?php
				endforeach;
					?>
					</tr>
			</tbody>
		</table>
	</div>
</div>

<?php
include "admin-pages/admin-footer.php";
?>