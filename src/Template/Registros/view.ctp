<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Registro'), ['action' => 'edit', $registro->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Registro'), ['action' => 'delete', $registro->id], ['confirm' => __('Are you sure you want to delete # {0}?', $registro->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Registros'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Registro'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Condiciones'), ['controller' => 'Condiciones', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Condicione'), ['controller' => 'Condiciones', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="registros view large-9 medium-8 columns content">
    <h3><?= h($registro->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Trabajador Dni') ?></th>
            <td><?= h($registro->trabajador_dni) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Condicione') ?></th>
            <td><?= $registro->has('condicione') ? $this->Html->link($registro->condicione->id, ['controller' => 'Condiciones', 'action' => 'view', $registro->condicione->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Observacion') ?></th>
            <td><?= h($registro->observacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($registro->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha') ?></th>
            <td><?= h($registro->fecha) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Horario Hora In') ?></th>
            <td><?= h($registro->horario_hora_in) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Horario Hora Out') ?></th>
            <td><?= h($registro->horario_hora_out) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hora In') ?></th>
            <td><?= h($registro->hora_in) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hora Out') ?></th>
            <td><?= h($registro->hora_out) ?></td>
        </tr>
    </table>
</div>
