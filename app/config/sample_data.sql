-- Insert data into the package table
INSERT INTO `package` (`Name`, `Description`, `Price`, `ServicesIncluded`) VALUES
('Wedding', 'Full-day wedding photography package', 199999.99, 'Ceremony coverage, Reception coverage, 300 edited photos, Online gallery'),
('Portrait', 'Portrait photography session', 149.99, '1-hour session, 10 edited photos, Studio or outdoor location'),
('Event', 'Event photography coverage', 299.99, '4-hour coverage, Unlimited photos, Candid shots'),
('Travel', 'Travel photography adventure', 899.99, '3-day adventure, 100 edited photos, Customized itinerary');

-- Insert data into the sample table
INSERT INTO `sample` (`SampleName`, `ImagePath`, `CustomerID`, `Description`, `Date`) VALUES
('Family Portrait', 'family.jpg', 1, 'Outdoor family photo shoot', '2023-08-22'),
('Landscape View', 'landscape.jpg', 1, 'Beautiful landscape shot', '2023-09-10'),
('Wedding Moments', 'wedding.jpg', 1, 'Wedding ceremony photos', '2023-08-28');


-- Insert data into the user table
INSERT INTO `user` (`Email`, `Password`, `UserTypeID`, `FirstName`, `LastName`, `ContactNumber`, `Address`, `Availability`, `Specialization`, `RegistrationDate`) VALUES
('manager@gmail.com', '$2y$10$93V9lt42/yUpoVpmVzx.3elGfKarJk/mKWt6IN04aYOKpvki8YBHK', 2, 'Chamika', 'Madhushan', '0768507780', NULL, 1, NULL, '2023-11-01 08:54:05'),
('customer@gmail.com', '$2y$10$mr3qQx1pKNZDbc/Nyykk7Uzu9e2X9.xZZdxAcQI6SbaOaknNR3tIM.q', 1, 'Thevindu', 'Rathnayake', '0768507781', NULL, 1, NULL, '2023-11-01 08:56:21');
('photographer@gmail.com', '$2y$10$mr3qQx1pKNZDbc/Nyykk7Uzu9e2X9.xZZdxAcQI6SbaOaknNR3tIM.q', 3, 'Sathurshika', 'Rathnayake', '0768507781', NULL, 1, 'Indoor', '2023-11-01 08:56:21'))

INSERT INTO `usertype` (`UserTypeID`, `UserType`, `PermissionID`) VALUES
(1, 'Customer', NULL),
(2, 'Manager', NULL),
(3, 'Photographer', NULL),
(4, 'Editor', NULL),
(5, 'Printing Firm', NULL),
(6, 'Admin', NULL);

