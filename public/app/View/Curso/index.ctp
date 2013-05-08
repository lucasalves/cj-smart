<form action = "curso/create" method = "POST">
    <label>
      Nome:
     <input type = "text" name = "nome" value = "" />
    </label>
    <label>
        Descrição
        <textarea name = "descricao" rows = "4" cols = "20">
        </textarea>
    </label>
    <label>
        Duração
        <select name="duracao">
            <option value="6">6 Mês</option>
            <option value="12">1 Ano</option>
            <option value="18">1 Ano e meio</option>
            <option value="24">2 Anos</option>
        </select>
     </label>
     <input type = "submit" value = "Salvar" />
</form>