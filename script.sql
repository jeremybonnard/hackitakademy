DROP TABLE IF EXISTS utilisateur;
CREATE TABLE IF NOT EXISTS utilisateur(id int AUTO_INCREMENT,avatar VARCHAR (255),pseudo VARCHAR(100),password VARCHAR(56), PRIMARY KEY(ID));
DROP TABLE IF EXISTS goldenPage;
CREATE TABLE IF NOT EXISTS goldenPage(id int AUTO_INCREMENT,title VARCHAR (255),content TEXT, userId int, PRIMARY KEY(ID),CONSTRAINT fk_user_id FOREIGN KEY (userId) REFERENCES utilisateur(id));