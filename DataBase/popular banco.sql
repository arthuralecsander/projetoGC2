/* 
Adicionando Assuntos Pais
*/

INSERT INTO tbAssunto (assunto, idAssuntoPai)
VALUES ("Língua Portuguesa",null);

INSERT INTO tbAssunto (assunto, idAssuntoPai)
VALUES ("Informática",null);

INSERT INTO tbAssunto (assunto, idAssuntoPai)
VALUES ("Atualidades",null);

INSERT INTO tbAssunto (assunto, idAssuntoPai)
VALUES ("Matemática Básica",null);

/* 
Adicionando Assuntos filhos
*/

/*
Assuntos filhos Lingua portuguesa
*/

INSERT INTO tbAssunto (assunto, idAssuntoPai)
VALUES ("Interpretação de textos",1);

INSERT INTO tbAssunto (assunto, idAssuntoPai)
VALUES ("Estrutura Textual e Análise de Discurso",1);

INSERT INTO tbAssunto (assunto, idAssuntoPai)
VALUES ("Leitura e Artes",1);

INSERT INTO tbAssunto (assunto, idAssuntoPai)
VALUES ("Variação Linguística",1);

INSERT INTO tbAssunto (assunto, idAssuntoPai)
VALUES ("Gêneros textuais",1);

/*
Assuntos filhos Informatica
*/

INSERT INTO tbAssunto (assunto, idAssuntoPai)
VALUES ("Sistemas operacionais",2);

INSERT INTO tbAssunto (assunto, idAssuntoPai)
VALUES ("Navegadores",2);

INSERT INTO tbAssunto (assunto, idAssuntoPai)
VALUES ("Seguranca e protecao",2);

INSERT INTO tbAssunto (assunto, idAssuntoPai)
VALUES ("Atalhos",2);

INSERT INTO tbAssunto (assunto, idAssuntoPai)
VALUES ("Aplicativos de computador",2);

/*
Assuntos filhos Atualidades
*/

INSERT INTO tbAssunto (assunto, idAssuntoPai)
VALUES ("Pandemia de Covid-19",3);

INSERT INTO tbAssunto (assunto, idAssuntoPai)
VALUES ("Crise econômica mundial",3);

INSERT INTO tbAssunto (assunto, idAssuntoPai)
VALUES ("Ensino a distância",3);

INSERT INTO tbAssunto (assunto, idAssuntoPai)
VALUES ("Eleição dos Estados Unidos",3);

INSERT INTO tbAssunto (assunto, idAssuntoPai)
VALUES ("Desmatamento na Amazônia e no Pantanal",3);

/*
Assuntos filhos Matemática Básica
*/

INSERT INTO tbAssunto (assunto, idAssuntoPai)
VALUES ("Operações Básicas",4);

INSERT INTO tbAssunto (assunto, idAssuntoPai)
VALUES ("Potenciação e Radiciação",4);

INSERT INTO tbAssunto (assunto, idAssuntoPai)
VALUES ("Expressões Numéricas",4);

INSERT INTO tbAssunto (assunto, idAssuntoPai)
VALUES ("Múltiplos, Divisores, MDC e MMC",4);

INSERT INTO tbAssunto (assunto, idAssuntoPai)
VALUES ("Operações Básicas com Polinômios",4);

/*
Bancas
*/
INSERT INTO tbBanca (nomeBanca)
VALUES ("FGV");

INSERT INTO tbBanca (nomeBanca)
VALUES ("CESPE");

INSERT INTO tbBanca (nomeBanca)
VALUES ("CESGRANRIO");

INSERT INTO tbBanca (nomeBanca)
VALUES ("VUNESP");

INSERT INTO tbBanca (nomeBanca)
VALUES ("SELECON");

/*
Orgaos
*/
INSERT INTO tbOrgao (nomeOrgao)
VALUES ("Marinha");

INSERT INTO tbOrgao (nomeOrgao)
VALUES ("Aeronáutica");

INSERT INTO tbOrgao (nomeOrgao)
VALUES ("Exército");

INSERT INTO tbOrgao (nomeOrgao)
VALUES ("SERPRO");

INSERT INTO tbOrgao (nomeOrgao)
VALUES ("INCRA");

