CREATE TABLE tb_informaciones(
    id_informacion             INT (11) NOT NULL  AUTO_INCREMENT PRIMARY KEY,
    nombre_parqueo             VARCHAR(255) NULL,
    activiad_empresa           VARCHAR(255) NULL,
    sucursal                   VARCHAR(255) NULL,
    direccion                  VARCHAR(255) NULL,
    zona                       VARCHAR(255) NULL,
    telefono                   DATETIME NULL,
    departamento_ciudad        DATETIME NULL,
    pais                       DATETIME NULL,


    fyh_creacion               DATETIME NULL,
    fyh_actualizacion          DATETIME NULL,
    fyh_eliminacion            DATETIME NULL,
    estado                     VARCHAR(10)
);