<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Condicione'), ['action' => 'edit', $condicione->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Condicione'), ['action' => 'delete', $condicione->id], ['confirm' => __('Are you sure you want to delete # {0}?', $condicione->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Condiciones'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Condicione'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Estados'), ['controller' => 'Estados', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Estado'), ['controller' => 'Estados', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="condiciones view large-9 medium-8 columns content">
    <h3><?= h($condicione->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Descripcion') ?></th>
            <td><?= h($condicione->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Estado') ?></th>
            <td><?= $condicione->has('estado') ? $this->Html->link($condicione->estado->id, ['controller' => 'Estados', 'action' => 'view', $condicione->estado->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($condicione->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Asistencia') ?></th>
            <td><?= $condicione->asistencia ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tardanza') ?></th>
            <td><?= $condicione->tardanza ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
