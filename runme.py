import os

backup = 'mysqldump -u server -p library > library_db.sql'
restore = 'mysql -u server -p library < library_db.sql'

print('\n\n*********** Rolling Ress Library - Backup Helper ***********')
print("""
      
Before using this tool, you need to create a user 'server'.

mysql > CREATE USER 'server'@'localhost' IDENTIFIED BY '20234748';
mysql > GRANT RELOAD, SUPER, PROCESS ON *.* TO 'server'@'localhost';
mysql > GRANT CREATE, INSERT, DROP, UPDATE ON mysql.backup_progress TO 'server'@'localhost';
mysql > GRANT CREATE, INSERT, SELECT, DROP, UPDATE, ALTER ON mysql.backup_history TO 'server'@'localhost';
GRANT REPLICATION CLIENT ON *.* TO 'server'@'localhost';
GRANT SELECT ON performance_schema.replication_group_members TO 'server'@'localhost';
mysql > grant all privileges on library.* to server@'localhost';""")
print("If you want to backup DB data, type 'backup'.")
print("Or if you want to restore DB data, type 'restore'.")
print("You can input 'b' or 'r' if you want.")
print('')
result = input('RRL Backup >> ').lower()
print('')

if result == 'b' or result == 'backup':
    print('Backing up library database.')
    print('Password is student ID.')
    os.system(backup)
    print('Exiting...')
    exit(0)
    
elif result == 'r' or result == 'restore':
    print('NOTICE: before restoring database, run this command first:')
    print('\nmysql > create database library default character set utf8; \n')
    print('Restoring library database.')
    print('Password is student ID.')
    os.system(restore)
    print('Exiting...')
    exit(0)
    
else:
    print('Unknown command. exiting...')
    exit(1)