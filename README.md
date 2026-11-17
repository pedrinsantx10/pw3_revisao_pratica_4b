# Central de Chamados Técnicos (Avaliação 4º Bimestre PW3)

## Instalação de Extensões VS Code

1. Navegue até a pasta `extensoes` do projeto
2. Localize os arquivos `.vsix`
3. No VS Code, acesse **Extensions** (Ctrl + Shift + X)
4. Clique nos três pontos (...) no canto superior direito
5. Selecione **Install from VSIX...**
6. Escolha o arquivo `.vsix` desejado
7. Confirme a instalação

## Instalar Dependências

Abra o terminal na raiz do projeto e execute:

```bash
composer install
```

## Gerar Estrutura com Scaffolding

No terminal, gere o Model, a Migration e o Resource Controller da entidade `Chamado`:

```bash
php artisan make:model Chamado -mcr
```

## Executar Migrações

Após configurar as colunas da tabela na migration gerada, execute:

```bash
php artisan migrate
```

## Iniciar o Projeto

Abra o terminal e execute:

```bash
php artisan serve
```
