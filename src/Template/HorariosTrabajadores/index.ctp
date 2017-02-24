<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Horarios Trabajadore'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Horarios'), ['controller' => 'Horarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Horario'), ['controller' => 'Horarios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Estados'), ['controller' => 'Estados', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Estado'), ['controller' => 'Estados', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="horariosTrabajadores index large-9 medium-8 columns content">
    <h3><?= __('Horarios Trabajadores') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('horario_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('trabajador_dni') ?></th>
                <th scope="col"><?= $this->Paginator->sort('estado_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fechaInicio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fechaFin') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($horariosTrabajadores as $horariosTrabajadore): ?>
            <tr>
                <td><?= $this->Number->format($horariosTrabajadore->id) ?></td>
                <td><?= $horariosTrabajadore->has('horario') ? $this->Html->link($horariosTrabajadore->horario->id, ['controller' => 'Horarios', 'action' => 'view', $horariosTrabajadore->horario->id]) : '' ?></td>
                <td><?= h($horariosTrabajadore->trabajador_dni) ?></td>
                <td><?= $horariosTrabajadore->has('estado') ? $this->Html->link($horariosTrabajadore->estado->id, ['controller' => 'Estados', 'action' => 'view', $horariosTrabajadore->estado->id]) : '' ?></td>
                <td><?= h($horariosTrabajadore->fechaInicio) ?></td>
                <td><?= h($horariosTrabajadore->fechaFin) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $horariosTrabajadore->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $horariosTrabajadore->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $horariosTrabajadore->id], ['confirm' => __('Are you sure you want to delete # {0}?', $horariosTrabajadore->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
