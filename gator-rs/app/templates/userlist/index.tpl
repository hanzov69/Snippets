<? $Gator->display("components/header", array('title'  => '')); ?>

<div id="usl">
	<table>
		<thead>
			<tr>
				<th></th>
				<th>id</th>
				<th>username</th>
				<th>city</th>
				<th>st</th>
				<th>joined</th>
				<th>last seen</th>
			</tr>
		</thead>
		<tbody>
			<? foreach ($users as $user) : ?>
					<tr>
						<td>

						<? if (file_exists(APP_AVATARS . DIRSEP . $user['id'] . ".gif")) : ?>
							<img src="images/avatars/<?= $user['id']; ?>.gif" class="avatar_tiny">
						<? endif; ?>
						</td>
						<td><?=$user['id']; ?></td>
						<td><a href="?p=jerk&id=<?= $user['id']; ?>"><?=$user['username']; ?></a></td>
						<td><?=$location[$user['id']]['city']; ?></td>
						<td><?=$location[$user['id']]['state']; ?></td>
						<td><?= timeDiff(strtotime($user['time_first_seen'])); ?></td>
						<td><?= timeDiff(strtotime($user['time_last_seen'])); ?></td>
					</tr>
			<? endforeach; ?>
		</tbody>
	</table>
</div>

<? $Gator->display("components/footer"); ?>