<?php
require_once __DIR__ . '/includes/auth.php';
require_admin();
header('Location: crud.php?entity=pizzas&action=create');
exit;
