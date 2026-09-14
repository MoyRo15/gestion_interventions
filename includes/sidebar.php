<?php
   if (session_status() === PHP_SESSION_NONE)
 {
       session_start();
    }
?>

<button class="menu-toggle" onclick="document.querySelector('.sidebar').classList.toggle('active'); document.querySelector('.sidebar-overlay').classList.toggle('active');">
    ☰
</button>

<div class="sidebar-overlay" onclick="document.querySelector('.sidebar').classList.remove('active'); this.classList.remove('active');"></div>

<div class="sidebar">

    <h2>MENU</h2>

    <ul>
        <li><a href="../dashboard/index.php">🏠 Tableau de bord</a></li>
       <?php if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'responsable'): ?>
        <li><a href="../statistiques/index.php">📊 Statistiques</a></li>
        <?php endif; ?>
        <li><a href="../planification/index.php">📆Planifications</a></li>
        <?php if ($_SESSION['role'] == 'admin' 
        || $_SESSION['role'] == 'responsable' || $_SESSION['role'] == 'technicien'): ?>

<li><a href="../clients/index.php">👥 Clients</a></li>
      <?php endif;?>
       
        <li><a href="../interventions/ajouter.php">🔧 Nouvelle Intervention</a></li>
        <li><a href="../interventions/index.php">📄 Liste d'intervention</a></li>
        <li><a href="../techniciens/index.php">👨‍🔧 Techniciens</a></li>
        <li><a href="../rapports/index.php">📊 Rapports</a></li>
      <?php 
      if (isset($_SESSION['role'])&& $_SESSION['role'] ==='admin'):
      ?>
        <li><a href="../admin/index.php">⚙️Administration</a></li>
        <?php endif;?>
        <li><a href="../auth/logout.php">🚪 Déconnexion</a></li>
    </ul>

</div>

<script>
document.querySelectorAll('.sidebar a').forEach(function(link) {
    link.addEventListener('click', function() {
        if (window.innerWidth <= 800) {
            document.querySelector('.sidebar').classList.remove('active');
            document.querySelector('.sidebar-overlay').classList.remove('active');
        }
    });
});
</script>
