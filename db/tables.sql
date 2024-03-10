Users 
user_id (Primary Key, AUTO_INCREMENT)
first_name (VARCHAR)
last_name (VARCHAR)
phone_number (VARCHAR)
date_of_birth (DATE)
gender (ENUM('male', 'female', 'other'))
role (ENUM('student', 'staff'))
email (VARCHAR, UNIQUE)
password (VARCHAR)
created_at (TIMESTAMP, DEFAULT CURRENT_TIMESTAMP)
updated_at (TIMESTAMP, DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)

 Students 
student_id (PRIMARY KEY, AUTO_INCREMENT)
user_id (INTEGER, FOREIGN KEY REFERENCES Users(user_id))
program_id (INTEGER, FOREIGN KEY REFERENCES Programs(program_id))
year_group (YEAR)

 Staff 
staff_id (PRIMARY KEY, AUTO_INCREMENT)
user_id (INTEGER, FOREIGN KEY REFERENCES Users(user_id))
department_id (INTEGER, FOREIGN KEY REFERENCES Departments(department_id))
position_id (INTEGER, FOREIGN KEY REFERENCES Positions(position_id))

CREATE TABLE Entities (
    entity_id INT AUTO_INCREMENT PRIMARY KEY,
    entity_name VARCHAR(255) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

 Departments 
department_id (PRIMARY KEY, AUTO_INCREMENT)
department_name (VARCHAR)
description (TEXT)


 Announcements 
announcement_id (PRIMARY KEY, AUTO_INCREMENT)
department_id (INTEGER, FOREIGN KEY REFERENCES Departments(department_id))
announcement_title (VARCHAR)
announcement_content (TEXT)
announcement_date (TIMESTAMP, DEFAULT CURRENT_TIMESTAMP)
created_by (INTEGER, FOREIGN KEY REFERENCES Users(user_id))

 Feedback 
feedback_id (PRIMARY KEY, AUTO_INCREMENT)
user_id (INTEGER, FOREIGN KEY REFERENCES Users(user_id))
feedback_content (TEXT)
feedback_date (TIMESTAMP, DEFAULT CURRENT_TIMESTAMP)

 Programs 
program_id (PRIMARY KEY, AUTO_INCREMENT)
program_name (VARCHAR)
description (TEXT)

 Positions 
position_id (PRIMARY KEY, AUTO_INCREMENT)
position_title (VARCHAR)
description (TEXT)

 UserProfileImages 
image_id (PRIMARY KEY, AUTO_INCREMENT)
user_id (INTEGER, FOREIGN KEY REFERENCES Users(user_id))
image_path (VARCHAR)

 UserNotifications 
notification_id (PRIMARY KEY, AUTO_INCREMENT)
user_id (INTEGER, FOREIGN KEY REFERENCES Users(user_id))
notification_title (VARCHAR)
notification_content (TEXT)
notification_date (TIMESTAMP, DEFAULT CURRENT_TIMESTAMP)
is_read (BOOLEAN, DEFAULT FALSE)

 Events 
event_id (PRIMARY KEY, AUTO_INCREMENT)
event_title (VARCHAR)
event_description (TEXT)
event_date (DATE)
event_time (TIME)
event_location (VARCHAR)
department_id (INTEGER, FOREIGN KEY REFERENCES Departments(department_id))
created_by (INTEGER, FOREIGN KEY REFERENCES Users(user_id))

 EventRegistrations 
registration_id (PRIMARY KEY, AUTO_INCREMENT)
event_id (INTEGER, FOREIGN KEY REFERENCES Events(event_id))
user_id (INTEGER, FOREIGN KEY REFERENCES Users(user_id))
registration_date (TIMESTAMP, DEFAULT CURRENT_TIMESTAMP)

 MessagesSent 
message_id (PRIMARY KEY, AUTO_INCREMENT)
sender_id (INTEGER, FOREIGN KEY REFERENCES Users(user_id))
recipient_id (INTEGER, FOREIGN KEY REFERENCES Users(user_id))
message_content (TEXT)
message_date (TIMESTAMP, DEFAULT CURRENT_TIMESTAMP)

ALTER TABLE Departments DROP COLUMN department_name, DROP COLUMN description;
ALTER TABLE Programs DROP COLUMN program_name, DROP COLUMN description;

ALTER TABLE Departments ADD entity_id INT, ADD FOREIGN KEY (entity_id) REFERENCES Entities(entity_id);
ALTER TABLE Programs ADD entity_id INT, ADD FOREIGN KEY (entity_id) REFERENCES Entities(entity_id);
ALTER TABLE Departments MODIFY entity_id INT NOT NULL;
ALTER TABLE Programs MODIFY entity_id INT NOT NULL;
ALTER TABLE UserProfileImages ADD UNIQUE (user_id, image_path);

ALTER TABLE EventRegistrations ADD UNIQUE (event_id, user_id);

RENAME TABLE MessagesSent TO Messages;
ALTER TABLE Messages ADD UNIQUE (sender_id, recipient_id, message_date);

ALTER TABLE Users ADD account_status ENUM('active', 'inactive', 'suspended') DEFAULT 'active';
ALTER TABLE Announcements ADD expiration_date DATE;
ALTER TABLE Events ADD max_participants INT;
ALTER TABLE Feedback ADD feedback_type ENUM('general', 'course', 'service');


CREATE INDEX idx_users_email ON Users(email);
CREATE INDEX idx_feedback_user_id ON Feedback(user_id);
CREATE INDEX idx_events_department_id ON Events(department_id);
CREATE INDEX idx_event_registrations_event_id ON EventRegistrations(event_id);
CREATE INDEX idx_event_registrations_user_id ON EventRegistrations(user_id);
CREATE INDEX idx_messages_sender_id ON Messages(sender_id);
CREATE INDEX idx_messages_recipient_id ON Messages(recipient_id);


ALTER TABLE Users MODIFY first_name VARCHAR(255) NOT NULL;
ALTER TABLE Users MODIFY last_name VARCHAR(255) NOT NULL;
ALTER TABLE Users MODIFY phone_number VARCHAR(20) NOT NULL;
ALTER TABLE Users MODIFY date_of_birth DATE NOT NULL;
ALTER TABLE Users MODIFY gender ENUM('male', 'female', 'other') NOT NULL;
ALTER TABLE Users MODIFY role ENUM('student', 'staff') NOT NULL;
ALTER TABLE Users MODIFY email VARCHAR(255) NOT NULL;
ALTER TABLE Users MODIFY password VARCHAR(255) NOT NULL;
ALTER TABLE Entities MODIFY entity_name VARCHAR(255) NOT NULL;

ALTER TABLE Users MODIFY password VARCHAR(255) NOT NULL;

CREATE TABLE Roles (
    role_id INT AUTO_INCREMENT PRIMARY KEY,
    role_name VARCHAR(50) NOT NULL,
    description TEXT
);

-- Insert default roles
INSERT INTO Roles (role_name, description) VALUES
    ('admin', 'System administrators with full access'),
    ('staff', 'Staff members with limited access'),
    ('student', 'Students with restricted access');

CREATE TABLE Statuses (
    status_id INT AUTO_INCREMENT PRIMARY KEY,
    status_name VARCHAR(50) NOT NULL,
    description TEXT
);

-- Insert default statuses
INSERT INTO Statuses (status_name, description) VALUES
    ('active', 'Active user account'),
    ('inactive', 'Inactive user account'),
    ('suspended', 'Suspended user account');

ALTER TABLE Users
    DROP COLUMN gender,
    DROP COLUMN role,
    DROP COLUMN account_status,
    ADD role_id INT NOT NULL,
    ADD status_id INT NOT NULL,
    ADD FOREIGN KEY (role_id) REFERENCES Roles(role_id),
    ADD FOREIGN KEY (status_id) REFERENCES Statuses(status_id);

DROP TABLE IF EXISTS Statuses;

CREATE TABLE Statuses (
    status_id INT AUTO_INCREMENT PRIMARY KEY,
    status_value INT NOT NULL UNIQUE
);

INSERT INTO Statuses (status_value) VALUES
    (1), -- Active
    (2), -- Inactive
    (3); -- Suspended

DROP TABLE IF EXISTS Roles;

CREATE TABLE Roles (
    role_id INT AUTO_INCREMENT PRIMARY KEY,
    role_value INT NOT NULL UNIQUE,
    description TEXT
);

INSERT INTO Roles (role_value, description) VALUES
    (1, 'System administrators with full access'),
    (2, 'Staff members with limited access'),
    (3, 'Students with restricted access');

ALTER TABLE Users
    MODIFY role_id INT NOT NULL,
    MODIFY status_id INT NOT NULL,
    ADD CONSTRAINT fk_users_role FOREIGN KEY (role_id) REFERENCES Roles(role_id),
    ADD CONSTRAINT fk_users_status FOREIGN KEY (status_id) REFERENCES Statuses(status_id);