<!-- SIDEBAR -->
<style>
    .sidebar {
        width: 250px;
        min-height: 100vh;
        background: #f8f9fa;
        box-shadow: 2px 0 10px rgba(0,0,0,0.05);
    }

    .sidebar .nav-link {
        color: #333;
        padding: 10px 15px;
        border-radius: 8px;
        margin-bottom: 5px;
        transition: all 0.2s ease;
    }

    .sidebar .nav-link:hover {
        background: #e9ecef;
        color: #0d6efd;
    }

    .sidebar .nav-link.active {
        background: #0d6efd;
        color: white;
        font-weight: 500;
    }

    .sidebar-title {
        margin-left: 1rem;
        font-weight: bold;
        color: #333;
    }
</style>

<div class="sidebar p-3">

    <h5 class="sidebar-title mb-4">Dashboard</h5>

    <ul class="nav flex-column">

    <li class="nav-item">
        <a href="index.php?page=dashboard_mahasiswa" 
        class="nav-link <?= ($_GET['page'] ?? '') == 'dashboard_mahasiswa' ? 'active' : '' ?>">
        🏠 Dashboard
        </a>
    </li>

    </ul>

    <hr>

    <a href="index.php?page=logout" class="btn btn-outline-danger w-100">
        Logout
    </a>

</div>