<?php if (isset($data['error'])): ?>
  <div class="alert alert-danger"><?= $data['error'] ?></div>
<?php else: ?>
  <div class="alert <?= $data['alert'] ?>">
    Hi <strong><?= htmlspecialchars($data['name']) ?></strong>, your BMI is
    <strong><?= $data['bmi'] ?></strong> which means you're
    <strong><?= $data['status'] ?></strong>.
  </div>
<?php endif; ?>
