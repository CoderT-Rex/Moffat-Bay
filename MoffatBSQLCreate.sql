-- Benjamin Andrew, Taylor Nairn, Wyatt Hudgins, Joshua Rex
-- Moffat Bay Project, Module 5, 30 March 2024

-- Drop existing shop database, RESETS DATABASE INFORMATION
DROP DATABASE IF EXISTS MoffatBay;

-- Create the MoffatBay database
CREATE DATABASE MoffatBay;

-- Create Room Table
CREATE TABLE MoffatBay.Room (
    room_type varchar(40) NOT NULL,
    number_available int NOT NULL,
    PRIMARY KEY (room_type),
    key room_type_key (room_type)
);

-- Create Customer Table
CREATE TABLE MoffatBay.Customer (
    customerID int NOT NULL AUTO_INCREMENT,
    email varchar(70) NOT NULL,
    password varchar(255) NOT NULL,
    first_name varchar(40) NOT NULL,
    last_name varchar(40) NOT NULL,
    phone varchar(20) NOT NULL,
    PRIMARY KEY (customerID),
    KEY customerID_key (customerID),
);

-- Create Reservation Table
CREATE TABLE MoffatBay.Reservation (
    reservationID int NOT NULL AUTO_INCREMENT,
    room_type varchar(40) NOT NULL,
    customerID int NOT NULL,
    number_of_guests int NOT NULL,
    check_in_date DATE NOT NULL,
    check_out_date DATE NOT NULL,
    cost_per_night double,
    total_cost double,
    PRIMARY KEY (reservationID),
    KEY reservationID_key (reservationID),
    CONSTRAINT room_type_fk FOREIGN KEY (room_type) REFERENCES Room (room_type),
    CONSTRAINT customerID_fk FOREIGN KEY (customerID) REFERENCES Customer (customerID)
);


