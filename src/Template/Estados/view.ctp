<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Estado'), ['action' => 'edit', $estado->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Estado'), ['action' => 'delete', $estado->id], ['confirm' => __('Are you sure you want to delete # {0}?', $estado->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Estados'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Estado'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Trabajadores'), ['controller' => 'Trabajadores', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Trabajadore'), ['controller' => 'Trabajadores', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="estados view large-9 medium-8 columns content">
    <h3><?= h($estado->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Descripcion') ?></th>
            <td><?= h($estado->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($estado->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Trabajadores') ?></h4>
        <?php if (!empty($estado->trabajadores)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Dni') ?></th>
                <th scope="col"><?= __('Nombres') ?></th>
                <th scope="col"><?= __('ApellidoPaterno') ?></th>
                <th scope="col"><?= __('ApellidoMaterno') ?></th>
                <th scope="col"><?= __('Estado Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($estado->trabajadores as $trabajadores): ?>
            <tr>
                <td><?= h($trabajadores->dni) ?></td>
                <td><?= h($trabajadores->nombres) ?></td>
                <td><?= h($trabajadores->apellidoPaterno) ?></td>
                <td><?= h($trabajadores->apellidoMaterno) ?></td>
                <td><?= h($trabajadores->estado_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Trabajadores', 'action' => 'view', $trabajadores->dni]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Trabajadores', 'action' => 'edit', $trabajadores->dni]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Trabajadores', 'action' => 'delete', $trabajadores->dni], ['confirm' => __('Are you sure you want to delete # {0}?', $trabajadores->dni)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
