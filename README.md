# Projeto Criação de CRUD - 2º Semestre TSI.
O nosso projeto se chama **Raff.io**, um sistema simples para criação de propostas, onde, ao preencher com os dados sobre o trampo que você deseja, é só enviar diretamente para qualquer pessoa.

![Página inicial do protótipo](/assets/img/apresentacao_readme.png "Tela inicial do protótipo")

## Autores do projeto

- [Bruno Queirós](https://github.com/bqdesigner)
- [Rodrigo Avelino](https://github.com/rgavelino83)

---

# Como rodar o projeto?

1. Clone este projeto dentro do XAMPP, em HTDOCS, para rodar localmente
2. Abra o MySQL Workbanch, crie um banco de dados chamado `` db_pi ``
3. Após isso, execute a query que está em `` db/scripts_db `` para criar a tabela de usuários
4. Na pasta `` actions `` tem um arquivo chamado `` connection.php  ``, altere a porta para porta já configurada no seu xampp.
5. Agora é só entrar `` http://localhost/projeto-pi-crud `` que ele redirecionará para o `` login.php ``
6. Crie uma conta e agora é só mandar ver!


---

# O que estamos usando nesse projeto?

- PHP
- MySQL e MySQL Workbench
- Javascript e JQuery
- CSS/SASS

---

# Link para o protótipo do projeto
O protótipo é uma base para o que estamos construindo, a versão do projeto está diferente do projeto devido às tecnologias utilizadas.

- [Ver protótipo](https://xd.adobe.com/view/3e450276-8deb-4ed2-507d-c78222f59b44-4874/)
- [Ver especificações de desenvolvimento](https://xd.adobe.com/spec/e1553ff3-e06b-4548-752a-7c9183dee93a-9764/)

---

# Comandos básicos para usar no projeto
Sempre criar uma branch para fazer suas modificações e depois fazer um pullrequest para aprovação.

`` git add . ``: Preparando todos os arquivos

`` git commit -m "Sua mensagem de atualização" `` 

`` git push -u origin master ``: Enviando para a master

`` git checkout nome-branch: `` Mudando a branch criada no Bitbucket

`` git pull ``: Atualiza as branches 

`` git status ``: Verifica o que foi feito de modificação

`` git log ``: Exibe o histórico de edição 

`` git fetch --all `` e `` git reset --hard origin/master `` para forçar o git pull, sendo na master ou em diretório específico
