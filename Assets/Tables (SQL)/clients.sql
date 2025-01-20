CREATE TABLE clients (
    CID VARCHAR(50) PRIMARY KEY,            -- Unique identifier for each client
    Name VARCHAR(100) NOT NULL,             -- Client's name
    PhoneNumber VARCHAR(15) NOT NULL,       -- Client's phone number
    Email VARCHAR(100) NOT NULL,            -- Client's email address
    ProjectName VARCHAR(200) NOT NULL,      -- Name of the client's project
    ProjectDescription TEXT,                -- Description of the project
    Budget DECIMAL(15, 2) NOT NULL,         -- Budget for the project
    OpeningBalance DECIMAL(15, 2),          -- Client's opening balance
    ClosingBalance DECIMAL(15, 2),          -- Client's closing balance
    ClientStatus VARCHAR(20) NOT NULL,      -- Current status of the client (e.g., Active, Inactive)
    TotalTasksLinked INT DEFAULT 0,         -- Total tasks associated with the client
    ClientAddedOn DATETIME DEFAULT CURRENT_TIMESTAMP, -- Timestamp when the client was added
    ClientUpdatedOn DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP -- Timestamp for the last update
);
