-- Benjamin Andrew, Taylor Nairn, Wyatt Hudgins, Joshua Rex
-- CSD 460, Professor Sue Sampson
-- Moffat Bay Project, Module 5, 30 March 2024
-- This version is a test of the database to ensure all functions as intended

-- Select Database
USE MoffatBay;

-- Determine room cost by number of guests
DELIMITER //
CREATE TRIGGER calculate_cost
BEFORE INSERT ON MoffatBay.Reservation
FOR EACH ROW
BEGIN
    DECLARE guests INT;
    DECLARE cost_per_night DOUBLE;

    -- Get Number of Guests
    SET guests = NEW.number_of_guests;

    -- Calculate Cost Per Night Based on Number of Guests
    IF guests >= 1 AND guests <= 2 THEN
        SET cost_per_night = 115.00;
    ELSEIF guests >= 3 AND guests <= 5 THEN
        SET cost_per_night = 150.00;
    END IF;

    -- Set Cost Per Night in Reservation Table
    SET NEW.cost_per_night = cost_per_night;
END //
DELIMITER ;

DELIMITER //

-- Trigger to calculate total cost before inserting a new reservation
CREATE TRIGGER before_insert_calculate_total_cost
BEFORE INSERT ON MoffatBay.Reservation
FOR EACH ROW
BEGIN
    DECLARE days INT;
    -- Calculate the number of days between check_in_date and check_out_date
    SET days = DATEDIFF(NEW.check_out_date, NEW.check_in_date);

    -- Set the total cost based on cost_per_night and number of days
    SET NEW.total_cost = NEW.cost_per_night * days;
END //

-- Trigger to calculate total cost before updating an existing reservation
CREATE TRIGGER before_update_calculate_total_cost
BEFORE UPDATE ON MoffatBay.Reservation
FOR EACH ROW
BEGIN
    DECLARE days INT;
    -- Calculate the number of days between check_in_date and check_out_date
    SET days = DATEDIFF(NEW.check_out_date, NEW.check_in_date);

    -- Set the total cost if cost_per_night or dates are changed
    IF NEW.cost_per_night != OLD.cost_per_night OR NEW.check_in_date != OLD.check_in_date OR NEW.check_out_date != OLD.check_out_date THEN
        SET NEW.total_cost = NEW.cost_per_night * days;
    END IF;
END //

DELIMITER ;

-- Populate an entry in 'Room' table
INSERT INTO MoffatBay.Room (room_type, number_available) VALUES ('double full beds', '4');
INSERT INTO MoffatBay.Room (room_type, number_available) VALUES ('queen bed', '4');
INSERT INTO MoffatBay.Room (room_type, number_available) VALUES ('double queen beds', '4');
INSERT INTO MoffatBay.Room (room_type, number_available) VALUES ('king bed', '4');

-- Populate entries in 'Customer' table
INSERT INTO MoffatBay.Customer (email, password, first_name, last_name, phone) VALUES ('john.doe@baymail.com', 'apples', 'John', 'Doe', '8684101229');
INSERT INTO MoffatBay.Customer (email, password, first_name, last_name, phone) VALUES ('tracy.smith@baymail.com', 'password', 'Tracy', 'Smith', '6419940969');
INSERT INTO MoffatBay.Customer (email, password, first_name, last_name, phone) VALUES ('Jknight@yippee.com', 'BugFriendz13', 'Jenifer', 'Knight', '2972197680');
INSERT INTO MoffatBay.Customer (email, password, first_name, last_name, phone) VALUES ('goodall@aoe.biz.com', 'Persian3l3phants', 'Samuel', 'Goodall', '1671166685');
INSERT INTO MoffatBay.Customer (email, password, first_name, last_name, phone) VALUES ('smith.lexington@dod.gov', '!@#$1234ASdf', 'Smith', 'Lexington', '8751572215');

-- Populate entries in 'Reservation' table
INSERT INTO MoffatBay.Reservation (room_type, customerID, number_of_guests, check_in_date, check_out_date, cost_per_night, total_cost)
VALUES ('double full beds', '1', '3', '2024-03-30', '2024-04-01', NULL, NULL);
INSERT INTO MoffatBay.Reservation (room_type, customerID,  number_of_guests, check_in_date, check_out_date, cost_per_night, total_cost)
VALUES ('queen bed', '2', '1', '2024-03-30', '2024-04-01', NULL, NULL);
INSERT INTO MoffatBay.Reservation (room_type, customerID,  number_of_guests, check_in_date, check_out_date, cost_per_night, total_cost)
VALUES ('king bed', '2', '2', '2024-03-30', '2024-04-01', NULL, NULL);
INSERT INTO MoffatBay.Reservation (room_type, customerID,  number_of_guests, check_in_date, check_out_date, cost_per_night, total_cost)
VALUES ('double queen beds', '4', '5', '2024-03-30', '2024-04-01', NULL, NULL);