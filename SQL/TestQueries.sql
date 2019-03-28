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

-- Select job adds.
Select sponsor_companies.name as company_name, job_ads.job_title, job_ads.city, job_ads.province, job_ads.pay_rate
from job_ads
join sponsor_companies
on job_ads.sponsor_company_id = sponsor_companies.id;

select DISTINCT day(start_date_time) as day, month(start_date_time) as month,
                date(start_date_time)
from sessions
order by month, day;

select DISTINCT date(start_date_time) as date
from sessions
order by date;

-- Select cast('2019-01-02 01:02:03' as datetime);
-- Select time('2019-01-02 01:02:03');
-- select cast('2019-01-02 01:02:03' as datetime) > cast('2019-01-02 01:02:03' as datetime);








