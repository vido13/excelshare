/*
Created		20.4.2015
Modified		20.4.2015
Project		
Model		
Company		
Author		
Version		
Database		mySQL 5 
*/


Create table podatki (
	id Serial NOT NULL,
	ime Varchar(20) NOT NULL,
	teza Varchar(20) NOT NULL,
	visina Varchar(20) NOT NULL,
	starost Varchar(20) NOT NULL,
	vid Varchar(20) NOT NULL,
	sluh Varchar(20) NOT NULL,
	tabela_id Bigint UNSIGNED NOT NULL,
 Primary Key (id)) ENGINE = MyISAM;

Create table tabele (
	id Serial NOT NULL,
	id_datoteke Varchar(100) NOT NULL,
 Primary Key (id)) ENGINE = MyISAM;


Alter table podatki add Foreign Key (tabela_id) references tabele (id) on delete  restrict on update  restrict;


