<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5 col-md-4">
    <div class="card">
        <div class="card-body">
            <h4 class="mb-3">Login</h4>

            <?php if(isset($_GET['error'])): ?>
                <?php if($_GET['error'] == 2): ?>
                    <div class="alert alert-danger">User tidak ditemukan</div>
                <?php elseif($_GET['error'] == 3): ?>
                    <div class="alert alert-danger">Password salah</div>
                <?php else: ?>
                    <div class="alert alert-danger">Login gagal</div>
                <?php endif; ?>
            <?php endif; ?>

            <form method="POST" action="index.php?page=login-proses">
                <input type="text" name="username" class="form-control mb-2" placeholder="Username" required>
                <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
                <button class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>