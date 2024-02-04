VIEWS
--------------------------------------------------------------------------------------------------------------------------------------------------------------
tela de login -> nome de usuário (input text) e senha (input password)

tela de cadastro -> nome (input text), email (input email), senha (input password) e confirmar senha (input password)

tela de cadastros -> nome (input text), email (input email), senha (input password) e confirmar senha (input password)

tela de cadastro de projetos-> nome (input text), descricao (input text), projeto (select), data de início (input date) e data final (input date)

tela de cadastro de tarefas -> descricao (input text), projeto (select), data de início (input date) e data final (input date)

tela de visualização de tarefa -> descricao (p), projeto (p), data de início (p), data final (p), atribuições (ul), usuários (select) e botão atribuir (button)

tela lista de projetos

tela de visualização do projeto -> nome (p), descrição (p) data de início (p), data final (p) e lista de tarefas (ul)

tela lista usuários

tela visualização do usuário -> nome (p), email (p) e tarefas atribuídas (ul)

BANCO DE DADOS
--------------------------------------------------------------------------------------------------------------------------------------------------------------
*user*
id
name
email
password

*project*
id
name
description
start_date
end_date

*task*
id
description
project_id
start_date
end_date

*assignment*
id
user_id
task_id
date
