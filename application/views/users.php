<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">

	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/style.css" />
	<style>
		/* Add some basic styles for buttons */
		.btn {
			padding: 5px 10px;
			background-color: #007BFF;
			color: white;
			text-decoration: none;
			border: none;
			cursor: pointer;
		}

		.btn-primary {
			background-color: #007BFF;
		}

		.btn-danger {
			background-color: #DC3545;
		}

		/* Style the table */
		.datatable {
			border-collapse: collapse;
			width: 100%;
		}

		.datatable th,
		.datatable td {
			padding: 8px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}

		/* Add alternating row colors */
		.datatable tr:nth-child(even) {
			background-color: #f2f2f2;
		}
	</style>
</head>

<body>

	<div>
		<h1>User lists</h1>

		<div>
			<a href="<?= site_url('/usercontroller/create') ?>" class="btn btn-primary">Create User</a>
		</div>

		<div id="body">
			<?php
			if ($users) {
			?>
				<table class="datatable">
					<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Gender</th>
							<th>Mobile</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 0;
						foreach ($users as $user) {
							$col_class = ($i % 2 == 0 ? 'odd_col' : 'even_col');
							$i++;
						?>
							<tr class="<?php echo $col_class; ?>">
								<td>
									<?php echo isset($user->name) ? $user->name : 'N/A'; ?>
								</td>
								<td>
									<?php echo isset($user->email) ? $user->email : 'N/A'; ?>
								</td>
								<td>
									<?php echo isset($user->gender) ? $user->gender : 'N/A'; ?>
								</td>
								<td>
									<?php echo isset($user->mobile) ? $user->mobile : 'N/A'; ?>
								</td>
								<td>
									<a href="<?= site_url('/usercontroller/update/' . $user->_id) ?>" class="btn btn-primary">Update</a>
									<a href="<?= site_url('/usercontroller/delete/' . $user->_id) ?>" class="btn btn-danger" onclick="return confirm('Do you want to delete this record?')">Delete</a>
								</td>
							</tr>
						<?php
						}
						?>
					</tbody>
				</table>
			<?php
			} else {
				echo '<div style="color:red;"><p>No Record Found!</p></div>';
			}
			?>
		</div>
	</div>

</body>

</html>