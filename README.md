# Kraken-Launcher
# Grupo
1. Felipe de Oliveira Fonseca Silva (RGM:42862451 )
3. Erick Schinneyder de Andrade Serrão (RGM:44093888)
4. José Reinaldo Gomes Bezerra (RGM:44034083)
5. Elthon de Matos Moura Melo (RGM:43683525)
6. Marco Aurélio de Araújo Fernandes (RGM:42919207)  

## Descrição do Projeto
O *Kraken Launcher* será uma aplicação web que simula um launcher de jogos, inspirado em plataformas como Steam e Hydra Launcher. A proposta é criar uma versão simplificada com páginas básicas, interface visual agradável e navegação funcional.

## Objetivo
Desenvolver uma plataforma web onde o usuário possa visualizar uma biblioteca de jogos, acessar informações sobre cada jogo e interagir com o sistema por meio de formulários. O projeto busca aplicar os conhecimentos em HTML, CSS e organização de front-end, praticando o desenvolvimento de aplicações com estrutura e design.

## Funcionalidades Esperadas
- Página inicial com destaques e apresentação do projeto  
- Página de biblioteca com lista de jogos fictícios  
- Página individual de jogo com imagem.   
- Navegação entre páginas por menu fixo  
- Layout responsivo com identidade visual própria

## Tecnologias a Serem Usadas
- HTML5  
- CSS3
- Javascript (Em processo de remoção da aplicação)
- Bootstrap (opcional, para facilitar o layout)  
- Git e GitHub para controle de versão
- PHP
- MYSQL(Banco de Dados)

## Acesso admin
- para que a funcionalidade da página inicial com o botão admin funcione é preciso que o usuário do código adicione um arquivivo no diretório Clientes:
- nome do arquivo: config_admin.php;
- código a ser ultilizado: 
- <?php
- // Este arquivo armazena credenciais e NÃO deve ser incluído no Git.// Use um nome de arquivo diferente de 'conexao.php' para manter as responsabilidades separadas.
- // Credenciais de Acesso Especial (Admin Hardcoded)
- define('ADMIN_EMAIL', 'admin@exemplo.com');
- define('ADMIN_PASSWORD', 'senha123');
- // Em uma aplicação real, você também colocaria aqui as credenciais do banco de dados (host, user, password).
- ?>;
 
- isso serve para que a validação funcione, uma vez que de forma realista o usuário não deve ter esse acesso.
