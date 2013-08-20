<?
// Parametros Recebidos
// @options @empty

$total = count($options);

if(!$empty){
    $empty = "Selecione uma opção";
}
echo "<option value=''>$empty ({$total})</option>";

foreach ($options as $chave => $valor):
    echo "<option value='{$chave}'>{$valor}</option>";
endforeach;

