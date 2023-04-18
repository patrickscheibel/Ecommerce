# Ecommerce
    Este projeto consiste em uma aplicação de e-commerce com o backend desenvolvido em Laravel e o frontend em React.
    
## Etapas:
### banco de dados
    Para o banco de dados, foi utilizado o PostgreSQL com o auxílio do Docker para facilitar sua criação. Além disso, foram utilizadas as migrações do Laravel para criar as tabelas necessárias e um script contendo os SQLs correspondentes foi adicionado na mesma pasta.

    No total, foram criadas duas tabelas:
#### users 
- id
- name
- email 
- password 
- create_at 
- update_at 

#### buy_items
    Se trata da compra de itens, então tive que planejar ela melhor. Para poder diferenciar as compras e completar todos os requisitos, fiz da seguinte maneira:
- id
- user_id: para identificar o usuário
- supplier: para identificar o fornecedor
- product: armazena o JSON do produto que vem da API, para facilitar o controle
- price: o preço do produto, que pode variar devido ao fornecedor 2 que aplica desconto
- created_at
- updated_at

### Backend
    O backend foi desenvolvido em Laravel e utiliza APIs de fornecedores para obter os dados dos produtos. Para isso, foi criado um controller que faz as requisições na API e retorna os dados para o frontend através de rotas. Para saber qual fornecedor chamar, foi utilizado um parâmetro na rota, com base no padrão encontrado nas URLs de requisição, onde a diferença entre os dois fornecedores era que um tinha "brazilian" e o outro tinha "european" no final da URL.

    As rotas do backend foram documentadas no README na pasta do mesmo. Os demais controllers e models seguem os padrões do Laravel.

### Frontend

    Para o frontend, foi criada uma página inicial com a listagem dos produtos, mas não foi possível avançar muito devido à falta de tempo. A ideia era criar duas opções de listagem diferentes, usando uma tela com componentes dinâmicos para isso, já que temos fornecedores do Brasil e da Europa como está sendo citado nas URLs, dessa forma temos uma experiência melhor para o usuário saber de onde estaria comprando.

    Para as demais telas, a ideia era seguir o padrão convencional, com uma tela de login e cadastro de usuário, outra para ver os produtos no carrinho, além da tela de finalização de compra onde seria escolhida a forma de pagamento.

### Conclusão

    Embora não tenha sido possível concluir o frontend, foi possível finalizar e testar todo o restante da aplicação, entregando o máximo de requisitos solicitados possíveis.