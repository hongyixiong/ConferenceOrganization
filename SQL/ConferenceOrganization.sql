# noinspection SqlNoDataSourceInspectionForFile

DROP DATABASE conferenceorganization;
CREATE DATABASE conferenceorganization;

CREATE TABLE sub_committees (
    name VARCHAR(50) NOT null PRIMARY KEY,
    chair_id VARCHAR(10) UNIQUE
);

CREATE TABLE committee_members (
    id VARCHAR(10) Not null PRIMARY KEY,
    first_name VARCHAR(50) NOT null,
    last_name VARCHAR(50) NOT null,
    phone_number VARCHAR(10),
    email VARCHAR(100),
    committee_name VARCHAR(50),
    FOREIGN KEY (committee_name) REFERENCES sub_committees(name)
    ON DELETE CASCADE
);

ALTER TABLE sub_committees
ADD FOREIGN KEY (chair_id) 
REFERENCES committee_members(id)
ON DELETE SET null;

CREATE TABLE attendees(
    id VARCHAR(10) NOT null PRIMARY KEY,
    first_name VARCHAR(50) NOT null,
    last_name VARCHAR(50) NOT null,
    phone_number VARCHAR(30),
    email VARCHAR(30) NOT null
);

CREATE TABLE registration_roles(
    role VARCHAR(20) NOT null PRIMARY Key,
    rate INT NOT null
);

CREATE TABLE registrations(
    attendee_id VARCHAR(10) NOT null PRIMARY KEY,
    registration_role VARCHAR(20) NOT null,
    amount_paid INT Not null,
    FOREIGN KEY (attendee_id) REFERENCES attendees(id)
    ON DELETE CASCADE,
    FOREIGN KEY (registration_role) REFERENCES registration_roles(role)
    ON DELETE CASCADE
);

CREATE TABLE sessions(
    name VARCHAR(50) NOT null PRIMARY KEY,
    room_location VARCHAR(50) NOT null,
    start_date_time DATETIME NOT null,
    end_date_time DATETIME NOT null,
    speaker_id VARCHAR(10) NOT null,
    FOREIGN KEY (speaker_id) REFERENCES attendees(id)
    ON DELETE CASCADE
);

CREATE TABLE hotel_rooms(
    room_number INT NOT null,
    number_of_beds INT NOT null,
    PRIMARY KEY (room_number, number_of_beds)
);

CREATE TABLE students(
    attendee_id VARCHAR(10) NOT null PRIMARY KEY,
    school VARCHAR(50),
    hotel_room_number INT,
    FOREIGN KEY (attendee_id) REFERENCES attendees(id)
    ON DELETE CASCADE,
    FOREIGN KEY (hotel_room_number) REFERENCES hotel_rooms(room_number)
    ON DELETE SET null
);

CREATE TABLE Professionals(
    attendee_id VARCHAR(10) NOT null PRIMARY KEY,
    FOREIGN KEY (attendee_id) REFERENCES attendees(id)
    ON DELETE CASCADE
);

CREATE TABLE sponsor_levels(
    sponsor_level VARCHAR(10) NOT null PRIMARY KEY,
    amount INT NOT null,
    max_email_number INT NOT null
);

CREATE TABLE sponsor_companies(
    id VARCHAR(9) NOT null PRIMARY KEY,
    name VARCHAR(50) NOT null,
    number_emails_sent INT,
    sponsor_level VARCHAR(10) Not null,
    FOREIGN KEY (sponsor_level) REFERENCES sponsor_levels(sponsor_level)
    ON DELETE CASCADE
);

CREATE TABLE sponsors(
    attendee_id VARCHAR(10) NOT null PRIMARY KEY,
    sponsor_company_id VARCHAR (9) Not null,
    FOREIGN KEY (attendee_id) REFERENCES attendees(id)
    On DELETE CASCADE,
    FOREIGN KEY (sponsor_company_id) REFERENCES sponsor_companies(id)
    ON DELETE CASCADE	
);

CREATE TABLE job_ads(
    sponsor_company_id VARCHAR(9) NOT null,
    job_title VARCHAR(30) NOT null,
    city VARCHAR(30),
    province VARCHAR(30),
    pay_rate VARCHAR(30),
    PRIMARY KEY (sponsor_company_id, job_title),
    FOREIGN KEY (sponsor_company_id) REFERENCES sponsor_companies(id)
    ON DELETE CASCADE
);


INSERT INTO committee_members (id,first_name,last_name,phone_number,email,committee_name) VALUES 
('3000000000', 'Patrik', 'Smith', '6132220001', 'e1234@hotmail.com', null),
('3000000001', 'Anna', 'Barrett', '6132220002', 'e1235@hotmail.com', null),
('3000000002', 'Ossie', 'Bouvier', '6132220003', 'e1236@hotmail.com', null),
('3000000003', 'Connor', 'Mckenney', '6132220004', 'e1237@hotmail.com', null),
('3000000004', 'Kara', 'Latham', '6132220005', 'e1238@hotmail.com', null),
('3000000005', 'David', 'Luciano', '6132220006', 'e1239@hotmail.com', null),
('3000000006', 'Charlie', 'Marashian', '6132220007', 'e1240@hotmail.com', null),
('3000000007', 'Arthur', 'Samuels', '6132220008', 'e1241@hotmail.com', null),
('3000000008', 'Elmar', 'Fasciano', '6132220009', 'e1242@hotmail.com', null),
('3000000009', 'Charles', 'Hollins', '6132220010', 'e1243@hotmail.com', null),
('3000000010', 'Liam', 'Sanders', '6132220011', 'e1244@hotmail.com', null);

INSERT INTO sub_committees (name,chair_id) VALUES
('Program Committee', '3000000000'),
('Registration Committee', '3000000004'),
('Sponsorship committee', '3000000009');

UPDATE committee_members
SET Committee_Name = 'Program Committee'
WHERE id in (
    '3000000000', '3000000001', '3000000002', '3000000003');

UPDATE committee_members
SET Committee_Name = 'Registration Committee'
WHERE id in ('3000000004', '3000000005', '3000000006', '3000000007');

UPDATE committee_members
SET Committee_Name = 'Sponsorship Committee'
WHERE id in ('3000000008', '3000000009', '3000000010');

INSERT INTO attendees(id,first_name,last_name,phone_number,email) VALUES 
('0010181111', 'Rita', 'Mcghee', '999999999', 'rita@gmail.com'), 
('0010181112', 'Pauline', 'Mannion', '999999999', 'pauline@gmail.com'),
('0010181113', 'Cary', 'Jarvis', '999999999', 'cary@gmail.com'),
('0010181114', 'Julia', 'Kimura', '999999999', 'julia@gmail.com'),
('0010181115', 'Neal', 'Berthiaume', '999999999', '12365@gmail.com'), 
('0010181116', 'Grace', 'Hager', '999999999', 'grace@gmail.com'),
('0010181117', 'Heather', 'Prokop', '999999999', 'heather@gmail.com'),
('0010181118', 'Eric', 'Julian', '999999999', 'eric@gmail.com'),
('0010181119', 'Andrew', 'Djordjevic', '999999999', 'andrew@gmail.com'), 
('0010181120', 'Heo', 'Amiel', '999999999', 'heo@gmail.com'),
('0010181121', 'Sarah', 'Kommer', '999999999', 'sarah@gmail.com'),
('0010181122', 'Henry', 'Bailyn', '999999999', 'henry@gmail.com'),
('0010181123', 'Linke', 'Chambers', '999999999', 'linke@gmail.com'), 
('0010181124', 'Yuanhao', 'Wan', '999999999', 'yuanhao@gmail.com'),
('0010181125', 'Grace', 'Richards', '999999999', 'grace@gmail.com');

INSERT INTO registration_roles(role,rate) VALUES
('Student',50),
('Professional',100),
('Sponsor',0);

INSERT INTO registrations(attendee_id,registration_role,amount_paid) VALUES
('0010181111', 'Student', 50), 
('0010181112', 'Student', 50),
('0010181113', 'Student', 50),
('0010181114', 'Student', 50),
('0010181115', 'Student', 50),
('0010181116', 'Professional', 100),
('0010181117', 'Professional', 100),
('0010181118', 'Professional', 100),
('0010181119', 'Professional', 100), 
('0010181120', 'Professional', 100),
('0010181121', 'Sponsor', 0),
('0010181122', 'Sponsor', 0),
('0010181123', 'Sponsor', 0), 
('0010181124', 'Sponsor', 0),
('0010181125', 'Sponsor', 0);

INSERT INTO hotel_rooms(room_number,number_of_beds) VALUES
(01, 1),
(02, 1),
(03, 2),
(04, 2),
(05, 2),
(06, 3),
(07, 3),
(08, 3),
(09, 4),
(10, 4),
(11, 4);

INSERT INTO sponsor_levels (sponsor_level, amount, max_email_number) VALUES 
('Platinum', 10000, '5'), 
('Gold', 5000, '4'),
 ('Silver', 3000, '3'), 
('Bronze', 1000, '0');

INSERT INTO sponsor_companies(id,name,number_emails_sent,sponsor_level) VALUES
('123123123','Pizza Pit',0,'Bronze'),
('999999999','Queen''s University',3,'Silver'),
('012012012','Ubsoft',0,'Gold'),
('100000000', 'Alphabet Inc.', 4, 'Platinum');

INSERT INTO job_ads(sponsor_company_id,job_title,province,city,pay_rate) VALUES
('012012012','Senior Game Designer','ON','Toronto','70000'),
('012012012','VFX Artist','ON','Toronto','80000'),
('100000000','Software developer','ON','Waterloo','90000');

INSERT INTO sessions (name, room_location, start_date_time, end_date_time, speaker_id) VALUES 
('Global warming', 'room 1100', '2019-04-01 08:30:00', '2019-04-01 12:00:00', '0010181117'),
('AI topics', 'room 1101', '2019-04-01 08:30:00', '2019-04-01 12:00:00', '0010181120'),
('Deep learning', 'room 1101', '2019-04-01 14:30:00', '2019-04-01 16:00:00', '0010181120'),
('Ancient Greece', 'room 1200', '2019-04-02 13:00:00', '2019-04-02 14:15:00', '0010181121'),
('Database optimizations', 'room 1101', '2019-04-02 14:30:00', '2019-04-02 15:45:00', '0010181119'),
('Ancient Rome', 'room 1200', '2019-04-02 14:30:00', '2019-04-02 15:45:00', '0010181123');

INSERT INTO students (attendee_id, school, hotel_room_number) VALUES 
('0010181111', 'Queen''s University', '10'), 
('0010181112', 'University of Waterloo', '7'), 
('0010181113', 'Western University', '10'),
('0010181114', 'University of Toronto', '9'),
('0010181115', 'University of Waterloo', '1'),
('0010181116', 'McMaster University', '4'),
('0010181117', 'Queen''s University', '3'),
('0010181118', 'Queen''s University', '11');

INSERT INTO professionals (attendee_id) VALUES 
('0010181116'),
('0010181117'),
('0010181118'),
('0010181119'),
('0010181120');

INSERT INTO sponsors (attendee_id, sponsor_company_id) VALUES 
('0010181121', '012012012'), 
('0010181122', '123123123'), 
('0010181123', '999999999'),
('0010181124', '100000000'),
('0010181125', '100000000');
