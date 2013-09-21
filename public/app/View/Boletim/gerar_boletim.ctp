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
    <tr>
        <td><b>Matrícula:</b> 01</td>
        <td><b>Aluno:</b> Bruno Leonardo Silva Oliveira</td>
        <td><b>Turma:</b> ADS</td>
        <td><b>Período:</b> Manhã</td>
        <td><b>Data Emissão:</b> 10/10/2013</td>
    </tr>
</table>
<br/>
<table class="tabela-notas">
    <tr>
        <th>Matéria</th>
        <?
        foreach($datas as $data):
            
            
                echo "<th>{$data}</th>";
            
            
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