<form action = "curso/create" method = "POST">
    <label >
      Nome:<br/>
     <input type = "text" name="nome" value = "" />
    </label>
    <label>
        Descrição:<br/>
        <textarea name="descricao" rows = "4" cols = "20"></textarea>
    </label>
    <label>
        Duração: <br/>
        <select name="duracao">
            <option value="6">6 meses</option>
            <option value="12">1 ano</option>
            <option value="18">1,5 Ano</option>
            <option value="24">2 anos</option>
        </select>
     </label>
     <input type= "submit" class="btn" value = "Salvar" />
</form>