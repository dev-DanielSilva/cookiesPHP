# Iron Fit - Simulação de Carrinho de Compras

Este projeto é uma simulação de um carrinho de compras para a loja fictícia **Iron Fit**. A aplicação foi construída com PHP e utiliza cookies para armazenar as seleções de produtos. Ao selecionar produtos, os dados são armazenados em cookies, permitindo que o usuário visualize os itens selecionados em uma tabela com imagens e preços.

## Tecnologias Utilizadas
- **PHP**: para gerenciar cookies e lógica do backend.
- **HTML e CSS**: para o layout e estilização da página.

## Funcionalidades
- **Seleção de Produtos**: permite ao usuário selecionar produtos para adicionar ao carrinho.
- **Visualização do Carrinho**: exibe os produtos selecionados, com nome, imagem e preço, em uma tabela.
- **Totalização**: calcula e exibe o valor total dos produtos no carrinho.
- **Remoção dos Cookies**: permite limpar os produtos selecionados ao remover os cookies.

## Estrutura de Arquivos
- `index.php`: página principal com a lista de produtos e checkboxes para seleção.
- `carrinho.php`: página que exibe os produtos selecionados, lendo dados dos cookies e mostrando-os em uma tabela com imagem, nome e preço de cada item.
- `styles/style.css`: arquivo de estilos para o layout e design da página.

## Pré-requisitos
- **Servidor Web com suporte para PHP** (como Apache ou Nginx) ou servidor PHP embutido.
- **PHP** (versão 7.0 ou superior).
