<h1>Listar Usuários</h1>
<?php
    $sql = "SELECT * FROM usuarios";

    $res = $conn->query($sql);

    $qtd = $res->num_rows;

    if($qtd > 0){
        print "<table class='table table-hover table-striped table-bordered'>";
            print "<tr>";
            print "<th>Id</th>";
            print "<th>Nome</th>";
            print "<th>Email</th>";
            print "<th>Data de Nascimento</th>";
            print "<th>Ações</th>";
            print "</tr>";
        while($row = $res->fetch_object()){
            print "<tr>";
            print "<td>".$row->id."</td>";
            print "<td>".$row->nome."</td>";
            print "<td>".$row->email."</td>";
            print "<td>".$row->data_nascimento."</td>";
            print "<td>
                <button onclick = \"location.href='?page=editar&id=".$row->id."';\" class='btn btn-outline-primary'>Editar</button>
                <button onclick=\"if(confirm('Deseja excluir este usuário?')){location.href='?page=salvar&acao=excluir&id=".$row->id."';}else{return false;}\" class='btn btn-outline-danger'>Excluir</button>
                </td>";
            print "</tr>";
        }
        print "</table>";
    } else {
        print "<p class='alert alert-danger'>Nenhum resultado encontrado</p>";
    }
?>