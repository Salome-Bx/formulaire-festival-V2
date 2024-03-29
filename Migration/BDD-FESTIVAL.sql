#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: USER
#------------------------------------------------------------

CREATE TABLE festival_USER(
        Id_User   Int  Auto_increment NOT NULL ,
        lastName  Varchar (50) NOT NULL ,
        firstName Varchar (50) NOT NULL ,
        password  Varchar (250) NOT NULL ,
        address   Varchar (250) NOT NULL ,
        telephone Int NOT NULL ,
        User_Role TINYINT(1) NOT NULL ,
        mail      Varchar (50) NOT NULL
	,CONSTRAINT USER_AK UNIQUE (mail)
	,CONSTRAINT USER_PK PRIMARY KEY (Id_User)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Reservation
#------------------------------------------------------------

CREATE TABLE festival_Reservation(
        ID_RESERVATION     Int  Auto_increment  NOT NULL ,
        Number_Reservation Int NOT NULL ,
        Quantity_Sledge    Int NOT NULL ,
        Quantity_Headphone Int NOT NULL ,
        Children           TINYINT(1) NOT NULL ,
        Id_User            Int NOT NULL
	,CONSTRAINT Reservation_PK PRIMARY KEY (ID_RESERVATION)

	,CONSTRAINT Reservation_USER_FK FOREIGN KEY (Id_User) REFERENCES festival_USER(Id_User)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Event
#------------------------------------------------------------

CREATE TABLE festival_Event(
        Id_Date       Int  Auto_increment  NOT NULL ,
        Date          Date NOT NULL ,
        Price         Decimal (50) NOT NULL ,
        Reduced_Price Int NOT NULL ,
        Name          Varchar (255) NOT NULL
	,CONSTRAINT Event_PK PRIMARY KEY (Id_Date)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Night
#------------------------------------------------------------

CREATE TABLE festival_Night(
        Id_Date Int NOT NULL ,
        Price   Decimal NOT NULL ,
        Name    Varchar (250) NOT NULL
	,CONSTRAINT Night_PK PRIMARY KEY (Id_Date)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ReservationHasEvent
#------------------------------------------------------------

CREATE TABLE festival_ReservationHasEvent(
        Id_Date        Int NOT NULL ,
        ID_RESERVATION Int NOT NULL
	,CONSTRAINT ReservationHasEvent_PK PRIMARY KEY (Id_Date,ID_RESERVATION)

	,CONSTRAINT ReservationHasEvent_Event_FK FOREIGN KEY (Id_Date) REFERENCES festival_Event(Id_Date)
	,CONSTRAINT ReservationHasEvent_Reservation0_FK FOREIGN KEY (ID_RESERVATION) REFERENCES festival_Reservation(ID_RESERVATION)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ReservationHasNight
#------------------------------------------------------------

CREATE TABLE festival_ReservationHasNight(
        Id_Date        Int NOT NULL ,
        ID_RESERVATION Int NOT NULL ,
        Date           Date NOT NULL
	,CONSTRAINT ReservationHasNight_PK PRIMARY KEY (Id_Date,ID_RESERVATION)

	,CONSTRAINT ReservationHasNight_Night_FK FOREIGN KEY (Id_Date) REFERENCES festival_Night(Id_Date)
	,CONSTRAINT ReservationHasNight_Reservation0_FK FOREIGN KEY (ID_RESERVATION) REFERENCES festival_Reservation(ID_RESERVATION)
)ENGINE=InnoDB;

