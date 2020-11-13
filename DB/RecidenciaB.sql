/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     8/11/2020 5:57:06 p. m.                      */
/*==============================================================*/
drop database prueba;
create database prueba;
use prueba;
drop table if exists ARRENDADOR;

drop table if exists ESTUDIANTE;

drop table if exists HABITACION;

drop table if exists PERFIL;

drop table if exists SERVICIO;

drop table if exists TIENE_SERVICIO;

drop table if exists VISITA;

drop table if exists VIVIENDA;

/*==============================================================*/
/* Table: ARRENDADOR                                            */
/*==============================================================*/
create table ARRENDADOR
(
   ID_ARRENDADOR        int not null,
   ID_USUARIO           int,
   VIP                  bool,
   primary key (ID_ARRENDADOR)
);

/*==============================================================*/
/* Table: ESTUDIANTE                                            */
/*==============================================================*/
create table ESTUDIANTE
(
   ID_ESTUDIANTE        int not null,
   ID_USUARIO           int,
   primary key (ID_ESTUDIANTE)
);


/*==============================================================*/
/* Table: HABITACION                                            */
/*==============================================================*/
create table HABITACION
(
   ID_HABITACION        int not null,
   ID_CASA              char(10),
   AREA                 int,
   AMOBLADO             varchar(1000),
   PRECIO               int,
   BANO                 bool,
   primary key (ID_HABITACION)
);

/*==============================================================*/
/* Table: PERFIL                                                */
/*==============================================================*/
create table PERFIL
(
   ID_USUARIO           int not null,
   NOMBRE               varchar(30),
   CONTRASENA           varchar(30),
   EMAIL                varchar(30),
   NUMERO               int,
   primary key (ID_USUARIO)
);

/*==============================================================*/
/* Table: SERVICIO                                              */
/*==============================================================*/
create table SERVICIO
(
   ID_SERVICIO          int not null,
   PUBLICO              bool,
   ADICIONAL            bool,
   DESCRIPCION          varchar(1000),
   primary key (ID_SERVICIO)
);

/*==============================================================*/
/* Table: TIENE_SERVICIO                                        */
/*==============================================================*/
create table TIENE_SERVICIO
(
   ID_HABITACION        int,
   ID_SERVICIO          int
);

/*==============================================================*/
/* Table: VISITA                                                */
/*==============================================================*/
create table VISITA
(
   ID_VISITA            int not null,
   ID_HABITACION        int,
   ID_ESTUDIANTE        int,
   FECHA                datetime,
   primary key (ID_VISITA)
);

/*==============================================================*/
/* Table: VIVIENDA                                              */
/*==============================================================*/
create table VIVIENDA
(
   ID_CASA              char(10) not null,
   ID_ARRENDADOR        int,
   LATITUD              float,
   LONGITUD             float,
   DIRRECCION           varchar(1024),
   primary key (ID_CASA)
);
/*==============================================================*/
/* Table: OCUPA                                                 */
/*==============================================================*/
create table OCUPA
(
   ID_HABITACION       int not null,
   ID_ESTUDIANTE          int,
   FECHA_INICIO                datetime,
   FECHA_FIN	         datetime
);

alter table ARRENDADOR add constraint FK_12 foreign key (ID_USUARIO)
      references PERFIL (ID_USUARIO) on delete restrict on update restrict;

alter table ESTUDIANTE add constraint FK_22 foreign key (ID_USUARIO)
      references PERFIL (ID_USUARIO) on delete restrict on update restrict;

      
alter table OCUPA add constraint FK_66 foreign key (ID_ESTUDIANTE)
      references ESTUDIANTE (ID_ESTUDIANTE) on delete restrict on update restrict;
      
      alter table OCUPA add constraint FK_99 foreign key (ID_HABITACION)
      references HABITACION (ID_HABITACION) on delete restrict on update restrict;


alter table HABITACION add constraint FK_9 foreign key (ID_CASA)
      references VIVIENDA (ID_CASA) on delete restrict on update restrict;


alter table TIENE_SERVICIO add constraint FK_14 foreign key (ID_HABITACION)
      references HABITACION (ID_HABITACION) on delete restrict on update restrict;

alter table TIENE_SERVICIO add constraint FK_15 foreign key (ID_SERVICIO)
      references SERVICIO (ID_SERVICIO) on delete restrict on update restrict;

alter table VISITA add constraint FK_11 foreign key (ID_HABITACION)
      references HABITACION (ID_HABITACION) on delete restrict on update restrict;

alter table VISITA add constraint FK_8 foreign key (ID_ESTUDIANTE)
      references ESTUDIANTE (ID_ESTUDIANTE) on delete restrict on update restrict;

alter table VIVIENDA add constraint FK_10 foreign key (ID_ARRENDADOR)
      references ARRENDADOR (ID_ARRENDADOR) on delete restrict on update restrict;

