<div class="sidebar">
    <h3 class="text-center mb-4">StudyJam</h3>
    <a href="<?= base_url('dashboard'); ?>" class="<?= uri_string() == 'dashboard' ? 'active' : '' ?>">🏠 Home</a>
    <a href="<?= base_url('rewards'); ?>" class="<?= uri_string() == 'rewards' ? 'active' : '' ?>">🎁 Rewards</a>
    <a href="<?= base_url('scan'); ?>" class="<?= uri_string() == 'scan' ? 'active' : '' ?>">📷 Scan QR</a>
    <a href="<?= base_url('profile'); ?>" class="<?= uri_string() == 'profile' ? 'active' : '' ?>">👤 Profile</a>
</div>
