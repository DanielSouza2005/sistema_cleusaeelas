<?php
    $usuario = "root";
    $senha = "";
    $dbname = "db_cleusa";

    /*$usuario = "epiz_32429865";
    $senha = "0kczpg1O50R";
    $dbname = "epiz_32429865_cleusa"; */

// use true se quiser remover caracteres que não sejam utf-8
    $checkUtf = true;

    //$con = mysqli_connect("sql202.epizy.com","epiz_32429865","0kczpg1O50R","epiz_32429865_cleusa");
    $con = mysqli_connect("localhost","root","","db_cleusa");
    mysqli_select_db($con, $dbname) or die(mysqli_connect_errno());


// gerando um arquivo sql. Como?
// a função fopen, abre um arquivo, que no caso, será chamado como: backup + data.sql
//  concatenando dinamicamente o nome do banco com a extensão .sql.
    $back = fopen('backup_site_' . date("d_m_Y") . ".sql", "w");

// aqui, listo todas as tabelas daquele banco selecionado acima
    $res = mysqli_query($con, "SHOW TABLES FROM $dbname");

// ultra importante para não dar erro nos primeiros inserts
// principalmente de usar InnoDB e relacionar as tabelas
    fwrite($back, "set foreign_key_checks=0;\n\n");

// UTF-8
    $regex1 = <<<'END'
/
  ( [\x00-\x7F]                 # single-byte sequences   0xxxxxxx
  | [\xC0-\xDF][\x80-\xBF]      # double-byte sequences   110xxxxx 10xxxxxx
  | [\xE0-\xEF][\x80-\xBF]{2}   # triple-byte sequences   1110xxxx 10xxxxxx * 2
  | [\xF0-\xF7][\x80-\xBF]{3}   # quadruple-byte sequence 11110xxx 10xxxxxx * 3
  )
| .                             # anything else
/x
END;

// resgato cada uma das tabelas, num loop
    while ($row = mysqli_fetch_array($res))
    {
        $table = $row[0];
// usando a função SHOW CREATE TABLE do mysql, exibo as funções de criação da tabela,
// exportando também isso, para nosso arquivo de backup
        $res2 = mysqli_query($con, "SHOW CREATE TABLE $table");
// o comando acima deve ser feito em cada uma das tabelas
        while ($lin = mysqli_fetch_array($res2)) {
// instruções que serão gravadas no arquivo de backup
            fwrite($back, "\n#\n# //Criação da Tabela : $table\n#\n\n");
            fwrite($back, "$lin[1] ;\n\n#\n# //Dados a serem incluídos na tabela\n#\n\n");

// seleciono todos os dados de cada tabela pega no while acima
// e depois gravo no arquivo .sql, usando comandos de insert
            $res3 = mysqli_query($con, "SELECT * FROM $table");
            $first = true;
            while ($r = mysqli_fetch_row($res3))
            {
                if ($first)
                {
                    $sql = "INSERT INTO $table VALUES";
                    $first = false;
                }
                else
                {
                    $sql .= ',';
                }


                $sql .= "('";

                $imploded = '';

                $firstImplode = true;

                foreach ($r as $index => $reg)
                {

                    if ($firstImplode)
                    {
                        $firstImplode = false;
                    }
                    else
                    {
                        $imploded .= "', '";
                    }

                    if ($checkUtf)
                    {
                        $escaped = str_replace('\'', "\\'", str_replace('\\', "\\\\", preg_replace($regex1, '$1', $reg)));
                    }
                    else
                    {
                        $escaped = str_replace('\'', "\\'", str_replace('\\', "\\\\", $reg));
                    }
                    $imploded .= $escaped;
                }
				$sql .= $imploded;

                $sql .= "')\n";

            }
            if (!$first)
            {
                $sql .= ";\n";
                fwrite($back, $sql);
            }
        }
    }

// fechar o arquivo que foi gravado
    fclose($back);

// gerando o arquivo para download, com o nome do banco e extensão sql.
    $arquivo = 'backup_site_' . date("d_m_Y") . ".sql";
    Header("Content-type: application/sql");
    Header("Content-Disposition: attachment; filename=$arquivo");

// lê e exibe o conteúdo do arquivo gerado
    readfile($arquivo);

    unlink($arquivo);
// gravar cópia do arquivo no servidor
//system("tar -czvf $arquivo");

//header ("Location: backup_site.php");

?>
