-- DROP TABLE IF EXISTS USERS;
-- DROP TABLE IF EXISTS USE_CASE;

CREATE TABLE IF NOT EXISTS USERS (
  ID INTEGER PRIMARY KEY AUTOINCREMENT,
  FULL_NAME VARCHAR(100) NOT NULL,
  TELEPHONE VARCHAR(45) NOT NULL,
  SEX VARCHAR(45) NOT NULL,
  BIRTHDAY DATE NOT NULL
);

CREATE TABLE IF NOT EXISTS USE_CASE (
  ID INTEGER PRIMARY KEY AUTOINCREMENT,
  NAME VARCHAR(100) NOT NULL,
  USE_CASE_TIME TIMESTAMP NOT NULL,
  USER_ID BIGINT NOT NULL
)
