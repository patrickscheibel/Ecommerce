CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    name VARCHAR (50) UNIQUE NOT NULL,
    email VARCHAR (255) UNIQUE NOT NULL,
	password VARCHAR (50) NOT NULL,
    created_at DATETIME, 
    updated_at DATETIME 
);

CREATE TABLE buy_items (
    id SERIAL PRIMARY KEY,
    user_id INTEGER NOT NULL,
    product_id INTEGER NOT NULL,
	supplier VARCHAR (255) NOT NULL,
    product TEXT NOT NULL,
    price VARCHAR (20) NOT NULL,
    payment VARCHAR (255) NOT NULL,
    created_at DATETIME, 
    updated_at DATETIME 
)