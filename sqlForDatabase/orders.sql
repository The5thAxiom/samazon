CREATE TABLE Payments (
    id bigint(16) NOT NULL AUTO_INCREMENT,
    payment_amount_in_paisa bigint(16) NOT NULL,
    payment_type enum('card', 'cod') NOT NULL,
    payment_status enum('unpaid', 'paid') NOT NULL,
    card_id bigint(16),

    FOREIGN KEY (card_id) REFERENCES CardDetails(id) ON DELETE CASCADE,
    PRIMARY KEY (id)
);

CREATE TABLE Orders (
    id bigint(16) NOT NULL AUTO_INCREMENT,
    product_code bigint(16) NOT NULL,
    buyer_email_id varchar(264) NOT NULL,
    buyer_delivery_address_id bigint(16) NOT NULL,
    payment_id bigint(16) NOT NULL,
    order_status enum('accepted', 'shipped', 'delivered', 'complete'),

    FOREIGN KEY (product_code) REFERENCES Products(product_code) ON DELETE CASCADE,
    FOREIGN KEY (buyer_email_id) REFERENCES Buyers(email_id) ON DELETE CASCADE,
    FOREIGN KEY (buyer_delivery_address_id) REFERENCES Address(id) ON DELETE CASCADE,
    FOREIGN KEY (payment_id) REFERENCES Payments(id) ON DELETE CASCADE,
    PRIMARY KEY (id)
);

INSERT
    INTO Payments (
        payment_amount_in_paisa,
        payment_type,
        payment_status,
        card_id
    ) VALUES (
        100000,
        'card',
        'paid',
        2
    );

INSERT
    INTO Orders (
        product_code,
        buyer_email_id,
        buyer_delivery_address_id,
        payment_id,
        order_status
    ) VALUES (
        2,
        'elessar6969@hotmale.com',
        2,
        1,
        'complete'
    );