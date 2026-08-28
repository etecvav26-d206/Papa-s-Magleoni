<?php
require_once __DIR__ . '/includes/auth.php';
require_admin();
header('Location: crud.php?entity=pizzas&action=edit&id='.(int)($_GET['id']??0));
exit;
