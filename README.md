# Desafio Pokémon para Desenvolvedores

  
## Pré-requisitos
1. Ter o PHP instalado em sua máquina, recomendável usar a versão 7.3 ou superior.
2. Use o servidor de preferencia ou abra o index.php e digite o seguinte comando no terminal:

php -S localhost:8080

 Após digitar o comando abra ele com CTRL + Botão esquerdo do mouse.

## Como é o desafio?
- Em uma página HTML deve ser possível informar uma cidade de qualquer lugar do mundo;
- De acordo com as condições climáticas desta cidade deve-se exibir um Pokémon baseado em seu tipo (fogo, água, elétrico, etc) seguindo as seguintes regras:
  - Lugares onde a temperatura for menor **(<) que 5ºC**, deve-se retornar um pokémon de **gelo (ice)**.
  - Lugares onde a temperatura estiver entre **(>=) 5ºC e (<) 10ºC**, deve-se retornar um pokémon do tipo **água (water)**.
  - Lugares onde a temperatura estiver entre **(>=) 12ºC e (<) 15ºC**, deve-se retornar um pokémon do tipo **grama (grass)**.
  - Lugares onde a temperatura estiver entre **(>=) 15ºC e (<) 21ºC**, deve-se retornar um pokémon do tipo **terra (ground)**.
  - Lugares onde a temperatura estiver entre **(>=) 23ºC e (<) 27ºC**, deve-se retornar um pokémon do tipo **inseto (bug)**.
  - Lugares onde a temperatura estiver entre **(>=) 27ºC e 33ºC inclusive**, deve-se retornar um pokémon do tipo **pedra (rock)**.
  - Lugares onde a temperatura for **maior que 33ºC**, deve-se retornar um pokémon do tipo **fogo (fire)**.
  - **Para qualquer outra temperatura**, deve-se retornar um pokémon do tipo **normal**.
  - E, no caso em que **esteja chovendo na região** um pokémon **elétrico (electric)** deve ser retornado, independente da temperatura.
- O pokémon mostrado deve ser aleatório;
- Após a consulta deve-se exibir na tela:
  - Temperatura atual da cidade em graus Celcius;
  - Se está chovendo ou não;
  - Nome do Pokémon seguindo as regras acima.
## Como usar?
Basta digitar uma cidade no campo de busca e será exibido logo abaixo um **Pokemon (foto e nome)** (de acordo com as regras do desafio), a **cidade** que foi digitada, a **temperatura** atual e se está **chovendo**.
