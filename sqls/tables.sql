Create database TrkOnlineBooking;
Use TrkOnlineBooking;

CREATE TABLE Employee(
    employee_id varchar (10),
    first_name varchar(25),
    last_name varchar(25),
    dob date,
    emp_address varchar(80),
    contact varchar(25),
    gender varchar(7),
    email varchar(50),
    primary key(employee_id)
);

CREATE TABLE TRKOwner(
    employee_id varchar(10),
    first_name varchar(25),
    last_name varchar(25),
    email varchar (50),
    primary key(employee_id) 
);

CREATE TABLE Customer(
    customer_id varchar(10),
    first_name varchar(25),
    last_name varchar(25),
    cus_address varchar(100),
    email varchar(50),
    phone varchar(30),
    primary key(customer_id)

);

CREATE TABLE EmpLogin(
    employee_id varchar(10),
    email varchar (50),
    passwd varchar(15),
    primary key(employee_id),
    foreign key (employee_id) references Employee(employee_id) on delete cascade on update cascade 
);

CREATE TABLE Account(
    employee_id varchar(10),
    first_name varchar(25),
    last_name varchar(25),
    emp_address varchar(100),
    years integer,
    title varchar(10),
    salary integer,
    primary key(employee_id)
);

CREATE TABLE Booking(
    booking_id varchar(10),
    customer_id varchar(10),
    employee_id varchar(10),
    equipment_id varchar(10),
    venue varchar(50),
    date_of_event date,
    time_of_event time,
    primary key(booking_id,customer_id)
);

CREATE TABLE Equipment(
    equipment_id varchar(10),
    booking_id varchar(10),
    stat varchar(20) NOT NULL,
    equipment_name varchar (25),
    equipment_quantity integer,
    primary key(equipment_id,booking_id)

);

