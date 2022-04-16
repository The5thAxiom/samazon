INSERT
    INTO Accounts (
        email_id,
        password,
        joined_on,
        user_is_seller,
        image_path
    ) VALUES (
        'samridh.anand.paatni@gmail.com',
        '$2y$10$bzpEK46A8STfZQH51Byw.essn1jyX3Dg2bIYkKA7Tx5MlFCRT8TLq', -- samridh
        DATE(SYSDATE()),
        true,
        'assets/db/accounts/account_1.jpeg'
    ), (
        'elessar6969@hotmale.com',
        '$2y$10$uGVsYNaeLDTtjRGMwVTPvec.DDwAwUk52UIR5RE/kxsMQnOMMy8.u', -- youBowToNoOne
        DATE(SYSDATE()),
        false,
        'assets/db/accounts/account_2.jpeg'
    );

INSERT
    INTO Sellers (
        email_id
    ) VALUES (
    'samridh.anand.paatni@gmail.com'
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

INSERT
    INTO Products (
        name,
        description,
        price_in_paisa,
        added_on,
        is_sold,
        seller_email_id,
        inventory_size,
        image_path
    ) VALUES (
        'Samazon Fundamentals Water Bottle | 1L | Silver',
        'Refresh yourself with cool water by using this 1 litre bottle!!! Samazon fundamentals brings you the best products in all categories. See a new item on Samazon, but it''s too pricey? Wait 2 weeks and Samazon Fundamentals with come with the same product for half the price! Samazon fundamentals, ''you make it, we remake it and we get rich!''',
        50000,
        DATE(SYSDATE()),
        false,
        'samridh.anand.paatni@gmail.com',
        5,
        'assets/db/products/product_1.jpg'
    ), (
        'Samazon Fundamentals Backpack | 5L | Blue',
        'Carry all your stuff in style! Samazon fundamentals brings you the best products in all categories. See a new item on Samazon, but it''s too pricey? Wait 2 weeks and Samazon Fundamentals with come with the same product for half the price! Samazon fundamentals, ''you make it, we remake it and we get rich!''',
        100000,
        DATE(SYSDATE()),
        false,
        'samridh.anand.paatni@gmail.com',
        4,
        'assets/db/products/product_2.jpg'
    );

INSERT
    INTO ProductReviews (
        product_code,
        reviewer_email_id,
        review_date,
        review_time,
        review_title,
        review_text,
        rating_out_of_five
    ) VALUES (
        2,
        'elessar6969@hotmale.com',
        DATE(SYSDATE()),
        TIME(SYSDATE()),
        'Can''t carry broken swords, otherwise very nice',
        'The bag is very nice and looks cool, however the material cannot stand the sharpness of elven craftsmanship. A broken sword precious to me was in the bag, and I lost it while trekking on the mountatins. I was unable to find it (even my friend''s elf-eyes couldn''t locate it!!). My marriage is now off as the world might be covered in a second darkness. The straps are too tight.',
        3
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

INSERT
    INTO Carts(
        product_code,
        buyer_email_id
    ) VALUES (
        2,
        'elessar6969@hotmale.com'
    );

INSERT
    INTO Payments (
        payment_amount_in_paisa,
        payment_type,
        payment_status,
        payment_date,
        payment_time,
        card_id
    ) VALUES (
        100000,
        'card',
        'paid',
        DATE(SYSDATE()),
        TIME(SYSDATE()),
        2
    );

INSERT
    INTO Orders (
        product_code,
        buyer_email_id,
        buyer_delivery_address_id,
        payment_id,
        order_status,
        order_date,
        order_time
    ) VALUES (
        2,
        'elessar6969@hotmale.com',
        2,
        1,
        'complete',
        DATE(SYSDATE()),
        TIME(SYSDATE())
    );
