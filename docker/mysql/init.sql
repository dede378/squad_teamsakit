CREATE TABLE IF NOT EXISTS products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(120) NOT NULL,
  price DECIMAL(10,2) NOT NULL
);

INSERT INTO products (name, price)
SELECT * FROM (
  SELECT 'Training Laptop', 899.00
  UNION ALL SELECT 'Lab Keyboard', 79.00
  UNION ALL SELECT 'Security Book', 49.00
) AS seed
WHERE NOT EXISTS (SELECT 1 FROM products);

CREATE TABLE IF NOT EXISTS comments (
  id INT AUTO_INCREMENT PRIMARY KEY,
  author VARCHAR(80) NOT NULL,
  message TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS lab_users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) UNIQUE NOT NULL,
  password VARCHAR(120) NOT NULL,
  display_name VARCHAR(100) NOT NULL,
  email VARCHAR(120) NOT NULL
);

INSERT INTO lab_users (username, password, display_name, email)
SELECT * FROM (
  SELECT 'alice', 'alice-lab-pass', 'Alice Lab', 'alice@teamsakit.invalid'
  UNION ALL SELECT 'bob', 'bob-lab-pass', 'Bob Lab', 'bob@teamsakit.invalid'
) AS seed
WHERE NOT EXISTS (SELECT 1 FROM lab_users);
