<style>
    h1{font-family: Calibri;}
    table{width: 100%;border-collapse: collapse; font-family: Calibri;}

    .tabela-notas{border:4px solid #92bac0;}
    .tabela-notas td{border-bottom:1px solid #92bac0;text-align: center;padding: 10px;}
</style>

<table>
    <tr>
        <td><img src="<?php echo $this->Html->url("/img/cj-smart-logo.png"); ?>"/></td>
        <td><h1>BOLETIM MENSAL</h1></td>
    </tr>
</table>
<br/>
<table>
    <?
    foreach($notas as $nome):
    
        echo "
<tr>
        <td><b>Matrícula:</b> {$nome["Matricula"]["codigo"]}</td>
        <td><b>Aluno:</b>  {$nome["Aluno"]["nome"]}</td>
        <td><b>Turma:</b>  {$nome["Turma"]["nome"]}</td>
        <td><b>Período:</b>  {$nome["Turma"]["periodo"]}</td>
        <td><b>Data Emissão:</b> ".date('d/m/Y')."</td>
    </tr>            
";
        
        break;
    endforeach;
    ?>
    
</table>
<br/>
<table class="tabela-notas">
    <tr>
        <th>Matéria</th>
        <?
        foreach($datas as $data):
            
                $data_formatada = explode("-",$data);
                echo "<th>".$data_formatada[1]."/".$data_formatada[0] ."</th>";
            
            
        endforeach;
        ?>
    </tr>
    <?
    foreach ($materias as $materia):
        echo "<tr>";
        echo "  <td><b>{$materia["nome"]}</b></td>";
        
        foreach($notas as $nota):
            
            if($nota["Nota"]["materia_id"] == $materia["id"] ){
                echo "<td>{$nota["Nota"]["valor"]}</td>";
            }
            
        endforeach;
        echo "</tr>";
        

    endforeach;
    ?>

</table>

<script>
    window.print();
</script>

