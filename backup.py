import os

backup = 'mysqldump -u server -p library > library_db.sql'
restore = 'mysql -u server -p library < library_db.sql'

print('')
print('')
print('*********** Rolling Ress Library - Backup Helper ***********')
print('')
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
    print('Backup was successful. exiting...')
    exit(0)
    
elif result == 'r' or result == 'restore':
    print('Restoring library database.')
    print('Password is student ID.')
    os.system(restore)
    print('Restoring was successful. exiting...')
    exit(0)
    
else:
    print('Unknown command. exiting...')
    exit(1)