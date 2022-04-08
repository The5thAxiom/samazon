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

CREATE VIEW AllData AS
    SELECT
        PersonalDetails.email_id,
        PersonalDetails.country_code,
        PersonalDetails.phone_no,
        PersonalDetails.first_name,
        PersonalDetails.middle_name,
        PersonalDetails.last_name,
        PersonalDetails.date_of_birth,
        PersonalDetails.gender,
        PersonalDetails.password,
        
        Address.house,
        Address.street_name,
        Address.locality,
        Address.city,
        Address.state,
        Address.pin_code,
        Address.contact_no,
        
        CardDetails.card_no,
        CardDetails.expiry_month,
        CardDetails.expiry_year,
        CardDetails.name_as_on_card
    FROM
        PersonalDetails 
        JOIN Address USING (email_id)
        JOIN CardDetails USING (email_id)

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
        'samridh.anand.paatni@gmail.com',
        91,
        9876543215,
        'Samridh',
        'Anand',
        'Paatni',
        '2002-01-01',
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
        'samridh.anand.paatni@gmail.com',
        '421',
        NULL,
        'Dummy nagar',
        'Lucknow',
        'Uttar Pradesh',
        221414,
        9876543215
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
        'samridh.anand.paatni@gmail.com',
        1234123412341234,
        01,
        12,
        'Samridh Anand Paatni'
    );