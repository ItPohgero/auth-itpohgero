<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= _APP ?></title>
	<link rel="stylesheet" href="/css/bootstrap.min.css">
</head>

<body>
	<div class="container col-6 pt-5">
		<div class="card text-center">
			<div class="card-header">
				<div class="mb-1">
					App Name
				</div>
				<h2><?= _APP ?></h2>
			</div>
			<div class="card-body">
				<div class="d-flex justify-content-between">
					<a href="<?= route_to('signin'); ?>" class="btn btn-success">Sign In</a>
					<a href="<?= route_to('signup'); ?>" class="btn btn-danger">Sign Up</a>
				</div>
			</div>
			<div class="card-footer">
				<p>Auth Aplikasi ini support untuk: <br> <code>Sign In, Sign Up, Verifikasi Email</code></p>
			</div>
		</div>
	</div>
</body>

</html>