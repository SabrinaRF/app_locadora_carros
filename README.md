<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## API 

Este repositório foi desenvolvido utilizando o framework Laravel e a linguagem PHP. O objetivo principal deste projeto é fornecer uma solução para uma locadora de carros, oferecendo uma API RESTful para operações CRUD (Create, Read, Update, Delete) sobre os recursos disponíveis na locadora.

### Objetivos:

- Implementação de uma API WebService RESTful: A arquitetura do projeto segue os princípios REST, oferecendo endpoints que possibilitam interações eficientes com os recursos da locadora de carros.

- Modelos Disponíveis:
 
    - Marca: Representa as diferentes marcas de carros disponíveis na locadora.
    - Modelo: Descreve os modelos específicos de carros associados a cada marca.
    - Carro: Refere-se aos carros disponíveis para locação na locadora.
    - Cliente: Armazena informações sobre os clientes da locadora.
    - Locação: Registra as locações realizadas pelos clientes.

- Implementação do Design Pattern - Repository: O projeto segue o padrão de design Repository, estabelecendo uma relação entre os controladores (Controllers), os repositórios (Repositories) e os modelos (Models), garantindo uma separação clara das responsabilidades e facilitando a manutenção e extensibilidade do código.

- Autenticação de API com Autorização JWT (JSON Web Token): A API utiliza o padrão JWT para autenticar e autorizar os usuários que acessam os recursos protegidos. Isso proporciona uma camada adicional de segurança, garantindo que apenas usuários autorizados possam realizar determinadas operações na API.

- Respostas HTTP: A API fornece respostas HTTP adequadas para cada solicitação, seguindo as melhores práticas de desenvolvimento web. Isso inclui o uso de códigos de status HTTP apropriados, como 200 (OK), 201 (Created), 400 (Bad Request), 401 (Unauthorized), entre outros, para comunicar o resultado de cada requisição.

