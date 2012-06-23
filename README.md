Sorteio
=======

Aplicação simples para sortear um nome de uma lista de nomes, construída em PHP com Slim Framework, jQuery e Twitter Bootstrap. Essa aplicação foi criada originalmente para um sorteio de Pendrives interno do ITAI. Permite obter uma string aleatória de uma lista separada por quebras de linha "\n".

## Instalação

Faça o download da última versão dos frameworks:

* [Slim](http://www.slimframework.com/install)
* [jQuery](http://jquery.com)
* [Twitter Bootstrap](http://twitter.github.com/bootstrap/)

Extraia o arquivo compactado do Slim e copie a pasta **Slim** para a raíz do projeto. Coloque os arquivos Javascript da jQuery e Twitter Bootstrap na pasta **js** com os nomes: **jquery.js** e **bootstrap.min.js**. Coloque o CSS do Twitter Bootstrap na pasta **css** com o nome **bootstrap.min.css**.

## Uso

A aplicação é simples de ser utilizada. Basta informar uma lista de nomes, cada nome em uma linha no **textarea** e ao clicar no botão "Sortear" um dos nomes será escolhido aleatoriamente. Os nomes sorteados são armazenados em um array Javascript, e são enviados por POST no momento que o botão é clicado, estes sendo excluídos através da função **array_diff**, garantindo a unicidade dos nomes sorteados.

## Melhorias

* Adicionar suporte a banco de dados, fornecendo histórico de nomes e sorteios;
* Armazenar os nomes sorteados no banco de dados ao invés de um array Javascript;
* Permitir sorteio de mais de um nome na hora que o botão Sortear for clicado;
* Armazenar os prêmios que serão sorteados.
