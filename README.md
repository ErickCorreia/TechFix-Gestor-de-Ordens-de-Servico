# TechFix — Gerenciador de Assistência Técnica

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![HTML](https://img.shields.io/badge/HTML-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![SQLite](https://img.shields.io/badge/SQLite-07405E?style=for-the-badge&logo=sqlite&logoColor=white)

## 🎯 Sobre o Projeto
Este projeto resolve a dor de pequenas assistências técnicas que precisam organizar a entrada de hardwares e o status de manutenção.

## Como Executar o Projeto
Siga as instruções abaixo para configurar e rodar o TechFix — Gestor de Assistência Técnica em sua máquina local.
1. Pré-requisitos
Antes de começar, você precisará ter instalado em sua máquina:
PHP 8.1 ou superior
.
Composer (Gerenciador de dependências do PHP)
.
Git (para clonagem do repositório).
2. Instalação
Primeiro, clone o repositório e entre na pasta do projeto:
git clone https://github.com/ErickCorreia/TechFix-Gestor-de-Ordens-de-Servico.git
cd TechFix-Gestor-de-Ordens-de-Servico
Em seguida, instale as dependências necessárias (como o PHPUnit para os testes):
composer install
Nota: Certifique-se de que o arquivo composer.json esteja na raiz do projeto para que este comando funcione corretamente
.
3. Execução do Sistema
O sistema utiliza o servidor embutido do PHP. Para iniciá-lo, execute o seguinte comando no seu terminal:
php -S localhost:8000 -t src
(O parâmetro -t src garante que o servidor aponte para a pasta onde estão os arquivos da interface gráfica/GUI)
.
Após iniciar o servidor, abra o seu navegador e acesse: 👉 http://localhost:8000
🧪 Executando os Testes
Para validar a Integração com a API Pública (ViaCEP) e garantir que o fluxo de dados está correto, execute os testes automatizados com o comando
:
./vendor/bin/phpunit tests

--------------------------------------------------------------------------------
🌐 Acesso Online (Deploy)
De acordo com os requisitos da Entrega Intermediária, a aplicação também está disponível para acesso direto na nuvem sem necessidade de instalação local
:
Link da Aplicação: https://techfix-gestor-de-ordens-de-servico.onrender.com
