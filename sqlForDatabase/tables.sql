CREATE TABLE Accounts (
    email_id varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    joined_on date NOT NULL,
    user_is_seller boolean NOT NULL,
    image_path varchar(255),
    other_info text,

    PRIMARY KEY (email_id)
);

CREATE TABLE Sellers (
    email_id varchar(255) NOT NULL,
    FOREIGN KEY (email_id) REFERENCES Accounts(email_id) ON DELETE CASCADE,
    PRIMARY KEY (email_id)
);

CREATE TABLE PersonalDetails (
    id bigint(16) NOT NULL AUTO_INCREMENT,
    email_id varchar(255) NOT NULL,

    country_code bigint(2) NOT NULL,
    phone_no bigint(10) NOT NULL,
    first_name varchar(255) NOT NULL,
    middle_name varchar(255),
    last_name varchar(255) NOT NULL,
    date_of_birth date NOT NULL,
    gender enum('M', 'F', 'X') NOT NULL,

    FOREIGN KEY (email_id) REFERENCES Accounts(email_id) ON DELETE CASCADE,
    PRIMARY KEY (id)
);

CREATE TABLE Address(
    id bigint(16) NOT NULL AUTO_INCREMENT,
    email_id varchar(255) NOT NULL,
    
    house varchar(255) NOT NULL,
    street_name varchar(255),
    locality varchar(255),
    city varchar(255) NOT NULL,
    state varchar(255) NOT NULL,
    pin_code bigint(6) NOT NULL,
    contact_no bigint(12) NOT NULL,
    
    FOREIGN KEY (email_id) REFERENCES Accounts(email_id) ON DELETE CASCADE,
    PRIMARY KEY (id)
);

CREATE TABLE CardDetails(
    id bigint(16) NOT NULL AUTO_INCREMENT,
    email_id varchar(255) NOT NULL,

    card_no bigint(16) NOT NULL,
    expiry_month bigint(2) NOT NULL,
    expiry_year bigint(2) NOT NULL,
    name_as_on_card varchar(255) NOT NULL,
    
    FOREIGN KEY (email_id) REFERENCES Accounts(email_id) ON DELETE CASCADE,
    PRIMARY KEY (id)
);

CREATE TABLE BankDetails(
    id bigint(16) NOT NULL AUTO_INCREMENT,
    email_id varchar(255) NOT NULL,

    full_name varchar(255) NOT NULL,
    city varchar(255) NOT NULL,
    bank_name varchar(255) NOT NULL,
    branch_name varchar(255) NOT NULL,
    ifsc_branch_code bigint(11) NOT NULL,
    account_no bigint(18) NOT NULL,

    FOREIGN KEY (email_id) REFERENCES Sellers(email_id) ON DELETE CASCADE,
    PRIMARY KEY (id)
);

CREATE TABLE Products (
    product_code bigint(16) NOT NULL AUTO_INCREMENT,

    name varchar(255) NOT NULL,
    description text,
    price_in_paisa bigint(16) NOT NULL,
    added_on date NOT NULL,
    is_sold boolean NOT NULL,
    sold_on date,
    seller_email_id varchar(255) NOT NULL,
    inventory_size bigint(16) NOT NULL,
    image_path varchar(255),
    other_info text,

    FOREIGN KEY (seller_email_id) REFERENCES Sellers(email_id) ON DELETE CASCADE,
    PRIMARY KEY (product_code)
);

CREATE TABLE ProductReviews (
    id bigint(16) NOT NULL AUTO_INCREMENT,
    product_code bigint(16) NOT NULL,

    reviewer_email_id varchar(255) NOT NULL,
    review_date date NOT NULL,
    review_time time NOT NULl,
    review_title varchar(255) NOT NULL,
    review_text text NOT NULL,
    rating_out_of_five enum('1', '2', '3', '4', '5') NOT NULL,

    FOREIGN KEY (product_code) REFERENCES Products(product_code) ON DELETE CASCADE,
    FOREIGN KEY (reviewer_email_id) REFERENCES Accounts(email_id) ON DELETE CASCADE,
    PRIMARY KEY (id)
);

CREATE TABLE Categories (
    id bigint(16) NOT NULL AUTO_INCREMENT,
    category_name varchar(255) NOT NULL,
    category_description text,
    PRIMARY KEY (id)
);

CREATE TABLE ProductCategories (
    id bigint(16) NOT NULL AUTO_INCREMENT,
    product_code bigint(16) NOT NULL,
    category_code bigint(16) NOT NULL,
    FOREIGN KEY (category_code) REFERENCES Categories(id) ON DELETE CASCADE,
    FOREIGN KEY (product_code) REFERENCES Products(product_code) ON DELETE CASCADE,
    PRIMARY KEY (id)
);

CREATE TABLE Carts (
    id bigint(16) NOT NULL AUTO_INCREMENT,
    product_code bigint(16) NOT NULL,
    buyer_email_id varchar(255) NOT NULL,
    FOREIGN KEY (product_code) REFERENCES Products(product_code) ON DELETE CASCADE,
    FOREIGN KEY (buyer_email_id) REFERENCES Accounts(email_id) ON DELETE CASCADE,
    PRIMARY KEY (id)
);

CREATE TABLE Payments (
    id bigint(16) NOT NULL AUTO_INCREMENT,
    payment_amount_in_paisa bigint(16) NOT NULL,
    payment_type enum('card', 'cod') NOT NULL,
    payment_status enum('unpaid', 'paid') NOT NULL,
    payment_date date NOT NULL,
    payment_time time NOT NULl,
    card_id bigint(16),

    FOREIGN KEY (card_id) REFERENCES CardDetails(id) ON DELETE CASCADE,
    PRIMARY KEY (id)
);

CREATE TABLE Orders (
    id bigint(16) NOT NULL AUTO_INCREMENT,
    product_code bigint(16) NOT NULL,
    buyer_email_id varchar(255) NOT NULL,
    buyer_delivery_address_id bigint(16) NOT NULL,
    payment_id bigint(16) NOT NULL,
    order_status enum('accepted', 'shipped', 'delivered', 'complete'),
    order_date date NOT NULL,
    order_time time NOT NULl,

    FOREIGN KEY (product_code) REFERENCES Products(product_code) ON DELETE CASCADE,
    FOREIGN KEY (buyer_email_id) REFERENCES Accounts(email_id) ON DELETE CASCADE,
    FOREIGN KEY (buyer_delivery_address_id) REFERENCES Address(id) ON DELETE CASCADE,
    FOREIGN KEY (payment_id) REFERENCES Payments(id) ON DELETE CASCADE,
    PRIMARY KEY (id)
);