CREATE TABLE Products (
    product_code bigint(16) NOT NULL AUTO_INCREMENT,

    name varchar(264) NOT NULL,
    description text,
    price_in_paisa bigint(16) NOT NULL,
    is_sold boolean NOT NULL,
    seller_email_id varchar(264) NOT NULL,
    inventory_size bigint(16) NOT NULL,
    image_path varchar(264),

    FOREIGN KEY (seller_email_id) REFERENCES Sellers(email_id) ON DELETE CASCADE,
    PRIMARY KEY (product_code)
);

CREATE TABLE ProductReviews (
    id bigint(16) NOT NULL AUTO_INCREMENT,
    product_code bigint(16) NOT NULL,

    reviewer_email_id varchar(264) NOT NULL,
    review_date date NOT NULL,
    review_title varchar(264) NOT NULL,
    review_text text NOT NULL,
    rating_out_of_five enum('1', '2', '3', '4', '5') NOT NULL,

    FOREIGN KEY (product_code) REFERENCES Products(product_code) ON DELETE CASCADE,
    FOREIGN KEY (reviewer_email_id) REFERENCES Buyers(email_id) ON DELETE CASCADE,
    PRIMARY KEY (id)
);

CREATE TABLE Categories (
    id bigint(16) NOT NULL AUTO_INCREMENT,
    category_name varchar(264) NOT NULL,
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
    buyer_email_id varchar(264) NOT NULL,
    FOREIGN KEY (product_code) REFERENCES Products(product_code) ON DELETE CASCADE,
    FOREIGN KEY (buyer_email_id) REFERENCES Buyers(email_id) ON DELETE CASCADE,
    PRIMARY KEY (id)
);

INSERT
    INTO Products (
        name,
        description,
        price_in_paisa,
        is_sold,
        seller_email_id,
        inventory_size
    ) VALUES (
        'Samazon Fundamentals Water Bottle | 1L | Silver',
        'Refresh yourself with cool water by using this 1 litre bottle!!! Samazon fundamentals brings you the best products in all categories. See a new item on Samazon, but it''s too pricey? Wait 2 weeks and Samazon Fundamentals with come with the same product for half the price! Samazon fundamentals, ''you make it, we remake it and we get rich!''',
        50000,
        false,
        'samridh.anand.paatni@gmail.com',
        5
    ), (
        'Samazon Fundamentals Backpack | 5L | Blue',
        'Carry all your stuff in style! Samazon fundamentals brings you the best products in all categories. See a new item on Samazon, but it''s too pricey? Wait 2 weeks and Samazon Fundamentals with come with the same product for half the price! Samazon fundamentals, ''you make it, we remake it and we get rich!''',
        100000,
        false,
        'samridh.anand.paatni@gmail.com',
        4
    );

INSERT
    INTO ProductReviews (
        product_code,
        reviewer_email_id,
        review_date,
        review_title,
        review_text,
        rating_out_of_five
    ) VALUES (
        2,
        'elessar6969@hotmale.com',
        '2019-04-04',
        'Can''t carry broken swords, otherwise very nice',
        'The bag is very nice and looks cool, however the material cannot stand the sharpness of elven craftsmanship. A broken sword precious to me was in the bag, and I lost it while trekking on the mountatins. I was unable to find it (even my friend''s elf-eyes couldn''t locate it!!). My marriage is now off as the world might be covered in a second darkness. The straps are too tight.',
        3
    );

INSERT
    INTO Carts(
        product_code,
        buyer_email_id
    ) VALUES (
        2,
        'elessar6969@hotmale.com'
    );

INSERT 
    INTO Categories (
        category_name,
        category_description
    ) VALUES (
        'Samazon Basics',
        'Samazon fundamentals brings you the best products in all categories. See a new item on Samazon, but it''s too pricey? Wait 2 weeks and Samazon Fundamentals with come with the same product for half the price! Samazon fundamentals, ''you make it, we remake it and we get rich!'''
    ), (
        'Water Bottles',
        NULL
    ), (
        'Backpacks',
        NULL
    );

INSERT
    INTO ProductCategories (
        product_code,
        category_code
    ) VALUES (1, 1), (1, 2), (2, 1), (2, 3);