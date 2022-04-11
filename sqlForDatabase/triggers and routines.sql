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