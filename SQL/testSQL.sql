# noinspection SqlNoDataSourceInspectionForFile
-- noinspection SqlDialectInspectionForFile

-- This file keeps some commonly used SQL queries used for testing.

-- Select non-full hotel rooms
Select room_number
from (
Select hotel_rooms.room_number as room_number, count(students.hotel_room_number) as occupancy, hotel_rooms.number_of_beds
from students
right join hotel_rooms
on students.hotel_room_number = hotel_rooms.room_number
group by hotel_rooms.room_number
HAVING occupancy < hotel_rooms.number_of_beds
) as temp;

-- Select All info about students
Select *
from students
join hotel_rooms
on hotel_rooms.room_number = students.hotel_room_number
join attendees
on students.attendee_id = attendees.id
join registrations
on registrations.attendee_id = attendees.id;

-- Select sponsor and there companies.
Select *
from sponsors
join sponsor_companies
on sponsor_companies.id = sponsors.sponsor_company_id;












