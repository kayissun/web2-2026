<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<style>
    body {
        font-family: 'Poppins', sans-serif;
    }

    @keyframes fadeInUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
    }

    .animate-content {
    animation: fadeInUp 0.5s ease-out forwards;
    }

</style>

<body class="bg-light d-flex align-items-center justify-content-center position-relative" style="height: 100vh; overflow:hidden;">

<!-- BACKGROUND BULAT -->
<div class="position-absolute top-0 start-0 bg-primary rounded-circle" 
     style="width: 400px; height: 400px; transform: translate(-30%, -30%); opacity: 0.1;">
</div>

<div class="position-absolute bottom-0 end-0 bg-primary rounded-circle" 
     style="width: 500px; height: 500px; transform: translate(30%, 30%); opacity: 0.1;">
</div>

<!-- CARD -->
<div class="card shadow border-0 rounded-4 overflow-hidden animate-content" style="max-width: 800px; width:100%;">
    
    <div class="row g-3">

        <!-- IMAGE -->
        <div class="col-md-6 d-none d-md-block">
            <img src="https://static.vecteezy.com/system/resources/previews/001/925/914/non_2x/online-library-concept-free-vector.jpg"
                 class="img img-fluid h-100 object-fit-cover ms-3" 
                 alt="perpus">
        </div>

        <!-- FORM LOGIN -->
        <div class="col-md-6">
            <div class="card-body p-3">

                <!-- TITLE -->
                <div class="mt-3 text-center">
                    <h4 class="fw-bold text-center">Login SiPus</h4>
                    <hr class="w-25 mx-auto fw-bold border border-primary">
                </div>
                <br>

                <!-- FORM -->
                <form method="POST" action="index.php?url=auth/login" class="mb-5">

                    
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-person"></i>
                            </span>
                            <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-lock"></i>
                            </span>
                            <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Role</label>
                        <select name="role" class="form-select" required>
                            <option value="">-- Pilih Role --</option>
                            <option value="admin">Admin</option>
                            <option value="petugas">Petugas</option>
                        </select>
                    </div>

                    <button class="btn btn-primary shadow-sm w-100">
                        Login
                    </button>

                </form>

            </div>
        </div>

    </div>

</div>

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

</body>
</html>