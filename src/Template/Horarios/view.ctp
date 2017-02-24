<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Horario'), ['action' => 'edit', $horario->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Horario'), ['action' => 'delete', $horario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $horario->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Horarios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Horario'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Estados'), ['controller' => 'Estados', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Estado'), ['controller' => 'Estados', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="horarios view large-9 medium-8 columns content">
    <h3><?= h($horario->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Descripcion') ?></th>
            <td><?= h($horario->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Estado') ?></th>
            <td><?= $horario->has('estado') ? $this->Html->link($horario->estado->id, ['controller' => 'Estados', 'action' => 'view', $horario->estado->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($horario->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('HoraInicio') ?></th>
            <td><?= h($horario->horaInicio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('HoraFin') ?></th>
            <td><?= h($horario->horaFin) ?></td>
        </tr>
    </table>
</div>
