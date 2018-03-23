<div>
	<h2>Users</h2>
    <?php echo anchor('admin/user/edit', '<span class="fa fa-plus"></span> Add User', array('class' => 'ink-button')); ?>
    <table class="ink-table alternating top-space">
		<thead>
			<tr>
				<th class="align-left">Email</th>
				<th class="align-left">Edit</th>
				<th class="align-left">Delete</th>
			</tr>
		</thead>
		<tbody>
            <?php if (count($users)): foreach ($users as $user):?>
            <tr>
				<td><?php echo anchor('admin/user/edit/'.$user->id, $user->email); ?></td>
				<td><?php echo btn_edit('admin/user/edit/'. $user->id); ?></td>
				<td><?php echo btn_delete('admin/user/delete/'. $user->id); ?></td>
			</tr>
            <?php endforeach;?>
            <?php else:?>
            <tr>
				<td colspan="3">No records!</td>
			</tr>
            <?php endif;?>
         </tbody>
	</table>
</div>