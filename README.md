# SIFLUC
O sistema SIFLUC foi o primeiro sistema que desenvolvi no curso Online de Desenvolvimento Ágil de Software do IFSULDEMINAS.

Requisitos básicos do sistema:
 - Ter um servidor apache configurado com o módulo rewrite ativo;
 - Ter o SGDB mysql instalado;
 
Para usá-lo você deve seguir os passos para instalação:
 - Baixar o sistema para a pasta de acesso do servidor web;
 - Criar no Mysql um usuário chamado "sifluc" e um banco com mesmo nome e que o usuário criado tenha todos os privilégios. Após isso, importe o script .sql da pasta scripts desse repositório no banco criado.
 - Acrescentar ao  arquivo hosts do sistema um a seguinte linha:
    -> 127.0.0.1   www.sifluc.bruno.com

  Obs.: Se ao acessar aparecer o erro "Message: date(): It is not safe to rely on the system's timezone settings. You are *required* to use the date.timezone setting or the date_default_timezone_set() function...", acesse o arquivo php.ini da configuração do PHP e procure pela referência "[Date]" e linha date.timezone. Ela deve estar dessa forma:
    -> date.timezone = America/Sao_Paulo

Após isso o sistema deve funcionar acessando pelo navegador digitando www.sifluc.bruno.com/SIFLUC. Vualá!
