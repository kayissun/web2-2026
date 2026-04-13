<!-- SIDEBAR -->
<style>
    .sidebar {
        width: 250px;
        min-height: 100vh;
        background: #ffffff;
        box-shadow: 2px 0 12px rgba(0,0,0,0.05);
        border-right: 1px solid #eee;
    }

    .sidebar .nav-link {
        color: #555;
        padding: 10px 15px;
        border-radius: 10px;
        margin-bottom: 6px;
        transition: all 0.2s ease;
        font-size: 14px;
    }

    .sidebar .nav-link:hover {
        background: #f1f3f5;
        color: #0d6efd;
    }

    .sidebar .nav-link.active {
        background: #0d6efd;
        color: white;
        font-weight: 500;
    }

    .sidebar-title {
        font-weight: bold;
        color: #333;
    }
</style>

<div class="sidebar p-3">

    <h5 class="sidebar-title mb-4">Admin Panel</h5>

    <ul class="nav flex-column">

        <!-- DASHBOARD -->
        <li class="nav-item">
            <a href="index.php?page=dashboard_admin" 
               class="nav-link <?= ($_GET['page'] ?? '') == 'dashboard_admin' ? 'active' : '' ?>">
               🏠 Dashboard
            </a>
        </li>

        <!-- MAHASISWA -->
        <li class="nav-item">
            <a href="index.php?page=mahasiswa" 
               class="nav-link <?= ($_GET['page'] ?? '') == 'mahasiswa' ? 'active' : '' ?>">
               👨‍🎓 Mahasiswa
            </a>
        </li>

        <!-- TUGAS -->
        <li class="nav-item">
            <a href="index.php?page=tugas" 
               class="nav-link <?= ($_GET['page'] ?? '') == 'tugas' ? 'active' : '' ?>">
               📚 Tugas
            </a>
        </li>

    </ul>

    <hr>

    <!-- LOGOUT -->
    <a href="index.php?page=logout" class="btn btn-outline-danger w-100">
        Logout
    </a>

</div>