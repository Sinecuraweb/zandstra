CREATE TABLE products (
  id SERIAL PRIMARY KEY,
  type VARCHAR (100) NOT NULL,
  first_name VARCHAR (255) NOT NULL,
  main_name VARCHAR (255) NOT NULL,
  title VARCHAR (255) NOT NULL,
  price DECIMAL NOT NULL,
  num_pages INTEGER DEFAULT NULL,
  play_length DECIMAL DEFAULT NULL,
  discount DECIMAL DEFAULT NULL
);

INSERT INTO products (type, first_name, main_name, title, price, num_pages, play_length, discount) VALUES
('cd', 'Джон', 'Денвер', 'The Windstar Greatest Hits', 19.99, null, 3.15, null),
('book', 'Мэтт', 'Зандстра', 'PHP. Объекты, шаблоны и методики программирования.', 25.89, 576, null, 4.45);
