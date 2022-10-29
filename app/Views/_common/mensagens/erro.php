<?php echo $this->extend('_common/layout') ?>
<?php echo $this->section('content')  ?>


<div class="alert alert-danger">
    <h4 class="alert-heading">Erro</h4>
    <hr>
    <p class="mb-0"> <?php echo isset($mensagem) ? $mensagem : 'Erro desconhecido'  ?> </p>
</div>

<p> <?php echo $link; ?> </p>

<?php echo $this->endSection('content')  ?>