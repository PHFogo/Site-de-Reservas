 projeto precisa apresentar a modelagem entidade relacionamento.
"Sim. A modelagem foi o primeiro passo do projeto. Identificamos três entidades centrais: Usuário, Serviço e Reserva. O diagrama de entidade-relacionamento demonstra que um Usuário pode fazer várias Reservas, e um Serviço também pode estar contido em várias Reservas. A tabela Reservas funciona como a entidade associativa que conecta as outras duas, garantindo um modelo relacional coeso."

O sistema possui tabelas suficientes para atender ao propósito do projeto. (Mínimo 3)
"Sim. Foram criadas exatamente três tabelas: usuarios, servicos e reservas. Esta estrutura é a base mínima e suficiente para atender a todos os requisitos funcionais do sistema: gerenciar quem são os usuários, o que eles podem reservar e o estado de cada reserva."

Foram adicionadas corretamente as chaves primárias.
"Sim. Todas as tabelas possuem uma chave primária chamada id, configurada como INT e AUTO_INCREMENT. Isso garante que cada registro em cada tabela tenha um identificador único e que a gestão desses identificadores seja feita automaticamente pelo banco de dados."

O projeto possui ao menos 1 chave estrangeira?
"Sim. O projeto possui duas chaves estrangeiras, ambas na tabela reservas. A coluna id_usuario é uma chave estrangeira que se refere à tabela usuarios, e a id_servico refere-se à tabela servicos. Elas são essenciais para garantir a integridade referencial do banco de dados, ou seja, uma reserva não pode existir sem um usuário e um serviço válidos."

Fez todos os Exercícios e Fez de maneira correta.
"Sim. Todos os requisitos funcionais e técnicos solicitados foram implementados. Acredito que a maneira correta foi seguida, pois o projeto não apenas funciona conforme o esperado, mas também adere a princípios de software modernos, como a arquitetura MVC, segurança básica e tratamento de erros, que vou detalhar a seguir."

O projeto é funcional? É possível utilizá-lo conforme o proposto?
"Sim, o projeto é totalmente funcional. Existem dois fluxos de uso principais que funcionam perfeitamente:

O fluxo do cliente, que pode se registrar, fazer login, solicitar uma nova reserva e consultar o status de suas reservas existentes.

O fluxo do administrador, que pode fazer login com suas credenciais, visualizar todas as reservas de todos os clientes e alterar o status de cada uma (de 'Pendente' para 'Confirmada', por exemplo)."

O projeto foi desenvolvido utilizando os princípios da programação orientada a objetos de forma consistente?
"Sim. A POO é um pilar central da aplicação.

Abstração: As entidades do sistema foram abstraídas em classes como Usuario, Reserva e Servico.

Encapsulamento: Os atributos dessas classes são privados, e o acesso a eles é controlado por métodos públicos, como veremos no requisito sobre modificadores de acesso.

Herança: Foi utilizada uma classe base Controller da qual os outros controllers, como AuthController e AdminController, herdam métodos comuns, como a conexão com o banco e a renderização de views."

O projeto utilizou composer pra importar alguma biblioteca externa orientada a objetos?
"Sim. O Composer foi utilizado para gerenciar as dependências do projeto. Especificamente, importamos a biblioteca vlucas/phpdotenv. O objetivo foi gerenciar variáveis de ambiente de forma segura, separando configurações sensíveis, como as credenciais do banco de dados, do código-fonte. Além disso, o Composer foi fundamental para gerar o autoloader PSR-4, que carrega nossas classes automaticamente."

O projeto precisa apresentar a correta identificação das entidades envolvidas no projeto?
"Sim. Conforme mencionado na modelagem, as entidades Usuario, Serviço e Reserva foram corretamente identificadas como os componentes centrais do domínio do problema. Essa identificação se reflete diretamente na estrutura do banco de dados e nas classes de Model da aplicação."

O projeto precisa apresentar o uso de enumerações?
"Sim. O projeto utiliza Enumerações do PHP 8.1+ para aumentar a robustez e a legibilidade do código. Foram criadas duas: UserRole (para definir os papéis 'CLIENTE' e 'ADMIN') e BookingStatus (para os status 'PENDENTE', 'CONFIRMADA', 'CANCELADA'). O uso de Enums evita o uso de 'strings mágicas' e previne erros de digitação, garantindo que apenas valores válidos sejam atribuídos a esses campos."

O projeto precisa apresentar a demonstração de compreensão na aplicação dos modificadores de acesso?
"Sim. Os modificadores de acesso foram aplicados para garantir o encapsulamento. Nos Models, por exemplo, a conexão com o banco de dados é um atributo private, acessível apenas dentro da própria classe. Da mesma forma, os controllers possuem métodos public que servem como actions para as rotas e podem ter métodos private ou protected para lógica interna, separando a interface pública da implementação interna."

O projeto precisa apresentar uma boa estrutura, separando corretamente as responsabilidades? Foi utilizada alguma arquitetura, como MVC?
"Sim. A arquitetura escolhida foi a MVC (Model-View-Controller), justamente para garantir uma clara separação de responsabilidades:

Model: Responsável por toda a lógica de dados e comunicação com o banco.

View: Responsável exclusivamente pela camada de apresentação (HTML).

Controller: Atua como o maestro, recebendo as requisições, interagindo com o Model para buscar dados e passando esses dados para a View correta ser exibida."

O projeto precisa apresentar uma arquitetura clara e coerente? E uma estrutura clara?
"Sim. Acredito que a arquitetura é clara e coerente. A adesão estrita ao MVC, a estrutura de pastas bem definida e o uso de um Front Controller (public/index.php) como ponto de entrada único tornam o fluxo da aplicação previsível e seguro. Qualquer desenvolvedor que entenda MVC pode rapidamente se familiarizar com a estrutura do projeto."

O projeto precisa apresentar o tratamento de exceções, com a utilização de Exceptions, sem que seja exibido erro PHP direto para o cliente?
"Sim. Este é um ponto crucial para a experiência do usuário. No index.php, foi implementado um set_exception_handler global. Qualquer exceção não capturada na aplicação, como uma falha de conexão com o banco de dados, é interceptada por este handler. Ele impede a exibição de erros técnicos do PHP e, em vez disso, mostra uma página de erro 500 amigável para o usuário, garantindo uma experiência mais profissional e segura."

(Finalizaria com uma conclusão)

"Em resumo, o projeto não só atende a todos os requisitos funcionais propostos, como também foi construído sobre uma fundação de boas práticas de desenvolvimento, resultando em um código organizado, seguro e de fácil manutenção. Obrigado."
