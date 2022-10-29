<?php echo $this->extend('_common/layout') ?>
<?php echo $this->section('content');  ?>

<script>
    function confirma() {
        if (!confirm("Deseja excluir o registro?")) {
            return false;
        }
        return true;
    }
</script>


<nav aria-label="breadcrumb">

    <ol class="breadcrumb">
        <li class="breadcrumb-item"> <?php echo anchor('', 'Home') ?> </li>
        <li class="breadcrumb-item active" aria-current="page"> Categorias </li>
    </ol>

</nav>

<h1>Categorias</h1>

<div class="card">

    <div class="card-header">
        Categorias - <?php echo count($categorias) ?> registros encontrados
    </div>

    <div class="card-body">

        <div class="row no-gutters d-flex justify-content-center justify-content-sm-between">
            <div class="my-3">
                <?php echo anchor('categoria/create', 'Nova Categoria', ['class' => 'btn btn-primary']) ?>
            </div>

            <?php echo form_open('categoria', ['class' => 'form-inline', 'method' => 'GET']) ?>

            <div class="form-group d-flex justify-content-center my-3">
                <input type="search" name="search" autocomplete="off" placeholder="Busca..." class="form-control" value="<?php echo $search ?>">
                <input type="submit" value="OK" class="ml-2 btn btn-primary">
            </div>

            </form>


        </div>

        <div class="table-responsive">
            <table class="table table-stripped table-hover">
                <thead>
                    <tr class="bg-dark text-white">
                        <th>Descrição</th>
                        <th>Tipo</th>
                        <th class="text-center">Ação</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($categorias as $categoria) : ?>

                        <?php $class = $categoria['tipo'] == 'd' ? 'text-danger' : 'text-success' ?>
                        <?php $tipo_tratado = $categoria['tipo'] == 'd' ? 'Despesa' : 'Receita' ?>

                        <tr>
                            <td class="pl-5 <?php echo $class; ?>"><?php echo $categoria['descricao'] ?></td>
                            <td class="pl-5 <?php echo $class; ?>"><?php echo $tipo_tratado ?></td>
                            <td class="text-center">
                                <?php echo anchor("categoria/{$categoria['chave']}/edit", 'Editar', ['class' => 'btn btn-success btn-sm']) ?>
                                -
                                <?php echo anchor("categoria/{$categoria['chave']}/delete", 'Excluir', ['class' => 'btn btn-danger btn-sm', 'onclick' => 'return confirma()']) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="text-center">
        <?php echo $pager->links('default', 'bootstrap_pager')  ?>
    </div>
</div>
<?php echo $this->endSection('content'); ?>