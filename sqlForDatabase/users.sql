CREATE TABLE Accounts (
    email_id varchar(264) NOT NULL,
    password varchar(64) NOT NULL,

    user_is_seller boolean NOT NULL,
    user_is_buyer boolean NOT NULl,

    PRIMARY KEY (email_id)
);

CREATE TABLE Sellers (
    email_id varchar(264) NOT NULL,
    FOREIGN KEY (email_id) REFERENCES Accounts(email_id) ON DELETE CASCADE,
    PRIMARY KEY (email_id)
);

CREATE TABLE Buyers (
    email_id varchar(264) NOT NULL,
    FOREIGN KEY (email_id) REFERENCES Accounts(email_id) ON DELETE CASCADE,
    PRIMARY KEY (email_id)
);

CREATE TABLE PersonalDetails(
    id bigint(16) NOT NULL AUTO_INCREMENT,
    email_id varchar(264) NOT NULL,

    country_code bigint(2) NOT NULL,
    phone_no bigint(10) NOT NULL,
    first_name varchar(264) NOT NULL,
    middle_name varchar(264),
    last_name varchar(264) NOT NULL,
    date_of_birth date NOT NULL,
    gender enum('M', 'F', 'X') NOT NULL,

    FOREIGN KEY (email_id) REFERENCES Accounts(email_id) ON DELETE CASCADE,
    PRIMARY KEY (id)
);

CREATE TABLE Address(
    id bigint(16) NOT NULL AUTO_INCREMENT,
    email_id varchar(264) NOT NULL,
    
    house varchar(264) NOT NULL,
    street_name varchar(264),
    locality varchar(264),
    city varchar(264) NOT NULL,
    state varchar(264) NOT NULL,
    pin_code bigint(6) NOT NULL,
    contact_no bigint(12) NOT NULL,
    
    FOREIGN KEY (email_id) REFERENCES Accounts(email_id) ON DELETE CASCADE,
    PRIMARY KEY (id)
);

CREATE TABLE CardDetails(
    id bigint(16) NOT NULL AUTO_INCREMENT,
    email_id varchar(264) NOT NULL,

    card_no bigint(16) NOT NULL,
    expiry_month bigint(2) NOT NULL,
    expiry_year bigint(2) NOT NULL,
    name_as_on_card varchar(264) NOT NULL,
    
    FOREIGN KEY (email_id) REFERENCES Accounts(email_id) ON DELETE CASCADE,
    PRIMARY KEY (id)
);

CREATE TABLE BankDetails(
    id bigint(16) NOT NULL AUTO_INCREMENT,
    email_id varchar(264) NOT NULL,

    full_name varchar(264) NOT NULL,
    city varchar(264) NOT NULL,
    bank_name varchar(264) NOT NULL,
    branch_name varchar(264) NOT NULL,
    ifsc_branch_code bigint(11) NOT NULL,
    account_no bigint(18) NOT NULL,

    FOREIGN KEY (email_id) REFERENCES Sellers(email_id) ON DELETE CASCADE,
    PRIMARY KEY (id)
);

delimiter //
CREATE
    TRIGGER add_account_to_buyer_or_seller
    AFTER INSERT ON Accounts
    FOR EACH ROW
    BEGIN
        IF NEW.user_is_seller = 1 THEN
            INSERT INTO Sellers (email_id) VALUES (NEW.email_id);
        END IF;
        IF NEW.user_is_buyer = 1 THEN
            INSERT INTO Buyers (email_id) VALUES (NEW.email_id);
        END IF;
    END;//
delimiter ;

INSERT
    INTO Accounts (
        email_id,
        password,
        user_is_seller,
        user_is_buyer
    ) VALUES (
        'samridh.anand.paatni@gmail.com',
        'samridh',
        true,
        true
    ), (
        'elessar6969@hotmale.com',
        'youBowToNoOne',
        false,
        true
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
        gender
    ) VALUES (
        'samridh.anand.paatni@gmail.com',
        91,
        9876543215,
        'Samridh',
        'Anand',
        'Paatni',
        '2002-01-01',
        'M'
    ), (
        'elessar6969@hotmale.com',
        91,
        7893216545,
        'Aragorn',
        NULL,
        'Son Of Arathorn',
        '1995-01-01',
        'M'
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
    ) VALUES (
        'samridh.anand.paatni@gmail.com',
        '421',
        NULL,
        'Dummy nagar',
        'Lucknow',
        'Uttar Pradesh',
        221414,
        9876543215
    ), (
        'elessar6969@hotmale.com',
        'The King''s Chambers',
        NULL,
        NULL,
        'Minas Tirith',
        'Gondor',
        789456,
        1458236974
    );

INSERT
    INTO CardDetails (
        email_id,
        card_no,
        expiry_month,
        expiry_year,
        name_as_on_card
    ) VALUES (
        'samridh.anand.paatni@gmail.com',
        1234123412341234,
        01,
        25,
        'Samridh Anand Paatni'
    ), (
        'elessar6969@hotmale.com',
        1234569874581452,
        02,
        24,
        'Aragorn Elessar'
    );

INSERT
    INTO BankDetails (
        email_id,
        full_name,
        city,
        bank_name,
        branch_name,
        ifsc_branch_code,
        account_no
    ) VALUES (
        'samridh.anand.paatni@gmail.com',
        'Samridh Anand Paatni',
        'Lucknow',
        'Chota Mota Bank',
        'Small Fat Nagar Road',
        15847896523,
        159487263216458795
    );