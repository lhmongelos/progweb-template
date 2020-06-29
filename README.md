# Mr Automotive

![logo-mrautomotive](https://github.com/lhmongelos/progweb-template/blob/master/mrautomotive/img/mrlogo.png?raw=true)

<!--- Exemplos de badges. Acesse https://shields.io para outras opções. Você pode querer incluir informações de dependencias, build, testes, licença, etc. --->
![GitHub repo size](https://img.shields.io/github/repo-size/lhmongelos/progweb-template)
![GitHub contributors](https://img.shields.io/github/contributors/lhmongelos/progweb-template)

A Mr Automotive é um sistema web para auxiliar o consumidor a compra e venda do seu automotivo. Permite incluir as informações e imagens sobre o automotivo, o sitema  que visa facilitar a busca, do carro dos seus sonhos.

## Trello

O backlog do projeto pode ser visualizado através do link: https://trello.com/programacaoweb12/home

## Pré-requisitos

Antes de iniciar, certifique-se de cumprir os seguintes requisitos:

* Você deve possuir uma máquina Windows 10 ou Mac.
* Ter instalado na maquina uma IDE:
    * Visual Studio
    * Netbeans
    * Atom
* Você deve ter instalado o software WampServer ou XAMPP.

## Como executar
### Para fazer o deploy da aplicação siga os seguintes passos:
### Windows:

* Para executar o código, você deverá clonar este repositório e salva-lo dentro da pasta :
    * XAMPP: dentro do diretório do XAMPP na pasta C:/xampp/htdocs/
    * WAMP: dentro do diretório do WAMP na pasta C:/wamp/www/
* Importar o arquivo SQL dentro do phpmyadmin de um dos programas citados acima.

Para executar o projeto como:
*Usuário Padrão
- Abra o repositoria na IDE de sua preferencia
- Execute o arquivo ou  Arquivo index.php


*Usuário Administrador
 -  Abrir o repositoria na IDE de sua preferencia
 - Acessa a pasta "Administrador" do projeto
 - Execute o arquivo index.php
 - Faça o login com as credenciais abaixo:
   - Usuário: Administrador
   - Senha : 123456789



## Usando Mr Automotive

Para usar Mr Automotive, siga os seguintes passos (exemplos):

*Certifique que você tenha todos os Pré-requisitos.
* Primeiramente abra o projeto em uma IDE de sua preferência e execute o arquivo index.php.

* Ao abrir a aplicação você poderá:

  * Usuário padrão
  - Usuário Não Autenticado
    * Navegar pelo conteúdo público,
    * Buscar anuncios de carros,
    * Acessar Anuncios do sistema,
    * Criar um usuário de anunciante,
    
  - Usuário Autenticado
    * Criar um anuncio (Necessário estar logado),
    * Visualizar seus anuncios,
    * Deslogar do sistema,

  * Usuário administrador
    * Gerenciar os usuários,
    * Gerenciar anuncios,
    * Gerenciar categorias,
    * Gerenciar modelos,
    * Gerenciar marcas.
    
    
  * Funções, Composição e caracteristicas do projeto:
      * Pastas do projeto
         - ACTION : Possui subfunções de Categorias e Usuarios
         - MODEL : Possui todos os modelos de compõem o sistema
         - VIEW : Possui todas as telas do sistema
         - CONTROLLER : Possuias regras de negocio e validação
         - DAL : Possui os DAOs do projeto - Realizam ações com o banco de dados
         - SQL : Arquivo do banco de dados exportado
         - Util : Arquivos utilizados para melhorar o funcionamento do sistema - Funções do sistema responsivo
         - Bootstrap: framework para configuração do estilo das paginas do sistema
         - Css : Arquivos de configuração do estilo da paginas
         - Js : Arquivos JavaScript de alto-nível utilizado no sistema para algumas funções
      

## Contribuidores

As seguintes pessoas contribuiram para este projeto:

* [Diego Herzer](https://github.com/Herzerdi)
* [Graciele Matsuda](https://github.com/gramatsuda)
* [Luiz Henrique Brito Mongelos](https://github.com/lhmongelos)

## Licença de uso

Este projeto usa a seguinte licença: [Apache License 2.0](https://www.apache.org/licenses/LICENSE-2.0).
