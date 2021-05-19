SISTEMAS OPERACIONAIS 2021.1
Prof. Fernando Parente Garcia
Projeto I - Problema da Televisão
Em uma pousada há apenas uma televisão que pega N canais. Os hóspedes apenas descansam ou então assistem televisão, mas cada hóspede tem um canal preferido e só assiste televisão nesse canal. O hóspede que tiver o controle remoto pode escolher o canal de sua preferência, e então todos os outros hóspedes que gostam desse mesmo canal e quiserem assistir televisão, podem assistir juntos. Os que preferem outros canais ficam dormindo (bloqueado). Apenas quando o último hóspede que está assistindo televisão em determinado canal sai e vai descansar, é que o controle remoto fica livre, e algum hóspede pode escolher outro canal. Utilizando semáforos, modele os threads “hóspedes".

Configuração:
Ao iniciar a execução, o programa deverá solicitar ao usuário a quantidade de canais que podem ser sintonizados (N). Criação dos Hóspedes:

A interface deverá possuir um botão ou opção de menu que permita ao usuário criar um thread hóspede a qualquer momento.
Durante a criação de cada thread hóspede o usuário deverá atribuir os seguintes parâmetros:
Id: identificador do hóspede, que pode ser um número ou nome atribuído pelo usuário ou um número sequencial criado automaticamente;
Canal: canal preferido do hóspede (1 à N);
Tv: tempo (em segundos) que o hóspede fica assistindo televisão no seu canal preferido. Durante este tempo o hóspede deverá mostrar na interface que está fazendo alguma ação (processando);
Td: tempo (em segundos) que o hóspede fica descansando sem assistir televisão e sem dormir. Durante este tempo o hóspede deverá mostrar na interface que está fazendo alguma ação (processando);
Saídas:
A interface deverá atender aos seguintes requisitos:
✓ Mostrar o canal selecionado naquele instante.
✓ Mostrar os dados de cada hóspede: identificador, canal preferido, tempo que ele passa assistindo televisão e o tempo que ele fica descansando.
✓ Mostrar a cada instante, o status de cada thread hóspede (assistindo televisão, descansando ou dormindo (bloqueado)).
✓ Mostrar um log com os principais eventos de cada hóspede.
Data de entrega: 20/05/2021
