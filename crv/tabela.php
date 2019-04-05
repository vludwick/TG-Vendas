

<table class="table table-hover table-striped" id="alunos">
    <thead>
        <tr>
            <th>Nome aluno</th>
            <th>Data nascimento</th>
            <th>Editar</th>
            <th>Deletar</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $query="select * from cliente";
            resultado=mysqli_query($conecta, $query);
            while($linha = mysqli_fetch_array($resultado)){
                echo '<tr><td>'.$linha['nome_aluno'].'</td>';
                echo '<td>'.$linha['data_nascimento'].'</td></tr>';
        ?>



            <?php
            }
            ?>
    </tbody>
</table>