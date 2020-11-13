/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     17/10/2020 4:39:53 p. m.                     */
/*==============================================================*/


drop table if exists APARTAESTUDIO;

drop table if exists APARTAMENTO;

drop table if exists CASA;

drop table if exists EDIFICIO;

drop table if exists HABITACION;

drop table if exists SERVICIO;

drop table if exists USUARIO;

drop table if exists VISITAS;

/*==============================================================*/
/* Table: APARTAESTUDIO                                         */
/*==============================================================*/
create table APARTAESTUDIO
(
   ID_APARTAESTUDIO     char(10) not null,
   ID_EDIFICIO          int,
   ID_CASA              char(10),
   AMOBLADO             varchar(1000),
   PRECIO               int,
   AREA                 int,
   primary key (ID_APARTAESTUDIO)
);

/*==============================================================*/
/* Table: APARTAMENTO                                           */
/*==============================================================*/
create table APARTAMENTO
(
   ID_APARTAMENTO       int not null,
   ID_EDIFICIO          int,
   BANOS                int,
   HABITACIONES         int,
   AMOBLADO             varchar(1000),
   PRECIO               int,
   primary key (ID_APARTAMENTO)
);

/*==============================================================*/
/* Table: CASA                                                  */
/*==============================================================*/
create table CASA
(
   ID_CASA              char(10) not null,
   ID_USUARIO           int,
   BANOS                int,
   HABITACIONES         int,
   DIRECCION            varchar(200),
   DISTANCIA            int,
   primary key (ID_CASA)
);

/*==============================================================*/
/* Table: EDIFICIO                                              */
/*==============================================================*/
create table EDIFICIO
(
   ID_EDIFICIO          int not null,
   ID_USUARIO           int,
   DIRECCION            varchar(200),
   APARTAMENTOS         int,
   DISTANCIA            int,
   primary key (ID_EDIFICIO)
);

/*==============================================================*/
/* Table: HABITACION                                            */
/*==============================================================*/
create table HABITACION
(
   ID_HABITACION        int not null,
   ID_APARTAMENTO       int,
   ID_CASA              char(10),
   AREA                 int,
   AMOBLADO             varchar(1000),
   PRECIO               int,
   primary key (ID_HABITACION)
);

/*==============================================================*/
/* Table: SERVICIO                                              */
/*==============================================================*/
create table SERVICIO
(
   ID_SERVICIO          int not null,
   ID_EDIFICIO          int,
   ID_CASA              char(10),
   PUBLICO              bool,
   ADICIONAL            bool,
   DESCRIPCION          varchar(1000),
   primary key (ID_SERVICIO)
);

/*==============================================================*/
/* Table: USUARIO                                               */
/*==============================================================*/
create table USUARIO
(
   ID_USUARIO           int not null,
   NOMBRE               varchar(30),
   CONTRASENA           varchar(30),
   EMAIL                varchar(30),
   VIP                  bool,
   TIPO                 bool,
   NUMERO               int,
   primary key (ID_USUARIO)
);

/*==============================================================*/
/* Table: VISITAS                                               */
/*==============================================================*/
create table VISITAS
(
   ID_VISITAS           int not null,
   ID_USUARIO           int,
   ID_HABITACION        int,
   FECHA                datetime,
   primary key (ID_VISITAS)
);

alter table APARTAESTUDIO add constraint FK_5 foreign key (ID_EDIFICIO)
      references EDIFICIO (ID_EDIFICIO) on delete restrict on update restrict;

alter table APARTAESTUDIO add constraint FK_8 foreign key (ID_CASA)
      references CASA (ID_CASA) on delete restrict on update restrict;

alter table APARTAMENTO add constraint FK_6 foreign key (ID_EDIFICIO)
      references EDIFICIO (ID_EDIFICIO) on delete restrict on update restrict;

alter table CASA add constraint FK_4 foreign key (ID_USUARIO)
      references USUARIO (ID_USUARIO) on delete restrict on update restrict;

alter table EDIFICIO add constraint FK_3 foreign key (ID_USUARIO)
      references USUARIO (ID_USUARIO) on delete restrict on update restrict;

alter table HABITACION add constraint FK_7 foreign key (ID_APARTAMENTO)
      references APARTAMENTO (ID_APARTAMENTO) on delete restrict on update restrict;

alter table HABITACION add constraint FK_9 foreign key (ID_CASA)
      references CASA (ID_CASA) on delete restrict on update restrict;

alter table SERVICIO add constraint FK_1 foreign key (ID_EDIFICIO)
      references EDIFICIO (ID_EDIFICIO) on delete restrict on update restrict;

alter table SERVICIO add constraint FK_2 foreign key (ID_CASA)
      references CASA (ID_CASA) on delete restrict on update restrict;

alter table VISITAS add constraint FK_11 foreign key (ID_HABITACION)
      references HABITACION (ID_HABITACION) on delete restrict on update restrict;

alter table VISITAS add constraint FK_RELATIONSHIP_10 foreign key (ID_USUARIO)
      references USUARIO (ID_USUARIO) on delete restrict on update restrict;

