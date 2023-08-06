import mysql.connector
from config import host, db_user, password, db_name


mysql.connector.connect(host=host,database=db_name,user=db_user,password=password)