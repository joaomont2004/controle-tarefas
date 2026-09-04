# 📋 Controle de Tarefas

Um gerenciador de tarefas simples, feito em **PHP puro**, rodando direto no terminal (CLI). Permite listar, adicionar e concluir tarefas, com persistência em arquivo JSON — ou seja, suas tarefas continuam salvas mesmo depois de fechar o programa.

Projeto criado como exercício prático de PHP: arrays associativos, funções, passagem por referência, laços de repetição, leitura de entrada do usuário e manipulação de arquivos.

## ✨ Funcionalidades

- ✅ Listar tarefas (com status de concluída ou não)
- ➕ Adicionar novas tarefas
- ☑️ Marcar tarefas como concluídas
- 💾 Persistência automática em arquivo `tarefas.json`
- 🖥️ Menu interativo via terminal

## 🚀 Como rodar

Pré-requisito: ter o PHP instalado na máquina (`php -v` pra conferir).

```bash
git clone https://github.com/SEU-USUARIO/controle-tarefas.git
cd controle-tarefas
php index.php
```

Ao rodar, um menu vai aparecer no terminal:

```
--- MENU ---
1. - Listar tarefas
2. - Adicionar tarefas
3. - Concluir tarefa
4. - Sair
Escolha uma opção:
```

Basta digitar o número da opção desejada e seguir as instruções na tela.

## 🗂️ Estrutura do projeto

```
controle-tarefas/
├── index.php       # Código principal (menu e funções)
├── tarefas.json     # Criado automaticamente ao salvar tarefas (ignorado no Git)
├── .gitignore
├── LICENSE
└── README.md
```

## 🧠 Como funciona por baixo dos panos

- As tarefas são armazenadas como um **array associativo**, cada uma com as chaves `nome` e `feita`.
- A cada tarefa adicionada ou concluída, a lista inteira é convertida para JSON (`json_encode`) e salva no arquivo `tarefas.json`.
- Ao iniciar o programa, se o arquivo já existir, as tarefas salvas são carregadas (`json_decode`) antes de mostrar o menu.

## 🛠️ Tecnologias

- PHP (CLI, sem dependências externas)

## 📄 Licença

Este projeto está sob a licença MIT — veja o arquivo [LICENSE](LICENSE) para mais detalhes.

---

Feito como parte de um desafio de estudos de PHP + Git 🚀
