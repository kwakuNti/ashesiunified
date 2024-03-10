-- Updated Roles table
CREATE TABLE Roles (
    role_id INT AUTO_INCREMENT PRIMARY KEY,
    role_value INT NOT NULL UNIQUE,
    description TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Insert default roles
INSERT INTO Roles (role_value, description) VALUES
    (1, 'System administrators with full access'),
    (2, 'Staff members with limited access'),
    (3, 'Students with restricted access');

CREATE TABLE Users (
    user_id VARCHAR(8) PRIMARY KEY,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    phone_number VARCHAR(20) NOT NULL,
    date_of_birth DATE NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    role_id INT NOT NULL,
    img VARCHAR(255),
    status VARCHAR(20) NOT NULL,
    CONSTRAINT fk_users_role FOREIGN KEY (role_id) REFERENCES Roles(role_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- Updated Programs table
CREATE TABLE Programs (
    program_id INT AUTO_INCREMENT PRIMARY KEY,
    program_name VARCHAR(255) NOT NULL,
    default_value VARCHAR(255) DEFAULT 'Default'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Insert default programs
INSERT INTO Programs (program_name) VALUES
    ('Computer Science'),
    ('Management Information Systems'),
    ('Electrical Engineering'),
    ('Business Administration'),
    ('Mechanical Engineering'),
    ('Mechatronic Engineering');

-- Updated Students table
CREATE TABLE Students (
    student_record_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id VARCHAR(8) NOT NULL UNIQUE,
    program_id INT,
    year_group YEAR,
    CONSTRAINT fk_students_users FOREIGN KEY (user_id) REFERENCES Users(user_id),
    CONSTRAINT fk_students_programs FOREIGN KEY (program_id) REFERENCES Programs(program_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Updated Departments table
CREATE TABLE Departments (
    department_id INT AUTO_INCREMENT PRIMARY KEY,
    department_name VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Insert default departments
INSERT INTO Departments (department_name) VALUES
    ('SLE'),
    ('ODIP'),
    ('Career Services'),
    ('ASC'),
    ('Academic Committee');

-- Updated Positions table
CREATE TABLE Positions (
    position_id INT AUTO_INCREMENT PRIMARY KEY,
    position_title VARCHAR(255) NOT NULL,
    description TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Insert default positions
INSERT INTO Positions (position_title, description) VALUES
    ('Department Head', 'Head of the department'),
    ('Coordinator', 'Coordinator role'),
    ('Project Manager', 'Managerial role for projects'),
    ('Assistant', 'Assistant position'),
    ('Secretary', 'Secretary role');

-- Updated Staff table
CREATE TABLE Staff (
    staff_record_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id VARCHAR(8) NOT NULL UNIQUE,
    department_id INT,
    position_id INT,
    CONSTRAINT fk_staff_users FOREIGN KEY (user_id) REFERENCES Users(user_id),
    CONSTRAINT fk_staff_departments FOREIGN KEY (department_id) REFERENCES Departments(department_id),
    CONSTRAINT fk_staff_positions FOREIGN KEY (position_id) REFERENCES Positions(position_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Updated UserProfileImages table
CREATE TABLE UserProfileImages (
    image_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id VARCHAR(8),
    image_path VARCHAR(255),
    CONSTRAINT fk_user_profile_images_users FOREIGN KEY (user_id) REFERENCES Users(user_id),
    UNIQUE (user_id, image_path)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Updated Events table
CREATE TABLE Events (
    event_id INT AUTO_INCREMENT PRIMARY KEY,
    event_title VARCHAR(255),
    event_description TEXT,
    event_date DATE,
    event_time TIME,
    event_location VARCHAR(255),
    department_id INT,
    created_by VARCHAR(8),
    CONSTRAINT fk_events_departments FOREIGN KEY (department_id) REFERENCES Departments(department_id),
    CONSTRAINT fk_events_users FOREIGN KEY (created_by) REFERENCES Users(user_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Updated EventRegistrations table
CREATE TABLE EventRegistrations (
    registration_id INT AUTO_INCREMENT PRIMARY KEY,
    event_id INT,
    user_id VARCHAR(8) NOT NULL,
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_event_registrations_events FOREIGN KEY (event_id) REFERENCES Events(event_id),
    CONSTRAINT fk_event_registrations_users FOREIGN KEY (user_id) REFERENCES Users(user_id),
    UNIQUE (event_id, user_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Updated Announcements table
CREATE TABLE Announcements (
    announcement_id INT AUTO_INCREMENT PRIMARY KEY,
    department_id INT,
    announcement_title VARCHAR(255),
    announcement_content TEXT,
    announcement_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    created_by VARCHAR(8),
    CONSTRAINT fk_announcements_departments FOREIGN KEY (department_id) REFERENCES Departments(department_id),
    CONSTRAINT fk_announcements_users FOREIGN KEY (created_by) REFERENCES Users(user_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Updated Feedback table
CREATE TABLE Feedback (
    feedback_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id VARCHAR(8),
    feedback_content TEXT,
    feedback_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_feedback_users FOREIGN KEY (user_id) REFERENCES Users(user_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Updated UserNotifications table
CREATE TABLE UserNotifications (
    notification_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id VARCHAR(8),
    notification_title VARCHAR(255),
    notification_content TEXT,
    notification_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    is_read BOOLEAN DEFAULT FALSE,
    CONSTRAINT fk_user_notifications_users FOREIGN KEY (user_id) REFERENCES Users(user_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
