<?

$conta_miniatura = 0;

foreach ($ocorrencias as $ocorrencia):
    
    if($ocorrencia["gravidade"] == 'B'){
        $gravidade = "<span class='label label-info'>Baixa</span>";
    }else{
        $gravidade = "<span class='label label-important'>Grave</span>";
    }
    
    
    if ($conta_miniatura == 0) {
        echo "<div class='row-fluid'>";
    }
    echo "
    <div class='thumbnail span3'>
        <div class='caption'>
            {$gravidade}
            <h4>{$ocorrencia["nome"]}</h4>
            <strong>Matricula: {$ocorrencia["codigo"]}</strong>
            <p class='texto-matricula'>{$ocorrencia["descricao"]}</p>
        </div>
    </div>
    ";

    $conta_miniatura++;

    if ($conta_miniatura == 4) {
        echo "</div>";
        $conta_miniatura = 0;
    }
endforeach;
?>

