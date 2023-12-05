# Instalação SaloneAuto

#### 1. XAMPP

Realizar o download do XAMPP no site [Apache Friends](https://www.apachefriends.org/pt_br/index.html), conforme o sistema operacional utilizado:

![image](https://github.com/rodrigodasilv/SaloneAuto/assets/55567123/ad48e13d-c632-4ce1-b5f6-f542ca379f43)


Após o download, realizar a instalação, seguindo as etapas do instalador.

![step6](https://github.com/rodrigodasilv/SaloneAuto/assets/55567123/b904d930-f4d2-4ec3-a0dc-c80076b886aa)

Após a instalação, abrir o painel de controle do XAMPP e iniciar os módulos "Apache" e "MySQL":

![image](https://github.com/rodrigodasilv/SaloneAuto/assets/55567123/8d22ba6d-f729-4005-9d02-39025711d549)


#### 2. Banco de dados

Para realizar a importação do banco de dados, é necessário acessar o painel de administrador de banco de dados através da URL "http://localhost/phpmyadmin/":

![image](https://github.com/rodrigodasilv/SaloneAuto/assets/55567123/9ce3d0f4-6252-4fe9-b755-8d6257e58991)

Após o acesso, é necessário criar o novo banco de dados:

![image](https://github.com/rodrigodasilv/SaloneAuto/assets/55567123/d9c6098f-1ca1-4f3c-abf9-02cd59141424)

**Observação: É extremamente importante que o nome do banco seja "SaloneDB".**

Após a criação do banco de dados, abrir a janela SQL, colar o conteúdo do arquivo **"salonedb_structure.sql"** na area de texto e executar as instruções:

![image](https://github.com/rodrigodasilv/SaloneAuto/assets/55567123/bcd35f12-36c4-45a7-8999-a85462881a67)

![image](https://github.com/rodrigodasilv/SaloneAuto/assets/55567123/98d03fcf-cc38-4985-9b5c-d70a99942382)

Estrutura do banco de dados importada com sucesso:

![image](https://github.com/rodrigodasilv/SaloneAuto/assets/55567123/03a2bdbb-d3fe-4235-b6c7-4f7b0f6ce436)

Após a estrutura ter sido importada com sucesso, abrir novamente a janela SQL e colar o conteúdo do arquivo **"salonedb_data.sql"** na area de texto e executar as instruções:

![image](https://github.com/rodrigodasilv/SaloneAuto/assets/55567123/554976ae-0872-4092-b9b5-6a61666c0853)

#### 3. Pasta htdocs 

Após os dados terem sido importados com sucesso, mover a pasta principal do projeto para a pasta **"C:\xampp\htdocs"**:

![image](https://github.com/rodrigodasilv/SaloneAuto/assets/55567123/e20dcebb-705b-40ff-bc97-b283f0313171)

Após a pasta ter sido movida, acessar o SaloneAuto através da URL **"http://localhost/SaloneAuto-main/"**

![image](https://github.com/rodrigodasilv/SaloneAuto/assets/55567123/b6a6bd2b-0aa3-472a-bece-201f58b26909)



