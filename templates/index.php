<h2 class="content__main-heading">Список задач</h2>

<form class="search-form" action="index.html" method="post">
    <input class="search-form__input" type="text" name="" value="" placeholder="Поиск по задачам">

    <input class="search-form__submit" type="submit" name="" value="Искать">
</form>

<div class="tasks-controls">
    <nav class="tasks-switch">
        <a href="/" class="tasks-switch__item tasks-switch__item--active">Все задачи</a>
        <a href="/" class="tasks-switch__item">Повестка дня</a>
        <a href="/" class="tasks-switch__item">Завтра</a>
        <a href="/" class="tasks-switch__item">Просроченные</a>
    </nav>

    <label class="checkbox">
        <a href="/">
            <?php if ($completeTasks == 1) : ?>
            <input class='checkbox__input visually-hidden' type='checkbox' checked>
            <?php else: ?>
            <input class='checkbox__input visually-hidden' type='checkbox'>
            <?php endif; ?>
            <!--добавить сюда аттрибут "checked", если переменная $show_complete_tasks равна единице-->
            <span class="checkbox__text">Показывать выполненные</span>
        </a>
    </label>
</div>

<table class="tasks">
    <?php foreach ($tasks as $key => $value): ?>
        <?php $until_deadline = (strtotime($value['deadline']) - time()); ?>
            <?php if ($value['readiness'] == true): ?>
            <tr class="tasks__item task task--completed">
            <?php else: ?>
                <?php if ($until_deadline <= 86400): ?>
                <tr class="tasks__item task task--important">
                <?php else: ?>
                <tr class="tasks__item task">
                <?php endif; ?>
            <?php endif; ?>

                <td class="task__select">
                    <label class="checkbox task__checkbox">
                        <?php if ($value['readiness'] == true): ?>
                        <input class="checkbox__input visually-hidden" type="checkbox" checked>
                        <?php else: ?>
                        <input class="checkbox__input visually-hidden" type="checkbox">
                        <?php endif; ?>
                        <a href="/"><span class="checkbox__text"><?=htmlspecialchars($value['title']); ?></span></a>
                    </label>
                </td>

                <td class="task__file">
                    <?=htmlspecialchars($value['category']); ?>
                </td>

                <td class="task__date"><?=htmlspecialchars($value['deadline']); ?></td>
            </tr>
    <?php endforeach; ?>
</table>
