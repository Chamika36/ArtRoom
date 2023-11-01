-- Create the database
CREATE DATABASE IF NOT EXISTS photography_system;

-- Use the database
USE photography_system;

-- Create the Permission table
CREATE TABLE IF NOT EXISTS Permission (
    PermissionID INT AUTO_INCREMENT PRIMARY KEY,
    PermissionName VARCHAR(255) NOT NULL
);

-- Create the UserType table
CREATE TABLE IF NOT EXISTS UserType (
    UserTypeID INT AUTO_INCREMENT PRIMARY KEY,
    UserType VARCHAR(255) NOT NULL,
    PermissionID INT,
    FOREIGN KEY (PermissionID) REFERENCES Permission(PermissionID)
);

-- Create the User table
CREATE TABLE IF NOT EXISTS User (
    UserID INT AUTO_INCREMENT PRIMARY KEY,
    Email VARCHAR(255) NOT NULL UNIQUE,
    Password VARCHAR(255) NOT NULL,
    UserTypeID INT NOT NULL,
    FirstName VARCHAR(255) NOT NULL,
    LastName VARCHAR(255) NOT NULL,
    ContactNumber VARCHAR(20) NOT NULL UNIQUE,
    Address VARCHAR(255),
    Availability BOOLEAN DEFAULT TRUE,  -- TRUE if available, FALSE if not available
    Specialization VARCHAR(255),
    RegistrationDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (UserTypeID) REFERENCES UserType(UserTypeID)
);


-- Create the Package table
CREATE TABLE IF NOT EXISTS Package (
    PackageID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(255),
    Description TEXT,
    Price DECIMAL(10, 2),
    ServicesIncluded TEXT
);

-- Create the Event table
CREATE TABLE IF NOT EXISTS Event (
    EventID INT AUTO_INCREMENT PRIMARY KEY,
    CustomerID INT,
    EventDate DATE,
    StartTime TIME,
    EndTime TIME,
    Location VARCHAR(255),
    AdditionalRequests TEXT,
    PackageID INT,
    FullAmount DECIMAL(10, 2),
    Status ENUM('Pencil', 'Advanced', 'FullPaid', 'Ongoing', 'Covered', 'Completed', 'Canceled'),
    ManagerID INT,
    PhotographerID INT,
    EditorID INT,
    PrintingFirmID INT,
    RequestedPhotographer INT,
    FOREIGN KEY (PackageID) REFERENCES Package(PackageID),
    FOREIGN KEY (CustomerID) REFERENCES User(UserID),
    FOREIGN KEY (ManagerID) REFERENCES User(UserID),
    FOREIGN KEY (PhotographerID) REFERENCES User(UserID),
    FOREIGN KEY (EditorID) REFERENCES User(UserID),
    FOREIGN KEY (PrintingFirmID) REFERENCES User(UserID),
    FOREIGN KEY (RequestedPhotographer) REFERENCES User(UserID)
);

-- Create the Payment table
CREATE TABLE IF NOT EXISTS Payment (
    TransactionID INT AUTO_INCREMENT PRIMARY KEY,
    CustomerID INT,
    Amount DECIMAL(10, 2),
    TransactionDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Status ENUM('Full', 'Advanced', 'Canceled'),
    EventID INT,
    FOREIGN KEY (CustomerID) REFERENCES User(UserID),
    FOREIGN KEY (EventID) REFERENCES Event(EventID)
);



-- Create the Sample table
CREATE TABLE IF NOT EXISTS Sample (
    SampleID INT AUTO_INCREMENT PRIMARY KEY,
    SampleName VARCHAR(255),
    ImagePath VARCHAR(255),
    CustomerID INT,
    Description TEXT,
    Date DATE,
    FOREIGN KEY (CustomerID) REFERENCES User(UserID)
);

-- Create the Feedback table
CREATE TABLE IF NOT EXISTS Feedback (
    FeedbackID INT AUTO_INCREMENT PRIMARY KEY,
    CustomerID INT,
    PhotographerID INT,
    EditorID INT,
    EventID INT,
    Rating INT,
    Comment TEXT,
    Date DATE,
    FOREIGN KEY (CustomerID) REFERENCES User(UserID),
    FOREIGN KEY (PhotographerID) REFERENCES User(UserID),
    FOREIGN KEY (EditorID) REFERENCES User(UserID),
    FOREIGN KEY (EventID) REFERENCES Event(EventID)
);

-- Create the RefundRequest table
CREATE TABLE IF NOT EXISTS RefundRequest (
    RefundRequestID INT AUTO_INCREMENT PRIMARY KEY,
    CustomerID INT,
    EventID INT,
    RefundAmount DECIMAL(10, 2),
    RequestDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Status ENUM('Pending', 'Approved', 'Rejected'),
    FOREIGN KEY (CustomerID) REFERENCES User(UserID),
    FOREIGN KEY (EventID) REFERENCES Event(EventID)
);
