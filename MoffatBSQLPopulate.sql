-- Benjamin Andrew, Moffat Bay Project, Module 5, 30 March 2024
-- This version is a test of the database to ensure all functions as intended

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

-- Populate an entry in 'Room' table
INSERT INTO MoffatBay.Room (room_type, number_available) VALUES ('double full beds', '4');
INSERT INTO MoffatBay.Room (room_type, number_available) VALUES ('queen bed', '4');
INSERT INTO MoffatBay.Room (room_type, number_available) VALUES ('double queen beds', '4');
INSERT INTO MoffatBay.Room (room_type, number_available) VALUES ('king bed', '4');

-- Populate entries in 'Reservation' table
INSERT INTO MoffatBay.Reservation (reservationID, number_of_guests, room_type, check_in_date, check_out_date, cost_per_night) VALUES ('1', '3', 'double full beds', '2024-03-30', '2024-04-01', NULL);
INSERT INTO MoffatBay.Reservation (reservationID, number_of_guests, room_type, check_in_date, check_out_date, cost_per_night) VALUES ('2', '1', 'queen bed', '2024-03-30', '2024-04-01', NULL);
INSERT INTO MoffatBay.Reservation (reservationID, number_of_guests, room_type, check_in_date, check_out_date, cost_per_night) VALUES ('3', '2', 'king bed', '2024-03-30', '2024-04-01', NULL);
INSERT INTO MoffatBay.Reservation (reservationID, number_of_guests, room_type, check_in_date, check_out_date, cost_per_night) VALUES ('4', '5', 'double queen beds', '2024-03-30', '2024-04-01', NULL);

-- Populate entries in 'Customer' table
INSERT INTO MoffatBay.Customer (email, password, first_name, last_name, phone, reservationID) VALUES ('john.doe@baymail.com', 'apples', 'John', 'Doe', '8684101229', '1');
INSERT INTO MoffatBay.Customer (email, password, first_name, last_name, phone, reservationID) VALUES ('tracy.smith@baymail.com', 'password', 'Tracy', 'Smith', '6419940969', '2');
INSERT INTO MoffatBay.Customer (email, password, first_name, last_name, phone, reservationID) VALUES ('Jknight@yippee.com', 'BugFriendz13', 'Jenifer', 'Knight', '2972197680', '3');
INSERT INTO MoffatBay.Customer (email, password, first_name, last_name, phone, reservationID) VALUES ('goodall@aoe.biz.com', 'Persian3l3phants', 'Samuel', 'Goodall', '1671166685', '4');
INSERT INTO MoffatBay.Customer (email, password, first_name, last_name, phone, reservationID) VALUES ('smith.lexington@dod.gov', '!@#$1234ASdf', 'Smith', 'Lexington', '8751572215', NULL);