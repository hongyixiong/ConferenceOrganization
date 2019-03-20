create database theatre_complexes_db;

CREATE TABLE Theatre_Complexes (
  complex_no		integer not null,
  theatre_num 		integer  not null,
  name 		varchar(50),
  address varchar(100),
  phone_no 	varchar(11),
  primary key (complex_no)
);



CREATE TABLE Customer (
  account_no		integer not null,
  complex_no    integer not null,
  isAdmin       boolean not null,
  lname 		varchar(20),
  fname 		varchar(20),
  address 		varchar(100),
  e_mail 		varchar(50),
  password 		varchar(20),
  creditcard_no 	char(20),
  creditcard_expiry_date 	varchar(5),
  primary key(account_no),
  foreign key(complex_no) references Theatre_Complexes(complex_no)
);


CREATE TABLE Theatre (
  theatre_no 		integer not null,
  max_num_seats 	integer,
  complex_id        integer not null,
  screen_size 		varchar(20),
  profit			integer,
  primary key(theatre_no),
  foreign key (complex_id) references Theatre_Complexes(complex_no)
);





CREATE TABLE Movie (
  movie_id    varchar(15) not null,
  title     varchar(30),
  running_time    integer,
  rating      varchar(10),
  plot_synopsis   varchar(500),
  start_date    date,
  end_date    date,
  primary key (movie_id)
);

 

CREATE TABLE Daily_Showing (
  show_time		datetime not null,
  left_seat 	integer not null,
  movie_id		varchar(15) not null,
  theatre_no	integer not null,
  sale        integer not null,
  primary key(movie_id, theatre_no, show_time),
  foreign key (theatre_no) references Theatre(theatre_no)
  );




 CREATE TABLE Director (
  lname 		varchar(20) not null,
  fname 		varchar(20) not null,
  movie_id      varchar(15),
  primary key (lname,fname),
  foreign key (movie_id) references Movie(movie_id)
);




CREATE TABLE Main_Actor (
  lname 		varchar(20) not null,
  fname 		varchar(20) not null,
  role     varchar(100),
  movie_id      varchar(15),
  primary key (lname, fname),
  foreign key (movie_id) references Movie(movie_id)
);



CREATE TABLE Production_Company (
  name 		varchar(50) not null,
  address 		varchar(100),
  phone_no 		char(11),
  contact_person_name 	varchar(20),
  primary key (name)
);




CREATE TABLE Produce(
  movie_id 		varchar(15) not null,
  company_name 	varchar(50) not null,
  primary key (movie_id,company_name),
  foreign key (movie_id) references Movie(movie_id),
  foreign key (company_name) references Production_Company(name)
);




CREATE TABLE Movie_Supplier (
  company_name 	varchar(20) not null,
  company_address 	varchar(100),
  contact_person_name 	varchar(40),
  primary key (company_name)
);


CREATE TABLE Support(
  movie_id 		varchar(15) not null,
  company_name 	varchar(20) not null,
  primary key (movie_id, company_name),
  foreign key (movie_id) references Movie(movie_id),
  foreign key (company_name) references Movie_Supplier(company_name)
);

CREATE TABLE Rental (
  account_no	integer not null,
  time 			datetime DEFAULT CURRENT_TIMESTAMP,
  movie_id  varchar(15) not null,
  primary key (account_no,movie_id),
  foreign key (account_no) references Customer(account_no),
  foreign key (movie_id) references Movie(movie_id)
);




CREATE TABLE Customer_Phone (
  account_no 		integer not null,
  phone_no		char(11),
  primary key (account_no, phone_no),
  foreign key (account_no) references Customer(account_no)
);

CREATE TABLE Reservation(
  account_no		integer not null,
  movie_id      varchar(15) not null,
  theatre_no        integer not null,
  ticket_num  		integer not null,
  show_time         datetime not null,
  time			datetime DEFAULT CURRENT_TIMESTAMP,
  state			varchar(10) not null,
  primary key (account_no, show_time, theatre_no, time),
  foreign key (account_no) references Customer(account_no),
  foreign key (theatre_no) references Theatre(theatre_no),
  foreign key (movie_id) references Movie(movie_id)
);


CREATE TABLE Review(
  account_no		integer not null,
  movie_id		varchar(15) not null,
  review_time    	datetime DEFAULT CURRENT_TIMESTAMP,
  review_rating 	integer not null,
  review_content 	varchar(5000) not null,
  primary key (account_no, movie_id),
  foreign key (account_no) references Customer(account_no),
  foreign key (movie_id) references Movie(movie_id)
);

CREATE TABLE BelongTo(
  movie_id   varchar(15) not null,
  complex_no    integer not null,
  primary key (movie_id,complex_no),
  foreign key(complex_no) references Theatre_Complexes(complex_no),
  foreign key (movie_id) references Movie(movie_id)
 );

insert into Theatre_Complexes values
(1,3,'Carolina','195 Waterspring Rd.','1234567890'),
(2,3,'Georgia','703 Arrowhead Trail','1231231231'),
(3,4,'Alabama','520 Carter Hill Rd.','4564564561');

insert into Customer values
(1234567,1,false,'Smith','James','111 Princess St','SJ@gmail.com','123456','9876543210000000','12/20'),
(2345678,2,false,'David','Beckham','222 Princess St','DB@gmail.com','234567','9876543211234567','11/20'),
(3456789,3,false,'Ronaldo','Cristiano','333 Princess St','RC@gmail.com','345678','9876543212345678','10/20'),
(8765432,2,false,'Messi','Lionel','444 Princess St','ML@gmail.com','456789','9876543213456789','09/20'),
(7654321,3,false,'Jr','Neymar','555 Princess St','JN@gmail.com','987654','9876543219876543','08/20'),
(1111111,1,false,'Robben','Arjen','666 Princess St','RA@gmail.com','876543','9876543218765432','07/20'),
(9876543,2,true,'Williams','Robert','222 King ST','WR@gmail.com','654321','1234567890000000','01/23');

insert into Theatre values
(0101,60,1,'small',4082),	
(0102,90,1,'medium',100000),
(0103,90,1,'medium',104955),
(0201,60,2,'small',6048),
(0202,120,2,'large',7028),
(0203,120,2,'large',294700),
(0301,60,3,'small',27405),
(0302,90,3,'medium',4872),
(0303,90,3,'medium',35838),
(0304,120,3,'large',98248);




insert into Movie values
('042837','Death Wish',107,'R','A mild-mannered father','2018-03-02','2018-04-18'),
('044796','Black Panther',134,'PG-13','After the death of his father','2018-02-26','2018-04-02'),
('043937','A Wrinkle in Time',109,'PG','Meg Murry and her little brother','2018-03-09','2018-05-04'),
('048349','Red Sparrow',140,'R','Dominika is recruited to Sparrow School','2018-03-02', '2018-05-03');

insert into BelongTo values
('042837',1),
('042837',2),
('044796',1),
('043937',2),
('048349',3),
('043937',3);

insert into Daily_Showing values
('2018-02-14 10:00:00',60,'042837',0101,0),
('2018-05-01 07:00:00',60,'042837',0101,0),
('2018-05-01 10:00:00',60,'042837',0101,0),
('2018-05-01 15:00:00',60,'042837',0101,0),
('2018-04-15 08:00:00',60,'048349',0201,0),
('2018-04-15 14:00:00',60,'048349',0201,0),
('2018-04-15 19:00:00',60,'048349',0301,0),
('2018-04-20 08:00:00',120,'043937',0203,0),
('2018-04-20 14:00:00',60,'043937',0201,0),
('2018-04-15 08:00:00',90,'044796',0302,0),
('2018-04-16 14:00:00',60,'044796',0301,0);

insert into Director values
('Johnson','P','042837'),
('King','Q','048349'),
('Young','R','044796'),
('Bell','N','043937');

insert into Main_Actor values
('Rivera','A','amiable','042837'),
('Perry','B','dependable','042837'),
('Long','C','energetic','048349'),
('Ross','D','faithful','042837'),
('Barnes','E','candid','042837'), 
('Morgan','F','constructive','048349'),
('Copper','G','aggressive','048349'), 
('Griffin','H','adaptable','048349');

insert into Production_Company values
('BBC_Films','33 London St.','1111111111','Rey James'),
('Columbia Pictures','22 California St.','2222222222','Davis John'),
('20th_Century_Pictures','44 Queens St.','333333333331','Joyce Griffin');

insert into Produce values
('042837','BBC_Films'),
('043937','20th_Century_Pictures');

insert into Movie_Supplier values
('company1','233 Prince St.','Edward'),
('company2','233 Albert ST.','Ruby');

insert into Support values
('042837','company1'),
('043937','company2');

insert into Rental values
(1234567,'2018-02-15 14:30:00','042837'),
(9876543,'2018-03-15 13:30:00','044796');

insert into Customer_Phone values
(1234567,'3334445555'),
(9876543,'6667778888');



insert into Review values
(1234567,'042837','2018-02-15 14:30:00',4,'completely absurd.'),
(9876543,'042837','2018-03-15 13:30:00',1,'boring'),
(1234567,'044796','2018-04-15 14:30:00',3,'very interesting'),
(1111111,'044796','2018-02-15 13:30:00',1,'boring'),
(9876543,'044796','2018-01-15 14:30:00',5,'very interesting'),
(1234567,'048349','2018-02-15 13:30:00',1,'boring'),
(1111111,'048349','2018-02-15 14:30:00',2,'very interesting'),
(9876543,'048349','2018-03-15 13:30:00',1,'boring');

insert into Reservation values
(1234567,'042837',0101,66666,'2018-02-14 08:00:00','2018-01-01','approved'),
(9876543,'044796',0102,77777,'2018-02-14 08:00:00','2018-01-01','approved');
