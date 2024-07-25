create table users(id INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
etname VARCHAR(50), etnamefather VARCHAR(50), 
etnamemother VARCHAR(50), etemail VARCHAR(50), 
etpassword VARCHAR(50), etcel VARCHAR(50), 
etbirthday VARCHAR(50), acvdependence VARCHAR(50), 
acvsex VARCHAR(50), created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP);

INSERT INTO users (etname, etnamefather, etnamemother, etemail, etpassword, etcel, etbirthday, acvdependence, acvsex) 
VALUES ('Jose', 'Perez', 'Perez', 'JosePerez@gmail.com', '5571758674', '5571758674', '15/04/1990', 'dependence', 'masculino');