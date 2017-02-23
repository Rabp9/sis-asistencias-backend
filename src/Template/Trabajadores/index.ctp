<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Trabajadore'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="trabajadores index large-9 medium-8 columns content">
    <h3><?= __('Trabajadores') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('dni') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombres') ?></th>
                <th scope="col"><?= $this->Paginator->sort('apellidoPaterno') ?></th>
                <th scope="col"><?= $this->Paginator->sort('apellidoMaterno') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($trabajadores as $trabajadore): ?>
            <tr>
                <td><?= h($trabajadore->dni) ?></td>
                <td><?= h($trabajadore->nombres) ?></td>
                <td><?= h($trabajadore->apellidoPaterno) ?></td>
                <td><?= h($trabajadore->apellidoMaterno) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $trabajadore->dni]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $trabajadore->dni]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $trabajadore->dni], ['confirm' => __('Are you sure you want to delete # {0}?', $trabajadore->dni)]) ?>
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
