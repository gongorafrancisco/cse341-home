-- Creates a new table and define a primary key
CREATE TABLE team_users (
    member_id  INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    member_username    VARCHAR(15) NOT NULL,
    member_email   VARCHAR(40) NOT NULL,
    member_name   VARCHAR(40) NOT NULL,
    member_lastname   VARCHAR(40) NOT NULL,
    member_password    VARCHAR(255) NOT NULL,
    UNIQUE (member_username, member_email)
);

CREATE TABLE payment_status (
    status_id   INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    payment_status INT NOT NULL CHECK(payment_status >= 0),
    UNIQUE (payment_status)
);

CREATE TABLE delivery_status (
    status_id   INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    delivery_status INT NOT NULL CHECK(delivery_status >= 0),
    UNIQUE (delivery_status)
);

CREATE TABLE purchase_status (
    status_id   INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    purchase_status INT NOT NULL CHECK(purchase_status >= 0),
    UNIQUE(purchase_status)
);

CREATE TABLE shipping_companies(
    shipping_company_id INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    shipping_company_name   VARCHAR(50) NOT NULL,
    UNIQUE (shipping_company_name)
);

CREATE TABLE customers (
    customer_id  INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    customer_name   VARCHAR(50) NOT NULL,
    customer_taxid  VARCHAR(13) NOT NULL,
    customer_phone  TEXT DEFAULT NULL,
    customer_email  TEXT DEFAULT NULL,
    UNIQUE (customer_name, customer_taxid)
);

CREATE TABLE customer_contacts (
    contact_id  INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    customer_id INT NOT NULL REFERENCES customers(customer_id),
    contact_name    VARCHAR(50) NOT NULL,
    contact_department    VARCHAR(50) NOT NULL,
    contact_phone   TEXT DEFAULT NULL,
    contact_email   TEXT DEFAULT NULL
);

CREATE TABLE customer_addresses (
    address_id  INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    customer_id INT NOT NULL REFERENCES customers(customer_id),
    customer_address    TEXT NOT NULL,
    shipping_address    BOOLEAN NOT NULL
);

CREATE TABLE quote_requests (
    request_id  INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    request_date    TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    request_customer_info   TEXT NOT NULL,
    request_details TEXT NOT NULL,
    request_delivery_date   DATE NOT NULL CHECK(request_delivery_date > request_date)
);

CREATE TABLE quotes (
    quote_id    INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    quote_date  TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    quote_prefix    VARCHAR(10) NOT NULL,
    quote_no    VARCHAR(10) NOT NULL,
    customer_id INT NOT NULL REFERENCES customers(customer_id),
    contact_id INT NOT NULL REFERENCES customer_contacts(contact_id),
    quote_subtotal    NUMERIC NOT NULL CHECK(quote_subtotal > 0),
    quote_taxes   NUMERIC NOT NULL CHECK(quote_taxes >= 0),
    quote_total NUMERIC NOT NULL,
    purchase_status INT DEFAULT 0 REFERENCES purchase_status(status_id)
);

CREATE TABLE invoices (
    invoice_id   INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    invoice_date    TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    invoice_prefix  VARCHAR(10) NOT NULL,
    invoice_no  VARCHAR(10) NOT NULL,
    quote_id    INT NOT NULL REFERENCES quotes(quote_id),
    customer_id INT NOT NULL REFERENCES customers(customer_id),
    contact_id INT NOT NULL REFERENCES customer_contacts(contact_id),
    shipping_company1_id INT DEFAULT NULL REFERENCES shipping_companies(shipping_company_id),
    invoice_subtotal    NUMERIC NOT NULL CHECK(invoice_subtotal > 0),
    invoice_taxes   NUMERIC NOT NULL CHECK(invoice_taxes >= 0),
    invoice_total NUMERIC NOT NULL,
    delivery_status INT DEFAULT 0 REFERENCES delivery_status(status_id),
    payment_status INT DEFAULT 0 REFERENCES payment_status(status_id),
    invoice_comments TEXT DEFAULT NULL
);

CREATE TABLE sales_orders (
    sales_order_id  INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    sales_order_date    TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    quote_id  INT NOT NULL REFERENCES quotes(quote_id),
    customer_id INT NOT NULL REFERENCES customers(customer_id),
    contact_id INT NOT NULL REFERENCES customer_contacts(contact_id),
    shipping_address_id INT NOT NULL REFERENCES customer_addresses(address_id),
    delivery_status INT DEFAULT 0 REFERENCES delivery_status(status_id),
    shipping_company1_id INT DEFAULT NULL REFERENCES shipping_companies(shipping_company_id),
    track_no_sc1    TEXT DEFAULT NULL,
    shipping_company2_id INT DEFAULT NULL REFERENCES shipping_companies(shipping_company_id),
    track_no_sc2    TEXT DEFAULT NULL,
    shipping_company3_id INT DEFAULT NULL REFERENCES shipping_companies(shipping_company_id),
    track_no_sc3    TEXT DEFAULT NULL,
    estimated_delivery_date DATE DEFAULT NULL,
    sales_order_comments TEXT DEFAULT NULL
);

CREATE TABLE financial_operations(
    financial_operation_id  INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    financial_operation_date    TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    invoice_id  INT NOT NULL REFERENCES invoices(invoice_id),
    customer_id INT NOT NULL REFERENCES customers(customer_id),
    contact_id INT NOT NULL REFERENCES customer_contacts(contact_id),
    invoice_subtotal    NUMERIC NOT NULL CHECK(invoice_subtotal > 0),
    invoice_taxes   NUMERIC NOT NULL CHECK(invoice_taxes >= 0),
    invoice_total NUMERIC NOT NULL,
    payment_status INT DEFAULT 0 REFERENCES payment_status(status_id),
    payment_date1   DATE DEFAULT NULL,
    payment_amount1 NUMERIC DEFAULT NULL,
    payment_date2   DATE DEFAULT NULL,
    payment_amount2 NUMERIC DEFAULT NULL,
    payment_date3   DATE DEFAULT NULL,
    payment_amount3 NUMERIC DEFAULT NULL
);


