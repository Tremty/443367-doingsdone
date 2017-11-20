<?php

require_once('data.php');
require_once('config.php');
require_once('functions.php');

$page_content = renderTemplate($config['tpl_path'] . 'index.php', ['projects' => $projects, 'tasks' => $tasks]);

if ($config['enable']) {
    $layout_content = renderTemplate($config['tpl_path'] . 'layout.php', ['projects' => $projects, 'tasks' => $tasks, 'content' => $page_content, 'page_title' => 'Дела в порядке']);
} else {
    $layout_content = renderTemplate($config['tpl_path'] . 'off.php', ['projects' => $projects, 'tasks' => $tasks, 'error_msg' => 'Сайт находится на техническом обслуживании', 'page_title' => 'Дела в порядке']);
}

print($layout_content);
?>
