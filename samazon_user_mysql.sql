CREATE TABLE PersonalDetails(
    email_id varchar(264) NOT NULL,
    country_code bigint(2) NOT NULL,
    phone_no bigint(10) NOT NULL,
    first_name varchar(264) NOT NULL,
    middle_name varchar(264),
    last_name varchar(264) NOT NULL,
    date_of_birth date NOT NULL,
    gender enum('M', 'F', 'X') NOT NULL,
    password varchar(64) NOT NULL,
    PRIMARY KEY (email_id)
);

CREATE TABLE Address(
    serial_no bigint(16) NOT NULL AUTO_INCREMENT,
    email_id varchar(264) NOT NULL,
    house varchar(264) NOT NULL,
    street_name varchar(264),
    locality varchar(264),
    city varchar(264) NOT NULL,
    state varchar(264) NOT NULL,
    pin_code bigint(6) NOT NULL,
    contact_no bigint(12) NOT NULL,
    FOREIGN KEY (email_id) REFERENCES PersonalDetails(email_id) ON DELETE CASCADE,
    PRIMARY KEY (serial_no)
);

CREATE TABLE CardDetails(
    serial_no bigint(16) NOT NULL AUTO_INCREMENT,
    email_id varchar(264) NOT NULL,
    card_no bigint(16) NOT NULL,
    expiry_month bigint(2) NOT NULL,
    expiry_year bigint(2) NOT NULL,
    name_as_on_card varchar(264) NOT NULL,
    FOREIGN KEY (email_id) REFERENCES PersonalDetails(email_id) ON DELETE CASCADE,
    PRIMARY KEY (serial_no)
);

INSERT 
    INTO PersonalDetails (
        email_id,
        country_code,
        phone_no,
        first_name,
        middle_name,
        last_name,
        date_of_birth,
        gender,
        password
    )
    VALUES (
        'samridhanand.paatni2020@vitstudent.ac.in',
        91,
        8077339033,
        'Samridh',
        'Anand',
        'Paatni',
        '2002-04-10',
        'M',
        'hello'
    );

INSERT
    INTO Address (
        email_id,
        house,
        street_name,
        locality,
        city,
        state,
        pin_code,
        contact_no
    )
    VALUES (
        'samridhanand.paatni2020@vitstudent.ac.in',
        'A-54',
        NULL,
        'Omaxe City',
        'Lucknow',
        'Uttar Pradesh',
        226025,
        8077339033
    );

INSERT
    INTO CardDetails (
        email_id,
        card_no,
        expiry_month,
        expiry_year,
        name_as_on_card
    )
    VALUES (
        'samridhanand.paatni2020@vitstudent.ac.in',
        1234123412341234,
        01,
        12,
        'Samridh Anand Paatni'
    );