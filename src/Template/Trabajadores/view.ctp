<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Trabajadore'), ['action' => 'edit', $trabajadore->dni]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Trabajadore'), ['action' => 'delete', $trabajadore->dni], ['confirm' => __('Are you sure you want to delete # {0}?', $trabajadore->dni)]) ?> </li>
        <li><?= $this->Html->link(__('List Trabajadores'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Trabajadore'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="trabajadores view large-9 medium-8 columns content">
    <h3><?= h($trabajadore->dni) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Dni') ?></th>
            <td><?= h($trabajadore->dni) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombres') ?></th>
            <td><?= h($trabajadore->nombres) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ApellidoPaterno') ?></th>
            <td><?= h($trabajadore->apellidoPaterno) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ApellidoMaterno') ?></th>
            <td><?= h($trabajadore->apellidoMaterno) ?></td>
        </tr>
    </table>
</div>
