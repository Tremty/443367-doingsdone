<?php

// показывать или нет выполненные задачи
$show_complete_tasks = rand(0, 1);

require_once('data.php');
require_once('config.php');
require_once('functions.php');




if ($config['enable']) {
    $project_id = 0;

    if (isset($_GET['project'])) {
        $check = false;
        foreach ($projects as $key => $value) {
            if ($_GET['project'] == $key) {
                $project_id = $key;
                $check = true;
                break;
            }
        }
    }
    if (isset($check) && $check == false) {
        header("HTTP/1.0 404 Not Found");
        $layout_content = 'Ошибка';
    }
    else {
        $page_content = renderTemplate($config['tpl_path'] . 'index.php', ['projects' => $projects, 'tasks' => $tasks, 'completeTasks' => $show_complete_tasks]);
        $layout_content = renderTemplate($config['tpl_path'] . 'layout.php', ['projects' => $projects, 'tasks' => $tasks, 'content' => $page_content, 'page_title' => 'Дела в порядке',  'project_id' => $project_id]);
    }
} else {
    $layout_content = renderTemplate($config['tpl_path'] . 'off.php', ['projects' => $projects, 'tasks' => $tasks, 'error_msg' => 'Сайт находится на техническом обслуживании', 'page_title' => 'Дела в порядке',  'project_id' => $project_id]);
}

print($layout_content);
?>
