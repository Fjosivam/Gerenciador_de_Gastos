
<!-- lista de despesas -->

<center><h1><?php
if (isset($data)) {
  $a = date('m', strtotime($data));
  if($a == '01'){
    echo "Janeiro";
  }else if ($a == '02') {
    echo "Fevereiro";
  }else if ($a == '03') {
    echo "Março";
  }else if ($a == '04') {
    echo "Abril";
  }else if ($a == '05') {
    echo "Maio";
  }else if ($a == '06') {
    echo "Junho";
  }else if ($a == '07') {
    echo "Julho";
  }else if ($a == '08') {
    echo "Agosto";
  }else if ($a == '09') {
    echo "Setembro";
  }else if ($a == '10') {
    echo "Outubro";
  }else if ($a == '11') {
    echo "Novembro";
  }else if ($a == '12') {
    echo "Dezembro";
  }
echo " / ".date('Y', strtotime($data));;
}?></h1></center>

<div class="col-xs-12 col-lg-12">
  <h3 align="center" style="color:red;">Gasto do mês: R$ 
    <?php
    if (isset($dados)) {
      $a = 0;
      foreach ($dados as $dado) {
        $a += $dado->valor;
      }
      echo $a;
    }
    ?>
  </h3>

  <center></center>
</div>


<div class="col-xs-12 col-lg-6">
  <center><h4><span class="glyphicon glyphicon-list-alt"></span> Compras do Dia </h4></center>
  <?php
  if (isset($lancamentos)) {?>
  <table class="table table-bordered table-striped table-hover">
    <thead>
      <tr bgcolor="#C0C0C0">
        <th>Local</th>
        <th>Valor</th>
        <th>Excluir</th>
        <th>Editar</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($lancamentos as $lancamento) {
        ?>
        <tr>
          <td><a href="<?= base_url("index.php/Controller/verItens/$lancamento->idLancamento/0")?>"> <?php echo $lancamento->descricaoL; ?></a></td>
          <td class="valorN">R$ <?php echo $lancamento->Valor; ?></td>
          <td><center><a href="<?= base_url("index.php/controller/deletarLancamento/$lancamento->idLancamento")?>"><span class="glyphicon glyphicon-trash"></span></a></center></td>
          <td><center><a href="<?= base_url("index.php/controller/lancamentos/$lancamento->data/$lancamento->idLancamento")?>"><span class="glyphicon glyphicon-edit"></span><a></center></td>
            </tr>
          </tr>
          <?php
        }
      }else{
        echo "Nenhuma Compra Hoje";

      }
      ?>    
    </tbody>
  </table>
</div>

<div class="col-xs-12 col-lg-6">
  <center><h4>Despesas do Mês</h4></center>
  <table class="table table-bordered table-striped table-hover">
    <thead>
      <tr bgcolor="#C0C0C0">
        <th>Data</th>
        <th>Valor</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if (isset($dados)) {
        foreach ($dados as $dado) {
          ?>
          <tr>
            <td><a href="<?= base_url("index.php/Controller/lancamentos/$dado->data/0")?>"> <?php echo date('d/m/Y', strtotime($dado->data)); if ($dado->data == date('Y-m-d')) {
              echo " - Hoje";
            };?></a></td>
            <td class="valorN">R$ <?php echo $dado->valor; ?></td>
          </tr>
          <?php
        }
      }
      ?>    
    </tbody>
  </table>
</div>
      <!-- fim lista de despesas -->