<nav>
    <?php if (isset($_SESSION["id_admin"])) : ?>
        <div class="role">ADMIN</div>
    <?php else : ?>
        <div class="role">PENGUNJUNG</div>
    <?php endif ?>
</nav>