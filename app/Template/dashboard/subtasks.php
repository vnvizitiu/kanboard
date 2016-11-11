<div class="page-header">
    <h2><?= $this->url->link(t('My subtasks'), 'DashboardController', 'subtasks', array('user_id' => $user['id'])) ?> (<?= $paginator->getTotal() ?>)</h2>
</div>
<?php if ($paginator->isEmpty()): ?>
    <p class="alert"><?= t('There is nothing assigned to you.') ?></p>
<?php else: ?>
    <table class="table-striped table-small table-scrolling">
        <tr>
            <th class="column-5"><?= $paginator->order('Id', \Kanboard\Model\TaskModel::TABLE.'.id') ?></th>
            <th class="column-20"><?= $paginator->order(t('Project'), 'project_name') ?></th>
            <th><?= $paginator->order(t('Task'), 'task_name') ?></th>
            <th><?= $paginator->order(t('Subtask'), \Kanboard\Model\SubtaskModel::TABLE.'.title') ?></th>
            <?= $this->hook->render('template:dashboard:subtasks:header:before-timetracking', array('paginator' => $paginator)) ?>
            <th class="column-20"><?= t('Time tracking') ?></th>
        </tr>
        <?php foreach ($paginator->getCollection() as $subtask): ?>
        <tr>
            <td class="task-table color-<?= $subtask['color_id'] ?>">
                <?= $this->render('task/dropdown', array('task' => array('id' => $subtask['task_id'], 'project_id' => $subtask['project_id']))) ?>
            </td>
            <td>
                <?= $this->url->link($this->text->e($subtask['project_name']), 'BoardViewController', 'show', array('project_id' => $subtask['project_id'])) ?>
            </td>
            <td>
                <?= $this->url->link($this->text->e($subtask['task_name']), 'TaskViewController', 'show', array('task_id' => $subtask['task_id'], 'project_id' => $subtask['project_id'])) ?>
            </td>
            <td>
                <?= $this->subtask->toggleStatus($subtask, $subtask['project_id']) ?>
            </td>
            <?= $this->hook->render('template:dashboard:subtasks:rows', array('subtask' => $subtask)) ?>
            <td>
                <?php if (! empty($subtask['time_spent'])): ?>
                    <strong><?= $this->text->e($subtask['time_spent']).'h' ?></strong> <?= t('spent') ?>
                <?php endif ?>

                <?php if (! empty($subtask['time_estimated'])): ?>
                    <strong><?= $this->text->e($subtask['time_estimated']).'h' ?></strong> <?= t('estimated') ?>
                <?php endif ?>
            </td>
        </tr>
        <?php endforeach ?>
    </table>

    <?= $paginator ?>
<?php endif ?>
