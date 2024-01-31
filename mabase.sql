CREATE TABLE IF NOT EXISTS liste (
    numeroTel INT NOT NULL AUTO_INCREMENT,
    nom VARCHAR (50) NOT NULL,
    prrenom VARCHAR (50) NOT NULL,
    postnom VARCHAR (50) NOT NULL,
    addresse VARCHAR (50) NOT NULL,
    descriptionaddresse VARCHAR (250) NOT NULL,
    emails VARCHAR (50) NOT NULL,
    PRIMARY KEY (numeroTel) 
);