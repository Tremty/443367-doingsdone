<?php
function getTasksCount($all_tasks_arr, $category_title) {
    $tasks_count = 0;
    if ($category_title == "Все") {
        $tasks_count = count($all_tasks_arr);
    } else {
        foreach ($all_tasks_arr as $key => $value) {
            if ($category_title == $value['category']) {
                $tasks_count = $tasks_count + 1;
            }
        }
    }
    return $tasks_count;
}

function renderTemplate($path, $pageData) {
    if ($path and $pageData) {
        ob_start();
        extract($pageData);
        require_once($path);
        $full_html = ob_get_clean();
    } else {
        $full_html = "";
    }
    return $full_html;
}

?>
