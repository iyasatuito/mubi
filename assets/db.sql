CREATE DATABASE mubi;
USE mubi;

CREATE TABLE movie (
  movieID VARCHAR(50) PRIMARY KEY,
  movieTitle VARCHAR(100) NOT NULL,
  movieDescription VARCHAR(1000) NOT NULL,
  movieDirector VARCHAR(200) NOT NULL,
  movieActor VARCHAR(200) NOT NULL,
  movieDuration INT NOT NULL,
  movieBanner VARCHAR(200) NOT NULL,
  moviePoster VARCHAR(200) NOT NULL,
  movieTrailer VARCHAR(200) NOT NULL,
  isFeatured INT
);

CREATE TABLE cinema (
  cinemaID VARCHAR(10) PRIMARY KEY,
  cinemaName VARCHAR(50) NOT NULL,
  cinemaSeats INT NOT NULL
);

CREATE TABLE schedule (
  scheduleID VARCHAR(50) PRIMARY KEY,
  movieID VARCHAR(10), 
  FOREIGN KEY(movieID) REFERENCES movie(movieID),
  cinemaID VARCHAR(10),
  FOREIGN KEY(cinemaID) REFERENCES cinema(cinemaID),
  scheduleDate DATE,
  scheduleTime TIME
);

CREATE TABLE user (
  userID VARCHAR(50) PRIMARY KEY,
  userFirst VARCHAR(200) NOT NULL,
  userLast VARCHAR(200) NOT NULL,
  userEmail VARCHAR(200) NOT NULL,
  userlPassword VARCHAR(200) NOT NULL,
  userRole INT NOT NULL
);

CREATE TABLE price (
  priceID VARCHAR(50) PRIMARY KEY,
  ticketType VARCHAR(200) NOT NULL,
  price DOUBLE NOT NULL
);

CREATE TABLE booking (
  bookingID VARCHAR(50) PRIMARY KEY,
  scheduleID VARCHAR(10), 
  FOREIGN KEY(scheduleID) REFERENCES schedule(scheduleID),
  userID VARCHAR(10),
  FOREIGN KEY(userID) REFERENCES user(userID),
  ticketQty INT,
  totalCost DOUBLE
);

CREATE TABLE ticket (
  ticketID VARCHAR(50) PRIMARY KEY,
  bookingID VARCHAR(10), 
  FOREIGN KEY(bookingID) REFERENCES booking(bookingID),
  seat VARCHAR(10),
  code VARCHAR(200)
);

INSERT INTO movie VALUES 
('M001', 'Tangled', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Betty', 'Pia', 120, 'banner.jpg', 'poster.jpg', '2f516ZLyC6U', 1),
('M002', 'Hawkeye', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Betty', 'Pia', 120, 'banner.jpg', 'poster.jpg', '2f516ZLyC6U', 1),
('M003', 'Avengers', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Betty', 'Pia', 120, 'banner.jpg', 'poster.jpg', '2f516ZLyC6U', 1),
('M004', 'Iron Man', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Betty', 'Pia', 120, 'banner.jpg', 'poster.jpg', '2f516ZLyC6U', 1),
('M005', 'Captain America', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Betty', 'Pia', 120, 'banner.jpg', 'poster.jpg', '2f516ZLyC6U', 1),
('M006', 'Spider Man', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Betty', 'Pia', 120, 'banner.jpg', 'poster.jpg', '2f516ZLyC6U', 1),
('M007', 'Loco', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Betty', 'Pia', 120, 'banner.jpg', 'poster.jpg', '2f516ZLyC6U', 1),
('M008', 'Cruella', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Betty', 'Pia', 120, 'banner.jpg', 'poster.jpg', '2f516ZLyC6U', 1);

INSERT INTO cinema VALUES ('C001', 'Cinema 1', 200);
INSERT INTO cinema VALUES ('C002', 'Cinema 1', 200);
INSERT INTO cinema VALUES ('C003', 'Cinema 1', 200);

INSERT INTO schedule VALUES ('S001', 'M001', 'C001', '2021-12-31', '09:00:00');
INSERT INTO schedule VALUES ('S002', 'M001', 'C002', '2021-12-31', '09:00:00');
INSERT INTO schedule VALUES ('S003', 'M002', 'C003', '2021-12-31', '09:00:00');
INSERT INTO schedule VALUES ('S004', 'M002', 'C001', '2021-12-31', '11:00:00');
INSERT INTO schedule VALUES ('S005', 'M002', 'C002', '2021-12-31', '11:00:00');

INSERT INTO user VALUES ('U001', 'Betty', 'Bondoc', 'betinabondoc@gmail.com', '123456', 1);
INSERT INTO user VALUES ('U002', 'Pia', 'Satuitio', 'iyasatuito@gmail.com', '123456', 1);
INSERT INTO user VALUES ('U003', 'Ma', 'Pia', 'iya@gmail.com', '123456', 0);

INSERT INTO price VALUES ('P001', 'Adult', 18);
INSERT INTO price VALUES ('P002', 'Child', 14);
INSERT INTO price VALUES ('P003', 'Senior', 16);

INSERT INTO booking VALUES ('B001', 'S001', 'U001', 2, 30);
INSERT INTO booking VALUES ('B002', 'S002', 'U002', 1, 18);
INSERT INTO booking VALUES ('B003', 'S001', 'U003', 1, 14);

INSERT INTO ticket VALUES ('T001', 'B001', 'A1', 'qr1');
INSERT INTO ticket VALUES ('T002', 'B001', 'A2', 'qr2');
INSERT INTO ticket VALUES ('T003', 'B002', 'A1', 'qr3');
INSERT INTO ticket VALUES ('T004', 'B003', 'A3', 'qr4');
